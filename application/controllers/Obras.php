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

        $this->set_read_list(array('index', 'resumen_obra'));
        $this->set_insert_list(array('insertar_obra', 'form_insert'));
        $this->set_update_list(array('editar_obra', 'form_edit'));
        $this->set_delete_list(array('borrar_obra'));

        $this->check_access();

        $this->load->business('obra');

        $this->load->model('clientes_model');
        $this->load->model('empresas_model');
        $this->load->model('etapas_model');
        $this->load->model('zonas_model');
        $this->load->model('etapas_zonas_conceptos_model');
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
        $data['empresas'] = $this->empresas_model->empresas_todos_sel();
        $data['clientes'] = $this->clientes_model->clientes_todos_sel();
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
        if ($this->obra->borrar_obra($id) != FALSE){
            set_bootstrap_alert(trans_line('alerta_borrado'), BOOTSTRAP_ALERT_SUCCESS);
            return redirect('obras');
        }else{
            $error = $this->obra->error_consulta();
            $mensajes_error = array(trans_line('alerta_borrado_fail'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
            set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
        }
        redirect('obras');
    }

    public function resumen_obra($obras_id = 0)
    {
        if (intval($obras_id) === 0 ) {
            return redirect('obras');
        }
        $obra = $this->obras_model->obra_por_id($obras_id);
        $etapas = $this->etapas_model->etapas_por_obras_id($obras_id);
        $zonas_obra = $this->zonas_model->zonas_por_obras_id($obras_id);
        if (count($zonas_obra) == 0) {
            foreach ($etapas as $etapa) {
                $etapa->conceptos = $this->etapas_zonas_conceptos_model->conceptos_por_etapa($etapa->etapas_id);
            }
            $this->cargar_idioma->carga_lang('obras/resumen_obra_por_concepto');
            $data = array();
            $data['obra'] = $obra;
            $data['etapas'] = $etapas;
            $template['_B'] = 'obras/resumen_obra_por_concepto.php';
            return $this->load->template_view($this->template_base, $data, $template);
        }else {
            foreach ($etapas as $etapa) {
                $etapa->zonas = $this->etapas_zonas_conceptos_model->zonas_por_etapa($etapa->etapas_id);
                foreach ($etapa->zonas as $zona) {
                    $zona->conceptos = $this->etapas_zonas_conceptos_model->conceptos_por_etapa_zona($etapa->etapas_id, $zona->zonas_id);
                }
            }
            $this->cargar_idioma->carga_lang('obras/resumen_obra_por_zona');
            $data = array();
            $data['obra'] = $obra;
            $data['etapas'] = $etapas;
            $template['_B'] = 'obras/resumen_obra_por_zona.php';
            return $this->load->template_view($this->template_base, $data, $template);
        }
        return redirect('alta_obra');
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