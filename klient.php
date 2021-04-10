<?php
require_once 'classes/Auth.class.php';
require_once 'stayt.php';

$string = date("H:i:s",$int);
$int= mt_rand($string,1262055681);
$int= substr($int,0,4);
$result = mysqli_query($link, "INSERT INTO `users` (`code`, `date`) VALUES ($int, NOW())");
?>
