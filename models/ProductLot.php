<?php
require_once('components/Helper.php');
require_once('components/Database.php');

class ProductLot {

	private $_conn;

	public $id;
	public $name;
	public $user_id;
	public $created_at;

	public function __construct($dB) {
		$this->_conn = $dB;
    }

    public function findBy($key, $value, $one = true) {

		$sql = 'SELECT * FROM product_lot WHERE '.$key.' = "'.$value.'"';

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

	public function getProductLots() {

		$sql = 'SELECT * FROM product_lot ORDER BY id ASC';

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

	public function delete($productLotId) {

		$sql = 'DELETE FROM product_lot WHERE id = '.intval($productLotId);

		try {
			$res = $this->_conn->query($sql);

			return $res ? [
						'status' => 'success',
						'msg' => 'Le produit a bien été supprimé.',
					] : [
						'status' => 'error',
						'msg' => 'Une erreur s‘est produite lors de l‘enregistrement du lot. Veuillez contacter l‘administrateur du site',
					];

		} catch(PDOException $e) {
			return [
					'status' => 'error',
					'msg' => $e->getMessage()
				];
		}
	}

    public function save($productLot) {

        $this->_session = new Session();
		$user = $this->_session->get('user');

    	$action = false;
    	if (isset($productLot['id'])) {
			$sql = 'UPDATE product_lot SET reference = "'.$productLot['reference'].'", name = "'.$productLot['name'].'", user_id = "'.$user['user_id'].'" WHERE id = '.$productLot['id'];
    	} else {

    		$action = 'redirect';
			$sql = 'INSERT INTO product_lot (name, user_id, created_at) VALUES ("'.$productLot['name'].'", "'.$productLot['user_id'].', "'.time().'")';
    	}

		try {
			$res = $this->_conn->query($sql);

			return $res ? [
						'status' => 'success',
						'msg' => $msg,
						'action' => $action,
						'id' => $action ? $this->_conn->lastInsertId() : false,
						'photo' => $cleanFilename,
					] : [
						'status' => 'error',
						'msg' => 'Une erreur s‘est produite lors de l‘enregistrement du lot. Veuillez contacter l‘administrateur du site',
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