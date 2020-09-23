<?php declare(strict_types=1);

/**
 * The dependency injection container makes each object a Singleton
 */

use CodeBuddies\AppGlobals;
use Slim\Views\PhpRenderer;

$container = $app->getContainer();

$container['julius_portfolio_app_example_code_base_path'] = 'src/zce';



$container['topics'] = new CodeBuddies\TopicsStruct();

// view renderer
$container['view'] = fn($c) => new PhpRenderer('templates/');

// hack match user
$container['codeUser'] = fn($c) => $c['settings']['codeUser'];

// monolog
$container['logger'] = function($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path']));
    return $logger;
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