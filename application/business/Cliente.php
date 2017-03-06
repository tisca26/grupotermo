<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cliente
{
    protected $CI;

    public function __construct()
    {
        $this->CI = & get_instance();
        $this->CI->load->model('clientes_model');
    }

    public function error_consulta()
    {
        return $this->CI->clientes_model->error_consulta();
    }

    function ultimo_id()
    {
        return $this->CI->clientes_model->ultimo_id();
    }

    function limpia_datos(& $cliente = array()){
        if (isset($cliente['rfc'])){
            $cliente['rfc'] = strtoupper($cliente['rfc']);
        }
    }

    public function cliente_por_id($cliente_id = 0)
    {
        return $this->CI->clientes_model->cliente_por_id($cliente_id);
    }

    public function clientes_todos($order = 'clientes_id')
    {
        return $this->CI->clientes_model->clientes_todos($order);
    }

    public function clientes_todos_sel($order = 'clientes_id')
    {
        return $this->CI->clientes_model->clientes_todos_sel($order);
    }

    public function clientes_todos_json($order = 'clientes_id')
    {
        $clientes = $this->clientes_todos($order);
        header('Content-Type: application/json');
        echo json_encode($clientes);
    }

    public function insertar_cliente($cliente = array())
    {
        $this->limpia_datos($cliente);
        return $this->CI->clientes_model->insertar_cliente($cliente);
    }

    public function editar_cliente($cliente = array())
    {
        $this->limpia_datos($cliente);
        return $this->CI->clientes_model->editar_cliente($cliente);
    }

    public function borrado_logico_cliente($clientes_id = 0)
    {
        $cliente['clientes_id'] = $clientes_id;
        $cliente['estatus'] = 0;
        return $this->editar_cliente($cliente);
    }

    public function borrar_cliente($clientes_id = 0)
    {
        return $this->CI->clientes_model->borrar_cliente($clientes_id);
    }
}