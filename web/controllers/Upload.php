<?php
use models\Session;
use models\Input;
use controllers\Redirect;
use models\Product;

require_once '../models/Input.php';
require_once '../models/Session.php';
require 'Redirect.php';
require '../models/Product.php';

Session::start();
$id = Session::get('key');

$productName = Input::getPostValue('product-name');
$description = Input::getPostValue('description');

//get image name and make it unique
$file = Input::getFileData('product');
$strtotime = strtotime("now");
$fileName = !empty($file) ? $strtotime.'_'.$file['name'] : "";
$tempName = !empty($file) ? $file['tmp_name'] : "";
$path = '../web/media/'.$fileName;


//create array to pass to insert function
$data = [];
$data["productname"] = $productName;
$data["description"] = $description;
$data["filename"] = $fileName;

$product = new Product($id);
if (Input::inputExist('upload')) {
    try{
        if(!empty($fileName)) {
            $product->moveImageToFolder($tempName, $path);
        }
        $product->insertProductData($data);
        Redirect::toLocation('index');
        //Code
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
}
else {
    //code
}