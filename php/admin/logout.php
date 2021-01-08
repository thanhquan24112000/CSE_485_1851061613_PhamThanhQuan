<?php session_start();?>
<?php
if(!isset($_SESSION['email'])){
    header('location:login.php');
}else{
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>logout</title>
    </head>
    <body>
        <?php header("location:index.php"); ?>
        <?php session_destroy(); ?>
    </body>
    </html>
    <?php } ?>