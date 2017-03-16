<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Obra
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->model('catalogos_model');
        $this->CI->load->model('conceptos_model');
        $this->CI->load->model('clientes_model');
        $this->CI->load->model('empresas_model');
        $this->CI->load->model('etapas_model');
        $this->CI->load->model('obras_model');
        $this->CI->load->model('unidades_model');
        $this->CI->load->model('zonas_model');
    }

    public function ultimo_id()
    {
        return $this->CI->db->insert_id();
    }

    public function error_consulta()
    {
        return $this->CI->db->error();
    }

    /*
     * OBRAS
     */
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
        return $this->CI->obras_model->insertar_obra($obra);
    }

    public function editar_obra($obra = array())
    {
        return $this->CI->obras_model->editar_obra($obra);
    }

    public function borrar_obra($obras_id = 0)
    {
        $obra_edit['obras_id'] = $obras_id;
        $obra_edit['estatus'] = ESTATUS_INACTIVO;
        $obra = $this->CI->obras_model->editar_obra($obra_edit);
        return $obra;
    }

    public function obras_todos_sel($order_id = 'obras_id')
    {
        return $this->CI->obras_model->obras_todos_sel($order_id);
    }

    /*
     * ETAPAS
     */
    public function insertar_etapa($etapa = array())
    {
        return $this->CI->etapas_model->insertar_etapa($etapa);
    }

    public function etapa_por_id($etapas_id = 0)
    {
        return $this->CI->etapas_model->etapa_por_id($etapas_id);
    }

    public function etapas_por_obras_id($obras_id = 0)
    {
        return $this->CI->etapas_model->etapas_por_obras_id($obras_id);
    }

    /*
     * ZONAS
     */
    public function insertar_zona($zona = array())
    {
        return $this->CI->zonas_model->insertar_zona($zona);
    }

    public function zonas_por_ids($zonas_ids = array())
    {
        return $this->CI->zonas_model->zonas_por_ids($zonas_ids);
    }

    public function zonas_por_obras_id($obras_id = 0)
    {
        return $this->CI->zonas_model->zonas_por_obras_id($obras_id);
    }

    /*
     * CONCEPTOS
     */
    public function concepto_por_id($conceptos_id = 0)
    {
        return $this->CI->conceptos_model->concepto_por_id($conceptos_id);
    }

    public function insertar_concepto($concepto = array())
    {
        $cant = isset($concepto['cantidad']) ? round($concepto['cantidad'], 2) : 0;
        $pu = isset($concepto['precio_unitario']) ? round($concepto['precio_unitario'], 2) : 0;
        $concepto['total_autorizado'] = round($cant * $pu, 2);
        return $this->CI->conceptos_model->insertar_concepto($concepto);
    }

    public function editar_concepto($concepto = array())
    {
        $con = $this->concepto_por_id($concepto['conceptos_id']);
        if (is_object($con)) {
            $cant = isset($concepto['cantidad']) ? round($concepto['cantidad'], 2) : $con->cantidad;
            $pu = isset($concepto['precio_unitario']) ? round($concepto['precio_unitario'], 2) : $con->precio_unitario;
            $concepto['total_autorizado'] = round($cant * $pu, 2);
            return $this->CI->conceptos_model->editar_concepto($concepto);
        }
        return false;
    }

    public function conceptos_por_ids($conceptos_ids = array())
    {
        return $this->CI->conceptos_model->conceptos_por_ids($conceptos_ids);
    }

    public function conceptos_nombres()
    {
        return $this->CI->conceptos_model->conceptos_nombres();
    }

}