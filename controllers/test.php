<?php
use Medoo\Medoo;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
$test = function(Request $client,Response $server){
       $parsedBody = $client->getParsedBody();
       $fname = $parsedBody['fname'];
       $lname = $parsedBody['lname'];
       $username = $parsedBody['username'];
       $email = $parsedBody['email'];
       $pass = $parsedBody['pass'];
       $db = new Medoo([
          'database_type' => 'mysql',
          'database_name' => 'testapp',
          'server' => 'localhost',
          'username' => '',
          'password' => '']);

      $pass = password_hash($pass, PASSWORD_DEFAULT);

      $stmt = $db->insert('appusers',[
            'lname'=> $lname,
            'fname'=> $fname,
            'username'=>$username,
             'pass'=> $pass,
             'email'=> $email

      ]);

      $result = $stmt ? 'Account created successfully': 'unable to create account';
      return $this->view->render($server,'reg.twig',['result'=>$result]);

  };

return $test;
?>