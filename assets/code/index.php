<!DOCTYPE html>
<html>
<head>
	<title>Login test</title>
	<meta charset="UTF-8">
</head>
<body>
	<div>
		<form action="login.php" method="post">
			<center><input type="text" name="email" required="true" placeholder="email"></center>
			<center><input type="password" name="password" required="true" placeholder="password"></center>
			<center><button type="submit">Login</span></button></center>
		</form>

		<?php
			session_start();

			if (!empty($_SESSION['empty_email_msg'])) {
				echo "<span style='color:red'>" . $_SESSION['empty_email_msg'] . "</span>";
			} else if (!empty($_SESSION['empty_pass_msg'])) {
				echo "<span style='color:red'>" . $_SESSION['empty_pass_msg'] . "</span>";
			} else if (!empty($_SESSION['error'])) {
				echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
			}

			unset($_SESSION['empty_email_msg']);
			unset($_SESSION['empty_pass_msg']);
			unset($_SESSION['error']);
		?>
	</div>
</body>
</html>




