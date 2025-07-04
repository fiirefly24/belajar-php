<?php

require_once 'Container.php';
require_once 'Logger.php';

$container = new Container();

// Bind 'logger' to a closure that returns a new Logger
$container->bind('logger', fn() => new Logger());

// Resolve logger from container
$logger = $container->make('logger');
$logger->log("App started");

// You can bind anything!
$container->bind('config', fn() => parse_ini_file('app.ini'));
?>