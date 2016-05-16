<?php

Class Model_Rol extends CI_Model {
    // Read data using username and password
    public function select() 
    {    
        $this->load->database();  
        $this->db->select('*');
        $this->db->from('rol');
        $query = $this->db->get(); 
        $this->db->close();
        return $query->result();
    }
    
    public function insert($rolname, $roldescription){
        $this->load->database();  
        $data = array(
                'nombre' => $rolname,
                'descripcion' => $roldescription,
        );    
        
        $this->db->insert('rol', $data);
        $this->db->close();
          
    }
    
    public function delete($id){
        $this->load->database();  
        $this->db->where('idRol', $id);
        $this->db->delete('rol');
        $this->db->close();
    }
    
    public function selectby($id)
    {
       $this->load->database();  
       $this->db->from('rol'); 
       $this->db->where('idRol', $id);  
       $query = $this->db->get(); 
       $this->db->close();
       
       return $query->result();
    }
    
    public function update($id,$rolname, $roldescription ){
        $this->load->database(); 
        $data = array(
                'nombre' => $rolname,
                'descripcion' => $roldescription,
        );     
        $this->db->where('idRol', $id);
        $this->db->update('rol', $data);
    }
}
