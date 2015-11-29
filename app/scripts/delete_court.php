<?php

require_once __DIR__ . '/../../config/bootstrap.php';

//Check usage
if ($argc !== 2) {
    echo "Usage:\n   php ", basename($argv[0]), ' id' . PHP_EOL;
    exit();
}

//Get court (object)
$entityManager = GetEntityManager();
$courtRepository = $entityManager->getRepository('AppBundle\Entity\Court');
$court = $courtRepository->find(intval($argv[1]));

//Remove from BBDD
$entityManager->remove($court);
$entityManager->flush();
