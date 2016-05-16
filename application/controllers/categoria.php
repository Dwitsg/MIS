<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->library('form_validation');
        $this->load->library('session'); 
        $this->load->model('Model_Categoria');
    }
    
	public function index()
	{
        $data['content'] = "categoria/index";
        $data['select'] = $this->Model_Categoria->select();
        $this->load->view("template", $data);
	}
    
    public function insert(){
        $data = $this->input->post();
        if(isset($data)){
            $catdescription = $data['catdescription'];
            $this->Model_Categoria->insert($catdescription);
            redirect('categoria');
        }
    }
    
    public function delete($id){
        
        if($id != null){
            $this->Model_Categoria->delete($id);
            redirect('categoria');
        }
        redirect('categoria');
    }
    
    public function edit($id){
        if($id != null){
            $data['content'] = "categoria/index";
            $data['select'] = $this->Model_Categoria->select();
            $data['dataedit'] = $this->Model_Categoria->selectby($id);
            $this->load->view("template", $data);
        } else {
         
        }
    }
    
    public function update($id){
        $data = $this->input->post();
        if(isset($data)){  
            $catdescription = $data['catdescription'];
            $this->Model_Categoria->update($id, $catdescription);
            redirect('categoria');
        }
    }
}