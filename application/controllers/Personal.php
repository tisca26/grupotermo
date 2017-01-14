<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

include("Acl_controller.php");

class Personal extends Acl_controller
{
    private $template_base = 'index';

    function __construct()
    {
        parent::__construct();

        $this->set_read_list(array('index', 'estados_por_pais', 'municipios_por_estado', 'departamentos_por_empresa', 'obras_por_empresa',
            'registros_patronales_por_empresa'));
        $this->set_insert_list(array('insertar_personal', 'form_insert'));
        $this->set_update_list(array('editar_personal', 'form_edit'));
        $this->set_delete_list(array('borrar_personal'));

        $this->check_access();

        $this->config->load('dir_upload');
        $this->load->model('bancos_model');
        $this->load->model('catalogos_model');
        $this->load->model('cat_paises_model');
        $this->load->model('cat_estados_model');
        $this->load->model('cat_municipios_model');
        $this->load->model('empresas_model');
        $this->load->model('empresas_departamentos_model');
        $this->load->model('obras_model');
        $this->load->model('periodo_de_pago_model');
        $this->load->model('personal_model');
        $this->load->model('personal_contratos_model');
        $this->load->model('mano_de_obra_model');
        $this->load->model('registro_patronal_model');
        $this->load->model('tipos_regimen_model');

        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->cargar_idioma->carga_lang('personal/personal_index');
        $data = array();
        $data['rows'] = $this->personal_model->personal_todos();
        $template['_B'] = 'personal/personal_index.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function form_insert()
    {
        $this->cargar_idioma->carga_lang('personal/personal_insertar');
        $data = array();
        $data['bancos'] = $this->bancos_model->bancos_todos_sel();
        $data['empresas'] = $this->empresas_model->empresas_todos_sel();
        $data['puestos'] = $this->mano_de_obra_model->mano_de_obra_todos_sel();
        $data['paises'] = $this->cat_paises_model->paises_todos_sel();
        $data['contratos'] = $this->personal_contratos_model->personal_contratos_todos_sel();
        $data['generos'] = $this->catalogos_model->sexo_sel();
        $data['estados_civiles'] = $this->catalogos_model->estado_civil_sel();
        $data['tipos_regimen'] = $this->tipos_regimen_model->tipos_regimen_todos_sel();
        $data['tipo'] = $this->catalogos_model->personal_tipo_sel();
        $data['turnos'] = $this->catalogos_model->personal_turno_sel();
        $data['tipos_credito'] = $this->catalogos_model->tipos_credito_imss_sel();
        $data['periodos_pago'] = $this->periodo_de_pago_model->periodo_de_pago_todos_sel();
        $template['_B'] = 'personal/personal_insertar.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function insertar_personal()
    {
        $this->cargar_idioma->carga_lang('personal/personal_insertar');
        $this->form_validation->set_rules('rfc', trans_line('rfc'), 'required|trim|min_length[10]');
        if ($this->form_validation->run() == FALSE) {
            $this->form_insert();
        } else {

            $dir_carpeta_base = $this->config->item('dir_foto_personal');
            $nombre_archivo = uniqid('personal_');
            $config = $this->_crea_opciones_carga($dir_carpeta_base , 'jpg|png', $nombre_archivo);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto_personal')) {
                $error = trans_line('foto_personal') . ': ' . $this->upload->display_errors() . $dir_carpeta_base;
                set_bootstrap_alert($error, BOOTSTRAP_ALERT_DANGER);
            }
            $personal = $this->input->post();
            $personal['foto_personal'] = $nombre_archivo;
            if ($this->personal_model->insertar_personal($personal) == TRUE) {
                $personal_id = $this->personal_model->ultimo_id();
                set_bootstrap_alert(trans_line('alerta_exito'), BOOTSTRAP_ALERT_SUCCESS);
                return redirect('personal/form_insert');
            } else {
                unlink();
                $error = $this->personal_model->error_consulta();
                $mensajes_error = array(trans_line('alerta_error'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
                set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
                return $this->form_insert();
            }
        }
    }

    public function form_edit($personal_id = 0)
    {
        $this->cargar_idioma->carga_lang('personal/personal_editar');
        $data = array();
        $data['personal'] = $this->personal_model->personal_por_id($personal_id);
        $data['categorias'] = $this->personal_categoria_model->personal_categoria_todos_array_sel();
        $data['categorias_sel'] = $this->personal_model->rel_personal_categoria_sel($personal_id);
        $data['proveedores'] = $this->proveedores_model->proveedores_todos_sel();
        $data['precios'] = $this->personal_model->precios_proveedores_por_personal_id($personal_id);
        $data['unidades'] = $this->unidades_model->unidades_todos_array();
        $template['_B'] = 'personal/personal_editar.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function editar_personal()
    {
        $this->cargar_idioma->carga_lang('personal/personal_editar');
        $this->form_validation->set_rules('nombre', trans_line('nombre'), 'required|trim|min_length[3]');
        $id = $this->input->post('personal_id');
        if ($this->form_validation->run() == FALSE) {
            $this->form_edit($id);
        } else {
            $personal = $this->input->post();
            $personal['estatus'] = (int)$personal['estatus'];
            $categorias = $personal['personal_categoria_id'];
            $precios = $personal['precio_unitario'];
            $proveedores = $personal['proveedores_id'];
            unset($personal['personal_categoria_id']);
            unset($personal['precio_unitario']);
            unset($personal['proveedores_id']);
            if ($this->personal_model->editar_personal($personal) == TRUE) {
                $this->personal_model->borrar_rel_personal_categoria($id);
                foreach ($categorias as $categoria) {
                    $rel = array();
                    $rel['personal_id'] = $id;
                    $rel['personal_categoria_id'] = $categoria;
                    $this->personal_model->insertar_rel_personal_categoria($rel);
                }
                $this->personal_model->borrar_rel_personal_precio($id);
                foreach ($proveedores as $key => $proveedor) {
                    if (intval($proveedor) > 0) {
                        $mp = array();
                        $mp['precio_unitario'] = $precios[$key];
                        $mp['personal_id'] = $id;
                        $mp['proveedores_id'] = $proveedor;
                        $this->personal_model->insertar_rel_personal_precio_proveedor($mp);
                    }
                }
                set_bootstrap_alert(trans_line('alerta_exito'), BOOTSTRAP_ALERT_SUCCESS);
                return redirect('personal');
            } else {
                $error = $this->personal_model->error_consulta();
                $mensajes_error = array(trans_line('alerta_error'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
                set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
                return $this->form_edit($id);
            }
        }
    }

    public function borrar_personal($id = 0)
    {
        $this->cargar_idioma->carga_lang('personal/personal_index');
        if ($this->personal_model->borrar_personal($id) != FALSE) {
            set_bootstrap_alert(trans_line('alerta_borrado'), BOOTSTRAP_ALERT_SUCCESS);
            return redirect('personal');
        } else {
            $error = $this->personal_model->error_consulta();
            $mensajes_error = array(trans_line('alerta_borrado_fail'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
            set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
        }
        redirect('personal');
    }

    public function estados_por_pais($cat_paises_id = 0)
    {
        $estados = $this->cat_estados_model->estados_por_pais_id($cat_paises_id);
        header('Content-Type: application/json');
        echo json_encode($estados);
    }

    public function municipios_por_estado($cat_estados_id = 0)
    {
        $municipios = $this->cat_municipios_model->municipios_por_estado_id($cat_estados_id);
        header('Content-Type: application/json');
        echo json_encode($municipios);
    }

    public function departamentos_por_empresa($empresas_id = 0)
    {
        $departamentos = $this->empresas_departamentos_model->departamentos_por_empresas_id($empresas_id);
        header('Content-Type: application/json');
        echo json_encode($departamentos);
    }

    public function obras_por_empresa($empresas_id = 0)
    {
        $obras = $this->obras_model->obras_por_empresas_id($empresas_id);
        header('Content-Type: application/json');
        echo json_encode($obras);
    }

    public function registros_patronales_por_empresa($empresas_id = 0)
    {
        $registros = $this->registro_patronal_model->registro_patronal_por_empresa_id($empresas_id);
        header('Content-Type: application/json');
        echo json_encode($registros);
    }

    private function _crea_opciones_carga($dir, $ext, $file_name)
    {
        $config = array();
        $config['upload_path'] = $dir;
        $config['allowed_types'] = $ext;
        $config['file_name'] = $file_name;
        $config['file_ext_tolower'] = TRUE;
        $config['overwrite'] = TRUE;
        $config['max_size'] = 5120; //5MB
        return $config;
    }
}