<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

include("Acl_controller.php");

class Alta_obra extends Acl_controller
{
    private $template_base = 'index';

    function __construct()
    {
        parent::__construct();

        $this->set_read_list(array('index', 'empresas_json', 'obra', 'etapa', 'zona_concepto', 'conceptos_json', 'muestra_conceptos', 'resumen_alta_obra', 'muestra_zonas'));
        $this->set_insert_list(array('insertar_empresa_ajax', 'insertar_obra', 'insertar_etapa', 'seleccionar_zona_concepto', 'insertar_conceptos', 'insertar_zonas_conceptos', 'relacionar_zonas_conceptos'));
        $this->set_update_list(array(''));
        $this->set_delete_list(array(''));

        $this->check_access();

        $this->load->business('empresa');
        $this->load->business('obra');

        $this->load->model('catalogos_model');
        $this->load->model('clientes_model');
        $this->load->model('conceptos_categoria_model');
        $this->load->model('conceptos_catalogo_model');
        $this->load->model('empresas_model');
        $this->load->model('unidades_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        return $this->obra();
    }

    public function obra($obras_id = 0)
    {
        $this->cargar_idioma->carga_lang('alta_obra/alta_obra_obra');
        $data = array();
        $data['empresas'] = $this->empresas_model->empresas_todos_sel();
        $data['clientes'] = $this->clientes_model->clientes_todos_sel();
        $data['obras_id'] = $obras_id;
        $template['_B'] = 'alta_obra/alta_obra_obra.php';
        $this->load->template_view($this->template_base, $data, $template);
    }

    public function empresas_json()
    {
        return $this->empresa->empresas_todos_json();
    }

    public function insertar_empresa_ajax()
    {
        $this->form_validation->set_rules('razon_social', trans_line('razon_social'), 'required|trim');
        $this->form_validation->set_rules('rfc', trans_line('rfc'), 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $obj = new stdClass();
            $obj->estatus = 'ERROR';
            header('Content-Type: application/json');
            echo json_encode($obj);
        } else {
            $empresa = $this->input->post();
            if ($this->empresa->guardar_empresa($empresa) == TRUE){
                $obj = new stdClass();
                $obj->estatus = 'OK';
                header('Content-Type: application/json');
                echo json_encode($obj);
            }else{
                $obj = new stdClass();
                $obj->estatus = 'ERROR';
                $obj->mensaje = $this->empresa->error_consulta();
                header('Content-Type: application/json');
                echo json_encode($obj);
            }
        }
    }

    public function insertar_obra()
    {
        $this->form_validation->set_rules('nombre', trans_line('nombre'), 'required|trim|min_length[3]');
        $this->form_validation->set_rules('fecha_inicio', trans_line('fecha_inicio'), 'required|trim|exact_length[10]|callback_valid_date');
        $this->form_validation->set_rules('fecha_fin', trans_line('fecha_fin'), 'required|trim|exact_length[10]|callback_valid_date');
        $this->form_validation->set_rules('total_autorizado', trans_line('total_autorizado'), 'numeric|max_length[14]');
        if ($this->form_validation->run() == FALSE) {
            $this->cargar_idioma->carga_lang('alta_obra/alta_obra_obra');
            $this->obra();
        } else {
            $obra = $this->input->post();
            $accion = false;
            if ($obra['obras_id'] <= 0) {
                unset($obra['obras_id']);
                $accion = $this->obra->insertar_obra($obra);
            } else {
                $accion = $this->obra->editar_obra($obra);
            }
            if ($accion == TRUE) {
                return redirect('alta_obra/etapa/' . $this->obra->ultimo_id());
            } else {
                $this->cargar_idioma->carga_lang('alta_obra/alta_obra_obra');
                $error = $this->obra->error_consulta();
                $mensajes_error = array(trans_line('alerta_error'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
                set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
                return $this->obra();
            }
        }
    }

    public function etapa($obras_id = 0)
    {
        if ($obras_id > 0) {
            $this->cargar_idioma->carga_lang('alta_obra/alta_obra_etapa');
            $data = array();
            $data['obra'] = $this->obra->obra_por_id($obras_id);
            $template['_B'] = 'alta_obra/alta_obra_etapa.php';
            return $this->load->template_view($this->template_base, $data, $template);
        }
        return redirect('alta_obra');
    }

    public function insertar_etapa()
    {
        $this->form_validation->set_rules('nombre', trans_line('nombre'), 'required|trim|min_length[3]');
        $obras_id = $this->input->post('obras_id');
        if ($this->form_validation->run() == FALSE) {
            $this->etapa($obras_id);
        } else {
            $etapa = $this->input->post();
            if ($this->obra->insertar_etapa($etapa) == TRUE) {
                return redirect('alta_obra/zona_concepto/' . $this->obra->ultimo_id());
            } else {
                $error = $this->obra->error_consulta();
                $mensajes_error = array(trans_line('alerta_error'), trans_line('alerta_error_codigo') . base64_encode($error['message']));
                set_bootstrap_alert($mensajes_error, BOOTSTRAP_ALERT_DANGER);
                return $this->etapa($obras_id);
            }
        }
    }

    public function zona_concepto($etapas_id = 0)
    {
        if ($etapas_id > 0) {
            $this->cargar_idioma->carga_lang('alta_obra/alta_obra_zona_concepto');
            $data = array();
            $data['etapa'] = $this->obra->etapa_por_id($etapas_id);
            $template['_B'] = 'alta_obra/alta_obra_zona_concepto.php';
            return $this->load->template_view($this->template_base, $data, $template);
        }
        return redirect('alta_obra');
    }

    /*
     * Seleccion entre zona y concepto
     */
    public function seleccionar_zona_concepto()
    {
        $tipo_zona_concepto = $this->input->post('tipo_zona_concepto');
        $etapas_id = $this->input->post('etapas_id');
        $obras_id = $this->input->post('obras_id');
        if ($tipo_zona_concepto == 1) {// selecciono conceptos
            return redirect('alta_obra/muestra_conceptos/' . $obras_id . '/' . $etapas_id);
        } elseif ($tipo_zona_concepto == 0) { // selecciono zona
            return redirect('alta_obra/muestra_zonas/' . $obras_id . '/' . $etapas_id);
        }
        redirect('alta_obra/' . $tipo_zona_concepto);

    }

    /*
     * Zonas
     */
    public function muestra_zonas($obras_id, $etapas_id)
    {
        $this->cargar_idioma->carga_lang('alta_obra/alta_obra_zonas');
        $data = array();
        $data['categorias'] = $this->conceptos_categoria_model->conceptos_categoria_todos_sel();
        $data['unidades'] = $this->unidades_model->unidades_todos_sel();
        $data['etapas_id'] = $etapas_id;
        $data['obras_id'] = $obras_id;
        $template['_B'] = 'alta_obra/alta_obra_zonas.php';
        return $this->load->template_view($this->template_base, $data, $template);
    }

    public function insertar_zonas_conceptos()
    {
        $zonas = $this->input->post('zonas_nombres');
        $zonas_fechas_inicio = $this->input->post('zonas_fechas_inicio');
        $zonas_fechas_fin = $this->input->post('zonas_fechas_fin');
        $etapas_id = $this->input->post('etapas_id');
        $obras_id = $this->input->post('obras_id');
        //$conceptos = $this->input->post('group-a');
        $zonas_ids = array();
        $conceptos_ids = array();
        foreach ($zonas as $z_key => $zona) {
            $zona = trim($zona);
            if ($zona != '') {
                $zona_ins = array();
                $zona_ins['nombre'] = $zona;
                $zona_ins['obras_id'] = $obras_id;
                $zona_ins['fecha_inicio'] = $zonas_fechas_inicio[$z_key];
                $zona_ins['fecha_fin'] = $zonas_fechas_fin[$z_key];
                $this->obra->insertar_zona($zona_ins);
                $zonas_ids[] = $this->obra->ultimo_id();
            }
        }

        $conceptos_catalogos = $this->input->post('conceptos_catalogo_id');
        $claves = $this->input->post('clave_en_obra');
        $pus = $this->input->post('precio_unitario');
        foreach ($conceptos_catalogos as $idx => $conceptos_catalogo_id) {
            //falta validar si ya existe concepto en obra
            $concepto = $this->conceptos_catalogo_model->conceptos_catalogo_por_id($conceptos_catalogo_id);
            $con_ins['conceptos_catalogo_id'] = $conceptos_catalogo_id;
            $con_ins['clave_en_obra'] = $claves[$idx];
            $con_ins['clave'] = $concepto->clave;
            $con_ins['nombre'] = $concepto->nombre;
            $con_ins['descripcion_corta'] = $concepto->descripcion_corta;
            $con_ins['precio_unitario'] = $pus[$idx];
            $con_ins['unidades_id'] = $concepto->unidades_id;
            $con_ins['obras_id'] = $obras_id;
            $last_ins = $this->obra->insertar_concepto($con_ins);
            $conceptos_ids[] = $this->obra->ultimo_id();
        }

        $data['zonas_final'] = $this->obra->zonas_por_ids($zonas_ids);
        $data['conceptos_final'] = $this->obra->conceptos_por_ids($conceptos_ids);
        $data['etapas_id'] = $etapas_id;
        $data['obras_id'] = $obras_id;
        $data['unidades'] = $this->unidades_model->unidades_todos_sel();

        $this->cargar_idioma->carga_lang('alta_obra/insertar_zonas_conceptos');
        $template['_B'] = 'alta_obra/insertar_zonas_conceptos.php';
        return $this->load->template_view($this->template_base, $data, $template);

    }

    public function relacionar_zonas_conceptos($obras_id = 0, $etapas_id = 0)
    {
        $etapas_id = $this->input->post('etapas_id');
        $obras_id = $this->input->post('obras_id');
        $conceptos = $this->input->post('conceptos');
        $rel_concepto_cantidad = array();
        foreach ($conceptos as $key => $concepto) {
            if (isset($concepto['asignar']) && $concepto['asignar'] == 1) {
                $ezc = array();
                $concepto['cantidad'] = round($concepto['cantidad'], 2);
                $concepto['precio_unitario'] = round($concepto['precio_unitario'], 2);
                $ezc['conceptos_id'] = $concepto['conceptos_id'];
                $ezc['etapas_id'] = $etapas_id;
                $ezc['cantidad'] = $concepto['cantidad'];
                $ezc['precio_unitario'] = $concepto['precio_unitario'];
                $ezc['zonas_id'] = $concepto['zonas_id'];
                $this->obra->insertar_etapa_zona_concepto($ezc);
                if (isset($rel_concepto_cantidad[$concepto['conceptos_id']])) {
                    $rel_concepto_cantidad[$concepto['conceptos_id']] = $rel_concepto_cantidad[$concepto['conceptos_id']] + $concepto['cantidad'];
                } else {
                    $rel_concepto_cantidad[$concepto['conceptos_id']] = $concepto['cantidad'];
                }
            }
        }
        $this->_actualiza_cantidades_conceptos_generales($rel_concepto_cantidad);
        return redirect('alta_obra/resumen_alta_obra/' . $obras_id . '/1');
    }

    private function _actualiza_cantidades_conceptos_generales($conceptos = array())
    {
        foreach ($conceptos as $conceptos_id => $cantidad) {
            $concepto_insert = array();
            $concepto_insert['conceptos_id'] = $conceptos_id;
            $concepto_insert['cantidad'] = $cantidad;
            $this->obra->editar_concepto($concepto_insert);
        }
    }

    /*
     * Conceptos
     */
    public function muestra_conceptos($obras_id = 0, $etapas_id = 0)
    {
        $this->cargar_idioma->carga_lang('alta_obra/alta_obra_conceptos');
        $data = array();
        $data['categorias'] = $this->conceptos_categoria_model->conceptos_categoria_todos_sel();
        $data['unidades'] = $this->unidades_model->unidades_todos_sel();
        $data['etapas_id'] = $etapas_id;
        $data['obras_id'] = $obras_id;
        $template['_B'] = 'alta_obra/alta_obra_conceptos.php';
        return $this->load->template_view($this->template_base, $data, $template);
    }

    public function insertar_conceptos()
    {
        $obras_id = $this->input->post('obras_id');
        $etapas_id = $this->input->post('etapas_id');
        $conceptos_catalogos = $this->input->post('conceptos_catalogo_id');
        $claves = $this->input->post('clave_en_obra');
        $pus = $this->input->post('precio_unitario');
        $cantidades = $this->input->post('cantidades');
        foreach ($conceptos_catalogos as $idx => $conceptos_catalogo_id) {
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
            $ezc['conceptos_id'] = $concepto_id;
            $ezc['cantidad'] = $cantidades[$idx];
            $ezc['precio_unitario'] = $pus[$idx];
            $last_ins = $this->obra->insertar_etapa_zona_concepto($ezc);
        }
//        foreach ($posted_group as $concepto) {
//            $concepto['obras_id'] = $obras_id;
//            $this->obra->insertar_concepto($concepto);
//
//            $ezc = array();
//            $ezc['conceptos_id'] = $this->obra->ultimo_id();
//            $ezc['etapas_id'] = $etapas_id;
//            $ezc['cantidad'] = $concepto['cantidad'];
//            $ezc['precio_unitario'] = $concepto['precio_unitario'];
//            $this->obra->insertar_etapa_zona_concepto($ezc);
//        }
        return redirect('alta_obra/resumen_alta_obra/' . $obras_id . '/' . 2);
    }

    /*
     * Resumen de la obra
     * @param obras_id ID DE LA OBRA
     * @param tipo_alta FORMA EN QUE SE DIO DE ALTA LA OBRA, POR ZONA=1; POR CONCEPTO=2
     *
     * REDIRIGIMOS EL RESUMEN AL RESUMEN DE OBRAS CONTROLLER
     */
    public function resumen_alta_obra($obras_id = 0, $tipo_alta = 0)
    {
        return redirect('obras/resumen_obra/' . $obras_id);

        if (intval($obras_id) === 0 && intval($tipo_alta) === 0) {
            return redirect('alta_obra');
        }
        $obra = $this->obra->obra_por_id($obras_id);
        $etapas = $this->etapas_model->etapas_por_obras_id($obras_id);
        if (intval($tipo_alta) === 2) {
            foreach ($etapas as $etapa) {
                $etapa->conceptos = $this->etapas_zonas_conceptos_model->conceptos_por_etapa($etapa->etapas_id);
            }
            $this->cargar_idioma->carga_lang('alta_obra/resumen_alta_obra_por_concepto');
            $data = array();
            $data['obra'] = $obra;
            $data['etapas'] = $etapas;
            $template['_B'] = 'alta_obra/resumen_alta_obra_por_concepto.php';
            return $this->load->template_view($this->template_base, $data, $template);
        }
        if (intval($tipo_alta) === 1) {
            foreach ($etapas as $etapa) {
                $etapa->zonas = $this->etapas_zonas_conceptos_model->zonas_por_etapa($etapa->etapas_id);
                foreach ($etapa->zonas as $zona) {
                    $zona->conceptos = $this->etapas_zonas_conceptos_model->conceptos_por_etapa_zona($etapa->etapas_id, $zona->zonas_id);
                }
            }
            $this->cargar_idioma->carga_lang('alta_obra/resumen_alta_obra_por_zona');
            $data = array();
            $data['obra'] = $obra;
            $data['etapas'] = $etapas;
            $template['_B'] = 'alta_obra/resumen_alta_obra_por_zona.php';
            return $this->load->template_view($this->template_base, $data, $template);
        }
        return redirect('alta_obra');
    }

    public function conceptos_json()
    {
        $conceptos = $this->obra->conceptos_nombres();
        $my_array = array();
        foreach ($conceptos as $con) {
            $my_array[] = $con->nombre;
        }
        header('Content-Type: application/json');
        echo json_encode($my_array);
    }

    public function valid_date($date)
    {
        if (!validateDate($date)) {
            $this->form_validation->set_message('valid_date', trans_line('fecha'));
            return false;
        }
        return true;
    }
}