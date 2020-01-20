<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CategoriasModel extends CI_Model
{	
    //Lista todas as categorias das pessoas
    public function getCategorias()
    {                                 
        $query = $this->db->get("Categorias");
        return $query->result();
    }
       	 	
}