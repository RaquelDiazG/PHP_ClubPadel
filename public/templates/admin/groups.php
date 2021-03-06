
<?php include("header.php"); ?>

<?php
require_once __DIR__ . '/../../../config/bootstrap.php';
$entityManager = GetEntityManager();
$groupRepository = $entityManager->getRepository('AppBundle\Entity\Group');
$groups = $groupRepository->findAll();
?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            Grupos
        </h3>
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
                                        <input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Roles</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="Roles ej.) rol1 rol2 rol3 ..." name="roles" required>
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
                                    <?php foreach ($groups as $group) { ?>
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
                                                <a class="btn btn-xs default red-stripe" data-toggle="modal" href="#modal_<?php echo $group->getId(); ?>">Modificar</a>

                                                <form class="col-md-6" action="../../crud/deleteGroup.php" method="POST">
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
                <!-- END TABLE PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->

        <!-- BEGIN MODAL-->
        <?php foreach ($groups as $group) { ?>
            <div class="modal fade" id="modal_<?php echo $group->getId(); ?>" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-grey-gallery">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Modificar grupo</h4>
                        </div>
                        <form class="form-horizontal" role="form" action="../../crud/updateGroup.php" method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="id" value="<?php echo $group->getId(); ?>">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Nombre</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="Nombre" name="nombre" value="<?php echo $group->getName(); ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Roles</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="Roles ej.) rol1 rol2 rol3 ..." name="roles" value="<?php echo implode(", ", $group->getRoles()); ?>" required>
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
</div>
<!-- END CONTENT -->

<?php include("footer.php"); ?>

<script>
    seleccionarMenu('Grupos');
</script>