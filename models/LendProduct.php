<?php
require_once('components/Helper.php');
require_once('components/Database.php');

class LendProduct {

	private $_conn;

	public $id;
	public $lendId;
	public $type;
	public $type_id;
	public $quantity;

	public function __construct($dB) {
		$this->_conn = $dB;
    }

    public function findBy($key, $value, $one = true) {

		$sql = 'SELECT * FROM lend_product WHERE '.$key.' = "'.$value.'"';

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

	public function getLendProducts() {

		$sql = 'SELECT * FROM lend_product ORDER BY id ASC';

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

	public function delete($lendProductId) {

		$sql = 'DELETE FROM lend_product WHERE id = '.intval($lendProductId);

		try {
			$res = $this->_conn->query($sql);

			return $res;

		} catch(PDOException $e) {
			return [
					'status' => 'error',
					'msg' => $e->getMessage()
				];
		}
	}

	public function deleteLendProducts($lendId) {

		$sql = 'DELETE FROM lend_product WHERE lendId = '.intval($lendId);

		try {
			$res = $this->_conn->query($sql);

			return $res;

		} catch(PDOException $e) {
			return [
					'status' => 'error',
					'msg' => $e->getMessage()
				];
		}
	}

    public function save($lendProduct) {

    	$action = false;
		$sql = 'INSERT INTO lend_product (lend_id, type, type_id, quantity) VALUES ("'.$lendProduct['lend_id'].'", "'.$lendProduct['type'].'", "'.$lendProduct['type_id'].'", "'.$lendProduct['quantity'].'", "'.time().'")';

		try {
			$res = $this->_conn->query($sql);

			return $res;

		} catch(PDOException $e) {
			return [
					'status' => 'error',
					'msg' => $e->getMessage()
				];
		}
	}
}

?>