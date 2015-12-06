<?php

require_once __DIR__ . '/../../config/bootstrap.php';

//Check usage
if ($argc !== 2) {
    echo "Usage:\n   php ", basename($argv[0]), ' id' . PHP_EOL;
    exit();
}

//Get reservation (object)
$entityManager = GetEntityManager();
$reservationRepository = $entityManager->getRepository('AppBundle\Entity\Reservation');
$reservation = $reservationRepository->find(intval($argv[1]));

//Remove reservation from BBDD
$entityManager->remove($reservation);
$entityManager->flush();
