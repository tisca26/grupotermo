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
                    <a href="<?php echo base_url_lang() . 'obras'; ?>"><?php echo trans_line('breadcrumb_pagina'); ?></a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span><?php echo trans_line('breadcrumb_editar_pagina'); ?></span>
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
                        <?php echo form_open('obras/editar_obra', array('id' => 'current_form')); ?>
                        <input type="hidden" name="obras_id" value="<?php echo $obra->obras_id ?>">
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
                                        <?php echo form_input('nombre', set_value('nombre', $obra->nombre), 'id="nombre" placeholder="' . trans_line('nombre_placeholder') . '" class="form-control"'); ?>
                                        <label for="nombre"><?php echo trans_line('nombre'); ?>
                                            <span class="required">*</span>
                                        </label>
                                        <span
                                                class="help-block"><?php echo trans_line('nombre_ayuda'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input">
                                        <?php echo form_input('fecha_inicio', set_value('fecha_inicio', $obra->fecha_inicio), 'id="fecha_inicio" placeholder="' . trans_line('fecha_inicio_placeholder') . '" class="form-control date-picker"'); ?>
                                        <label for="fecha_inicio"><?php echo trans_line('fecha_inicio'); ?>
                                            <span class="required">*</span>
                                        </label>
                                        <span
                                                class="help-block"><?php echo trans_line('fecha_inicio_ayuda'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input">
                                        <?php echo form_input('fecha_fin', set_value('fecha_fin', $obra->fecha_fin), 'id="fecha_fin" placeholder="' . trans_line('fecha_fin_placeholder') . '" class="form-control date-picker"'); ?>
                                        <label for="fecha_fin"><?php echo trans_line('fecha_fin'); ?>
                                            <span class="required">*</span>
                                        </label>
                                        <span
                                                class="help-block"><?php echo trans_line('fecha_fin_ayuda'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input">
                                        <div class="form-control form-control-static">
                                            $<?php echo number_format($obra->total_real, 2); ?></div>
                                        <label for="total_real"><?php echo trans_line('total_real'); ?></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-dollar"></i>
                                            </span>
                                            <?php echo form_input('total_autorizado', set_value('total_autorizado', $obra->total_autorizado), 'id="total_autorizado" placeholder="' . trans_line('total_autorizado_placeholder') . '" class="form-control"'); ?>
                                            <label for="total_autorizado"><?php echo trans_line('total_autorizado'); ?></label>
                                            <span class="help-block"><?php echo trans_line('total_autorizado_ayuda'); ?></span>
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
                                    <a class="btn default"
                                       href="<?php echo base_url_lang() . 'obras' ?>"><?php echo trans_line('btn_cancel'); ?></a>
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
    $(document).ready(function () {
        $('#spinner_gt').hide(600);

        $('.date-picker').datepicker({
            language: '<?php echo lang_segment(); ?>',
            orientation: "left",
            autoclose: true,
            format: 'yyyy-mm-dd'
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
                $('#disablingPage').css( "display", "block");
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