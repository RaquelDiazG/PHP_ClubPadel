<?php

require_once __DIR__ . '/../../config/bootstrap.php';

//Check usage
if ($argc !== 5) {
    echo "Usage:\n   php ", basename($argv[0]), ' id datetime(d-m-yTh-m-s) courtID userID' . PHP_EOL;
    exit();
}

//Get reservation (object)
$entityManager = GetEntityManager();
$reservationRepository = $entityManager->getRepository('AppBundle\Entity\Reservation');
$reservation = $reservationRepository->find(intval($argv[1]));

//Update reservation (object)
$reservation->setDatetime(new DateTime($argv[2]));
//Get court (object)
$courtsRepository = $entityManager->getRepository('AppBundle\Entity\Court');
$court = $courtsRepository->find(($argv[3]));
//Add court to reservation (many to one)
$reservation->setCourt($court);
//Get user (object)
$usersRepository = $entityManager->getRepository('AppBundle\Entity\User');
$user = $usersRepository->find(intval($argv[4]));
//Add user to reservation (many to one)
$reservation->setUser($user);

//Update reservation to BBDD
$entityManager->flush();
