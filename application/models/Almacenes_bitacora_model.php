<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Almacenes_bitacora_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function ultimo_id()
    {
        return $this->db->insert_id();
    }

    public function error_consulta()
    {
        return $this->db->error();
    }

    public function bitacora_completa_por_almacen_id($almacen_id = 0, $limit = 0, $offset = 0)
    {
        $result = new stdClass();
        $this->db->select('ab.*, aa.clave as clave_activo, am.clave as clave_almacen');
        $this->db->from('almacenes_bitacora ab');
        $this->db->join('almacen_activos aa', 'ab.almacen_activos_id = aa.almacen_activos_id', 'left');
        $this->db->join('almacen_materiales am', 'ab.almacen_materiales_id = am.almacen_materiales_id', 'left');
        $this->db->where('ab.almacen_ingreso', $almacen_id)->or_where('ab.almacen_egreso',$almacen_id);
        if ($limit > 0){
            $this->db->limit($limit, $offset);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->row();
        }
        return $result;
    }
}