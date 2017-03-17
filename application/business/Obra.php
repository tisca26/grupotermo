<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Obra
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->business('obra_etapa_fase_zona_concepto', 'oefzc');
        $this->CI->load->model('obras_model');
    }

    public function ultimo_id()
    {
        return $this->CI->obras_model->ultimo_id();
    }

    public function error_consulta()
    {
        return $this->CI->db->error();
    }

    public function obra_estatus($obras_id = 0)
    {
        return $this->obra_por_id($obras_id)->estatus;
    }

    public function obra_por_id($obras_id = 0)
    {
        return $this->CI->obras_model->obra_por_id($obras_id);
    }

    public function insertar_obra($obra = array())
    {
        $result['status'] = false;
        $result['status'] = $this->CI->obras_model->insertar_obra($obra);
        $result['error'] = ($result['status'] == false)? $this->error_consulta() : '';
        $obras_id = $this->ultimo_id();
        $result['last_id'] = $obras_id;
        $oefzc['obras_id'] = $obras_id;
        $this->CI->oefzc->insertar_oefzc($oefzc);
        return $result;
    }

    public function editar_obra($obra = array())
    {
        return $this->CI->obras_model->editar_obra($obra);
    }

    public function borrar_obra_logico($obras_id = 0)
    {
        $obra_edit['obras_id'] = $obras_id;
        $obra_edit['estatus'] = ESTATUS_INACTIVO;
        $obra = $this->CI->obras_model->editar_obra($obra_edit);
        return $obra;
    }

    public function obras_todos_sel($order_id = 'obras_id')
    {
        $results = $this->CI->obras_model->obras_todos($order_id);
        $my_array = array();
        foreach ($results as $obra){
            $my_array[$obra->obras_id] = $obra->nombre;
        }
        return $my_array;
    }

}