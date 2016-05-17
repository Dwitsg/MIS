<?php

Class Model_Venta extends CI_Model {
    // Read data using username and password
    public function select() 
    {    
        $this->load->database();  
        $query = $this->db->query("SELECT * FROM venta p inner join dosificacion c on p.dosificacion_id = c.id ");
        $this->db->close();
        return $query->result();
    }
    
    public function selectcat(){
        $this->load->database();  
        $this->db->select('*');
        $this->db->from('dosificacion');
        $query = $this->db->get(); 
        $this->db->close();
        return $query->result(); 
    }
    
    public function selectpro($id){
        $this->load->database();  
        $query = $this->db->query("SELECT * FROM detalle_venta p inner join producto c on p.Producto_idProducto = c.idProducto WHERE Venta_idVenta = ".$id);
        $this->db->close();
        return $query->result(); 
    }
    
    public function selectprod(){
        $this->load->database();  
        $this->db->select('*');
        $this->db->from('producto');
        $query = $this->db->get(); 
        $this->db->close();
        return $query->result(); 
    }
    
    public function selectven(){
        $this->load->database();  
        $this->db->select('*');
        $this->db->from('usuario');
        $query = $this->db->get(); 
        $this->db->close();
        return $query->result(); 
    }
    
    public function selectprobyid($id){
        $this->load->database();  
        $this->db->select('*');
        $this->db->from('producto');
        $this->db->where('idProducto', $id);
        $query = $this->db->get(); 
        $this->db->close();
        return $query->result(); 
    }
    
    public function selectcli(){
        $this->load->database();  
        $this->db->select('*');
        $this->db->from('cliente');
        $query = $this->db->get(); 
        $this->db->close();
        return $query->result(); 
    }
    
    
    public function insert($ventados, $ventafecha, $ventatotal, $usuario){
        $this->load->database();  
        $data = array(
                'dosificacion_id' => $ventados,
                'fecha' => $ventafecha,
                'total' => $ventatotal,
                'Usuario_idUsuario' => $usuario,
        );    
        
        $this->db->insert('venta', $data);
        $insert_id = $this->db->insert_id();
        $this->db->close();
        return $insert_id; 
    }
    
    
    public function insertpro($cliente, $venta, $producto, $cantidad){
                $datas = $this->selectprobyid($producto);
        $total = $datas[0]->precio * $cantidad;
        $this->load->database();  
        $data = array(
                'descripcion' => "",
                'Venta_idVenta' => $venta,
                'Producto_idProducto' => $producto,
                'Cliente_idCliente' => $cliente,
                'subtotal' => $total,
                'cantidad' => $cantidad,
        );    
        
        $this->db->insert('detalle_venta', $data);
        $this->db->close();
    }
    
    public function delete($id){
        $this->load->database();  
        $this->db->where('idVenta', $id);
        $this->db->delete('venta');
        $this->db->close();
    }
    
        public function deletedp($id){
        $this->load->database();  
        $this->db->where('idDetalle_Venta', $id);
        $this->db->delete('detalle_venta');
        $this->db->close();
    }
    
    public function selectby($id)
    {
       $this->load->database();  
       $this->db->from('producto'); 
       $this->db->where('idProducto', $id);  
       $query = $this->db->get(); 
       $this->db->close();
       
       return $query->result();
    }
    
    public function update($id, $fecha){
        $datas =  $this->selectpro($id);
        $datss = 0;
        foreach ($datas as $value) {
           $datss += $value->subtotal;
        }
        $this->load->database(); 
        $data = array(
                'total' => $datss,
                
        );     
        $this->db->where('idVenta', $id);
        $this->db->update('venta', $data);
    }
}
