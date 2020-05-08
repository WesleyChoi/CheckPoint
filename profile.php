<?php
    require "header.php";
?>
    <body>
        <div id="container">
            <h1>Profile<h1>
            <p>Name: <?php echo $_SESSION['userFn'].' '.$_SESSION['userLn']; ?></p>
            <p>Account Type: <?php echo $_SESSION['accType']; ?></p>
        </div>
    </body>
<?php
    require "footer.php";
?>