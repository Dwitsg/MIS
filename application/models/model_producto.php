<?php

Class Model_Producto extends CI_Model {
    // Read data using username and password
    public function select() 
    {    
        $this->load->database();  
        $query = $this->db->query("SELECT * FROM producto p inner join categoria c on p.Categoria_idCategoria = c.idCategoria ");
        $this->db->close();
        return $query->result();
    }
    
    public function selectcat(){
        $this->load->database();  
        $this->db->select('*');
        $this->db->from('categoria');
        $query = $this->db->get(); 
        $this->db->close();
        return $query->result(); 
    }
    
    public function insert($proname, $prodescription, $proprice, $procat){
        $this->load->database();  
        $data = array(
                'nombre' => $proname,
                'descripcionpro' => $prodescription,
                'precio' => $proprice,
                'Categoria_idCategoria' => $procat,
        );    
        
        $this->db->insert('producto', $data);
        $this->db->close();
          
    }
    
    public function delete($id){
        $this->load->database();  
        $this->db->where('idProducto', $id);
        $this->db->delete('producto');
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
    
    public function update($id,$proname, $prodescription, $proprice, $procat){
        $this->load->database(); 
        $data = array(
                'nombre' => $proname,
                'descripcionpro' => $prodescription,
                'precio' => $proprice,
                'Categoria_idCategoria' => $procat,
        );     
        $this->db->where('idProducto', $id);
        $this->db->update('producto', $data);
    }
}
