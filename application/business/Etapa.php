<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Etapa
{
    protected $CI;

    public function __construct()
    {
        $this->CI = & get_instance();
        $this->CI->load->model('obras_model');
        $this->CI->load->model('etapas_model');
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
        foreach ($etapas as $etapa){
            $result[$etapa->etapas_id] = $etapa->nombre;
        }
        return $result;
    }
}