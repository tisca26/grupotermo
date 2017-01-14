<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Registro_patronal_model extends CI_Model
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

    public function registro_patronal_todos_sel($order = 'registro_patronal_id')
    {
        $result = array();
        $this->db->select('rp.*, e.estado');
        $this->db->from('registro_patronal rp');
        $this->db->join('cat_estados e', 'rp.cat_estados_id = e.cat_estados_id', 'inner');
        $query = $this->db->order_by($order)->get();
        if ($query->num_rows() > 0) {
            $registros = $query->result();
            foreach ($registros as $registro) {
                $result[$registro->registro_patronal_id] = $registro->clave . ' - ' . $registro->estado;
            }
        }
        return $result;
    }

    public function registro_patronal_por_empresa_id_sel($empresas_id = 'empresas_id')
    {
        $result = array();
        $this->db->select('rp.*, e.estado');
        $this->db->from('registro_patronal rp');
        $this->db->join('cat_estados e', 'rp.cat_estados_id = e.cat_estados_id', 'inner');
        $query = $this->db->where('empresas_id', $empresas_id)->get();
        if ($query->num_rows() > 0) {
            $registros = $query->result();
            foreach ($registros as $registro) {
                $result[$registro->registro_patronal_id] = $registro->clave . ' - ' . $registro->estado;
            }
        }
        return $result;
    }

    public function registro_patronal_por_empresa_id($empresas_id = 'empresas_id')
    {
        $result = array();
        $this->db->select('rp.*, e.nombre as estado');
        $this->db->from('registro_patronal rp');
        $this->db->join('cat_estados e', 'rp.cat_estados_id = e.cat_estados_id', 'inner');
        $query = $this->db->where('empresas_id', $empresas_id)->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function registro_patronal_todos($order = 'registro_patronal_id')
    {
        $result = array();
        $query = $this->db->order_by($order)->get('registro_patronal');
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }
}