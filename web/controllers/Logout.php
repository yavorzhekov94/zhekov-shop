<?php
use models\Session;
use controllers\Redirect;

require '../models/Session.php';
require 'Redirect.php';

Session::start();
session_unset();
session_destroy();
Redirect::toLocation('login-register');