<?php

require_once __DIR__ . '/../../config/bootstrap.php';

//Get all groups
$entityManager = GetEntityManager();
$groupRepository = $entityManager->getRepository('AppBundle\Entity\Group');
$groups = $groupRepository->findAll();

//Print all groups
echo sprintf("  %2s %10s %10s %10s\n", 'Id', 'Name', 'Roles', 'User');
foreach ($groups as $group) {
    echo sprintf("- %2d %10s %10s %10s\n", $group->getId(), $group->getName(), implode(", ", $group->getRoles()), implode(", ", $group->getUser()->getValues()));
}
echo "\nTotal: " . count($groups) . " groups.\n\n";
