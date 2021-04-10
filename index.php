<?php
require_once 'classes/Auth.class.php';
require_once 'stayt.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8">
<title>Главная страница</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript" src="jquery-3.6.0.js"></script>
<link rel="stylesheet" href="css/main.css">
</head>
<body style="background: white;">
<h1>Главная страница</h1> 
<div class="mydiv"><form class="form-signin ajax" method="post" action="ajax.php">
<p class="zag">Авторизация</p>
<div class="main-error alert alert-error hide"></div>
<span class="testex">Введите E-mail</span><br />
<input name="username" type="text" class="input-block-level"><br />
<span class="testex">Введите пароль</span><br />
<input name="password" type="password" class="input-block-level"><br />
<input type="hidden" name="act" value="login">
<input type="submit" class="button"  value="Войти" onclick="goto()"/>
</form>
<br><p></p>
<script>
function goto(){
setTimeout(() => {  document.location.href = "author.php"; }, 2000);
}
</script>
<script type="text/javascript" src="ajax-form.js"></script></body></html>