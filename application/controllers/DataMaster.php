<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataMaster extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    //    is_login();
        $this->load->model('Base_model', 'model');
    }

    /** VIEW BOUNDARY */

    public function masbar()
    {
        $data['title'] = 'Data Master Barang';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $param = [];
        if (!empty($_GET['kategori'])) {
            $param['c.id']         = $_GET['kategori'];
        }
        if (!empty($_GET['brand'])) {
            $param['b.id']         = $_GET['brand'];
        }
        $param['a.deleted_at'] = NULL;

        // data barang
        $this->db->select('a.name, a.kode, a.tipe, b.name as brand, c.name as kategori, a.jumlah');
        $this->db->join('brand as b', 'a.brand_id = b.id', 'LEFT');
        $this->db->join('kategori as c', 'a.Kategori_id = c.id', 'LEFT');
        $data['data_barang'] = $this->db->get_where('barang as a', $param)->result_array();

        // data kategori
        $data['data_kategori'] = $this->db->get_where('kategori', ['deleted_at' => NULL])->result();
        // brand
        $data['data_brand'] = $this->db->get_where('brand', ['deleted_at' => NULL])->result();

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

    /** PROCESS BOUNDARY */

    public function create() {

        $post = $this->input->post();

        $kode = $this->db->order_by('kode', 'DESC')->get_where('barang', ['deleted_at' => NULL])->last_row();
        $post['kode'] = 'BRG'.str_pad(substr($kode->kode, 3) + 1, 5, '0', STR_PAD_LEFT);
        $this->model->insert('barang', $post);

        return redirect('DataMaster/masbar');
    }

    public function update(String $id) {

        $post = $this->input->post();

        $this->model->insert('barang', $post, $id);

        return redirect('DataMaster/masbar');

    }

    public function delete(String $id) {

        $post = $this->input->post();

        $this->model->insert('barang', $id);

        return redirect('DataMaster/masbar');

    }

}