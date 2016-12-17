<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

include("Acl_controller.php");

class Zonas extends Acl_controller
{
    private $template_base = 'index';

    function __construct()
    {
        parent::__construct();

        $this->set_read_list(array('index'));
        $this->set_insert_list(array('insertar_zona', 'form_insert'));
        $this->set_update_list(array('editar_zona', 'form_edit'));
        $this->set_delete_list(array('borrar_zona'));

        $this->check_access();

        $this->load->model('zonas_model');
        $this->load->model('obras_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->cargar_idioma->carga_lang('zonas/zonas_index');
        $data = array();
        $data['rows'] = $this->zonas_model->zonas_todos();
        $template['_B'] = 'zonas/zonas_index.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function form_insert()
    {
        $this->cargar_idioma->carga_lang('zonas/zonas_insertar');
        $data = array();
        $data['obras'] = $this->obras_model->obras_todos_array();
        $template['_B'] = 'zonas/zonas_insertar.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function insertar_zona()
    {
        $this->cargar_idioma->carga_lang('zonas/zonas_insertar');
        $this->form_validation->set_rules('nombre', trans_line('nombre'), 'required|trim|min_length[3]');
        $this->form_validation->set_rules('fecha_inicio', trans_line('fecha_inicio'), 'required|trim|exact_length[10]|callback_valid_date');
        $this->form_validation->set_rules('fecha_fin', trans_line('fecha_fin'), 'required|trim|exact_length[10]|callback_valid_date');
        $this->form_validation->set_rules('total_autorizado', trans_line('total_autorizado'), 'numeric|max_length[14]');
        if ($this->form_validation->run() == FALSE) {
            $this->form_insert();
        } else {
            $zona = $this->input->post();
            if ($this->zonas_model->insertar_zona($zona) == TRUE) {
                set_bootstrap_alert(trans_line('alerta_exito'), BOOTSTRAP_ALERT_SUCCESS);
                return redirect('zonas/form_insert');
            } else {
                $error = $this->resources_model->error_consulta();
                $mensajes_error = array(trans_line('alerta_error'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
                set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
                return $this->form_insert();
            }
        }
    }

    public function form_edit($zonas_id = 0)
    {
        $this->cargar_idioma->carga_lang('zonas/zonas_editar');
        $data = array();
        $data['zona'] = $this->zonas_model->zona_por_id($zonas_id);
        $template['_B'] = 'zonas/zonas_editar.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function editar_zona()
    {
        $this->cargar_idioma->carga_lang('zonas/zonas_editar');
        $this->form_validation->set_rules('nombre', trans_line('nombre'), 'required|trim|min_length[3]');
        $this->form_validation->set_rules('fecha_inicio', trans_line('fecha_inicio'), 'required|trim|exact_length[10]|callback_valid_date');
        $this->form_validation->set_rules('fecha_fin', trans_line('fecha_fin'), 'required|trim|exact_length[10]|callback_valid_date');
        $this->form_validation->set_rules('total_autorizado', trans_line('total_autorizado'), 'numeric|max_length[14]');
        $id = $this->input->post('zonas_id');
        if ($this->form_validation->run() == FALSE) {
            $this->form_edit($id);
        } else {
            $zona = $this->input->post();
            if ($this->zonas_model->editar_zona($zona) == TRUE) {
                set_bootstrap_alert(trans_line('alerta_exito'), BOOTSTRAP_ALERT_SUCCESS);
                return redirect('zonas');
            } else {
                $error = $this->zonas_model->error_consulta();
                $mensajes_error = array(trans_line('alerta_error'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
                set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
                return $this->form_edit($id);
            }
        }
    }

    public function borrar_zona($id = 0)
    {
        $this->cargar_idioma->carga_lang('zonas/zonas_index');
        if ($this->zonas_model->borrar_zona($id) != FALSE) {
            set_bootstrap_alert(trans_line('alerta_borrado'), BOOTSTRAP_ALERT_SUCCESS);
            return redirect('zonas');
        } else {
            $error = $this->zonas_model->error_consulta();
            $mensajes_error = array(trans_line('alerta_borrado_fail'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
            set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
        }
        redirect('zonas');
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