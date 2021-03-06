<?php
require_once('components/Session.php');
require_once('components/Database.php');
require_once('components/Configuration.php');
require_once('components/Helper.php');
require_once('models/User.php');
require_once('models/Product.php');
require_once('models/ProductLot.php');
require_once('models/ProductLotProduct.php');
require_once('models/Order.php');
require_once('models/OrderProduct.php');
require_once('models/Lend.php');
require_once('models/LendProduct.php');
require_once('models/Category.php');

class MainController {

	private $_session;
	private $_config;
	private $_db;
	private $_dbConn;

	public function __construct() {
        $this->_session = new Session();

		if ($this->_session->get('user') && !empty($_POST) && isset($_POST['logout']))
			$this->_session->delete('user');
    }

    public function run() {

		$this->_config = Configuration::get();
		$route = Helper::getRoute($this->_config);

		if ($route) {
			$db = in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']) ? 'db' : 'dbProd';
			$this->_db = new Database();
			$this->_dbConn = $this->_db->init($this->_config[$db]);
			if (!property_exists($this->_dbConn, 'status')) {

				$this->render($route);
			} else {
				Helper::pp($this->_dbConn);
			}

		} else {

			http_response_code(404);
			require_once('views/404.php');
			die();
		}

	}

	private function render($route) {

		$params = [];

		$user = $this->_session->get('user');
		if ($this->_config['routes'][$route]['auth'] && !$user)
			$this->goSignin();

		switch ($route) {
			case 'connexion':
				if ($this->_session->get('user'))
					$this->goHome();
				
				$formAction = 'signin';
				if (!empty($_POST) && isset($_POST['action'])) {
					$formAction = $_POST['action'];
					switch ($formAction) {
						case 'signin':
							$params = $this->signin();
							break;
						case 'signup':
							$params = $this->signup();
							$formAction = isset($params['notifications']['action']) ? $params['notifications']['action'] : $formAction;
							break;
						case 'forgot':
							$params = $this->forgot();
							$formAction = isset($params['notifications']['action']) ? $params['notifications']['action'] : $formAction;
							break;
						
						default:
							break;
					}
				}
				break;
			case 'index':
				$params = $this->dashboard();
				break;
			case 'produit':
				$params = $this->product();
				break;
			case 'produits':
				$params = $this->products();
				break;
			case 'lot-produits':
				$params = $this->productLot();
				break;
			case 'lots-produits':
				$params = $this->productLots();
				break;
			case 'historiqueProduit':
				echo $this->getProductHistory();
				exit(0);
				break;
			case 'commande':
				$params = $this->order();
				break;
			case 'commandes':
				$params = $this->orders();
				break;
			case 'pret':
				$params = $this->lend();
				break;
			case 'prets':
				$params = $this->lends();
				break;
			case 'utilisateur':
				$params = $this->user();
				break;
			case 'utilisateurs':
				$params = $this->users();
				break;
			case 'categorie':
				$params = $this->category();
				break;
			case 'categories':
				$params = $this->categories();
				break;
			case 'historiqueUtilisateur':
				echo $this->getUserHistory();
				exit(0);
				break;
			
			default:
				break;
		}

		if ($this->_config['routes'][$route]['layout'])
			require_once('layouts/header.php');

		require_once('views/'.$this->_config['routes'][$route]['view'].'.php');

		if ($this->_config['routes'][$route]['layout'])
			require_once('layouts/footer.php');

	}

	public function goHome() {
		header('Location: '.$_SERVER['PHP_SELF'].'?r=index');
	}

	public function goSignin() {
		header('Location: '.$_SERVER['PHP_SELF'].'?r=connexion');
	}

	private function signin() {

		$params = [];

		$user = new User($this->_dbConn);
		$res = $user->findBy('username', $_POST['username']);
		if (isset($res['id'])) {
			if ($res['status'] == 1 && $res['role'] > 0) {
				if (sha1($_POST['password']) == $res['password'] || sha1($_POST['password']) == $res['password_token']) {
					if (sha1($_POST['password']) == $res['password_token']) {
						$res['password'] = $res['password_token'];
						$res['password_token'] = null;
						$user->save($res);
					}
					$this->_session->set('user', $res);
					$this->goHome();
				} else {
					$params['notifications'] = [
							'status' => 'error',
							'msg' => 'L???identifiant ou le mot de passe saisis sont invalide. Veuillez r??essayer',
						];
				}
			} else {
				$params['notifications'] = [
						'status' => 'error',
						'msg' => 'Votre compte n???est pas activ??. Veuillez patienter',
					];
			}
		} else {
			$params['notifications'] = [
					'status' => 'error',
					'msg' => 'L???identifiant ou le mot de passe saisis sont invalide. Veuillez r??essayer',
				];
		}

		return $params;
	}

	private function signup() {

		$user = new User($this->_dbConn);
		$res = $user->findBy('username', $_POST['username']);
		if (isset($res['id'])) {
			return [
					'status' => 'error',
					'msg' => 'L???identifiant saisi est d??j?? utilis??. Veuillez en choisir un autre',
				];
		} else {
			if ($userSaved = $user->save($_POST)) {

				$sentMail = true;
				$mailContent = [
						'to' => [
							'name' => $this->_config['mail']['admin']['name'],
							'email' => $this->_config['mail']['admin']['email'],
						], 
						'subject' => 'Nouvelle demande d???acc??s', 
						'msg' => 'Nouvelle demande d???acc??s de : '.$_POST['firstname'].' '.$_POST['lastname'],
					];
				$mail = Helper::sendMail($this->_config, $mailContent);
				if (!$mail) {
					$sentMail = false;
				}
				$params['notifications'] = $sentMail ? $userSaved : [
						'status' => 'error',
						'msg' => 'Un probl??me est survenue lors de l???enregistrement de la demande. Veuillez contacter l???administrateur du site',
					];
			} else {
				$params['notifications'] = [
						'status' => 'error',
						'msg' => 'Un probl??me est survenue lors de l???enregistrement de la demande. Veuillez contacter l???administrateur du site',
					];
			}
		}
	}

	private function forgot() {

		$user = new User($this->_dbConn);
		$res = $user->findBy('email', $_POST['email']);
		$sentMail = true;
		if (isset($res['id'])) {
			$newPwd = $user->randomPwd(10);
			$res['password_token'] = sha1($newPwd);
			$user->save($res, false, true);
			$mailContent = [
					'to' => [
						'name' => ucwords($res['firstname']).' '.ucwords($res['lastname']),
						'email' => $res['email'],
					], 
					'subject' => 'Votre nouveau mot de passe', 
					'msg' => 'Votre nouveau mot de passe est : '.$newPwd,
				];
			$mail = Helper::sendMail($this->_config, $mailContent);
			if (!$mail) {
				$sentMail = false;
			}
		}

		$params['notifications'] = $sentMail ? [
					'status' => 'success',
					'msg' => 'Si l???email saisi correspond ?? un compte, vous recevrez un email avec votre nouveau mot de passe',
					'action' => 'signin',
				] : [
					'status' => 'error',
					'msg' => 'Impossible d???envoyer l???email. Veuillez contacter l???administrateur du site',
				];

		return $params;
	}

	private function dashboard() {

		$params = [];

		$params['histories'] = null;
		$params['charts'] = null;

		return $params;
	}

	private function products() {

		$params = [];

		$product = new Product($this->_dbConn);
		if (isset($_GET['del'])) {

			$params['notifications'] = $product->delete($_GET['del']);
		}

		$params['products'] = $product->getProducts();
		$params['category'] = new Category($this->_dbConn);

		return $params;
	}

	private function getProductHistory() {

		if (isset($_GET['elementId'])) {
			
			$history = new History($this->_dbConn);
			$productHistory = $history->findBy('id_product', $_GET['elementId'], false);
			if (null !== $productHistory) {
				$user = new User($this->_dbConn);
				foreach ($productHistory as $key => $history) {
					$productHistory[$key]['user'] = $user->findBy('id', $history['id_user']);
				}
			}

			return json_encode($productHistory);
		}
	}

	private function product() {

		$params = [];
		$product = new Product($this->_dbConn);
		
		$category = new Category($this->_dbConn);
		$params['categories'] = $category->getCategories();
		if (isset($_GET['id'])) {
			$params['currentProduct'] = $product->findBy('id', $_GET['id']);

			if (isset($_GET['status'])) {
				$params['notifications'] = [
						'status' => 'success',
						'msg' => 'Le produit a bien ??t?? sauvegard??',
					];
			}
		}

		if (!empty($_POST)) {
			$params['currentProduct'] = $_POST;
			$res = $product->findBy('reference', $_POST['reference']);
			if (isset($res['id']) && $res['id'] != $_POST['id']) {
				$params['notifications'] = [
						'status' => 'error',
						'msg' => 'La r??f??rence saisie est d??j?? utilis??e',
					];
			} else {

				if ($params['notifications'] = $product->save($_POST)) {
					$params['currentProduct']['photo'] = $params['notifications']['photo'];
					if (isset($params['notifications']['action']) && $params['notifications']['action'] == 'redirect') {
						header('location:'.Helper::getUrl('produit', ['id' => $params['notifications']['id'], 'status' => 'new']));
						exit(0);
					}
				} else {
					$params['notifications'] = [
							'status' => 'error',
							'msg' => 'Un probl??me est survenue lors de l???enregistrement de la demande. Veuillez contacter l???administrateur du site',
						];
				}
			}
		}

		return $params;
	}

	private function productLots() {

		$params = [];

		$productLot = new ProductLot($this->_dbConn);
		if (isset($_GET['del'])) {

			$params['notifications'] = $productLot->delete($_GET['del']);
		}

		$params['productLots'] = $productLot->getProductLots();

		return $params;
	}

	private function productLot() {

		$params = [];
		$productLot = new ProductLot($this->_dbConn);
		
		if (isset($_GET['id'])) {
			$params['currentProductLot'] = $productLot->findBy('id', $_GET['id']);

			$productLotProduct = new ProductLotProduct($this->_dbConn);
			$params['currentProductLotProduct'] = $productLotProduct->findBy('product_lot_id', $_GET['id']);

			if (isset($_GET['status'])) {
				$params['notifications'] = [
						'status' => 'success',
						'msg' => 'Le lot de produit a bien ??t?? sauvegard??',
					];
			}
		}

		if (!empty($_POST)) {
			$params['currentProductLot'] = $_POST;
			$res = $productLot->findBy('reference', $_POST['reference']);
			if (isset($res['id']) && $res['id'] != $_POST['id']) {
				$params['notifications'] = [
						'status' => 'error',
						'msg' => 'La r??f??rence saisie est d??j?? utilis??e',
					];
			} else {

				if ($params['notifications'] = $productLot->save($_POST)) {
					if (isset($params['notifications']['action']) && $params['notifications']['action'] == 'redirect') {
						header('location:'.Helper::getUrl('lot-produit', ['id' => $params['notifications']['id'], 'status' => 'new']));
						exit(0);
					}
				} else {
					$params['notifications'] = [
							'status' => 'error',
							'msg' => 'Un probl??me est survenue lors de l???enregistrement de la demande. Veuillez contacter l???administrateur du site',
						];
				}
			}
		}

		$product = new Product($this->_dbConn);
		$params['products'] = $product->getProducts();

		return $params;
	}

	private function orders() {

		$params = [];

		$order = new Order($this->_dbConn);
		if (isset($_GET['del'])) {

			$params['notifications'] = $order->delete($_GET['del']);
		}


		if (!empty($_POST)) {
			$currentLend = $order->findBy('id', $_POST['product_id']);

			if (!isset($params['notifications'])) {
				if ($params['notifications'] = $order->save($currentOrder)) {

					#$history = new History($this->_dbConn);
					#$params['notifications2'] = $history->save($_POST['product_id'], $this->_session->get('user')['id'], $operation['type'], $operation['value']);

				} else {
					$params['notifications'] = [
							'status' => 'error',
							'msg' => 'Un probl??me est survenue lors de l???enregistrement de la demande. Veuillez contacter l???administrateur du site.',
						];
				}
			}
		}

		$params['orders'] = $order->getOrders();

		return $params;
	}

	private function order() {

		$params = [];
		$order = new Order($this->_dbConn);
		
		if (isset($_GET['id'])) {
			$params['currentLend'] = $order->findBy('id', $_GET['id']);

			if (isset($_GET['status'])) {
				$params['notifications'] = [
						'status' => 'success',
						'msg' => 'Le pr??t a bien ??t?? sauvegard??',
					];
			}
		}

		if (!empty($_POST)) {
			$params['currentOrder'] = $_POST;
			$res = $order->findBy('reference', $_POST['reference']);
			if (isset($res['id']) && $res['id'] != $_POST['id']) {
				$params['notifications'] = [
						'status' => 'error',
						'msg' => 'La r??f??rence saisie est d??j?? utilis??e',
					];
			} else {

				if ($params['notifications'] = $order->save($_POST)) {
					if (isset($params['notifications']['action']) && $params['notifications']['action'] == 'redirect') {
						header('location:'.Helper::getUrl('pret', ['id' => $params['notifications']['id'], 'status' => 'new']));
						exit(0);
					}
				} else {
					$params['notifications'] = [
							'status' => 'error',
							'msg' => 'Un probl??me est survenue lors de l???enregistrement de la demande. Veuillez contacter l???administrateur du site',
						];
				}
			}
		}

		return $params;
	}

	private function lends() {

		$params = [];

		$lend = new Lend($this->_dbConn);
		if (isset($_GET['del'])) {

			$params['notifications'] = $lend->delete($_GET['del']);
		}


		if (!empty($_POST)) {
			$currentLend = $lend->findBy('id', $_POST['product_id']);

			$operation = [];
			if (isset($_POST['inc_stock'])) {
				$operation['type'] = 'inc';
				$operation['value'] = $_POST['inc_stock'];
				$currentProduct['stock'] += $_POST['inc_stock'];
			}
			if (isset($_POST['dec_stock'])) {
				if ($_POST['dec_stock'] <= $currentProduct['stock']) {
					$operation['type'] = 'dec';
					$operation['value'] = $_POST['dec_stock'];
					$currentProduct['stock'] -= $_POST['dec_stock'];
				} else {
					$params['notifications'] = [
							'status' => 'error',
							'msg' => 'Vous ne pouvez pas exp??dier une quantit?? de produits plus ??lev??e ('.$_POST['dec_stock'].') que la quantit?? totale disponible ('.$currentProduct['stock'].').',
						];
				}
			}

			if (!isset($params['notifications'])) {
				if ($params['notifications'] = $lend->save($currentLend)) {

					#$history = new History($this->_dbConn);
					#$params['notifications2'] = $history->save($_POST['product_id'], $this->_session->get('user')['id'], $operation['type'], $operation['value']);

				} else {
					$params['notifications'] = [
							'status' => 'error',
							'msg' => 'Un probl??me est survenue lors de l???enregistrement de la demande. Veuillez contacter l???administrateur du site.',
						];
				}
			}
		}

		$params['lends'] = $lend->getLends();

		return $params;
	}

	private function lend() {

		$params = [];
		$lend = new Lend($this->_dbConn);
		
		if (isset($_GET['id'])) {
			$params['currentLend'] = $lend->findBy('id', $_GET['id']);

			$lendProduct = new LendProduct($this->_dbConn);
			$params['currentLendProducts'] = $lendProduct->findBy('lend_id', $_GET['id'], false);

			if (isset($_GET['status'])) {
				$params['notifications'] = [
						'status' => 'success',
						'msg' => 'Le pr??t a bien ??t?? sauvegard??',
					];
			}
		}

		if (!empty($_POST)) {
			$params['currentLend'] = $_POST;
			$res = $lend->findBy('reference', $_POST['reference']);
			if (isset($res['id']) && $res['id'] != $_POST['id']) {
				$params['notifications'] = [
						'status' => 'error',
						'msg' => 'La r??f??rence saisie est d??j?? utilis??e',
					];
			} else {

				if ($params['notifications'] = $lend->save($_POST)) {
					if (isset($params['notifications']['action']) && $params['notifications']['action'] == 'redirect') {
						header('location:'.Helper::getUrl('pret', ['id' => $params['notifications']['id'], 'status' => 'new']));
						exit(0);
					}
				} else {
					$params['notifications'] = [
							'status' => 'error',
							'msg' => 'Un probl??me est survenue lors de l???enregistrement de la demande. Veuillez contacter l???administrateur du site',
						];
				}
			}
		}
		
		$user = new User($this->_dbConn);
		$params['clients'] = $user->findBy('role', 0, false);

		$product = new Product($this->_dbConn);
		$params['products'] = $product->getProducts();
		$productLot = new ProductLot($this->_dbConn);
		$params['productLots'] = $productLot->getProductLots();

		return $params;
	}

	private function users() {

		$params = [];

		$user = new User($this->_dbConn);
		if (isset($_GET['del'])) {

			$params['notifications'] = $user->delete($_GET['del']);
		}

		$params['users'] = $user->getUsers();

		return $params;
	}

	private function getUserHistory() {

		if (isset($_GET['elementId'])) {
			
			$history = new History($this->_dbConn);
			$userHistory = $history->findBy('id_user', $_GET['elementId'], false);
			if (null !== $userHistory) {
				$product = new Product($this->_dbConn);
				foreach ($userHistory as $key => $history) {
					$userHistory[$key]['product'] = $product->findBy('id', $history['id_product']);
				}
			}

			return json_encode($userHistory);
		}
	}

	private function user() {

		$params = [];
		$user = new User($this->_dbConn);
		
		if (isset($_GET['id'])) {
			$params['currentUser'] = $user->findBy('id', $_GET['id']);
		}

		if (!empty($_POST)) {
			$params['currentUser'] = $_POST;
			$res = $user->findBy('username', $_POST['username']);
			if (isset($res['id']) && $res['id'] != $_POST['id']) {
				$params['notifications'] = [
						'status' => 'error',
						'msg' => 'L???identifiant utilisateur saisie est d??j?? utilis??',
					];
			} else {
				if ($params['notifications'] = $user->save($_POST, true, false, true)) {
					if (isset($params['notifications']['action']) && $params['notifications']['action'] == 'redirect') {
						header('location:'.Helper::getUrl('utilisateur', ['id' => $params['notifications']['id'], 'status' => 'new']));
						exit(0);
					}
				} else {
					$params['notifications'] = [
							'status' => 'error',
							'msg' => 'Un probl??me est survenue lors de l???enregistrement de la demande. Veuillez contacter l???administrateur du site',
						];
				}
			}
		}

		return $params;
	}

	private function categories() {

		$params = [];
		$category = new Category($this->_dbConn);
		if (isset($_GET['del'])) {

			$params['notifications'] = $category->delete($_GET['del']);
		}

		$params['categories'] = $category->getCategories();

		return $params;
	}

	private function category() {

		$params = [];
		$category = new Category($this->_dbConn);
		
		if (isset($_GET['id'])) {
			$params['currentCategory'] = $category->findBy('id', $_GET['id']);
			if (isset($_GET['status'])) {
				$params['notifications'] = [
						'status' => 'success',
						'msg' => 'Le produit a bien ??t?? sauvegard??',
					];
			}
		}

		if (!empty($_POST)) {
			$params['currentCategory'] = $_POST;
			if ($params['notifications'] = $category->save($_POST)) {
				if (isset($params['notifications']['action']) && $params['notifications']['action'] == 'redirect') {
					header('location:'.Helper::getUrl('categorie', ['id' => $params['notifications']['id'], 'status' => 'new']));
					exit(0);
				}
			} else {
				$params['notifications'] = [
						'status' => 'error',
						'msg' => 'Un probl??me est survenue lors de l???enregistrement de la demande. Veuillez contacter l???administrateur du site',
					];
			}
		}

		return $params;
	}

}

?>