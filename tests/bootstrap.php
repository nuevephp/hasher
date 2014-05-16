<?php
error_reporting(-1);
date_default_timezone_set('UTC');

$vendorPos = strpos(__DIR__, 'vendor/swkz/hasher');
if($vendorPos !== false) {
    // Package has been cloned within another composer package, resolve path to autoloader
    $vendorDir = substr(__DIR__, 0, $vendorPos) . 'vendor/';
    $loader = require $vendorDir . 'autoload.php';
} else {
    // Package itself (cloned standalone)
    $loader = require __DIR__.'/../vendor/autoload.php';
}
