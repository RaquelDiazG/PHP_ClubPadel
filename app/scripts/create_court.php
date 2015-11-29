<?php

require_once __DIR__ . '/../../config/bootstrap.php';

use AppBundle\Entity\Court;

//Create court
$court = new Court(($argc > 1) ? $argv[1] : true);

//Add court to BBDD
$entityManager = GetEntityManager();
$entityManager->persist($court);
$entityManager->flush();
