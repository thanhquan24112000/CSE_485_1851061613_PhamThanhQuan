<?php 
session_start();
if(!isset($_SESSION['email'])){
    header('location:login.php');
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php

if(isset($_GET['id'])){
    require 'ketnoi.php';
    $sql = "SELECT * from motaban where mamota = '".$_GET['id']."'";
    $result = mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();
    mysqli_close($conn);
    if(!empty($row)){
    ?>
<div class="container">
  <h2>Update</h2>
  <form class="form-horizontal" action="/action_page.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Introduce Yourself:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email" value="<?php echo $row['gioithieuban'] ?>" name="gioithieuban">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Describe You:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email" value="<?php echo $row['motaban'] ?>" name="motaban">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Job Description:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email"  value="<?php echo $row['motacongviec'] ?>"  name="motacongviec">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Current job:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email"  value="<?php echo $row['congviechientai'] ?>"  name="congviechientai">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Current job description:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email"  value="<?php echo $row['motacongviechientai'] ?>" name="motacongviechientai">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Testimonials:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email"  value="<?php echo $row['loichungthuc'] ?>" name="loichungthuc">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Endorsement person:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email"  value="<?php echo $row['nguoichungthuc'] ?>" name="nguoichungthuc">
      </div>
    </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10" >
        <button type="submit" class="btn btn-default" style = "background : #007bff">Submit</button>
      </div>
    </div>
  </form>
</div>
<?php
}}
elseif(isset($_GET['id1'])){
    require 'ketnoi.php';
    if($_GET['id1'] == 'id1' ){
      $a = addslashes(file_get_contents($_FILES['anhproject']['tmp_name']));
      $sqli = "UPDATE duan set tenduan = '". $_POST['tenduan'] ."',anh = '".$a."',mota = '". $_POST['mota'] ."' where maduan = '".$_POST['maduan']."'";
      $resulti = mysqli_query($conn,$sqli);
      mysqli_close($conn);
      header("location:manage.php?action=project");
    }else{
    $sql = "SELECT * from duan where maduan = '".$_GET['id1']."'";
    $result = mysqli_query($conn,$sql);
     if(mysqli_num_rows($result) > 0){
      while ($row = mysqli_fetch_assoc($result)){
    ?>
<div class="container">
  <h2>Update</h2>
  <form class="form-horizontal" action="update.php?id1=id1" method= "post" enctype ="multipart/form-data">
    <div class="form-group">
       <label class="control-label col-sm-2" for="email">ID :</label>
       <div class="col-sm-10">
          <input readonly type="text" class="form-control" id="email" value="<?php echo $row['maduan'] ?>" name="maduan">
       </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Name Project:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email" value="<?php echo $row['tenduan'] ?>" name="tenduan">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Image:</label>
      <div class="col-sm-10">
       <?php echo'<img style = "width:7em; height : 7em;" src="data:anh;base64,'.base64_encode($row['anh']).'"alt="Image">'; ?>
       <input type="file" name= "anhproject" >
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Description:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email"  value="<?php echo $row['mota'] ?>"  name="mota">
      </div>
    </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10" >
        <button type="submit" class="btn btn-default" style = "background : #007bff">Submit</button>
      </div>
    </div>
  </form>
</div>
<?php
    }
  }
}
}
elseif(isset($_GET['id2'])){
  require 'ketnoi.php';
  if($_GET['id2'] == 'id2' ){
    $sqli = "UPDATE kinhnghiem set tenkinhnghiem = '". $_POST['tenkinhnghiem'] ."',thoigianbatdau = '". $_POST['thoigianbatdau'] ."',thoigianketthuc = '". $_POST['thoigianketthuc'] ."',chucvu = '". $_POST['chucvu'] ."',motakinhnghiem = '". $_POST['motakinhnghiem'] ."' where makinhnghiem = '".$_POST['makinhnghiem']."'";
    $resulti = mysqli_query($conn,$sqli);
    mysqli_close($conn);
    header("location:manage.php?action=experience");
  }else{
  $sql = "SELECT * from kinhnghiem where makinhnghiem = '".$_GET['id2']."'";
  $result = mysqli_query($conn,$sql);
  $row = $result->fetch_assoc();
  mysqli_close($conn);
  if(!empty($row)){
  ?>
<div class="container">
<h2>Update</h2>
<form class="form-horizontal" action="update.php?id2=id2" method= "post" autocomplete = "off">
  <div class="form-group">
     <label class="control-label col-sm-2" for="email">ID :</label>
     <div class="col-sm-10">
        <input readonly type="text" class="form-control" id="email" value="<?php echo $row['makinhnghiem'] ?>" name="makinhnghiem">
     </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Skill:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email" value="<?php echo $row['tenkinhnghiem'] ?>" name="tenkinhnghiem">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">First Time:</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="email" value="<?php echo $row['thoigianbatdau'] ?>" name="thoigianbatdau">
      
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Last Time	:</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="email"  value="<?php echo $row['thoigianketthuc'] ?>"  name="thoigianketthuc">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Position	:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email"  value="<?php echo $row['chucvu'] ?>"  name="chucvu">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Description:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email"  value="<?php echo $row['motakinhnghiem'] ?>"  name="motakinhnghiem">
    </div>
  </div>
  </div>
  <div class="form-group">        
    <div class="col-sm-offset-2 col-sm-10" >
      <button type="submit" class="btn btn-default" style = "background : #007bff">Submit</button>
    </div>
  </div>
</form>
</div>
<?php
  }
}
}
elseif(isset($_GET['id8'])){
    require 'ketnoi.php';
    if($_GET['id8'] == 'id8' ){
      require "ketnoi.php";
      $a = $_POST['0'];
      $b = $_POST['1'];
      $c = $_POST['2'];
      $d = $_POST['3'];
      $e = $_POST['4'];
      $f = $_POST['5'];
      $g = $_POST['6'];
      $sqli = "UPDATE `hoctap` SET `tenbang`= '$b',`tenbang1`='$c',`tentruong`='$d',`thoigianbatdau`='$e',`thoigianketthuc`='$f',`mota`='$g' WHERE `mahoctap`=$a" ;
      $resulti = mysqli_query($conn,$sqli);
      if(!$resulti){
        die('loi'.mysqli_error($resulti));
      }else{
      mysqli_close($conn);
      header("location:manage.php?action=education");}
    }else{
    $sql = "SELECT * from hoctap where mahoctap = '".$_GET['id8']."'";
    $result = mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();
    mysqli_close($conn);
    if(!empty($row)){
    ?>
  <div class="container">
  <h2>Update</h2>
  <form class="form-horizontal" action="update.php?id8=id8" method= "post" autocomplete ="off">
    <div class="form-group">
       <label class="control-label col-sm-2" for="email">ID :</label>
       <div class="col-sm-10">
          <input readonly type="text" class="form-control" id="email" value="<?php echo $row['mahoctap'] ?>" name="0">
       </div>
    </div>
    <div class="form-group">
       <label class="control-label col-sm-2" for="email">Degree :</label>
       <div class="col-sm-10">
          <input type="text" class="form-control" id="email" value="<?php echo $row['tenbang'] ?>" name="1">
       </div>
    </div>
    <div class="form-group">
       <label class="control-label col-sm-2" for="email">Describe Degree :</label>
       <div class="col-sm-10">
          <input type="text" class="form-control" id="email" value="<?php echo $row['tenbang1'] ?>" name="2">
       </div>
    </div>
    <div class="form-group">
       <label class="control-label col-sm-2" for="email">School :</label>
       <div class="col-sm-10">
          <input type="text" class="form-control" id="email" value="<?php echo $row['tentruong'] ?>" name="3">
       </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">First Time:</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="email" value="<?php echo $row['thoigianbatdau'] ?>" name="4">
        
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Last Time	:</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="email"  value="<?php echo $row['thoigianketthuc'] ?>"  name="5">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Describe :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email"  value="<?php echo $row['mota'] ?>"  name="6">
      </div>
    </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10" >
        <button type="submit" class="btn btn-default" style = "background : #007bff">Submit</button>
      </div>
    </div>
  </form>
  </div>
  <?php
    }
  }
}
elseif(isset($_GET['id4'])){
    require 'ketnoi.php';
    if($_GET['id4'] == 'id4' ){
      $sqli = "UPDATE lienhe set email ='".$_POST['email']."',ten ='".$_POST['ten']."',noidung ='".$_POST['noidung']."' where manguoidung = '".$_POST['manguoidung']."' " ;
      $resulti = mysqli_query($conn,$sqli);
      mysqli_close($conn);
      header("location:manage.php?action=contact");
    }else{
    $sql = "SELECT * from lienhe where manguoidung = '".$_GET['id4']."'";
    $result = mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();
    mysqli_close($conn);
    if(!empty($row)){
    ?>
  <div class="container">
  <h2>Update</h2>
  <form class="form-horizontal" action="update.php?id4=id4" method= "post" autocomplete = "off">
    <div class="form-group">
       <label class="control-label col-sm-2" for="email">ID :</label>
       <div class="col-sm-10">
          <input readonly type="text" class="form-control" id="email" value="<?php echo $row['manguoidung'] ?>" name="manguoidung">
       </div>
    </div>
    <div class="form-group">
       <label class="control-label col-sm-2" for="email">Email :</label>
       <div class="col-sm-10">
          <input type="text" class="form-control" id="email" value="<?php echo $row['email'] ?>" name="email">
       </div>
    </div>
    <div class="form-group">
       <label class="control-label col-sm-2" for="email">Name :</label>
       <div class="col-sm-10">
          <input type="text" class="form-control" id="email" value="<?php echo $row['ten'] ?>" name="ten">
       </div>
    </div>
    <div class="form-group">
       <label class="control-label col-sm-2" for="email">Commetnt :</label>
       <div class="col-sm-10">
          <input type="text" class="form-control" id="email" value="<?php echo $row['noidung'] ?>" name="noidung">
       </div>
    </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10" >
        <button type="submit" class="btn btn-default" style = "background : #007bff">Submit</button>
      </div>
    </div>
  </form>
  </div>
  <?php
    }
  }
}
elseif(isset($_GET['id5'])){
    require 'ketnoi.php';
    if($_GET['id5'] == 'id5' ){
      require 'ketnoi.php';
      $a = $_POST['1'];
      $b = $_POST['2'];
      $c = $_POST['3'];
      $sqlii = "UPDATE `ngonngu` SET `tenngonngu`= '$b' ,`%hoanthanh`= $c WHERE `mangonngu` = $a";
      $resultii = mysqli_query($conn,$sqlii);
      if(!$resultii){
        die('loi'.mysqli_error($resultii));
      }else{
      header("location:manage.php?action=language");
    }}else{
    $sql = "SELECT * from ngonngu where mangonngu = '".$_GET['id5']."'";
    $result = mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();
    mysqli_close($conn);
    if(!empty($row)){
    ?>
  <div class="container">
  <h2>Update</h2>
  <form class="form-horizontal" action="update.php?id5=id5" method= "post" autocomplete = "off">
    <div class="form-group">
       <label class="control-label col-sm-2" for="email">ID :</label>
       <div class="col-sm-10">
          <input readonly type="text" class="form-control" id="email" value="<?php echo $row['mangonngu'] ?>" name="1">
       </div>
    </div>
    <div class="form-group">
       <label class="control-label col-sm-2" for="email">Name :</label>
       <div class="col-sm-10">
          <input type="text" class="form-control" id="email" value="<?php echo $row['tenngonngu'] ?>" name="2">
       </div>
    </div>
    <div class="form-group">
       <label class="control-label col-sm-2" for="email">%  Complate :</label>
       <div class="col-sm-10">
          <input type="text" class="form-control" id="email" value="<?php echo $row['%hoanthanh'] ?>" name="3">
       </div>
    </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10" >
        <button type="submit" class="btn btn-default" style = "background : #007bff">Submit</button>
      </div>
    </div>
  </form>
  </div>
  <?php
    }
  }
}
elseif(isset($_GET['id6'])){
    require 'ketnoi.php';
    if($_GET['id6'] == 'id6' ){
      $sqli = "UPDATE kynang set tenkynang ='".$_POST['tenkynang']."',motakynang ='".$_POST['motakynang']."' where makynang = '".$_POST['makynang']."' " ;
      $resulti = mysqli_query($conn,$sqli);
      if(!$resulti){
        die('loi'.mysqli_error($resulti));
      }else{
      mysqli_close($conn);
      header("location:manage.php?action=skill");}
    }else{
    $sql = "SELECT * from kynang where makynang = '".$_GET['id6']."'";
    $result = mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();
    mysqli_close($conn);
    if(!empty($row)){
    ?>
  <div class="container">
  <h2>Update</h2>
  <form class="form-horizontal" action="update.php?id6=id6" method= "post" autocomplete = "off">
    <div class="form-group">
       <label class="control-label col-sm-2" for="email">ID :</label>
       <div class="col-sm-10">
          <input readonly type="text" class="form-control" id="email" value="<?php echo $row['makynang'] ?>" name="makynang">
       </div>
    </div>
    <div class="form-group">
       <label class="control-label col-sm-2" for="email">Name :</label>
       <div class="col-sm-10">
          <input type="text" class="form-control" id="email" value="<?php echo $row['tenkynang'] ?>" name="tenkynang">
       </div>
    </div>
    <div class="form-group">
       <label class="control-label col-sm-2" for="email">Describe Skill :</label>
       <div class="col-sm-10">
          <input type="text" class="form-control" id="email" value="<?php echo $row['motakynang'] ?>" name="motakynang">
       </div>
    </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10" >
        <button type="submit" class="btn btn-default" style = "background : #007bff">Submit</button>
      </div>
    </div>
  </form>
  </div>
  <?php
    }
  }
}
else{
    require 'ketnoi.php';
    if($_GET['id7'] == 'id7' ){
      $a = addslashes(file_get_contents($_FILES['anh']['tmp_name']));
      $sqli = "UPDATE nguoigioithieu set ten ='".$_POST['ten']."',anh ='".$a."',chucvu ='".$_POST['chucvu']."',mota ='".$_POST['mota']."' where manguoigioithieu = '".$_POST['ma']."' " ;
      $resulti = mysqli_query($conn,$sqli);
      if(!$resulti){
        die('loi'.mysqli_error($resulti));
      }else{
      mysqli_close($conn);
      header("location:manage.php?action=references");}
    }else{
    $sql = "SELECT * from nguoigioithieu  where manguoigioithieu = '".$_GET['id7']."'";
    $result = mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();
    mysqli_close($conn);
    if(!empty($row)){
    ?>
  <div class="container">
  <h2>Update</h2>
  <form class="form-horizontal" action="update.php?id7=id7" method= "post" enctype ="multipart/form-data"> autocomplete = "off">
    <div class="form-group">
       <label class="control-label col-sm-2" for="email">ID :</label>
       <div class="col-sm-10">
          <input readonly type="text" class="form-control" id="email" value="<?php echo $row['manguoigioithieu'] ?>" name="ma">
       </div>
    </div>
    <div class="form-group">
       <label class="control-label col-sm-2" for="email">Name :</label>
       <div class="col-sm-10">
          <input type="text" class="form-control" id="email" value="<?php echo $row['ten'] ?>" name="ten">
       </div>
    </div>
    <div class="form-group">
       <label class="control-label col-sm-2" for="email">Avatar :</label>
       <div class="col-sm-10">
       <?php echo'<img style = "width:7em; height : 7em;" src="data:anh;base64,'.base64_encode($row['anh']).'"alt="Image">'; ?>
       <input type="file" name="anh">
       </div>
    </div>
    <div class="form-group">
       <label class="control-label col-sm-2" for="email">Position :</label>
       <div class="col-sm-10">
          <input type="text" class="form-control" id="email" value="<?php echo $row['chucvu'] ?>" name="chucvu">
       </div>
    </div>
    <div class="form-group">
       <label class="control-label col-sm-2" for="email">Introduction :</label>
       <div class="col-sm-10">
          <input type="text" class="form-control" id="email" value="<?php echo $row['mota'] ?>" name="mota">
       </div>
    </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10" >
        <button type="submit" class="btn btn-default" style = "background : #007bff">Submit</button>
      </div>
    </div>
  </form>
  </div>
  <?php
    }
  }
}
?>
</body>
</html>
<?php } ?>