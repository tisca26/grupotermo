<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Zona
{
    protected $CI;

    public function __construct()
    {
        $this->CI = & get_instance();

        $this->CI->load->model('etapas_zonas_conceptos_model');
        $this->CI->load->model('etapas_model');
        $this->CI->load->model('obras_model');
        $this->CI->load->model('zonas_model');
    }

    public function inserta_zona_por_etapas_id($zonas_id = 0, $etapas_id = array())
    {
        if (!is_array($etapas_id)){
            return false;
        }
        foreach ($etapas_id as $etapa_id){
            $ezc = array();
            $ezc['zonas_id'] = $zonas_id;
            $ezc['etapas_id'] = $etapa_id;
            $this->CI->etapas_zonas_conceptos_model->insertar_etapa_zona_concepto($ezc);
        }
        return true;
    }
}