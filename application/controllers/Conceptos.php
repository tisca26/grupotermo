<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

include("Acl_controller.php");

class Conceptos extends Acl_controller
{
    private $template_base = 'index';

    function __construct()
    {
        parent::__construct();

        $this->set_read_list(array('index'));
        $this->set_insert_list(array('insertar_concepto', 'form_insert'));
        $this->set_update_list(array('editar_concepto', 'form_edit'));
        $this->set_delete_list(array('borrar_concepto'));

        $this->check_access();

        $this->load->model('conceptos_model');
        $this->load->model('obras_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->cargar_idioma->carga_lang('conceptos/conceptos_index');
        $data = array();
        $data['rows'] = $this->conceptos_model->conceptos_todos();
        $template['_B'] = 'conceptos/conceptos_index.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function form_insert()
    {
        $this->cargar_idioma->carga_lang('conceptos/conceptos_insertar');
        $data = array();
        $data['obras'] = $this->obras_model->obras_todos_array();
        $template['_B'] = 'conceptos/conceptos_insertar.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function insertar_concepto()
    {
        $this->cargar_idioma->carga_lang('conceptos/conceptos_insertar');
        $this->form_validation->set_rules('nombre', trans_line('nombre'), 'required|trim|min_length[3]');
        $this->form_validation->set_rules('obras_id', trans_line('fecha_inicio'), 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->form_insert();
        } else {
            $concepto = $this->input->post();
            if ($this->conceptos_model->insertar_concepto($concepto) == TRUE) {
                set_bootstrap_alert(trans_line('alerta_exito'), BOOTSTRAP_ALERT_SUCCESS);
                return redirect('conceptos/form_insert');
            } else {
                $error = $this->conceptos_model->error_consulta();
                $mensajes_error = array(trans_line('alerta_error'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
                set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
                return $this->form_insert();
            }
        }
    }

    public function form_edit($conceptos_id = 0)
    {
        $this->cargar_idioma->carga_lang('conceptos/conceptos_editar');
        $data = array();
        $data['obras'] = $this->obras_model->obras_todos_array();
        $data['concepto'] = $this->conceptos_model->concepto_por_id($conceptos_id);
        $template['_B'] = 'conceptos/conceptos_editar.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function editar_concepto()
    {
        $this->cargar_idioma->carga_lang('conceptos/conceptos_editar');
        $this->form_validation->set_rules('nombre', trans_line('nombre'), 'required|trim|min_length[3]');
        $this->form_validation->set_rules('obras_id', trans_line('fecha_inicio'), 'required|trim');
        $id = $this->input->post('conceptos_id');
        if ($this->form_validation->run() == FALSE) {
            $this->form_edit($id);
        } else {
            $concepto = $this->input->post();
            if ($this->conceptos_model->editar_concepto($concepto) == TRUE) {
                set_bootstrap_alert(trans_line('alerta_exito'), BOOTSTRAP_ALERT_SUCCESS);
                return redirect('conceptos');
            } else {
                $error = $this->conceptos_model->error_consulta();
                $mensajes_error = array(trans_line('alerta_error'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
                set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
                return $this->form_edit($id);
            }
        }
    }

    public function borrar_concepto($id = 0)
    {
        $this->cargar_idioma->carga_lang('conceptos/conceptos_index');
        if ($this->conceptos_model->borrar_concepto($id) != FALSE) {
            set_bootstrap_alert(trans_line('alerta_borrado'), BOOTSTRAP_ALERT_SUCCESS);
            return redirect('conceptos');
        } else {
            $error = $this->conceptos_model->error_consulta();
            $mensajes_error = array(trans_line('alerta_borrado_fail'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
            set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
        }
        redirect('conceptos');
    }
}