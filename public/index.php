<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Gustavodias\Desafiogessuas\config\Database;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ .'/../');
$dotenv->load();