
<?php include("head.php"); ?>

<?php require_once __DIR__ . '/../../../config/bootstrap.php'; ?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            Usuarios
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
                            <i class="fa fa-cogs"></i>Todos los usuarios
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
                                            Usuario
                                        </th>
                                        <th>
                                            Usuario canónico
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Email canónico
                                        </th>
<!--                                        <th>
                                            Enabled
                                        </th>
                                        <th>
                                            Salt
                                        </th>-->
                                        <th>
                                            Contraseña
                                        </th>
<!--                                        <th>
                                            Last login
                                        </th>
                                        <th>
                                            Locked
                                        </th>
                                        <th>
                                            Expired
                                        </th>
                                        <th>
                                            Expires at
                                        </th>
                                        <th>
                                            Confirmation token
                                        </th>
                                        <th>
                                            Password requested at
                                        </th>-->
                                        <th>
                                            Roles
                                        </th>
<!--                                        <th>
                                            Credentials expired
                                        </th>
                                        <th>
                                            Credentials expire at
                                        </th>-->
                                        <th>
                                            Grupos
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $entityManager = GetEntityManager();
                                    $userRepository = $entityManager->getRepository('AppBundle\Entity\User');
                                    $users = $userRepository->findAll();
                                    foreach ($users as $user) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $user->getId(); ?>
                                            </td>
                                            <td>
                                                <?php echo $user->getUsername(); ?>
                                            </td>
                                            <td>
                                                <?php echo $user->getUsernameCanonical(); ?>
                                            </td>
                                            <td>
                                                <?php echo $user->getEmail(); ?>
                                            </td>
                                            <td>
                                                <?php echo $user->getEmailCanonical(); ?>
                                            </td>
                                            <td>
                                                <?php echo $user->getPassword(); ?>
                                            </td>
                                            <td>
                                                <?php echo implode(", ", $user->getRoles()); ?>
                                            </td>
                                            <td>
                                                <?php echo implode(", ", $user->getGroup()->getValues()); ?>
                                            </td>
    <!--                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>-->
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
