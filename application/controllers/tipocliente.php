<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipoCliente extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->library('form_validation');
        $this->load->library('session'); 
        $this->load->model('Model_TipoCliente');
    }
    
	public function index()
	{
        $data['content'] = "tipocliente/index";
        $data['select'] = $this->Model_TipoCliente->select();
        $this->load->view("template", $data);
	}
    
    public function insert(){
        $data = $this->input->post();
        if(isset($data)){
          
            $tipodescription = $data['tipodescription'];
            $this->Model_TipoCliente->insert($tipodescription);
            redirect('tipocliente');
        }
    }
    
    public function delete($id){
        
        if($id != null){
            $this->Model_TipoCliente->delete($id);
            redirect('tipocliente');
        }
        redirect('tipocliente');
    }
    
    public function edit($id){
        if($id != null){
            $data['content'] = "tipocliente/index";
            $data['select'] = $this->Model_TipoCliente->select();
            $data['dataedit'] = $this->Model_TipoCliente->selectby($id);
            $this->load->view("template", $data);
        } else {
         
        }
    }
    
    public function update($id){
        $data = $this->input->post();
        if(isset($data)){  
            $tipodescription = $data['tipodescription'];
            $this->Model_TipoCliente->update($id,$tipodescription);
            redirect('tipocliente');
        }
    }
}