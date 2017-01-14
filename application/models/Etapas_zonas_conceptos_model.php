<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Etapas_zonas_conceptos_model extends CI_Model
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

    public function conceptos_por_etapa($etapas_id = 0)
    {
        $result = array();
        $this->db->select('ezc.*,c.nombre as concepto_nombre, u.nombre as unidad, o.nombre as obra_nombre');
        $this->db->from('etapas_zonas_conceptos ezc');
        $this->db->join('etapas e', 'ezc.etapas_id = e.etapas_id', 'inner');
        $this->db->join('obras o', 'e.obras_id = o.obras_id', 'inner');
        $this->db->join('conceptos c', 'c.conceptos_id = ezc.conceptos_id', 'inner');
        $this->db->join('unidades u', 'c.unidades_id = u.unidades_id', 'inner');
        $query = $this->db->where('ezc.etapas_id', $etapas_id)->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function zonas_por_etapa($etapas_id = 0)
    {
        $result = array();
        $this->db->select('z.*');
        $this->db->from('etapas_zonas_conceptos ezc');
        $this->db->join('zonas z', 'z.zonas_id = ezc.zonas_id', 'inner');
        $this->db->group_by('ezc.zonas_id');
        $query = $this->db->where('ezc.etapas_id', $etapas_id)->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function conceptos_por_etapa_zona($etapas_id = 0, $zonas_id = 0)
    {
        $result = array();
        $this->db->select('ezc.*,c.nombre as concepto_nombre, c.clave as concepto_clave, c.descripcion_corta as concepto_desc_corta, u.nombre as unidad');
        $this->db->from('etapas_zonas_conceptos ezc');
        $this->db->join('conceptos c', 'c.conceptos_id = ezc.conceptos_id', 'inner');
        $this->db->join('unidades u', 'c.unidades_id = u.unidades_id', 'inner');
        $query = $this->db->where('ezc.etapas_id', $etapas_id)->where('ezc.zonas_id', $zonas_id)->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function etapas_zonas_conceptos_todos($order = 'etapas_zonas_conceptos_id')
    {
        $result = array();
        $this->db->select('ezc.*, o.nombre as obra_nombre');
        $this->db->from('etapas_zonas_conceptos ezc');
        $this->db->join('etapas e', 'ezc.etapas_id = e.etapas_id', 'inner');
        $this->db->join('obras o', 'e.obras_id = o.obras_id', 'inner');
        $query = $this->db->order_by($order)->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function insertar_etapa_zona_concepto($etapa_zona_concepto)
    {
        return $this->db->insert('etapas_zonas_conceptos', $etapa_zona_concepto);
    }

    public function etapa_zona_concepto_por_id($etapas_zonas_conceptos_id = 0)
    {
        $result = new stdClass();
        $query = $this->db->where('etapas_zonas_conceptos_id', $etapas_zonas_conceptos_id)->get('etapas_zonas_conceptos');
        if ($query->num_rows() > 0) {
            $result = $query->row();
        }
        return $result;
    }

    public function editar_etapa_zona_concepto($etapa_zona_concepto = array())
    {
        return $this->db->update('etapas_zonas_conceptos', $etapa_zona_concepto, array('etapas_zonas_conceptos_id' => $etapa_zona_concepto['etapas_zonas_conceptos_id']));
    }

    public function borrar_etapa_zona_concepto($etapas_zonas_conceptos_id = 0)
    {
        return $this->db->delete('etapas_zonas_conceptos', array('etapas_zonas_conceptos_id' => $etapas_zonas_conceptos_id));
    }
}