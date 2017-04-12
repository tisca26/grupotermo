<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Etapa
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->business('obra_etapa_fase_zona_concepto', 'oefzc');
        $this->CI->load->model('etapas_model');
    }

    public function ultimo_id()
    {
        return $this->CI->etapas_model->ultimo_id();
    }

    public function error_consulta()
    {
        return $this->CI->etapas_model->error_consulta();
    }

    public function etapa_por_id($etapas_id = 0)
    {
        return $this->CI->etapas_model->etapa_por_id($etapas_id);
    }

    public function etapas_por_obras_id($obras_id = 0)
    {
        return $this->CI->etapas_model->etapas_por_obras_id($obras_id);
    }

    public function etapas_por_obras_id_json($obras_id = 0)
    {
        $etapas = $this->CI->etapas_model->etapas_por_obras_id($obras_id);
        header('Content-Type: application/json');
        echo json_encode($etapas);
    }

    public function etapas_por_obras_id_array_sel($obras_id = 0)
    {
        $etapas = $this->CI->etapas_model->etapas_por_obras_id($obras_id);
        $result = array();
        foreach ($etapas as $etapa) {
            $result[$etapa->etapas_id] = $etapa->nombre;
        }
        return $result;
    }

    public function insertar_etapa($etapa = array())
    {
        $result['status'] = false;
        $obras_id = $etapa['obras_id'];
        unset($etapa['obras_id']);
        $result['status'] = $this->CI->etapas_model->insertar_etapa($etapa);
        $result['error'] = ($result['status'] == false)? $this->error_consulta() : '';
        $etapas_id = $this->ultimo_id();
        $result['last_id'] = $etapas_id;
        $oefzc['obras_id'] = $obras_id;
        $oefzc['etapas_id'] = $etapas_id;
        $this->CI->oefzc->insertar_oefzc($oefzc);
        return $result;
    }
}