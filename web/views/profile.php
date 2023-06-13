<?php
use app\models\Session;
use app\models\UserRepository;

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
			<div class="success-message">
				<?php if(Session::exist('success_message')): ?>
					<span><?= $messageSuccess ?></span>
					<?= Session::delete('success_message'); ?>
				<?php endif; ?>
			</div>
			<section style="display:flex;">
				<div class="general-info">
					<h3>Обща информация</h3>
					<form name="profile" method="post" action="../../controllers/UpdateUserInfo">
						<div class="fields">
							<span class="required">&#9734;</span>
							<label for="firstname"> Име: </label>
							<input type="text" name="first-tname" id="first-name" value="<?=$userInfo['first_name']?>" required>
						</div>
						<div class="fields">
							<span class="required">&#9734;</span>
							<label for="lastname"> Фамилия: </label>
							<input type="text" name="last-name" id="last-name" value="<?=$userInfo['last_name']?>" required>
						</div>
						<div class="fields">
							<span class="required">&#9734;</span>
							<label for="clientemail"> Имейл: </label>
							<input type="text" name="clientemail" id="client-email" value="<?=$userInfo['email']?>" required>
						</div>
						<div class="fields">
							<span class="required">&#9734;</span>
							<label for="clientphone"> Tелефон: </label>
							<input type="text" name="client-phone" id="client-phone" value="<?=$userInfo['phone']?>" required>
						</div>
						<div class="buttons">
							<button type="submit" name="edit" value="edit-info">Редактирай </button>
							<input type="reset" value="Изчисти формата">
						</div>
					</form>
				</div>
				
				<div class="pass-change">
					<form method ="post" action="../../controllers/UpdateUserInfo">
						<div class="fields">
							<span class="required">&#9734;</span>
							<label for="firstname"> Въведи текущата парола: </label>
							<input type="password" name="old-pass" id="old-pass" required>
						</div>
						<div class="fields">
							<span class="required">&#9734;</span>
							<label for="lastname"> Въведи новата парола: </label>
							<input type="password" name="new-pass" id="new-pass" required>
						</div>
						<div class="buttons">
							<button type="submit" name="edit" value="edit-pass">Смени паролата</button>
							<input type="reset" value="Изчисти формата">
						</div>
					</form>
				</div>
				<div class="address">
					<p><a href="">Добави адрес</a></p>
				</div>
			</section>
        </main>		
	</div>	
</body>
</html>