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
                <div class="portlet light ">
                    <div class="portlet-body">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', '</div>'); ?>
                        <?php echo get_bootstrap_alert(); ?>
                        <a href="<?php echo base_url_lang() . 'bitacora/form_insert/4' ?>" class="btn btn-success">
                            <i class="fa fa-plus"></i> <?php echo trans_line('agregar_bitacora'); ?></a>
                        <hr>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column"
                               id="bitacora_table">
                            <thead>
                            <tr>
                                <th> <?php echo trans_line('almacen_tabla_tipo_movimiento'); ?></th>
                                <th> <?php echo trans_line('almacen_tabla_almacen_destino'); ?></th>
                                <th> <?php echo trans_line('almacen_tabla_persona_registra'); ?></th>
                                <th> <?php echo trans_line('almacen_tabla_persona_autoriza'); ?></th>
                                <th> <?php echo trans_line('almacen_tabla_activo_destino'); ?></th>
                                <th> <?php echo trans_line('almacen_tabla_acciones'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($bitacora as $bit): ?>
                                <tr class="odd gradeX">
                                    <td> <?php echo $almacen->nombre; ?></td>
                                    <td> <?php echo $almacen->tipo; ?></td>
                                    <td> <?php echo $almacen->almacen_destino; ?></td>
                                    <td> <?php echo $almacen->almacen_destino; ?></td>
                                    <td> <?php echo $almacen->usuario_regitra; ?></td>
                                    <td> <?php echo $almacen->usuario_autoriza; ?></td>
                                    <td> <?php echo $almacen->activo_destino; ?></td>
                                    <td>
                                        <a href="<?php echo base_url_lang() . 'almacenes/form_edit/' . $almacen->almacenes_id ?>"
                                           class="badge badge-primary badge-roundless"> <?php echo trans_line('editar_tabla'); ?> </a>
                                        <a class="badge badge-danger badge-roundless delete_confirmation"
                                           data-toggle="confirmation" data-placement="top"
                                           data-original-title="<?php echo trans_line('confirmacion_borrado_titulo'); ?>"
                                           data-btn-ok-label="<?php echo trans_line('confirmacion_borrado_ok'); ?>"
                                           data-btn-ok-icon="icon-like" data-btn-ok-class="btn-success"
                                           data-btn-cancel-label="<?php echo trans_line('confirmacion_borrado_cancel'); ?>"
                                           data-btn-cancel-icon="icon-close" data-btn-cancel-class="btn-danger"
                                           data-id="<?php echo $almacen->almacenes_id ?>">
                                            <?php echo trans_line('borrar_tabla'); ?>
                                        </a>
                                        <a href="<?php echo base_url_lang() . 'almacenes/ver_almacen/' . $almacen->almacenes_id ?>"
                                           class="badge badge-info badge-roundless"> <?php echo trans_line('ver_tabla'); ?> </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="portlet light ">
                            <div class="portlet-body">
                                <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', '</div>'); ?>
                                <?php echo get_bootstrap_alert(); ?>
                                <a href="<?php echo base_url_lang() . 'almacenes/form_insert' ?>" class="btn btn-success">
                                    <i class="fa fa-plus"></i> <?php echo trans_line('agregar_pagina'); ?></a>
                                <hr>
                                <table class="table table-striped table-bordered table-hover table-checkable order-column"
                                       id="materiales_table">
                                    <thead>
                                    <tr>
                                        <th> <?php echo trans_line('almacen_tabla_material'); ?></th>
                                        <th> <?php echo trans_line('almacen_tabla_cantidad'); ?></th>
                                        <th> <?php echo trans_line('almacen_tabla_acciones'); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($materiales as $material): ?>
                                        <tr class="odd gradeX">
                                            <td> <?php echo $material->nombre; ?></td>
                                            <td> <?php echo $material->cantidad; ?></td>
                                            <td>
                                                <a href="<?php echo base_url_lang() . 'almacenes/form_edit/' . $material->almacen_materiales_id; ?>"
                                                   class="badge badge-primary badge-roundless"> <?php echo trans_line('editar_tabla'); ?> </a>
                                                <a class="badge badge-danger badge-roundless delete_confirmation"
                                                   data-toggle="confirmation" data-placement="top"
                                                   data-original-title="<?php echo trans_line('confirmacion_borrado_titulo'); ?>"
                                                   data-btn-ok-label="<?php echo trans_line('confirmacion_borrado_ok'); ?>"
                                                   data-btn-ok-icon="icon-like" data-btn-ok-class="btn-success"
                                                   data-btn-cancel-label="<?php echo trans_line('confirmacion_borrado_cancel'); ?>"
                                                   data-btn-cancel-icon="icon-close" data-btn-cancel-class="btn-danger"
                                                   data-id="<?php echo $material->almacen_materiales_id; ?>">
                                                    <?php echo trans_line('borrar_tabla'); ?>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="portlet light ">
                            <div class="portlet-body">
                                <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', '</div>'); ?>
                                <?php echo get_bootstrap_alert(); ?>
                                <a href="<?php echo base_url_lang() . 'almacenes/form_insert' ?>" class="btn btn-success">
                                    <i class="fa fa-plus"></i> <?php echo trans_line('agregar_pagina'); ?></a>
                                <hr>
                                <table class="table table-striped table-bordered table-hover table-checkable order-column"
                                       id="users_table">
                                    <thead>
                                    <tr>
                                        <th> <?php echo trans_line('almacen_tabla'); ?></th>
                                        <th> <?php echo trans_line('acciones_tabla'); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($rows as $almacen): ?>
                                        <tr class="odd gradeX">
                                            <td> <?php echo $almacen->nombre; ?></td>
                                            <td>
                                                <a href="<?php echo base_url_lang() . 'almacenes/form_edit/' . $almacen->almacenes_id ?>"
                                                   class="badge badge-primary badge-roundless"> <?php echo trans_line('editar_tabla'); ?> </a>
                                                <a class="badge badge-danger badge-roundless delete_confirmation"
                                                   data-toggle="confirmation" data-placement="top"
                                                   data-original-title="<?php echo trans_line('confirmacion_borrado_titulo'); ?>"
                                                   data-btn-ok-label="<?php echo trans_line('confirmacion_borrado_ok'); ?>"
                                                   data-btn-ok-icon="icon-like" data-btn-ok-class="btn-success"
                                                   data-btn-cancel-label="<?php echo trans_line('confirmacion_borrado_cancel'); ?>"
                                                   data-btn-cancel-icon="icon-close" data-btn-cancel-class="btn-danger"
                                                   data-id="<?php echo $almacen->almacenes_id ?>">
                                                    <?php echo trans_line('borrar_tabla'); ?>
                                                </a>
                                                <a href="<?php echo base_url_lang() . 'almacenes/ver_almacen/' . $almacen->almacenes_id ?>"
                                                   class="badge badge-info badge-roundless"> <?php echo trans_line('ver_tabla'); ?> </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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

        //TABLA BITACORA
        var bitacora_table = $('#bitacora_table');
        bitacora_table.dataTable({
            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": "<?php echo trans_line('sortAscending'); ?>",
                    "sortDescending": "<?php echo trans_line('sortDescending'); ?>"
                },
                "emptyTable": "<?php echo trans_line('emptyTable'); ?>",
                "info": "<?php echo trans_line('info'); ?>",
                "infoEmpty": "<?php echo trans_line('infoEmpty'); ?>",
                "infoFiltered": "<?php echo trans_line('infoFiltered'); ?>",
                "lengthMenu": "<?php echo trans_line('lengthMenu'); ?>",
                "search": "<?php echo trans_line('search'); ?>",
                "zeroRecords": "<?php echo trans_line('zeroRecords'); ?>",
                "paginate": {
                    "previous": "<?php echo trans_line('previous'); ?>",
                    "next": "<?php echo trans_line('next'); ?>",
                    "last": "<?php echo trans_line('last'); ?>",
                    "first": "<?php echo trans_line('first'); ?>"
                }
            },

            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 9,
            "pagingType": "bootstrap_full_number",
            "columnDefs": [
                {
                    "sortable": false,
                    "targets": [5]
                },
                {
                    "className": "text-center",
                    "targets": ["_all"]
                }
            ],
            "order": [
                [0, "asc"]
            ] // set first column as a default sort by asc
        });

        //TABLA BITACORA
        var materiales_table = $('#materiales_table');
        materiales_table.dataTable({
            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": "<?php echo trans_line('sortAscending'); ?>",
                    "sortDescending": "<?php echo trans_line('sortDescending'); ?>"
                },
                "emptyTable": "<?php echo trans_line('emptyTable'); ?>",
                "info": "<?php echo trans_line('info'); ?>",
                "infoEmpty": "<?php echo trans_line('infoEmpty'); ?>",
                "infoFiltered": "<?php echo trans_line('infoFiltered'); ?>",
                "lengthMenu": "<?php echo trans_line('lengthMenu'); ?>",
                "search": "<?php echo trans_line('search'); ?>",
                "zeroRecords": "<?php echo trans_line('zeroRecords'); ?>",
                "paginate": {
                    "previous": "<?php echo trans_line('previous'); ?>",
                    "next": "<?php echo trans_line('next'); ?>",
                    "last": "<?php echo trans_line('last'); ?>",
                    "first": "<?php echo trans_line('first'); ?>"
                }
            },

            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 9,
            "pagingType": "bootstrap_full_number",
            "columnDefs": [
                {
                    "sortable": false,
                    "targets": [2]
                },
                {
                    "className": "text-center",
                    "targets": ["_all"]
                }
            ],
            "order": [
                [0, "asc"]
            ] // set first column as a default sort by asc
        });

        $('.delete_confirmation').on('confirmed.bs.confirmation', function () {
            var id = $(this).attr('data-id');
            window.location.href = "<?php echo base_url_lang() . 'almacenes/borrar_almacen/' ?>" + id;
        });
    });// FIN DOCUMENT READY
</script>