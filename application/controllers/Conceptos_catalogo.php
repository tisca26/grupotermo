<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include("Acl_controller.php");

class Conceptos_catalogo extends Acl_controller
{
    private $template_base = 'index';

    function __construct()
    {
        parent::__construct();

        $this->set_read_list(array('index'));
        $this->set_insert_list(array('insertar_concepto', 'form_insert', 'insertar_concepto_ajax'));
        $this->set_update_list(array('editar_concepto', 'form_edit'));
        $this->set_delete_list(array('borrar_concepto'));

        $this->check_access();

        $this->load->model('conceptos_categoria_model');
        $this->load->model('conceptos_catalogo_model');
        $this->load->model('unidades_model');
        $this->load->library('form_validation');
    }
}