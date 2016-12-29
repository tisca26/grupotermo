<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

include("Acl_controller.php");

class Activos extends Acl_controller
{
    private $template_base = 'index';

    function __construct()
    {
        parent::__construct();

        $this->set_read_list(array('index'));
        $this->set_insert_list(array('insertar_activo', 'form_insert'));
        $this->set_update_list(array('editar_activo', 'form_edit'));
        $this->set_delete_list(array('borrar_activo'));

        $this->check_access();

        $this->load->model('activos_model');
        $this->load->model('activos_categoria_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->cargar_idioma->carga_lang('activos/activos_index');
        $data = array();
        $data['rows'] = $this->activos_model->activos_todos();
        $template['_B'] = 'activos/activos_index.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function form_insert()
    {
        $this->cargar_idioma->carga_lang('activos/activos_insertar');
        $data = array();
        $data['categorias'] = $this->activos_categoria_model->activos_categoria_todos_array_sel();
        $template['_B'] = 'activos/activos_insertar.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function insertar_activo()
    {
        $this->cargar_idioma->carga_lang('activos/activos_insertar');
        $this->form_validation->set_rules('nombre', trans_line('nombre'), 'required|trim|min_length[3]');
        $this->form_validation->set_rules('precio_unitario', trans_line('precio_unitario'), 'required|trim|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->form_insert();
        } else {
            $activo = $this->input->post();
            $activo['estatus'] = (int) $activo['estatus'];
            $categorias = $activo['activos_categoria_id'];
            unset($activo['activos_categoria_id']);
            if ($this->activos_model->insertar_activo($activo) == TRUE) {
                $activos_id = $this->activos_model->ultimo_id();
                foreach ($categorias as $categoria){
                    $rel = array();
                    $rel['activos_id'] = $activos_id;
                    $rel['activos_categoria_id'] = $categoria;
                    $this->activos_model->insertar_rel_activo_categoria($rel);
                }
                set_bootstrap_alert(trans_line('alerta_exito'), BOOTSTRAP_ALERT_SUCCESS);
                return redirect('activos/form_insert');
            } else {
                $error = $this->activos_model->error_consulta();
                $mensajes_error = array(trans_line('alerta_error'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
                set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
                return $this->form_insert();
            }
        }
    }

    public function form_edit($activos_id = 0)
    {
        $this->cargar_idioma->carga_lang('activos/activos_editar');
        $data = array();
        $data['activo'] = $this->activos_model->activo_por_id($activos_id);
        $data['categorias'] = $this->activos_categoria_model->activos_categoria_todos_array_sel();
        $data['categorias_sel'] = $this->activos_model->rel_activo_categoria_sel($activos_id);
        $template['_B'] = 'activos/activos_editar.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function editar_activo()
    {
        $this->cargar_idioma->carga_lang('activos/activos_editar');
        $this->form_validation->set_rules('nombre', trans_line('nombre'), 'required|trim|min_length[3]');
        $this->form_validation->set_rules('precio_unitario', trans_line('precio_unitario'), 'required|trim|numeric');
        $id = $this->input->post('activos_id');
        if ($this->form_validation->run() == FALSE) {
            $this->form_edit($id);
        } else {
            $activo = $this->input->post();
            $activo['estatus'] = (int) $activo['estatus'];
            $categorias = $activo['activos_categoria_id'];
            unset($activo['activos_categoria_id']);
            if ($this->activos_model->editar_activo($activo) == TRUE) {
                $this->activos_model->borrar_rel_activo_categoria($id);
                foreach ($categorias as $categoria){
                    $rel = array();
                    $rel['activos_id'] = $id;
                    $rel['activos_categoria_id'] = $categoria;
                    $this->activos_model->insertar_rel_activo_categoria($rel);
                }
                set_bootstrap_alert(trans_line('alerta_exito'), BOOTSTRAP_ALERT_SUCCESS);
                return redirect('activos');
            } else {
                $error = $this->activos_model->error_consulta();
                $mensajes_error = array(trans_line('alerta_error'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
                set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
                return $this->form_edit($id);
            }
        }
    }

    public function borrar_activo($id = 0)
    {
        $this->cargar_idioma->carga_lang('activos/activos_index');
        if ($this->activos_model->borrar_activo($id) != FALSE) {
            set_bootstrap_alert(trans_line('alerta_borrado'), BOOTSTRAP_ALERT_SUCCESS);
            return redirect('activos');
        } else {
            $error = $this->activos_model->error_consulta();
            $mensajes_error = array(trans_line('alerta_borrado_fail'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
            set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
        }
        redirect('activos');
    }
}