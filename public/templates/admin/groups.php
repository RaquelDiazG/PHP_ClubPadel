
<?php include("header.php"); ?>

<?php require_once __DIR__ . '/../../../config/bootstrap.php'; ?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            Grupos
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
                <div class="portlet box grey-gallery">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-users"></i> <i class="fa fa-plus"></i> Crear nuevo grupo
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" role="form" action="../../crud/createGroup.php" method="POST">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nombre</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="Nombre" name="nombre">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Roles</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="Roles ej.) rol1 rol2 rol3 ..." name="roles">
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
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box red-flamingo">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-users"></i>Todos los grupos
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
                                            Nombre
                                        </th>
                                        <th>
                                            Roles
                                        </th>
                                        <th>
                                            Usuarios
                                        </th>
                                        <th>
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $entityManager = GetEntityManager();
                                    $groupRepository = $entityManager->getRepository('AppBundle\Entity\Group');
                                    $groups = $groupRepository->findAll();
                                    foreach ($groups as $group) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $group->getId(); ?>
                                            </td>
                                            <td>
                                                <?php echo $group->getName(); ?>
                                            </td>
                                            <td>
                                                <?php echo implode(", ", $group->getRoles()); ?>
                                            </td>
                                            <td>
                                                <?php echo implode(", ", $group->getUser()->getValues()); ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-xs default red-stripe">Modificar</button>

                                                <form action="../../crud/deleteGroup.php" method="POST">
                                                    <input type="hidden" name="id" value="<?php echo $group->getId(); ?>">
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
