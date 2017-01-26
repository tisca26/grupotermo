<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cat_estados_model extends CI_Model
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

    public function estados_todos_sel($order = 'cat_estados_id')
    {
        $result = array();
        $query = $this->db->order_by($order)->get('cat_estados');
        if ($query->num_rows() > 0) {
            $q = $query->result();
            foreach ($q as $estado){
                $result[$estado->cat_estados_id] = $estado->nombre;
            }
        }
        return $result;
    }

    public function estados_por_pais_id_sel($cat_paises_id = 0)
    {
        $result = array();
        $query = $this->db->where('cat_paises_id',$cat_paises_id)->get('cat_estados');
        if ($query->num_rows() > 0) {
            $q = $query->result();
            foreach ($q as $estado){
                $result[$estado->cat_estados_id] = $estado->nombre;
            }
        }
        return $result;
    }

    public function estados_por_pais_id($cat_paises_id = 0)
    {
        $result = array();
        $query = $this->db->where('cat_paises_id',$cat_paises_id)->get('cat_estados');
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function estado_por_id($cat_estados_id = 0)
    {
        $result = new stdClass();
        $query = $this->db->where('cat_estados_id',$cat_estados_id)->get('cat_estados');
        if ($query->num_rows() > 0) {
            $result = $query->row();
        }
        return $result;
    }
}