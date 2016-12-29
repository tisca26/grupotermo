<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Materiales_categoria_model extends CI_Model
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

    public function materiales_categoria_todos_array_sel($order = 'materiales_categoria_id'){
        $result = array();
        $q_result = array();
        $query = $this->db->order_by($order)->get('materiales_categoria');
        if ($query->num_rows() > 0){
            $q_result = $query->result();
            foreach ($q_result as $q){
                $result[$q->materiales_categoria_id] = $q->nombre;
            }
        }
        return $result;
    }

    public function materiales_categoria_todos($order = 'materiales_categoria_id')
    {
        $result = array();
        $query = $this->db->order_by($order)->get('materiales_categoria');
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function insertar_material_categoria($material_categoria)
    {
        return $this->db->insert('materiales_categoria', $material_categoria);
    }

    public function material_categoria_por_id($materiales_categoria_id = 0)
    {
        $result = new stdClass();
        $query = $this->db->where('materiales_categoria_id', $materiales_categoria_id)->get('materiales_categoria');
        if ($query->num_rows() > 0) {
            $result = $query->row();
        }
        return $result;
    }

    public function editar_material_categoria($material_categoria = array())
    {
        return $this->db->update('materiales_categoria', $material_categoria, array('materiales_categoria_id' => $material_categoria['materiales_categoria_id']));
    }

    public function borrar_material_categoria($materiales_categoria_id = 0)
    {
        return $this->db->delete('materiales_categoria', array('materiales_categoria_id' => $materiales_categoria_id));
    }
}