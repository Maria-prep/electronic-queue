<?php
require_once 'stayt.php';
$print = mysqli_query($link, "SELECT * FROM `users` ORDER BY `date` DESC LIMIT 1");
$print1 = mysqli_fetch_assoc($print);
echo '<p>_________________________________________<p>';
echo '	<br><br>';
echo '	<p>Ваш номер : '.$print1['code'].'</p>';
echo '	<br><br>';
echo '	<p>Время регистрации : '.$print1['date'].'</p>';
echo '	<br>';
echo '	<p>_______________________________________<p>';
?>
