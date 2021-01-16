<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      

<?php
require 'ketnoi.php';
if(isset($_GET['action0'])){
    echo "insert motaban";
}elseif(isset($_GET['action1'])){
    if($_GET['action1'] =='id1'){
        $a = addslashes(file_get_contents($_FILES['anhproject']['tmp_name']));
        $sql = "INSERT INTO duan(maduan,tenduan,anh,mota,iduser) values(null,'".$_POST['tenduan']."','".$a."','".$_POST['mota']."',1)";
        $result = mysqli_query($conn,$sql);
        header('location:manage.php?action=project');
    }
    else{
    ?>
    <div class="container">
  <h2>INSERT PROJECT</h2>
  <form class="form-horizontal" action="insert.php?action1=id1" method= "post" enctype ="multipart/form-data">
    <div class="form-group">
       <label class="control-label col-sm-2" for="email">ID :</label>
       <div class="col-sm-10">
          <input readonly type="text" class="form-control" id="email" name="maduan">
       </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Name Project:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email"  name="tenduan">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Image:</label>
      <div class="col-sm-10">
       <input type="file" name= "anhproject" >
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Description:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email"  name="mota">
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
<?php }}
elseif(isset($_GET['action2'])){
  require 'ketnoi.php';
  if($_GET['action2'] =='id2'){
    $sql = "INSERT INTO kinhnghiem values(null,'".$_POST['tenkinhnghiem']."','".$_POST['thoigianbatdau']."','".$_POST['thoigianketthuc']."','".$_POST['chucvu']."','".$_POST['motakinhnghiem']."',1)";
    $result = mysqli_query($conn,$sql);
    header('location:manage.php?action=experience');
}
else{
?>
<div class="container">
<h2>INSERT EXPERIENCE</h2>
<form class="form-horizontal" action="insert.php?action2=id2" method= "post" autocomplete = "off">
  <div class="form-group">
     <label class="control-label col-sm-2" for="email">ID :</label>
     <div class="col-sm-10">
        <input readonly type="text" class="form-control" id="email" name="makinhnghiem">
     </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Skill:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email" name="tenkinhnghiem">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">First Time:</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="email"  name="thoigianbatdau">
      
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Last Time	:</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="email"   name="thoigianketthuc">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Position	:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email"   name="chucvu">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Description:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email"  name="motakinhnghiem">
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
<?php }
}
elseif(isset($_GET['action3'])){
  require "ketnoi.php";
  if($_GET['action3'] =='id3'){
  $sql = "INSERT INTO hoctap values (null,'".$_POST['1']."','".$_POST['2']."','".$_POST['3']."','".$_POST['4']."','".$_POST['5']."','".$_POST['6']."',1)" ;
  $resulti = mysqli_query($conn,$sql);
  header("location:manage.php?action=education");
}else{
?>
<div class="container">
<h2>INSERT EDUCATION</h2>
<form class="form-horizontal" action="insert.php?action3=id3" method= "post" autocomplete ="off">
<div class="form-group">
   <label class="control-label col-sm-2" for="email">ID :</label>
   <div class="col-sm-10">
      <input readonly type="text" class="form-control" id="email" name="0">
   </div>
</div>
<div class="form-group">
   <label class="control-label col-sm-2" for="email">Degree :</label>
   <div class="col-sm-10">
      <input type="text" class="form-control" id="email" name="1">
   </div>
</div>
<div class="form-group">
   <label class="control-label col-sm-2" for="email">Describe Degree :</label>
   <div class="col-sm-10">
      <input type="text" class="form-control" id="email" name="2">
   </div>
</div>
<div class="form-group">
   <label class="control-label col-sm-2" for="email">School :</label>
   <div class="col-sm-10">
      <input type="text" class="form-control" id="email" name="3">
   </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-2" for="email">First Time:</label>
  <div class="col-sm-10">
    <input type="date" class="form-control" id="email" name="4">
    
  </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-2" for="email">Last Time	:</label>
  <div class="col-sm-10">
    <input type="date" class="form-control" id="email" name="5">
  </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-2" for="email">Describe :</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="email" name="6">
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

elseif(isset($_GET['action4'])){
  require 'ketnoi.php';
  if($_GET['action4'] == 'id4' ){
    $sqli = "INSERT INTO lienhe values(null,'".$_POST['email']."','".$_POST['ten']."','".$_POST['noidung']."' )" ;
    $resulti = mysqli_query($conn,$sqli);
    mysqli_close($conn);
    header("location:manage.php?action=contact");
  }else{
  ?>
<div class="container">
<h2>INSERT CONTACT</h2>
<form class="form-horizontal" action="insert.php?action4=id4" method= "post" autocomplete = "off">
  <div class="form-group">
     <label class="control-label col-sm-2" for="email">ID :</label>
     <div class="col-sm-10">
        <input readonly type="text" class="form-control" id="email" name="manguoidung">
     </div>
  </div>
  <div class="form-group">
     <label class="control-label col-sm-2" for="email">Email :</label>
     <div class="col-sm-10">
        <input type="text" class="form-control" id="email" name="email">
     </div>
  </div>
  <div class="form-group">
     <label class="control-label col-sm-2" for="email">Name :</label>
     <div class="col-sm-10">
        <input type="text" class="form-control" id="email" name="ten">
     </div>
  </div>
  <div class="form-group">
     <label class="control-label col-sm-2" for="email">Comment :</label>
     <div class="col-sm-10">
        <input type="text" class="form-control" id="email" name="noidung">
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

elseif(isset($_GET['action6'])){
  require 'ketnoi.php';
  if($_GET['action6'] == 'id6' ){
    $sqli = "INSERT INTO kynang values(null,'".$_POST['tenkynang']."','".$_POST['motakynang']."',1)";
    $resulti = mysqli_query($conn,$sqli);
    if(!$resulti){
      die('loi'.mysqli_error($resulti));
    }else{
    mysqli_close($conn);
    header("location:manage.php?action=skill");}
  }else{
  ?>
<div class="container">
<h2>Update</h2>
<form class="form-horizontal" action="insert.php?action6=id6" method= "post" autocomplete = "off">
  <div class="form-group">
     <label class="control-label col-sm-2" for="email">ID :</label>
     <div class="col-sm-10">
        <input readonly type="text" class="form-control" id="email" name="makynang">
     </div>
  </div>
  <div class="form-group">
     <label class="control-label col-sm-2" for="email">Name :</label>
     <div class="col-sm-10">
        <input type="text" class="form-control" id="email" name="tenkynang">
     </div>
  </div>
  <div class="form-group">
     <label class="control-label col-sm-2" for="email">Describe Skill :</label>
     <div class="col-sm-10">
        <input type="text" class="form-control" id="email" name="motakynang">
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
elseif(isset($_GET['action7'])){
  require 'ketnoi.php';
  if($_GET['action7'] == 'id7' ){
    $b = addslashes(file_get_contents($_FILES['anh']['tmp_name']));
    $sqli = "INSERT INTO nguoigioithieu values(null,'".$_POST['ten']."','".$b."','".$_POST['chucvu']."','".$_POST['mota']."',1)";
    $resulti = mysqli_query($conn,$sqli);
    if(!$resulti){
      die('loi'.mysqli_error($resulti));
    }else{
    mysqli_close($conn);
    header("location:manage.php?action=references");}
  }else{
  ?>
<div class="container">
<h2>INSERT REFERENCES</h2>
<form class="form-horizontal" action="insert.php?action7=id7" method= "post" enctype ="multipart/form-data"> autocomplete = "off">
  <div class="form-group">
     <label class="control-label col-sm-2" for="email">ID :</label>
     <div class="col-sm-10">
        <input readonly type="text" class="form-control" id = "email" name="ma">
     </div>
  </div>
  <div class="form-group">
     <label class="control-label col-sm-2" for="email">Name :</label>
     <div class="col-sm-10">
        <input type="text" class="form-control" id="email" name="ten">
     </div>
  </div>
  <div class="form-group">
     <label class="control-label col-sm-2" for="email">Avatar :</label>
     <div class="col-sm-10">
        <input type="file" name ="anh">
     </div>
  </div>
  <div class="form-group">
     <label class="control-label col-sm-2" for="email">Position :</label>
     <div class="col-sm-10">
        <input type="text" class="form-control" id="email" name="chucvu">
     </div>
  </div>
  <div class="form-group">
     <label class="control-label col-sm-2" for="email">Introduction :</label>
     <div class="col-sm-10">
        <input type="text" class="form-control" id="email" name="mota">
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
elseif(isset($_GET['action5'])) {
  require 'ketnoi.php';
  if($_GET['action5'] == 'id5' ){
    require 'ketnoi.php';
    $a = $_POST['1'];
    $b = $_POST['2'];
    $c = $_POST['3'];
    $sqlii = "INSERT INTO `ngonngu` values(null,'$b' ,$c,'".$_POST['skill']."')";
    $resultii = mysqli_query($conn,$sqlii);
    header("location:manage.php?action=language");
  }else{
  ?>
<div class="container">
<h2>INSERT PROGAMMING LANGUGE</h2>
<form class="form-horizontal" action="insert.php?action5=id5" method= "post" autocomplete = "off">
  <div class="form-group">
     <label class="control-label col-sm-2" for="email">ID :</label>
     <div class="col-sm-10">
        <input readonly type="text" class="form-control" id="email" name="1">
     </div>
  </div>
  <div class="form-group">
     <label class="control-label col-sm-2" for="email">Name :</label>
     <div class="col-sm-10">
        <input type="text" class="form-control" id="email" name="2">
     </div>
  </div>
  <div class="form-group">
     <label class="control-label col-sm-2" for="email">%  Complate :</label>
     <div class="col-sm-10">
        <input type="text" class="form-control" id="email" name="3">
     </div>
  </div>
  <div class="form-group">
     <label class="control-label col-sm-2" for="email">ID SKILL :</label>
     <div class="col-sm-10">
        <input type="text" class="form-control" id="email" name="skill">
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
 ?>
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>