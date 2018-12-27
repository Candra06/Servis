<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teknisi extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper("Response_Helper");
        $this->load->helper('url');
    }

	public function index()
	{
        $data['title'] = "Prima Comp";
        $data['header'] = "Data Teknisi";
        $data['content'] = "teknisi/index";
		$this->load->view('backend/index',$data);
		
    }
    
    public function add(){
        $data['title'] = "Prima Comp";
        $data['header'] = "Data Teknisi";
        $data['content'] = "teknisi/add";
		$this->load->view('backend/index',$data);
    }
}
