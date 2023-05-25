<?php
use models\Session;
use models\UserRepository;

require '../../models/Session.php';
require_once '../../models/UserRepository.php';

Session::start();
$key = Session::get('key');
$messageSuccess = Session::get('success_message');

$data = new UserRepository();
$userInfo = $data->getUserByKey($key)
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Моя магазин!</title>
    <link rel="shortcut icon" type="image/png" href="../../web/media/shopping-bags-icon.png">
    <link rel="stylesheet" href="../../web/css/styles.css">
  
</head>

<body>
	<div class="page-wrapper">
		<header>
			<nav>
				<div class="logo">
					<a href="../../index"><img class="shop-logo" alt="Online dhop logo" src="../../web/media/logo.jpg" width="200" height="200" ></a>
				</div>
				<div>
					<h3>Mагазина на Яжуу</h3>
				</div>
				<div>
				   <a href="../../controllers/Logout">Изход</a>
				</div>
			</nav>
		</header>
		<main>
			<section class="add-product">
                <h3>Добави Продукт</h3>
                <form action="../../controllers/Upload" method = "post" enctype="multipart/form-data" >
                   <div class="fields">
					  <span class="required">&#9734;</span>
					  <label for="firstname"> Име: </label>
					  <input type="text" name="product-name" id="firstname" required>
				   </div>
				   <div class="fields">
					  <span class="required">&#9734;</span>
					  <label for="description"> Описание: </label>
					  <textarea  name="description" id="description" required> </textarea>
				   </div>
				   <div class="fields">
					  <label for="clientemail"> Изображение: </label>
					  <input type="file" name="product">
				   </div>
                   <div class="buttons">
					<button type="submit" name="upload" value="upload">Добави Продукт </button>
					<input type="reset" value="Изчисти формата">
				   </div>
                </form>
            </section>
        </main>		
	</div>	
</body>
</html>