<?php 
require '../vendor/autoload.php';
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;
				//rotas REST	
require_once "routes/routes.php";

$app->run();