<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper("Response_Helper");
        $this->load->helper('url');
    }

	public function index()
	{
        $data['title'] = "Prima Comp";
        $data['header'] = "Data Pelanggan";
        $data['content'] = "pelanggan/index";
		$this->load->view('backend/index',$data);
		
	}
}
