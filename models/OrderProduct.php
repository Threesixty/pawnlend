<?php
require_once('components/Helper.php');
require_once('components/Database.php');

class OrderProduct {

	private $_conn;

	public $id;
	public $order_id;
	public $product_id;
	public $quantity;
	public $reception;

	public function __construct($dB) {
		$this->_conn = $dB;
    }

    public function findBy($key, $value, $one = true) {

		$sql = 'SELECT * FROM order_product WHERE '.$key.' = "'.$value.'"';

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

	public function getOrderProduct() {

		$sql = 'SELECT * FROM order_product ORDER BY id ASC';

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

	public function delete($orderProductId) {

		$sql = 'DELETE FROM order_product WHERE id = '.intval($orderProductId);

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

    public function save($orderProduct) {

    	$action = false;
    	if (isset($orderProduct['id'])) {
			$sql = 'UPDATE order_product SET client_id = "'.$orderProduct['client_id'].'", startdate = "'.$orderProduct['start'].'", enddate = "'.$orderProduct['end'].'", user_id = "'.$orderProduct['user_id'].'" WHERE id = '.$orderProduct['id'];
    	} else {

    		$action = 'redirect';
			$sql = 'INSERT INTO order_product (client_id, startdate, enddate, user_id, created_at) VALUES ("'.$orderProduct['client_id'].'", "'.$orderProduct['startdate'].'", "'.$orderProduct['enddate'].'", "'.$orderProduct['user_id'].'", "'.$orderProduct['created_at'].'", "'.time().'")';
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