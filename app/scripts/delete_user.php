<?php

require_once __DIR__ . '/../../config/bootstrap.php';

//Check usage
if ($argc !== 2) {
    echo "Usage:\n   php ", basename($argv[0]), ' id' . PHP_EOL;
    exit();
}

//Get user (object)
$entityManager = GetEntityManager();
$userRepository = $entityManager->getRepository('AppBundle\Entity\User');
$user = $userRepository->find(intval($argv[1]));

//Remove user from BBDD
$entityManager->remove($user);
$entityManager->flush();
