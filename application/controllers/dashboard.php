<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper("Response_Helper");
        $this->load->helper('url');
    }

	public function index()
	{
        $data['title'] = "Dashboard Prima Comp";
        $data['header'] = "Dashboard";
        $data['content'] = "teknisi/index";
		$this->load->view('backend/index',$data);
		
	}
}
