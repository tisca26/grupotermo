<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Almacen_materiales_model extends CI_Model
{
    public function __construct()
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

    public function almcacen_materiales_por_almacen_id($almacenes_id = 0, $limit = 0, $offset = 0)
    {
        $result = array();
        $this->db->select('am.*, m.nombre');
        $this->db->from('almacen_materiales am');
        $this->db->join('materiales m', 'am.materiales_id = m.materiales_id', 'inner');
        $this->db->where('am.almacenes_id', $almacenes_id);
        if ($limit > 0){
            $this->db->limit($limit, $offset);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

}