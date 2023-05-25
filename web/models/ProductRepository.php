<?php
declare(strict_types=1);

namespace models;
use models\Connection;

require 'Connection.php';

/**
 * Product
 */
class ProductRepository extends Connection
{    
    /**
     * row
     *
     * @var mixed
     */
    public $row;

        
    /**
     * showAllProducts
     *
     * @return array
     */
    public function showAllProducts(): array
    {
        $data=[];
        $sqlData = "SELECT products.prod_name, products.prod_description, products.images, products.created_at, users.first_name, users.last_name FROM products INNER JOIN users ON products.users_id = users.id";
        $result = $this->getConnection()->query($sqlData);
        if($result){
            while($this->row = $result->fetch_assoc()){
                $data[] = $this->row;
            }
        }
        return $data;
    }
}