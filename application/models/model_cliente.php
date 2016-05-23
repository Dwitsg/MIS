<?php

Class Model_Cliente extends CI_Model {
    // Read data using username and password
    public function select() 
    {    
        $this->load->database();  
        $query = $this->db->query("SELECT * FROM cliente p inner join tipo_cliente c on p.Tipo_Cliente_idTipo_Cliente = c.idTipo_Cliente ");
        $this->db->close();
        return $query->result();
    }
    
    public function selectcat(){
        $this->load->database();  
        $this->db->select('*');
        $this->db->from('tipo_cliente');
        $query = $this->db->get(); 
        $this->db->close();
        return $query->result(); 
    }
    
    public function insert($cliname, $clinit, $clitype){
        $this->load->database();  
        $data = array(
                'nombre_cliente' => $cliname,
                'cedula' => $clinit,
                'Tipo_Cliente_idTipo_Cliente' => $clitype,
        );    
        
        $this->db->insert('cliente', $data);
        $this->db->close();
          
    }
    
    public function delete($id){
        $this->load->database();  
        $this->db->where('idCliente', $id);
        $this->db->delete('cliente');
        $this->db->close();
    }
    
    public function selectby($id)
    {
       $this->load->database();  
       $this->db->from('cliente'); 
       $this->db->where('idCliente', $id);  
       $query = $this->db->get(); 
       $this->db->close();
       
       return $query->result();
    }
    
    public function update($id, $cliname, $clinit, $clitype){
        $this->load->database(); 
        $data = array(
                'nombre' => $cliname,
                'cedula' => $clinit,
                'Tipo_Cliente_idTipo_Cliente' => $clitype,
        );     
        $this->db->where('idCliente', $id);
        $this->db->update('cliente', $data);
    }
}