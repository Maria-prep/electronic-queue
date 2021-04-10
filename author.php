<?php
if (!empty($_COOKIE['sid'])) {session_id($_COOKIE['sid']);}
session_start();
require_once 'classes/Auth.class.php';
require_once 'stayt.php';
$q_s = mysqli_query($link, $select);
$user_status = $arr['id'];
$location = '';
if (Auth\User::isAuthorized()): 
switch($user_status){
    case '1': header('Location: user.php');break;
	case '2': header('Location: terminal.php');break;
	case '3':

?>

<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8">
<meta charset="utf-8">
<title>Главная страница</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/main.css">
<script type="text/javascript" src="jquery.js"></script>

</head>
<body>
<div id="output" class="output"></div>
<br><p></p>
<script type="text/javascript" src="ajax-form.js"></script>
<script>
		function show()
		{
			$.ajax({
				url: "infofor.php",
				cache: false,
				success: function(html){
					$("#output").html(html);
				}
			});
		}
	
		$(document).ready(function(){
			show();
			setInterval('show()',1000);
		});
	</script></body></html>
<?php
break;}
else: header('Location: index.php');
endif;
?>