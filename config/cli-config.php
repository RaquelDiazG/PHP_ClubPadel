<?php // config/cli-config.php

use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once __DIR__ . '/../config/bootstrap.php';

$em = GetEntityManager();

return ConsoleRunner::createHelperSet($em);
