<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->library('form_validation');
        $this->load->library('session'); 
        $this->load->model('Model_Producto');
    }
    
	public function index()
	{
        $data['content'] = "producto/index";
        $data['selectcat'] = $this->Model_Producto->selectcat();
        $data['select'] = $this->Model_Producto->select();
        $this->load->view("template", $data);
	}
    
    public function insert(){
        $data = $this->input->post();
        if(isset($data)){
            $proname = $data['proname'];
            $prodescription = $data['prodescription'];
            $proprice = $data['proprice'];
            $procat = $data['procat'];
            $this->Model_Producto->insert($proname, $prodescription, $proprice, $procat);
            redirect('producto');
        }
    }
    
    public function delete($id){
        
        if($id != null){
            $this->Model_Producto->delete($id);
            redirect('producto');
        }
        redirect('producto');
    }
    
    public function edit($id){
        if($id != null){
            $data['content'] = "producto/index";
            $data['selectcat'] = $this->Model_Producto->selectcat();
            $data['select'] = $this->Model_Producto->select();
            $data['dataedit'] = $this->Model_Producto->selectby($id);
            $this->load->view("template", $data);
        } else {
         
        }
    }
    
    public function update($id){
        $data = $this->input->post();
        if(isset($data)){  
            $proname = $data['proname'];
            $prodescription = $data['prodescription'];
            $proprice = $data['proprice'];
            $procat = $data['procat'];
            $this->Model_Producto->update($id,$proname, $prodescription, $proprice, $procat);
            redirect('producto');
        }
    }
}