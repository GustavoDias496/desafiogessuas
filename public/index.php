<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Gustavodias\Desafiogessuas\controller\PeopleController;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ .'/../');
$dotenv->load();

require_once __DIR__ . '/../src/routes/routes.php';