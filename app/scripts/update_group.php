<?php

require_once __DIR__ . '/../../config/bootstrap.php';

//Check usage
if ($argc !== 5) {
    echo "Usage:\n   php ", basename($argv[0]), ' id nombre roles userID' . PHP_EOL;
    exit();
}

//Get group (object)
$entityManager = GetEntityManager();
$groupRepository = $entityManager->getRepository('AppBundle\Entity\Group');
$group = $groupRepository->find(intval($argv[1]));

//Update group (object)
$group->setName($argv[2]);
$group->setRoles(explode(" ", $argv[3]));
//Get user (object)
$usersRepository = $entityManager->getRepository('AppBundle\Entity\User');
$user = $usersRepository->find(intval($argv[4]));
//Add user to group (many to many)
$group->addUser($user);
//Add group to user (many to many)
$user->addGroup($group);

//Update from BBDD
$entityManager->flush();
