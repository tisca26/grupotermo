<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Activos_categoria_model extends CI_Model
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

    public function activos_categoria_todos_array_sel($order = 'activos_categoria_id'){
        $result = array();
        $q_result = array();
        $query = $this->db->order_by($order)->get('activos_categoria');
        if ($query->num_rows() > 0){
            $q_result = $query->result();
            foreach ($q_result as $q){
                $result[$q->activos_categoria_id] = $q->nombre;
            }
        }
        return $result;
    }

    public function activos_categoria_todos($order = 'activos_categoria_id')
    {
        $result = array();
        $query = $this->db->order_by($order)->get('activos_categoria');
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function insertar_activo_categoria($activo_categoria)
    {
        return $this->db->insert('activos_categoria', $activo_categoria);
    }

    public function activo_categoria_por_id($activos_categoria_id = 0)
    {
        $result = new stdClass();
        $query = $this->db->where('activos_categoria_id', $activos_categoria_id)->get('activos_categoria');
        if ($query->num_rows() > 0) {
            $result = $query->row();
        }
        return $result;
    }

    public function editar_activo_categoria($activo_categoria = array())
    {
        return $this->db->update('activos_categoria', $activo_categoria, array('activos_categoria_id' => $activo_categoria['activos_categoria_id']));
    }

    public function borrar_activo_categoria($activos_categoria_id = 0)
    {
        return $this->db->delete('activos_categoria', array('activos_categoria_id' => $activos_categoria_id));
    }
}