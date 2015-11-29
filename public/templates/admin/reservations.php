
<?php include("head.php"); ?>

<?php require_once __DIR__ . '/../../../config/bootstrap.php'; ?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            Reservations
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
                            <i class="fa fa-cogs"></i>All reservations
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
                                            Court
                                        </th>
                                        <th>
                                            User
                                        </th>
                                        <th>
                                            Datetime
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
                                                <?php echo $reservation->getDatetime()->format('d-m-Y H:i:s'); ?>
                                            </td>
                                            <td>
                                                <?php echo $reservation->getCourt(); ?>
                                            </td>
                                            <td>
                                                <?php echo $reservation->getUser(); ?>
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
