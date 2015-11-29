<?php

// app/scripts/create_court.php

require_once __DIR__ . '/../../config/bootstrap.php';

use AppBundle\Entity\User;

//Check usage
if ($argc !== 6) {
    echo "Usage:\n   php ", basename($argv[0]), ' username email password roles groupID' . PHP_EOL;
    exit();
}
//Create User
$user = new User($argv[1], $argv[2], $argv[3], explode(" ", $argv[4]));
//Get group (object)
$em = GetEntityManager();
$groupsRepository = $em->getRepository('AppBundle\Entity\Group');
$group = $groupsRepository->find(intval($argv[5]));
//Add user to group (many to many)
$user->addGroup($group);

//Add user to BBDD
$em->persist($user);
$em->flush();
