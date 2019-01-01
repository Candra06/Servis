<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servis extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper("Response_Helper");
        $this->load->helper("Input_helper");
        $this->load->helper('url');
        $this->load->model("mTeknisi");
        if ($this->uri->segment(2) == "add" && $_SERVER['REQUEST_METHOD'] == "POST") {
            $this->input();
        } else if($this->uri->segment(2) == "edit" && $_SERVER['REQUEST_METHOD'] == "POST"){
            $this->update($this->uri->segment(3));
        }
        
    }

	public function index()
	{
        $this->load->model("mTeknisi");
        $data['data'] = $this->mTeknisi->tampilData();
        $data['title'] = "Prima Comp";
        $data['header'] = "Data Teknisi";
        $data['content'] = "servis/index";
		$this->load->view('backend/index',$data);
		
    }
    
    public function add(){
        $data['kode_user'] = $this->mTeknisi->kode();
        $data['title'] = "Prima Comp";
        $data['header'] = "Data Teknisi";
        $data['content'] = "servis/add";
        $data['data'] = null;
		$this->load->view('backend/index',$data);
    }

    public function input(){
        $p = $_POST;
        
        try{
            $date = date('Y-m-d H:i:s');
            $kode_user = $this->mTeknisi->kode();
            $array = [
                'kd_teknisi' => $kode_user,
                'nama' => $p['nama'],
                'alamat' => $p['alamat'],
                'no_hp' => $p['no_hp'],
                'create_by' => 1,
                'create_at' => $date
            ];

            $this->mTeknisi->insert($array);
            $this->session->set_flashdata("message", ['success', 'Berhasil input data '.$this->uri->segment(1)]);
            redirect(base_url("teknisi"));
        }catch (Exception $e){
            $this->session->set_flashdata("message", ['danger', 'Gagal'.$this->uri->segment(1)]);
            $this->add();
        }
    }

    public function edit($kode){
        
        $data['title'] = "Prima Comp";
        $data['header'] = "Ubah Data Teknisi";
        $data['content'] = "teknisi/add";
        $data['data'] = $this->db->get_where("teknisi", ['kd_teknisi' => $kode])->row_array();
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
                'modified_by' => 1,
                'modified_at' => $date
            ];
            $this->mTeknisi->updateData($array, $kode);
            $this->session->set_flashdata("message", ['success', 'Berhasil update data '.$this->uri->segment(1)]);
            redirect(base_url("teknisi"));
        }catch(Exception $e){
            $this->session->set_flashdata("message", ['danger', 'Gagal update data '.$this->uri->segment(1)]);
            redirect(base_url("teknisi"));
        }
    }

    public function delete($kode){
        try{
            $this->mTeknisi->deleteData($kode);
            $this->session->set_flashdata("message", ['success', 'Berhasil hapus data '.$this->uri->segment(1)]);
            redirect(base_url("teknisi"));
        }catch(Exceptio $e){
            $this->session->set_flashdata("message", ['danger', 'Gagal input data '.$this->uri->segment(1)]);
            redirect(base_url("teknisi"));
        }
    }

}
