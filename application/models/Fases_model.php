<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Fases_model extends CI_Model
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

    public function fase_por_id($fases_id = 0)
    {
        $result = new stdClass();
        $this->db->select('f.*, o.nombre as obra_nombre, o.obras_id');
        $this->db->from('fases f');
        $this->db->join('obras_etapas_fases_zonas_conceptos oefzc', 'f.fases_id = oefzc.fases_id', 'inner');
        $this->db->where('oefzc.etapas_id', 0)->where('oefzc.zonas_id', 0)->where('oefzc.conceptos_id', 0);
        $this->db->join('obras o', 'o.obras_id = oefzc.obras_id', 'inner');
        $query = $this->db->where('f.fases_id', $fases_id)->get();
        if ($query->num_rows() > 0) {
            $result = $query->row();
        }
        return $result;
    }

    public function fases_por_obras_id($obras_id = 0)
    {
        $result = array();
        $this->db->select('f.*, o.nombre as obra_nombre, o.obras_id');
        $this->db->from('fases f');
        $this->db->join('obras_etapas_fases_zonas_conceptos oefzc', 'f.fases_id = oefzc.fases_id', 'inner');
        $this->db->where('oefzc.etapas_id', 0)->where('oefzc.zonas_id', 0)->where('oefzc.conceptos_id', 0);
        $this->db->join('obras o', 'o.obras_id = oefzc.obras_id', 'inner');
        $query = $this->db->where('o.obras_id', $obras_id)->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function fases_por_obra_etapa_id($obras_id = 0, $etapas_id = 0)
    {
        $result = array();
        $this->db->select('f.*, oefzc.obras_id, oefzc.etapas_id, oefzc.fecha_inicio, oefzc.fecha_fin');
        $this->db->from('fases f');
        $this->db->join('obras_etapas_fases_zonas_conceptos oefzc', 'f.fases_id = oefzc.fases_id', 'inner');
        $this->db->where('oefzc.obras_id', $obras_id)->where('oefzc.etapas_id', $etapas_id)->where('oefzc.fases_id !=', 0);
        $query = $this->db->group_by('oefzc.fases_id')->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function fases_todos($order = 'fases_id')
    {
        $result = array();
        $this->db->select('f.*, o.nombre as obra_nombre, o.obras_id');
        $this->db->from('fases f');
        $this->db->join('obras_etapas_fases_zonas_conceptos oefzc', 'f.fases_id = oefzc.fases_id', 'inner');
        $this->db->where('oefzc.etapas_id', 0)->where('oefzc.zonas_id', 0)->where('oefzc.conceptos_id', 0);
        $this->db->join('obras o', 'o.obras_id = oefzc.obras_id', 'inner');
        $query = $this->db->order_by('f.' . $order)->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function insertar_fase($fase)
    {
        return $this->db->insert('fases', $fase);
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