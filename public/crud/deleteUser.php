<?php

require_once __DIR__ . '/../../config/bootstrap.php';

$id = $_POST['id'];
//Get user (object)
$entityManager = GetEntityManager();
$userRepository = $entityManager->getRepository('AppBundle\Entity\User');
$user = $userRepository->find(intval($id));
//Remove from BBDD
$entityManager->remove($user);
$entityManager->flush();
//Redirect
header('Location: ../templates/admin/users.php');

