<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

include("Acl_controller.php");

class Activos_categoria extends Acl_controller
{
    private $template_base = 'index';

    function __construct()
    {
        parent::__construct();

        $this->set_read_list(array('index'));
        $this->set_insert_list(array('insertar_activo_categoria', 'form_insert'));
        $this->set_update_list(array('editar_activo_categoria', 'form_edit'));
        $this->set_delete_list(array('borrar_activo_categoria'));

        $this->check_access();

        $this->load->model('activos_categoria_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->cargar_idioma->carga_lang('activos_categoria/activos_categoria_index');
        $data = array();
        $data['rows'] = $this->activos_categoria_model->activos_categoria_todos();
        $template['_B'] = 'activos_categoria/activos_categoria_index.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function form_insert()
    {
        $this->cargar_idioma->carga_lang('activos_categoria/activos_categoria_insertar');
        $data = array();
        $template['_B'] = 'activos_categoria/activos_categoria_insertar.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function insertar_activo_categoria()
    {
        $this->cargar_idioma->carga_lang('activos_categoria/activos_categoria_insertar');
        $this->form_validation->set_rules('nombre', trans_line('nombre'), 'required|trim|min_length[3]');
        $this->form_validation->set_rules('descripcion', trans_line('descripcion'), 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->form_insert();
        } else {
            $activo_categoria = $this->input->post();
            if ($this->activos_categoria_model->insertar_activo_categoria($activo_categoria) == TRUE) {
                set_bootstrap_alert(trans_line('alerta_exito'), BOOTSTRAP_ALERT_SUCCESS);
                return redirect('activos_categoria/form_insert');
            } else {
                $error = $this->activos_categoria_model->error_consulta();
                $mensajes_error = array(trans_line('alerta_error'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
                set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
                return $this->form_insert();
            }
        }
    }

    public function form_edit($activos_id = 0)
    {
        $this->cargar_idioma->carga_lang('activos_categoria/activos_categoria_editar');
        $data = array();
        $data['activo_categoria'] = $this->activos_categoria_model->activo_categoria_por_id($activos_id);
        $template['_B'] = 'activos_categoria/activos_categoria_editar.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function editar_activo_categoria()
    {
        $this->cargar_idioma->carga_lang('activos_categoria/activos_categoria_editar');
        $this->form_validation->set_rules('nombre', trans_line('nombre'), 'required|trim|min_length[3]');
        $this->form_validation->set_rules('descripcion', trans_line('descripcion'), 'required|trim');
        $id = $this->input->post('activos_categoria_id');
        if ($this->form_validation->run() == FALSE) {
            $this->form_edit($id);
        } else {
            $activo_categoria = $this->input->post();
            if ($this->activos_categoria_model->editar_activo_categoria($activo_categoria) == TRUE) {
                set_bootstrap_alert(trans_line('alerta_exito'), BOOTSTRAP_ALERT_SUCCESS);
                return redirect('activos_categoria');
            } else {
                $error = $this->activos_categoria_model->error_consulta();
                $mensajes_error = array(trans_line('alerta_error'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
                set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
                return $this->form_edit($id);
            }
        }
    }

    public function borrar_activo_categoria($id = 0)
    {
        $this->cargar_idioma->carga_lang('activos_categoria/activos_categoria_index');
        if ($this->activos_categoria_model->borrar_activo_categoria($id) != FALSE) {
            set_bootstrap_alert(trans_line('alerta_borrado'), BOOTSTRAP_ALERT_SUCCESS);
            return redirect('activos_categoria');
        } else {
            $error = $this->activos_categoria_model->error_consulta();
            $mensajes_error = array(trans_line('alerta_borrado_fail'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
            set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
        }
        redirect('activos_categoria');
    }
}