<?php
if (!empty($_COOKIE['sid'])) {session_id($_COOKIE['sid']);}
session_start();
require_once 'classes/Auth.class.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<meta http-equiv='content-type' content='text/html; charset=utf-8' />
<title>Регистрация на сайте</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="noindex, nofollow">
<link rel="stylesheet" href="css/main.css">
</head>

<body>
<h1>Регистрация нового пользователя</h1>
<div class="mydiv">
<form class="form-signin ajax" method="post" action="ajax.php">
<p class="zag">Регистрация</p>
<div class="main-error alert alert-error hide"></div>
<input name="username" type="text" class="input-block-level" placeholder="E-mail" autofocus>
<input name="names" type="text" class="input-block-level" placeholder="Имя">
<input name="password1" type="password" class="input-block-level" placeholder="Пароль">
<input name="password2" type="password" class="input-block-level" placeholder="Повтор пароля">
<input type="hidden" name="act" value="register">
<input class="button" id="regsubmit" type="submit" value="Регистрация">
</form>
<p class="reg"><a href="index.html">Авторизация</a></p>
</div>
<script type="text/javascript" src="jquery-3.6.0.min.js"></script><script type="text/javascript" src="ajax-form.js"></script></body></html>