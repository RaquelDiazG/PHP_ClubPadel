<?php

require_once __DIR__ . '/../../config/bootstrap.php';

$id = $_POST['id'];
//Get group (object)
$entityManager = GetEntityManager();
$groupRepository = $entityManager->getRepository('AppBundle\Entity\Group');
$group = $groupRepository->find(intval($id));
//Remove from BBDD
$entityManager->remove($group);
$entityManager->flush();
//Redirect
header('Location: ../templates/admin/groups.php');

