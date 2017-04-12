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

        $this->set_read_list(array('index','ver_almacen'));
        $this->set_insert_list(array('form_insert','insertar_almacen'));
        $this->set_update_list(array('form_edit','editar_almacen'));
        $this->set_delete_list(array('borrar_almacen'));

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

    public function form_insert()
    {
        $this->cargar_idioma->carga_lang('almacenes/almacenes_insertar');
        $data = array();
        $template['_B'] = 'almacenes/almacenes_insertar.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function insertar_almacen()
    {
        $this->cargar_idioma->carga_lang('almacenes/almacenes_insertar');
        $this->form_validation->set_rules('nombre', trans_line('razon_social'), 'required|trim|min_length[3]');
        if ($this->form_validation->run() == FALSE) {
            $this->form_insert();
        } else {
            $almacen = $this->input->post();
            if ($this->almacen->insertar_almacen($almacen) == TRUE) {
                set_bootstrap_alert(trans_line('alerta_exito'), BOOTSTRAP_ALERT_SUCCESS);
                return redirect('almacenes/form_insert');
            } else {
                $error = $this->almacen->error_consulta();
                $mensajes_error = array(trans_line('alerta_error'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
                set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
                return $this->form_insert();
            }
        }
    }

    public function form_edit($id = 0)
    {
        $this->cargar_idioma->carga_lang('almacenes/almacenes_editar');
        $data = array();
        $data['alm'] = $this->almacen->almacen_por_id($id);
        $template['_B'] = 'almacenes/almacenes_editar.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function editar_almacen()
    {
        $this->cargar_idioma->carga_lang('almacenes/almacenes_editar');
        $this->form_validation->set_rules('nombre', trans_line('nombre'), 'required|trim|min_length[3]');
        $id = $this->input->post('almacenes_id');
        if ($this->form_validation->run() == FALSE) {
            $this->form_edit($id);
        } else {
            $almacen = $this->input->post();
            if ($this->almacen->editar_almacen($almacen) == TRUE) {
                set_bootstrap_alert(trans_line('alerta_exito'), BOOTSTRAP_ALERT_SUCCESS);
                return redirect('almacenes');
            } else {
                $error = $this->almacen->error_consulta();
                $mensajes_error = array(trans_line('alerta_error'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
                set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
                return $this->form_edit($id);
            }
        }
    }

    public function borrar_almacen($id = 0)
    {
        $this->cargar_idioma->carga_lang('almacenes/almacenes_index');
        if ($this->almacen->borrar_almacen($id) != FALSE){
            set_bootstrap_alert(trans_line('alerta_borrado'), BOOTSTRAP_ALERT_SUCCESS);
            return redirect('almacenes');
        }else{
            $error = $this->almacen->error_consulta();
            $mensajes_error = array(trans_line('alerta_borrado_fail'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
            set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
        }
        redirect('almacenes');
    }

    public function ver_almacen($id = 0){
        $this->cargar_idioma->carga_lang('almacenes/almacenes_ver');
        $data = array();
        $data['almacen_id'] = $id;
        $data['activos'] = $this->almacen->almacen_activos_por_id($id);
        $data['materiales'] = $this->almacen->almacen_materiales_por_id($id);
        $data['bitacora'] = $this->almacen->almacen_bitacora_completa_por_id($id);
        $template['_B'] = 'almacenes/almacenes_ver.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

}