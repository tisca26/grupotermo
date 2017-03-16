<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Obra_etapa_fase_zona_concepto
{
    protected $CI;

    public function __construct()
    {
        $this->CI = & get_instance();

        $this->CI->load->model('obras_etapas_fases_zonas_conceptos_model', 'oefzc_model');
    }

    public function error_consulta()
    {
        return $this->CI->oefzc_model->error_consulta();
    }

    public function ultimo_id()
    {
        return $this->CI->oefzc_model->ultimo_id();
    }
    public function insertar_oefzc($oefzc = array())
    {
        return $this->CI->oefzc_model->insertar_oefzc($oefzc);
    }


}