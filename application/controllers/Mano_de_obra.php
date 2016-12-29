<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

include("Acl_controller.php");

class Mano_de_obra extends Acl_controller
{
    private $template_base = 'index';

    function __construct()
    {
        parent::__construct();

        $this->set_read_list(array('index'));
        $this->set_insert_list(array('insertar_mano', 'form_insert'));
        $this->set_update_list(array('editar_mano', 'form_edit'));
        $this->set_delete_list(array('borrar_mano'));

        $this->check_access();

        $this->load->model('mano_de_obra_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->cargar_idioma->carga_lang('mano_de_obra/mano_de_obra_index');
        $data = array();
        $data['rows'] = $this->mano_de_obra_model->mano_de_obra_todos();
        $template['_B'] = 'mano_de_obra/mano_de_obra_index.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function form_insert()
    {
        $this->cargar_idioma->carga_lang('mano_de_obra/mano_de_obra_insertar');
        $data = array();
        $template['_B'] = 'mano_de_obra/mano_de_obra_insertar.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function insertar_mano()
    {
        $this->cargar_idioma->carga_lang('mano_de_obra/mano_de_obra_insertar');
        $this->form_validation->set_rules('nombre', trans_line('nombre'), 'required|trim|min_length[3]');
        $this->form_validation->set_rules('precio_unitario', trans_line('precio_unitario'), 'required|trim|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->form_insert();
        } else {
            $mano = $this->input->post();
            $mano['estatus'] = (int) $mano['estatus'];
            if ($this->mano_de_obra_model->insertar_mano($mano) == TRUE) {
                set_bootstrap_alert(trans_line('alerta_exito'), BOOTSTRAP_ALERT_SUCCESS);
                return redirect('mano_de_obra/form_insert');
            } else {
                $error = $this->mano_de_obra_model->error_consulta();
                $mensajes_error = array(trans_line('alerta_error'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
                set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
                return $this->form_insert();
            }
        }
    }

    public function form_edit($mano_de_obra_id = 0)
    {
        $this->cargar_idioma->carga_lang('mano_de_obra/mano_de_obra_editar');
        $data = array();
        $data['mano'] = $this->mano_de_obra_model->mano_por_id($mano_de_obra_id);
        $template['_B'] = 'mano_de_obra/mano_de_obra_editar.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function editar_mano()
    {
        $this->cargar_idioma->carga_lang('mano_de_obra/mano_de_obra_editar');
        $this->form_validation->set_rules('nombre', trans_line('nombre'), 'required|trim|min_length[3]');
        $this->form_validation->set_rules('precio_unitario', trans_line('precio_unitario'), 'required|trim|numeric');
        $id = $this->input->post('mano_de_obra_id');
        if ($this->form_validation->run() == FALSE) {
            $this->form_edit($id);
        } else {
            $mano = $this->input->post();
            $mano['estatus'] = (int) $mano['estatus'];
            if ($this->mano_de_obra_model->editar_mano($mano) == TRUE) {
                set_bootstrap_alert(trans_line('alerta_exito'), BOOTSTRAP_ALERT_SUCCESS);
                return redirect('mano_de_obra');
            } else {
                $error = $this->mano_de_obra_model->error_consulta();
                $mensajes_error = array(trans_line('alerta_error'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
                set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
                return $this->form_edit($id);
            }
        }
    }

    public function borrar_mano($id = 0)
    {
        $this->cargar_idioma->carga_lang('mano_de_obra/mano_de_obra_index');
        if ($this->mano_de_obra_model->borrar_mano($id) != FALSE) {
            set_bootstrap_alert(trans_line('alerta_borrado'), BOOTSTRAP_ALERT_SUCCESS);
            return redirect('mano_de_obra');
        } else {
            $error = $this->mano_de_obra_model->error_consulta();
            $mensajes_error = array(trans_line('alerta_borrado_fail'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
            set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
        }
        redirect('mano_de_obra');
    }
}