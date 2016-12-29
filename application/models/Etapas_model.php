<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Etapas_model extends CI_Model
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

    public function etapas_todos($order = 'etapas_id')
    {
        $result = array();
        $this->db->select('e.*, o.nombre as obra_nombre');
        $this->db->from('etapas e');
        $this->db->join('obras o', 'e.obras_id = o.obras_id', 'inner');
        $query = $this->db->order_by($order)->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function insertar_etapa($etapa)
    {
        return $this->db->insert('etapas', $etapa);
    }

    public function etapa_por_id($etapas_id = 0)
    {
        $result = new stdClass();
        $this->db->select('e.*, o.nombre as obra_nombre');
        $this->db->from('etapas e');
        $this->db->join('obras o', 'e.obras_id = o.obras_id', 'inner');
        $query = $this->db->where('e.etapas_id', $etapas_id)->get();
        if ($query->num_rows() > 0) {
            $result = $query->row();
        }
        return $result;
    }

    public function etapas_por_obras_id($obras_id = 0)
    {
        $result = array();
        $this->db->select('e.*, o.nombre as obra_nombre');
        $this->db->from('etapas e');
        $this->db->join('obras o', 'e.obras_id = o.obras_id', 'inner');
        $query = $this->db->where('e.obras_id', $obras_id)->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function editar_etapa($etapa = array())
    {
        return $this->db->update('etapas', $etapa, array('etapas_id' => $etapa['etapas_id']));
    }

    public function borrar_etapa($etapas_id = 0)
    {
        return $this->db->delete('etapas', array('etapas_id' => $etapas_id));
    }

    public function etapas_todos_array($order_id = 'etapas_id')
    {
        $results = $this->etapas_todos($order_id);
        $my_array = array();
        foreach ($results as $etapa){
            $my_array[$etapa->etapas_id] = $etapa->nombre;
        }
        return $my_array;
    }
}