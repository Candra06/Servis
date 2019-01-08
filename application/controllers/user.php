<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper("Response_Helper");
        $this->load->helper("Input_helper");
        $this->load->helper('url');
        $this->load->model("mUser");
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
        $this->load->model("muser");
        $data['data'] = $this->mUser->tampilData();
        $data['title'] = "Prima Comp";
        $data['header'] = "Data User";
        $data['content'] = "user/index";
		$this->load->view('backend/index',$data);
		
    }
    
    public function add(){
        $data['kode_user'] = $this->mUser->kode();
        $data['title'] = "Prima Comp";
        $data['header'] = "Data User";
        $data['content'] = "user/add";
        $data['data'] = null;
		$this->load->view('backend/index',$data);
    }

    public function input(){
        $p = $_POST;
        
        try{
            $date = date('Y-m-d H:i:s');
            $kode_user = $this->mUser->kode();
            $array = [
                'kd_user' => $kode_user,
                'nama' => $p['nama'],
                'level' => $p['level'],
                'email' => $p['email'],
                'password' => $p['password'],
                'status' => $p['status'],
                'no_hp' => $p['no_hp'],
                'alamat' => $p['alamat'],
                'create_by' => 1,
                'create_date' => $date
            ];

            $this->muser->insert($array);
            $this->session->set_flashdata("message", ['success', 'Berhasil input data '.$this->uri->segment(1)]);
            redirect(base_url("user"));
        }catch (Exception $e){
            $this->session->set_flashdata("message", ['danger', 'Gagal'.$this->uri->segment(1)]);
            $this->add();
        }
    }

    public function edit($kode){
        
        $data['title'] = "Prima Comp";
        $data['header'] = "Ubah Data user";
        $data['content'] = "user/add";
        $data['data'] = $this->db->get_where("user", ['kd_user' => $kode])->row_array();
		$this->load->view('backend/index',$data);
    }

    public function update($kode){
        $p = $_POST;
        $date = date('Y-m-d H:i:s');
        try{
            $array = [
                'nama' => $p['nama'],
                'level' => $p['level'],
                'email' => $p['email'],
                'no_hp' => $p['no_hp'],
                'alamat' => $p['alamat'],
                'password' => $p['password'],
                'status' => $p['status'],
                'modified_by' => 1,
                'modified_date' => $date
            ];
            $this->mUser->updateData($array, $kode);
            $this->session->set_flashdata("message", ['success', 'Berhasil update data '.$this->uri->segment(1)]);
            redirect(base_url("user"));
        }catch(Exception $e){
            $this->session->set_flashdata("message", ['danger', 'Gagal update data '.$this->uri->segment(1)]);
            redirect(base_url("user"));
        }
    }

    public function delete($kode){
        try{
            $this->muser->deleteData($kode);
            $this->session->set_flashdata("message", ['success', 'Berhasil hapus data '.$this->uri->segment(1)]);
            redirect(base_url("user"));
        }catch(Exceptio $e){
            $this->session->set_flashdata("message", ['danger', 'Gagal input data '.$this->uri->segment(1)]);
            redirect(base_url("user"));
        }
    }

}
