<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

include("Acl_controller.php");

class Etapas extends Acl_controller
{
    private $template_base = 'index';

    function __construct()
    {
        parent::__construct();

        $this->set_read_list(array('index'));
        $this->set_insert_list(array('insertar_etapa', 'form_insert'));
        $this->set_update_list(array('editar_etapa', 'form_edit'));
        $this->set_delete_list(array('borrar_etapa'));

        $this->check_access();

        $this->load->model('obras_model');
        $this->load->model('etapas_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->cargar_idioma->carga_lang('etapas/etapas_index');
        $data = array();
        $data['rows'] = $this->etapas_model->etapas_todos();
        $template['_B'] = 'etapas/etapas_index.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function form_insert()
    {
        $this->cargar_idioma->carga_lang('etapas/etapas_insertar');
        $data = array();
        $data['obras'] = $this->obras_model->obras_todos_sel();
        $template['_B'] = 'etapas/etapas_insertar.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function insertar_etapa()
    {
        $this->cargar_idioma->carga_lang('etapas/etapas_insertar');
        $this->form_validation->set_rules('nombre', trans_line('nombre'), 'required|trim|min_length[3]');
        $this->form_validation->set_rules('obras_id', trans_line('obra'), 'required|trim');
        $this->form_validation->set_rules('fecha_inicio', trans_line('fecha_inicio'), 'required|trim|exact_length[10]|callback_valid_date');
        $this->form_validation->set_rules('fecha_fin', trans_line('fecha_fin'), 'required|trim|exact_length[10]|callback_valid_date');
        if ($this->form_validation->run() == FALSE) {
            $this->form_insert();
        } else {
            $etapa = $this->input->post();
            if ($this->etapas_model->insertar_etapa($etapa) == TRUE) {
                set_bootstrap_alert(trans_line('alerta_exito'), BOOTSTRAP_ALERT_SUCCESS);
                return redirect('etapas/form_insert');
            } else {
                $error = $this->etapas_model->error_consulta();
                $mensajes_error = array(trans_line('alerta_error'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
                set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
                return $this->form_insert();
            }
        }
    }

    public function form_edit($etapas_id = 0)
    {
        $this->cargar_idioma->carga_lang('etapas/etapas_editar');
        $data = array();
        $data['etapa'] = $this->etapas_model->etapa_por_id($etapas_id);
        $template['_B'] = 'etapas/etapas_editar.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function editar_etapa()
    {
        $this->cargar_idioma->carga_lang('etapas/etapas_editar');
        $this->form_validation->set_rules('nombre', trans_line('nombre'), 'required|trim|min_length[3]');
        $this->form_validation->set_rules('fecha_inicio', trans_line('fecha_inicio'), 'required|trim|exact_length[10]|callback_valid_date');
        $this->form_validation->set_rules('fecha_fin', trans_line('fecha_fin'), 'required|trim|exact_length[10]|callback_valid_date');
        $id = $this->input->post('etapas_id');
        if ($this->form_validation->run() == FALSE) {
            $this->form_edit($id);
        } else {
            $etapa = $this->input->post();
            if ($this->etapas_model->editar_etapa($etapa) == TRUE) {
                set_bootstrap_alert(trans_line('alerta_exito'), BOOTSTRAP_ALERT_SUCCESS);
                return redirect('etapas');
            } else {
                $error = $this->etapas_model->error_consulta();
                $mensajes_error = array(trans_line('alerta_error'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
                set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
                return $this->form_edit($id);
            }
        }
    }

    public function borrar_etapa($id = 0)
    {
        $this->cargar_idioma->carga_lang('etapas/etapas_index');
        if ($this->etapas_model->borrar_etapa($id) != FALSE) {
            set_bootstrap_alert(trans_line('alerta_borrado'), BOOTSTRAP_ALERT_SUCCESS);
            return redirect('etapas');
        } else {
            $error = $this->etapas_model->error_consulta();
            $mensajes_error = array(trans_line('alerta_borrado_fail'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
            set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
        }
        redirect('etapas');
    }

    public function valid_date($date)
    {
        if (!validateDate($date)) {
            $this->form_validation->set_message('valid_date', trans_line('fecha'));
            return false;
        }
        return true;
    }
}