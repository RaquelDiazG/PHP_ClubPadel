<?php

require_once __DIR__ . '/../../config/bootstrap.php';

$id = $_POST['id'];
//Get court (object)
$entityManager = GetEntityManager();
$courtRepository = $entityManager->getRepository('AppBundle\Entity\Court');
$court = $courtRepository->find(intval($id));
//Remove from BBDD
$entityManager->remove($court);
$entityManager->flush();
//Redirect
header('Location: ../templates/admin/courts.php');

