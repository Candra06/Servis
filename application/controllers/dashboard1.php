<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard1 extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper("Response_Helper");
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->helper("Input_helper");
        if(!isset($_SESSION['email'])){
            redirect('app');
        }
        if ($_SESSION['level'] != 2) {
            redirect('dashboard1');
        }
        
    }

	public function index()
	{
        $data['title'] = "Dashboard Prima Comp";
        $data['header'] = "Dashboard";
        $data['content'] = "dashboard/index";
        $data['head'] = "Edit Profil";
        $data['data1'] = $this->db->get_where("user", ['kd_user' => $_SESSION['kd']])->row_array();
        $this->load->view('teknisi/index',$data);
    }
    
    public function profil(){
        $data['head'] = "Edit Profil";
        
    }
}