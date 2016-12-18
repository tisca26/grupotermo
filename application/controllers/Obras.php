<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

include("Acl_controller.php");

class Obras extends Acl_controller
{
    private $template_base = 'index';

    function __construct()
    {
        parent::__construct();

        $this->set_read_list(array('index'));
        $this->set_insert_list(array('insertar_obra', 'form_insert'));
        $this->set_update_list(array('editar_obra', 'form_edit'));
        $this->set_delete_list(array('borrar_obra'));

        $this->check_access();

        $this->load->model('obras_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->cargar_idioma->carga_lang('obras/obras_index');
        $data = array();
        $data['rows'] = $this->obras_model->obras_todos();
        $template['_B'] = 'obras/obras_index.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function form_insert()
    {
        $this->cargar_idioma->carga_lang('obras/obras_insertar');
        $data = array();
        $template['_B'] = 'obras/obras_insertar.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function insertar_obra()
    {
        $this->cargar_idioma->carga_lang('obras/obras_insertar');
        $this->form_validation->set_rules('nombre', trans_line('nombre'), 'required|trim|min_length[3]');
        $this->form_validation->set_rules('fecha_inicio', trans_line('fecha_inicio'), 'required|trim|exact_length[10]|callback_valid_date');
        $this->form_validation->set_rules('fecha_fin', trans_line('fecha_fin'), 'required|trim|exact_length[10]|callback_valid_date');
        $this->form_validation->set_rules('total_autorizado', trans_line('total_autorizado'), 'numeric|max_length[14]');
        if ($this->form_validation->run() == FALSE) {
            $this->form_insert();
        } else {
            $obra = $this->input->post();
            if ($this->obras_model->insertar_obra($obra) == TRUE) {
                set_bootstrap_alert(trans_line('alerta_exito'), BOOTSTRAP_ALERT_SUCCESS);
                return redirect('obras/form_insert');
            } else {
                $error = $this->obras_model->error_consulta();
                $mensajes_error = array(trans_line('alerta_error'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
                set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
                return $this->form_insert();
            }
        }
    }

    public function form_edit($obras_id = 0)
    {
        $this->cargar_idioma->carga_lang('obras/obras_editar');
        $data = array();
        $data['obra'] = $this->obras_model->obra_por_id($obras_id);
        $template['_B'] = 'obras/obras_editar.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function editar_obra()
    {
        $this->cargar_idioma->carga_lang('obras/obras_editar');
        $this->form_validation->set_rules('nombre', trans_line('nombre'), 'required|trim|min_length[3]');
        $this->form_validation->set_rules('fecha_inicio', trans_line('fecha_inicio'), 'required|trim|exact_length[10]|callback_valid_date');
        $this->form_validation->set_rules('fecha_fin', trans_line('fecha_fin'), 'required|trim|exact_length[10]|callback_valid_date');
        $this->form_validation->set_rules('total_autorizado', trans_line('total_autorizado'), 'numeric|max_length[14]');
        $id = $this->input->post('obras_id');
        if ($this->form_validation->run() == FALSE) {
            $this->form_edit($id);
        } else {
            $obra = $this->input->post();
            if ($this->obras_model->editar_obra($obra) == TRUE) {
                set_bootstrap_alert(trans_line('alerta_exito'), BOOTSTRAP_ALERT_SUCCESS);
                return redirect('obras');
            } else {
                $error = $this->obras_model->error_consulta();
                $mensajes_error = array(trans_line('alerta_error'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
                set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
                return $this->form_edit($id);
            }
        }
    }

    public function borrar_obra($id = 0)
    {
        $this->cargar_idioma->carga_lang('obras/obras_index');
        if ($this->obras_model->borrar_obra($id) != FALSE){
            set_bootstrap_alert(trans_line('alerta_borrado'), BOOTSTRAP_ALERT_SUCCESS);
            return redirect('obras');
        }else{
            $error = $this->obras_model->error_consulta();
            $mensajes_error = array(trans_line('alerta_borrado_fail'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
            set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
        }
        redirect('obras');
    }

    public function valid_date($date)
    {
        if (!validateDate($date)){
            $this->form_validation->set_message('valid_date', trans_line('fecha'));
            return false;
        }
        return true;
    }
}