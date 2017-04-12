<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

include("Acl_controller.php");

class Almacenes extends Acl_controller
{
    private $template_base = 'index';

    function __construct()
    {
        parent::__construct();

        $this->set_read_list(array('index'));
        $this->set_insert_list(array(''));
        $this->set_update_list(array(''));
        $this->set_delete_list(array(''));

        $this->check_access();

        $this->load->business('almacen');

        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->cargar_idioma->carga_lang('almacenes/almacenes_index');
        $data = array();
        $data['rows'] = $this->almacen->almacenes_todos();
        $template['_B'] = 'almacenes/almacenes_index.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

}