<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Servicios_model extends CI_Model
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

    public function servicios_todos($order = 'servicios_id')
    {
        $result = array();
        $query = $this->db->order_by($order)->get('servicios');
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function insertar_servicio($servicio = array())
    {
        return $this->db->insert('servicios', $servicio);
    }

    public function servicio_por_id($servicios_id = 0)
    {
        $result = new stdClass();
        $query = $this->db->where('servicios_id', $servicios_id)->get('servicios');
        if ($query->num_rows() > 0) {
            $result = $query->row();
        }
        return $result;
    }

    public function editar_servicio($servicio = array())
    {
        return $this->db->update('servicios', $servicio, array('servicios_id' => $servicio['servicios_id']));
    }

    public function borrar_servicio($servicios_id = 0)
    {
        return $this->db->delete('servicios', array('servicios_id' => $servicios_id));
    }

    public function insertar_rel_servicio_categoria($rel_servicio = array())
    {
        return $this->db->insert('servicios_cat', $rel_servicio);
    }

    public function rel_servicio_categoria_sel($servicios_id = 0)
    {
        $result = array();
        $q = $this->db->where('servicios_id', $servicios_id)->get('servicios_cat');
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $res) {
                $result[] = $res->servicios_categoria_id;
            }
        }
        return $result;
    }

    public function borrar_rel_servicio_categoria($servicios_id = 0)
    {
        return $this->db->delete('servicios_cat', array('servicios_id' => $servicios_id));
    }
}