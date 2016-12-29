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
                <div class="portlet mt-element-ribbon light portlet-fit">
                    <div class="ribbon ribbon-vertical-right ribbon-shadow ribbon-color-primary uppercase">
                        <div class="ribbon-sub ribbon-bookmark"></div>
                        <i class="fa fa-star"></i>
                    </div>
                    <div class="portlet-title">
                        <div class="caption">
                            <i class=" icon-layers font-green"></i>
                            <span class="caption-subject font-green bold uppercase"><?php echo trans_line('titulo_forma'); ?></span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', '</div>'); ?>
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
                                            $<?php echo $obra->total_autorizado; ?>
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
                            <?php foreach ($etapa->zonas as $zona): ?>
                                <div class="row">
                                    <div class="col-xs-11 col-xs-offset-1">
                                        <div class="mt-element-ribbon bg-grey-steel">
                                            <div class="ribbon ribbon-border-hor ribbon-clip ribbon-color-success uppercase">
                                                <div class="ribbon-sub ribbon-clip"></div> <?php echo trans_line('zonas_datos'); ?>
                                            </div>
                                            <div class="row ribbon-content">
                                                <div class="col-md-12">
                                                    <strong><?php echo trans_line('zona_nombre'); ?>
                                                        :</strong> <?php echo $zona->nombre; ?><br/>
                                                    <strong><?php echo trans_line('zona_periodo'); ?>
                                                        :</strong> <?php echo $zona->fecha_inicio; ?> <?php echo trans_line('zona_periodo_al'); ?> <?php echo $zona->fecha_fin; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php foreach ($zona->conceptos as $concepto): ?>
                                    <div class="row">
                                        <div class="col-xs-10 col-xs-offset-2">
                                            <div class="mt-element-ribbon bg-grey-steel">
                                                <div class="ribbon ribbon-border-hor ribbon-clip ribbon-color-info uppercase">
                                                    <div class="ribbon-sub ribbon-clip"></div> <?php echo trans_line('conceptos_datos'); ?>
                                                </div>
                                                <div class="row ribbon-content">
                                                    <div class="col-md-12">
                                                        <strong><?php echo trans_line('concepto_nombre'); ?>:</strong> <?php echo $concepto->concepto_nombre; ?><br/>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <strong><?php echo trans_line('concepto_unidad'); ?>:</strong>
                                                        <?php echo $concepto->unidad; ?>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <strong><?php echo trans_line('concepto_cantidad'); ?>:</strong>
                                                        <?php echo $concepto->cantidad; ?>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <strong><?php echo trans_line('concepto_precio_unitario'); ?>:</strong>
                                                        $<?php echo $concepto->precio_unitario; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <a class="btn btn-primary" href="<?php echo base_url_lang(); ?>">
                                        <i class="fa fa-hand-peace-o"></i> <?php echo trans_line('btn_finalizar'); ?>
                                    </a>
                                </div>
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


    });// FIN DOCUMENT READY
</script>