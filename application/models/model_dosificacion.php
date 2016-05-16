<?php

Class Model_Dosificacion extends CI_Model {
    // Read data using username and password
    public function select() 
    {    
        $this->load->database();  
        $query = $this->db->query("SELECT * FROM dosificacion");
        $this->db->close();
        return $query->result();
    }
    

    public function insert($docnro, $docfecha, $docllave){
        $this->load->database();  
        $data = array(
                'nroautorizacion' => $docnro,
                'fechalimite' => $docfecha,
                'llavedosificacion' => $docllave,
        );    
        
        $this->db->insert('dosificacion', $data);
        $this->db->close();
          
    }
    
    public function delete($id){
        $this->load->database();  
        $this->db->where('id', $id);
        $this->db->delete('dosificacion');
        $this->db->close();
    }
    
    public function selectby($id)
    {
       $this->load->database();  
       $this->db->from('dosificacion'); 
       $this->db->where('id', $id);  
       $query = $this->db->get(); 
       $this->db->close();
       
       return $query->result();
    }
    
    public function update($id, $empname, $nit, $empdirection, $emptype, $emptelefono, $emppersona){
        $this->load->database(); 
        $data = array(
                'nroautorizacion' => $docnro,
                'fechalimite' => $docfecha,
                'llavedosificacion' => $docllave,
        );       
        $this->db->where('id', $id);
        $this->db->update('dosificacion', $data);
    }
}
