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
					<h3>Mагазинът</h3>
				</div>
			</nav>
		</header>
		<main>
		<ection class="log-reg-section">
			<h1> Вход/Регистрация </h1>
			<span> Полетата обозначени със звезда са задължителни! </span>
			<div class="user-reg">
				  <h1> Регистрирай се от тук! </h1>
				  <form name="registration" method="post" action="../../controllers/registerController">
				   <div class="fields">
					  <span class="required">&#9734;</span>
					  <label for="firstname"> Име: </label>
					  <input type="text" name="firstname" id="firstname" required>
				   </div>
				   <div class="fields">
					  <span class="required">&#9734;</span>
					  <label for="lastname"> Фамилия: </label>
					  <input type="text" name="lastname" id="lastname" required>
				   </div>
				   <div class="fields">
					  <span class="required">&#9734;</span>
					  <label for="clientemail"> Имейл: </label>
					  <input type="text" name="clientemail" id="clientemail" required>
				   </div>
				   <div class="fields">
					  <span class="required">&#9734;</span>
					  <label for="clientphone"> Tелефон: </label>
					  <input type="text" name="clientphone" id="clientphone" required>
				   </div>
				   <div class="fields">
					  <span class="required">&#9734;</span>
					  <label for="clientpass"> Парола: </label>
					  <input type="password" name="clientpass" id="clientpass" required>
				   </div>
				   <input type="hidden" name="form-name" value="reg">

				   <div class="buttons">
					<button type="submit" name="registration" value="reg">Регистрация </button>
					<input type="reset" value="Изчисти формата">
				   </div>
				  </form>
			</div>  
			<div class="login">
				   <h1> Вход! </h1>
				   <form name="login" method="post" action="../../controllers/registerController">
					<div class="fields">
					  <span class="required">&#9734;</span>
					  <label for="clientemail"> Имейл: </label>
					  <input type="text" name="clientemail" id="clientemail" required>
				   </div>
				   <div class="fields">
					  <span class="required">&#9734;</span>
					  <label for="clientpass"> Парола: </label>
					  <input type="password" name="clientpass" id="clientpass" required>
				   </div>
				   <input type="hidden" name="form-name" value="login">
				   <div class="buttons">
					<button type="submit" name="login" value="login">Вход </button>
					<input type="reset" value="Изчисти формата">
				   </div>
				   <span class="notice-message"><a href="#">Нямате регистрация? Направете го от тук! </a> </span>
				   </form>
			</div>
		</section>
        </main>		
	</div>	
</body>
</html>