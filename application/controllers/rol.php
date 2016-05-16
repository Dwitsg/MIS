<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rol extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->library('form_validation');
        $this->load->library('session'); 
        $this->load->model('Model_Rol');
    }
    
	public function index()
	{
        $data['content'] = "rol/index";
        $data['select'] = $this->Model_Rol->select();
        $this->load->view("template", $data);
	}
    
    public function insert(){
        $data = $this->input->post();
        if(isset($data)){
            $rolname = $data['rolname'];
            $roldescription = $data['roldescription'];
            $this->Model_Rol->insert($rolname, $roldescription);
            redirect('rol');
        }
    }
    
    public function delete($id){
        
        if($id != null){
            $this->Model_Rol->delete($id);
            redirect('rol');
        }
        redirect('rol');
    }
    
    public function edit($id){
        if($id != null){
            $data['content'] = "rol/index";
            $data['select'] = $this->Model_Rol->select();
            $data['dataedit'] = $this->Model_Rol->selectby($id);
            $this->load->view("template", $data);
        } else {
         
        }
    }
    
    public function update($id){
        $data = $this->input->post();
        if(isset($data)){  
            $rolname = $data['rolname'];
            $roldescription = $data['roldescription'];
            $this->Model_Rol->update($id,$rolname, $roldescription);
            redirect('rol');
        }
    }
}