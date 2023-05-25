<?php
declare(strict_types=1);
namespace models;

/**
 * Session
 */
class Session 
{
   public static $_isStarted = false;
      
   /**
    * start
    *
    * @return void
    */
   public static function start()
   {
       if (self::$_isStarted == false) {
        self::$_isStarted = true;
        return session_start();
       }
        
   }
   

   /**
    * exist
    *
    * @param  mixed $key
    * @return bool
    */
   public static function exist($key): bool
   {
	    return array_key_exists($key, $_SESSION);
   }
   
   /**
    * set
    *
    * @param  mixed $key
    * @param  mixed $name
    * @return void
    */
   public static  function set($key, $name){
	     $_SESSION[$key] = $name;

   }
   
   /**
    * get
    *
    * @param  mixed $name
    * @return string
    */
   public static function get($name): mixed {
       if (self::exist($name)){
        return $_SESSION[$name];
       }
       else{
        return "";
       } 
       
   }   
   /**
    * delete
    *
    * @param  mixed $key
    * @return void
    */
   public static function delete($name) {
    if (self::exist($name)){
      unset($_SESSION[$name]);
    }
   }
    
}