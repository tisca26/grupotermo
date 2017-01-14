<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1><?php echo trans_line('titulo_pagina'); ?></h1>
            </div>
            <!-- END PAGE TITLE -->
        </div>
    </div>
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE CONTENT BODY -->
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE BREADCRUMBS -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="<?php echo base_url_lang(); ?>"><?php echo trans_line('breadcrumb_home'); ?></a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="<?php echo base_url_lang() . 'activos'; ?>"><?php echo trans_line('breadcrumb_pagina'); ?></a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span><?php echo trans_line('breadcrumb_agregar_pagina'); ?></span>
                </li>
            </ul>
            <!-- END PAGE BREADCRUMBS -->
            <!-- BEGIN PAGE CONTENT INNER -->
            <div class="page-content-inner">
                <?php echo get_bootstrap_alert(); ?>
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption">
                            <span><?php echo trans_line('titulo_forma'); ?></span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', '</div>'); ?>
                        <?php echo form_open_multipart('personal/insertar_personal', array('id' => 'current_form')); ?>
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button>
                            <?php echo trans_line('jquery_invalid'); ?>
                        </div>
                        <div class="alert alert-success display-hide">
                            <button class="close" data-close="alert"></button>
                            <?php echo trans_line('jquery_valid'); ?>
                        </div>
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="<?php echo base_url() . 'assets/docs/personal/personal_1.jpg'; ?>"
                                         class="img-responsive center-block" style="width: 150px;">
                                </div>
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group form-md-line-input">
                                                <?php $data_rfc = [
                                                    'id' => 'rfc',
                                                    'placeholder' => trans_line('rfc_placeholder'),
                                                    'class' => 'form-control',
                                                    'data-rule-required' => 'true',
                                                    'data-msg-required' => trans_line('required')
                                                ]; ?>
                                                <?php echo form_input('rfc', set_value('rfc'), $data_rfc); ?>
                                                <label for="rfc"><?php echo trans_line('rfc'); ?>
                                                    <span class="required">*</span>
                                                </label>
                                                <span class="help-block"><?php echo trans_line('rfc_ayuda'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group form-md-line-input">
                                                <?php $data_curp = [
                                                    'id' => 'curp',
                                                    'placeholder' => trans_line('curp_placeholder'),
                                                    'class' => 'form-control',
                                                    'data-rule-required' => 'true',
                                                    'data-msg-required' => trans_line('required')
                                                ]; ?>
                                                <?php echo form_input('curp', set_value('curp'), $data_curp); ?>
                                                <label for="curp"><?php echo trans_line('curp'); ?>
                                                    <span class="required">*</span>
                                                </label>
                                                <span class="help-block"><?php echo trans_line('curp_ayuda'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group form-md-line-input">
                                                <?php $data_apellido_paterno = [
                                                    'id' => 'apellido_paterno',
                                                    'placeholder' => trans_line('apellido_paterno_placeholder'),
                                                    'class' => 'form-control',
                                                    'data-rule-required' => 'true',
                                                    'data-msg-required' => trans_line('required')
                                                ]; ?>
                                                <?php echo form_input('apellido_paterno', set_value('apellido_paterno'), $data_apellido_paterno); ?>
                                                <label for="apellido_paterno"><?php echo trans_line('apellido_paterno'); ?>
                                                    <span class="required">*</span>
                                                </label>
                                                <span class="help-block"><?php echo trans_line('apellido_paterno_ayuda'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group form-md-line-input">
                                                <?php $data_apellido_materno = [
                                                    'id' => 'apellido_materno',
                                                    'placeholder' => trans_line('apellido_materno_placeholder'),
                                                    'class' => 'form-control',
                                                    'data-rule-required' => 'true',
                                                    'data-msg-required' => trans_line('required')
                                                ]; ?>
                                                <?php echo form_input('apellido_materno', set_value('apellido_materno'), $data_apellido_materno); ?>
                                                <label for="apellido_materno"><?php echo trans_line('apellido_materno'); ?>
                                                    <span class="required">*</span>
                                                </label>
                                                <span class="help-block"><?php echo trans_line('apellido_materno_ayuda'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group form-md-line-input">
                                                <?php $data_nombres = [
                                                    'id' => 'nombres',
                                                    'placeholder' => trans_line('nombres_placeholder'),
                                                    'class' => 'form-control',
                                                    'data-rule-required' => 'true',
                                                    'data-msg-required' => trans_line('required')
                                                ]; ?>
                                                <?php echo form_input('nombres', set_value('nombres'), $data_nombres); ?>
                                                <label for="nombres"><?php echo trans_line('nombres'); ?>
                                                    <span class="required">*</span>
                                                </label>
                                                <span class="help-block"><?php echo trans_line('nombres_ayuda'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group form-md-line-input">
                                                <?php $data_fecha_ingreso = [
                                                    'id' => 'fecha_ingreso',
                                                    'placeholder' => trans_line('fecha_ingreso_placeholder'),
                                                    'class' => 'form-control date-picker',
                                                    'data-rule-required' => 'true',
                                                    'data-msg-required' => trans_line('required')
                                                ]; ?>
                                                <?php echo form_input('fecha_ingreso', set_value('fecha_ingreso'), $data_fecha_ingreso); ?>
                                                <label for="fecha_ingreso"><?php echo trans_line('fecha_ingreso'); ?>
                                                    <span class="required">*</span>
                                                </label>
                                                <span class="help-block"><?php echo trans_line('fecha_ingreso_ayuda'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group form-md-line-input">
                                                <?php $data_contratos = [
                                                    'id' => 'personal_contratos_id',
                                                    'title' => trans_line('personal_contratos_id_placeholder'),
                                                    'class' => 'form-control bs-select',
                                                    'data-size' => '5',
                                                    'data-live-search' => 'true',
                                                    'data-live-search-normalize' => 'true',
                                                    'data-rule-required' => 'true',
                                                    'data-msg-required' => trans_line('required')
                                                ]; ?>
                                                <?php echo form_dropdown('personal_contratos_id', $contratos, set_value('personal_contratos_id'), $data_contratos); ?>
                                                <label for="personal_contratos_id"><?php echo trans_line('personal_contratos_id'); ?>
                                                    <span class="required">*</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group form-md-line-input">
                                                <?php $data_fecha_ultimo_ingreso = [
                                                    'id' => 'fecha_ultimo_ingreso',
                                                    'placeholder' => trans_line('fecha_ultimo_ingreso_placeholder'),
                                                    'class' => 'form-control date-picker',
                                                    'data-rule-required' => 'true',
                                                    'data-msg-required' => trans_line('required')
                                                ]; ?>
                                                <?php echo form_input('fecha_ultimo_ingreso', set_value('fecha_ultimo_ingreso'), $data_fecha_ultimo_ingreso); ?>
                                                <label for="fecha_ultimo_ingreso"><?php echo trans_line('fecha_ultimo_ingreso'); ?>
                                                    <span class="required">*</span>
                                                </label>
                                                <span class="help-block"><?php echo trans_line('fecha_ultimo_ingreso_ayuda'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group form-md-line-input">
                                                <?php $data_fecha_ultima_baja = [
                                                    'id' => 'fecha_ultima_baja',
                                                    'placeholder' => trans_line('fecha_ultima_baja_placeholder'),
                                                    'class' => 'form-control date-picker'
                                                ]; ?>
                                                <?php echo form_input('fecha_ultima_baja', set_value('fecha_ultima_baja'), $data_fecha_ultima_baja); ?>
                                                <label for="fecha_ultima_baja"><?php echo trans_line('fecha_ultima_baja'); ?>
                                                </label>
                                                <span class="help-block"><?php echo trans_line('fecha_ultima_baja_ayuda'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-xs-2">
                                    <ul class="nav nav-tabs tabs-left">
                                        <li class="active">
                                            <a href="#datos_generales"
                                               data-toggle="tab"> <?php echo trans_line('datos_generales'); ?> </a>
                                        </li>
                                        <li>
                                            <a href="#datos_seguridad_social"
                                               data-toggle="tab"> <?php echo trans_line('datos_seguridad_social'); ?> </a>
                                        </li>
                                        <li>
                                            <a href="#datos_pago"
                                               data-toggle="tab"> <?php echo trans_line('datos_pago'); ?> </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-xs-10">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="datos_generales">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_genero = [
                                                            'id' => 'sexo',
                                                            'title' => trans_line('sexo_placeholder'),
                                                            'class' => 'form-control bs-select',
                                                            'data-size' => '5',
                                                            'data-live-search' => 'true',
                                                            'data-live-search-normalize' => 'true'
                                                        ]; ?>
                                                        <?php echo form_dropdown('sexo', $generos, set_value('sexo'), $data_genero); ?>
                                                        <label for="sexo"><?php echo trans_line('sexo'); ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_estado_civil = [
                                                            'id' => 'estado_civil',
                                                            'title' => trans_line('estado_civil_placeholder'),
                                                            'class' => 'form-control bs-select',
                                                            'data-size' => '5',
                                                            'data-live-search' => 'true',
                                                            'data-live-search-normalize' => 'true'
                                                        ]; ?>
                                                        <?php echo form_dropdown('estado_civil', $estados_civiles, set_value('estado_civil'), $data_estado_civil); ?>
                                                        <label for="estado_civil"><?php echo trans_line('estado_civil'); ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_tipos_regimen = [
                                                            'id' => 'tipos_regimen_id',
                                                            'title' => trans_line('tipos_regimen_id_placeholder'),
                                                            'class' => 'form-control bs-select',
                                                            'data-size' => '5',
                                                            'data-live-search' => 'true',
                                                            'data-live-search-normalize' => 'true',
                                                            'data-rule-required' => 'true',
                                                            'data-msg-required' => trans_line('required')
                                                        ]; ?>
                                                        <?php echo form_dropdown('tipos_regimen_id', $tipos_regimen, set_value('tipos_regimen_id'), $data_tipos_regimen); ?>
                                                        <label for="tipos_regimen_id"><?php echo trans_line('tipos_regimen_id'); ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                    <span class="btn green btn-file text-center">
                                                        <span class="fileinput-new"> <?php echo trans_line('seleccionar_foto'); ?> </span>
                                                        <span class="fileinput-exists"> <?php echo trans_line('cambiar_foto'); ?> </span>
                                                        <input type="file" class="form-control center" name="foto_personal"> </span>
                                                        <span class="fileinput-filename"> </span> &nbsp;
                                                        <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_pais = [
                                                            'id' => 'cat_paises_id',
                                                            'title' => trans_line('cat_paises_id_placeholder'),
                                                            'class' => 'form-control bs-select',
                                                            'data-size' => '5',
                                                            'data-live-search' => 'true',
                                                            'data-live-search-normalize' => 'true',
                                                            'data-rule-required' => 'true',
                                                            'data-msg-required' => trans_line('required')
                                                        ]; ?>
                                                        <?php echo form_dropdown('', $paises, set_value('cat_paises_id'), $data_pais); ?>
                                                        <label for="cat_paises_id"><?php echo trans_line('cat_paises_id'); ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_estado = [
                                                            'id' => 'cat_estados_id',
                                                            'title' => trans_line('cat_estados_id_placeholder'),
                                                            'class' => 'form-control bs-select',
                                                            'data-size' => '5',
                                                            'data-live-search' => 'true',
                                                            'data-live-search-normalize' => 'true',
                                                            'data-rule-required' => 'true',
                                                            'data-msg-required' => trans_line('required')
                                                        ]; ?>
                                                        <?php echo form_dropdown('', '', set_value('cat_estados_id'), $data_estado); ?>
                                                        <label for="cat_estados_id"><?php echo trans_line('cat_estados_id'); ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_municipio = [
                                                            'id' => 'nacimiento_municipio_id',
                                                            'title' => trans_line('nacimiento_municipio_id_placeholder'),
                                                            'class' => 'form-control bs-select',
                                                            'data-size' => '5',
                                                            'data-live-search' => 'true',
                                                            'data-live-search-normalize' => 'true',
                                                            'data-rule-required' => 'true',
                                                            'data-msg-required' => trans_line('required')
                                                        ]; ?>
                                                        <?php echo form_dropdown('nacimiento_municipio_id', '', set_value('nacimiento_municipio_id'), $data_municipio); ?>
                                                        <label for="nacimiento_municipio_id"><?php echo trans_line('nacimiento_municipio_id'); ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_fecha_nacimiento = [
                                                            'id' => 'fecha_nacimiento',
                                                            'placeholder' => trans_line('fecha_nacimiento_placeholder'),
                                                            'class' => 'form-control date-picker',
                                                            'data-rule-required' => 'true',
                                                            'data-msg-required' => trans_line('required')
                                                        ]; ?>
                                                        <?php echo form_input('fecha_nacimiento', set_value('fecha_nacimiento'), $data_fecha_nacimiento); ?>
                                                        <label for="fecha_nacimiento"><?php echo trans_line('fecha_nacimiento'); ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                        <span class="help-block"><?php echo trans_line('fecha_nacimiento_ayuda'); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_empresa = [
                                                            'id' => 'empresas_id',
                                                            'title' => trans_line('empresas_id_placeholder'),
                                                            'class' => 'form-control bs-select',
                                                            'data-size' => '5',
                                                            'data-live-search' => 'true',
                                                            'data-live-search-normalize' => 'true',
                                                            'data-rule-required' => 'true',
                                                            'data-msg-required' => trans_line('required')
                                                        ]; ?>
                                                        <?php echo form_dropdown('empresas_id', $empresas, '', $data_empresa); ?>
                                                        <label for="empresas_id"><?php echo trans_line('empresas_id'); ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_registro_patronal = [
                                                            'id' => 'registro_patronal_id',
                                                            'title' => trans_line('registro_patronal_id_placeholder'),
                                                            'class' => 'form-control bs-select',
                                                            'data-size' => '5',
                                                            'data-live-search' => 'true',
                                                            'data-live-search-normalize' => 'true',
                                                            'data-rule-required' => 'true',
                                                            'data-msg-required' => trans_line('required')
                                                        ]; ?>
                                                        <?php echo form_dropdown('registro_patronal_id', '', set_value('registro_patronal_id'), $data_registro_patronal); ?>
                                                        <label for="registro_patronal_id"><?php echo trans_line('registro_patronal_id'); ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_departamentos = [
                                                            'id' => 'empresas_departamentos_id',
                                                            'title' => trans_line('empresas_departamentos_id_placeholder'),
                                                            'class' => 'form-control bs-select',
                                                            'data-size' => '5',
                                                            'data-live-search' => 'true',
                                                            'data-live-search-normalize' => 'true',
                                                            'data-rule-required' => 'true',
                                                            'data-msg-required' => trans_line('required')
                                                        ]; ?>
                                                        <?php echo form_dropdown('empresas_departamentos_id', '', set_value('empresas_departamentos_id'), $data_departamentos); ?>
                                                        <label for="empresas_departamentos_id"><?php echo trans_line('empresas_departamentos_id'); ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_puesto = [
                                                            'id' => 'mano_de_obra_id',
                                                            'title' => trans_line('mano_de_obra_id_placeholder'),
                                                            'class' => 'form-control bs-select',
                                                            'data-size' => '5',
                                                            'data-live-search' => 'true',
                                                            'data-live-search-normalize' => 'true',
                                                            'data-rule-required' => 'true',
                                                            'data-msg-required' => trans_line('required')
                                                        ]; ?>
                                                        <?php echo form_dropdown('mano_de_obra_id', $puestos, set_value('mano_de_obra_id'), $data_puesto); ?>
                                                        <label for="mano_de_obra_id"><?php echo trans_line('mano_de_obra_id'); ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_tipo = [
                                                            'id' => 'tipo_empleado',
                                                            'title' => trans_line('tipo_placeholder'),
                                                            'class' => 'form-control bs-select',
                                                            'data-size' => '5',
                                                            'data-live-search' => 'true',
                                                            'data-live-search-normalize' => 'true',
                                                            'data-rule-required' => 'true',
                                                            'data-msg-required' => trans_line('required')
                                                        ]; ?>
                                                        <?php echo form_dropdown('tipo_empleado', $tipo, set_value('tipo_empleado'), $data_tipo); ?>
                                                        <label for="tipo"><?php echo trans_line('tipo'); ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_turnos = [
                                                            'id' => 'turno',
                                                            'title' => trans_line('turno_placeholder'),
                                                            'class' => 'form-control bs-select',
                                                            'data-size' => '5',
                                                            'data-live-search' => 'true',
                                                            'data-live-search-normalize' => 'true',
                                                            'data-rule-required' => 'true',
                                                            'data-msg-required' => trans_line('required')
                                                        ]; ?>
                                                        <?php echo form_dropdown('turno', $turnos, set_value('turno'), $data_turnos); ?>
                                                        <label for="turno"><?php echo trans_line('turno'); ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_obras = [
                                                            'id' => 'obras_id',
                                                            'title' => trans_line('obras_id_placeholder'),
                                                            'class' => 'form-control bs-select',
                                                            'data-size' => '5',
                                                            'data-live-search' => 'true',
                                                            'data-live-search-normalize' => 'true',
                                                            'data-rule-required' => 'true',
                                                            'data-msg-required' => trans_line('required')
                                                        ]; ?>
                                                        <?php echo form_dropdown('obras_id', '', set_value('obras_id'), $data_obras); ?>
                                                        <label for="obras_id"><?php echo trans_line('obras_id'); ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_tel_fijo = [
                                                            'id' => 'tel_fijo',
                                                            'placeholder' => trans_line('tel_fijo_placeholder'),
                                                            'class' => 'form-control',
                                                            'data-rule-digits' => 'true',
                                                            'data-msg-digits' => trans_line('digits')
                                                        ]; ?>
                                                        <?php echo form_input('tel_fijo', set_value('tel_fijo'), $data_tel_fijo); ?>
                                                        <label for="tel_fijo"><?php echo trans_line('tel_fijo'); ?>
                                                        </label>
                                                        <span class="help-block"><?php echo trans_line('tel_fijo_ayuda'); ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_tel_movil = [
                                                            'id' => 'tel_movil',
                                                            'placeholder' => trans_line('tel_movil_placeholder'),
                                                            'class' => 'form-control',
                                                            'data-rule-digits' => 'true',
                                                            'data-msg-digits' => trans_line('digits')
                                                        ]; ?>
                                                        <?php echo form_input('tel_movil', set_value('tel_movil'), $data_tel_movil); ?>
                                                        <label for="tel_movil"><?php echo trans_line('tel_movil'); ?>
                                                        </label>
                                                        <span class="help-block"><?php echo trans_line('tel_movil_ayuda'); ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_correo = [
                                                            'id' => 'email',
                                                            'placeholder' => trans_line('email_personal_placeholder'),
                                                            'class' => 'form-control',
                                                            'data-rule-email' => 'true',
                                                            'data-msg-email' => trans_line('correo')
                                                        ]; ?>
                                                        <?php echo form_input('email', set_value('email'), $data_correo); ?>
                                                        <label for="email"><?php echo trans_line('email_personal'); ?>
                                                        </label>
                                                        <span class="help-block"><?php echo trans_line('email_personal_ayuda'); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_direccion = [
                                                            'id' => 'direccion',
                                                            'placeholder' => trans_line('direccion_placeholder'),
                                                            'class' => 'form-control',
                                                            'data-rule-required' => 'true',
                                                            'data-msg-required' => trans_line('required')
                                                        ]; ?>
                                                        <?php echo form_input('direccion', set_value('direccion'), $data_direccion); ?>
                                                        <label for="direccion"><?php echo trans_line('direccion'); ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                        <span class="help-block"><?php echo trans_line('direccion_ayuda'); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_pais_domicilio = [
                                                            'id' => 'cat_paises_id_domicilio',
                                                            'title' => trans_line('cat_paises_id_domicilio_placeholder'),
                                                            'class' => 'form-control bs-select',
                                                            'data-size' => '5',
                                                            'data-live-search' => 'true',
                                                            'data-live-search-normalize' => 'true',
                                                            'data-rule-required' => 'true',
                                                            'data-msg-required' => trans_line('required')
                                                        ]; ?>
                                                        <?php echo form_dropdown('', $paises, '', $data_pais_domicilio); ?>
                                                        <label for="cat_paises_id_domicilio"><?php echo trans_line('cat_paises_id_domicilio'); ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_estado_domicilio = [
                                                            'id' => 'cat_estados_id_domicilio',
                                                            'title' => trans_line('cat_estados_id_domicilio_placeholder'),
                                                            'class' => 'form-control bs-select',
                                                            'data-size' => '5',
                                                            'data-live-search' => 'true',
                                                            'data-live-search-normalize' => 'true',
                                                            'data-rule-required' => 'true',
                                                            'data-msg-required' => trans_line('required')
                                                        ]; ?>
                                                        <?php echo form_dropdown('', '', '', $data_estado_domicilio); ?>
                                                        <label for="cat_estados_id_domicilio"><?php echo trans_line('cat_estados_id_domicilio'); ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_municipio_domicilio = [
                                                            'id' => 'direccion_municipio_id',
                                                            'title' => trans_line('direccion_municipio_id_placeholder'),
                                                            'class' => 'form-control bs-select',
                                                            'data-size' => '5',
                                                            'data-live-search' => 'true',
                                                            'data-live-search-normalize' => 'true',
                                                            'data-rule-required' => 'true',
                                                            'data-msg-required' => trans_line('required')
                                                        ]; ?>
                                                        <?php echo form_dropdown('direccion_municipio_id', '', '', $data_municipio_domicilio); ?>
                                                        <label for="direccion_municipio_id"><?php echo trans_line('direccion_municipio_id'); ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="datos_seguridad_social">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_salario_diario_imss = [
                                                            'id' => 'salario_diario_imss',
                                                            'placeholder' => trans_line('salario_diario_imss_placeholder'),
                                                            'class' => 'form-control',
                                                            'data-rule-required' => 'true',
                                                            'data-msg-required' => trans_line('required'),
                                                            'data-rule-number' => 'true',
                                                            'data-msg-number' => trans_line('number')
                                                        ]; ?>
                                                        <?php echo form_input('salario_diario_imss', set_value('salario_diario_imss'), $data_salario_diario_imss); ?>
                                                        <label for="salario_diario_imss"><?php echo trans_line('salario_diario_imss'); ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                        <span class="help-block"><?php echo trans_line('salario_diario_imss_ayuda'); ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_salario_diario_real = [
                                                            'id' => 'salario_diario_real',
                                                            'placeholder' => trans_line('salario_diario_real_placeholder'),
                                                            'class' => 'form-control',
                                                            'data-rule-required' => 'true',
                                                            'data-msg-required' => trans_line('required'),
                                                            'data-rule-number' => 'true',
                                                            'data-msg-number' => trans_line('number')
                                                        ]; ?>
                                                        <?php echo form_input('salario_diario_real', set_value('salario_diario_real'), $data_salario_diario_real); ?>
                                                        <label for="salario_diario_real"><?php echo trans_line('salario_diario_real'); ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                        <span class="help-block"><?php echo trans_line('salario_diario_real_ayuda'); ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_no_imss = [
                                                            'id' => 'no_imss',
                                                            'placeholder' => trans_line('no_imss_placeholder'),
                                                            'class' => 'form-control',
                                                            'data-rule-digits' => 'true',
                                                            'data-msg-digits' => trans_line('digits')
                                                        ]; ?>
                                                        <?php echo form_input('no_imss', set_value('no_imss'), $data_no_imss); ?>
                                                        <label for="no_imss"><?php echo trans_line('no_imss'); ?>
                                                        </label>
                                                        <span class="help-block"><?php echo trans_line('no_imss_ayuda'); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_credito_infonavit = [
                                                            'id' => 'credito_infonavit',
                                                            'placeholder' => trans_line('credito_infonavit_placeholder'),
                                                            'class' => 'form-control'
                                                        ]; ?>
                                                        <?php echo form_input('credito_infonavit', set_value('credito_infonavit'), $data_credito_infonavit); ?>
                                                        <label for="credito_infonavit"><?php echo trans_line('credito_infonavit'); ?>
                                                        </label>
                                                        <span class="help-block"><?php echo trans_line('credito_infonavit_ayuda'); ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_credito_fonacot = [
                                                            'id' => 'credito_fonacot',
                                                            'placeholder' => trans_line('credito_fonacot_placeholder'),
                                                            'class' => 'form-control'
                                                        ]; ?>
                                                        <?php echo form_input('credito_fonacot', set_value('credito_fonacot'), $data_credito_fonacot); ?>
                                                        <label for="credito_fonacot"><?php echo trans_line('credito_fonacot'); ?>
                                                        </label>
                                                        <span class="help-block"><?php echo trans_line('credito_fonacot_ayuda'); ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_tipo_credito = [
                                                            'id' => 'tipo_credito',
                                                            'title' => trans_line('tipo_credito_placeholder'),
                                                            'class' => 'form-control bs-select',
                                                            'data-size' => '5',
                                                            'data-live-search' => 'true',
                                                            'data-live-search-normalize' => 'true'
                                                        ]; ?>
                                                        <?php echo form_dropdown('tipo_credito', $tipos_credito, set_value('tipo_credito'), $data_tipo_credito); ?>
                                                        <label for="tipo_credito"><?php echo trans_line('tipo_credito'); ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_porcentaje_numero= [
                                                            'id' => 'porcentaje_numero',
                                                            'placeholder' => trans_line('porcentaje_numero_placeholder'),
                                                            'class' => 'form-control',
                                                            'data-rule-digits' => 'true',
                                                            'data-msg-digits' => trans_line('digits')
                                                        ]; ?>
                                                        <?php echo form_input('porcentaje_numero', set_value('porcentaje_numero'), $data_porcentaje_numero); ?>
                                                        <label for="porcentaje_numero"><?php echo trans_line('porcentaje_numero'); ?>
                                                        </label>
                                                        <span class="help-block"><?php echo trans_line('porcentaje_numero_ayuda'); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="datos_pago">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_cat_bancos_id = [
                                                            'id' => 'cat_bancos_id',
                                                            'title' => trans_line('cat_bancos_id_placeholder'),
                                                            'class' => 'form-control bs-select',
                                                            'data-size' => '5',
                                                            'data-live-search' => 'true',
                                                            'data-live-search-normalize' => 'true'
                                                        ]; ?>
                                                        <?php echo form_dropdown('cat_bancos_id', $bancos, set_value('cat_bancos_id'), $data_cat_bancos_id); ?>
                                                        <label for="cat_bancos_id"><?php echo trans_line('cat_bancos_id'); ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_bancos_sucursal = [
                                                            'id' => 'bancos_sucursal',
                                                            'placeholder' => trans_line('bancos_sucursal_placeholder'),
                                                            'class' => 'form-control'
                                                        ]; ?>
                                                        <?php echo form_input('bancos_sucursal', set_value('bancos_sucursal'), $data_bancos_sucursal); ?>
                                                        <label for="bancos_sucursal"><?php echo trans_line('bancos_sucursal'); ?>
                                                        </label>
                                                        <span class="help-block"><?php echo trans_line('bancos_sucursal_ayuda'); ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_numero_cuenta = [
                                                            'id' => 'numero_cuenta',
                                                            'placeholder' => trans_line('numero_cuenta_placeholder'),
                                                            'class' => 'form-control',
                                                            'data-rule-digits' => 'true',
                                                            'data-msg-digits' => trans_line('digits')
                                                        ]; ?>
                                                        <?php echo form_input('numero_cuenta', set_value('numero_cuenta'), $data_numero_cuenta); ?>
                                                        <label for="numero_cuenta"><?php echo trans_line('numero_cuenta'); ?>
                                                        </label>
                                                        <span class="help-block"><?php echo trans_line('numero_cuenta_ayuda'); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_clabe= [
                                                            'id' => 'clabe',
                                                            'placeholder' => trans_line('clabe_placeholder'),
                                                            'class' => 'form-control',
                                                            'data-rule-digits' => 'true',
                                                            'data-msg-digits' => trans_line('digits')
                                                        ]; ?>
                                                        <?php echo form_input('clabe', set_value('clabe'), $data_clabe); ?>
                                                        <label for="clabe"><?php echo trans_line('clabe'); ?>
                                                        </label>
                                                        <span class="help-block"><?php echo trans_line('clabe_ayuda'); ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-line-input">
                                                        <?php $data_periodo_pago = [
                                                            'id' => 'periodo_de_pago_id',
                                                            'title' => trans_line('periodo_pago_placeholder'),
                                                            'class' => 'form-control bs-select',
                                                            'data-size' => '5',
                                                            'data-live-search' => 'true',
                                                            'data-live-search-normalize' => 'true',
                                                            'data-rule-required' => 'true',
                                                            'data-msg-required' => trans_line('required')
                                                        ]; ?>
                                                        <?php echo form_dropdown('periodo_de_pago_id', $periodos_pago, set_value('periodo_de_pago_id'), $data_periodo_pago); ?>
                                                        <label for="periodo_pago"><?php echo trans_line('periodo_pago'); ?>
                                                            <span class="required">*</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn green"
                                            id="btn_submit"><?php echo trans_line('btn_submit'); ?></button>
                                    <a class="btn default btn_loading_page"
                                       href="<?php echo base_url_lang() . 'activos' ?>"><?php echo trans_line('btn_cancel'); ?></a>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT INNER -->
        </div>
    </div>
    <!-- END PAGE CONTENT BODY -->
    <!-- END CONTENT BODY -->
</div>
<script type="application/javascript">
    function obtener_estados_por_pais  (cat_paises_id, elem_id) {
        $.get(
            "<?php echo base_url_lang() . 'personal/estados_por_pais/' ?>" + cat_paises_id,
            function (data, status, xhr) {
                genera_select_estados(data, elem_id);
            },
            "json"
        ).done(function () {
            //por si se ocupa
        }).fail(function () {
            alert("error");
        });
    }

    function genera_select_estados (estados, elem_id) {
        var $select = $('#' + elem_id);
        $select.empty();
        for (var idx in estados) {
            $select.append('<option value=' + estados[idx].cat_estados_id + '>' + estados[idx].nombre + '</option>');
        }
        $select.selectpicker('refresh');
    }

    function obtener_municipios_por_estado  (nacimiento_municipio_id, elem_id) {
        $.get(
            "<?php echo base_url_lang() . 'personal/municipios_por_estado/' ?>" + nacimiento_municipio_id,
            function (data, status, xhr) {
                genera_select_municipios(data, elem_id);
            },
            "json"
        ).done(function () {
            //por si se ocupa
        }).fail(function () {
            alert("error");
        });
    }

    function genera_select_municipios (municipios, elem_id) {
        var $select = $('#' + elem_id);
        $select.empty();
        for (var idx in municipios) {
            $select.append('<option value=' + municipios[idx].nacimiento_municipio_id + '>' + municipios[idx].nombre + '</option>');
        }
        $select.selectpicker('refresh');
    }

    function obtener_departamentos_por_empresa  (empresas_id) {
        $.get(
            "<?php echo base_url_lang() . 'personal/departamentos_por_empresa/' ?>" + empresas_id,
            function (data, status, xhr) {
                genera_select_departamentos(data);
            },
            "json"
        ).done(function () {
            //por si se ocupa
        }).fail(function () {
            alert("error");
        });
    }

    function genera_select_departamentos (departamentos) {
        var $select = $('#empresas_departamentos_id');
        $select.empty();
        for (var idx in departamentos) {
            $select.append('<option value=' + departamentos[idx].empresas_departamentos_id + '>' + departamentos[idx].nombre + '</option>');
        }
        $select.selectpicker('refresh');
    }

    function obtener_obras_por_empresa  (empresas_id) {
        $.get(
            "<?php echo base_url_lang() . 'personal/obras_por_empresa/' ?>" + empresas_id,
            function (data, status, xhr) {
                genera_select_obras(data);
            },
            "json"
        ).done(function () {
            //por si se ocupa
        }).fail(function () {
            alert("error");
        });
    }

    function genera_select_obras (obras) {
        var $select = $('#obras_id');
        $select.empty();
        for (var idx in obras) {
            $select.append('<option value=' + obras[idx].obras_id + '>' + obras[idx].nombre + '</option>');
        }
        $select.selectpicker('refresh');
    }

    function obtener_registros_patronales_por_empresa  (empresas_id) {
        $.get(
            "<?php echo base_url_lang() . 'personal/registros_patronales_por_empresa/' ?>" + empresas_id,
            function (data, status, xhr) {
                genera_select_registros_patronales(data);
            },
            "json"
        ).done(function () {
            //por si se ocupa
        }).fail(function () {
            alert("error registro patronal");
        });
    }

    function genera_select_registros_patronales (registros) {
        var $select = $('#registro_patronal_id');
        $select.empty();
        for (var idx in registros) {
            $select.append('<option value=' + registros[idx].registro_patronal_id + '>' + registros[idx].clave + ' - ' + registros[idx].estado + '</option>');
        }
        $select.selectpicker('refresh');
    }

    $(document).ready(function () {
        var provedor_html = $('#my_repeat');
        $('#spinner_gt').hide(600);

        $('.date-picker').datepicker({
            language: '<?php echo lang_segment(); ?>',
            orientation: "left",
            autoclose: true,
            format: 'yyyy-mm-dd'
        });

        $('.bs-select').selectpicker({
            iconBase: 'fa',
            tickIcon: 'fa-check'
        });

        $(".select2, .select2-multiple, .select2-allow-clear, .js-data-example-ajax").on("select2:open", function () {
            if ($(this).parents("[class*='has-']").length) {
                var classNames = $(this).parents("[class*='has-']")[0].className.split(/\s+/);

                for (var i = 0; i < classNames.length; ++i) {
                    if (classNames[i].match("has-")) {
                        $("body > .select2-container").addClass(classNames[i]);
                    }
                }
            }
        });

        // Nacimiento
        $('#cat_paises_id').on('changed.bs.select', function (e, clickedIndex, newValue, oldValue) {
            var cat_paises_id = $(e.currentTarget).val();
            obtener_estados_por_pais(cat_paises_id, 'cat_estados_id');
        });

        $('#cat_estados_id').on('changed.bs.select', function (e, clickedIndex, newValue, oldValue) {
            var cat_estados_id = $(e.currentTarget).val();
            obtener_municipios_por_estado(cat_estados_id, 'nacimiento_municipio_id');
        });
        // -- Nacimiento

        $('#empresas_id').on('changed.bs.select', function (e, clickedIndex, newValue, oldValue) {
            var empresas_id = $(e.currentTarget).val();
            obtener_departamentos_por_empresa(empresas_id);
            obtener_obras_por_empresa(empresas_id);
            obtener_registros_patronales_por_empresa(empresas_id);
        });

        // Domicilio
        $('#cat_paises_id_domicilio').on('changed.bs.select', function (e, clickedIndex, newValue, oldValue) {
            var cat_paises_id = $(e.currentTarget).val();
            obtener_estados_por_pais(cat_paises_id, 'cat_estados_id_domicilio');
        });

        $('#cat_estados_id_domicilio').on('changed.bs.select', function (e, clickedIndex, newValue, oldValue) {
            var cat_estados_id = $(e.currentTarget).val();
            obtener_municipios_por_estado(cat_estados_id, 'direccion_municipio_id');
        });
        // -- Domicilio

        var form1 = $('#current_form');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            messages: {

            },
            rules: {

            },

            invalidHandler: function (event, validator) { //display error alert on form submit
                success1.hide();
                error1.show();
                App.scrollTo(error1, -200);
            },

            errorPlacement: function (error, element) {
                if (element.is(':checkbox')) {
                    error.insertAfter(element.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline"));
                } else if (element.is(':radio')) {
                    error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));
                } else {
                    error.insertAfter(element); // for other inputs, just perform default behavior
                }
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            submitHandler: function (form) {
                $('#disablingPage').css("display", "block");
                $('#spinner_gt').show(300);
                $('#btn_submit').html("<?php echo trans_line('btn_submit_loading'); ?>");
                $('#btn_submit').prop('disabled', true);
                success1.show();
                error1.hide();
                form.submit();
            }
        });

    });// FIN DOCUMENT READY
</script>