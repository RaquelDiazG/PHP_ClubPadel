<?php

require_once __DIR__ . '/../../config/bootstrap.php';

use AppBundle\Entity\Group;

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$roles = $_POST['roles'];

//Get group (object)
$entityManager = GetEntityManager();
$groupRepository = $entityManager->getRepository('AppBundle\Entity\Group');
$group = $groupRepository->find(intval($id));

//Update group (object)
$group->setName($nombre);
$group->setRoles(explode(" ", $roles));

//Update group in BBDD
$entityManager->flush();

//Redirect
header('Location: ../templates/admin/groups.php');

