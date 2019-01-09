<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard2 extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper("Response_Helper");
        $this->load->helper('url');
        $this->load->helper("Input_helper");
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
        $data['data'] = $this->db->get_where("user", ['kd_user' => $_SESSION['kd']])->row_array();
        $this->load->view('operator/index',$data);
    }
    
    public function profil(){
        $data['head'] = "Edit Profil";
        
    }
}