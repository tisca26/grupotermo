<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Materiales_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function ultimo_id()
    {
        return $this->db->insert_id();
    }

    function error_consulta()
    {
        return $this->db->error();
    }

    public function materiales_todos($order = 'materiales_id')
    {
        $result = array();
        $query = $this->db->order_by($order)->get('materiales');
        if ($query->num_rows() > 0) {
            $result = $query->result();
        }
        return $result;
    }

    public function insertar_material($material = array())
    {
        return $this->db->insert('materiales', $material);
    }

    public function material_por_id($materiales_id = 0)
    {
        $result = new stdClass();
        $query = $this->db->where('materiales_id', $materiales_id)->get('materiales');
        if ($query->num_rows() > 0) {
            $result = $query->row();
        }
        return $result;
    }

    public function editar_material($material = array())
    {
        return $this->db->update('materiales', $material, array('materiales_id' => $material['materiales_id']));
    }

    public function borrar_material($materiales_id = 0)
    {
        return $this->db->delete('materiales', array('materiales_id' => $materiales_id));
    }

    public function insertar_rel_material_categoria($rel_material = array())
    {
        return $this->db->insert('materiales_cat', $rel_material);
    }

    public function insertar_rel_material_precio_proveedor($rel_material = array())
    {
        return $this->db->insert('materiales_precios', $rel_material);
    }

    public function rel_material_categoria_sel($materiales_id = 0)
    {
        $result = array();
        $q = $this->db->where('materiales_id', $materiales_id)->get('materiales_cat');
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $res) {
                $result[] = $res->materiales_categoria_id;
            }
        }
        return $result;
    }

    public function borrar_rel_material_categoria($materiales_id = 0)
    {
        return $this->db->delete('materiales_cat', array('materiales_id' => $materiales_id));
    }
    public function borrar_rel_material_precio($materiales_id = 0)
    {
        return $this->db->delete('materiales_precios', array('materiales_id' => $materiales_id));
    }

    public function precios_proveedores_por_material_id($materiales_id = 0)
    {
        $result = array();
        $this->db->select('mp.*, p.razon_social, mu.nombre as nombre_ubicacion');
        $this->db->from('materiales_precios mp');
        $this->db->join('proveedores p', 'mp.proveedores_id = p.proveedores_id', 'inner');
        $this->db->join('materiales_ubicacion mu', 'mu.materiales_precios_id = mp.materiales_precios_id', 'inner');
        $this->db->where('mp.materiales_id', $materiales_id);
        $q = $this->db->get();
        if ($q->num_rows() > 0){
            $result = $q->result();
        }
        return $result;
    }
}