<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Almacen
{
    protected $CI;

    public function __construct()
    {
        $this->CI = & get_instance();
        $this->CI->load->model('almacenes_model');
    }

    public function error_consulta()
    {
        return $this->CI->almacenes_model->error_consulta();
    }

    function ultimo_id()
    {
        return $this->CI->almacenes_model->ultimo_id();
    }

    public function almacen_por_id($almacenes_id = 0)
    {
        return $this->CI->almacenes_model->almacen_por_id($almacenes_id);
    }

    public function almacen_materiales_por_id($almacenes_id = 0)
    {
        return $this->CI->almacenes_model->almacen_materiales_por_id($almacenes_id);
    }

    public function almacen_activos_por_id($almacenes_id = 0)
    {
        return $this->CI->almacenes_model->almacen_activos_por_id($almacenes_id);
    }

    public function almacen_bitacora_completa_por_id($almacenes_id = 0)
    {
        return $this->CI->almacenes_model->almacen_bitacora_completa_por_id($almacenes_id);
    }

    public function almacenes_todos($order = 'almacenes_id')
    {
        return $this->CI->almacenes_model->almacenes_todos($order);
    }

    public function almacenes_todos_sel($order = 'almacenes_id')
    {
        return $this->CI->almacenes_model->almacenes_todos_sel($order);
    }

    public function almacenes_todos_json($order = 'almacenes_id')
    {
        $almacenes = $this->almacenes_todos($order);
        header('Content-Type: application/json');
        echo json_encode($almacenes);
    }

    public function insertar_almacen($almacen = array())
    {
        return $this->CI->almacenes_model->insertar_almacen($almacen);
    }

    public function editar_almacen($almacen = array())
    {
        return $this->CI->almacenes_model->editar_almacen($almacen);
    }

    public function borrado_logico_almacen($almacenes_id = 0)
    {
        $almacen['almacenes_id'] = $almacenes_id;
        $almacen['estatus'] = 0;
        return $this->editar_almacen($almacen);
    }

    public function borrar_almacen($almacenes_id = 0)
    {
        return $this->CI->almacenes_model->borrar_almacen($almacenes_id);
    }
}