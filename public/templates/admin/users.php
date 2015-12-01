
<?php include("header.php"); ?>

<?php
require_once __DIR__ . '/../../../config/bootstrap.php';
$entityManager = GetEntityManager();
$userRepository = $entityManager->getRepository('AppBundle\Entity\User');
$users = $userRepository->findAll();
?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            Usuarios
        </h3>
        <!-- END PAGE HEADER-->

        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box grey-gallery">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-user"></i> <i class="fa fa-plus"></i> Crear nuevo usuario
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" role="form" action="../../crud/createUser.php" method="POST">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nombre</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="Nombre de usuario" name="username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" placeholder="Email" name="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Contraseña</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" placeholder="Contraseña" name="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Roles</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="Roles ej.) rol1 rol2 rol3 ..." name="roles">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">ID grupo</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="ID del grupo" name="groupID">
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
                            <i class="fa fa-user"></i>Todos los usuarios
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
                                        <th>
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
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
                                            <td>
                                                <a class="btn btn-xs default red-stripe" data-toggle="modal" href="#modal_<?php echo $user->getId(); ?>">Modificar</a>

                                                <form action="../../crud/deleteUser.php" method="POST">
                                                    <input type="hidden" name="id" value="<?php echo $user->getId(); ?>">
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
        <?php foreach ($users as $user) { ?>
            <div class="modal fade" id="modal_<?php echo $user->getId(); ?>" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-grey-gallery">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Modificar grupo</h4>
                        </div>
                        <form class="form-horizontal" role="form" action="../../crud/updateUser.php" method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="id" value="<?php echo $user->getId(); ?>">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Nombre</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="Nombre de usuario" name="username" value="<?php echo $user->getUsername(); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Email</label>
                                        <div class="col-md-9">
                                            <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $user->getEmail(); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Contraseña</label>
                                        <div class="col-md-9">
                                            <input type="password" class="form-control" placeholder="Contraseña" name="password" value="<?php echo $user->getPassword(); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Roles</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="Roles ej.) rol1 rol2 rol3 ..." name="roles" value="<?php echo implode(", ", $user->getRoles()); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">ID grupo</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="ID del grupo" name="groupID"value="<?php echo implode(", ", $user->getGroup()->getValues()); ?>">
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
    seleccionarMenu('Usuarios');
</script>