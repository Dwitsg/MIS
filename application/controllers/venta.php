<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Venta extends CI_Controller {
    
    var $data;
    
	public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('date');
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
        $data['selectven'] = $this->Model_Venta->selectven();
        $this->load->view("template", $data);
	}
    
    public function insert(){
        $data = $this->input->post();
        if(isset($data)){
            $ventados = $data['ventados'];
            $ventafecha = now();
            $ventatotal = 0;
            $usuario = $data['vendedor'];
            $id = $this->Model_Venta->insert($ventados, $ventafecha, $ventatotal, $usuario);
            $this->data = $id;
            redirect('venta/detalle'."/".$id);
        }
    }
    
    public function insertpro(){
        $data = $this->input->post();
        if(isset($data)){
            $producto = $data['producto'];
            $cantidad = $data['cantidad'];
            $venta = $data['nrofactura'];
            $cliente = $data['cliente'];
            $this->Model_Venta->insertpro($cliente, $venta, $producto, $cantidad);
            redirect('venta/detalle'."/".$data['nrofactura']);
        }       
    }
    
    public function detalle($id){
            $data['content'] = "venta/detalle";
            $data['select'] = $this->Model_Venta->selectpro($id);
            $data['selectpro'] = $this->Model_Venta->selectprod();
            $data['selectcli'] = $this->Model_Venta->selectcli();
            $data['id'] = $id;
            $this->load->view("template", $data);
    }
    
    public function delete($id){
        
        if($id != null){
            $this->Model_Venta->delete($id);
            redirect('venta');
        }
        redirect('venta');
    }
    
   public function deletedp($id, $str){ 
       $data = $this->input->post();
        if($id != null){
            $this->Model_Venta->deletedp($id);
            redirect('venta/detalle'."/".$str);
        }
        redirect('venta/detalle'."/".$str);
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
  
            $fecha = new DateTime('now');
            $this->Model_Venta->update($id, $fecha);
            redirect('venta');
        
    }
}