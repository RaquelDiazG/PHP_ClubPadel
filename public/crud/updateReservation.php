<?php

require_once __DIR__ . '/../../config/bootstrap.php';

use AppBundle\Entity\Reservation;

$id = $_POST['id'];
$datetime = $_POST['datetime'];
$pistaID = $_POST['pistaID'];
$usuarioID = $_POST['usuarioID'];

//Get reservation (object)
$entityManager = GetEntityManager();
$reservationRepository = $entityManager->getRepository('AppBundle\Entity\Reservation');
$reservation = $reservationRepository->find(intval($id));

//Update reservation (object)
$reservation->setDatetime(new DateTime($datetime));
//Get court (object)
$courtsRepository = $entityManager->getRepository('AppBundle\Entity\Court');
$court = $courtsRepository->find(($pistaID));
//Add court to reservation (many to one)
$reservation->setCourt($court);
//Get user (object)
$usersRepository = $entityManager->getRepository('AppBundle\Entity\User');
$user = $usersRepository->find(intval($usuarioID));
//Add user to reservation (many to one)
$reservation->setUser($user);

//Update reservation in BBDD
$entityManager->flush();

//Redirect
header('Location: ../templates/admin/reservations.php');

