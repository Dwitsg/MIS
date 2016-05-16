<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->library('form_validation');
        $this->load->library('session'); 
        $this->load->model('Model_Cliente');
    }
    
	public function index()
	{
        $data['content'] = "cliente/index";
        $data['selectcat'] = $this->Model_Cliente->selectcat();
        $data['select'] = $this->Model_Cliente->select();
        $this->load->view("template", $data);
	}
    
    public function insert(){
        $data = $this->input->post();
        if(isset($data)){
            $cliname = $data['cliname'];
            $clinit = $data['clinit'];
            $clitype = $data['clitype'];
            $this->Model_Cliente->insert($cliname, $clinit, $clitype);
            redirect('cliente');
        }
    }
    
    public function delete($id){
        
        if($id != null){
            $this->Model_Cliente->delete($id);
            redirect('cliente');
        }
        redirect('cliente');
    }
    
    public function edit($id){
        if($id != null){
            $data['content'] = "cliente/index";
            $data['selectcat'] = $this->Model_Cliente->selectcat();
            $data['select'] = $this->Model_Cliente->select();
            $data['dataedit'] = $this->Model_Cliente->selectby($id);
            $this->load->view("template", $data);
        } else {
         
        }
    }
    
    public function update($id){
        $data = $this->input->post();
        if(isset($data)){  
            $cliname = $data['cliname'];
            $clinit = $data['clinit'];
            $clitype = $data['clitype'];
            $this->Model_Cliente->update($id,$cliname, $clinit, $clitype);
            redirect('cliente');
        }
    }
}