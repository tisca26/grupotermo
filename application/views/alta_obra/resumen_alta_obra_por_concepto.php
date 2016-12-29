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
                        <div class="col-md-3 mt-step-col done">
                            <div class="mt-step-number bg-white">3</div>
                            <div class="mt-step-title uppercase font-grey-cascade"><?php echo trans_line('steps_zona_concepto'); ?></div>
                            <div class="mt-step-content font-grey-cascade"><?php echo trans_line('steps_zona_concepto_desc'); ?></div>
                        </div>
                        <div class="col-md-3 mt-step-col active">
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
                        <?php echo form_open('alta_obra/seleccionar_zona_concepto', array('id' => 'current_form', 'class' => 'form-horizontal')); ?>
                        <div class="form-body">
                            <h2 class="margin-bottom-20"><?php echo $obra->nombre; ?></h2>
                            <h3 class="form-section"><?php echo trans_line('obra_datos'); ?></h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">
                                            <strong><?php echo trans_line('obra_nombre'); ?>:</strong>
                                        </label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> <?php echo $obra->nombre; ?> </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">
                                            <strong><?php echo trans_line('obra_fecha_inicio'); ?>:</strong>
                                        </label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> <?php echo $obra->fecha_inicio; ?> </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">
                                            <strong><?php echo trans_line('obra_fecha_fin'); ?>:</strong>
                                        </label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> <?php echo $obra->fecha_fin; ?> </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">
                                            <strong><?php echo trans_line('obra_total_real'); ?>:</strong>
                                        </label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> $<?php echo $obra->total_real; ?> </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">
                                            <strong><?php echo trans_line('obra_total_autorizado'); ?>:</strong>
                                        </label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> $<?php echo $obra->total_autorizado; ?> </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">

                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <h3 class="form-section"><?php echo trans_line('etapas'); ?></h3>
                            <?php foreach ($etapas as $etapa): ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">
                                                <strong><?php echo trans_line('etapa_nombre'); ?>:</strong>
                                            </label>
                                            <div class="col-md-9">
                                                <p class="form-control-static"> <?php echo $etapa->nombre; ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="form-section"><?php echo trans_line('conceptos'); ?></h4>
                                <?php foreach ($etapa->conceptos as $concepto): ?>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label><?php echo trans_line('concepto_nombre'); ?></label><br />
                                                    <p class="form-control-static"> <?php echo $concepto->concepto_nombre; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label><?php echo trans_line('concepto_unidad'); ?></label><br />
                                                    <p class="form-control-static"> <?php echo $concepto->unidad; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label><?php echo trans_line('concepto_cantidad'); ?></label><br />
                                                    <p class="form-control-static"> <?php echo $concepto->cantidad; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label><?php echo trans_line('concepto_precio_unitario'); ?></label><br />
                                                    <p class="form-control-static"> $<?php echo $concepto->precio_unitario; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <a class="btn btn-primary" href="<?php echo base_url_lang(); ?>">
                                        <?php echo trans_line('btn_finalizar'); ?>
                                    </a>
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

    });// FIN DOCUMENT READY
</script>