<?php

Class Model_TipoCliente extends CI_Model {
    // Read data using username and password
    public function select() 
    {    
        $this->load->database();  
        $this->db->select('*');
        $this->db->from('tipo_cliente');
        $query = $this->db->get(); 
        $this->db->close();
        return $query->result();
    }
    
    public function insert($tipodescription){
        $this->load->database();  
        $data = array(
                'descripcion' => $tipodescription
        );    
        
        $this->db->insert('tipo_cliente', $data);
        $this->db->close();
          
    }
    
    public function delete($id){
        $this->load->database();  
        $this->db->where('idTipo_Cliente', $id);
        $this->db->delete('tipo_cliente');
        $this->db->close();
    }
    
    public function selectby($id)
    {
       $this->load->database();  
       $this->db->from('tipo_cliente'); 
       $this->db->where('idTipo_Cliente', $id);  
       $query = $this->db->get(); 
       $this->db->close();
       
       return $query->result();
    }
    
    public function update($id, $tipodescription ){
        $this->load->database(); 
        $data = array(
                'descripcion' => $tipodescription
        );     
        $this->db->where('idTipo_Cliente', $id);
        $this->db->update('tipo_cliente', $data);
    }
}
