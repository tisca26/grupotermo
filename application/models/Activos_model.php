<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Activos_model extends CI_Model
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

    public function activos_todos($order = 'activos_id')
    {
        $result = array();
        $query = $this->db->order_by($order)->get('activos');
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function insertar_activo($activo = array())
    {
        return $this->db->insert('activos', $activo);
    }

    public function activo_por_id($activos_id = 0)
    {
        $result = new stdClass();
        $query = $this->db->where('activos_id', $activos_id)->get('activos');
        if ($query->num_rows() > 0) {
            $result = $query->row();
        }
        return $result;
    }

    public function editar_activo($activo = array())
    {
        return $this->db->update('activos', $activo, array('activos_id' => $activo['activos_id']));
    }

    public function borrar_activo($activos_id = 0)
    {
        return $this->db->delete('activos', array('activos_id' => $activos_id));
    }

    public function insertar_rel_activo_categoria($rel_activo = array())
    {
        return $this->db->insert('activos_cat', $rel_activo);
    }

    public function rel_activo_categoria_sel($activos_id = 0)
    {
        $result = array();
        $q = $this->db->where('activos_id', $activos_id)->get('activos_cat');
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $res) {
                $result[] = $res->activos_categoria_id;
            }
        }
        return $result;
    }

    public function borrar_rel_activo_categoria($activos_id = 0)
    {
        return $this->db->delete('activos_cat', array('activos_id' => $activos_id));
    }
}