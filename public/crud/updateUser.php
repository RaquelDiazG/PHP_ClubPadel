<?php

require_once __DIR__ . '/../../config/bootstrap.php';

use AppBundle\Entity\User;

$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$roles = $_POST['roles'];
$groupID = $_POST['groupID'];

//Get user (object)
$entityManager = GetEntityManager();
$userRepository = $entityManager->getRepository('AppBundle\Entity\User');
$user = $userRepository->find(intval($id));

//Update user (object)
$user->setUsername($username);
$user->setUsernameCanonical(strtolower($username));
$user->setEmail($email);
$user->setEmailCanonical(strtolower($email));
$user->setPassword($password);
$user->setRoles(explode(" ", $roles));
//Get group (object)
$groupsRepository = $entityManager->getRepository('AppBundle\Entity\Group');
$group = $groupsRepository->find(intval($groupID));
//Add user to group (many to many)
$user->addGroup($group);

//Update user in BBDD
$entityManager->flush();

//Redirect
header('Location: ../templates/admin/users.php');

