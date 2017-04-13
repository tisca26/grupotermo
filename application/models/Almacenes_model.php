<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Almacenes_model extends CI_Model
{
    public function __construct()
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

    public function almacenes_todos($order = 'almacenes_id')
    {
        $result = array();
        $query = $this->db->order_by($order)->get('almacenes');
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function insertar_almacen($almacen = array())
    {
        return $this->db->insert('almacenes', $almacen);
    }

    public function almacen_por_id($almacen_id = 0)
    {
        $result = new stdClass();
        $query = $this->db->where('almacenes_id', $almacen_id)->get('almacenes');
        if ($query->num_rows() > 0) {
            $result = $query->row();
        }
        return $result;
    }

    public function editar_almacen($almacen = array())
    {
        return $this->db->update('almacenes', $almacen, array('almacenes_id' => $almacen['almacenes_id']));
    }

    public function borrar_almacen($almacenes_id = 0)
    {
        return $this->db->delete('almacenes', array('almacenes_id' => $almacenes_id));
    }

}