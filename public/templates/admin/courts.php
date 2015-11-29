
<?php include("header.php"); ?>

<?php require_once __DIR__ . '/../../../config/bootstrap.php'; ?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            Pistas
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
                            <i class="fa fa-cogs"></i>Todas las pistas
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
                                    $entityManager = GetEntityManager();
                                    $courtRepository = $entityManager->getRepository('AppBundle\Entity\Court');
                                    $courts = $courtRepository->findAll();
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
                                                <button type="button" class="btn btn-xs default red-stripe">Modificar</button>

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
                <!-- END SAMPLE TABLE PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->

<?php include("footer.php"); ?>
