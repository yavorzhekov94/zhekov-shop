<?php

namespace controllers;

class Redirect
 {
    public static function toLocation($location) {
        if($location){
            if($location === "login-register" || $location === "profile") {
               return header('Location: '.'../view/templates/'.$location);
            }
           return header('Location: '.'../'.$location);
        }
    }
}