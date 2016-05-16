<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->library('form_validation');
        $this->load->library('session'); 
        $this->load->model('Model_Empresa');
    }
    
	public function index()
	{
        $data['content'] = "empresa/index";
        $data['selectper'] = $this->Model_Empresa->selectper();
        $data['select'] = $this->Model_Empresa->select();
        $this->load->view("template", $data);
	}
    
    public function insert(){
        $data = $this->input->post();
        if(isset($data)){
            $empname = $data['empname'];
            $nit = $data['nit'];
            $empdirection = $data['empdirection'];
            $emptype = $data['emptype'];
            $emptelefono = $data['emptelefono'];
            $emppersona = $data['emppersona'];
            $this->Model_Empresa->insert($empname, $nit, $empdirection, $emptype, $emptelefono, $emppersona);
            redirect('empresa');
        }
    }
    
    public function delete($id){
        
        if($id != null){
            $this->Model_Empresa->delete($id);
            redirect('producto');
        }
        redirect('producto');
    }
    
    public function edit($id){
        if($id != null){
            $data['content'] = "empresa/index";
            $data['selectper'] = $this->Model_Empresa->selectper();
            $data['select'] = $this->Model_Empresa->select();
            $data['dataedit'] = $this->Model_Empresa->selectby($id);
            $this->load->view("template", $data);
        } else {
         
        }
    }
    
    public function update($id){
        $data = $this->input->post();
        if(isset($data)){  
            $empname = $data['empname'];
            $nit = $data['nit'];
            $empdirection = $data['empdirection'];
            $emptype = $data['emptype'];
            $emptelefono = $data['emptelefono'];
            $emppersona = $data['emppersona'];
            $this->Model_Empresa->update($id, $empname, $nit, $empdirection, $emptype, $emptelefono, $emppersona);
            redirect('empresa');
        }
    }
}