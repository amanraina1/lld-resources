<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/helpers.php';

use App\Core\LoggerImplementation;

$logging = new LoggerImplementation("logger", true);
$logging->debug("This is the test log in the console");