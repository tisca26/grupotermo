<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Empresa
{
    protected $CI;

    public function __construct()
    {
        $this->CI = & get_instance();
        $this->CI->load->model('empresas_model');
    }

    public function error_consulta()
    {
        return $this->CI->empresas_model->error_consulta();
    }

    function ultimo_id()
    {
        return $this->CI->empresas_model->ultimo_id();
    }

    function limpia_datos(& $empresa = array()){
        if (isset($empresa['rfc'])){
            $empresa['rfc'] = strtoupper($empresa['rfc']);
        }
    }

    public function empresa_por_id($empresas_id = 0)
    {
        return $this->CI->empresas_model->empresa_por_id($empresas_id);
    }

    public function empresas_todos($order = 'empresas_id')
    {
        return $this->CI->empresas_model->empresas_todos($order);
    }

    public function empresas_todos_sel($order = 'empresas_id')
    {
        return $this->CI->empresas_model->empresas_todos_sel($order);
    }

    public function empresas_todos_json($order = 'empresas_id')
    {
        $empresas = $this->empresas_todos($order);
        header('Content-Type: application/json');
        echo json_encode($empresas);
    }

    public function guardar_empresa($empresa = array())
    {
        $this->limpia_datos($empresa);
        return $this->CI->empresas_model->insertar_empresa($empresa);
    }

    public function editar_empresa($empresa = array())
    {
        $this->limpia_datos($empresa);
        return $this->CI->empresas_model->editar_empresa($empresa);
    }

    public function borrado_logico_empresa($empresas_id = 0)
    {
        $empresa['empresas_id'] = $empresas_id;
        $empresa['estatus'] = 0;
        return $this->editar_empresa($empresa);
    }

    public function borrar_empresa($empresas_id = 0)
    {
        return $this->CI->empresas_model->borrar_empresa($empresas_id);
    }
}