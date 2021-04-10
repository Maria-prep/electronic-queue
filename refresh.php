<?php header('Content-Type: text/html; charset=utf-8');

require_once "stayt.php";?>
<?php
$res = mysqli_query($link, "SELECT * FROM `users` ORDER BY `date` ASC");
echo '<table>';
echo '<th>Клиент</th><th>Дата записи</th><th>Окно приема</th><th>Выбрать окно</th><th>Удалить</th>';
while($row = mysqli_fetch_assoc($res)) {
echo '<tr><td>'.$row['code'].'</td><td>'.$row['date'].'</td><td>'.$row['okno'].'</td>
<td>
	<select onchange="window.location.href=this.options[this.selectedIndex].value">
	<option value="" hidden="">Выберите окно</option>
	<option VALUE="?code='.$row['code'].'&okno=Окно №1">Окно №1</option>
	<option VALUE="?code='.$row['code'].'&okno=Окно №2">Окно №2</option>
	<option VALUE="?code='.$row['code'].'&okno=Окно №3">Окно №3</option></select>
</td>
<td>'.'<a href="?del='.$row['code'].'"><img src="delete.jpg" title="Удалить запись"></a>'.'</td></tr>';
}
echo '</table>';?>
