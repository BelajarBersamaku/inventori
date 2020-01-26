<?php defined('BASEPATH') or exit ('You dont have permission to access this page.');

class Barang_masuk extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function view_laporan() {

		$startDate = $this->input->get('start_date');
		$endDate   = $this->input->get('end_date');
		
		$this->load->view('templet/header', $data);
        $this->load->view('templet/sidebar', $data);
        $this->load->view('templet/topbar', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('templet/footer');
	}

}

?>