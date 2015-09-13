<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/AppCore.php';
//print_r(__DIR__ . '/../app/AppCore.php');die;
require_once __DIR__ . '/../vendor/Component/component_init.php';

$appCore = new AppCore('dev', false, 'cli');
$application = new \App\Component\Core\SystemConsoleCore($appCore);
$application->run($argv);

