<?php
use models\User;
use models\Session;
use models\Input;
use controllers\Redirect;

require '../models/User.php';
require_once '../models/Session.php';
require_once '../models/Input.php';
require 'Redirect.php';

$args = array();
$user = new User();

$buttonValue = Input::getPostValue('edit');

if ($buttonValue === "edit-info"){
    $firstName = Input::getPostValue('first-tname');
    $lastName = Input::getPostValue('last-name');
    $email = Input::getPostValue('clientemail');
    $phone =Input::getPostValue('client-phone');
    $args = array(
        "firstname" => $firstName,
        "lastname" => $lastName,
        "clientemail" => $email,
        "phone" => $phone,
        "buttonValue" => $buttonValue
        );

}
elseif($buttonValue === "edit-pass"){
    $oldPass = Input::getPostValue('old-pass');
    $newPass = Input::getPostValue('new-pass');
    $newSecurePass = $user->getSecurePass($newPass);
    $args = array(
        "old-pass" => $oldPass,
        "new-pass" => $newPass,
        "new-secure-pass" => $newSecurePass,
        "buttonValue" => $buttonValue
        );
}
else{
    //Code
}
try {
    $user->updateUserInfo($args);
    Redirect::toLocation('profile');

} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}