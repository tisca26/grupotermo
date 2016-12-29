<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mano_de_obra_model extends CI_Model
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

    public function mano_de_obra_todos($order = 'mano_de_obra_id')
    {
        $result = array();
        $query = $this->db->order_by($order)->get('mano_de_obra');
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function insertar_mano($mano = array())
    {
        return $this->db->insert('mano_de_obra', $mano);
    }

    public function mano_por_id($mano_de_obra_id = 0)
    {
        $result = new stdClass();
        $query = $this->db->where('mano_de_obra_id', $mano_de_obra_id)->get('mano_de_obra');
        if ($query->num_rows() > 0) {
            $result = $query->row();
        }
        return $result;
    }

    public function editar_mano($mano = array())
    {
        return $this->db->update('mano_de_obra', $mano, array('mano_de_obra_id' => $mano['mano_de_obra_id']));
    }

    public function borrar_mano($mano_de_obra_id = 0)
    {
        return $this->db->delete('mano_de_obra', array('mano_de_obra_id' => $mano_de_obra_id));
    }
}