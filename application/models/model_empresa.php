<?php

Class Model_Empresa extends CI_Model {
    // Read data using username and password
    public function select() 
    {    
        $this->load->database();  
        $query = $this->db->query("SELECT * FROM empresa p inner join persona c on p.Persona_idPersona = c.idPersona ");
        $this->db->close();
        return $query->result();
    }
    
    public function selectper(){
        $this->load->database();  
        $this->db->select('*');
        $this->db->from('persona');
        $query = $this->db->get(); 
        $this->db->close();
        return $query->result(); 
    }
    
    public function insert($empname, $nit, $empdirection, $emptype, $emptelefono, $emppersona){
        $this->load->database();  
        $data = array(
                'nombre_empresa' => $empname,
                'nit' => $nit,
                'direccion' => $empdirection,
                'tipoEmpresa' => $emptype,
                'telefono' => $emptelefono,
                'Persona_idPersona' => $emppersona
        );    
        
        $this->db->insert('empresa', $data);
        $this->db->close();
          
    }
    
    public function delete($id){
        $this->load->database();  
        $this->db->where('idEmpresa', $id);
        $this->db->delete('empresa');
        $this->db->close();
    }
    
    public function selectby($id)
    {
       $this->load->database();  
       $this->db->from('empresa'); 
       $this->db->where('idEmpresa', $id);  
       $query = $this->db->get(); 
       $this->db->close();
       
       return $query->result();
    }
    
    public function update($id, $empname, $nit, $empdirection, $emptype, $emptelefono, $emppersona){
        $this->load->database(); 
        $data = array(
                'nombre_empresa' => $empname,
                'nit' => $nit,
                'direccion' => $empdirection,
                'tipoEmpresa' => $emptype,
                'telefono' => $emptelefono,
                'Persona_idPersona' => $emppersona
        );     
        $this->db->where('idEmpresa', $id);
        $this->db->update('empresa', $data);
    }
}
