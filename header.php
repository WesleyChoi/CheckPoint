<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CheckPoint</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
</head>
<div id="header"> 
	<a id="title" href=index.php style="color: black; text-decoration: none;"><h1>CHECKPOINT</h1></a>
	<nav class="nav-header-main">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="gstarted.php">Getting Started</a></li>
			<li><a href="aboutus.php">About Us</a></li>
			<li><a href="feedback.php">Feedback</a></li>
			<?php
				if (isset($_SESSION['userUid'])) {
					if ($_SESSION['accType'] = "student") {
						echo '<li><a href="students.php">Lists</a></li>';
					} else {
						echo '<li><a href="teachers.php">Lists</a></li>';
					}
					echo '<li><a href="profile.php">'.$_SESSION['userFn'].'</a></li>';
					echo '<li><a href="includes/logout.inc.php">Logout</a></li>';
				}
				else {
					echo '<li><a href="login.php">Login</a></li>';
				}
			?>
		</ul>
	</nav>
</div>