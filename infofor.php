<?php header('Content-Type: text/html; charset=utf-8');
require_once "stayt.php";?>
<?php
$res = mysqli_query($link, "SELECT * FROM `users` ORDER BY `date` ASC LIMIT 5");
echo '<table>';
echo '<th>Клиент</th><th>Окно</th>';
while($row = mysqli_fetch_assoc($res)) {
echo '<tr><td>'.$row['code'].'</td><td>'.$row['okno'].'</td></tr>';
}
echo '</table>';
?>