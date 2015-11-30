<?php

require_once __DIR__ . '/../../config/bootstrap.php';

use AppBundle\Entity\Group;

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$roles = $_POST['roles'];
$usuarioID = $_POST['usuarioID'];


//Get group (object)
$entityManager = GetEntityManager();
$groupRepository = $entityManager->getRepository('AppBundle\Entity\Group');
$group = $groupRepository->find(intval($id));

//Update group (object)
$group->setName($nombre);
$group->setRoles(explode(" ", $roles));
//Get user (object)
$usersRepository = $entityManager->getRepository('AppBundle\Entity\User');
$user = $usersRepository->find(intval($usuarioID));
//Add user to group (many to many)
$group->addUser($user);
//Add group to user (many to many)
$user->addGroup($group);

//Update to BBDD
$entityManager->flush();

//Redirect
header('Location: ../templates/admin/groups.php');

