<?php

// app/scripts/list_groups.php

require_once __DIR__ . '/../../config/bootstrap.php';

$entityManager = GetEntityManager();

$userRepository = $entityManager->getRepository('AppBundle\Entity\User');
$users = $userRepository->findAll();

echo sprintf("  %2s %10s %20s %10s %20s %10s %10s %10s\n", 'Id', 'Username', 'UsernameCanonical', 'Email', 'EmailCanonical', 'Password', 'Roles', 'Group');
foreach ($users as $user) {
    echo sprintf("- %2d %10s %20s %10s %20s %10s %10s %10s\n", $user->getId(), $user->getUsername(), $user->getUsernameCanonical(), $user->getEmail(), $user->getEmailCanonical(), $user->getPassword(), implode(", ", $user->getRoles()), implode(", ", $user->getGroup()->getValues()));
}

echo "\nTotal: " . count($users) . " courts.\n\n";
