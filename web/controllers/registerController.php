<?php
use models\User;
use models\Session;
use models\Input;
use controllers\Redirect;

require '../models/User.php';
require_once '../models/Input.php';
require_once '../models/Session.php';
require 'Redirect.php';

$firstName = Input::getPostValue('firstname');
$lastName = Input::getPostValue('lastname');
$email = Input::getPostValue('clientemail');
$phone = Input::getPostValue('clientphone');
$pass = Input::getPostValue('clientpass');
$formName = Input::getPostValue('form-name');

$user = new User();

//hash password
$securePass = $user->getSecurePass($pass);
//User full name
$fullname = $user->getFullname($firstName, $lastName);


if ($formName === 'reg') {
  $args = array(
    "firstname" => $firstName,
    "lastname" => $lastName,
    "clientemail" => $email,
    "phone" => $phone,
    "pass" => $securePass
    );

  try {
    $user->registerUser($args);
    echo '<div> Успешна регистрация. Върнете се назад и опитайте да си влезете в профила! </div';
  } catch (Exception $e) {
       echo 'Caught exception: ',  $e->getMessage(), "\n";        
  }

}
elseif ($formName === "login") {
  try {
    $user->loginUser($email, $pass);
    Redirect::toLocation('index');
  } catch (Exception $e){
       echo 'Caught exception: ',  $e->getMessage(), "\n";
  }

}
