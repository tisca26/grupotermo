<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Catalogos_model extends CI_Model
{

    /**
     * Constructor
     *
     * @access public
     */
    function __construct()
    {
        parent::__construct();
    }

    public function loadUsuarioPerfil($id)
    {
        $data = array();
        $query = $this->db->where('v_usuarios.usuario', $id)->get('v_usuarios');
        if ($query->num_rows() > 0) {
            $data = $query->row();
        }
        return $data;
    }

    public function sexo_sel()
    {
        $data['MASCULINO'] = 'MASCULINO';
        $data['FEMENINO'] = 'FEMENINO';
        return $data;
    }

    public function estado_civil_sel()
    {
        $data['SOLTERO'] = 'SOLTERO';
        $data['CASADO'] = 'CASADO';
        $data['VIUDO'] = 'VIUDO';
        $data['DIVORCIADO'] = 'DIVORCIADO';
        return $data;
    }

    public function personal_tipo_sel()
    {
        $data['SINDICALIZADO'] = 'SINDICALIZADO';
        $data['CONFIANZA'] = 'CONFIANZA';
        return $data;
    }

    public function personal_turno_sel()
    {
        $data['MATUTINO'] = 'MATUTINO';
        $data['DESPERTINO'] = 'DESPERTINO';
        $data['NOCTURNO'] = 'NOCTURNO';
        $data['MIXTO'] = 'MIXTO';
        return $data;
    }
    public function tipos_credito_imss_sel()
    {
        $data['VECES SALARIO MINIMO'] = 'VECES SALARIO MINIMO';
        $data['MOVIMIENTO PERMANENTE'] = 'MOVIMIENTO PERMANENTE';
        $data['PORCENTAJE'] = 'PORCENTAJE';
        $data['CUOTA FIJA'] = 'CUOTA FIJA';
        return $data;
    }

}

?>