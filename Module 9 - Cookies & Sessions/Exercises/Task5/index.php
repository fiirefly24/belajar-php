<?php

require_once 'SessionLogger.php';

$handler = new SessionLogger();
session_set_save_handler($handler);

session_start();

$_SESSION['user'] = 'Ammad';
echo "Session ID: " . session_id();

?>