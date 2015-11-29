<?php

// app/scripts/create_court.php

require_once __DIR__ . '/../../config/bootstrap.php';

use AppBundle\Entity\Reservation;

//Check usage
if ($argc !== 4) {
    echo "Usage:\n   php ", basename($argv[0]), ' datetime(d-m-yTh-m-s) courtID userID' . PHP_EOL;
    exit();
}
// create Reservation
$reservation = new Reservation(new DateTime($argv[1]));
//Get court (object)
$em = GetEntityManager();
$courtsRepository = $em->getRepository('AppBundle\Entity\Court');
$court = $courtsRepository->find(($argv[2]));
//Add court to reservation (many to one)
$reservation->setCourt($court);
//Get user (object)
$usersRepository = $em->getRepository('AppBundle\Entity\User');
$user = $usersRepository->find(intval($argv[3]));
//Add user to reservation (many to one)
$reservation->setUser($user);
//Add user to BBDD
$em->persist($reservation);
$em->flush();
