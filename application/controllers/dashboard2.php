<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard2 extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper("Response_Helper");
        $this->load->helper('url');
        $this->load->helper("Input_helper");
        $this->load->model("mProfil");
        if(!isset($_SESSION['email'])){
            redirect('app');
        }
        
    }

	public function index()
	{
        $data['title'] = "Dashboard Prima Comp";
        $data['header'] = "Dashboard";
        $data['content'] = "dashboard/index";
        $data['head'] = "Edit Profil";
        $data['data1'] = $this->db->get_where("user", ['kd_user' => $_SESSION['kd']])->row_array();
        $this->load->view('operator/index',$data);
    }
    
    public function profil(){
        $data = $this->mProfil->profil1();
        echo json_encode($data);
    }

    public function profil2(){
        $data = $this->mProfil->profil2();
        echo json_encode($data);
     }
}