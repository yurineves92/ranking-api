<?php

use App\Controllers\RankingController;
use DI\ContainerBuilder;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/database.php';

// Criar o Container do PHP-DI
$containerBuilder = new ContainerBuilder();
$container = $containerBuilder->build();

AppFactory::setContainer($container);
$app = AppFactory::create();

// Registrar o Controller no Container
$container->set(RankingController::class, function () {
    return new RankingController();
});

// Definir as rotas
$app->get('/api/ranking/{movement_id}', [RankingController::class, 'getRanking']);

$app->run();
