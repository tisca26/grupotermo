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
                    <a href="<?php echo base_url_lang() . 'servicios'; ?>"><?php echo trans_line('breadcrumb_pagina'); ?></a>
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
                        <?php echo form_open('servicios/editar_servicio', array('id' => 'current_form')); ?>
                        <input type="hidden" name="servicios_id" value="<?php echo $servicio->servicios_id; ?>">
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
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input">
                                        <?php echo form_input('nombre', set_value('nombre', $servicio->nombre), 'id="nombre" placeholder="' . trans_line('nombre_placeholder') . '" class="form-control"'); ?>
                                        <label for="nombre"><?php echo trans_line('nombre'); ?>
                                            <span class="required">*</span>
                                        </label>
                                        <span class="help-block"><?php echo trans_line('nombre_ayuda'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input">
                                        <?php echo form_input('precio_propio', set_value('precio_propio', $servicio->precio_propio), 'id="precio_propio" placeholder="' . trans_line('precio_propio_placeholder') . '" class="form-control"'); ?>
                                        <label for="precio_propio"><?php echo trans_line('precio_propio'); ?>
                                            <span class="required">*</span>
                                        </label>
                                        <span class="help-block"><?php echo trans_line('precio_propio_ayuda'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input">
                                        <?php echo form_dropdown('unidades_id', $unidades, set_value('unidades_id', $servicio->unidades_id), 'id="unidades_id" title="' . trans_line('unidades_id_placeholder') . '" class="form-control bs-select" data-size="5" data-live-search="true" data-live-search-normalize="true"'); ?>
                                        <label for="unidades_id"><?php echo trans_line('unidades_id'); ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-checkboxes">
                                        <label for=""><?php echo trans_line('estatus'); ?></label>
                                        <div class="md-checkbox-list">
                                            <div class="md-checkbox">
                                                <input type="checkbox" id="estatus" name="estatus" value="1"
                                                       class="md-check" <?php echo set_checkbox('estatus', '1', (bool)$servicio->estatus); ?>>
                                                <label for="estatus">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> <?php echo trans_line('estatus_servicio'); ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input">
                                        <?php echo form_dropdown('servicios_categoria_id[]', $categorias, $categorias_sel, 'id="servicios_categoria_id" title="' . trans_line('categoria_placeholder') . '" class="form-control bs-select" data-live-search="true" data-live-search-normalize="true" multiple'); ?>
                                        <label for="categoria"><?php echo trans_line('categoria'); ?>
                                            <span class="required">*</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4><?php echo trans_line('precios_por_proveedor'); ?></h4>
                                    <a href="javascript:;" id="btn_agregar_proveedor"
                                       class="btn btn-success mt-repeater-add">
                                        <i class="fa fa-plus"></i> <?php echo trans_line('agregar_fila_proveedor'); ?>
                                    </a>
                                    <br/><br/>
                                </div>
                            </div>
                            <?php $cont = 0; ?>
                            <?php foreach ($precios as $precio): ?>
                                <div class="generated_div_proveedor row">
                                    <div class="col-md-3">
                                        <div class="form-group form-md-line-input">
                                            <input type="text" name="precio_unitario[<?php echo $cont; ?>]"
                                                   value="<?php echo set_value('precio_unitario[]', $precio->precio_unitario); ?>"
                                                   placeholder="<?php echo trans_line('precio_unitario_placeholder'); ?>"
                                                   class="form-control precio_unitario" data-rule-required="true"
                                                   data-msg-required="<?php echo trans_line('required'); ?>"
                                                   data-rule-number="true"
                                                   data-msg-number="<?php echo trans_line('number'); ?>">
                                            <label for="precio_unitario"><?php echo trans_line('precio_unitario'); ?>
                                                <span class="required">*</span>
                                            </label>
                                            <span class="help-block"><?php echo trans_line('precio_unitario_ayuda'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group form-md-line-input div_b_select">
                                            <?php echo form_dropdown('proveedores_id[' . $cont . ']', $proveedores, $precio->proveedores_id, 'title="' . trans_line('proveedor_placeholder') . '" class="form-control bs-select proveedores_id" data-live-search="true" data-live-search-normalize="true" data-rule-required="true" data-msg-required="' . trans_line('required') . '"'); ?>
                                            <label for="proveedor"><?php echo trans_line('proveedor'); ?>
                                                <span class="required">*</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group form-md-line-input">
                                            <button class="btn btn-danger btn_borrar_proveedor" type="button"
                                                    onclick="borrar_proveedor(this)">
                                                <i class="fa fa-close"/></i> <?php echo trans_line('borrar_fila'); ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php $cont++; ?>
                            <?php endforeach; ?>
                            <div id="my_div_repeat">
                                <div id="my_repeat" class="generated_div_proveedor row">
                                    <div class="col-md-3">
                                        <div class="form-group form-md-line-input">
                                            <input type="text" name="precio_unitario[<?php echo $cont; ?>]"
                                                   value="<?php echo set_value('precio_unitario[]'); ?>"
                                                   placeholder="<?php echo trans_line('precio_unitario_placeholder'); ?>"
                                                   class="form-control precio_unitario" data-rule-required="true"
                                                   data-msg-required="<?php echo trans_line('required'); ?>"
                                                   data-rule-number="true"
                                                   data-msg-number="<?php echo trans_line('number'); ?>">
                                            <label for="precio_unitario"><?php echo trans_line('precio_unitario'); ?>
                                                <span class="required">*</span>
                                            </label>
                                            <span class="help-block"><?php echo trans_line('precio_unitario_ayuda'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group form-md-line-input div_b_select">
                                            <?php echo form_dropdown('proveedores_id[' . $cont . ']', $proveedores, '', 'title="' . trans_line('proveedor_placeholder') . '" class="form-control bs-select proveedores_id" data-live-search="true" data-live-search-normalize="true" data-rule-required="true" data-msg-required="' . trans_line('required') . '"'); ?>
                                            <label for="proveedor"><?php echo trans_line('proveedor'); ?>
                                                <span class="required">*</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group form-md-line-input">
                                            <button class="btn btn-danger btn_borrar_proveedor" type="button"
                                                    onclick="borrar_proveedor(this)">
                                                <i class="fa fa-close"/></i> <?php echo trans_line('borrar_fila'); ?>
                                            </button>
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
                                       href="<?php echo base_url_lang() . 'servicios' ?>"><?php echo trans_line('btn_cancel'); ?></a>
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
    var proveedor_index = <?php echo ++$cont; ?>;
    var agrega_provedor = function (provedor_html) {

        var pu_name = provedor_html.find("input.precio_unitario").attr('name');
        var pu_elem = pu_name.split(/\d+/g);
        var pu_new_name = pu_elem[0] + proveedor_index + pu_elem[1];

        var pi_name = provedor_html.find("select.proveedores_id").attr('name');
        var pi_elem = pi_name.split(/\d+/g);
        var pi_new_name = pi_elem[0] + proveedor_index + pi_elem[1];

        proveedor_index++;
        provedor_html.find("input.precio_unitario").attr('name', pu_new_name);
        provedor_html.find("select.proveedores_id").attr('name', pi_new_name);

        var my_new_div = '<div class="generated_div_proveedor row">' + provedor_html.html() + '</div>';
        var $my_new_div = $(my_new_div);
        $('#my_div_repeat').append($my_new_div);
        //Regresamos el name a la normalidad, no pudimos clonar el objeto provedor_html con exito
        provedor_html.find("input.precio_unitario").attr('name', pu_name);
        provedor_html.find("select.proveedores_id").attr('name', pi_name);
        //Borramos div generado por la libreria bootstrap select
        var $my_new_sel = $my_new_div.find("select.proveedores_id");
        $my_new_div.find('div.bootstrap-select').remove();
        $my_new_div.find('div.div_b_select').prepend($my_new_sel);
        $('.bs-select').selectpicker({
            iconBase: 'fa',
            tickIcon: 'fa-check'
        });
    };
    var borrar_proveedor = function (elem) {
        var my_div = $(elem).parents('div.generated_div_proveedor');
        my_div.remove();
    };
    $(document).ready(function () {
        var provedor_html = $('#my_repeat');
        $('#spinner_gt').hide(600);

        $('#btn_agregar_proveedor').click(function () {
            agrega_provedor(provedor_html);
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
                precio_propio: {
                    required: "<?php echo trans_line('required'); ?>",
                    number: "<?php echo trans_line('number'); ?>"
                },
                'servicios_categoria_id[]': {
                    required: "<?php echo trans_line('required'); ?>"
                }
            },
            rules: {
                nombre: {
                    minlength: 3,
                    required: true
                },
                precio_propio: {
                    required: true,
                    number: true
                },
                'servicios_categoria_id[]': {
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