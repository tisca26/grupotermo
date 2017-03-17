<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Conceptos_catalogo_model extends CI_Model
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

    public function conceptos_catalogo_por_id($conceptos_catalogo_id = 0)
    {
        $result = null;
        $query = $this->db->where('conceptos_catalogo_id', $conceptos_catalogo_id)->get('conceptos_catalogo');
        if ($query->num_rows() > 0) {
            $result = $query->row();
        }
        return $result;
    }

    public function conceptos_catalogo_todos($order = 'conceptos_catalogo_id')
    {
        $result = array();
        $query = $this->db->order_by($order)->get('conceptos_catalogo');
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function insertar_concepto($concepto = array())
    {
        return $this->db->insert('conceptos_catalogo', $concepto);
    }

    public function conceptos_catalogo_por_categoria_id($conceptos_categoria_id = 0)
    {
        $result = array();
        $query = $this->db->where('conceptos_categoria_id', $conceptos_categoria_id)->get('v_conceptos_catalogo');
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function insertar_rel_concepto_categoria($rel_concepto_cat = array())
    {
        return $this->db->insert('conceptos_cat', $rel_concepto_cat);
    }
}