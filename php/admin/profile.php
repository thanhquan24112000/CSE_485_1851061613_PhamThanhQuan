<?php session_start();?>
<?php
if(isset($_GET['action'])){
    if(!isset($_FILES['avatar'])) {
        include 'ketnoi.php';
        $sql = "UPDATE `user` SET `name`='".$_POST['name']."',`email`='".$_POST['email']."',`address`='".$_POST['address']."',`phone`='".$_POST['phone']."',`Date of birth`='".$_POST['Dateofbirth']."',`linkface`='".$_POST['linkface']."',`link dribbble`='".$_POST['linkdrbbble']."',`link flickr`='".$_POST['linkflickr']."',`link github`='".$_POST['linkgithub']."' WHERE iduser = '".$_POST['iduser']."'";
        $result = mysqli_query($conn,$sql);
        header('location:profile.php');
    }else{
    include 'ketnoi.php';
    $a = addslashes(file_get_contents($_FILES['avatar']['tmp_name']));
    $sql = "UPDATE `user` SET `name`='".$_POST['name']."',`email`='".$_POST['email']."',`address`='".$_POST['address']."',`phone`='".$_POST['phone']."',`Date of birth`='".$_POST['Dateofbirth']."',`linkface`='".$_POST['linkface']."',`link dribbble`='".$_POST['linkdrbbble']."',`link flickr`='".$_POST['linkflickr']."',`link github`='".$_POST['linkgithub']."',`avatar`='".$a."' WHERE iduser = '".$_POST['iduser']."'";
    $result = mysqli_query($conn,$sql);
    header('location:profile.php');}
    }else{
    require 'ketnoi.php';
    $sql = "SELECT * from user where email='". $_SESSION['email']."'";
    $result = mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();
    mysqli_close($conn);
    if(!empty($row)){
?>

<!doctype html>
<html lang="en">
  <head>
    <title>thong tin chi tiet</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/xemtt.css">
  </head>
  <body><h3><a href="index1.php" style = "margin-left :90%">Home &rarr;</a></h3>
    <div class ='tt'>
    
    <div class='he'>
    </div>
    <div class = "avatar">
    <div>
    <?php echo'<img src="data:avatar;base64,'.base64_encode($row['avatar']).'"alt="Image">'; ?>
      </div>
      </div>
    <form action="profile.php?action=<?php echo $row["iduser"] ?>" method = "POST" enctype ="multipart/form-data">
    <input  style = "width:200px;margin-left:42%; margin-top : 0.5em;" type="file" name="avatar"> <br>    
    <div class="container-fluid hi">
      <div class="row">
        <div class = "col-6 ha">
        <label><label class= "ho">User ID</label> : <input name ="iduser" style ="background :#D3D3D3; border : 0px !important;" readonly type="text" value ="<?php echo $row['iduser'];?>"> </label>
        <label><label class= "ho">Name</label> : <input name="name" style ="background :#D3D3D3; border : 0px !important;" type="text" value ="<?php echo $row['name'];?>"></label> 
        <label><label class= "ho">Address</label> : <input name="address" style ="background :#D3D3D3; border : 0px !important;" type="text" value ="<?php echo $row['address'];?>"></label> 
        <label><label class= "ho">Phone</label> : <input name= "phone" style ="background :#D3D3D3; border : 0px !important;" type="text" value ="<?php echo $row['phone'];?>"></label> 
        <label><label class= "ho">Link Github</label> : <input name ="linkgithub" style ="background :#D3D3D3; border : 0px !important; width :500px;" type="text" value ="<?php echo $row['link github'];?>"></label>
        <label><label class= "ho">Date Of Birth</label> : <input name="Dateofbirth" style ="background :#D3D3D3; border : 0px !important;" type="text" value ="<?php echo $row['Date of birth'];?>"></label>
        </div>
        <div class = "col-6 ha haha">
        <label><label class= "ho">Email</label> : <input name ="email" style ="background :#D3D3D3; border : 0px !important; width :500px;" type="text" value ="<?php echo $row['email'];?>"></label> 
        <label><label class= "ho">Link Facebook</label> : <input name = "linkface" style ="background :#D3D3D3; border : 0px !important;" type="text" value ="<?php echo $row['linkface'];?>"></label> 
        <label><label class= "ho">Link Flickr</label> : <input name = "linkflickr" style ="background :#D3D3D3; border : 0px !important;" type="text" value ="<?php echo $row['link flickr'];?>"></label> 
        <label><label class= "ho">Link Dribbble</label> : <input name = "linkdrbbble" style ="background :#D3D3D3; border : 0px !important;" type="text" value ="<?php echo $row['link dribbble'];?>"></label> 
        <input style ="background :red !important; width:4em;"  type="submit" value ="Save">
       </div>
      </div>
      </div>
  </form>
    
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<?php } } ?>