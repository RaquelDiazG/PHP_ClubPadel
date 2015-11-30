<?php

require_once __DIR__ . '/../../config/bootstrap.php';

use AppBundle\Entity\Group;

$nombre = $_POST['nombre'];
$roles = $_POST['roles'];
$usuarioID = $_POST['usuarioID'];

//Create group
$group = new Group($nombre, explode(" ", $roles));
//Get user (object)
$entityManager = GetEntityManager();
$usersRepository = $entityManager->getRepository('AppBundle\Entity\User');
$user = $usersRepository->find(intval($usuarioID));
//Add user to group (many to many)
$group->addUser($user);
//Add group to user (many to many)
$user->addGroup($group);

//Add user to BBDD
$entityManager->persist($group);
$entityManager->flush();

//Redirect
header('Location: ../templates/admin/groups.php');

