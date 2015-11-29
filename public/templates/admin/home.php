
<?php include("head.php"); ?>

<?php
require_once __DIR__ . '/../../../config/bootstrap.php';

$entityManager = GetEntityManager();
//Courts
$courtRepository = $entityManager->getRepository('AppBundle\Entity\Court');
$numCourts = count($courtRepository->findAll());
//Groups
$groupRepository = $entityManager->getRepository('AppBundle\Entity\Group');
$numGroups = count($groupRepository->findAll());
//Reservations
$reservationRepository = $entityManager->getRepository('AppBundle\Entity\Reservation');
$numReservations = count($reservationRepository->findAll());
//Users
$userRepository = $entityManager->getRepository('AppBundle\Entity\User');
$numUsers = count($userRepository->findAll());
?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            Home
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
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-light blue-soft" href="javascript:;">
                    <div class="visual">
                        <i class="fa fa-list"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <?php echo $numCourts ?>
                        </div>
                        <div class="desc">
                            Courts
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-light red-soft" href="javascript:;">
                    <div class="visual">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <?php echo $numUsers ?>
                        </div>
                        <div class="desc">
                            Users
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-light green-soft" href="javascript:;">
                    <div class="visual">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <?php echo $numGroups ?>
                        </div>
                        <div class="desc">
                            Groups
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-light purple-soft" href="javascript:;">
                    <div class="visual">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <?php echo $numReservations ?>
                        </div>
                        <div class="desc">
                            Reservations
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->

<?php include("footer.php"); ?>
