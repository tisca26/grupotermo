<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Bancos_model extends CI_Model
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

    public function bancos_todos_sel($order = 'cat_bancos_id'){
        $result = array();
        $query = $this->db->order_by($order)->get('cat_bancos');
        if ($query->num_rows() > 0){
            $q_result = $query->result();
            foreach ($q_result as $q){
                $result[$q->cat_bancos_id] = $q->nombre;
            }
        }
        return $result;
    }

    public function bancos_todos($order = 'cat_bancos_id')
    {
        $result = array();
        $query = $this->db->order_by($order)->get('cat_bancos');
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function insertar_banco($banco = array())
    {
        return $this->db->insert('cat_bancos', $banco);
    }

    public function banco_por_id($bancos_id = 0)
    {
        $result = new stdClass();
        $query = $this->db->where('cat_bancos_id', $bancos_id)->get('cat_bancos');
        if ($query->num_rows() > 0) {
            $result = $query->row();
        }
        return $result;
    }

    public function editar_bancos($bancos = array())
    {
        return $this->db->update('cat_bancos', $bancos, array('cat_bancos_id' => $bancos['cat_bancos_id']));
    }

    public function borrar_bancos($bancos_id = 0)
    {
        return $this->db->delete('cat_bancos', array('cat_bancos_id' => $bancos_id));
    }
}