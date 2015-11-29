<?php

require_once __DIR__ . '/../../config/bootstrap.php';

use AppBundle\Entity\Court;

$disponible = $_POST['disponible'];

//Create court
$court = new Court($disponible);

//Add court to BBDD
$entityManager = GetEntityManager();
$entityManager->persist($court);
$entityManager->flush();

//Redirect
header('Location: ../templates/admin/courts.php');

