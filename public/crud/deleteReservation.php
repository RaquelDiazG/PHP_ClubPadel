<?php

require_once __DIR__ . '/../../config/bootstrap.php';

$id = $_POST['id'];
//Get reservation (object)
$entityManager = GetEntityManager();
$reservationRepository = $entityManager->getRepository('AppBundle\Entity\Reservation');
$reservation = $reservationRepository->find(intval($id));
//Remove from BBDD
$entityManager->remove($reservation);
$entityManager->flush();
//Redirect
header('Location: ../templates/admin/reservations.php');

