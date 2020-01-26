<?php defined('BASEPATH') or exit ('You dont have permission to access this page.');

class Base_model extends CI_Model {

	public function __construct() {

		parent::__construct();
		$this->load->database();

	}

	public function insert(String $table, Array $data) {
		return $this->db->insert($table, $data);
	}

	public function update(String $table, Array $data, String $id) {
		return $this->db->where(['id' => $id])->update($table, $data);
	}

	public function delete(String $table, String $id) {
		return $this->db->where(['id' => $id])->delete($table);
	}

}

?>