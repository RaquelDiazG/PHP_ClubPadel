<?php

require_once __DIR__ . '/../../config/bootstrap.php';

use AppBundle\Entity\Reservation;

$datetime = $_POST['datetime'];
$pistaID = $_POST['pistaID'];
$usuarioID = $_POST['usuarioID'];

//Create reservation
$reservation = new Reservation(new DateTime($datetime));
//Get court (object)
$entityManager = GetEntityManager();
$courtsRepository = $entityManager->getRepository('AppBundle\Entity\Court');
$court = $courtsRepository->find(($pistaID));
//Add court to reservation (many to one)
$reservation->setCourt($court);
//Get user (object)
$usersRepository = $entityManager->getRepository('AppBundle\Entity\User');
$user = $usersRepository->find(intval($usuarioID));
//Add user to reservation (many to one)
$reservation->setUser($user);

//Add reservation to BBDD
$entityManager->persist($reservation);
$entityManager->flush();

//Redirect
header('Location: ../templates/admin/reservations.php');

