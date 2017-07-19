<?php
session_start();
use Medoo\Medoo;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
$test = function(Request $client,Response $server){
    $parsedBody = $client->getParsedBody();
    $username = $parsedBody['username'];
    $pass = $parsedBody['pass'];

    $db = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'testapp',
        'server' => 'localhost',
        'username' => '',
        'password' => '']);
    $stmt= $db->select("appuser",["username","pass"],["username"=>$username]);
    foreach($stmt as $record){
        $user = $record['username'];
        $user_pass = $record['pass'];
    }
    if(password_verify($pass,$user_pass)){
        $_SESSION['user'] = $user;
    }


  return  $this->view->render($server,'index.twig',['username'=>$_SESSION['user']]);

};

return $test;
?>