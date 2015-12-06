<?php

require_once __DIR__ . '/../../config/bootstrap.php';

//Get all reservations
$entityManager = GetEntityManager();
$reservationRepository = $entityManager->getRepository('AppBundle\Entity\Reservation');
$reservations = $reservationRepository->findAll();

//Print all reservations
echo sprintf("  %2s %20s %10s %10s\n", 'Id', 'Datetime', "Court", 'User');
foreach ($reservations as $reservation) {
    echo sprintf("- %2d %20s %10s %10s\n", $reservation->getId(), $reservation->getDatetime()->format('d-m-Y H:i:s'), $reservation->getCourt(), $reservation->getUser());
}
echo "\nTotal: " . count($reservations) . " courts.\n\n";
