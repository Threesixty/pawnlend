<?php
require_once('components/Helper.php');
require_once('components/Database.php');

class ProductLotProduct {

	private $_conn;

	public $id;
	public $product_lot_id;
	public $product_id;

	public function __construct($dB) {
		$this->_conn = $dB;
    }

    public function findBy($key, $value, $one = true) {

		$sql = 'SELECT * FROM product_lot_product WHERE '.$key.' = "'.$value.'"';

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

	public function getProductLotProducts() {

		$sql = 'SELECT * FROM product_lot_product ORDER BY id ASC';

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

	public function delete($productLotProductId) {

		$sql = 'DELETE FROM product_lot_product WHERE id = '.intval($productLotProductId);

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

    public function save($productLotProduct) {

    	$action = false;
    	if (isset($productLotProduct['id'])) {
			$sql = 'UPDATE lend_product SET product_lot_id = "'.$productLotProduct['product_lot_id'].'", product_id = "'.$productLotProduct['product_id'].'" WHERE id = '.$productLotProduct['id'];
    	} else {

    		$action = 'redirect';
			$sql = 'INSERT INTO lend_product (product_lot_id, product_id) VALUES ("'.$productLotProduct['product_lot_id'].'", "'.$lendProduct['product_id'].'")';
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