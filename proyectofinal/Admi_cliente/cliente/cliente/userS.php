<?php
session_start();
?>
<!doctype html>
<html>
	<head>
		<title>Login</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" 
		integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
		<?php
			include 'conexion.php';
			$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
			if (!$con) {
				die("Connection failed: " . mysqli_connect_error());

			}
			$email = $_POST['username']; 
			$password = $_POST['password'];
			$result = mysqli_query($con, "SELECT idus, concat(name, ' ', apellido) as 'username', contra, tipo FROM usuarios WHERE correo = '$email'");
			$row = mysqli_fetch_assoc($result);
			if ($_POST['password']==$row['contra']) {	
				
				$_SESSION['loggedin'] = true;
				$_SESSION['iduser'] = $row['idus'];
				$_SESSION['usuario'] = $row['username'];
				$_SESSION['tipo']= $row['tipo'];
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + (10 * 60) ;						
				
				header('Location:../../admin/admin/index.php');	
			}
			?>
		</div>
	</body>
</html>