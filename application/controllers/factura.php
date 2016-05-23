<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Factura extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->library('form_validation');
        $this->load->library('session'); 
        $this->load->model('Model_Factura');
    }
    
    
    
    
	public function index($id)
	{
        $data['content'] = "factura/index";
        $data['selectini'] = $this->Model_Factura->selectF($id);
        $data['selectpro'] = $this->Model_Factura->selectP($id);
        
        require_once('CodigoControl.php');

        $nit = $data["selectini"][0]->nit;
        $numero_autorizacion = $data["selectini"][0]->nroautorizacion;
        $numero_factura = $data["selectini"][0]->idVenta;
        $nit_cliente = $data["selectpro"][0]->nombre_cliente;
        $date = $data["selectini"][0]->fecha;
        $fecha_compra = (new DateTime($date))->format('Ymd');
        $fecha_compras = (new DateTime($date))->format('Y/m/d');
        $monto_compra = $data["selectini"][0]->total;
        $monto_compra = round($monto_compra, 2);
        $clave = $data["selectini"][0]->llavedosificacion;
        
        $realmonto = explode(".", $monto_compra);
        
        
        if (isset($realmonto[1])){
            $data['decimal'] = $realmonto[1];
        } else {
            $data['decimal'] = "00";
        }
        $data['codigo'] = CodigoControl::generar($numero_autorizacion, $numero_factura, $nit_cliente, $fecha_compra, $monto_compra, $clave);
        
        require_once('phpqrcode/qrlib.php');
        require_once('convertir.php');
        QRcode::png($nit.",".$numero_factura.",".$numero_autorizacion.",".$fecha_compras.",".$monto_compra.",".$monto_compra.",".$data['codigo'].",".$nit_cliente , $numero_autorizacion."-".$numero_factura.'.png');
        $data['qr'] = $numero_autorizacion."-".$numero_factura.'.png';
        $data['letra'] = (new converter($monto_compra))->convertir($realmonto[0]);
        
        $this->load->view("template", $data);
	}
}