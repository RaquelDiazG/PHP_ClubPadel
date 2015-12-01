
<?php include("header.php"); ?>

<?php
require_once __DIR__ . '/../../../config/bootstrap.php';

$entityManager = GetEntityManager();
$courtRepository = $entityManager->getRepository('AppBundle\Entity\Court');
$courts = $courtRepository->findAll();
?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            Pistas
        </h3>
        <!-- END PAGE HEADER-->

        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box grey-gallery">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-list"></i> <i class="fa fa-plus"></i> Crear nueva pista
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" role="form" action="../../crud/createCourt.php" method="POST">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Disponible</label>
                                    <div class="col-md-6">
                                        <div class="checkbox-list">
                                            <label class="checkbox-inline">
                                                <div class="checker">
                                                    <span><input type="checkbox" name="disponible" value="1"></span>
                                                </div> Sí</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3 control-label">
                                        <button type="submit" class="btn red-flamingo-stripe">Crear</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- BEGIN TABLE PORTLET-->
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box red-flamingo">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-list"></i>Todas las pistas
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Disponible
                                        </th>
                                        <th>
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($courts as $court) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $court->getId(); ?>
                                            </td>
                                            <td>
                                                <div class="checker disabled">
                                                    <span>
                                                        <input type="checkbox" disabled
                                                        <?php
                                                        if ($court->getActive()) {
                                                            echo 'checked';
                                                        }
                                                        ?>
                                                               >
                                                               <?php echo $court->getActive() ? 'SI' : 'NO'; ?>
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <a class="btn btn-xs default red-stripe" data-toggle="modal" href="#modal_<?php echo $court->getId(); ?>">Modificar</a>

                                                <form action="../../crud/deleteCourt.php" method="POST">
                                                    <input type="hidden" name="id" value="<?php echo $court->getId(); ?>">
                                                    <button type="submit" class="btn btn-xs default red-stripe">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END TABLE PORTLET-->

        <!-- BEGIN MODAL-->
        <?php foreach ($courts as $court) { ?>
            <div class="modal fade" id="modal_<?php echo $court->getId(); ?>" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Modificar pista</h4>
                        </div>
                        <form action="../../crud/updateCourt.php" method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="id" value="<?php echo $court->getId(); ?>">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Disponible</label>
                                    <div class="col-md-6">
                                        <div class="checkbox-list">
                                            <label class="checkbox-inline">
                                                <div class="checker">
                                                    <span><input type="checkbox" name="disponible" value="1"
                                                        <?php
                                                        if ($court->getActive()) {
                                                            echo 'checked';
                                                        }
                                                        ?> >
                                                    </span>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn default" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn red">Modificar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- END MODAL -->

    </div>
    <!-- END PAGE CONTENT-->
</div>
<!-- END CONTENT -->

<?php include("footer.php"); ?>

<script>
    seleccionarMenu('Pistas');
</script>