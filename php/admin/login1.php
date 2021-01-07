<?php// session_start();?>
<?php
//if (isset($_SESSION['email']) && $_SESSION['level']==2){
 //   header('location:admin/index.php'); 
//}
//elseif(isset($_SESSION['email'])&& $_SESSION['levell']==1){
//    header('location:member/index.php');
//}
//else{
//?>
<?php
include 'ketnoi.php';
    if(isset($_POST['email'])&& !empty($_POST['email']) && isset($_POST['pass']) && !empty($_POST['pass'])){
        $sqli = "SELECT * from user where email = '" . $_POST['email'] . "'";
        $resulti = mysqli_query($conn,$sqli);
        $rows = mysqli_fetch_assoc($resulti);
        if(!$rows){ ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
        <div>
            <div>
            <H3 style ="text-align : center">Sai Email !</H3>
            </div>
            </div>
        </body>
        </html>

<?php
          include 'login.php';
        }
        elseif($rows['status'] != 1){
            echo '<H3 style ="text-align : center">Tài khoản chưa được kích hoạt !</H3>';
            require 'login.php';
        }
        else{
            if($rows['pass'] == ($_POST['pass'])){
                //$_SESSION['email'] = $rows['email'];
                //$_SESSION['level'] = $rows['user_level'];
                //if($_SESSION['level']==2){
                    echo "dangnhapthanhcong";
                   //header('location:admin/index.php');
                }
                //else{
                
                    //header('location:member/index.php');
                //}
                //}
            else{
                echo '<H3 style ="text-align : center">Sai Password !</H3>';
                require 'login.php';
            }
        }
        
    }
    else {
        echo '<H3 style ="text-align : center">Nhập đầy đủ thông tin !</H3>';
        require 'login.php';
    }
?>