<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Conceptos_cat_model extends CI_Model
{
    function __construct()
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

    public function insertar_conceptos_ca($rel_concepto_cat = array())
    {
        return $this->db->insert('conceptos_cat', $rel_concepto_cat);
    }
}