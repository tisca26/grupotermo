<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Zonas_model extends CI_Model
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

    public function zona_por_id($zonas_id = 0)
    {
        $result = new stdClass();
        $this->db->select('z.*, o.nombre as obra_nombre, o.obras_id');
        $this->db->from('zonas z');
        $this->db->join('obras_etapas_fases_zonas_conceptos oefzc', 'z.zonas_id = oefzc.zonas_id', 'inner');
        $this->db->where('oefzc.etapas_id', 0)->where('oefzc.fases_id', 0)->where('oefzc.conceptos_id', 0);
        $this->db->join('obras o', 'o.obras_id = oefzc.obras_id', 'inner');
        $query = $this->db->where('z.zonas_id', $zonas_id)->get();
        if ($query->num_rows() > 0) {
            $result = $query->row();
        }
        return $result;
    }

    public function zonas_por_obras_id($obras_id = 0)
    {
        $result = array();
        $this->db->select('z.*, o.nombre as obra_nombre, o.obras_id');
        $this->db->from('zonas z');
        $this->db->join('obras_etapas_fases_zonas_conceptos oefzc', 'z.zonas_id = oefzc.zonas_id', 'inner');
        $this->db->where('oefzc.etapas_id', 0)->where('oefzc.fases_id', 0)->where('oefzc.conceptos_id', 0);
        $this->db->join('obras o', 'o.obras_id = oefzc.obras_id', 'inner');
        $query = $this->db->where('o.obras_id', $obras_id)->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function zonas_por_ids($zonas_ids = array())
    {
        $this->db->select('z.*, o.nombre as obra_nombre, o.obras_id');
        $this->db->from('zonas z');
        $this->db->join('obras_etapas_fases_zonas_conceptos oefzc', 'z.zonas_id = oefzc.zonas_id', 'inner');
        $this->db->where('oefzc.etapas_id', 0)->where('oefzc.fases_id', 0)->where('oefzc.conceptos_id', 0);
        $this->db->join('obras o', 'o.obras_id = oefzc.obras_id', 'inner');
        $query = $this->db->where_in('z.zonas_id', $zonas_ids)->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function zonas_todos($order = 'zonas_id')
    {
        $result = array();
        $this->db->select('z.*, o.nombre as obra_nombre, o.obras_id');
        $this->db->from('zonas z');
        $this->db->join('obras_etapas_fases_zonas_conceptos oefzc', 'z.zonas_id = oefzc.zonas_id', 'inner');
        $this->db->where('oefzc.etapas_id', 0)->where('oefzc.fases_id', 0)->where('oefzc.conceptos_id', 0);
        $this->db->join('obras o', 'o.obras_id = oefzc.obras_id', 'inner');
        $query = $this->db->order_by('z.' . $order)->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function zonas_por_obra_etapa_fases_id($obras_id = 0, $etapas_id = 0, $fases_id = 0)
    {
        $result = array();
        $this->db->select('z.*, oefzc.obras_etapas_fases_zonas_conceptos_id, oefzc.obras_id, oefzc.etapas_id, oefzc.fases_id, oefzc.fecha_inicio, oefzc.fecha_fin');
        $this->db->from('zonas z');
        $this->db->join('obras_etapas_fases_zonas_conceptos oefzc', 'z.zonas_id = oefzc.zonas_id', 'inner');
        $this->db->where('oefzc.obras_id', $obras_id)->where('oefzc.etapas_id', $etapas_id)->where('oefzc.fases_id', $fases_id)->where('oefzc.zonas_id !=', 0);
        $query = $this->db->group_by('oefzc.zonas_id')->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function insertar_zona($zona)
    {
        return $this->db->insert('zonas', $zona);
    }

    public function editar_zona($zona = array())
    {
        return $this->db->update('zonas', $zona, array('zonas_id' => $zona['zonas_id']));
    }

    public function borrar_zona($zonas_id = 0)
    {
        return $this->db->delete('zonas', array('zonas_id' => $zonas_id));
    }
}