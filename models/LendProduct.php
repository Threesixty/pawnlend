<?php
require_once('components/Helper.php');
require_once('components/Database.php');

class LendProduct {

	private $_conn;

	public $id;
	public $lendId;
	public $product_lot_id;
	public $product_id;
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

	public function getLendProduct() {

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

    public function save($lendProduct) {

    	$action = false;
    	if (isset($lendProduct['id'])) {
			$sql = 'UPDATE lend_product SET client_id = "'.$lendProduct['client_id'].'", startdate = "'.$lendProduct['start'].'", enddate = "'.$lendProduct['end'].'", user_id = "'.$lendProduct['user_id'].'" WHERE id = '.$lendProduct['id'];
    	} else {

    		$action = 'redirect';
			$sql = 'INSERT INTO lend_product (client_id, startdate, enddate, user_id, created_at) VALUES ("'.$lendProduct['client_id'].'", "'.$lendProduct['startdate'].'", "'.$lendProduct['enddate'].'", "'.$lendProduct['user_id'].'", "'.$lendProduct['created_at'].'", "'.time().'")';
    	}

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