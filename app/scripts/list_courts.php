<?php

require_once __DIR__ . '/../../config/bootstrap.php';

//Get all courts
$entityManager = GetEntityManager();
$courtRepository = $entityManager->getRepository('AppBundle\Entity\Court');
$courts = $courtRepository->findAll();

//Print all courts
echo sprintf("  %2s: %10s\n", 'Id', 'Active:');
foreach ($courts as $court) {
    echo sprintf("- %2d: %10s\n", $court->getId(), ($court->getActive() ? 'true' : 'false'));
}
echo "\nTotal: " . count($courts) . " courts.\n\n";
