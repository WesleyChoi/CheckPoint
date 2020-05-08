<?php
    require "header.php";
?>
    <body>
        <div id="container">
            <h1>Profile<h1>
            <?php echo $_SESSION['userFn'].' '.$_SESSION['userLn']; ?>
            <?php echo $_SESSION['acctype']; ?>
        </div>
    </body>
<?php
    require "footer.php";
?>