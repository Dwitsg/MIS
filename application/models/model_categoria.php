<?php

Class Model_Categoria extends CI_Model {
    // Read data using username and password
    public function select() 
    {    
        $this->load->database();  
        $this->db->select('*');
        $this->db->from('categoria');
        $query = $this->db->get(); 
        $this->db->close();
        return $query->result();
    }
    
    public function insert($roldescription){
        $this->load->database();  
        $data = array(
                'descripcion' => $roldescription,
        );    
        
        $this->db->insert('categoria', $data);
        $this->db->close();
          
    }
    
    public function delete($id){
        $this->load->database();  
        $this->db->where('idCategoria', $id);
        $this->db->delete('categoria');
        $this->db->close();
    }
    
    public function selectby($id)
    {
       $this->load->database();  
       $this->db->from('categoria'); 
       $this->db->where('idCategoria', $id);  
       $query = $this->db->get(); 
       $this->db->close();
       
       return $query->result();
    }
    
    public function update($id, $roldescription ){
        $this->load->database(); 
        $data = array(
                'descripcion' => $roldescription,
        );     
        $this->db->where('idCategoria', $id);
        $this->db->update('categoria', $data);
    }
}
