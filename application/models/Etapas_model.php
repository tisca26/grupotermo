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
        $this->db->select('e.*, o.nombre as obra_nombre, o.obras_id');
        $this->db->from('etapas e');
        $this->db->join('obras_etapas_fases_zonas_conceptos oefzc', 'e.etapas_id = oefzc.etapas_id', 'inner');
        $this->db->where('oefzc.fases_id', 0)->where('oefzc.zonas_id', 0)->where('oefzc.conceptos_id', 0);
        $this->db->join('obras o', 'o.obras_id = oefzc.obras_id', 'inner');
        $query = $this->db->order_by('e.' . $order)->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function etapa_por_id($etapas_id = 0)
    {
        $result = new stdClass();
        $this->db->select('e.*, o.nombre as obra_nombre, o.obras_id');
        $this->db->from('etapas e');
        $this->db->join('obras_etapas_fases_zonas_conceptos oefzc', 'e.etapas_id = oefzc.etapas_id', 'inner');
        $this->db->where('oefzc.fases_id', 0)->where('oefzc.zonas_id', 0)->where('oefzc.conceptos_id', 0);
        $this->db->join('obras o', 'o.obras_id = oefzc.obras_id', 'inner');
        $query = $this->db->where('e.etapas_id', $etapas_id)->get();
        if ($query->num_rows() > 0) {
            $result = $query->row();
        }
        return $result;
    }

    public function etapas_por_obras_id($obras_id = 0)
    {
        $result = array();
        $this->db->select('e.*, o.nombre as obra_nombre, o.obras_id, oefzc.obras_etapas_fases_zonas_conceptos_id,');
        $this->db->from('etapas e');
        $this->db->join('obras_etapas_fases_zonas_conceptos oefzc', 'e.etapas_id = oefzc.etapas_id', 'inner');
        $this->db->where('oefzc.fases_id', 0)->where('oefzc.zonas_id', 0)->where('oefzc.conceptos_id', 0);
        $this->db->join('obras o', 'o.obras_id = oefzc.obras_id', 'inner');

        $query = $this->db->where('o.obras_id', $obras_id)->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function insertar_etapa($etapa)
    {
        return $this->db->insert('etapas', $etapa);
    }

    public function editar_etapa($etapa = array())
    {
        return $this->db->update('etapas', $etapa, array('etapas_id' => $etapa['etapas_id']));
    }

    public function borrar_etapa($etapas_id = 0)
    {
        return $this->db->delete('etapas', array('etapas_id' => $etapas_id));
    }
}