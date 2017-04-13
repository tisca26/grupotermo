<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Almacen
{
    protected $CI;

    public function __construct()
    {
        $this->CI = & get_instance();
        $this->CI->load->model('almacenes_model');
        $this->CI->load->model('almacenes_bitacora_model');
        $this->CI->load->model('almacen_materiales_model');
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

    public function almacenes_todos($order = 'almacenes_id')
    {
        return $this->CI->almacenes_model->almacenes_todos($order);
    }

    public function almacenes_todos_sel($order = 'almacenes_id')
    {
        $res = array();
        $almacenes = $this->almacenes_todos($order);
        foreach ($almacenes as $almacen){
            $res[$almacen->almacenes_id] = $almacen->nombre;
        }
        return $res;
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

    public function materiales_por_almacen_id($almacenes_id = 0, $limit = 0, $offset = 0)
    {
        return $this->CI->almacen_materiales_model->almcacen_materiales_por_almacen_id($almacenes_id, $limit, $offset);
    }

    public function bitacora_completa_por_almacen_id($almacenes_id = 0, $limit = 0, $offset = 0)
    {
        $movimientos = $this->CI->almacenes_bitacora_model->bitacora_completa_por_almacen_id($almacenes_id, $limit, $offset);
        foreach ($movimientos as $movimiento){
            $movimiento->tipo = ($movimiento->almacen_egreso == 0) ? 'EGRESO' : (($movimiento->almacen_egreso == 0) ? 'INGRESO' : 'TRANSFERENCIA');
            $movimiento->almacen_destino = ($movimiento->almacen_destino == '')? 'N/A' : $movimiento->almacen_destino;
            $movimiento->usuario_autoriza = ($movimiento->usuario_autoriza == '') ? 'N/D' : $movimiento->usuario_autoriza;
            $movimiento->usuario_destino = ($movimiento->usuario_destino == '') ? 'N/D' : $movimiento->usuario_destino;
            $movimiento->activo_destino = ($movimiento->activo_destino == '') ? 'N/D' : $movimiento->activo_destino;
            $movimiento->cantidad = ($movimiento->cantidad == '') ? 'N/D' : $movimiento->cantidad;
        }

        return $movimientos;
    }
}