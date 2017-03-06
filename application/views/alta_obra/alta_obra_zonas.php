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
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group form-md-line-input">
                                    <?php $data_categoria = [
                                        'id' => 'conceptos_categoria_id',
                                        'placeholder' => trans_line('nombre_nuevo_placeholder'),
                                        'class' => 'form-control bs-select',
                                        'title' => trans_line('categoria_placeholder'),
                                        'data-live-search' => 'true',
                                        'data-size' => '5',
                                        'data-rule-required' => 'true',
                                        'data-msg-required' => trans_line('required')
                                    ]; ?>
                                    <?php echo form_dropdown('conceptos_categoria_id', $categorias, '', $data_categoria); ?>
                                    <label for="obras_id"><?php echo trans_line('categoria_sel'); ?>
                                        <span class="required">*</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <button type="button" class="btn btn-warning" data-toggle="modal" href="#basic"
                                            id="btn_agregar_concepto_nuevo"><i
                                                class="fa fa-plus"></i> <?php echo trans_line('btn_agregar_nuevo_concepto'); ?>
                                    </button>
                                    <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
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
                                                            data-dismiss="modal"><?php echo trans_line('cerrar'); ?>
                                                    </button>
                                                    <button type="button" id="btn_guarda_nuevo_concepto"
                                                            class="btn blue"><?php echo trans_line('guardar_modal'); ?></button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="obras_id"><?php echo trans_line('conceptos'); ?>
                                    </label>
                                </div>
                                <div class="col-md-12" style="height: 170px; overflow: scroll;" id="div_conceptos">

                                </div>
                            </div>
                        </div>
                        <br/>
                        <?php echo form_open('alta_obra/insertar_zonas_conceptos', array('id' => 'current_form', 'class' => '')); ?>
                        <input type="hidden" name="etapas_id" value="<?php echo $etapas_id; ?>">
                        <input type="hidden" name="obras_id" value="<?php echo $obras_id; ?>">
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button>
                            <?php echo trans_line('jquery_invalid'); ?><span id="errores"></span>
                        </div>

                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                        <label for="obras_id"><?php echo trans_line('conceptos_agregados'); ?>
                                        </label>
                                    </div>
                                    <div class="col-md-12" id="div_conceptos_agregados">

                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h4><?php echo trans_line('zonas'); ?></h4>
                            <div class="form-horizontal">
                                <div id="my_div_repeat">
                                    <div id="my_repeat" class="generated_div_zona">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label"><?php echo trans_line('zona_nombre'); ?></label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <input class="form-control zona_nombre_class" type="text"
                                                           name="zonas_nombres[0]"
                                                           placeholder="<?php echo trans_line('zona_nombre_placeholder'); ?>"
                                                           required/>
                                                    <span class="input-group-btn">
                                                    <button class="btn btn-danger btn_borrar_zona" type="button"
                                                            onclick="borrar_zona(this)">
                                                        <i class="fa fa-close"/></i> <?php echo trans_line('borrar_fila'); ?>
                                                    </button>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2"><?php echo trans_line('zona_fechas_rango'); ?></label>
                                            <div class="col-md-8">
                                                <div class="input-group date-picker input-daterange"
                                                     data-date="<?php echo date('Y-m-d') ?>"
                                                     data-date-format="yyyy-mm-dd">
                                                    <input type="text" class="form-control" name="zonas_fechas_inicio[]"
                                                           placeholder="<?php echo trans_line('zona_fecha_inicio_placeholder'); ?>"
                                                           required>
                                                    <span class="input-group-addon"> <?php echo trans_line('zona_fechas_a'); ?> </span>
                                                    <input type="text" class="form-control" name="zonas_fechas_fin[]"
                                                           placeholder="<?php echo trans_line('zona_fecha_fin_placeholder'); ?>"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="javascript:;" id="btn_agregar_zona" class="btn btn-success mt-repeater-add">
                                <i class="fa fa-plus"></i> <?php echo trans_line('agregar_fila_zona'); ?>
                            </a>
                        </div>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <a class="btn default"
                                       href="<?php echo base_url_lang() . 'alta_obra/estructura/' . $etapas_id ?>"><i
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
<style type="text/css">
    #div_conceptos > .row {
        padding: 4px 1px;
    }

    #div_conceptos > .row:nth-of-type(odd) {
        background-color: #eceaea;
    }
</style>
<script type="application/javascript">
    var zona_index = 1;
    var agrega_zona = function (zona_html) {
        var name = zona_html.find("input.zona_nombre_class").attr('name');
        var elem = name.split(/\d+/g);
        var new_name = elem[0] + zona_index + elem[1];
        zona_index++;
        zona_html.find("input.zona_nombre_class").attr('name', new_name);
        var zona_div = $('#my_div_repeat').append('<div class="generated_div_zona">' + zona_html.html() + '</div>');
        //Regresamos el name a la normalidad, no pudimos clonar el objeto zona_html con exito
        zona_html.find("input.zona_nombre_class").attr('name', name);
        genera_fechas();
    };
    var borrar_zona = function (elem) {
        var my_div = $(elem).parents('div.generated_div_zona');
        my_div.remove();
    };

    var genera_fechas = function () {
        $('.date-picker').datepicker({
            language: '<?php echo lang_segment(); ?>',
            orientation: "left",
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
    };

    function obtener_conceptos_por_categoria(conceptos_categoria_id, elem_id) {
        $.get(
            "<?php echo base_url_lang() . 'conceptos/conceptos_por_categoria_json/' ?>" + conceptos_categoria_id,
            function (data, status, xhr) {
                genera_div_conceptos(data, elem_id);
            },
            "json"
        ).done(function () {
            //por si se ocupa
        }).fail(function () {
            alert("error");
        });
    }

    function genera_div_conceptos(conceptos, elem_id) {
        var $div = $('#' + elem_id);
        $div.empty();
        for (var idx in conceptos) {
            $div.append(genera_fila_concepto(conceptos[idx]));
        }
    }

    function genera_fila_concepto(concepto) {
        $fila = '<div class="row">';
        $fila += '<div class="col-md-2">' + concepto.clave + '</div>';
        $fila += '<div class="col-md-7">' + concepto.nombre + '</div>';
        $fila += '<div class="col-md-2">' + concepto.unidad + '</div>';
        $fila += '<div class="col-md-1">' + '<button type="button" class="btn green aggr_concepto" data-nombre="' + concepto.nombre + '" data-id="' + concepto.conceptos_catalogo_id + '"><?php echo trans_line('anadir_btn'); ?></button>' + '</div>';
        return $fila + '</div>';
    }

    function agregar_concepto_div(conceptos_catalogo_id, nombre, elem_id) {
        var $div = $('#' + elem_id);
        $fila = '<div class="row aggr_concepto_row">'; //1
        $fila += '<div class="col-md-12 text-muted">' + nombre + '</div>';
        $fila += '<div class="col-md-4">'; //2
        $fila += '<div class="form-group form-md-line-input">'; //3
        $fila += '<input type="hidden" name="conceptos_catalogo_id[]" value="' + conceptos_catalogo_id + '" />';
        $fila += '<input type="text" name="clave_en_obra[]" placeholder="<?php echo trans_line('clave_placeholder'); ?>" class="form-control" data-rule-required="true" data-msg-required="<?php echo trans_line('required'); ?>"/>';
        $fila += '<label for="clave"><?php echo trans_line('clave'); ?><span class="required">*</span></label>';
        $fila += '<span class="help-block"><?php echo trans_line('clave_ayuda'); ?></span>';
        $fila += '</div>'; //!3
        $fila += '</div>';// !2
        $fila += '<div class="col-md-4">'; //4
        $fila += '<div class="form-group form-md-line-input">'; //5
        $fila += '<input type="text" name="precio_unitario[]" placeholder="<?php echo trans_line('precio_unitario_placeholder'); ?>" class="form-control" data-rule-required="true" data-msg-required="<?php echo trans_line('required'); ?>" data-rule-number="true" data-msg-number="<?php echo trans_line('number'); ?>"/>';
        $fila += '<label for="precio_unitario"><?php echo trans_line('precio_unitario'); ?><span class="required">*</span></label>';
        $fila += '<span class="help-block"><?php echo trans_line('precio_unitario_ayuda'); ?></span>';
        $fila += '</div>'; //!5
        $fila += '</div>';// !4
        $fila += '<div class="col-md-4">'; //8
        $fila += '<div class="form-group form-md-line-input">'; //9
        $fila += '<button type="button" class="btn btn-danger btn_borrar_concepto_agregado" onclick="borrar_concepto(this)"><i class="fa fa-times"></i> <?php echo trans_line('borrar_btn'); ?></button>';
        $fila += '</div>'; //!9
        $fila += '</div>';// !8
        $fila + '</div>'; // !1
        $div.append($fila);
    }

    function borrar_concepto(elem) {
        var my_div = $(elem).parents('div.aggr_concepto_row');
        my_div.remove();
    }

    function reset_bs() {
        $('.bs-select').selectpicker('deselectAll');
        $('.bs-select').selectpicker('refresh');
        $("#conceptos_categoria_id").val('').selectpicker('refresh');
        console.log('reset bs');
    }

    $(document).ready(function () {
        var zona_html = $('#my_repeat');
        genera_fechas();

        $('#spinner_gt').hide(600);

        $('#btn_agregar_zona').click(function () {
            agrega_zona(zona_html);
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
        $('#conceptos_categoria_id').on('changed.bs.select', function (e, clickedIndex, newValue, oldValue) {
            var conceptos_categoria_id = $(e.currentTarget).val();
            obtener_conceptos_por_categoria(conceptos_categoria_id, 'div_conceptos');
        });

        $(document).on('click', '.aggr_concepto', function () {
            var elem = $(this);
            var conceptos_catalogo_id = elem.attr('data-id');
            var nombre = elem.attr('data-nombre');
            agregar_concepto_div(conceptos_catalogo_id, nombre, 'div_conceptos_agregados');
        });

        $(document).on('click', '#btn_guarda_nuevo_concepto', function () {
            var btn_submit = $('#btn_guarda_nuevo_concepto');
            var form = $('#frm_nuevo_concepto');
            if (form.valid()) {
                btn_submit.html('<?php echo trans_line('btn_submit_loading'); ?>');
                btn_submit.prop("disabled", true);
                var $form_srlze = form.serialize();
                //alert($form_srlze);
                $.ajax({
                    url: "<?php echo base_url_lang(); ?>conceptos_catalogo/insertar_concepto_ajax",
                    type: 'POST',
                    dataType: 'json',
                    data: $form_srlze,
                    success: function (data) {
                        if (data.estatus == 'OK') {
                            btn_submit.html('<?php echo trans_line('guardar_modal'); ?>');
                            btn_submit.prop("disabled", false);
                            form.trigger("reset");
                            reset_bs();
                            $('#basic').modal('toggle');
                            $('#div_conceptos').empty();
                            toastr.success('<?php echo trans_line('guardar_modal_success'); ?>');
                        } else {
                            toastr.error('<?php echo trans_line('guardar_modal_error'); ?>');
                        }
                    },
                    error: function (data) {
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

//        var conceptos = new Bloodhound({
//            datumTokenizer: function (d) {
//                return Bloodhound.tokenizers.whitespace(d.name);
//            },
//            queryTokenizer: Bloodhound.tokenizers.whitespace,
//            limit: 10,
//            prefetch: {
//                url: '<?php //echo base_url_lang() . 'alta_obra/conceptos_json' ?>//',
//                filter: function (list) {
//                    return $.map(list, function (concepto) {
//                        return {name: concepto};
//                    });
//                }
//            }
//        });
//
//        conceptos.initialize();
//
//        $('.mt-repeater').each(function () {
//            $(this).repeater({
//                show: function () {
//                    var new_th = $(this).find('.th_element');
//                    $(new_th).each(function () {
//                        $(this).typeahead(null, {
//                            displayKey: 'name',
//                            hint: true,
//                            source: conceptos.ttAdapter()
//                        });
//                    });
//                    $('.bs-select').selectpicker({
//                        iconBase: 'fa',
//                        tickIcon: 'fa-check'
//                    });
//                    $(this).slideDown();
//                },
//                hide: function (deleteElement) {
//                    if (confirm('<?php //echo trans_line('borrar_concepto_alert'); ?>//')) {
//                        $(this).slideUp(deleteElement);
//                    }
//                },
//                ready: function (setIndexes) {
//                }
//            });
//        });
//
//        $('.th_element').typeahead(null, {
//            displayKey: 'name',
//            hint: true,
//            source: conceptos.ttAdapter()
//        });

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
            },
            zona_nombre_class: {
                required: true
            }
        });

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: [],
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
                //$("#errores").text(validator.numberOfInvalids() + " field(s) are invalid");
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