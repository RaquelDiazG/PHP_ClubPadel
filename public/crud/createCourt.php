<?php

require_once __DIR__ . '/../../config/bootstrap.php';

use AppBundle\Entity\Court;

$disponible = isset($_POST['disponible']) ? $_POST['disponible'] : false;

//Create court
$court = new Court($disponible);

//Add court to BBDD
$entityManager = GetEntityManager();
$entityManager->persist($court);
$entityManager->flush();

//Redirect
header('Location: ../templates/admin/courts.php');

