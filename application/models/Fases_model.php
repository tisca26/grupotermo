<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Fases_model extends CI_Model
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

    public function fases_todos($order = 'fases_id')
    {
        $result = array();
        $this->db->select('e.*, o.nombre as obra_nombre');
        $this->db->from('fases e');
        $this->db->join('obras o', 'e.obras_id = o.obras_id', 'inner');
        $query = $this->db->order_by($order)->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function insertar_fase($fase)
    {
        return $this->db->insert('fases', $fase);
    }

    public function fase_por_id($fases_id = 0)
    {
        $result = new stdClass();
        $this->db->select('e.*, o.nombre as obra_nombre');
        $this->db->from('fases e');
        $this->db->join('obras o', 'e.obras_id = o.obras_id', 'inner');
        $query = $this->db->where('e.fases_id', $fases_id)->get();
        if ($query->num_rows() > 0) {
            $result = $query->row();
        }
        return $result;
    }

    public function fases_por_obras_id($obras_id = 0)
    {
        $result = array();
        $this->db->select('e.*, o.nombre as obra_nombre');
        $this->db->from('fases e');
        $this->db->join('obras o', 'e.obras_id = o.obras_id', 'inner');
        $query = $this->db->where('e.obras_id', $obras_id)->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function editar_fase($fase = array())
    {
        return $this->db->update('fases', $fase, array('fases_id' => $fase['fases_id']));
    }

    public function borrar_fase($fases_id = 0)
    {
        return $this->db->delete('fases', array('fases_id' => $fases_id));
    }

}