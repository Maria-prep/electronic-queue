<?php 
$link = mysqli_connect('localhost','root','', 'registr');
if (!$link) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
mysqli_set_charset($link, "utf8");
$select = "SELECT * FROM my_users WHERE id = '".$_SESSION['user_id']."'";
$q_s = mysqli_query($link, $select);
$arr = mysqli_fetch_assoc($q_s);
$res = mysqli_query($link, "SELECT * FROM `users` ORDER BY `date` ASC");
?>