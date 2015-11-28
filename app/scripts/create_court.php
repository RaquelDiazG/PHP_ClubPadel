<?php   // app/scripts/create_court.php

require_once __DIR__ . '/../../config/bootstrap.php';

use AppBundle\Entity\Court;

// create Court
$court = new Court(($argc > 1) ? $argv[1] : true);

// add
$em = GetEntityManager();
$em->persist($court);
$em->flush();
