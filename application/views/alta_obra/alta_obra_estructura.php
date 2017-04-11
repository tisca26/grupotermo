<link href="<?php echo base_url(); ?>assets/global/plugins/jquery-nestable/jquery.nestable.css" rel="stylesheet"
      type="text/css"/>
<style>
    #portlet_agregar .dd-item{
        cursor:pointer;
    }
    form{
        margin: 0;
    }
</style>
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
                    <span><?php echo trans_line('breadcrumb_pagina'); ?></span>
                </li>
            </ul>
            <!-- END PAGE BREADCRUMBS -->
            <!-- BEGIN PAGE CONTENT INNER -->
            <div class="page-content-inner">
                <?php echo get_bootstrap_alert(); ?>
                <div class="mt-element-step">
                    <div class="row step-line">
                        <div class="col-md-3 mt-step-col first done">
                            <div class="mt-step-number bg-white">1</div>
                            <div class="mt-step-title uppercase font-grey-cascade"><?php echo trans_line('steps_obra'); ?></div>
                            <div class="mt-step-content font-grey-cascade"><?php echo trans_line('steps_obra_desc'); ?></div>
                        </div>
                        <div class="col-md-3 mt-step-col done">
                            <div class="mt-step-number bg-white">2</div>
                            <div class="mt-step-title uppercase font-grey-cascade"><?php echo trans_line('steps_etapa'); ?></div>
                            <div class="mt-step-content font-grey-cascade"><?php echo trans_line('steps_etapa_desc'); ?></div>
                        </div>
                        <div class="col-md-3 mt-step-col active">
                            <div class="mt-step-number bg-white">3</div>
                            <div class="mt-step-title uppercase font-grey-cascade"><?php echo trans_line('steps_zona_concepto'); ?></div>
                            <div class="mt-step-content font-grey-cascade"><?php echo trans_line('steps_zona_concepto_desc'); ?></div>
                        </div>
                        <div class="col-md-3 mt-step-col last">
                            <div class="mt-step-number bg-white">4</div>
                            <div class="mt-step-title uppercase font-grey-cascade"><?php echo trans_line('steps_fin'); ?></div>
                            <div class="mt-step-content font-grey-cascade"><?php echo trans_line('steps_fin_desc'); ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="portlet light" id="portlet_fases">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-bubble font-yellow-gold"></i>
                                    <span class="caption-subject font-yellow-gold sbold uppercase">FASES AGREGADAS</span>
                                </div>
                                <div class="tools">
                                    <a href="#" class="reload"></a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="scroller" style="height:250px" data-always-visible="1"
                                     data-rail-visible="0">
                                    <div class="dd" id="nestable_list_fases">
                                        <ol class="dd-list">

                                        </ol>
                                    </div>
                                </div>
                                <br/>
                                <div class="portlet-footer text-right">
                                    <button type="button" class="btn yellow-gold" id="agregar_nueva_fase_btn"
                                            data-toggle="modal" href="#agregar_nueva_fase_modal">AGEGAR NUEVA FASE <i
                                                class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="portlet light" id="portlet_zonas">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-bubble font-yellow-crusta"></i>
                                    <span class="caption-subject font-yellow-crusta sbold uppercase">ZONAS AGREGADAS</span>
                                </div>
                                <div class="tools">
                                    <a href="#" class="reload"></a>
                                </div>
                            </div>
                            <div class="portlet-body" class="display:none;">
                                <div class="scroller" style="height:250px" data-always-visible="1"
                                     data-rail-visible="0">
                                    <div class="dd" id="nestable_list_zonas">
                                        <ol class="dd-list">

                                        </ol>
                                    </div>
                                </div>
                                <br/>
                                <div class="portlet-footer text-right">
                                    <button type="button" class="btn yellow-crusta" id="agregar_nueva_zona_btn"
                                            data-toggle="modal" href="#agregar_nueva_zona_modal">AGEGAR NUEVA ZONA <i
                                                class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="portlet light" id="portlet_conceptos">
                            <div class="portlet-title" style="margin:0;">
                                <div class="caption">
                                    <i class="icon-bubble font-blue-soft"></i>
                                    <span class="caption-subject font-blue-soft sbold uppercase">CONCEPTOS AGREGADOS</span>
                                </div>
                                <div class="tools">
                                    <a href="#" class="reload"></a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-xs-10" style="padding-right:3px;">
                                        <?php $nestable_categoria = [
                                            'id' => 'conceptos_categoria_nestable_id',
                                            'placeholder' => trans_line('categoria_nestable_placeholder'),
                                            'class' => 'form-control bs-select',
                                            'title' => trans_line('categoria_nestable_placeholder'),
                                            'data-live-search' => 'true',
                                            'data-size' => '5'
                                        ]; ?>
                                        <?php echo form_dropdown('conceptos_categoria_nestable_id', $categorias, '', $nestable_categoria); ?>
                                    </div>
                                    <div class="col-xs-1" style="padding:0;">
                                        <button type="button" class="btn btn-icon-only green"
                                                id="muestra_categoria_concepto_modal_btn" data-toggle="modal"
                                                href="#agregar_nuevo_catalogo_concepto_modal"><i
                                                    class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="scroller" style="height:221px" data-always-visible="1"
                                     data-rail-visible="0">
                                    <div class="dd" id="nestable_list_conceptos">
                                        <ol class="dd-list">

                                        </ol>
                                    </div>
                                </div>
                                <br/>
                                <div class="portlet-footer text-right">
                                    <button type="button" class="btn blue-soft" id="agregar_nuevo_concepto_btn"
                                            data-toggle="modal" href="#agregar_nuevo_concepto_modal">AGEGAR NUEVO
                                        CONCEPTO <i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-md-7">
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-bubble font-green"></i>
                                    <span class="caption-subject font-green sbold uppercase">ARBOL</span>
                                </div>
                                <div class="actions">
                                    <input id="check_zonas" type="checkbox" class="make-switch" data-on="success"
                                           data-label-text="Zonas" data-on-color="warning" data-off-color="default"
                                           data-on-text="Activo" data-off-text="Inactivo" data-size="small">
                                    <div class="btn-group btn-group-xs" id="nestable_list_menu">
                                        <button type="button" style="font-size:12px;"
                                                class="btn green btn-outline sbold" data-action="expand-all">EXPANDIR
                                        </button>
                                        <button type="button" style="font-size:12px;" class="btn red btn-outline sbold"
                                                data-action="collapse-all">COLAPSAR
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="dd" id="nestable_list_1">
                                    <ol class="dd-list">
                                        <li class="dd-item" data-tipo="etapa"
                                            abs-id="0"
                                            data-id="<?php echo $etapa->etapas_id; ?>">
                                            <div class="dd-handle">
                                                <span class="bold"
                                                      title="<?php echo $etapa->nombre; ?>"><?php echo $etapa->nombre; ?></span>
                                                <div class="text-right pull-right">
                                                    <p style="margin:0;"><?php echo $etapa->fecha_inicio . ' A ' . $etapa->fecha_fin; ?></p>
                                                </div>
                                            </div>
                                            <div class="btn-group">
                                                <a href="javascript:;" title="AGREGAR FASE"
                                                   class="btn btn-icon-only green-turquoise btn-outline btn_add"><i
                                                            class="fa fa-plus"></i></a>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                            <br/>
                            <div class="portlet-footer text-right">
                                <button type="submit" class="btn green"
                                        id="btn_submit"><?php echo trans_line('btn_submit'); ?> <i
                                            class="fa fa-forward"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="portlet light" id="portlet_agregar" style="display:none;">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-bubble font-green"></i>
                                    <span class="caption-subject font-green sbold uppercase">AGREGAR</span>
                                </div>
                                <div class="actions">
                                    <button id="btn_listo" type="button" style="font-size:12px;"
                                            class="btn green btn-outline sbold">
                                        LISTO
                                    </button>
                                </div>
                            </div>
                            <div class="portlet-body">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption">
                            <span>OUTPUT</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', '</div>'); ?>
                        <?php echo form_open('alta_obra/seleccionar_zona_concepto', array('id' => 'current_form')); ?>
                        <input type="hidden" name="etapas_id" value="<?php echo $etapa->etapas_id; ?>">
                        <input type="hidden" name="obras_id" value="<?php echo $etapa->obras_id; ?>">
                        <div class="form-body">
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                <?php echo trans_line('jquery_invalid'); ?>
                            </div>
                            <div class="alert alert-success display-hide">
                                <button class="close" data-close="alert"></button>
                                <?php echo trans_line('jquery_valid'); ?>
                            </div>
                        </div>
                        <textarea id="nestable_list_1_output" class="form-control margin-bottom-10"></textarea>
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
<!-- MODALS-->
<div class="modal fade" id="agregar_nueva_fase_modal" tabindex="-1" role="agregar_nueva_fase_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true"></button>
                <h4 class="modal-title"><?php echo trans_line('agregar_fase'); ?></h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('', array('id' => 'frm_nueva_fase')); ?>
                <input type="hidden" name="obras_id" value="<?php echo $etapa->obras_id; ?>">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <?php $data_fase_nombre = [
                                    'placeholder' => trans_line('fase_nombre_placeholder'),
                                    'class' => 'form-control',
                                    'data-rule-required' => 'true',
                                    'data-msg-required' => trans_line('required')
                                ]; ?>
                                <?php echo form_input('nombre', '', $data_fase_nombre); ?>
                                <label for=""><?php echo trans_line('fase_nombre'); ?>
                                    <span class="required">*</span>
                                </label>
                                <span class="help-block"><?php echo trans_line('fase_nombre_ayuda'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <label for=""><?php echo trans_line('periodo_fechas'); ?>
                                    <span class="required">*</span>
                                </label>
                                <div class="input-group date-picker input-daterange"
                                     data-date="<?php echo date('Y-m-d') ?>" data-date-format="yyyy-mm-dd">
                                    <?php $data_fase_fecha_inicio = [
                                        'placeholder' => trans_line('fecha_inicio_placeholder'),
                                        'class' => 'form-control',
                                        'data-rule-required' => 'true',
                                        'data-msg-required' => trans_line('required'),
                                        'data-rule-mexicanDate' => 'true',
                                        'data-msg-mexicanDate' => trans_line('required')
                                    ]; ?>
                                    <?php echo form_input('fecha_inicio', '', $data_fase_fecha_inicio); ?>
                                    <span class="input-group-addon"> <?php echo trans_line('fechas_a'); ?> </span>
                                    <?php $data_fase_fecha_fin = [
                                        'placeholder' => trans_line('fecha_fin_placeholder'),
                                        'class' => 'form-control',
                                        'data-rule-required' => 'true',
                                        'data-msg-required' => trans_line('required'),
                                        'data-rule-mexicanDate' => 'true',
                                        'data-msg-mexicanDate' => trans_line('required')
                                    ]; ?>
                                    <?php echo form_input('fecha_fin', '', $data_fase_fecha_fin); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline"
                        data-dismiss="modal"><?php echo trans_line('cerrar_modal'); ?>
                </button>
                <button type="button" id="guarda_nueva_fase_btn"
                        class="btn blue"><?php echo trans_line('guardar_modal'); ?></button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="agregar_nueva_zona_modal" tabindex="-1" role="agregar_nueva_zona_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true"></button>
                <h4 class="modal-title"><?php echo trans_line('agregar_zona'); ?></h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('', array('id' => 'frm_nueva_zona')); ?>
                <input type="hidden" name="obras_id" value="<?php echo $etapa->obras_id; ?>">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <?php $data_zona_nombre = [
                                    'placeholder' => trans_line('zona_nombre_placeholder'),
                                    'class' => 'form-control',
                                    'data-rule-required' => 'true',
                                    'data-msg-required' => trans_line('required')
                                ]; ?>
                                <?php echo form_input('nombre', '', $data_zona_nombre); ?>
                                <label for=""><?php echo trans_line('zona_nombre'); ?>
                                    <span class="required">*</span>
                                </label>
                                <span class="help-block"><?php echo trans_line('zona_nombre_ayuda'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <label for=""><?php echo trans_line('periodo_fechas'); ?>
                                    <span class="required">*</span>
                                </label>
                                <div class="input-group date-picker input-daterange"
                                     data-date="<?php echo date('Y-m-d') ?>" data-date-format="yyyy-mm-dd">
                                    <?php $data_zona_fecha_inicio = [
                                        'placeholder' => trans_line('fecha_inicio_placeholder'),
                                        'class' => 'form-control',
                                        'data-rule-required' => 'true',
                                        'data-msg-required' => trans_line('required'),
                                        'data-rule-mexicanDate' => 'true',
                                        'data-msg-mexicanDate' => trans_line('required')
                                    ]; ?>
                                    <?php echo form_input('fecha_inicio', '', $data_zona_fecha_inicio); ?>
                                    <span class="input-group-addon"> <?php echo trans_line('fechas_a'); ?> </span>
                                    <?php $data_zona_fecha_fin = [
                                        'placeholder' => trans_line('fecha_fin_placeholder'),
                                        'class' => 'form-control',
                                        'data-rule-required' => 'true',
                                        'data-msg-required' => trans_line('required'),
                                        'data-rule-mexicanDate' => 'true',
                                        'data-msg-mexicanDate' => trans_line('required')
                                    ]; ?>
                                    <?php echo form_input('fecha_fin', '', $data_zona_fecha_fin); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline"
                        data-dismiss="modal"><?php echo trans_line('cerrar_modal'); ?>
                </button>
                <button type="button" id="guarda_nueva_zona_btn"
                        class="btn blue"><?php echo trans_line('guardar_modal'); ?></button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="agregar_nuevo_catalogo_concepto_modal" tabindex="-1" role="agregar_nuevo_catalogo_concepto_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true"></button>
                <h4 class="modal-title"><?php echo trans_line('categoria_concepto_titulo'); ?></h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('', array('id' => 'frm_categoria_concepto')); ?>
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input" style="margin:0; ">
                                <?php $data_categoria_nombre = [
                                    'placeholder' => trans_line('categoria_nombre_placeholder'),
                                    'class' => 'form-control',
                                    'data-rule-required' => 'true',
                                    'data-msg-required' => trans_line('required')
                                ]; ?>
                                <?php echo form_input('nombre', '', $data_categoria_nombre); ?>
                                <label for=""><?php echo trans_line('categoria_nombre'); ?>
                                    <span class="required">*</span>
                                </label>
                                <span class="help-block"><?php echo trans_line('categoria_nombre_ayuda'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline"
                        data-dismiss="modal"><?php echo trans_line('cerrar_modal'); ?>
                </button>
                <button type="button" id="agregar_nueva_categoria_concepto_btn"
                        class="btn blue"><?php echo trans_line('guardar_modal'); ?></button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="agregar_nuevo_concepto_modal" tabindex="-1" role="agregar_nuevo_concepto_modal"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true"></button>
                <h4 class="modal-title"><?php echo trans_line('agregar_nuevo_concepto'); ?></h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('', array('id' => 'frm_nuevo_concepto')); ?>
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <?php $data_nombre = [
                                    'placeholder' => trans_line('nombre_nuevo_placeholder'),
                                    'class' => 'form-control',
                                    'data-rule-required' => 'true',
                                    'data-msg-required' => trans_line('required')
                                ]; ?>
                                <?php echo form_input('nombre', '', $data_nombre); ?>
                                <label for=""><?php echo trans_line('nombre_nuevo'); ?>
                                    <span class="required">*</span>
                                </label>
                                <span class="help-block"><?php echo trans_line('nombre_nuevo_ayuda'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <?php $data_desc_corta = [
                                    'placeholder' => trans_line('desc_nuevo_placeholder'),
                                    'class' => 'form-control',
                                    'data-rule-required' => 'true',
                                    'data-msg-required' => trans_line('required')
                                ]; ?>
                                <?php echo form_input('descripcion_corta', '', $data_desc_corta); ?>
                                <label for=""><?php echo trans_line('desc_nuevo'); ?>
                                    <span class="required">*</span>
                                </label>
                                <span class="help-block"><?php echo trans_line('desc_nuevo_ayuda'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group form-md-line-input">
                                <?php $data_clave = [
                                    'placeholder' => trans_line('clave_nuevo_placeholder'),
                                    'class' => 'form-control',
                                    'data-rule-required' => 'true',
                                    'data-msg-required' => trans_line('required')
                                ]; ?>
                                <?php echo form_input('clave', '', $data_clave); ?>
                                <label for=""><?php echo trans_line('clave_nuevo'); ?>
                                    <span class="required">*</span>
                                </label>
                                <span class="help-block"><?php echo trans_line('clave_nuevo_ayuda'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-md-line-input">
                                <?php $data_unidades = [
                                    'id' => 'unidades_id_concepto_modal',
                                    'placeholder' => trans_line('unidades_nuevo_placeholder'),
                                    'class' => 'form-control bs-select',
                                    'title' => trans_line('unidades_nuevo_placeholder'),
                                    'data-live-search' => 'true',
                                    'data-size' => '5',
                                    'data-rule-required' => 'true',
                                    'data-msg-required' => trans_line('required')
                                ]; ?>
                                <?php echo form_dropdown('unidades_id', $unidades, '', $data_unidades); ?>
                                <label for=""><?php echo trans_line('unidades_nuevo'); ?>
                                    <span class="required">*</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-md-line-input">
                                <?php $data_categoria = [
                                    'id' => 'conceptos_categoria_id',
                                    'multiple' => '',
                                    'placeholder' => trans_line('categoria_nuevo_placeholder'),
                                    'class' => 'form-control bs-select',
                                    'title' => trans_line('categoria_nuevo_placeholder'),
                                    'data-live-search' => 'true',
                                    'data-size' => '5',
                                    'data-rule-required' => 'true',
                                    'data-msg-required' => trans_line('required')
                                ]; ?>
                                <?php echo form_dropdown('conceptos_categoria_id[]', $categorias, '', $data_categoria); ?>
                                <label for=""><?php echo trans_line('categoria_nuevo'); ?>
                                    <span class="required">*</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline"
                        data-dismiss="modal"><?php echo trans_line('cerrar_modal'); ?>
                </button>
                <button type="button" id="guarda_nuevo_concepto_btn"
                        class="btn blue"><?php echo trans_line('guardar_modal'); ?></button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="fecha_inicio_fin_modal" tabindex="-1" role="fecha_inicio_fin_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true"></button>
                <h4 class="modal-title"><?php echo trans_line('datos_adicionales'); ?></h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('', array('id' => 'frm_fecha_inicio_fin')); ?>
                <input type="hidden" name="id_insert"/>
                <input type="hidden" name="id"/>
                <input type="hidden" name="tipo"/>
                <input type="hidden" name="text"/>
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <label for=""><?php echo trans_line('periodo_fechas'); ?>
                                    <span class="required">*</span>
                                </label>
                                <div class="input-group date-picker input-daterange"
                                     data-date="<?php echo date('Y-m-d') ?>" data-date-format="yyyy-mm-dd">
                                    <?php $data_fecha_inicio = [
                                        'placeholder' => trans_line('fecha_inicio_placeholder'),
                                        'class' => 'form-control',
                                        'data-rule-required' => 'true',
                                        'data-msg-required' => trans_line('required'),
                                        'data-rule-mexicanDate' => 'true',
                                        'data-msg-mexicanDate' => trans_line('required')
                                    ]; ?>
                                    <?php echo form_input('fecha_inicio', '', $data_fecha_inicio); ?>
                                    <span class="input-group-addon"> <?php echo trans_line('fechas_a'); ?> </span>
                                    <?php $data_fecha_fin = [
                                        'placeholder' => trans_line('fecha_fin_placeholder'),
                                        'class' => 'form-control',
                                        'data-rule-required' => 'true',
                                        'data-msg-required' => trans_line('required'),
                                        'data-rule-mexicanDate' => 'true',
                                        'data-msg-mexicanDate' => trans_line('required')
                                    ]; ?>
                                    <?php echo form_input('fecha_fin', '', $data_fecha_fin); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group form-md-line-input">
                                <?php $data_clave = [
                                    'placeholder' => 'CLAVE',
                                    'class' => 'form-control',
                                    'data-rule-required' => 'true',
                                    'data-msg-required' => trans_line('required')
                                ]; ?>
                                <?php echo form_input('clave', '', $data_clave); ?>
                                <label for=""><?php echo 'CLAVE'; ?>
                                    <span class="required">*</span>
                                </label>
                                <span class="help-block">CLAVE AYUDA</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-md-line-input">
                                <?php $data_cantidad = [
                                    'placeholder' => 'CANTIDAD',
                                    'class' => 'form-control',
                                    'data-rule-required' => 'true',
                                    'data-msg-required' => trans_line('required')
                                ]; ?>
                                <?php echo form_input('cantidad', '', $data_cantidad); ?>
                                <label for=""><?php echo 'CANTIDAD'; ?>
                                    <span class="required">*</span>
                                </label>
                                <span class="help-block">CANTIDAD AYUDA</span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline"
                        data-dismiss="modal"><?php echo trans_line('cerrar_modal'); ?>
                </button>
                <button type="button" id="guarda_fecha_inicio_fin_btn"
                        class="btn blue"><?php echo trans_line('guardar_modal'); ?></button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal-dialog -->
</div>

<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-nestable/jquery.nestable.js"
        type="text/javascript"></script>
<script>
    var absId = 0;
    var UINestable = function () {

        var updateOutput = function (e) {
            var list = e.length ? e : $(e.target),
                output = list.data('output');
            if (window.JSON) {
                output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
            } else {
                output.val('JSON browser support required for this demo.');
            }
        };


        return {
            //main function to initiate the module
            init: function () {

                // activate Nestable for list 1
                $('#nestable_list_1').nestable()
                    .on('change', updateOutput);
                $("#nestable_list_conceptos").nestable();

                // output initial serialised data
                updateOutput($('#nestable_list_1').data('output', $('#nestable_list_1_output')));

                $('#nestable_list_menu').on('click', function (e) {
                    var target = $(e.target),
                        action = target.data('action');
                    if (action === 'expand-all') {
                        $('#nestable_list_1').nestable('expandAll');
                    }
                    if (action === 'collapse-all') {
                        $('#nestable_list_1').nestable('collapseAll');
                    }
                });

            }

        };

    }();

    function insert_item(parent_absId, item_id, item_type, item_text, item_fecha_inicio="", item_fecha_fin="", item_clave="", item_cantidad="") {
        absId++;
        var item_concepto_extras = (item_clave!="")?"data-clave-en-obra='"+item_clave+"' data-cantidad='"+item_cantidad+"'":"";
        var jh_parent = $("[abs-id='" + parent_absId + "'");
        var jh_list = jh_parent.find("ol");
        var jh_btn_menu = "<div class='btn-group'>";
        jh_btn_menu += "<a class='btn btn-icon-only font-red delete_confirmation' data-toggle='confirmation' data-placement='top'"
            + "data-title='También eliminará los sub-elementos' data-container='body' data-singleton='true' data-popout='true'"
            + "data-btn-ok-label='Eliminar'"
            + "data-btn-ok-icon='icon-like' data-btn-ok-class='btn-success'"
            + "data-btn-cancel-label='Cancelar'"
            + "data-btn-cancel-icon='icon-close' data-btn-cancel-class='btn-danger'"
            + "data-id-confirm='" + absId + "'><i class='fa fa-times'></i></a>";
        var jh_btn_menu_add = "<a href='javascript:;' class='btn btn-icon-only green-turquoise btn-outline btn_add'><i class='fa fa-plus'></i></a></div></li>";
        var jh_append = "<li class='dd-item' abs-id='" + absId + "' data-id='" + item_id + "' data-tipo='" + item_type + "' data-fecha-inicio='" + item_fecha_inicio + "' data-fecha-fin='"+item_fecha_fin+"' "+item_concepto_extras+">";
        jh_append += "<div class='dd-handle'><span><div class='text-right pull-right'><p style='margin:0;'>"+item_fecha_inicio+" A "+item_fecha_fin+" </p></div>" + item_text + "</div>";
        if (item_type == "concepto") {
            jh_append += jh_btn_menu+"<div></li>";
        } else {
            jh_append += jh_btn_menu+jh_btn_menu_add;
        }
        if (!jh_list.length) {
            jh_parent.prepend("<button data-action='collapse' type='button'>Collapse</button><button data-action='expand' type='button'>Expand</button>");
            jh_parent.find("[data-action='expand']").hide();
            jh_parent.append("<ol class='dd-list'>" + jh_append + "</ol>");
        } else {
            jh_list.eq(0).append(jh_append);
        }
        $("#nestable_list_1").trigger("change");
        $('[data-id-confirm="' + absId + '"]').confirmation({
            rootSelector: '[data-id-confirm="' + absId + '"]'
        });
    }

    function delete_item(item_absId) {
        var jh_item = $('[abs-id="'+item_absId+'"');
        var jh_parent_ol = jh_item.parent();
        var jh_parent_li = jh_parent_ol.parent();

        if (jh_item.length) {
            jh_item.remove();
            if (!jh_parent_ol.find("li").length) {
                jh_parent_li.find("button").remove();
                jh_parent_ol.remove();
            } else {
                jh_parent_ol.show();
            }
        } else {
        }
        $("#nestable_list_1").trigger("change");
    }

    function delete_items(tipo){
        $('#nestable_list_1 [data-tipo="'+tipo+'"]').parent().parent().find("button").remove();
        $('#nestable_list_1 [data-tipo="'+tipo+'"]').parent().remove();
        $("#nestable_list_1").trigger("change");
    }

    function trigger_zonas(jh_state) {
        var jh_zonas_btn = $('#agregar_nueva_zona_btn');
        var jh_zonas_port = $('#portlet_zonas');
        if (jh_state) {
            if($('#nestable_list_1').find('[data-tipo="concepto"]').length){
                swal({
                        title: "ACTIVAR ZONAS?",
                        text: "SE ELIMINARAN LOS CONCEPTOS AGREGADOS",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "ACTIVAR ZONAS",
                        closeOnConfirm: true
                    },
                    function(isConfirm){
                        if(isConfirm) {
                            delete_items('concepto');
                            if($("#conceptos_categoria_nestable_id_agregar").length){
                                $("#btn_listo").click();
                            }
                            jh_zonas_btn.prop("disabled", false);
                            jh_zonas_port.find('.reload').show();
                            jh_zonas_port.fadeTo(500, 1);
                        } else{
                            $("#check_zonas").bootstrapSwitch('state',false,true);
                        }
                    });
            } else{
                if($("#conceptos_categoria_nestable_id_agregar").length){
                    $("#btn_listo").click();
                }
                jh_zonas_btn.prop("disabled", false);
                jh_zonas_port.find('.reload').show();
                jh_zonas_port.fadeTo(500, 1);
            }
        } else {
            if($('#nestable_list_1').find('[data-tipo="zona"]').length){
                swal({
                        title: "DESACTIVAR ZONAS?",
                        text: "SE ELIMINARAN LAS ZONAS AGREGADAS Y SUS SUB ELEMENTOS",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "DESACTIVAR ZONAS",
                        closeOnConfirm: true
                    },
                    function(isConfirm){
                        if(isConfirm) {
                            delete_items('zona');
                            if($("#portlet_agregar #nestable_list_zonas").length){
                                $("#btn_listo").click();
                            }
                            jh_zonas_port.fadeTo(500, .5);
                            jh_zonas_btn.prop("disabled", true);
                            jh_zonas_port.find('.reload').hide();
                        } else{
                            $("#check_zonas").bootstrapSwitch('state',true,true);
                        }
                    });
            }
            if($("#portlet_agregar #nestable_list_zonas").length){
                $("#btn_listo").click();
            }
            jh_zonas_port.fadeTo(500, .5);
            jh_zonas_btn.prop("disabled", true);
            jh_zonas_port.find('.reload').hide();
        }
    }

    function genera_fases_vista() {
        var fases_list = $('#nestable_list_fases');
        fases_list.append('<p class="text-center">Cargando...</p>');
        $.get(
            "<?php echo base_url_lang() . 'alta_obra/fases_por_obra_id_json/' . $etapa->obras_id ?>",
            "json"
        ).done(function (data) {
            fases_list.empty();
            fases_list.append('<ol class="dd-list"></ol>');
            for (var idx in data) {
                fases_list.children('ol.dd-list').append('<li class="dd-item" data-id="' + data[idx].fases_id + '" data-tipo="fase"><div class="dd-handle">' + data[idx].nombre + '</div></li>');
            }
            if (!fases_list.find('.dd-item').length) {
                fases_list.append('<p class="text-center">NO HAY DATOS PARA MOSTRAR</p>');
            }
            toastr.success("Fases actualizadas correctamente", "Actualizado", {"closeButton": true});
        }).fail(function () {
            toastr.error("Error al obtener las fases agregadas", "Error", {"closeButton": true});
        });
    }

    function genera_zonas_vista() {
        var zonas_list = $('#nestable_list_zonas');
        zonas_list.append('<p class="text-center">Cargando...</p>');
        $.get(
            "<?php echo base_url_lang() . 'alta_obra/zonas_por_obra_id_json/' . $etapa->obras_id ?>",
            "json"
        ).done(function (data) {
            var zonas_append = '';
            zonas_list.empty();
            zonas_list.append('<ol class="dd-list"></ol>');
            for (var idx in data) {
                zonas_list.children('ol.dd-list').append('<li class="dd-item" data-id="' + data[idx].zonas_id + '" data-tipo="zona"><div class="dd-handle">' + data[idx].nombre + '</div></li>');
            }
            if (!zonas_list.find('.dd-item').length) {
                zonas_list.append('<p class="text-center">NO HAY DATOS PARA MOSTRAR</p>');
            }
            toastr.success("Zonas actualizadas correctamente", "Actualizado", {"closeButton": true});
        }).fail(function () {
            toastr.error("Error al obtener las zonas agregadas", "Error", {"closeButton": true});
        });
    }

    function genera_conceptos_vista(concepto_categoria_id=0,type=1,id="") {
        var conceptos_list = (type==1)?$('#nestable_list_conceptos'):$('#nestable_list_conceptos_agregar');
        conceptos_list.empty();
        conceptos_list.append('<p class="text-center" style="padding-top:10px;">Cargando...</p>');
        $.get(
            "<?php echo base_url_lang() . 'alta_obra/conceptos_por_categoria_json/'?>" + concepto_categoria_id,
            "json"
        ).done(function (data) {
            conceptos_list.empty();
            conceptos_list.append('<ol class="dd-list"></ol>');
            if (concepto_categoria_id == 0) {
                conceptos_list.append('<p class="text-center" style="padding-top:10px;">SELECCIONE UNA CATEGORIA</p>');
            } else {
                for (var idx in data) {
                    conceptos_list.children('ol.dd-list').append('<li class="dd-item" data-id="' + data[idx].conceptos_catalogo_id + '" data-tipo="concepto" data-id-insert="'+id+'" ><div class="dd-handle">' + data[idx].nombre + '</div></li>');
                }
                if (!conceptos_list.find('.dd-item').length) {
                    conceptos_list.append('<p class="text-center" style="padding-top:10px;">NO HAY DATOS PARA MOSTRAR EN ESTA CATEGORIA</p>');
                }
            }
            toastr.success("Conceptos actualizados correctamente", "Actualizado", {"closeButton": true});
        }).fail(function () {
            toastr.error("Error al obtener los conceptos de la categoria seleccionada", "Error", {"closeButton": true});
        });
    }

    function genera_categorias_sel() {
        $.get(
            "<?php echo base_url_lang() . 'alta_obra/conceptos_categoria_todos_json' ?>",
            "json"
        ).done(function (data) {
            var $select = $('#conceptos_categoria_nestable_id');
            var $select2 = $('#conceptos_categoria_id');
            var $select_agregar = $('#conceptos_categoria_nestable_id_agregar');
            $select.empty();
            $select2.empty();
            $select_agregar.empty();
            for (var idx in data) {
                $select.append('<option value=' + data[idx].conceptos_categoria_id + '>' + data[idx].nombre + '</option>');
                $select2.append('<option value=' + data[idx].conceptos_categoria_id + '>' + data[idx].nombre + '</option>');
                $select_agregar.append('<option value=' + data[idx].conceptos_categoria_id + '>' + data[idx].nombre + '</option>');
            }
            $select.selectpicker('refresh');
            $select2.selectpicker('refresh');
            $select_agregar.selectpicker('refresh');
            toastr.success("Categorias actualizadas correctamente", "Actualizado", {"closeButton": true});
        }).fail(function () {
            toastr.error("Error al obtener el catalogo de conceptos", "Error", {"closeButton": true});
        });
    }

    function reset_bs(id_elem) {
        $("#" + id_elem).selectpicker("refresh");
    }

    jQuery(document).ready(function () {
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

        UINestable.init();

        genera_zonas_vista();
        genera_fases_vista();
        trigger_zonas(false);

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

        var form1 = $('#current_form');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            messages: {
                nombre: {
                    required: "<?php echo trans_line('required'); ?>",
                    minlength: jQuery.validator.format("<?php echo trans_line('minlength'); ?>")
                },
                fecha_inicio: {
                    minlength: jQuery.validator.format("<?php echo trans_line('minlength'); ?>"),
                    maxlength: jQuery.validator.format("<?php echo trans_line('maxlength'); ?>"),
                    required: "<?php echo trans_line('required'); ?>",
                    mexicanDate: "<?php echo trans_line('mexicanDate'); ?>"
                },
                fecha_fin: {
                    minlength: jQuery.validator.format("<?php echo trans_line('minlength'); ?>"),
                    maxlength: jQuery.validator.format("<?php echo trans_line('maxlength'); ?>"),
                    required: "<?php echo trans_line('required'); ?>",
                    mexicanDate: "<?php echo trans_line('mexicanDate'); ?>"
                },
                total_autorizado: {
                    number: "<?php echo trans_line('number'); ?>"
                }
            },
            rules: {
                nombre: {
                    minlength: 3,
                    required: true
                },
                fecha_inicio: {
                    minlength: 10,
                    maxlength: 10,
                    required: true,
                    mexicanDate: true
                },
                fecha_fin: {
                    minlength: 10,
                    maxlength: 10,
                    required: true,
                    mexicanDate: true
                },
                total_autorizado: {
                    number: true
                }
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


        $('#frm_nueva_fase').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            messages: {
                nombre: {
                    required: "<?php echo trans_line('required'); ?>",
                    minlength: jQuery.validator.format("<?php echo trans_line('minlength'); ?>")
                },
                fecha_inicio: {
                    minlength: jQuery.validator.format("<?php echo trans_line('minlength'); ?>"),
                    maxlength: jQuery.validator.format("<?php echo trans_line('maxlength'); ?>"),
                    required: "<?php echo trans_line('required'); ?>",
                    mexicanDate: "<?php echo trans_line('mexicanDate'); ?>"
                },
                fecha_fin: {
                    minlength: jQuery.validator.format("<?php echo trans_line('minlength'); ?>"),
                    maxlength: jQuery.validator.format("<?php echo trans_line('maxlength'); ?>"),
                    required: "<?php echo trans_line('required'); ?>",
                    mexicanDate: "<?php echo trans_line('mexicanDate'); ?>"
                }
            },
            rules: {
                nombre: {
                    minlength: 3,
                    required: true
                },
                fecha_inicio: {
                    minlength: 10,
                    maxlength: 10,
                    required: true,
                    mexicanDate: true
                },
                fecha_fin: {
                    minlength: 10,
                    maxlength: 10,
                    required: true,
                    mexicanDate: true
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit
                //App.scrollTo(error1, -50);
            },
            errorPlacement: function (error, element) {
                if (element.is(':checkbox')) {
                    error.insertAfter(element.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline"));
                } else if (element.is(':radio')) {
                    error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));
                } else {
                    //error.insertAfter(element); // for other inputs, just perform default behavior
                }
            },
            highlight: function (element) { // hightlight error inputs
                $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error'); // set error class to the control group
            },
            success: function (label) {
                label.closest('.form-group').removeClass('has-error'); // set success class to the control group
            },
            submitHandler: function (form) {
                return false;
            }
        });

        $(document).on('click', '#guarda_nueva_fase_btn', function () {
            var btn_submit = $(this);
            var form = $('#frm_nueva_fase');
            if (form.valid()) {
                btn_submit.html('<?php echo trans_line('btn_submit_loading'); ?>');
                btn_submit.prop("disabled", true);
                var $form_srlze = form.serialize();
                //alert($form_srlze);
                $.ajax({
                    url: "<?php echo base_url_lang(); ?>alta_obra/insertar_fase_ajax",
                    type: 'POST',
                    dataType: 'json',
                    data: $form_srlze,
                    success: function (data) {
                        if (data.estatus == 'OK') {
                            btn_submit.html('<?php echo trans_line('guardar_modal'); ?>');
                            btn_submit.prop("disabled", false);
                            form.trigger("reset");
                            $('#agregar_nueva_fase_modal').modal('toggle');
                            genera_fases_vista();
                            toastr.success('<?php echo trans_line('guardar_modal_success'); ?>');
                        } else {
                            toastr.error('<?php echo trans_line('guardar_modal_error'); ?>' + '\n' + data.mensaje);
                            btn_submit.html('<?php echo trans_line('guardar_modal'); ?>');
                            btn_submit.prop("disabled", false);
                        }
                    },
                    error: function (data) {
                        btn_submit.html('<?php echo trans_line('guardar_modal'); ?>');
                        btn_submit.prop("disabled", false);
                        toastr.error('<?php echo trans_line('guardar_modal_error'); ?>');
                    }

                });
            }
        });


        $('#frm_nueva_zona').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            messages: {
                nombre: {
                    required: "<?php echo trans_line('required'); ?>",
                    minlength: jQuery.validator.format("<?php echo trans_line('minlength'); ?>")
                },
                fecha_inicio: {
                    minlength: jQuery.validator.format("<?php echo trans_line('minlength'); ?>"),
                    maxlength: jQuery.validator.format("<?php echo trans_line('maxlength'); ?>"),
                    required: "<?php echo trans_line('required'); ?>",
                    mexicanDate: "<?php echo trans_line('mexicanDate'); ?>"
                },
                fecha_fin: {
                    minlength: jQuery.validator.format("<?php echo trans_line('minlength'); ?>"),
                    maxlength: jQuery.validator.format("<?php echo trans_line('maxlength'); ?>"),
                    required: "<?php echo trans_line('required'); ?>",
                    mexicanDate: "<?php echo trans_line('mexicanDate'); ?>"
                }
            },
            rules: {
                nombre: {
                    minlength: 3,
                    required: true
                },
                fecha_inicio: {
                    minlength: 10,
                    maxlength: 10,
                    required: true,
                    mexicanDate: true
                },
                fecha_fin: {
                    minlength: 10,
                    maxlength: 10,
                    required: true,
                    mexicanDate: true
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit
                //App.scrollTo(error1, -50);
            },
            errorPlacement: function (error, element) {
                if (element.is(':checkbox')) {
                    error.insertAfter(element.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline"));
                } else if (element.is(':radio')) {
                    error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));
                } else {
                    //error.insertAfter(element); // for other inputs, just perform default behavior
                }
            },
            highlight: function (element) { // hightlight error inputs
                $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error'); // set error class to the control group
            },
            success: function (label) {
                label.closest('.form-group').removeClass('has-error'); // set success class to the control group
            },
            submitHandler: function (form) {
                return false;
            }
        });

        $(document).on('click', '#guarda_nueva_zona_btn', function () {
            var btn_submit = $(this);
            var form = $('#frm_nueva_zona');
            if (form.valid()) {
                btn_submit.html('<?php echo trans_line('btn_submit_loading'); ?>');
                btn_submit.prop("disabled", true);
                var $form_srlze = form.serialize();
                //alert($form_srlze);
                $.ajax({
                    url: "<?php echo base_url_lang(); ?>alta_obra/insertar_zona_ajax",
                    type: 'POST',
                    dataType: 'json',
                    data: $form_srlze,
                    success: function (data) {
                        if (data.estatus == 'OK') {
                            btn_submit.html('<?php echo trans_line('guardar_modal'); ?>');
                            btn_submit.prop("disabled", false);
                            form.trigger("reset");
                            $('#agregar_nueva_zona_modal').modal('toggle');
                            genera_zonas_vista();
                            toastr.success('<?php echo trans_line('guardar_modal_success'); ?>');
                        } else {
                            toastr.error('<?php echo trans_line('guardar_modal_error'); ?>' + '\n' + data.mensaje);
                            btn_submit.html('<?php echo trans_line('guardar_modal'); ?>');
                            btn_submit.prop("disabled", false);
                        }
                    },
                    error: function (data) {
                        btn_submit.html('<?php echo trans_line('guardar_modal'); ?>');
                        btn_submit.prop("disabled", false);
                        toastr.error('<?php echo trans_line('guardar_modal_error'); ?>');
                    }

                });
            }
        });


        $('#frm_nuevo_concepto').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            messages: {},
            rules: {},
            invalidHandler: function (event, validator) { //display error alert on form submit
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
                return false;
            }
        });

        $(document).on('click', '#guarda_nuevo_concepto_btn', function () {
            var btn_submit = $(this);
            var form = $('#frm_nuevo_concepto');
            if (form.valid()) {
                btn_submit.html('<?php echo trans_line('btn_submit_loading'); ?>');
                btn_submit.prop("disabled", true);
                var $form_srlze = form.serialize();
                //alert($form_srlze);
                $.ajax({
                    url: "<?php echo base_url_lang(); ?>alta_obra/insertar_concepto_catalogo_ajax",
                    type: 'POST',
                    dataType: 'json',
                    data: $form_srlze,
                    success: function (data) {
                        if (data.estatus == 'OK') {
                            btn_submit.html('<?php echo trans_line('guardar_modal'); ?>');
                            btn_submit.prop("disabled", false);
                            form.trigger("reset");
                            reset_bs('unidades_id_concepto_modal');
                            reset_bs('conceptos_categoria_id');
                            genera_conceptos_vista($('#conceptos_categoria_nestable_id').val());
                            $('#agregar_nuevo_concepto_modal').modal('toggle');
                            toastr.success('<?php echo trans_line('guardar_modal_success'); ?>');
                        } else {
                            toastr.error('<?php echo trans_line('guardar_modal_error'); ?>');
                        }
                    },
                    error: function (data) {
                        btn_submit.html('<?php echo trans_line('guardar_modal'); ?>');
                        btn_submit.prop("disabled", false);
                        toastr.error('<?php echo trans_line('guardar_modal_error'); ?>');
                    }

                });
            }
        });


        $('#frm_categoria_concepto').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            //ignore: "", // validate all fields including form hidden input
            invalidHandler: function (event, validator) { //display error alert on form submit
                //App.scrollTo(error1, -50);
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
                $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error'); // set error class to the control group
            },
            success: function (label) {
                label.closest('.form-group').removeClass('has-error'); // set success class to the control group
            },
            submitHandler: function (form) {
                return false;
            }
        });

        $(document).on('click', '#agregar_nueva_categoria_concepto_btn', function () {
            var btn_submit = $(this);
            var form = $('#frm_categoria_concepto');
            if (form.valid()) {
                btn_submit.html('<?php echo trans_line('btn_submit_loading'); ?>');
                btn_submit.prop("disabled", true);
                var $form_srlze = form.serialize();
                //alert($form_srlze);
                $.ajax({
                    url: "<?php echo base_url_lang(); ?>alta_obra/insertar_concepto_categoria_ajax",
                    type: 'POST',
                    dataType: 'json',
                    data: $form_srlze,
                    success: function (data) {
                        if (data.estatus == 'OK') {
                            btn_submit.html('<?php echo trans_line('guardar_modal'); ?>');
                            btn_submit.prop("disabled", false);
                            form.trigger("reset");
                            $('#agregar_nuevo_catalogo_concepto_modal').modal('toggle');
                            genera_categorias_sel();
                            toastr.success('<?php echo trans_line('guardar_modal_success'); ?>');
                        } else {
                            toastr.error('<?php echo trans_line('guardar_modal_error'); ?>' + '\n' + data.mensaje);
                            btn_submit.html('<?php echo trans_line('guardar_modal'); ?>');
                            btn_submit.prop("disabled", false);
                        }
                    },
                    error: function (data) {
                        btn_submit.html('<?php echo trans_line('guardar_modal'); ?>');
                        btn_submit.prop("disabled", false);
                        toastr.error('<?php echo trans_line('guardar_modal_error'); ?>');
                    }

                });
            }
        });


        $('#frm_fecha_inicio_fin').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            messages: {
                fecha_inicio: {
                    minlength: jQuery.validator.format("<?php echo trans_line('minlength'); ?>"),
                    maxlength: jQuery.validator.format("<?php echo trans_line('maxlength'); ?>"),
                    required: "<?php echo trans_line('required'); ?>",
                    mexicanDate: "<?php echo trans_line('mexicanDate'); ?>"
                },
                fecha_fin: {
                    minlength: jQuery.validator.format("<?php echo trans_line('minlength'); ?>"),
                    maxlength: jQuery.validator.format("<?php echo trans_line('maxlength'); ?>"),
                    required: "<?php echo trans_line('required'); ?>",
                    mexicanDate: "<?php echo trans_line('mexicanDate'); ?>"
                },
                clave: {
                    required: "<?php echo trans_line('required'); ?>"
                },
                cantidad: {
                    required: "<?php echo trans_line('required'); ?>"
                }
            },
            rules: {
                fecha_inicio: {
                    minlength: 10,
                    maxlength: 10,
                    required: true,
                    mexicanDate: true
                },
                fecha_fin: {
                    minlength: 10,
                    maxlength: 10,
                    required: true,
                    mexicanDate: true
                },
                clave: {
                    required: true
                },
                cantidad: {
                    required: true
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit
                //App.scrollTo(error1, -50);
            },
            errorPlacement: function (error, element) {
                if (element.is(':checkbox')) {
                    error.insertAfter(element.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline"));
                } else if (element.is(':radio')) {
                    error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));
                } else {
                    //error.insertAfter(element); // for other inputs, just perform default behavior
                }
            },
            highlight: function (element) { // hightlight error inputs
                $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error'); // set error class to the control group
            },
            success: function (label) {
                label.closest('.form-group').removeClass('has-error'); // set success class to the control group
            },
            submitHandler: function (form) {
                return false;
            }
        });

        $(document).on('click', '#guarda_fecha_inicio_fin_btn', function () {
            var btn_submit = $(this);
            var form = $('#frm_fecha_inicio_fin');
            if (form.valid()) {
                var clon = $('[abs-id="alpha"]').clone();
                delete_item("alpha");
                insert_item(form.find('[name="id_insert"]').val(), form.find('[name="id"]').val(), form.find('[name="tipo"]').val(), form.find('[name="text"]').val(),form.find('[name="fecha_inicio"]').val(),form.find('[name="fecha_fin"]').val(),form.find('[name="clave"]').val(),form.find('[name="cantidad"]').val());
                $('[abs-id="' + form.find('[name="id_insert"]').val() + '"] .dd-list').first().append(clon);
                $('#fecha_inicio_fin_modal').modal('hide');
                $('.input-daterange input').each(function() {
                    $(this).datepicker("clearDates");
                });
                form.trigger("reset");
            }
        });

        $(document).on('click', '[data-dismiss="modal"]', function () {
            var form = $('#frm_fecha_inicio_fin');
            $('.input-daterange input').each(function() {
                $(this).datepicker("clearDates");
            });
            form.trigger("reset");
        });


        $("#portlet_fases").find(".reload").click(function () {
            genera_fases_vista();
        });
        $("#portlet_zonas").find(".reload").click(function () {
            genera_zonas_vista();
        });
        $("#portlet_conceptos").find(".reload").click(function () {
            genera_conceptos_vista($('#conceptos_categoria_nestable_id').val());
        });
        $('#conceptos_categoria_nestable_id').on('change', function () {
            genera_conceptos_vista($(this).val());
        });
        $('#portlet_agregar').on('change','#conceptos_categoria_nestable_id_agregar', function () {
            genera_conceptos_vista($(this).val(),0,$(this).attr('data-id-insert'));
        });

        $("#check_zonas").on('init.bootstrapSwitch switchChange.bootstrapSwitch', function (event, state) {
            trigger_zonas(state);
        });

        $('#nestable_list_1').on('confirmed.bs.confirmation', '.delete_confirmation', function () {
            var id = $(this).attr('data-id-confirm');
            $(this).confirmation('destroy');
            delete_item(id);
        });

        $('#nestable_list_1').on('click', '.btn_add', function () {
            delete_item("alpha");
            var parent_item = $(this).parent().parent();
            var id_insert = parent_item.attr('abs-id');
            var type_insert = parent_item.attr('data-tipo');
            var portlet_target = $('#portlet_fases');
            var portlet_agregar = $('#portlet_agregar');
            var parent_list = parent_item.find('ol');

            if (parent_item.is($("[data-tipo='etapa']"))) {
                portlet_target = $('#portlet_fases');
            } else if(parent_item.is($("[data-tipo='fase']"))){
                if($("#check_zonas").bootstrapSwitch("state")){
                    portlet_target = $('#portlet_zonas');
                } else{
                    portlet_target = $('#portlet_conceptos');
                }
            } else if(parent_item.is($("[data-tipo='zona']"))) {
                portlet_target = $('#portlet_conceptos');
            }

            if(portlet_target.find('p').length){
                swal("Espere a que los elementos estén cargados","","warning");
            } else {
                var parent_append = "<li class='dd-item' id='dd-insertar' abs-id='alpha'><div class='dd-handle dd-placeholder'>Click a un elemento para agregarlo</div></li>";

                if (!parent_list.length) {
                    parent_item.prepend("<button data-action='collapse' type='button'>Collapse</button><button data-action='expand' type='button'>Expand</button>");
                    parent_item.find("[data-action='expand']").hide();
                    parent_item.append("<ol class='dd-list'>" + parent_append + "</ol>");
                } else {
                    parent_list.eq(0).append(parent_append);
                }

                if (!portlet_target.is($("#portlet_conceptos"))) {
                    portlet_agregar.find('.portlet-body').html(portlet_target.find('.portlet-body').html()).find('.portlet-footer').remove();
                } else {
                    portlet_agregar.find('.portlet-body').html("" +
                        "<select name='conceptos_categoria_nestable_id_agregar' id='conceptos_categoria_nestable_id_agregar' " +
                        "placeholder='SELECCIONE UNA CATEGORIA' class='form-control bs-select' title='Seleccione una categoria' " +
                        "data-live-search='true' data-size='5' data-id-insert='" + id_insert + "' >" +
                        $("#conceptos_categoria_nestable_id").html()+"</select>" +
                        "<div class='scroller' style='height:221px' data-always-visible='1' data-rail-visible='0'>" +
                        "<div class='dd' id='nestable_list_conceptos_agregar'>" +
                        "<ol class='dd-list'></ol></div></div>");
                    $("#conceptos_categoria_nestable_id_agregar").selectpicker('refresh');
                }
                portlet_agregar.find('.dd-item').attr('data-id-insert', id_insert);
                portlet_agregar.show();
            }
        });

        $('#portlet_agregar').on('click', '.dd-item', function () {
            if ($('#nestable_list_1').find('[data-id=' + $(this).attr('data-id') + '][data-tipo="fase"]').length&&$(this).attr('data-tipo')=="fase") {
                swal("YA EXISTE ESTA FASE","","warning");
            } else {
                var frm = $('#frm_fecha_inicio_fin');
                frm.find('[name="id_insert"]').val($(this).attr('data-id-insert'));
                frm.find('[name="id"]').val($(this).attr('data-id'));
                frm.find('[name="tipo"]').val($(this).attr('data-tipo'));
                frm.find('[name="text"]').val($(this).find('.dd-handle').text());
                if($(this).attr('data-tipo')=="concepto"){
                    frm.find('[name="clave"]').prop('disabled',false).parent().show();
                    frm.find('[name="cantidad"]').prop('disabled',false).parent().show();
                }else{
                    frm.find('[name="clave"]').prop('disabled',true).parent().hide();
                    frm.find('[name="cantidad"]').prop('disabled',true).parent().hide();
                }
                $('#fecha_inicio_fin_modal').modal('show');
            }
        });

        $('#btn_listo').click(function () {
            $('#portlet_agregar').find(".portlet-body").empty().parent().hide();
            delete_item("alpha");
            $("#nestable_list_1").trigger("change");
        });
    });
</script>