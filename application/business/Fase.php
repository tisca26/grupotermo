<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Fase
{
    protected $CI;

    public function __construct()
    {
        $this->CI = & get_instance();

        $this->CI->load->business('obra_etapa_fase_zona_concepto', 'oefzc');
        $this->CI->load->model('fases_model');
    }

    public function error_consulta()
    {
        return $this->CI->fases_model->error_consulta();
    }

    public function ultimo_id()
    {
        return $this->CI->fases_model->ultimo_id();
    }

    public function fase_por_id($fases_id = 0)
    {
        return $this->CI->fases_model->fase_por_id($fases_id);
    }

    public function fases_todos($order = 'fases_id')
    {
        return $this->CI->fases_model->fases_todos($order);
    }

    public function fases_todos_sel($order = 'fases_id')
    {
        $fases = $this->fases_todos($order);
        $select = array();
        foreach ($fases as $fase){
            $select[$fase->fases_id] = $fase->nombre;
        }
        return $select;
    }

    public function fases_todos_json($order = 'fases_id')
    {
        $fases = $this->fases_todos($order);
        header('Content-Type: application/json');
        echo json_encode($fases);
    }

    public function fases_por_obra_id_json($obras_id = 0)
    {
        $fases = $this->CI->fases_model->fases_por_obras_id($obras_id);
        header('Content-Type: application/json');
        echo json_encode($fases);
    }

    public function insertar_fase($fase = array())
    {
        $result['status'] = false;
        $obras_id = $fase['obras_id'];
        unset($fase['obras_id']);
        $result['status'] = $this->CI->fases_model->insertar_fase($fase);
        $result['error'] = ($result['status'] == false)? $this->error_consulta() : '';
        $fases_id = $this->ultimo_id();
        $result['last_id'] = $fases_id;
        $oefzc['obras_id'] = $obras_id;
        $oefzc['fases_id'] = $fases_id;
        $this->CI->oefzc->insertar_oefzc($oefzc);
        return $result;

    }
    
}