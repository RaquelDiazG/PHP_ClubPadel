<?php

require_once __DIR__ . '/../../config/bootstrap.php';

//Check usage
if ($argc !== 2) {
    echo "Usage:\n   php ", basename($argv[0]), ' id' . PHP_EOL;
    exit();
}

//Get group (object)
$entityManager = GetEntityManager();
$groupRepository = $entityManager->getRepository('AppBundle\Entity\Group');
$group = $groupRepository->find(intval($argv[1]));

//Remove from BBDD
$entityManager->remove($group);
$entityManager->flush();
