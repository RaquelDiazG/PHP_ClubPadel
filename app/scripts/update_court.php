<?php

require_once __DIR__ . '/../../config/bootstrap.php';

//Check usage
if ($argc !== 3) {
    echo "Usage:\n   php ", basename($argv[0]), ' id active' . PHP_EOL;
    exit();
}

//Get court (object)
$entityManager = GetEntityManager();
$courtRepository = $entityManager->getRepository('AppBundle\Entity\Court');
$court = $courtRepository->find(intval($argv[1]));

//Update court (object)
$court->setActive($argv[2]);

//Update court to BBDD
$entityManager->flush();
