<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Obra_etapa_fase_zona_concepto
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->business('concepto');
        $this->CI->load->business('conceptos_catalogo');
        $this->CI->load->business('etapa');
        $this->CI->load->business('fase');
        $this->CI->load->business('obra');
        $this->CI->load->business('zona');
        $this->CI->load->model('obras_etapas_fases_zonas_conceptos_model', 'oefzc_model');
    }

    public function error_consulta()
    {
        return $this->CI->oefzc_model->error_consulta();
    }

    public function ultimo_id()
    {
        return $this->CI->oefzc_model->ultimo_id();
    }

    public function insertar_oefzc($oefzc = array())
    {
        return $this->CI->oefzc_model->insertar_oefzc($oefzc);
    }

    public function inserta_arbol($arbol = array(), $es_por_zonas = 0, $obras_id = 0)
    {
        /*
         * Etapa
         *  Fase
         *   Zona / Concepto
         *    Concepto
         */
        $obra_edit['es_por_zonas'] = $es_por_zonas;
        $obra_edit['obras_id'] = $obras_id;
        if($this->CI->obra->editar_obra($obra_edit) != true){
            $result['estatus'] = 'ERROR';
            $result['error'] = 'Error al actualizar la obra: ' . $this->CI->obra->error_consulta();
            return $result;
        }

        $result = array();
        foreach ($arbol as $etapa) {
            $oefzc = array();
            if ($etapa->tipo != 'etapa') {
                $result['estatus'] = 'ERROR';
                $result['error'] = 'Arbol corrupto en etapa';
                break;
            }
            if (!isset($etapa->children)) {
                $result['estatus'] = 'ERROR';
                $result['error'] = 'Arbol corrupto en fase: no es arreglo';
                continue;
            }
            foreach ($etapa->children as $fase) {
                $oefzc = array();
                if ($fase->tipo != 'fase') {
                    $result['estatus'] = 'ERROR';
                    $result['error'] = 'Arbol corrupto en fase';
                    break;
                }
                $oefzc['obras_id'] = $obras_id;
                $oefzc['etapas_id'] = $etapa->id;
                $oefzc['fases_id'] = $fase->id;
                $oefzc['fecha_inicio'] = $fase->fechaInicio;
                $oefzc['fecha_fin'] = $fase->fechaFin;
                $oefzc_ins = $this->insertar_oefzc($oefzc);
                if ($oefzc_ins) {
                    $result['estatus'] = 'OK';
                    $result['error'] = '';
                } else {
                    $result['estatus'] = 'ERROR';
                    $result['error'] = $this->error_consulta();
                    break;
                }
                if (!isset($fase->children)) {
                    $result['estatus'] = 'ERROR';
                    $result['error'] = 'Arbol corrupto en zona/concepto: no es arreglo';
                    continue;
                }
                if ((bool)$es_por_zonas) {
                    foreach ($fase->children as $zona) {
                        $oefzc = array();
                        if ($zona->tipo != 'zona') {
                            $result['estatus'] = 'ERROR';
                            $result['error'] = 'Arbol corrupto en zona';
                            break;
                        }
                        $oefzc['obras_id'] = $obras_id;
                        $oefzc['etapas_id'] = $etapa->id;
                        $oefzc['fases_id'] = $fase->id;
                        $oefzc['zonas_id'] = $zona->id;
                        $oefzc['fecha_inicio'] = $zona->fechaInicio;
                        $oefzc['fecha_fin'] = $zona->fechaFin;
                        $oefzc_ins = $this->insertar_oefzc($oefzc);
                        if ($oefzc_ins) {
                            $result['estatus'] = 'OK';
                            $result['error'] = '';
                        } else {
                            $result['estatus'] = 'ERROR';
                            $result['error'] = $this->error_consulta();
                            break;
                        }
                        if (!isset($zona->children)) {
                            $result['estatus'] = 'ERROR';
                            $result['error'] = 'Arbol corrupto en zona a concepto: no es arreglo';
                            continue;
                        }
                        foreach ($zona->children as $concepto) {
                            $oefzc = array();
                            if ($concepto->tipo != 'concepto') {
                                $result['estatus'] = 'ERROR';
                                $result['error'] = 'Arbol corrupto en concepto por zona';
                                break;
                            }
                            //INSERTAMOS CONCEPTO
                            $concepto_dto = $this->CI->conceptos_catalogo->conceptos_catalogo_por_id($concepto->id);
                            $concepto_dto->clave_en_obra = $concepto->claveEnObra;
                            $concepto_dto->cantidad = $concepto->cantidad;
                            $con_ins = $this->CI->concepto->insertar_concepto((array)$concepto_dto);
                            if ($con_ins) {
                                //INSERTAMOS EN ARBOL
                                $concepto_id = $this->CI->concepto->ultimo_id();
                                $oefzc['obras_id'] = $obras_id;
                                $oefzc['etapas_id'] = $etapa->id;
                                $oefzc['fases_id'] = $fase->id;
                                $oefzc['zonas_id'] = $zona->id;
                                $oefzc['conceptos_id'] = $concepto_id;
                                $oefzc['fecha_inicio'] = $concepto->fechaInicio;
                                $oefzc['fecha_fin'] = $concepto->fechaFin;
                                $oefzc_ins = $this->insertar_oefzc($oefzc);
                                if ($oefzc_ins) {
                                    $result['estatus'] = 'OK';
                                    $result['error'] = '';
                                } else {
                                    $result['estatus'] = 'ERROR';
                                    $result['error'] = $this->error_consulta();
                                    break;
                                }
                            }
                        }
                    }
                } else {
                    foreach ($fase->children as $concepto) {
                        $oefzc = array();
                        if ($concepto->tipo != 'concepto') {
                            $result['estatus'] = 'ERROR';
                            $result['error'] = 'Arbol corrupto en concepto sin zona';
                            break;
                        }
                        //INSERTAMOS CONCEPTO
                        $concepto_dto = $this->CI->conceptos_catalogo->conceptos_catalogo_por_id($concepto->id);
                        $concepto_dto->clave_en_obra = $concepto->claveEnObra;
                        $concepto_dto->cantidad = $concepto->cantidad;
                        $con_ins = $this->CI->concepto->insertar_concepto((array)$concepto_dto);
                        if ($con_ins) {
                            //INSERTAMOS EN ARBOL
                            $concepto_id = $this->CI->concepto->ultimo_id();
                            $oefzc['obras_id'] = $obras_id;
                            $oefzc['etapas_id'] = $etapa->id;
                            $oefzc['fases_id'] = $fase->id;
                            $oefzc['conceptos_id'] = $concepto_id;
                            $oefzc['fecha_inicio'] = $concepto->fechaInicio;
                            $oefzc['fecha_fin'] = $concepto->fechaFin;
                            $oefzc_ins = $this->insertar_oefzc($oefzc);
                            if ($oefzc_ins) {
                                $result['estatus'] = 'OK';
                                $result['error'] = '';
                            } else {
                                $result['estatus'] = 'ERROR';
                                $result['error'] = $this->error_consulta();
                                break;
                            }
                        }
                    }
                }
            }
        }
        return $result;
    }

    public function genera_arbol_de_obras_id($obras_id = 0, $json_tree = false)
    {
        $obra = $this->CI->obra->obra_por_id($obras_id);
        $obra->tipo = 'obra';
        $obra->id = $obras_id;
        $es_por_zona = (bool) $obra->es_por_zonas;
        $etapas = $this->CI->etapa->etapas_por_obras_id($obra->obras_id);
        $obra->{($json_tree) ? 'children' : 'etapas'} = $etapas;

        foreach ($obra->{($json_tree) ? 'children' : 'etapas'} as $etapa){
            $etapa->tipo = 'etapa';
            $etapa->id = $etapa->etapas_id;
            $fases = $this->CI->fase->fases_por_obra_etapa_id($obras_id, $etapa->etapas_id);
            $etapa->{($json_tree) ? 'children' : 'fases'} = $fases;

            foreach ($etapa->{($json_tree) ? 'children' : 'fases'} as $fase){
                $fase->tipo = 'fase';
                $fase->id = $fase->fases_id;
                if ($es_por_zona){
                    $zonas = $this->CI->zona->zonas_por_obra_etapa_fases_id($obras_id, $etapa->etapas_id, $fase->fases_id);
                    $fase->{($json_tree) ? 'children' : 'zonas'} = $zonas;

                    foreach ($fase->{($json_tree) ? 'children' : 'zonas'} as $zona){
                        $zona->tipo = 'zona';
                        $zona->id = $zona->zonas_id;
                        $conceptos = $this->CI->concepto->conceptos_por_obra_etapa_fases_zonas_id($obras_id, $etapa->etapas_id, $fase->fases_id, $zona->zonas_id);
                        $zona->{($json_tree) ? 'children' : 'conceptos'} = $conceptos;
                        foreach ($zona->{($json_tree) ? 'children' : 'conceptos'} as $concepto){
                            $concepto->tipo = 'concepto';
                            $concepto->id = $concepto->conceptos_id;
                        }
                    }
                }else{
                    $conceptos = $this->CI->concepto->conceptos_por_obra_etapa_fases_id($obras_id, $etapa->etapas_id, $fase->fases_id);
                    $fase->{($json_tree) ? 'children' : 'conceptos'} = $conceptos;
                    foreach ($fase->{($json_tree) ? 'children' : 'conceptos'} as $concepto){
                        $concepto->tipo = 'concepto';
                        $concepto->id = $concepto->conceptos_id;
                    }
                }
            }
        }
        return $obra;
    }

}