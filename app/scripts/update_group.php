<?php

require_once __DIR__ . '/../../config/bootstrap.php';

//Check usage
if ($argc !== 4) {
    echo "Usage:\n   php ", basename($argv[0]), ' id nombre roles' . PHP_EOL;
    exit();
}

//Get group (object)
$entityManager = GetEntityManager();
$groupRepository = $entityManager->getRepository('AppBundle\Entity\Group');
$group = $groupRepository->find(intval($argv[1]));

//Update group (object)
$group->setName($argv[2]);
$group->setRoles(explode(" ", $argv[3]));

//Update group to BBDD
$entityManager->flush();
