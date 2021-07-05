<?php
require_once('components/Helper.php');
require_once('components/Database.php');

class Lend {

	private $_conn;

	public $id;
	public $client_id;
	public $startdate;
	public $enddate;
	public $client_id;
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

	public function getLend() {

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

    	$action = false;
    	if (isset($lend['id'])) {
			$sql = 'UPDATE lend SET client_id = "'.$lend['client_id'].'", startdate = "'.$lend['start'].'", enddate = "'.$lend['end'].'", user_id = "'.$lend['user_id'].'" WHERE id = '.$lend['id'];
    	} else {

    		$action = 'redirect';
			$sql = 'INSERT INTO lend (client_id, startdate, enddate, user_id, created_at) VALUES ("'.$lend['client_id'].'", "'.$lend['startdate'].'", "'.$lend['enddate'].'", "'.$lend['user_id'].'", "'.$lend['created_at'].'", "'.time().'")';
    	}

		try {
			$res = $this->_conn->query($sql);

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