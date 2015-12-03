
<?php include("header.php"); ?>

<?php
require_once __DIR__ . '/../../../config/bootstrap.php';
$entityManager = GetEntityManager();
$reservationRepository = $entityManager->getRepository('AppBundle\Entity\Reservation');
$reservations = $reservationRepository->findAll();
?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            Reservas
        </h3>
        <!-- END PAGE HEADER-->

        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box grey-gallery">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-calendar"></i> <i class="fa fa-plus"></i> Crear nueva reserva
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" role="form" action="../../crud/createReservation.php" method="POST">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Fecha y hora</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control form-control-inline date form_datetime" size="16" placeholder="Fecha y hora" name="datetime" id="datetime">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">ID pista</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="ID de la pista" name="pistaID">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">ID usuario</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="ID del usuario" name="usuarioID">
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
                            <i class="fa fa-calendar"></i>Todas las reservas
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
                                            Pista
                                        </th>
                                        <th>
                                            Usuario
                                        </th>
                                        <th>
                                            Fecha y hora
                                        </th>
                                        <th>
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($reservations as $reservation) { ?>
                                        <tr>
                                            <td>
                                                <?php echo $reservation->getId(); ?>
                                            </td>
                                            <td>
                                                <?php echo $reservation->getCourt(); ?>
                                            </td>
                                            <td>
                                                <?php echo $reservation->getUser(); ?>
                                            </td>
                                            <td>
                                                <?php echo $reservation->getDatetime()->format('d-m-Y H:i:s'); ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-xs default red-stripe" data-toggle="modal" href="#modal_<?php echo $reservation->getId(); ?>">Modificar</a>

                                                <form class="col-md-6" action="../../crud/deleteReservation.php" method="POST">
                                                    <input type="hidden" name="id" value="<?php echo $reservation->getId(); ?>">
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
        <?php foreach ($reservations as $reservation) { ?>
            <div class="modal fade" id="modal_<?php echo $reservation->getId(); ?>" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-grey-gallery">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Modificar grupo</h4>
                        </div>
                        <form class="form-horizontal" role="form" action="../../crud/updateReservation.php" method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="id" value="<?php echo $reservation->getId(); ?>">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Fecha y hora</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-inline date form_datetime" size="16" value="<?php $reservation->getDatetime()->format('d-m-Y H:i:s'); ?>" name="datetime" id="datetime">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">ID pista</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="ID de la pista" name="pistaID" value="<?php echo $reservation->getCourt(); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">ID usuario</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="ID del usuario" name="usuarioID" value="<?php echo $reservation->getUser(); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn default" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn red-flamingo">Modificar</button>
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
    seleccionarMenu('Reservas');
</script>