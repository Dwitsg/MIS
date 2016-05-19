<?php

Class Model_Factura extends CI_Model {

    public function selectF($id) 
    {    
        $this->load->database();  
        $query = $this->db->query("SELECT * FROM venta p inner join usuario c on p.Usuario_idUsuario = c.idUsuario inner join empresa d on d.idEmpresa = c.Empresa_idEmpresa inner join dosificacion s on p.dosificacion_id = s.id WHERE idVenta = ".$id);
        $this->db->close();
        return $query->result();
    }
    
    public function selectP($id) 
    {    
        $this->load->database();  
        $query = $this->db->query("SELECT * FROM detalle_venta p inner join producto c on p.Producto_idProducto = c.idProducto inner join cliente d on d.idCliente = p.Cliente_idCliente WHERE Venta_idVenta = ".$id);
        $this->db->close();
        return $query->result();
    }
}
