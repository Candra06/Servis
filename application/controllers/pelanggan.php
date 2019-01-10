<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper("Response_Helper");
        $this->load->helper("Input_helper");
        $this->load->helper('url');
        $this->load->model("mPelanggan");
        if ($this->uri->segment(2) == "add" && $_SERVER['REQUEST_METHOD'] == "POST") {
            $this->input();
        } else if($this->uri->segment(2) == "edit" && $_SERVER['REQUEST_METHOD'] == "POST"){
            $this->update($this->uri->segment(3));
        }
        if(!isset($_SESSION['email'])){
            redirect('app');
        }
    }

	public function index()
	{
        $this->load->model("mPelanggan");
        $data['data'] = $this->mPelanggan->tampilData();
        $data['title'] = "Prima Comp";
        $data['header'] = "Data Pelanggan";
        $data['content'] = "pelanggan/index";
        $data['head'] = "Edit Profil";
        $data['data1'] = $this->db->get_where("user", ['kd_user' => $_SESSION['kd']])->row_array();
		$this->load->view('teknisi/index',$data);		
    }

    public function indexOperator()
	{
        $this->load->model("mPelanggan");
        $data['data'] = $this->mPelanggan->tampilData();
        $data['title'] = "Prima Comp";
        $data['header'] = "Data Pelanggan";
        $data['content'] = "pelanggan/index";
        $data['head'] = "Edit Profil";
        $data['data1'] = $this->db->get_where("user", ['kd_user' => $_SESSION['kd']])->row_array();
		$this->load->view('operator/index',$data);		
    }

    public function indexTeknisi()
	{
        $this->load->model("mPelanggan");
        $data['data'] = $this->mPelanggan->tampilData();
        $data['title'] = "Prima Comp";
        $data['header'] = "Data Pelanggan";
        $data['content'] = "pelanggan/index";
        $data['head'] = "Edit Profil";
        $data['data1'] = $this->db->get_where("user", ['kd_user' => $_SESSION['kd']])->row_array();
		$this->load->view('teknisi/index',$data);		
    }
    
    public function add()
    {
        $data['kode_pelanggan'] = $this->mPelanggan->kode();
        $data['data'] = null;
        $data['title'] = "Prima Comp";
        $data['header'] = "Data Pelanggan";
        $data['content'] = "pelanggan/add";
        $data['head'] = "Edit Profil";
        $data['data1'] = $this->db->get_where("user", ['kd_user' => $_SESSION['kd']])->row_array();
		$this->load->view('backend/index',$data); 
    }

    public function addOperator()
    {
        $data['kode_pelanggan'] = $this->mPelanggan->kode();
        $data['data'] = null;
        $data['title'] = "Prima Comp";
        $data['header'] = "Data Pelanggan";
        $data['content'] = "pelanggan/add";
        $data['head'] = "Edit Profil";
        $data['data1'] = $this->db->get_where("user", ['kd_user' => $_SESSION['kd']])->row_array();
		$this->load->view('operator/index',$data); 
    }

    public function addTeknisi()
    {
        $data['kode_pelanggan'] = $this->mPelanggan->kode();
        $data['data'] = null;
        $data['title'] = "Prima Comp";
        $data['header'] = "Data Pelanggan";
        $data['content'] = "pelanggan/add";
        $data['head'] = "Edit Profil";
        $data['data1'] = $this->db->get_where("user", ['kd_user' => $_SESSION['kd']])->row_array();
		$this->load->view('teknisi/index',$data); 
    }

    public function input(){
        $p = $_POST;

        try{
            $date = date('Y-m-d H:i:s');
            $kode_user = $this->mPelanggan->kode(); 
            $array = [
                'kd_pelanggan' => $kode_user,
                'nama' => $p['nama'],
                'alamat' => $p['alamat'],
                'no_hp' => $p['no_hp'],
                'pekerjaan' => $p['pekerjaan'],
                'create_by' => 1,
                'create_date' => $date
            ];
            $this->mPelanggan->insert($array);
            $this->session->set_flashdata("message", ['success', 'Berhasil input data '.$this->uri->segment(1)]);
            redirect(base_url("pelanggan"));
        }catch (Exception $e){
            $this->session->set_flashdata("message", ['danger', 'gagal input data '.$this->uri->segment(1)]);
            redirect(base_url("pelanggan"));
        }
    }

    public function edit($kode){       
        $data['title'] = "Prima Comp";
        $data['header'] = "Ubah Data Pelanggan";
        $data['content'] = "pelanggan/add";
        $data['data'] = $this->db->get_where("pelanggan", ['kd_pelanggan' => $kode])->row_array();
		$this->load->view('backend/index',$data);
    }

    public function update($kode){
        $p = $_POST;
        $date = date('Y-m-d H:i:s');
        try{
            $array = [
                'nama' => $p['nama'],
                'alamat' => $p['alamat'],
                'no_hp' => $p['no_hp'],
                'pekerjaan' => $p['pekerjaan'],
                'modified_by' => 1,
                'modified_date' => $date
            ];
            $this->mPelanggan->updateData($array, $kode);
            $this->session->set_flashdata("message", ['success', 'Berhasil update data '.$this->uri->segment(1)]);
            redirect(base_url("pelanggan"));
        }catch(Exception $e){
            $this->session->set_flashdata("message", ['danger', 'Gagal update data '.$this->uri->segment(1)]);
            redirect(base_url("pelanggan"));
        }
    }

    public function delete($kode){
        try{
            $this->mPelanggan->deleteData($kode);
            $this->session->set_flashdata("message", ['success', 'Berhasil hapus data '.$this->uri->segment(1)]);
            redirect(base_url("pelanggan"));
        }catch(Exceptio $e){
            $this->session->set_flashdata("message", ['danger', 'Gagal input data '.$this->uri->segment(1)]);
            redirect(base_url("pelanggan"));
        }
    }
}
