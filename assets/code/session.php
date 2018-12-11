<?php
include ("db.php");

function login($email, $password)
{
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Couldn't connect to server");
	$query = "SELECT ResearcherID FROM researcher WHERE EmailAddress = ? AND EmailPassword = ?";

	$stmt = $conn->stmt_init();

	if ($stmt->prepare($query)) {
		$researcher_id = "";

		$stmt->bind_param("ss", $email, $password);
		$stmt->execute();
		$stmt->bind_result($researcher_id);

		if ($stmt->fetch() != null) {
			session_start();
			$_SESSION['researcher_id'] = $researcher_id;

			return true;
		}

		$conn->close();

		return false;
	}
}

function logout()
{
	$_SESSION = array();

	if (ini_get("session.use_cookies")) {
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000,
			$params["path"], $params["domain"],
			$params["secure"], $params["httponly"]
		);
	}
    
    session_destroy();
}

if (isset($_GET['logout'])) {
    logout();
    header("Location: ../..");
}
?>