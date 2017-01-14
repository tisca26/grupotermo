<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cat_paises_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function ultimo_id()
    {
        return $this->db->insert_id();
    }

    function error_consulta()
    {
        return $this->db->error();
    }

    public function paises_todos_sel($order = 'cat_paises_id')
    {
        $result = array();
        $query = $this->db->order_by($order)->get('cat_paises');
        if ($query->num_rows() > 0) {
            $q = $query->result();
            foreach ($q as $estado){
                $result[$estado->cat_paises_id] = $estado->nombre;
            }
        }
        return $result;
    }
}