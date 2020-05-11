<?php
    require "header.php";
?>
    <body>
        <div id="container">
            <h2>Profile<h2>
            <t>Name: <?php echo $_SESSION['userFn'].' '.$_SESSION['userLn']; ?></t><br>
            <t>Account Type: <?php echo $_SESSION['accType']; ?></t><br>
        </div>
    </body>
<?php
    require "footer.php";
?>