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
	<link href="https://fonts.googleapis.com/css2?family=Barlow&family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
	<link rel='shortcut icon' href='images/favicon.png' type='image/png'>
</head>
<div id="header">
	<div id="website-title">
		<a href=index.php style="width: 0%; margin: 0 auto;"><img src="images/favicon.png" style="float: left; padding: 0px 0px 0px 20px; width: 60px; height: 60px;"></a>
		<a href=index.php style="text-decoration: none; font-family: 'Roboto Mono', monospace;"><h1 style="float: right; color: black; padding: 0px 20px 0px 5px; font-size: 45px; margin: 0 auto;">CheckPoint</h1></a>
	</div>
	<nav class="nav-header-main">
		<ul>
			<li><a href="index.php">Home</a></li>
			<div class="dropdown">
			<li><a>ABOUT</a></li>
			<div class="dropdown-content">
				<ul>
				<li><a href="gstarted.php">Getting Started</a></li>
				<li><a href="aboutus.php">About Us</a></li>
				<li><a href="feedback.php">Feedback</a></li>
				</ul>
			</div>
			</div>
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
