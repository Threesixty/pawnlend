<?php
require_once('components/Helper.php');
require_once('components/Database.php');
require_once('models/LendProduct.php');

class Lend {

	private $_conn;

	public $id;
	public $reference;
	public $client_id;
	public $startdate;
	public $enddate;
	public $status;
	public $user_id;
	public $created_at;

	public function __construct($dB) {
		$this->_conn = $dB;
    }

    public function findBy($key, $value, $one = true) {

		$sql = 'SELECT * FROM lend WHERE '.$key.' = "'.$value.'"';

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

	public function getLends() {

		$sql = 'SELECT * FROM lend ORDER BY id ASC';

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

	public function delete($lendId) {

		$sql = 'DELETE FROM lend WHERE id = '.intval($lendId);

		try {
			$res = $this->_conn->query($sql);

			return $res ? [
						'status' => 'success',
						'msg' => 'Le prêt a bien été supprimé.',
					] : [
						'status' => 'error',
						'msg' => 'Une erreur s‘est prête lors de l‘enregistrement du prêt. Veuillez contacter l‘administrateur du site',
					];

		} catch(PDOException $e) {
			return [
					'status' => 'error',
					'msg' => $e->getMessage()
				];
		}
	}

    public function save($lend) {


		$lendProduct = new LendProduct($this->_conn);

    	$action = false;
    	if (isset($lend['id'])) {
			$sql = 'UPDATE lend SET reference = "'.$lend['reference'].'", client_id = "'.$lend['client_id'].'", startdate = "'.$lend['start'].'", enddate = "'.$lend['end'].'", status = "'.$lend['status'].'", user_id = "'.$lend['user_id'].'" WHERE id = '.$lend['id'];

			$deleteLendProducts = $lendProduct->deleteLendProducts($lend['id']);
    	} else {
    		$action = 'redirect';
			$sql = 'INSERT INTO lend (reference, client_id, startdate, enddate, status, user_id, created_at) VALUES ("'.$lend['reference'].'", "'.$lend['client_id'].'", "'.$lend['startdate'].'", "'.$lend['enddate'].'", "'.$lend['status'].'", "'.$lend['user_id'].'", "'.time().'")';
    	}

		try {
			$res = $this->_conn->query($sql);

	    	if ($res && isset($lend['products']) && !empty($lend['products'])) {
	    		foreach ($lend['products'] as $productId) {
	    			$currentLendProduct = [];
	    			$currentLendProduct['lend_id'] = $res['id'];
	    			$isLot = explode('-', $productId);
	    			$currentLendProduct['type'] = count($isLot) > 1 ? 'lot' : 'product';
	    			$currentLendProduct['type_id'] = count($isLot) > 1 ? $isLot[1] : $productId;
	    			$currentLendProduct['quantity'] = 1;
	    		}
	    	}

			return $res ? [
						'status' => 'success',
						'msg' => 'Le prêt a bien été sauvegardé.',
						'action' => $action,
						'id' => $action ? $this->_conn->lastInsertId() : false,
					] : [
						'status' => 'error',
						'msg' => 'Une erreur s‘est prête lors de l‘enregistrement du prêt. Veuillez contacter l‘administrateur du site',
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