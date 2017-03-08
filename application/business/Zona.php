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

    public function error_consulta()
    {
        return $this->CI->zonas_model->error_consulta();
    }

    function ultimo_id()
    {
        return $this->CI->zonas_model->ultimo_id();
    }

    public function zona_por_id($zonas_id = 0)
    {
        return $this->CI->zonas_model->zona_por_id($zonas_id);
    }

    public function zonas_todos($order = 'zonas_id')
    {
        return $this->CI->zonas_model->zonas_todos($order);
    }

    public function zonas_todos_sel($order = 'zonas_id')
    {
        $zonas = $this->zonas_todos($order);
        $select = array();
        foreach ($zonas as $zona){
            $select[$zona->zonas_id] = $zona->nombre;
        }
        return $select;
    }

    public function zonas_todos_json($order = 'zonas_id')
    {
        $zonas = $this->zonas_todos($order);
        header('Content-Type: application/json');
        echo json_encode($zonas);
    }

    function insertar_zona($zona = array())
    {
        return $this->CI->zonas_model->insertar_zona($zona);
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