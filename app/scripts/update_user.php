<?php

require_once __DIR__ . '/../../config/bootstrap.php';

//Check usage
if ($argc !== 7) {
    echo "Usage:\n   php ", basename($argv[0]), ' id username email password roles groupID' . PHP_EOL;
    exit();
}

//Get court (object)
$entityManager = GetEntityManager();
$userRepository = $entityManager->getRepository('AppBundle\Entity\User');
$user = $userRepository->find(intval($argv[1]));

//Update court (object)
$user->setUsername($argv[2]);
$user->setUsernameCanonical(strtolower($argv[2]));
$user->setEmail($argv[3]);
$user->setEmailCanonical(strtolower($argv[3]));
$user->setPassword($argv[4]);
$user->setRoles(explode(" ", $argv[5]));

//Get group (object)
$groupsRepository = $entityManager->getRepository('AppBundle\Entity\Group');
$group = $groupsRepository->find(intval($argv[6]));
//Add user to group (many to many)
$user->addGroup($group);

//Update from BBDD
$entityManager->flush();
