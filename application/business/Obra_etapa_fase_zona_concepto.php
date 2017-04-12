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
            if ($etapa->tipo != 'etapa') {
                $result['estatus'] = 'ERROR';
                $result['error'] = 'Arbol corrupto en etapa';
                break;
            }
            if (!is_array($etapa->children)) {
                $result['estatus'] = 'ERROR';
                $result['error'] = 'Arbol corrupto en fase: no es arreglo';
                break;
            }
            foreach ($etapa->children as $fase) {
                if ($fase->tipo != 'fase') {
                    $result['estatus'] = 'ERROR';
                    $result['error'] = 'Arbol corrupto en fase';
                    break;
                }
                if (!is_array($fase->children)) {
                    $result['estatus'] = 'ERROR';
                    $result['error'] = 'Arbol corrupto en zona/concepto: no es arreglo';
                    break;
                }
                if ((bool)$es_por_zonas) {
                    foreach ($fase->children as $zona) {
                        if ($zona->tipo != 'zona') {
                            $result['estatus'] = 'ERROR';
                            $result['error'] = 'Arbol corrupto en zona';
                            break;
                        }
                        foreach ($zona->children as $concepto) {
                            if ($concepto->tipo != 'concepto') {
                                $result['estatus'] = 'ERROR';
                                $result['error'] = 'Arbol corrupto en concepto';
                                break;
                            }
                            //INSERTAMOS CONCEPTO
                            $concepto_dto = $this->CI->conceptos_catalogo->conceptos_catalogo_por_id($concepto->id);
                            $concepto_dto->clave_en_obra = $concepto->claveEnObra;
                            $concepto_dto->cantidad = $concepto->cantidad;
                            $con_ins = $this->CI->concepto->insertar_concepto((array)$concepto);
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
                                }
                            }
                        }
                    }
                } else {
                    foreach ($fase->children as $concepto) {
                        if ($concepto->tipo != 'concepto') {
                            $result['estatus'] = 'ERROR';
                            $result['error'] = 'Arbol corrupto en concepto';
                            break;
                        }
                        //INSERTAMOS CONCEPTO
                        $concepto_dto = $this->CI->conceptos_catalogo->conceptos_catalogo_por_id($concepto->id);
                        $concepto_dto->clave_en_obra = $concepto->claveEnObra;
                        $concepto_dto->cantidad = $concepto->cantidad;
                        $con_ins = $this->CI->concepto->insertar_concepto((array)$concepto);
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
                            }
                        }
                    }
                }
            }
        }
        return $result;
    }

}