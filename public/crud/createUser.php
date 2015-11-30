<?php

require_once __DIR__ . '/../../config/bootstrap.php';

use AppBundle\Entity\User;

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$roles = $_POST['roles'];
$groupID = $_POST['groupID'];

//Create User
$user = new User($username, $email, $password, explode(" ", $roles));
//Get group (object)
$entityManager = GetEntityManager();
$groupsRepository = $entityManager->getRepository('AppBundle\Entity\Group');
$group = $groupsRepository->find(intval($groupID));
//Add user to group (many to many)
$user->addGroup($group);

//Add user to BBDD
$entityManager->persist($user);
$entityManager->flush();

//Redirect
header('Location: ../templates/admin/users.php');

