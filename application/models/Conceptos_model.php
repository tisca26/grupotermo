<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Conceptos_model extends CI_Model
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

    public function conceptos_nombres()
    {
        $result = array();
        $this->db->select('DISTINCT nombre', false);
        $this->db->from('conceptos');
        $this->db->order_by('nombre');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function conceptos_por_ids($conceptos_id = array())
    {
        $result = array();
        $this->db->select('c.*, o.nombre as obra_nombre');
        $this->db->from('conceptos c');
        $this->db->join('obras o', 'c.obras_id = o.obras_id', 'inner');
        $query = $this->db->where_in('c.conceptos_id', $conceptos_id)->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function conceptos_por_obras_id($obras_id = 0)
    {
        $result = array();
        $this->db->select('c.*, o.nombre as obra_nombre');
        $this->db->from('conceptos c');
        $this->db->join('obras o', 'c.obras_id = o.obras_id', 'inner');
        $query = $this->db->where('c.obras_id', $obras_id)->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function conceptos_todos($order = 'conceptos_id')
    {
        $result = array();
        $this->db->select('c.*, o.nombre as obra_nombre');
        $this->db->from('conceptos c');
        $this->db->join('obras o', 'c.obras_id = o.obras_id', 'inner');
        $query = $this->db->order_by($order)->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function insertar_concepto($concepto)
    {
        return $this->db->insert('conceptos', $concepto);
    }

    public function concepto_por_id($conceptos_id = 0)
    {
        $result = new stdClass();
        $query = $this->db->where('conceptos_id', $conceptos_id)->get('conceptos');
        if ($query->num_rows() > 0) {
            $result = $query->row();
        }
        return $result;
    }

    public function editar_concepto($concepto = array())
    {
        return $this->db->update('conceptos', $concepto, array('conceptos_id' => $concepto['conceptos_id']));
    }

    public function borrar_concepto($conceptos_id = 0)
    {
        return $this->db->delete('conceptos', array('conceptos_id' => $conceptos_id));
    }
}