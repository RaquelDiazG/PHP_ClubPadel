<?php

require_once __DIR__ . '/../../config/bootstrap.php';

use AppBundle\Entity\Group;

$nombre = $_POST['nombre'];
$roles = $_POST['roles'];

//Create group
$group = new Group($nombre, explode(" ", $roles));

//Add user to BBDD
$entityManager = GetEntityManager();
$entityManager->persist($group);
$entityManager->flush();

//Redirect
header('Location: ../templates/admin/groups.php');

