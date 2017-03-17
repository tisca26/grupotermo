<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Concepto
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->model('conceptos_model', 'con_model');
        $this->CI->load->model('conceptos_catalogo_model', 'con_cata_model');
        $this->CI->load->model('conceptos_categoria_model', 'con_cate_model');
    }

    public function error_consulta()
    {
        return $this->CI->con_model->error_consulta();
    }

    public function ultimo_id()
    {
        return $this->CI->con_model->ultimo_id();
    }

    public function concepto_por_id($conceptos_id = 0)
    {
        return $this->CI->con_model->concepto_por_id($conceptos_id);
    }

    public function conceptos_todos($order = 'conceptos_catalogo_id')
    {
        return $this->CI->con_model->conceptos_todos($order);
    }

    public function conceptos_todos_sel($order = 'conceptos_id')
    {
        $conceptos = $this->conceptos_todos($order);
        $select = array();
        foreach ($conceptos as $concepto) {
            $select[$concepto->conceptos_id] = $concepto->nombre;
        }
        return $select;
    }

    public function conceptos_todos_json($order = 'conceptos_catalogo_id')
    {
        $conceptos = $this->conceptos_todos($order);
        header('Content-Type: application/json');
        echo json_encode($conceptos);
    }

    public function insertar_concepto($concepto = array())
    {
        return $this->CI->con_model->insertar_concepto($concepto);
    }

    /*
     * CONCEPTOS CATALOGO
     */
    public function conceptos_catalogo_por_categoria_id($conceptos_categoria_id = 0)
    {
        return $this->CI->con_cata_model->conceptos_catalogo_por_categoria_id($conceptos_categoria_id);
    }

    public function conceptos_catalogo_por_categoria_id_json($conceptos_categoria_id = 0)
    {
        $conceptos = $this->conceptos_catalogo_por_categoria_id($conceptos_categoria_id);
        header('Content-Type: application/json');
        echo json_encode($conceptos);
    }
    /*
     * FIN CONCEPTOS CATALOGO
     */

    /*
     * CONCEPTOS CATEGORIA
     */
    public function conceptos_categoria_todos($order = 'conceptos_categoria_id')
    {
        return $this->CI->con_cate_model->conceptos_categoria_todos($order);
    }

    public function conceptos_categoria_todos_json($order = 'conceptos_categoria_id')
    {
        $categorias = $this->conceptos_categoria_todos($order);
        header('Content-Type: application/json');
        echo json_encode($categorias);
    }

    public function conceptos_categoria_todos_sel($order = 'conceptos_categoria_id')
    {
        $categorias = $this->conceptos_categoria_todos($order);
        $res = array();
        foreach ($categorias as $categoria){
            $res[$categoria->conceptos_categoria_id] = $categoria->nombre;
        }
        return $res;
    }
    /*
     * FIN CONCEPTOS CATEGORIA
     */

}