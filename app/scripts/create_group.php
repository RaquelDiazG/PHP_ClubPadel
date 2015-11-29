<?php

// app/scripts/create_court.php

require_once __DIR__ . '/../../config/bootstrap.php';

use AppBundle\Entity\Group;

//Check usage
if ($argc !== 4) {
    echo "Usage:\n   php ", basename($argv[0]), ' nombre roles userID' . PHP_EOL;
    exit();
}
//Create Group
$group = new Group($argv[1], explode(" ", $argv[2]));
//Get user (object)
$em = GetEntityManager();
$usersRepository = $em->getRepository('AppBundle\Entity\User');
$user = $usersRepository->find(intval($argv[3]));
//Add user to group (many to many)
$group->addUser($user);
//Add group to user (many to many)
$user->addGroup($group);
//Add user to BBDD
$em->persist($group);
$em->flush();
