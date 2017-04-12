<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Obra_etapa_fase_zona_concepto
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->business('concepto');
        $this->CI->load->business('conceptos_catalogo');
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
                if ($oefzc_ins){
                    $result['estatus'] = 'OK';
                    $result['error'] = '';
                }else{
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
                        if ($oefzc_ins){
                            $result['estatus'] = 'OK';
                            $result['error'] = '';
                        }else{
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
                            if ($con_ins){
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
                                if ($oefzc_ins){
                                    $result['estatus'] = 'OK';
                                    $result['error'] = '';
                                }else{
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
                        if ($con_ins){
                            //INSERTAMOS EN ARBOL
                            $concepto_id = $this->CI->concepto->ultimo_id();
                            $oefzc['obras_id'] = $obras_id;
                            $oefzc['etapas_id'] = $etapa->id;
                            $oefzc['fases_id'] = $fase->id;
                            $oefzc['conceptos_id'] = $concepto_id;
                            $oefzc['fecha_inicio'] = $concepto->fechaInicio;
                            $oefzc['fecha_fin'] = $concepto->fechaFin;
                            $oefzc_ins = $this->insertar_oefzc($oefzc);
                            if ($oefzc_ins){
                                $result['estatus'] = 'OK';
                                $result['error'] = '';
                            }else{
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

}