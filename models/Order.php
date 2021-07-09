<?php
require_once('components/Helper.php');
require_once('components/Database.php');

class Order {

	private $_conn;

	public $id;
	public $reference;
	public $status;
	public $user_id;
	public $created_at;

	public function __construct($dB) {
		$this->_conn = $dB;
    }

    public function findBy($key, $value, $one = true) {

		$sql = 'SELECT * FROM order WHERE '.$key.' = "'.$value.'"';

		try {
			$res = $this->_conn->query($sql);

			return $one ? $res->fetch(PDO::FETCH_ASSOC) : $res->fetchAll(PDO::FETCH_ASSOC);

		} catch(PDOException $e) {
			return [
					'status' => 'error',
					'msg' => $e->getMessage()
				];;
		}
	}

	public function getOrders() {

		$sql = 'SELECT * FROM order ORDER BY id ASC';

		try {
			$res = $this->_conn->query($sql);

			return $res->fetchAll(PDO::FETCH_ASSOC);

		} catch(PDOException $e) {
			return [
					'status' => 'error',
					'msg' => $e->getMessage()
				];
		}
	}

	public function delete($orderId) {

		$sql = 'DELETE FROM order WHERE id = '.intval($orderId);

		try {
			$res = $this->_conn->query($sql);

			return $res ? [
						'status' => 'success',
						'msg' => 'La commande a bien été supprimée.',
					] : [
						'status' => 'error',
						'msg' => 'Une erreur s‘est produite lors de l‘enregistrement de la commande. Veuillez contacter l‘administrateur du site',
					];

		} catch(PDOException $e) {
			return [
					'status' => 'error',
					'msg' => $e->getMessage()
				];
		}
	}

    public function save($order) {

        $this->_session = new Session();
		$user = $this->_session->get('user');

    	$status = isset($_POST['status']) && $_POST['status'] == 1 ? 1 : 0;

    	$action = false;
    	if (isset($order['id'])) {
			$sql = 'UPDATE order SET reference = "'.$order['reference'].'", status = "'.$order['status'].'", user_id = "'.$user['id'].'" WHERE id = '.$order['id'];
    	} else {

    		$action = 'redirect';
			$sql = 'INSERT INTO order (reference, status, user_id, created_at) VALUES ("'.$order['reference'].'", "'.$order['status'].'", "'.$order['user_id'].', "'.time().'")';
    	}

		try {
			$res = $this->_conn->query($sql);

			return $res ? [
						'status' => 'success',
						'msg' => 'La commande a bien été sauvegardée.',
						'action' => $action,
						'id' => $action ? $this->_conn->lastInsertId() : false,
						'photo' => $cleanFilename,
					] : [
						'status' => 'error',
						'msg' => 'Une erreur s‘est produite lors de l‘enregistrement de la commande. Veuillez contacter l‘administrateur du site',
					];

		} catch(PDOException $e) {
			return [
					'status' => 'error',
					'msg' => $e->getMessage()
				];
		}
	}
}

?>