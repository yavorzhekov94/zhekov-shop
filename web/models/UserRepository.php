<?php
declare(strict_types=1);

namespace models;
use models\Connection;

require 'Connection.php';

/**
 * UserRepository
 */
class UserRepository extends Connection
{
    public $row;
    
       
    /**
     * getUserByKey
     *
     * @param  int $key
     * @return array
     */
    public function getUserByKey(int $key): array
    {
        $sqlData = "SELECT * FROM users WHERE id=$key";
        $result = $this->getConnection()->query($sqlData);
        if($result){
            $this->row = $result->fetch_assoc();
        }
        return $this->row;
    }
}