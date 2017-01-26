<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include("Acl_controller.php");

class Conceptos_catalogo extends Acl_controller
{
    private $template_base = 'index';

    function __construct()
    {
        parent::__construct();

        $this->set_read_list(array('index'));
        $this->set_insert_list(array('insertar_concepto', 'form_insert', 'insertar_concepto_ajax'));
        $this->set_update_list(array('editar_concepto', 'form_edit'));
        $this->set_delete_list(array('borrar_concepto'));

        $this->check_access();

        $this->load->model('conceptos_categoria_model');
        $this->load->model('conceptos_catalogo_model');
        $this->load->model('unidades_model');
        $this->load->library('form_validation');
    }

    public function insertar_concepto()
    {
        $this->cargar_idioma->carga_lang('conceptos/conceptos_insertar');
        $this->form_validation->set_rules('nombre', trans_line('nombre'), 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->form_insert();
        } else {
            $concepto = $this->input->post();
            if ($this->conceptos_catalogo_model->insertar_concepto($concepto) == TRUE) {
                set_bootstrap_alert(trans_line('alerta_exito'), BOOTSTRAP_ALERT_SUCCESS);
                return redirect('conceptos/form_insert');
            } else {
                $error = $this->conceptos_catalogo_model->error_consulta();
                $mensajes_error = array(trans_line('alerta_error'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
                set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
                return $this->form_insert();
            }
        }
    }

    public function insertar_concepto_ajax()
    {
        $this->cargar_idioma->carga_lang('conceptos/conceptos_insertar');
        $this->form_validation->set_rules('nombre', trans_line('nombre'), 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $obj = new stdClass();
            $obj->estatus = 'ERROR';
            header('Content-Type: application/json');
            echo json_encode($obj);
        } else {
            $concepto = $this->input->post();
            $categorias = $concepto['conceptos_categoria_id'];
            unset($concepto['conceptos_categoria_id']);
            $concepto = array_map('strtoupper', $concepto);
            if ($this->conceptos_catalogo_model->insertar_concepto($concepto) == TRUE) {
                $con_id = $this->conceptos_catalogo_model->ultimo_id();
                foreach ($categorias as $categoria){
                    $cat_ins['conceptos_catalogo_id'] = $con_id;
                    $cat_ins['conceptos_categoria_id'] = $categoria;
                    $this->conceptos_catalogo_model->insertar_rel_concepto_categoria($cat_ins);
                }
                $obj = new stdClass();
                $obj->estatus = 'OK';
                header('Content-Type: application/json');
                echo json_encode($obj);
            } else {
                $obj = new stdClass();
                $obj->estatus = 'ERROR';
                header('Content-Type: application/json');
                echo json_encode($obj);
            }
        }
    }
}