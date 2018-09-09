<?php

// This file is required by Doctrine CLI

require_once __DIR__ . '/vendor/autoload.php';

use DefShop\Adapter\App\DIC;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

$settings = require __DIR__ . '/configs/settings.php';

$container = new DIC($settings);
$container->initDoctrine();

ConsoleRunner::run(
    ConsoleRunner::createHelperSet($container->get(EntityManager::class))
);
