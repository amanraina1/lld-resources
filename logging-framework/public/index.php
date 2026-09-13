<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/helpers.php';

use App\Core\LoggerImplementation;

$logger = new LoggerImplementation("logger", true);
$logger->debug("This is the test log in the console");