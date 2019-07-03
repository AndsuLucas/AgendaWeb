<?php
require_once "vendor/autoload.php";
if (!session_start()) {
	session_start();
}
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Agenda</title>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="https://unpkg.com/feather-icons"></script>

	</head>
	<body style="padding: 0;">
	<?php 			  
		//           //função responsável por retornar os templates	
		require_once renderPage(PATHS);
	?>
	</body>
</html>
