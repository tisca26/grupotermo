<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Conceptos_categoria_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function ultimo_id()
    {
        return $this->db->insert_id();
    }

    public function error_consulta()
    {
        return $this->db->error();
    }

    public function conceptos_categoria_todos($order = 'conceptos_categoria_id')
    {
        $result = array();
        $query = $this->db->order_by($order)->get('conceptos_categoria');
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function insetar_conceptos_categoria($categoria = array())
    {
        return $this->db->insert('conceptos_categoria', $categoria);
    }
}