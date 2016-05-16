<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->library('form_validation');
        $this->load->library('session'); 
    }
    
	public function index()
	{
        if(!isset($this->session->userdata['logged_in']))
        {
                redirect('login');
        } 
        $data['content'] = "";
		$this->load->view('template', $data);
	}
}