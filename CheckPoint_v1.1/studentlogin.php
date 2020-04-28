<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CheckPoint</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
</head>
<body>
	<div id="header"> 
		<h1>CHECKPOINT</h1>
    </div>
    <div id="frm" class="container">
        <form action="process.php" method="POST">
            <p>
                <label>Username </label>
                <input type="text" id="user" name="user"    />
            </p>
            <p>
                <label>Password </label>
                <input type="text" id="pass" name="pass"   />
            </p>
            <p>
                <input type="submit" id="btn" value="Login"     />
            </p>
        <a href=teacherlogin.php>Are you a teacher? Login here.</a>
        </form>
    </div>
</body>
</html> 
