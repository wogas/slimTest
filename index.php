<?php
require 'vendor/autoload.php';
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

//get db framework

use Medoo\Medoo;

$config['displayErrorDetails'] = true;
$app = new Slim\App(["settings"=>$config]);

//setup the view
$container = $app->getContainer();
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig('public', [
        'cache'=>false,
        'debug'=>true,
        'auto_reload'=>true

    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};



$app->get('/contact',function(Request $req, Response $res){
    $this->view->render($res,'contact.twig');
});

$app->post('/sub', function(Request $req, Response $res){
    $parsedBody  = $req->getParsedBody();
    $name = $parsedBody['name'];
    $message = $parsedBody['message'];
    $db = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'testapp',
        'server' => 'localhost',
        'username' => '',
        'password' => '']);

    $stmt = $db->insert('messages',[
        'name'=>$name,
        'message'=>$message
    ]);
    $result = $stmt ? 'data inserted successfully': 'unable to insert data';
    return $this->view->render($res,'sub.twig',['body'=>$parsedBody, 'result'=>$result]);

});


   $app->get('/test', function(Request $client, Response $server) {
      return $this->view->render($server,'index.twig');
   });

$app->get('/register', function(Request $client, Response $server) {
    return $this->view->render($server,'regform.twig');
});

  $app->post('/reg', include "controllers/test.php");

  $app->post('/login', include 'controllers/login.php');

$app->run();