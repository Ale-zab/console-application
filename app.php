<?php 

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Symfony\Component\Console\Application;
$application = new Application();
$application->add(new \App\SayHello());
$application->run();