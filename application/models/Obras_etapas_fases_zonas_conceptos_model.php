<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Obras_etapas_fases_zonas_conceptos_model extends CI_Model
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

    public function oefzc_por_id($oefzc_id = 0)
    {
        $result = new stdClass();
        $query = $this->db->where('obras_etapas_fases_zonas_conceptos_id', $oefzc_id)->get('obras_etapas_fases_zonas_conceptos');
        if ($query->num_rows() > 0) {
            $result = $query->row();
        }
        return $result;
    }

    public function insertar_oefzc($oefzc = array())
    {
        return $this->db->insert('obras_etapas_fases_zonas_conceptos', $oefzc);
    }

    public function editar_oefc($oefzc = array())
    {
        return $this->db->update('obras_etapas_fases_zonas_conceptos', $oefzc, array('obras_etapas_fases_zonas_conceptos_id' => $oefzc['obras_etapas_fases_zonas_conceptos_id']));
    }

    public function borrar_oefzc($oefzc_id = 0)
    {
        return $this->db->delete('obras_etapas_fases_zonas_conceptos', array('obras_etapas_fases_zonas_conceptos_id' => $oefzc_id));
    }
}