<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Zona
{
    protected $CI;

    public function __construct()
    {
        $this->CI = & get_instance();

        $this->CI->load->business('obra_etapa_fase_zona_concepto', 'oefzc');
        $this->CI->load->model('zonas_model');
    }

    public function error_consulta()
    {
        return $this->CI->zonas_model->error_consulta();
    }

    public function ultimo_id()
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

    public function zonas_por_obra_id_json($obras_id = 0)
    {
        $zonas = $this->CI->zonas_model->zonas_por_obras_id($obras_id);
        header('Content-Type: application/json');
        echo json_encode($zonas);
    }

    public function insertar_zona($zona = array())
    {
        $result['status'] = false;
        $obras_id = $zona['obras_id'];
        unset($zona['obras_id']);
        $result['status'] = $this->CI->zonas_model->insertar_zona($zona);
        $result['error'] = ($result['status'] == false)? $this->error_consulta() : '';
        $zonas_id = $this->ultimo_id();
        $result['last_id'] = $zonas_id;
        $oefzc['obras_id'] = $obras_id;
        $oefzc['zonas_id'] = $zonas_id;
        $this->CI->oefzc->insertar_oefzc($oefzc);
        return $result;
    }

}