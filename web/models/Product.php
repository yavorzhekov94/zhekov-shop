<?php
declare(strict_types=1);

namespace models;

use Exception;

require 'Connection.php';

 
 /**
  * Product
  */
 class Product extends Connection {
    
    /**
     * id
     *
     * @var int
     */
    private $id;
    
    /**
     * __construct
     *
     * @param  int $id
     * @return void
     */
    public function __construct($id) {
     $this->id = $id;
    }
    
    /**
     * insertProductData
     *
     * @param  array $data
     */
    public function insertProductData(array $data) {
        $dateToday = date('Y-m-d H:i:s');
		
		$sqlData = "INSERT INTO products(users_id, prod_name, prod_description, images, created_at) VALUES('".$this->id."','".$data['productname']."','".$data['description']."','".$data['filename']."','".$dateToday."')";
		
		$result = $this->getConnection()->query($sqlData);
		
		if (!$result)  {
            throw new Exception('Записът не може да бъде добавен в базата данни');
        }
		return $result;
    }
        
    /**
     * moveImageToFolder
     *
     * @param  mixed $tempname
     * @param  mixed $folder
     */
    public function moveImageToFolder($tempname, $folder) {
        $result = move_uploaded_file($tempname, $folder);
        if (!$result){
            throw new Exception('Снимката не може да бъде запазена в тази папка!Опитайте отново');
        }
        return $result;
    }

 }