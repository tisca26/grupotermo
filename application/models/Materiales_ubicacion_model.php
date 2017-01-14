<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Materiales_ubicacion_model extends CI_Model
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

    public function materiales_ubicacion_todos($order = 'materiales_ubicacion_id')
    {
        $result = array();
        $query = $this->db->order_by($order)->get('materiales_ubicacion');
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function insertar_material_ubicacion($material_ubicacion = array())
    {
        return $this->db->insert('materiales_ubicacion', $material_ubicacion);
    }

    public function material_ubicacion_por_id($materiales_ubicacion_id = 0)
    {
        $result = new stdClass();
        $query = $this->db->where('materiales_ubicacion_id', $materiales_ubicacion_id)->get('materiales_ubicacion');
        if ($query->num_rows() > 0) {
            $result = $query->row();
        }
        return $result;
    }

    public function editar_material_ubicacion($material_ubicacion = array())
    {
        return $this->db->update('materiales_ubicacion', $material_ubicacion, array('materiales_ubicacion_id' => $material_ubicacion['materiales_ubicacion_id']));
    }

    public function borrar_material_ubicacion($materiales_ubicacion_id = 0)
    {
        return $this->db->delete('materiales_ubicacion', array('materiales_ubicacion_id' => $materiales_ubicacion_id));
    }
}