<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Unidades_model extends CI_Model
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

    public function unidades_todos($order = 'unidades_id')
    {
        $result = array();
        $query = $this->db->order_by($order)->get('unidades');
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function insertar_unidad($unidad)
    {
        return $this->db->insert('unidades', $unidad);
    }

    public function unidad_por_id($unidades_id = 0)
    {
        $result = new stdClass();
        $query = $this->db->where('unidades_id', $unidades_id)->get('unidades');
        if ($query->num_rows() > 0) {
            $result = $query->row();
        }
        return $result;
    }

    public function editar_unidad($unidad = array())
    {
        return $this->db->update('unidades', $unidad, array('unidades_id' => $unidad['unidades_id']));
    }

    public function borrar_unidad($unidades_id = 0)
    {
        return $this->db->delete('unidades', array('unidades_id' => $unidades_id));
    }

    public function unidades_todos_sel($order_id = 'unidades_id')
    {
        $results = $this->unidades_todos($order_id);
        $my_array = array();
        foreach ($results as $unidad){
            $my_array[$unidad->unidades_id] = $unidad->nombre;
        }
        return $my_array;
    }
}