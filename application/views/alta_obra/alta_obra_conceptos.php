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
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption">
                            <span><?php echo trans_line('titulo_forma'); ?></span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', '</div>'); ?>
                        <?php echo form_open('alta_obra/insertar_conceptos', array('id' => 'current_form', 'class' => 'mt-repeater form-horizontal')); ?>
                        <input type="hidden" name="etapas_id" value="<?php echo $etapas_id; ?>">
                        <input type="hidden" name="obras_id" value="<?php echo $obras_id; ?>">
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button>
                            <?php echo trans_line('jquery_invalid'); ?><span id="errores"></span>
                        </div>
                        <div data-repeater-list="group-a">
                            <div data-repeater-item class="mt-repeater-item">
                                <!-- jQuery Repeater Container -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mt-repeater-input form-group">
                                            <label class="control-label"><?php echo trans_line('nombre'); ?></label>
                                            <br/>
                                            <input type="text" name="nombre" class="form-control th_element"
                                                   placeholder="<?php echo trans_line('nombre_placeholder'); ?>"
                                                   required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mt-repeater-input form-group">
                                            <label class="control-label"><?php echo trans_line('descripcion_corta'); ?></label>
                                            <br/>
                                            <input type="text" name="descripcion_corta" class="form-control"
                                                   placeholder="<?php echo trans_line('descripcion_corta_placeholder'); ?>"
                                                   required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mt-repeater-input form-group">
                                            <label class="control-label"><?php echo trans_line('clave'); ?></label>
                                            <br/>
                                            <input type="text" name="clave" class="form-control"
                                                   placeholder="<?php echo trans_line('clave_placeholder'); ?>"
                                                   required/>
                                        </div>
                                        <div class="mt-repeater-input form-group">
                                            <label class="control-label"><?php echo trans_line('unidad'); ?></label>
                                            <br/>
                                            <?php echo form_dropdown('unidades_id', $unidades, '', 'class="form-control unidades" placeholder="' . trans_line('unidad_placeholder') . '"'); ?>
                                        </div>
                                        <div class="mt-repeater-input form-group">
                                            <label class="control-label"><?php echo trans_line('cantidad'); ?></label>
                                            <br/>
                                            <input type="text" name="cantidad" class="form-control cantidades" value=""
                                                   placeholder="<?php echo trans_line('cantidad_placeholder'); ?>"/>
                                        </div>
                                        <div class="mt-repeater-input form-group">
                                            <label class="control-label"><?php echo trans_line('precio_unitario'); ?></label>
                                            <br/>
                                            <input type="text" name="precio_unitario" class="form-control precios"
                                                   value=""
                                                   placeholder="<?php echo trans_line('precio_unitario_placeholder'); ?>"/>
                                        </div>
                                        <div class="mt-repeater-input">
                                            <a href="javascript:;" data-repeater-delete
                                               class="btn btn-danger mt-repeater-delete">
                                                <i class="fa fa-close"></i> <?php echo trans_line('borrar_fila'); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:;" data-repeater-create class="btn btn-success mt-repeater-add">
                            <i class="fa fa-plus"></i> <?php echo trans_line('agregar_fila'); ?></a>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <a class="btn default" href="<?php echo base_url_lang() . 'alta_obra/zona_concepto/' . $etapas_id ?>"><i
                                                class="fa fa-backward"></i> <?php echo trans_line('btn_cancel'); ?></a>
                                    <button type="submit" class="btn green"
                                            id="btn_submit"><?php echo trans_line('btn_submit'); ?> <i
                                                class="fa fa-forward"></i></button>
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

        var conceptos = new Bloodhound({
            datumTokenizer: function (d) {
                return Bloodhound.tokenizers.whitespace(d.name);
            },
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            limit: 10,
            prefetch: {
                url: '<?php echo base_url_lang() . 'alta_obra/conceptos_json' ?>',
                filter: function (list) {
                    return $.map(list, function (concepto) {
                        return {name: concepto};
                    });
                }
            }
        });

        conceptos.initialize();

        $('.mt-repeater').each(function () {
            $(this).repeater({
                show: function () {
                    var new_th = $(this).find('.th_element');
                    $(new_th).each(function () {
                        $(this).typeahead(null, {
                            displayKey: 'name',
                            hint: true,
                            source: conceptos.ttAdapter()
                        });
                    });
                    $(this).slideDown();
                },
                hide: function (deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    }
                },
                ready: function (setIndexes) {
                }
            });
        });

        $('.th_element').typeahead(null, {
            displayKey: 'name',
            hint: true,
            source: conceptos.ttAdapter()
        });

        var form1 = $('#current_form');
        var error1 = $('.alert-danger', form1);

        jQuery.validator.addClassRules({
            unidades: {
                required: true
            },
            cantidades: {
                required: true,
                number: true
            },
            precios: {
                required: true,
                number: true
            }
        });

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            messages: {},
            rules: {},
            invalidHandler: function (event, validator) { //display error alert on form submit
                for (var i = 0; i < validator.errorList.length; i++) {
                    console.log(validator.errorList[i]);
                }

                //validator.errorMap is an object mapping input names -> error messages
                for (var i in validator.errorMap) {
                    console.log(i, ":", validator.errorMap[i]);
                }
                error1.show();
                $("#errores").text(validator.numberOfInvalids() + " field(s) are invalid");
                App.scrollTo(error1, -200);
            },

            errorPlacement: function (error, element) {
                var cont = $(element).parent('.input-group');
                if (cont) {
                    cont.after(error);
                } else {
                    element.after(error);
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
                error1.hide();
                form.submit();
            }
        });

    });// FIN DOCUMENT READY
</script>