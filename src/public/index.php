<?php

// Hide PHP version.
header_remove("X-Powered-By");

// Set the timezone.
date_default_timezone_set('Europe/London');

// Require the Composer autoloader.
require __DIR__ . '/../../vendor/autoload.php';

// Run the application.
$app = new Air\Website\Application;
$app->run();
