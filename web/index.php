<?php
use models\Session;
use models\ProductRepository;

require 'models/Session.php';
require 'models/ProductRepository.php';

Session::start();
$name = Session::get('name');
$messageSuccess = Session::get('success_message');

$product = new ProductRepository();
$items = $product->showAllProducts();

?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
    <meta name="viewport" content=";=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Моя магазин!</title>
    <link rel="shortcut icon" type="image/png" href="web/media/shopping-bags-icon.png">
    <link rel="stylesheet" href="web/css/styles.css">
	<style>
		img {
			max-width: 300px;
			max-height: 250px;
		}
		.item{
			width: 20em;
			margin-left:40em;
			border: 1px solid #ee0e1e;
			padding-left:2em;
			margin-bottom: 2em;
		}
		
	</style>
  
</head>

<body>
	<div class="page-wrapper">
		<header>
			<nav>
				<div class="logo">
					<img class="shop-logo" alt="Online dhop logo" src="web/media/logo.jpg" width="200" height="200" >
				</div>
				<div>
					<h3>Mагазинът</h3>
				</div>
				<div class="login-register-section">
				  
					<?php if(Session::exist('name')): ?>
						<h3><?=$name?></h3>
						<span><a href="view/templates/profile">Профил/</a></span>
						<span><a href="controllers/Logout">Изход</a></span>'
					<?php  else: ?>
						<span><a href="view/templates/login-register">Вход/Регистрация</a></span>
					<?php  endif; ?>
				 
				</div>
			</nav>
		</header>
		<main>
			<section class="product-section">
				<?php
				if(Session::exist('name')):
				  echo '<div><a href="view/templates/product">Добави продукт</a></div>';
				endif;
				?>
				<div class="product-wrapper">
					<?php foreach($items as $item): ?>
					   <div class='item'>
							<div class='img'>
							   <img src="web/media/<?=$item['images']?>">
							</div>
							<h2><?= $item['prod_name']?></h2>
							<p><?= $item['prod_description']?></p>
							<p>Published at:<?=$item['created_at']?></p>
							<p>Author:<?= $item['first_name']." ".$item['last_name']?></p>
							<button> <a href="">Купи</a> </button>
							<hr>
					   </div>
					<?php endforeach; ?>
				</div>
			</section>
		</main>
	</div>	
</body>
</html>