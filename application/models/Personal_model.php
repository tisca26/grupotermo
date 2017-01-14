<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Personal_model extends CI_Model
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

    public function personal_todos($order = 'personal_id')
    {
        $result = array();
        $query = $this->db->order_by($order)->get('personal');
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function insertar_personal($personal = array())
    {
        return $this->db->insert('personal', $personal);
    }

    public function personal_por_id($personal_id = 0)
    {
        $result = new stdClass();
        $query = $this->db->where('personal_id', $personal_id)->get('personal');
        if ($query->num_rows() > 0) {
            $result = $query->row();
        }
        return $result;
    }

    public function editar_personal($personal = array())
    {
        return $this->db->update('personal', $personal, array('personal_id' => $personal['personal_id']));
    }

    public function borrar_personal($personal_id = 0)
    {
        return $this->db->delete('personal', array('personal_id' => $personal_id));
    }
}