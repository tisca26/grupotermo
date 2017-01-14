<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cat_municipios_model extends CI_Model
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

    public function municipios_todos_sel($order = 'cat_municipios_id')
    {
        $result = array();
        $query = $this->db->order_by($order)->get('cat_municipios');
        if ($query->num_rows() > 0) {
            $q = $query->result();
            foreach ($q as $municipio){
                $result[$municipio->cat_municipios_id] = $municipio->nombre;
            }
        }
        return $result;
    }

    public function municipios_por_estado_id_sel($cat_estados_id = 0)
    {
        $result = array();
        $query = $this->db->where('cat_estados_id',$cat_estados_id)->get('cat_municipios');
        if ($query->num_rows() > 0) {
            $q = $query->result();
            foreach ($q as $municipio){
                $result[$municipio->cat_municipios_id] = $municipio->nombre;
            }
        }
        return $result;
    }

    public function municipios_por_estado_id($cat_estados_id = 0)
    {
        $result = array();
        $query = $this->db->where('cat_estados_id',$cat_estados_id)->get('cat_municipios');
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }
}