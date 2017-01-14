<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

include("Acl_controller.php");

class Servicios extends Acl_controller
{
    private $template_base = 'index';

    function __construct()
    {
        parent::__construct();

        $this->set_read_list(array('index'));
        $this->set_insert_list(array('insertar_servicio', 'form_insert'));
        $this->set_update_list(array('editar_servicio', 'form_edit'));
        $this->set_delete_list(array('borrar_servicio'));

        $this->check_access();

        $this->load->model('servicios_model');
        $this->load->model('servicios_categoria_model');
        $this->load->model('unidades_model');
        $this->load->model('proveedores_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->cargar_idioma->carga_lang('servicios/servicios_index');
        $data = array();
        $data['rows'] = $this->servicios_model->servicios_todos();
        $template['_B'] = 'servicios/servicios_index.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function form_insert()
    {
        $this->cargar_idioma->carga_lang('servicios/servicios_insertar');
        $data = array();
        $data['categorias'] = $this->servicios_categoria_model->servicios_categoria_todos_array_sel();
        $data['unidades'] = $this->unidades_model->unidades_todos_array();
        $data['proveedores'] = $this->proveedores_model->proveedores_todos_sel();
        $template['_B'] = 'servicios/servicios_insertar.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function insertar_servicio()
    {
        $this->cargar_idioma->carga_lang('servicios/servicios_insertar');
        $this->form_validation->set_rules('nombre', trans_line('nombre'), 'required|trim|min_length[3]');
        $this->form_validation->set_rules('precio_propio', trans_line('precio_propio'), 'required|trim|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->form_insert();
        } else {
            $servicio = $this->input->post();
            $servicio['estatus'] = (int) $servicio['estatus'];
            $categorias = $servicio['servicios_categoria_id'];
            $precios = $servicio['precio_unitario'];
            $proveedores = $servicio['proveedores_id'];
            unset($servicio['servicios_categoria_id']);
            unset($servicio['precio_unitario']);
            unset($servicio['proveedores_id']);
            if ($this->servicios_model->insertar_servicio($servicio) == TRUE) {
                $servicios_id = $this->servicios_model->ultimo_id();
                foreach ($categorias as $categoria){
                    $rel = array();
                    $rel['servicios_id'] = $servicios_id;
                    $rel['servicios_categoria_id'] = $categoria;
                    $this->servicios_model->insertar_rel_servicio_categoria($rel);
                }
                foreach ($proveedores as $key => $proveedor) {
                    if (intval($proveedor) > 0) {
                        $sp = array();
                        $sp['precio_unitario'] = $precios[$key];
                        $sp['servicios_id'] = $servicios_id;
                        $sp['proveedores_id'] = $proveedor;
                        $this->servicios_model->insertar_rel_servicio_precio_proveedor($sp);
                    }
                }
                set_bootstrap_alert(trans_line('alerta_exito'), BOOTSTRAP_ALERT_SUCCESS);
                return redirect('servicios/form_insert');
            } else {
                $error = $this->servicios_model->error_consulta();
                $mensajes_error = array(trans_line('alerta_error'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
                set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
                return $this->form_insert();
            }
        }
    }

    public function form_edit($servicios_id = 0)
    {
        $this->cargar_idioma->carga_lang('servicios/servicios_editar');
        $data = array();
        $data['servicio'] = $this->servicios_model->servicio_por_id($servicios_id);
        $data['categorias'] = $this->servicios_categoria_model->servicios_categoria_todos_array_sel();
        $data['categorias_sel'] = $this->servicios_model->rel_servicio_categoria_sel($servicios_id);
        $data['unidades'] = $this->unidades_model->unidades_todos_array();
        $data['proveedores'] = $this->proveedores_model->proveedores_todos_sel();
        $data['precios'] = $this->servicios_model->precios_proveedores_por_servicios_id($servicios_id   );
        $template['_B'] = 'servicios/servicios_editar.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function editar_servicio()
    {
        $this->cargar_idioma->carga_lang('servicios/servicios_editar');
        $this->form_validation->set_rules('nombre', trans_line('nombre'), 'required|trim|min_length[3]');
        $this->form_validation->set_rules('precio_propio', trans_line('precio_propio'), 'required|trim|numeric');
        $id = $this->input->post('servicios_id');
        if ($this->form_validation->run() == FALSE) {
            $this->form_edit($id);
        } else {
            $servicio = $this->input->post();
            $servicio['estatus'] = (int) $servicio['estatus'];
            $categorias = $servicio['servicios_categoria_id'];
            $precios = $servicio['precio_unitario'];
            $proveedores = $servicio['proveedores_id'];
            unset($servicio['servicios_categoria_id']);
            unset($servicio['precio_unitario']);
            unset($servicio['proveedores_id']);
            if ($this->servicios_model->editar_servicio($servicio) == TRUE) {
                $this->servicios_model->borrar_rel_servicio_categoria($id);
                foreach ($categorias as $categoria){
                    $rel = array();
                    $rel['servicios_id'] = $id;
                    $rel['servicios_categoria_id'] = $categoria;
                    $this->servicios_model->insertar_rel_servicio_categoria($rel);
                }
                $this->servicios_model->borrar_rel_servicio_precio($id);
                foreach ($proveedores as $key => $proveedor) {
                    if (intval($proveedor) > 0) {
                        $sp = array();
                        $sp['precio_unitario'] = $precios[$key];
                        $sp['servicios_id'] = $id;
                        $sp['proveedores_id'] = $proveedor;
                        $this->servicios_model->insertar_rel_servicio_precio_proveedor($sp);
                    }
                }
                set_bootstrap_alert(trans_line('alerta_exito'), BOOTSTRAP_ALERT_SUCCESS);
                return redirect('servicios');
            } else {
                $error = $this->servicios_model->error_consulta();
                $mensajes_error = array(trans_line('alerta_error'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
                set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
                return $this->form_edit($id);
            }
        }
    }

    public function borrar_servicio($id = 0)
    {
        $this->cargar_idioma->carga_lang('servicios/servicios_index');
        if ($this->servicios_model->borrar_servicio($id) != FALSE) {
            set_bootstrap_alert(trans_line('alerta_borrado'), BOOTSTRAP_ALERT_SUCCESS);
            return redirect('servicios');
        } else {
            $error = $this->servicios_model->error_consulta();
            $mensajes_error = array(trans_line('alerta_borrado_fail'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
            set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
        }
        redirect('servicios');
    }
}