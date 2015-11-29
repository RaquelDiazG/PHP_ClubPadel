
<?php include("header.php"); ?>

<?php require_once __DIR__ . '/../../../config/bootstrap.php'; ?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            Reservas
        </h3>
        <!--        <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="index.html">Home</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">Courts</a>
                        </li>
                    </ul>
                </div>-->
        <!-- END PAGE HEADER-->

        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">

                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet box red-flamingo">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cogs"></i>Todas las reservas
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
                                    <?php
                                    $entityManager = GetEntityManager();
                                    $reservationRepository = $entityManager->getRepository('AppBundle\Entity\Reservation');
                                    $reservations = $reservationRepository->findAll();
                                    foreach ($reservations as $reservation) {
                                        ?>
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
                                                <button type="button" class="btn btn-xs default red-stripe">Modificar</button>

                                                <form action="../../crud/deleteReservation.php" method="POST">
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
                <!-- END SAMPLE TABLE PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->

<?php include("footer.php"); ?>
