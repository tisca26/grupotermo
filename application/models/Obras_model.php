<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Obras_model extends CI_Model
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

    public function obras_todos($order = 'obras_id')
    {
        $result = array();
        $query = $this->db->order_by($order)->get('obras');
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function insertar_obra($obra)
    {
        return $this->db->insert('obras', $obra);
    }

    public function obra_por_id($obras_id = 0)
    {
        $result = new stdClass();
        $query = $this->db->where('obras_id', $obras_id)->get('obras');
        if ($query->num_rows() > 0) {
            $result = $query->row();
        }
        return $result;
    }

    public function editar_obra($obra = array())
    {
        return $this->db->update('obras', $obra, array('obras_id' => $obra['obras_id']));
    }

    public function borrar_obra($obras_id = 0)
    {
        return $this->db->delete('obras', array('obras_id' => $obras_id));
    }

    public function obras_todos_array($order_id = 'obras_id')
    {
        $results = $this->obras_todos($order_id);
        $my_array = array();
        foreach ($results as $obra){
            $my_array[$obra->obras_id] = $obra->nombre;
        }
        $my_array[6] = 'Otro';
        return $my_array;
    }

    public function obras_por_empresas_id ($empresas_id = 0)
    {
        $result = array();
        $query = $this->db->where('empresas_id', $empresas_id)->get('obras');
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }
}