<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Conceptos_categoria
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->model('conceptos_categoria_model', 'con_cate_model');
    }

    public function error_consulta()
    {
        return $this->CI->con_cate_model->error_consulta();
    }

    public function ultimo_id()
    {
        return $this->CI->con_cate_model->ultimo_id();
    }

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

    public function insetar_conceptos_categoria($categoria = array())
    {
        return $this->CI->con_cate_model->insetar_conceptos_categoria($categoria);
    }
}