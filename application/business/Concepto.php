<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Concepto
{
    protected $CI;

    public function __construct()
    {
        $this->CI = & get_instance();

        $this->CI->load->model('conceptos_model');
    }

    public function error_consulta()
    {
        return $this->CI->conceptos_model->error_consulta();
    }

    function ultimo_id()
    {
        return $this->CI->conceptos_model->ultimo_id();
    }

    public function concepto_por_id($conceptos_id = 0)
    {
        return $this->CI->conceptos_model->concepto_por_id($conceptos_id);
    }

    public function conceptos_todos($order = 'conceptos_id')
    {
        return $this->CI->conceptos_model->conceptos_todos($order);
    }

    public function conceptos_todos_sel($order = 'conceptos_id')
    {
        $conceptos = $this->conceptos_todos($order);
        $select = array();
        foreach ($conceptos as $concepto){
            $select[$concepto->conceptos_id] = $concepto->nombre;
        }
        return $select;
    }

    public function conceptos_todos_json($order = 'conceptos_id')
    {
        $conceptos = $this->conceptos_todos($order);
        header('Content-Type: application/json');
        echo json_encode($conceptos);
    }

    function insertar_concepto($concepto = array())
    {
        return $this->CI->conceptos_model->insertar_concepto($concepto);
    }
}