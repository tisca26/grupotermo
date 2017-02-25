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

    public function insertar_periodo_de_pago($periodo = array()){
        return $this->db->insert('periodo_de_pago', $periodo);
    }

    public function periodo_de_pago_por_id($periodo_id = 0)
    {
        $result = new stdClass();
        $query = $this->db->where('periodo_de_pago_id', $periodo_id)->get('periodo_de_pago');
        if ($query->num_rows() > 0) {
            $result = $query->row();
        }
        return $result;
    }

    public function editar_periodo_de_pago($periodo = array())
    {
        return $this->db->update('periodo_de_pago', $periodo, array('periodo_de_pago_id' => $periodo['periodo_de_pago_id']));
    }

    public function borrar_periodo_de_pago($periodo_de_pago_id = 0){
        return $this->db->delete('periodo_de_pago',array('periodo_de_pago_id'=>$periodo_de_pago_id));
    }
}