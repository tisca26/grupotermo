<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Empresas_departamentos_model extends CI_Model
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

    public function empresas_departamentos_todos($order = 'empresas_departamentos_id')
    {
        $result = array();
        $query = $this->db->order_by($order)->get('empresas_departamentos');
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function empresas_departamentos_todos_sel($order = 'empresas_departamentos_id')
    {
        $result = array();
        $query = $this->db->order_by($order)->get('empresas_departamentos');
        if ($query->num_rows() > 0) {
            $deptos = $query->result();
            foreach ($deptos as $depto) {
                $result[$deptos->empresas_departamentos_id] = $depto->nombre;
            }
        }
        return $result;
    }

    public function departamentos_por_empresas_id($empresas_id = 0)
    {
        $result = array();
        $query = $this->db->where('empresas_id', $empresas_id)->get('empresas_departamentos');
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function departamentos_por_empresas_id_sel($empresas_id = 0)
    {
        $result = array();
        $query = $this->db->where('empresas_id', $empresas_id)->get('empresas_departamentos');
        if ($query->num_rows() > 0) {
            $deptos = $query->result();
            foreach ($deptos as $depto){
                $result[$depto->empresas_departamentos_id] = $depto->nombre;
            }
        }
        return $result;
    }
}