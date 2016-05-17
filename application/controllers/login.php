<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->library('form_validation');
        $this->load->library('session'); 
        $this->load->model('login_database');
    }
    
	public function index()
	{
		$this->load->view('login');
	}
    
    public function login_process()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        
        if ($this->form_validation->run() == FALSE) 
        {
            if(isset($this->session->userdata['logged_in']))
            {
                redirect('admin');
            } 
            else
            {
                $this->load->view('login');
            }
        } 
        else 
        {
            $data = array(
                
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            
            $result = $this->login_database->login($data);
            if ($result == TRUE) 
            {
                $username = $this->input->post('username');
                // Add user data in session
                $session_data = array(
                    'username' => $result[1]->username,
                    'id' => $result[1]->idUsuario,
                );
                $this->session->set_userdata('logged_in', $session_data);
                redirect('admin');
            }
            else 
            {
                $data = array(
                    'error_message' => 'Usuario o contraseña invalida.'
                );
                $this->load->view('login', $data);
            }

        }
    }
}