<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Periodo_de_pago_model extends CI_Model
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

    public function periodo_de_pago_todos_sel($order = 'periodo_de_pago_id')
    {
        $result = array();
        $query = $this->db->order_by($order)->get('periodo_de_pago');
        if ($query->num_rows() > 0) {
            $periodos = $query->result();
            foreach ($periodos as $periodo) {
                $result[$periodo->periodo_de_pago_id] = $periodo->nombre;
            }
        }
        return $result;
    }

    public function periodo_de_pago_todos($order = 'periodo_de_pago_id')
    {
        $result = array();
        $query = $this->db->order_by($order)->get('periodo_de_pago');
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }
}