<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Venta extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->library('form_validation');
        $this->load->library('session'); 
        $this->load->model('Model_Venta');
    }
    
	public function index()
	{
        $data['content'] = "venta/index";
        $data['select'] = $this->Model_Venta->select();
         $data['selectcat'] = $this->Model_Venta->selectcat();
        $this->load->view("template", $data);
	}
    
    public function insert(){
        $data = $this->input->post();
        if(isset($data)){
            $docnro = $data['docnro'];
            $docfecha = $data['docfecha'];
            $docllave = $data['docllave'];
            $this->Model_Venta->insert($docnro, $docfecha, $docllave);
            redirect('dosificacion');
        }
    }
    
    public function delete($id){
        
        if($id != null){
            $this->Model_Venta->delete($id);
            redirect('dosificacion');
        }
        redirect('dosificacion');
    }
    
    public function edit($id){
        if($id != null){
            $data['content'] = "dosificacion/index";
            $data['select'] = $this->Model_Venta->select();
            $data['dataedit'] = $this->Model_Venta->selectby($id);
            $this->load->view("template", $data);
        } else {
         
        }
    }
    
    public function update($id){
        $data = $this->input->post();
        if(isset($data)){  
            $docnro = $data['docnro'];
            $docfecha = $data['docfecha'];
            $docllave = $data['docllave'];
            $this->Model_Venta->update($id, $docnro, $docfecha, $docllave);
            redirect('dosificacion');
        }
    }
}