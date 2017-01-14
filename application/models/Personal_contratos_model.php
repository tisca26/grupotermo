<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Personal_contratos_model extends CI_Model
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

    public function personal_contratos_todos_sel($order = 'personal_contratos_id')
    {
        $result = array();
        $query = $this->db->order_by($order)->get('personal_contratos');
        if ($query->num_rows() > 0) {
            $contratos = $query->result();
            foreach ($contratos as $contrato){
                $result[$contrato->personal_contratos_id] = $contrato->nombre;
            }
        }
        return $result;
    }
}