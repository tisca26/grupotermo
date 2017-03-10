<link href="<?php echo base_url(); ?>assets/global/plugins/jquery-nestable/jquery.nestable.css" rel="stylesheet"
      type="text/css"/>
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
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-bubble font-yellow-gold"></i>
                                    <span class="caption-subject font-yellow-gold sbold uppercase">FASES AGREGADAS</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="scroller" style="height:250px" data-always-visible="1"
                                     data-rail-visible="0">
                                    <div class="dd" id="nestable_list_fases">
                                        <ol class="dd-list">
                                            <li class="dd-item" data-id="13">
                                                <div class="dd-handle"> item</div>
                                            </li>
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
                            </div>
                            <div class="portlet-body" class="display:none;">
                                <div class="scroller" style="height:250px" data-always-visible="1"
                                     data-rail-visible="0">
                                    <div class="dd" id="nestable_list_zonas">
                                        <ol class="dd-list">
                                            <li class="dd-item" data-id="13">
                                                <div class="dd-handle"> Item 13</div>
                                            </li>
                                            <li class="dd-item" data-id="14">
                                                <div class="dd-handle"> Item 14</div>
                                            </li>
                                            <li class="dd-item" data-id="15">
                                                <div class="dd-handle"> Item 15</div>
                                                <ol class="dd-list">
                                                    <li class="dd-item" data-id="16">
                                                        <div class="dd-handle"> Item 16</div>
                                                    </li>
                                                    <li class="dd-item" data-id="17">
                                                        <div class="dd-handle"> Item 17</div>
                                                    </li>
                                                    <li class="dd-item" data-id="18">
                                                        <div class="dd-handle"> Item 18</div>
                                                    </li>
                                                </ol>
                                            </li>
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
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-bubble font-blue-soft"></i>
                                    <span class="caption-subject font-blue-soft sbold uppercase">CONCEPTOS AGREGADOS</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="scroller" style="height:250px" data-always-visible="1"
                                     data-rail-visible="0">
                                    <div class="dd" id="nestable_list_conceptos">
                                        <ol class="dd-list">
                                            <li class="dd-item" data-id="13">
                                                <div class="dd-handle"> Item 13</div>
                                            </li>
                                            <li class="dd-item" data-id="14">
                                                <div class="dd-handle"> Item 14</div>
                                            </li>
                                            <li class="dd-item" data-id="15">
                                                <div class="dd-handle"> Item 15</div>
                                                <ol class="dd-list">
                                                    <li class="dd-item" data-id="16">
                                                        <div class="dd-handle"> Item 16</div>
                                                    </li>
                                                    <li class="dd-item" data-id="17">
                                                        <div class="dd-handle"> Item 17</div>
                                                    </li>
                                                    <li class="dd-item" data-id="18">
                                                        <div class="dd-handle"> Item 18</div>
                                                    </li>
                                                </ol>
                                            </li>
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
                    <div class="col-md-6">
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
                                        <li class="dd-item" data-tipo="etapa" data-id="1">
                                            <div class="dd-handle">
                                                <span class="bold">ETAPA: <?php echo $etapa->nombre; ?></span>
                                                <div class="text-right pull-right">
                                                    <p style="margin:0;"><?php echo $etapa->fecha_inicio . ' A ' . $etapa->fecha_fin; ?></p>
                                                    <div class="btn-group" style="position:absolute; top:0; right:0;">
                                                        <a href="javascript:;"
                                                           class="btn btn-icon-only green-turquoise btn-outline"><i
                                                                    class="fa fa-plus"></i></a>
                                                    </div>
                                                </div>
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
                    <div class="col-md-6">
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
                <?php echo form_open('conceptos/insertar_concepto_obra', array('id' => 'frm_nuevo_concepto')); ?>
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
                <button type="button" id="btn_guarda_nuevo_concepto"
                        class="btn blue"><?php echo trans_line('guardar_modal'); ?></button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal-dialog -->
</div>

<script type="application/javascript">
    $(document).ready(function () {
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

        /*
         FUNCIONES DEL MODAL FASE
         */
        $('#frm_nueva_fase').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
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

        $(document).on('click', '#guarda_nueva_fase_btn', function () {
            var btn_submit = $('#guarda_nueva_fase_btn');
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
                            //-- método que genera fase en la vista
                            alert('se genera la fase en vista');
                            //-- método que genera fase en la vista
                            toastr.success('<?php echo trans_line('guardar_modal_success'); ?>');
                        } else {
                            toastr.error('<?php echo trans_line('guardar_modal_error'); ?>' + '\n' + data.mensaje);
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
        /*
         FIN FUNCIONES DEL MODAL FASE
         */

        /*
         FUNCIONES DEL MODAL ZONA
         */
        $('#frm_nueva_zona').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
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
                label.siblings('.help-block help-block-error').addClass('ñaña');
            },
            submitHandler: function (form) {
                return false;
            }
        });

        $(document).on('click', '#guarda_nueva_zona_btn', function () {
            var btn_submit = $('#guarda_nueva_zona_btn');
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
                            //-- método que genera fase en la vista
                            alert('se genera la zona en vista');
                            //-- método que genera fase en la vista
                            toastr.success('<?php echo trans_line('guardar_modal_success'); ?>');
                        } else {
                            toastr.error('<?php echo trans_line('guardar_modal_error'); ?>' + '\n' + data.mensaje);
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
        /*
         FIN FUNCIONES DEL MODAL ZONA
         */

    });// FIN DOCUMENT READY
</script>


<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-nestable/jquery.nestable.js"
        type="text/javascript"></script>
<script>
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

    function insert_item(parent_id, item_id, item_type, item_text) {
        jh_parent = $("[data-id=" + parent_id + "]");
        jh_list = jh_parent.find("ol");
        jh_types = ['etapa', 'fase', 'zona', 'concepto'];
        jh_btn_menu = "<div class='btn-group' style='position:absolute; top:0; right:0;'>";
        jh_btn_menu += "<a href='javascript:;' class='btn btn-icon-only font-red'><i class='fa fa-times'></i></a>";
        jh_btn_menu += "<a href='javascript:;' class='btn btn-icon-only green-turquoise btn-outline'><i class='fa fa-plus'></i></a></div></li>";
        jh_append = "<li class='dd-item' data-id='" + item_id + "' data-type='" + jh_types[item_type] + "'><div class='dd-handle'>" + item_text + "</div>";
        jh_parent.parents("[data-type='fase']").fadeTo(500, .5);
        if (jh_types[item_type] == "concepto") {
            jh_append += "</li>";
        } else {
            jh_append += jh_btn_menu;
        }
        if (!jh_list.length) {
            jh_parent.prepend("<button data-action='collapse' type='button'>Collapse</button><button data-action='expand' type='button'>Expand</button>");
            jh_parent.find("[data-action='expand']").hide();
            jh_parent.append("<ol class='dd-list'>" + jh_append + "</ol>");
        } else {
            jh_list.eq(0).append(jh_append);
        }
        $("#nestable_list_1").trigger("change");
    }

    function delete_item(item_id) {
        jh_item = $("[data-id=" + item_id + "]");
        jh_parent_ol = jh_item.parent();
        jh_parent_li = jh_parent_ol.parent();

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

    function trigger_zonas(jh_state) {
        jh_zonas_btn = $('#agregar_nueva_zona_btn');
        jh_zonas_port = $('#portlet_zonas');
        if (jh_state) {
            jh_zonas_btn.prop("disabled", false);
            jh_zonas_port.fadeTo(500, 1);
        } else {
            jh_zonas_btn.prop("disabled", true);
            jh_zonas_port.fadeTo(500, .5);
        }
    }

    jQuery(document).ready(function () {
        UINestable.init();
        trigger_zonas();
        $("#check_zonas").on('init.bootstrapSwitch switchChange.bootstrapSwitch', function (event, state) {
            trigger_zonas(state);
        });
        insert_item(1, 2, 1, "Agregado 2");
        insert_item(2, 3, 2, "Agregado 2.1");
        insert_item(3, 4, 3, "Agregado 2.1.1");
        insert_item(2, 5, 2, "Agregado 2.2");
        insert_item(2, 6, 2, "Agregado 2.3");
        insert_item(2, 7, 2, "Agregado 2.4");
        insert_item(3, 8, 3, "Agregado 2.1.2");
        insert_item(3, 9, 3, "Agregado 2.1.3");
    });
</script>