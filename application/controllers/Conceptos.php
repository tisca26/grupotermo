<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

include("Acl_controller.php");

class Conceptos extends Acl_controller
{
    private $template_base = 'index';

    function __construct()
    {
        parent::__construct();

        $this->set_read_list(array('index', 'conceptos_por_categoria_json', 'etapas_por_obras_json', 'zonas_por_obras_json'));
        $this->set_insert_list(array('insertar_concepto', 'form_insert', 'insertar_concepto_obra'));
        $this->set_update_list(array('editar_concepto', 'form_edit'));
        $this->set_delete_list(array('borrar_concepto'));

        $this->check_access();

        $this->load->business('obra');
        $this->load->model('conceptos_model');
        $this->load->model('conceptos_categoria_model');
        $this->load->model('conceptos_catalogo_model');
        $this->load->model('unidades_model');
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
        $data['categorias'] = $this->conceptos_categoria_model->conceptos_categoria_todos_sel();
        $data['obras'] = $this->obra->obras_todos_sel();
        $data['unidades'] = $this->unidades_model->unidades_todos_sel();
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

    public function insertar_concepto_obra()
    {
        $this->cargar_idioma->carga_lang('conceptos/conceptos_insertar');
        $this->form_validation->set_rules('obras_id', trans_line('obras_id'), 'required|trim');
        $this->form_validation->set_rules('etapas_id', trans_line('etapas_id'), 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->form_insert();
        } else {
            $conceptos_catalogos = $this->input->post('conceptos_catalogo_id');
            $claves = $this->input->post('clave_en_obra');
            $pus = $this->input->post('precio_unitario');
            $cantidades = $this->input->post('cantidades');
            $obras_id = $this->input->post('obras_id');
            $etapas_id = $this->input->post('etapas_id');
            $zonas_id = $this->input->post('zonas_id');
            $last_ins = false;
            foreach ($conceptos_catalogos as $idx => $conceptos_catalogo_id){
                //falta validar si ya existe concepto en obra
                $concepto = $this->conceptos_catalogo_model->conceptos_catalogo_por_id($conceptos_catalogo_id);
                $con_ins['conceptos_catalogo_id'] = $conceptos_catalogo_id;
                $con_ins['clave_en_obra'] = $claves[$idx];
                $con_ins['clave'] = $concepto->clave;
                $con_ins['nombre'] = $concepto->nombre;
                $con_ins['descripcion_corta'] = $concepto->descripcion_corta;
                $con_ins['cantidad'] = $cantidades[$idx];
                $con_ins['precio_unitario'] = $pus[$idx];
                $con_ins['unidades_id'] = $concepto->unidades_id;
                $con_ins['obras_id'] = $obras_id;
                $last_ins = $this->obra->insertar_concepto($con_ins);
                $concepto_id = $this->obra->ultimo_id();
                $ezc['etapas_id'] = $etapas_id;
                $ezc['zonas_id'] = $zonas_id;
                $ezc['conceptos_id'] = $concepto_id;
                $ezc['cantidad'] = $cantidades[$idx];
                $ezc['precio_unitario'] = $pus[$idx];
                $last_ins = $this->obra->insertar_etapa_zona_concepto($ezc);
            }
            if ($last_ins) {
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
        $data['obras'] = $this->obras_model->obras_todos_sel();
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

    public function conceptos_por_categoria_json($conceptos_categoria_id = 0)
    {
        $conceptos_catalogo = $this->conceptos_catalogo_model->conceptos_catalogo_por_categoria($conceptos_categoria_id);
        header('Content-Type: application/json');
        echo json_encode($conceptos_catalogo);
    }

    public function etapas_por_obras_json($obras_id = 0)
    {
        $etapas = $this->obra->etapas_por_obras_id($obras_id);
        header('Content-Type: application/json');
        echo json_encode($etapas);
    }

    public function zonas_por_obras_json($obras_id = 0)
    {
        $zonas = $this->obra->zonas_por_obras_id($obras_id);
        header('Content-Type: application/json');
        echo json_encode($zonas);
    }
}