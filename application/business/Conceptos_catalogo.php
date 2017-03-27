<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Conceptos_catalogo
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->model('conceptos_catalogo_model', 'con_cata_model');
        $this->CI->load->model('conceptos_cat_model', 'con_cat_model');
    }

    public function error_consulta()
    {
        return $this->CI->con_cata_model->error_consulta();
    }

    public function ultimo_id()
    {
        return $this->CI->con_cata_model->ultimo_id();
    }

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

    public function insertar_conceptos_catalogo($concepto = array()){
        $res = array();
        if (!isset($concepto['conceptos_categoria_id'])){
            $res['status'] = false;
            $res['error'] = 'SIN CATEGORÍA';
            return $res;
        }
        $res['status'] = false;
        $categorias = $concepto['conceptos_categoria_id'];
        unset($concepto['conceptos_categoria_id']);
        $res['status'] = $this->CI->con_cata_model->insertar_concepto($concepto);
        if ($res['status'] == false){
            $res['error'] = 'Error insertar concepto <br />' . $this->error_consulta();
            return $res;
        }
        $concepto_id = $this->ultimo_id();
        foreach ($categorias as $categoria){
            $ins_rel['conceptos_catalogo_id'] = $concepto_id;
            $ins_rel['conceptos_categoria_id'] = $categoria;
            if ($this->CI->con_cat_model->insertar_conceptos_ca($ins_rel) == false){
                $res['status'] == false;
                $res['error'] = 'Error al relacionar categorías <br />' . $this->error_consulta();
                return $res;
            }
        }
        return $res;
    }
}