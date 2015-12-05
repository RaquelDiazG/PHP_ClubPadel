<?php

require_once __DIR__ . '/../../config/bootstrap.php';

use AppBundle\Entity\Group;

//Check usage
if ($argc !== 4) {
    echo "Usage:\n   php ", basename($argv[0]), ' nombre roles' . PHP_EOL;
    exit();
}

//Create group
$group = new Group($argv[1], explode(" ", $argv[2]));

//Add user to BBDD
$entityManager = GetEntityManager();
$entityManager->persist($group);
$entityManager->flush();
