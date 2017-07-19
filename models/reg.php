<?php
use Medoo\Medoo;
$db_credentials = [
    'database_type' => 'mysql',
    'database_name' => 'testapp',
    'server' => 'localhost',
    'username' => '',
    'password' => ''
];
/*if(is_array($_POST)){
    for($i = 0; $i < count($_POST); $i++){
        $each = $_POST[$i];
        if(empty($each)){
            echo "All fields are required";
            return;
        }else{
            $pass = password_hash($_POST['pass'],PASSWORD_DEFAULT);
            $db = new Medoo($db_credentials);

            $username_email = $db->select('appusers',['username','email'],
                ['username'=> $_POST['username']] );
            if($username_email[0]['username'] != ''){
                echo "username has been taken";
                return;
            }elseif($username_email[0]['email'] !=''){
                echo "Email already exists";
                return;
            }else{
                $new_data =$db->insert('appusers',[
                    'fname'=>$_POST['fname'],
                    'lname'=>$_POST['lname'],
                    'username'=>$_POST['username'],
                    'email'=>$_POST['email'],
                    'pass'=>$pass
                ]);
                if($new_data){
                    echo "you are successfully registered";
                }
            }
        }
    }
}
*/
//print_r($_POST);
$username = $_POST['username'];
$pass = $_POST['pass'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];

$db = new Medoo($db_credentials);
$stmt = $db->insert('appusers',[
    'fname'=>$fname,
    'lname'=>$lname,
    'username'=>$username,
    'email'=>$email,
    'pass'=>$pass
]);

if($stmt){
    echo 'data inserted';
}
