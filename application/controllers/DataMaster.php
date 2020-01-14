<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataMaster extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    //    is_login();
    }


    public function masbar()
    {
        $data['title'] = 'Data Master Barang';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('templet/header', $data);
        $this->load->view('templet/sidebar');
        $this->load->view('templet/topbar');
        $this->load->view('data_master/masbar');
        $this->load->view('templet/footer');
    }

    public function kabar()
    {
        $data['title'] = 'Kategori Barang';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('templet/header', $data);
        $this->load->view('templet/sidebar');
        $this->load->view('templet/topbar');
        $this->load->view('data_master/kabar');
        $this->load->view('templet/footer');
    }



}