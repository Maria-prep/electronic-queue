<?php header('Content-Type: text/html; charset=utf-8');
require_once "stayt.php";?>
<html>
<head>
<title>Управление очередью</title>
<meta http-equiv='content-type' content='text/html; charset=utf-8'>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="http://localhost/project/css/user.css">
<script type="text/javascript" src="jquery.js"></script>
</head>
<body>
<?php 
if (isset($_GET['del'])) {
mysqli_query ($link, "DELETE FROM `users` WHERE `users`.`code`='".$_GET['del']."'");  }
if (isset($_GET['okno'])) {
mysqli_query ($link, "UPDATE `users` SET `okno` = '".$_GET['okno']."' WHERE `users`.`code` = '".$_GET['code']."'");  }
?>
<div id = "output" class = "output"></div>
<script>
		function show()
		{
			$.ajax({
				url: "refresh.php",
				cache: false,
				success: function(html){
					$("#output").html(html);
				}
			});
		}
	
		$(document).ready(function(){
			show();
			setInterval('show()',5000);
		});
		
	</script>
</body></html>