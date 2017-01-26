<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lugares
{
    protected $CI;

    public function __construct()
    {
        $this->CI = & get_instance();
        $this->CI->load->model('cat_estados_model');
        $this->CI->load->model('cat_municipios_model');
        $this->CI->load->model('cat_paises_model');
    }

    /*
     * Regresa arreglo con 3 objetos
     * Objeto en posicion 0 => Municipio
     * Objeto en posicion 1 => Estado
     * Objeto en posicion 2 => Pais
     */
    public function pais_estado_municpio_por_municipio_id($municipio_id = 0)
    {
        $result = array();
        $municipio = $this->CI->cat_municipios_model->municipio_por_id($municipio_id);
        $estado = $this->CI->cat_estados_model->estado_por_id($municipio->cat_estados_id);
        $pais = $this->CI->cat_paises_model->pais_por_id($estado->cat_paises_id);
        $result[0] = $municipio;
        $result[1] = $estado;
        $result[2] = $pais;
        return $result;
    }
}