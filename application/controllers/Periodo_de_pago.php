<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

include("Acl_controller.php");

class Periodo_de_pago extends Acl_controller
{
    private $template_base = 'index';

    function __construct()
    {
        parent::__construct();

        $this->set_read_list(array('index'));
        $this->set_insert_list(array('insertar_periodo_de_pago', 'form_insert'));
        $this->set_update_list(array('editar_periodo_de_pago', 'form_edit'));
        $this->set_delete_list(array('borrar_periodo_de_pago'));

        $this->check_access();

        $this->load->model('periodo_de_pago_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->cargar_idioma->carga_lang('periodo_de_pago/periodo_de_pago_index');
        $data = array();
        $data['rows'] = $this->periodo_de_pago_model->periodo_de_pago_todos();
        $template['_B'] = 'periodo_de_pago/periodo_de_pago_index.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function form_insert()
    {
        $this->cargar_idioma->carga_lang('periodo_de_pago/periodo_de_pago_insertar');
        $data = array();
        $template['_B'] = 'periodo_de_pago/periodo_de_pago_insertar.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function insertar_periodo_de_pago()
    {
        $this->cargar_idioma->carga_lang('periodo_de_pago/periodo_de_pago_insertar');
        $this->form_validation->set_rules('nombre', trans_line('nombre'), 'required|trim|min_length[3]');
        if ($this->form_validation->run() == FALSE) {
            $this->form_insert();
        } else {
            $periodo = $this->input->post();
            if ($this->periodo_de_pago_model->insertar_periodo_de_pago($periodo) == TRUE) {
                set_bootstrap_alert(trans_line('alerta_exito'), BOOTSTRAP_ALERT_SUCCESS);
                return redirect('periodo_de_pago/form_insert');
            } else {
                $error = $this->periodo_de_pago_model->error_consulta();
                $mensajes_error = array(trans_line('alerta_error'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
                set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
                return $this->form_insert();
            }
        }
    }

    public function form_edit($id = 0)
    {
        $this->cargar_idioma->carga_lang('periodo_de_pago/periodo_de_pago_editar');
        $data = array();
        $data['per'] = $this->periodo_de_pago_model->periodo_de_pago_por_id($id);
        $template['_B'] = 'periodo_de_pago/periodo_de_pago_editar.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function editar_periodo_de_pago()
    {
        $this->cargar_idioma->carga_lang('periodo_de_pago/periodo_de_pago_editar');
        $this->form_validation->set_rules('nombre', trans_line('nombre'), 'required|trim|min_length[3]');
        $id = $this->input->post('periodo_de_pago_id');
        if ($this->form_validation->run() == FALSE) {
            $this->form_edit($id);
        } else {
            $periodo = $this->input->post();
            if ($this->periodo_de_pago_model->editar_periodo_de_pago($periodo) == TRUE) {
                set_bootstrap_alert(trans_line('alerta_exito'), BOOTSTRAP_ALERT_SUCCESS);
                return redirect('periodo_de_pago');
            } else {
                $error = $this->periodo_de_pago_model->error_consulta();
                $mensajes_error = array(trans_line('alerta_error'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
                set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
                return $this->form_edit($id);
            }
        }
    }

    public function borrar_periodo_de_pago($id = 0)
    {
        $this->cargar_idioma->carga_lang('periodo_de_pago/periodo_de_pago_index');
        if ($this->periodo_de_pago_model->borrar_periodo_de_pago($id) != FALSE){
            set_bootstrap_alert(trans_line('alerta_borrado'), BOOTSTRAP_ALERT_SUCCESS);
            return redirect('periodo_de_pago');
        }else{
            $error = $this->periodo_de_pago_model->error_consulta();
            $mensajes_error = array(trans_line('alerta_borrado_fail'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
            set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
        }
        redirect('periodo_de_pago');
    }
}