<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tipos_regimen_model extends CI_Model
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

    public function tipos_regimen_todos_sel($order = 'tipos_regimen_id')
    {
        $result = array();
        $query = $this->db->order_by($order)->get('tipos_regimen');
        if ($query->num_rows() > 0) {
            $regimenes = $query->result();
            foreach ($regimenes as $regimen){
                $result[$regimen->tipos_regimen_id] = $regimen->nombre;
            }
        }
        return $result;
    }
}