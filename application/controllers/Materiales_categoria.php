<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

include("Acl_controller.php");

class Materiales_categoria extends Acl_controller
{
    private $template_base = 'index';

    function __construct()
    {
        parent::__construct();

        $this->set_read_list(array('index'));
        $this->set_insert_list(array('insertar_material_categoria', 'form_insert'));
        $this->set_update_list(array('editar_material_categoria', 'form_edit'));
        $this->set_delete_list(array('borrar_material_categoria'));

        $this->check_access();

        $this->load->model('materiales_categoria_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->cargar_idioma->carga_lang('materiales_categoria/materiales_categoria_index');
        $data = array();
        $data['rows'] = $this->materiales_categoria_model->materiales_categoria_todos();
        $template['_B'] = 'materiales_categoria/materiales_categoria_index.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function form_insert()
    {
        $this->cargar_idioma->carga_lang('materiales_categoria/materiales_categoria_insertar');
        $data = array();
        $template['_B'] = 'materiales_categoria/materiales_categoria_insertar.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function insertar_material_categoria()
    {
        $this->cargar_idioma->carga_lang('materiales_categoria/materiales_categoria_insertar');
        $this->form_validation->set_rules('nombre', trans_line('nombre'), 'required|trim|min_length[3]');
        $this->form_validation->set_rules('descripcion', trans_line('descripcion'), 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->form_insert();
        } else {
            $material_categoria = $this->input->post();
            if ($this->materiales_categoria_model->insertar_material_categoria($material_categoria) == TRUE) {
                set_bootstrap_alert(trans_line('alerta_exito'), BOOTSTRAP_ALERT_SUCCESS);
                return redirect('materiales_categoria/form_insert');
            } else {
                $error = $this->materiales_categoria_model->error_consulta();
                $mensajes_error = array(trans_line('alerta_error'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
                set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
                return $this->form_insert();
            }
        }
    }

    public function form_edit($materiales_id = 0)
    {
        $this->cargar_idioma->carga_lang('materiales_categoria/materiales_categoria_editar');
        $data = array();
        $data['material_categoria'] = $this->materiales_categoria_model->material_categoria_por_id($materiales_id);
        $template['_B'] = 'materiales_categoria/materiales_categoria_editar.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function editar_material_categoria()
    {
        $this->cargar_idioma->carga_lang('materiales_categoria/materiales_categoria_editar');
        $this->form_validation->set_rules('nombre', trans_line('nombre'), 'required|trim|min_length[3]');
        $this->form_validation->set_rules('descripcion', trans_line('descripcion'), 'required|trim');
        $id = $this->input->post('materiales_categoria_id');
        if ($this->form_validation->run() == FALSE) {
            $this->form_edit($id);
        } else {
            $material_categoria = $this->input->post();
            if ($this->materiales_categoria_model->editar_material_categoria($material_categoria) == TRUE) {
                set_bootstrap_alert(trans_line('alerta_exito'), BOOTSTRAP_ALERT_SUCCESS);
                return redirect('materiales_categoria');
            } else {
                $error = $this->materiales_categoria_model->error_consulta();
                $mensajes_error = array(trans_line('alerta_error'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
                set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
                return $this->form_edit($id);
            }
        }
    }

    public function borrar_material_categoria($id = 0)
    {
        $this->cargar_idioma->carga_lang('materiales_categoria/materiales_categoria_index');
        if ($this->materiales_categoria_model->borrar_material_categoria($id) != FALSE) {
            set_bootstrap_alert(trans_line('alerta_borrado'), BOOTSTRAP_ALERT_SUCCESS);
            return redirect('materiales_categoria');
        } else {
            $error = $this->materiales_categoria_model->error_consulta();
            $mensajes_error = array(trans_line('alerta_borrado_fail'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
            set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
        }
        redirect('materiales_categoria');
    }
}