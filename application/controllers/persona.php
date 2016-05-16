<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->library('form_validation');
        $this->load->library('session'); 
        $this->load->model('Model_Persona');
    }
    
	public function index()
	{
        $data['content'] = "persona/index";
        $data['select'] = $this->Model_Persona->select();
        $this->load->view("template", $data);
	}
    
    public function insert(){
        $data = $this->input->post();
        if(isset($data)){
            $pername = $data['pername'];
            $perapm = $data['perapm'];
            $perapp = $data['perapp'];
            $pertel = $data['pertel'];
            $perdirec = $data['perdirec'];
            $perci = $data['perci'];
            $this->Model_Persona->insert($pername, $perapm, $perapp, $pertel, $perdirec, $perci);
            redirect('persona');
        }
    }
    
    public function delete($id){
        
        if($id != null){
            $this->Model_Persona->delete($id);
            redirect('persona');
        }
        redirect('persona');
    }
    
    public function edit($id){
        if($id != null){
            $data['content'] = "persona/index";
            $data['select'] = $this->Model_Persona->select();
            $data['dataedit'] = $this->Model_Persona->selectby($id);
            $this->load->view("template", $data);
        } else {
         
        }
    }
    
    public function update($id){
        $data = $this->input->post();
        if(isset($data)){  
            $pername = $data['pername'];
            $perapm = $data['perapm'];
            $perapp = $data['perapp'];
            $pertel = $data['pertel'];
            $perdirec = $data['perdirec'];
            $perci = $data['perci'];
            $this->Model_Persona->update($id,$pername, $perapm, $perapp, $pertel, $perdirec, $perci);
            redirect('persona');
        }
    }
}