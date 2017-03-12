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
                        <div class="col-md-3 mt-step-col first active">
                            <div class="mt-step-number bg-white">1</div>
                            <div class="mt-step-title uppercase font-grey-cascade"><?php echo trans_line('steps_obra'); ?></div>
                            <div class="mt-step-content font-grey-cascade"><?php echo trans_line('steps_obra_desc'); ?></div>
                        </div>
                        <div class="col-md-3 mt-step-col">
                            <div class="mt-step-number bg-white">2</div>
                            <div class="mt-step-title uppercase font-grey-cascade"><?php echo trans_line('steps_etapa'); ?></div>
                            <div class="mt-step-content font-grey-cascade"><?php echo trans_line('steps_etapa_desc'); ?></div>
                        </div>
                        <div class="col-md-3 mt-step-col">
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
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption">
                            <span><?php echo trans_line('titulo_forma'); ?></span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', '</div>'); ?>
                        <?php echo form_open('alta_obra/insertar_obra', array('id' => 'current_form')); ?>
                        <input type="hidden" name="obras_id" value="<?php echo $obras_id; ?>">
                        <div class="form-body">
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                <?php echo trans_line('jquery_invalid'); ?>
                            </div>
                            <div class="alert alert-success display-hide">
                                <button class="close" data-close="alert"></button>
                                <?php echo trans_line('jquery_valid'); ?>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-md-line-input">
                                        <?php echo form_input('nombre', set_value('nombre'), 'id="nombre" placeholder="' . trans_line('nombre_placeholder') . '" class="form-control"'); ?>
                                        <label for="nombre"><?php echo trans_line('nombre'); ?>
                                            <span class="required">*</span>
                                        </label>
                                        <span class="help-block"><?php echo trans_line('nombre_ayuda'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5 col-xs-10">
                                    <div class="form-group form-md-line-input div_b_select">
                                        <?php echo form_dropdown('empresas_id', $empresas, '', 'id="empresas_id" title="' . trans_line('empresas_id_placeholder') . '" class="form-control bs-select"  data-live-search="true" data-size="5" data-live-search-normalize="true" data-rule-required="true" data-msg-required="'. trans_line('required') . '"'); ?>
                                        <label for="empresas_id"><?php echo trans_line('empresas_id'); ?>
                                            <span class="required">*</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-1">
                                    <div class="form-group form-md-line-input div_b_select">
                                        <button type="button" class="btn btn-icon-only green" id="agregar_nueva_empresa_btn" data-toggle="modal" href="#agregar_nueva_empresa_modal"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="col-sm-5 col-xs-10">
                                    <div class="form-group form-md-line-input div_b_select">
                                        <?php echo form_dropdown('clientes_id', $clientes, '', 'id="clientes_id" title="' . trans_line('clientes_id_placeholder') . '" class="form-control bs-select"  data-live-search="true" data-size="5" data-live-search-normalize="true" data-rule-required="true" data-msg-required="'. trans_line('required') . '"'); ?>
                                        <label for="clientes_id"><?php echo trans_line('clientes_id'); ?>
                                            <span class="required">*</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-1">
                                    <div class="form-group form-md-line-input div_b_select">
                                        <button type="button" class="btn btn-icon-only green" id="agregar_nuevo_cliente_btn" data-toggle="modal" href="#agregar_nuevo_cliente_modal"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input">
                                        <?php echo form_input('fecha_inicio', set_value('fecha_inicio'), 'id="fecha_inicio" placeholder="' . trans_line('fecha_inicio_placeholder') . '" class="form-control date-picker"'); ?>
                                        <label for="fecha_inicio"><?php echo trans_line('fecha_inicio'); ?>
                                            <span class="required">*</span>
                                        </label>
                                        <span class="help-block"><?php echo trans_line('fecha_inicio_ayuda'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input">
                                        <?php echo form_input('fecha_fin', set_value('fecha_fin'), 'id="fecha_fin" placeholder="' . trans_line('fecha_fin_placeholder') . '" class="form-control date-picker"'); ?>
                                        <label for="fecha_fin"><?php echo trans_line('fecha_fin'); ?>
                                            <span class="required">*</span>
                                        </label>
                                        <span class="help-block"><?php echo trans_line('fecha_fin_ayuda'); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn green" id="btn_submit"><?php echo trans_line('btn_submit'); ?> <i class="fa fa-forward"></i></button>
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
<!-- MODALS -->
    <!-- Empresa -->
<div class="modal fade" id="agregar_nueva_empresa_modal" tabindex="-1" role="agregar_nueva_empresa_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true"></button>
                <h4 class="modal-title"><?php echo trans_line('agregar_empresa'); ?></h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('', array('id' => 'frm_nueva_empresa')); ?>
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <?php $data_razon_social = [
                                    'placeholder' => trans_line('razon_social_placeholder'),
                                    'class' => 'form-control',
                                    'data-rule-required' => 'true',
                                    'data-msg-required' => trans_line('required')
                                ]; ?>
                                <?php echo form_input('razon_social', '', $data_razon_social); ?>
                                <label for=""><?php echo trans_line('razon_social'); ?>
                                    <span class="required">*</span>
                                </label>
                                <span class="help-block"><?php echo trans_line('razon_social_ayuda'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-md-line-input">
                                <?php $data_rfc = [
                                    'placeholder' => trans_line('rfc_placeholder'),
                                    'class' => 'form-control',
                                    'data-rule-required' => 'true',
                                    'data-msg-required' => trans_line('required')
                                ]; ?>
                                <?php echo form_input('rfc', '', $data_rfc); ?>
                                <label for=""><?php echo trans_line('rfc'); ?>
                                    <span class="required">*</span>
                                </label>
                                <span class="help-block"><?php echo trans_line('rfc_ayuda'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-md-line-input">
                                <?php $data_tel_fijo = [
                                    'placeholder' => trans_line('tel_fijo_placeholder'),
                                    'class' => 'form-control',
                                    'data-rule-required' => 'true',
                                    'data-msg-required' => trans_line('required')
                                ]; ?>
                                <?php echo form_input('tel_fijo', '', $data_tel_fijo); ?>
                                <label for=""><?php echo trans_line('tel_fijo'); ?>
                                    <span class="required">*</span>
                                </label>
                                <span class="help-block"><?php echo trans_line('tel_fijo_ayuda'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <?php $data_email = [
                                    'placeholder' => trans_line('email_placeholder'),
                                    'class' => 'form-control',
                                    'data-rule-required' => 'true',
                                    'data-msg-required' => trans_line('required'),
                                    'data-rule-email' => 'true',
                                    'data-msg-email' => trans_line('correo')
                                ]; ?>
                                <?php echo form_input('email', '', $data_email); ?>
                                <label for=""><?php echo trans_line('email'); ?>
                                    <span class="required">*</span>
                                </label>
                                <span class="help-block"><?php echo trans_line('email_ayuda'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <?php $data_direccion = [
                                    'placeholder' => trans_line('direccion_placeholder'),
                                    'class' => 'form-control',
                                    'data-rule-required' => 'true',
                                    'data-msg-required' => trans_line('required')
                                ]; ?>
                                <?php echo form_input('direccion', '', $data_direccion); ?>
                                <label for=""><?php echo trans_line('direccion'); ?>
                                    <span class="required">*</span>
                                </label>
                                <span class="help-block"><?php echo trans_line('direccion_ayuda'); ?></span>
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
                <button type="button" id="guarda_nueva_empresa_btn"
                        class="btn blue"><?php echo trans_line('guardar_modal'); ?></button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

    <!-- Cliente -->
<div class="modal fade" id="agregar_nuevo_cliente_modal" tabindex="-1" role="agregar_nuevo_cliente_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true"></button>
                <h4 class="modal-title"><?php echo trans_line('agregar_cliente'); ?></h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('', array('id' => 'frm_nuevo_cliente')); ?>
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <?php $data_razon_social = [
                                    'placeholder' => trans_line('razon_social_cliente_placeholder'),
                                    'class' => 'form-control',
                                    'data-rule-required' => 'true',
                                    'data-msg-required' => trans_line('required')
                                ]; ?>
                                <?php echo form_input('razon_social', '', $data_razon_social); ?>
                                <label for=""><?php echo trans_line('razon_social_cliente'); ?>
                                    <span class="required">*</span>
                                </label>
                                <span class="help-block"><?php echo trans_line('razon_social_cliente_ayuda'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-md-line-input">
                                <?php $data_rfc = [
                                    'placeholder' => trans_line('rfc_cliente_placeholder'),
                                    'class' => 'form-control',
                                    'data-rule-required' => 'true',
                                    'data-msg-required' => trans_line('required')
                                ]; ?>
                                <?php echo form_input('rfc', '', $data_rfc); ?>
                                <label for=""><?php echo trans_line('rfc_cliente'); ?>
                                    <span class="required">*</span>
                                </label>
                                <span class="help-block"><?php echo trans_line('rfc_cliente_ayuda'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-md-line-input">
                                <?php $data_tel_fijo = [
                                    'placeholder' => trans_line('tel_fijo_cliente_placeholder'),
                                    'class' => 'form-control',
                                    'data-rule-required' => 'true',
                                    'data-msg-required' => trans_line('required')
                                ]; ?>
                                <?php echo form_input('tel_fijo', '', $data_tel_fijo); ?>
                                <label for=""><?php echo trans_line('tel_fijo_cliente'); ?>
                                    <span class="required">*</span>
                                </label>
                                <span class="help-block"><?php echo trans_line('tel_fijo_cliente_ayuda'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <?php $data_email = [
                                    'placeholder' => trans_line('email_cliente_placeholder'),
                                    'class' => 'form-control',
                                    'data-rule-required' => 'true',
                                    'data-msg-required' => trans_line('required'),
                                    'data-rule-email' => 'true',
                                    'data-msg-email' => trans_line('correo')
                                ]; ?>
                                <?php echo form_input('email', '', $data_email); ?>
                                <label for=""><?php echo trans_line('email_cliente'); ?>
                                    <span class="required">*</span>
                                </label>
                                <span class="help-block"><?php echo trans_line('email_cliente_ayuda'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <?php $data_direccion = [
                                    'placeholder' => trans_line('direccion_cliente_placeholder'),
                                    'class' => 'form-control',
                                    'data-rule-required' => 'true',
                                    'data-msg-required' => trans_line('required')
                                ]; ?>
                                <?php echo form_input('direccion', '', $data_direccion); ?>
                                <label for=""><?php echo trans_line('direccion_cliente'); ?>
                                    <span class="required">*</span>
                                </label>
                                <span class="help-block"><?php echo trans_line('direccion_cliente_ayuda'); ?></span>
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
                <button type="button" id="guarda_nuevo_cliente_btn"
                        class="btn blue"><?php echo trans_line('guardar_modal'); ?></button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- MODALS FIN-->
<script type="application/javascript">

    function reset_bs() {
        $('.bs-select').selectpicker('deselectAll');
        $('.bs-select').selectpicker('refresh');
        $("#conceptos_categoria_id").val('').selectpicker('refresh');
        console.log('reset bs');
    }

    function reset_bs_id(id) {
        $('#' + id).selectpicker('deselectAll');
        $('#' + id).selectpicker('refresh');
        $('#' + id).val('').selectpicker('refresh');
    }


    function genera_empresas_sel() {
        $.get(
            "<?php echo base_url_lang() . 'alta_obra/empresas_json' ?>",
            "json"
        ).done(function (data) {
            var $select = $('#empresas_id');
            $select.empty();
            for (var idx in data) {
                $select.append('<option value=' + data[idx].empresas_id + '>' + data[idx].razon_social + '</option>');
            }
            $select.selectpicker('refresh');
        }).fail(function () {
            alert("<?php echo trans_line('error_generar_empresas_sel'); ?>");
        });
    }
    function genera_clientes_sel() {
        $.get(
            "<?php echo base_url_lang() . 'alta_obra/clientes_json' ?>",
            "json"
        ).done(function (data) {
            var $select = $('#clientes_id');
            $select.empty();
            for (var idx in data) {
                $select.append('<option value=' + data[idx].clientes_id + '>' + data[idx].razon_social + '</option>');
            }
            $select.selectpicker('refresh');
        }).fail(function () {
            alert("<?php echo trans_line('error_generar_clientes_sel'); ?>");
        });
    }

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

        $(".select2, .select2-multiple, .select2-allow-clear, .js-data-example-ajax").on("select2:open", function() {
            if ($(this).parents("[class*='has-']").length) {
                var classNames = $(this).parents("[class*='has-']")[0].className.split(/\s+/);

                for (var i = 0; i < classNames.length; ++i) {
                    if (classNames[i].match("has-")) {
                        $("body > .select2-container").addClass(classNames[i]);
                    }
                }
            }
        });

        // VALIDACIONES DE FORMAS
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

        $('#frm_nueva_empresa').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            messages: {
                razon_social: {
                    required: "<?php echo trans_line('required'); ?>",
                    minlength: jQuery.validator.format("<?php echo trans_line('minlength'); ?>")
                },
                rfc: {
                    minlength: jQuery.validator.format("<?php echo trans_line('minlength'); ?>"),
                    required: "<?php echo trans_line('required'); ?>",
                    maxlength: jQuery.validator.format("<?php echo trans_line('maxlength'); ?>")
                },
                tel_fijo: {
                    minlength: jQuery.validator.format("<?php echo trans_line('minlength'); ?>"),
                    required: "<?php echo trans_line('required'); ?>",
                    maxlength: jQuery.validator.format("<?php echo trans_line('maxlength'); ?>"),
                    digits: "<?php echo trans_line('digits'); ?>"
                },
                email: {
                    minlength: jQuery.validator.format("<?php echo trans_line('minlength'); ?>"),
                    required: "<?php echo trans_line('required'); ?>",
                    email: "<?php echo trans_line('correo'); ?>"
                },
                direccion: {
                    minlength: jQuery.validator.format("<?php echo trans_line('minlength'); ?>"),
                    required: "<?php echo trans_line('required'); ?>",
                    maxlength: jQuery.validator.format("<?php echo trans_line('maxlength'); ?>")
                }
            },
            rules: {
                razon_social: {
                    minlength: 3,
                    required: true
                },
                rfc: {
                    minlength: 12,
                    required: true,
                    maxlength: 14
                },
                tel_fijo: {
                    minlength: 10,
                    required: true,
                    maxlength: 14,
                    digits: true
                },
                email: {
                    minlength: 4,
                    required: true,
                    email: true
                },
                direccion: {
                    minlength: 3,
                    required: true,
                    maxlength: 490
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit
                App.scrollTo(error1, -50);
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
        $('#frm_nuevo_cliente').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            messages: {
                razon_social: {
                    required: "<?php echo trans_line('required'); ?>",
                    minlength: jQuery.validator.format("<?php echo trans_line('minlength'); ?>")
                },
                rfc: {
                    minlength: jQuery.validator.format("<?php echo trans_line('minlength'); ?>"),
                    required: "<?php echo trans_line('required'); ?>",
                    maxlength: jQuery.validator.format("<?php echo trans_line('maxlength'); ?>")
                },
                tel_fijo: {
                    minlength: jQuery.validator.format("<?php echo trans_line('minlength'); ?>"),
                    required: "<?php echo trans_line('required'); ?>",
                    maxlength: jQuery.validator.format("<?php echo trans_line('maxlength'); ?>"),
                    digits: "<?php echo trans_line('digits'); ?>"
                },
                email: {
                    minlength: jQuery.validator.format("<?php echo trans_line('minlength'); ?>"),
                    required: "<?php echo trans_line('required'); ?>",
                    email: "<?php echo trans_line('correo'); ?>"
                },
                direccion: {
                    minlength: jQuery.validator.format("<?php echo trans_line('minlength'); ?>"),
                    required: "<?php echo trans_line('required'); ?>",
                    maxlength: jQuery.validator.format("<?php echo trans_line('maxlength'); ?>")
                }
            },
            rules: {
                razon_social: {
                    minlength: 3,
                    required: true
                },
                rfc: {
                    minlength: 12,
                    required: true,
                    maxlength: 14
                },
                tel_fijo: {
                    minlength: 10,
                    required: true,
                    maxlength: 14,
                    digits: true
                },
                email: {
                    minlength: 4,
                    required: true,
                    email: true
                },
                direccion: {
                    minlength: 3,
                    required: true,
                    maxlength: 490
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit
                App.scrollTo(error1, -50);
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

        $(document).on('click', '#guarda_nueva_empresa_btn', function () {
            var btn_submit = $('#guarda_nueva_empresa_btn');
            var form = $('#frm_nueva_empresa');
            if (form.valid()) {
                btn_submit.html('<?php echo trans_line('btn_submit_loading'); ?>');
                btn_submit.prop("disabled", true);
                var $form_srlze = form.serialize();
                //alert($form_srlze);
                $.ajax({
                    url: "<?php echo base_url_lang(); ?>alta_obra/insertar_empresa_ajax",
                    type: 'POST',
                    dataType: 'json',
                    data: $form_srlze,
                    success: function (data) {
                        if (data.estatus == 'OK') {
                            btn_submit.html('<?php echo trans_line('guardar_modal'); ?>');
                            btn_submit.prop("disabled", false);
                            form.trigger("reset");
                            genera_empresas_sel();
                            $('#agregar_nueva_empresa_modal').modal('toggle');
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
        })
        $(document).on('click', '#guarda_nuevo_cliente_btn', function () {
            var btn_submit_cliente = $('#guarda_nuevo_cliente_btn');
            var form = $('#frm_nuevo_cliente');
            if (form.valid()) {
                btn_submit_cliente.html('<?php echo trans_line('btn_submit_loading'); ?>');
                btn_submit_cliente.prop("disabled", true);
                var $form_srlze_cliente = form.serialize();
                $.ajax({
                    url: "<?php echo base_url_lang(); ?>alta_obra/insertar_cliente_ajax",
                    type: 'POST',
                    dataType: 'json',
                    data: $form_srlze_cliente,
                    success: function (data) {
                        btn_submit_cliente.html('<?php echo trans_line('guardar_modal'); ?>');
                        btn_submit_cliente.prop("disabled", false);
                        if (data.estatus == 'OK') {
                            form.trigger("reset");
                            genera_clientes_sel();
                            $('#agregar_nuevo_cliente_modal').modal('toggle');
                            toastr.success('<?php echo trans_line('guardar_modal_success'); ?>');
                        } else {
                            toastr.error('<?php echo trans_line('guardar_modal_error'); ?>' + '\n' + data.mensaje);
                        }
                    },
                    error: function (data) {
                        btn_submit_cliente.html('<?php echo trans_line('guardar_modal'); ?>');
                        btn_submit_cliente.prop("disabled", false);
                        toastr.error('<?php echo trans_line('guardar_modal_error'); ?>');
                    }

                });
            }
        })

    });// FIN DOCUMENT READY
</script>