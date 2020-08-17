<?php

use CodeBuddies\AppGlobals;

$container = $app->getContainer();

// view renderer
$container['view'] = function($c) {
    return new \Slim\Views\PhpRenderer('templates/');
};

// monolog
$container['logger'] = function($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path']));
    return $logger;
};

// code buddies user
$container['codeUser'] = function($c) {
    return $c['settings']['codeUser'];
};

// local db
if(AppGlobals::isLocal()) $container['dbLocal'] = fn($c) => dbHackMatch($c);
// CloudSQL db
else $container['dbProduction'] = fn($c) => dbHackMatch($c, 'dbCloud', true);

function dbHackMatch($c, string $dbSetting = 'dbLocal', $cloud = false): PDO {
    $db = $c['settings'][$dbSetting];
    [$n, $h, $u, $p] = [$db['dbname'], $db['host'], $db['user'], $db['pass']];
    $x = 'mysql:dbname=%s;' . ($cloud ? 'unix_socket=/cloudsql/%s' : 'host=%s');
    return new PDO(sprintf($x, $n, $h), $u, $p, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
}