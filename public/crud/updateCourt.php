<?php

require_once __DIR__ . '/../../config/bootstrap.php';

use AppBundle\Entity\Court;

$id = $_POST['id'];
$disponible = $_POST['disponible'];

//Get court (object)
$entityManager = GetEntityManager();
$courtRepository = $entityManager->getRepository('AppBundle\Entity\Court');
$court = $courtRepository->find(intval($id));

//Update court (object)
$court->setActive($disponible);

//Update to BBDD
$entityManager->flush();

//Redirect
header('Location: ../templates/admin/courts.php');

