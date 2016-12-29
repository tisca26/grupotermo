<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

include("Acl_controller.php");

class Servicios_categoria extends Acl_controller
{
    private $template_base = 'index';

    function __construct()
    {
        parent::__construct();

        $this->set_read_list(array('index'));
        $this->set_insert_list(array('insertar_servicio_categoria', 'form_insert'));
        $this->set_update_list(array('editar_servicio_categoria', 'form_edit'));
        $this->set_delete_list(array('borrar_servicio_categoria'));

        $this->check_access();

        $this->load->model('servicios_categoria_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->cargar_idioma->carga_lang('servicios_categoria/servicios_categoria_index');
        $data = array();
        $data['rows'] = $this->servicios_categoria_model->servicios_categoria_todos();
        $template['_B'] = 'servicios_categoria/servicios_categoria_index.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function form_insert()
    {
        $this->cargar_idioma->carga_lang('servicios_categoria/servicios_categoria_insertar');
        $data = array();
        $template['_B'] = 'servicios_categoria/servicios_categoria_insertar.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function insertar_servicio_categoria()
    {
        $this->cargar_idioma->carga_lang('servicios_categoria/servicios_categoria_insertar');
        $this->form_validation->set_rules('nombre', trans_line('nombre'), 'required|trim|min_length[3]');
        $this->form_validation->set_rules('descripcion', trans_line('descripcion'), 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->form_insert();
        } else {
            $servicio_categoria = $this->input->post();
            if ($this->servicios_categoria_model->insertar_servicio_categoria($servicio_categoria) == TRUE) {
                set_bootstrap_alert(trans_line('alerta_exito'), BOOTSTRAP_ALERT_SUCCESS);
                return redirect('servicios_categoria/form_insert');
            } else {
                $error = $this->servicios_categoria_model->error_consulta();
                $mensajes_error = array(trans_line('alerta_error'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
                set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
                return $this->form_insert();
            }
        }
    }

    public function form_edit($servicios_id = 0)
    {
        $this->cargar_idioma->carga_lang('servicios_categoria/servicios_categoria_editar');
        $data = array();
        $data['servicio_categoria'] = $this->servicios_categoria_model->servicio_categoria_por_id($servicios_id);
        $template['_B'] = 'servicios_categoria/servicios_categoria_editar.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function editar_servicio_categoria()
    {
        $this->cargar_idioma->carga_lang('servicios_categoria/servicios_categoria_editar');
        $this->form_validation->set_rules('nombre', trans_line('nombre'), 'required|trim|min_length[3]');
        $this->form_validation->set_rules('descripcion', trans_line('descripcion'), 'required|trim');
        $id = $this->input->post('servicios_categoria_id');
        if ($this->form_validation->run() == FALSE) {
            $this->form_edit($id);
        } else {
            $servicio_categoria = $this->input->post();
            if ($this->servicios_categoria_model->editar_servicio_categoria($servicio_categoria) == TRUE) {
                set_bootstrap_alert(trans_line('alerta_exito'), BOOTSTRAP_ALERT_SUCCESS);
                return redirect('servicios_categoria');
            } else {
                $error = $this->servicios_categoria_model->error_consulta();
                $mensajes_error = array(trans_line('alerta_error'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
                set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
                return $this->form_edit($id);
            }
        }
    }

    public function borrar_servicio_categoria($id = 0)
    {
        $this->cargar_idioma->carga_lang('servicios_categoria/servicios_categoria_index');
        if ($this->servicios_categoria_model->borrar_servicio_categoria($id) != FALSE) {
            set_bootstrap_alert(trans_line('alerta_borrado'), BOOTSTRAP_ALERT_SUCCESS);
            return redirect('servicios_categoria');
        } else {
            $error = $this->servicios_categoria_model->error_consulta();
            $mensajes_error = array(trans_line('alerta_borrado_fail'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
            set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
        }
        redirect('servicios_categoria');
    }
}