<?php

Class Model_Persona extends CI_Model {
    // Read data using username and password
    public function select() 
    {    
        $this->load->database();  
        $this->db->select('*');
        $this->db->from('persona');
        $query = $this->db->get(); 
        $this->db->close();
        return $query->result();
    }
    
    public function insert($pername, $perapm, $perapp, $pertel, $perdirec, $perci){
        $this->load->database();  
        $data = array(
                'nomPersona' => $pername,
                'apPaterno' => $perapp,
                'apMaterno' => $perapm,
                'direccion' => $perdirec,
                'telefono' => $pertel,
                'ci' => $perci
        );    
        
        $this->db->insert('persona', $data);
        $this->db->close();
          
    }
    
    public function delete($id){
        $this->load->database();  
        $this->db->where('idPersona', $id);
        $this->db->delete('persona');
        $this->db->close();
    }
    
    public function selectby($id)
    {
       $this->load->database();  
       $this->db->from('persona'); 
       $this->db->where('idPersona', $id);  
       $query = $this->db->get(); 
       $this->db->close();
       
       return $query->result();
    }
    
    public function update($id,$pername, $perapm, $perapp, $pertel, $perdirec, $perci){
        $this->load->database(); 
        $data = array(
                'nomPersona' => $pername,
                'apPaterno' => $perapp,
                'apMaterno' => $perapm,
                'direccion' => $perdirec,
                'telefono' => $pertel,
                'ci' => $perci
        );         
        $this->db->where('idPersona', $id);
        $this->db->update('persona', $data);
    }
}
