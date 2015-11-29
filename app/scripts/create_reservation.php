<?php

require_once __DIR__ . '/../../config/bootstrap.php';

use AppBundle\Entity\Reservation;

//Check usage
if ($argc !== 4) {
    echo "Usage:\n   php ", basename($argv[0]), ' datetime(d-m-yTh-m-s) courtID userID' . PHP_EOL;
    exit();
}

//Create reservation
$reservation = new Reservation(new DateTime($argv[1]));
//Get court (object)
$entityManager = GetEntityManager();
$courtsRepository = $entityManager->getRepository('AppBundle\Entity\Court');
$court = $courtsRepository->find(($argv[2]));
//Add court to reservation (many to one)
$reservation->setCourt($court);
//Get user (object)
$usersRepository = $entityManager->getRepository('AppBundle\Entity\User');
$user = $usersRepository->find(intval($argv[3]));
//Add user to reservation (many to one)
$reservation->setUser($user);

//Add user to BBDD
$entityManager->persist($reservation);
$entityManager->flush();
