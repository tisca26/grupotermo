<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Conceptos_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function ultimo_id()
    {
        return $this->db->insert_id();
    }

    public  function error_consulta()
    {
        return $this->db->error();
    }

    public function concepto_por_id($conceptos_id = 0)
    {
        $result = null;
        $query = $this->db->where('conceptos_id', $conceptos_id)->get('conceptos');
        if ($query->num_rows() > 0) {
            $result = $query->row();
        }
        return $result;
    }

    public function conceptos_por_obras_id($obras_id = 0)
    {
        $result = array();
        $this->db->select('c.*, o.nombre as obra_nombre, o.obras_id');
        $this->db->from('conceptos c');
        $this->db->join('obras_etapas_fases_zonas_conceptos oefzc', 'c.conceptos_id = oefzc.conceptos_id', 'inner');
        $this->db->where('oefzc.etapas_id', 0)->where('oefzc.fases_id', 0)->where('oefzc.zonas_id', 0);
        $this->db->join('obras o', 'o.obras_id = oefzc.obras_id', 'inner');
        $query = $this->db->where('o.obras_id', $obras_id)->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function conceptos_todos($order = 'conceptos_catalogo_id')
    {
        $result = array();
        $this->db->select('c.*, GROUP_CONCAT(v_cc.categoria) as categorias', false);
        $this->db->from('conceptos_catalogo c');
        $this->db->join('v_conceptos_catalogo v_cc', 'v_cc.conceptos_catalogo_id = c.conceptos_catalogo_id', 'inner');
        $this->db->group_by('c.conceptos_catalogo_id');
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

    public function editar_concepto($concepto = array())
    {
        return $this->db->update('conceptos', $concepto, array('conceptos_id' => $concepto['conceptos_id']));
    }

    public function borrar_concepto($conceptos_id = 0)
    {
        return $this->db->delete('conceptos', array('conceptos_id' => $conceptos_id));
    }
}