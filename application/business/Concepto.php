<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Concepto
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->model('conceptos_model', 'con_model');
    }

    public function error_consulta()
    {
        return $this->CI->con_model->error_consulta();
    }

    public function ultimo_id()
    {
        return $this->CI->con_model->ultimo_id();
    }

    public function concepto_por_id($conceptos_id = 0)
    {
        return $this->CI->con_model->concepto_por_id($conceptos_id);
    }

    public function conceptos_todos($order = 'conceptos_catalogo_id')
    {
        return $this->CI->con_model->conceptos_todos($order);
    }

    public function conceptos_todos_sel($order = 'conceptos_id')
    {
        $conceptos = $this->conceptos_todos($order);
        $select = array();
        foreach ($conceptos as $concepto) {
            $select[$concepto->conceptos_id] = $concepto->nombre;
        }
        return $select;
    }

    public function conceptos_todos_json($order = 'conceptos_catalogo_id')
    {
        $conceptos = $this->conceptos_todos($order);
        header('Content-Type: application/json');
        echo json_encode($conceptos);
    }

    public function insertar_concepto($concepto = array())
    {
        return $this->CI->con_model->insertar_concepto($concepto);
    }

}