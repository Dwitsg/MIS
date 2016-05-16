<?php

Class Login_Database extends CI_Model {
    // Read data using username and password
    public function login($data) 
    {    
        $this->load->database();  
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('username', $data['username']);
        $this->db->where('password', MD5($data['password']));
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) 
        {
            return true;
        } 
        else
        {
            return false;
        }  
        $this->db->close();
    }
}
