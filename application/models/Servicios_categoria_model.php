<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Servicios_categoria_model extends CI_Model
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

    public function servicios_categoria_todos_array_sel($order = 'servicios_categoria_id'){
        $result = array();
        $q_result = array();
        $query = $this->db->order_by($order)->get('servicios_categoria');
        if ($query->num_rows() > 0){
            $q_result = $query->result();
            foreach ($q_result as $q){
                $result[$q->servicios_categoria_id] = $q->nombre;
            }
        }
        return $result;
    }

    public function servicios_categoria_todos($order = 'servicios_categoria_id')
    {
        $result = array();
        $query = $this->db->order_by($order)->get('servicios_categoria');
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function insertar_servicio_categoria($servicio_categoria)
    {
        return $this->db->insert('servicios_categoria', $servicio_categoria);
    }

    public function servicio_categoria_por_id($servicios_categoria_id = 0)
    {
        $result = new stdClass();
        $query = $this->db->where('servicios_categoria_id', $servicios_categoria_id)->get('servicios_categoria');
        if ($query->num_rows() > 0) {
            $result = $query->row();
        }
        return $result;
    }

    public function editar_servicio_categoria($servicio_categoria = array())
    {
        return $this->db->update('servicios_categoria', $servicio_categoria, array('servicios_categoria_id' => $servicio_categoria['servicios_categoria_id']));
    }

    public function borrar_servicio_categoria($servicios_categoria_id = 0)
    {
        return $this->db->delete('servicios_categoria', array('servicios_categoria_id' => $servicios_categoria_id));
    }
}