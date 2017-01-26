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
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption">
                            <span><?php echo trans_line('titulo_forma'); ?></span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="mt-element-ribbon bg-grey-steel">
                                    <div class="ribbon ribbon-border-hor ribbon-clip ribbon-color-danger uppercase">
                                        <div class="ribbon-sub ribbon-clip"></div> <?php echo trans_line('obra_datos'); ?>
                                    </div>
                                    <div class="row ribbon-content">
                                        <div class="col-md-12">
                                            <strong><?php echo trans_line('obra_nombre'); ?>
                                                :</strong> <?php echo $obra->nombre; ?><br/>
                                            <strong><?php echo trans_line('obra_periodo'); ?>
                                                :</strong> <?php echo $obra->fecha_inicio; ?> <?php echo trans_line('obra_periodo_al'); ?> <?php echo $obra->fecha_fin; ?>
                                        </div>
                                        <div class="col-md-6">
                                            <strong><?php echo trans_line('obra_total_real'); ?>:</strong>
                                            $<?php echo $obra->total_real; ?>
                                        </div>
                                        <div class="col-md-6">
                                            <strong><?php echo trans_line('obra_total_autorizado'); ?>:</strong>
                                            $<?php echo number_format($obra->total_autorizado, 2); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php foreach ($etapas as $etapa): ?>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="mt-element-ribbon bg-grey-steel">
                                        <div class="ribbon ribbon-border-hor ribbon-clip ribbon-color-primary uppercase">
                                            <div class="ribbon-sub ribbon-clip"></div> <?php echo trans_line('etapas_datos'); ?>
                                        </div>
                                        <div class="row ribbon-content">
                                            <div class="col-md-12">
                                                <strong><?php echo trans_line('etapa_nombre'); ?>
                                                    :</strong> <?php echo $etapa->nombre; ?><br/>
                                                <strong><?php echo trans_line('etapa_periodo'); ?>
                                                    :</strong> <?php echo $etapa->fecha_inicio; ?> <?php echo trans_line('etapa_periodo_al'); ?> <?php echo $etapa->fecha_fin; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-scrollable">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th> <?php echo trans_line('concepto'); ?> </th>
                                        <th class="text-center"> <?php echo trans_line('concepto_unidad'); ?> </th>
                                        <th class="text-center"> <?php echo trans_line('concepto_cantidad'); ?> </th>
                                        <th class="text-center"> <?php echo trans_line('concepto_precio_unitario'); ?> </th>
                                        <th class="text-center"> <?php echo trans_line('concepto_total'); ?> </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $etapa->subtotal_concepto = 0; ?>
                                    <?php foreach ($etapa->conceptos as $concepto): ?>
                                        <tr>
                                            <td> <?php echo $concepto->concepto_nombre; ?> </td>
                                            <td class="text-center"> <?php echo $concepto->unidad; ?> </td>
                                            <td class="text-center"> <?php echo $concepto->cantidad; ?> </td>
                                            <td class="text-center">
                                                $<?php echo number_format($concepto->precio_unitario, 2); ?> </td>
                                            <td class="text-center">
                                                $<?php echo number_format($concepto->total_autorizado, 2) ?> </td>
                                        </tr>
                                        <?php $etapa->subtotal_concepto += $concepto->total_autorizado; ?>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td colspan="4"></td>
                                        <td class="text-center">
                                            <strong><?php echo trans_line('concepto_subtotal'); ?>:</strong>
                                            $<?php echo number_format($etapa->subtotal_concepto, 2); ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-center"><strong><?php echo numero_a_letra($etapa->subtotal_concepto); ?></strong></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        <?php endforeach; ?>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <a class="btn btn-primary" href="<?php echo base_url_lang() . 'obras'; ?>">
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

        $('.btn_etapa').click(function () {
            var btn = $(this);
            var etapa_id = btn.attr('data-id');
            var conceptos_div = $('#etapa_' + etapa_id + '_conceptos');
            if (conceptos_div.is(':visible')) {
                conceptos_div.hide(200);
            } else {
                conceptos_div.show(200);
            }
        });

    });// FIN DOCUMENT READY
</script>