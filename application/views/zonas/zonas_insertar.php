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
                    <a href="<?php echo base_url_lang() . 'zonas'; ?>"><?php echo trans_line('breadcrumb_pagina'); ?></a>
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
                        <?php echo form_open('zonas/insertar_zona', array('id' => 'current_form')); ?>
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
                                <div class="form-group">
                                    <label class="control-label col-md-2">
                                        <?php echo trans_line('periodo_fechas'); ?>
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-10">
                                        <div class="input-group date-picker input-daterange" data-date="<?php echo date('Y-m-d') ?>" data-date-format="yyyy-mm-dd">
                                            <?php echo form_input('fecha_inicio', set_value('fecha_inicio'), 'id="fecha_inicio" placeholder="' . trans_line('fecha_inicio_placeholder') . '" class="form-control"'); ?>
                                            <span class="input-group-addon"> <?php echo trans_line('fechas_a'); ?> </span>
                                            <?php echo form_input('fecha_fin', set_value('fecha_fin'), 'id="fecha_fin" placeholder="' . trans_line('fecha_fin_placeholder') . '" class="form-control"'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input">
                                        <?php echo form_dropdown('obras_id', $obras, '', 'id="obras_id" class="form-control bs-select" data-live-search="true" data-live-search-normalize="true" title="' . trans_line('obra_placeholder') . '"'); ?>
                                        <label for="obras_id"><?php echo trans_line('obra'); ?>
                                            <span class="required">*</span>
                                        </label>
                                        <span class="help-block"><?php echo trans_line('obra_ayuda'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input" id="div_etapas_select">
                                        <?php echo form_dropdown('etapas_id', '', '', 'id="etapas_id" class="form-control bs-select" data-live-search="true" data-live-search-normalize="true" title="' . trans_line('etapa_placeholder') . '" multiple'); ?>
                                        <label for="etapas_id"><?php echo trans_line('etapa'); ?>
                                            <span class="required">*</span>
                                        </label>
                                        <span class="help-block"><?php echo trans_line('etapa_ayuda'); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn green"
                                            id="btn_submit"><?php echo trans_line('btn_submit'); ?></button>
                                    <a class="btn default"
                                       href="<?php echo base_url_lang() . 'zonas' ?>"><?php echo trans_line('btn_cancel'); ?></a>
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
    var genera_fechas = function () {
        $('.date-picker').datepicker({
            language: '<?php echo lang_segment(); ?>',
            orientation: "left",
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
    };
    var genera_select_etapas = function (etapas) {
        var $select = $('#etapas_id');
        $select.empty();
        for (var idx in etapas) {
            $select.append('<option value=' + etapas[idx].etapas_id + '>' + etapas[idx].nombre + '</option>');
        }
        $select.selectpicker('refresh');
    };

    var obtener_etapas_por_id = function (obras_id) {
        $.get(
            "<?php echo base_url_lang() . 'zonas/etapas_por_obra/' ?>" + obras_id,
            function (data, status, xhr) {
                genera_select_etapas(data);
            },
            "json"
        ).done(function () {
            //por si se ocupa
        }).fail(function () {
            alert("error");
        });
    };
    $(document).ready(function () {
        $('#spinner_gt').hide(600);
        genera_fechas();
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

        $('#obras_id').on('changed.bs.select', function (e, clickedIndex, newValue, oldValue) {
            var obras_id = $(e.currentTarget).val();
            obtener_etapas_por_id(obras_id);
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
                obras_id: {
                    required: "<?php echo trans_line('required'); ?>"
                },
                etapas_id:{
                    required: "<?php echo trans_line('required'); ?>"
                }
            },
            rules: {
                nombre: {
                    minlength: 3,
                    required: true
                },
                obras_id: {
                    required: true
                },
                etapas_id:{
                    required: true
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
                $('#disablingPage').css("display", "block")
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