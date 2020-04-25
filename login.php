<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CheckPoint</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="header"> 
		<h1>CHECKPOINT</h1>
    </div>
    <div id="login" class="container">
        <form action="login.php" method="get">
            <label>Username </label>
            <input type="text" name="usr"/><br>
            <label>Password </label>
            <input type="text" name="pw"/><br>
        </form>
        <?php
            if(isset($_GET) && array_key_exists('usr', $_GET)) {
                $usr = $_GET['usr'];
            }
        ?>
    </div>
</body>
</html> 