<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Zonas_model extends CI_Model
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

    public function zonas_todos($order = 'zonas_id')
    {
        $result = array();
        $this->db->select('z.*, o.nombre as obra_nombre');
        $this->db->from('zonas z');
        $this->db->join('obras o', 'z.obras_id = o.obras_id', 'inner');
        $query = $this->db->order_by($order)->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function insertar_zona($zona)
    {
        return $this->db->insert('zonas', $zona);
    }

    public function zona_por_id($zonas_id = 0)
    {
        $result = new stdClass();
        $query = $this->db->where('zonas_id', $zonas_id)->get('zonas');
        if ($query->num_rows() > 0) {
            $result = $query->row();
        }
        return $result;
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