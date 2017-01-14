<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

include("Acl_controller.php");

class Materiales extends Acl_controller
{
    private $template_base = 'index';

    function __construct()
    {
        parent::__construct();

        $this->set_read_list(array('index'));
        $this->set_insert_list(array('insertar_material', 'form_insert'));
        $this->set_update_list(array('editar_material', 'form_edit'));
        $this->set_delete_list(array('borrar_material'));

        $this->check_access();

        $this->load->model('unidades_model');
        $this->load->model('materiales_model');
        $this->load->model('materiales_categoria_model');
        $this->load->model('materiales_ubicacion_model');
        $this->load->model('proveedores_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->cargar_idioma->carga_lang('materiales/materiales_index');
        $data = array();
        $data['rows'] = $this->materiales_model->materiales_todos();
        $template['_B'] = 'materiales/materiales_index.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function form_insert()
    {
        $this->cargar_idioma->carga_lang('materiales/materiales_insertar');
        $data = array();
        $data['categorias'] = $this->materiales_categoria_model->materiales_categoria_todos_array_sel();
        $data['proveedores'] = $this->proveedores_model->proveedores_todos_sel();
        $data['unidades'] = $this->unidades_model->unidades_todos_array();
        $template['_B'] = 'materiales/materiales_insertar.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function insertar_material()
    {
        $this->cargar_idioma->carga_lang('materiales/materiales_insertar');
        $this->form_validation->set_rules('nombre', trans_line('nombre'), 'required|trim|min_length[3]');
        if ($this->form_validation->run() == FALSE) {
            $this->form_insert();
        } else {
            $material = $this->input->post();
            $material['estatus'] = (int)$material['estatus'];
            $categorias = $material['materiales_categoria_id'];
            $precios = $material['precio_unitario'];
            $proveedores = $material['proveedores_id'];
            $ubicaciones = $material['nombre_ubicacion'];
            unset($material['materiales_categoria_id']);
            unset($material['precio_unitario']);
            unset($material['proveedores_id']);
            unset($material['nombre_ubicacion']);
            if ($this->materiales_model->insertar_material($material) == TRUE) {
                $materiales_id = $this->materiales_model->ultimo_id();
                foreach ($categorias as $categoria) {
                    $rel = array();
                    $rel['materiales_id'] = $materiales_id;
                    $rel['materiales_categoria_id'] = $categoria;
                    $this->materiales_model->insertar_rel_material_categoria($rel);
                }
                foreach ($proveedores as $key => $proveedor) {
                    if (intval($proveedor) > 0) {
                        $mp = array();
                        $mp['precio_unitario'] = $precios[$key];
                        $mp['materiales_id'] = $materiales_id;
                        $mp['proveedores_id'] = $proveedor;
                        $this->materiales_model->insertar_rel_material_precio_proveedor($mp);
                        $rel_mp_id = $this->materiales_model->ultimo_id();
                        $mu = array();
                        $mu['nombre'] = $ubicaciones[$key];
                        $mu['materiales_precios_id'] = $rel_mp_id;
                        $this->materiales_ubicacion_model->insertar_material_ubicacion($mu);
                    }
                }
                set_bootstrap_alert(trans_line('alerta_exito'), BOOTSTRAP_ALERT_SUCCESS);
                return redirect('materiales/form_insert');
            } else {
                $error = $this->materiales_model->error_consulta();
                $mensajes_error = array(trans_line('alerta_error'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
                set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
                return $this->form_insert();
            }
        }
    }

    public function form_edit($materiales_id = 0)
    {
        $this->cargar_idioma->carga_lang('materiales/materiales_editar');
        $data = array();
        $data['material'] = $this->materiales_model->material_por_id($materiales_id);
        $data['categorias'] = $this->materiales_categoria_model->materiales_categoria_todos_array_sel();
        $data['categorias_sel'] = $this->materiales_model->rel_material_categoria_sel($materiales_id);
        $data['proveedores'] = $this->proveedores_model->proveedores_todos_sel();
        $data['precios'] = $this->materiales_model->precios_proveedores_por_material_id($materiales_id);
        $data['unidades'] = $this->unidades_model->unidades_todos_array();
        $template['_B'] = 'materiales/materiales_editar.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function editar_material()
    {
        $this->cargar_idioma->carga_lang('materiales/materiales_editar');
        $this->form_validation->set_rules('nombre', trans_line('nombre'), 'required|trim|min_length[3]');
        $id = $this->input->post('materiales_id');
        if ($this->form_validation->run() == FALSE) {
            $this->form_edit($id);
        } else {
            $material = $this->input->post();
            $material['estatus'] = (int)$material['estatus'];
            $categorias = $material['materiales_categoria_id'];
            $precios = $material['precio_unitario'];
            $proveedores = $material['proveedores_id'];
            unset($material['materiales_categoria_id']);
            unset($material['precio_unitario']);
            unset($material['proveedores_id']);
            if ($this->materiales_model->editar_material($material) == TRUE) {
                $this->materiales_model->borrar_rel_material_categoria($id);
                foreach ($categorias as $categoria) {
                    $rel = array();
                    $rel['materiales_id'] = $id;
                    $rel['materiales_categoria_id'] = $categoria;
                    $this->materiales_model->insertar_rel_material_categoria($rel);
                }
                $this->materiales_model->borrar_rel_material_precio($id);
                foreach ($proveedores as $key => $proveedor) {
                    if (intval($proveedor) > 0) {
                        $mp = array();
                        $mp['precio_unitario'] = $precios[$key];
                        $mp['materiales_id'] = $id;
                        $mp['proveedores_id'] = $proveedor;
                        $this->materiales_model->insertar_rel_material_precio_proveedor($mp);
                    }
                }
                set_bootstrap_alert(trans_line('alerta_exito'), BOOTSTRAP_ALERT_SUCCESS);
                return redirect('materiales');
            } else {
                $error = $this->materiales_model->error_consulta();
                $mensajes_error = array(trans_line('alerta_error'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
                set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
                return $this->form_edit($id);
            }
        }
    }

    public function borrar_material($id = 0)
    {
        $this->cargar_idioma->carga_lang('materiales/materiales_index');
        if ($this->materiales_model->borrar_material($id) != FALSE) {
            set_bootstrap_alert(trans_line('alerta_borrado'), BOOTSTRAP_ALERT_SUCCESS);
            return redirect('materiales');
        } else {
            $error = $this->materiales_model->error_consulta();
            $mensajes_error = array(trans_line('alerta_borrado_fail'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
            set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
        }
        redirect('materiales');
    }
}