<?php

	include('resources/phpinclude/errorhandler.php');
	include('resources/phpinclude/config.php');
	include('resources/phpinclude/urlfunctions.php');

	session_start();

	if($_SERVER["REQUEST_METHOD"] == "POST") {

		// Username and password sent from form
		$username = mysqli_real_escape_string($db, $_POST['user']);
		$password = mysqli_real_escape_string($db, $_POST['pass']);

		//Hashed username and password
		$hashed_usr = hash('sha256', $username);
        $hashed_pw 	= hash('sha256', $password);

		$sql 	= "SELECT COUNT(user) AS counter FROM admin WHERE user = '$hashed_usr' AND pass = '$hashed_pw'";
		$result = mysqli_query($db, $sql);
		$row 	= mysqli_fetch_assoc($result);
		$count 	= $row['counter'];

		// If result matched $myusername and $mypassword, table row must be 1 row
		if($count == 1) {
			$_SESSION['login_user'] = $username;
			header("Location: ./home");
		} elseif ($count > 1) {
			echo "An unexpected error has occured!";
		} else {
			echo "Your Login Name or Password is invalid!";
		}

	}

?>

<!DOCTYPE html>

<html>

	<!--Head start-->
    <head>
		<meta charset="utf-8" lang="no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="resources/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="resources/css/custom.css">
        <title>Henning P. Tandberg - Admin Login</title>
    </head>
	<!--Head end-->

	<!--Body start-->
    <body>
		<div class="container">
			<div class="row<">
				<div class="col-md-12">

					<!-- Trigger the modal with a button -->
					<h1>Admin panel login</h1>
					<h3>Host: <?php echo host_name(); ?></h3><br>
					<button type="button" class="btn btn-info btn-lg"
					data-toggle="modal" data-target="#login-modal">LOG IN</button>

					<!-- Modal start -->
					<div id="login-modal" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">

								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Enter login credentials:</h4>
								</div>

									<div class="modal-body">
										<form action="" method="post">
											<div class="form-group">
												<label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
												<input type="text" class="form-control" name="user" placeholder="Enter username"><br>

												<label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
												<input type="password" class="form-control" name="pass" placeholder="Enter password"><br>

												<button type="submit" class="btn btn-success btn-block">
												<span class="glyphicon glyphicon-off"></span>Login</button>
											</div>
										</form>
									</div>

									<div class="modal-footer">
										<button class="btn btn-danger btn-default pull-left" data-dismiss="modal">
										<span class="glyphicon glyphicon-remove"></span> Cancel</button>
										<h4>Support: abc@def.gh</h4>
									</div>

							</div>
						</div>
					</div>
					<!-- Modal end -->

				</div>
			</div>
		</div>
    </body>
	<!--Body end-->

	<!--Scritp start-->
	<script type="text/javascript" src="resources/js/jquery-2.1.4.min.js"></script><!-- Update??? -->
	<script type="text/javascript" src="resources/js/bootstrap.min.js"></script>
	<!--Sctipt end-->

</html>
