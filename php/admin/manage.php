
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
  </head>
  <body style =" background:#bfbbbb ">
<?php
if($_GET['action'] == 'about'){
    require 'index.php';
    require 'ketnoi.php';
    $sql = "SELECT * from motaban";
    $result =mysqli_query($conn,$sql);
?>

  <div style =" background:#bfbbbb ;display: flex;flex-direction: column; align-items: center;">
  <div style = "margin-top : 3%;margin-bottom:3%"><H1>Personal Information Management</H1></div>
  <div class = "xem" style ="width : 90vw">
      <table class="table" >
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Introduce you</th> 
                  <th>Describe you</th>
                  <th>Job description</th>
                  <th>Current job</th>
                  <th>Current job description</th>
                  <th>Testimonials</th>
                  <th>Endorsement person</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
          <?php if(mysqli_num_rows($result) > 0){
              while ($row = mysqli_fetch_assoc($result)){ ?>
              <tr>
                  <td scope="row"><?php echo $row['mamota'] ?></td>
                  <td><?php echo $row['gioithieuban'] ?></td>
                  <td style = "min-width:200px !important"><?php echo $row['motaban'] ?></td>
                  <td><?php echo $row['motacongviec'] ?></td>
                  <td><?php echo $row['congviechientai'] ?></td>
                  <td><?php echo $row['motacongviechientai'] ?></td>
                  <td><?php echo $row['loichungthuc'] ?></td>
                  <td><?php echo $row['nguoichungthuc'] ?></td>
                  <td><div style = "display: flex; justify-content:space-between; width: 100px ;"><a href="xemtt.php?id=<?php echo $row['mamota'] ?>"><i class="fas fa-eye"></i></a> <a href="#"><i class="fas fa-wrench"></i></a> <a href="xoa.php?id=<?php echo $row['mamota'];?>" onclick = "return confirm('Are you sure want to delete?');"><i class="fas fa-trash-alt"></i></a></div></td>
              </tr>
              <?php } 
            } ?>
          </tbody>
      </table>
      </div>
    </div>
<?php
}
elseif($_GET['action'] == 'project'){
    require 'index.php';
    require 'ketnoi.php';
    $sql = "SELECT * from duan";
    $result =mysqli_query($conn,$sql);?>
    <div style =" background:#bfbbbb ;display: flex;flex-direction: column; align-items: center;">
    <div style = "margin-top : 3%;margin-bottom:3%"><H1>Project</H1></div>
    <div class = "xem" style ="width : 90vw">
        <table class="table" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name Project</th> 
                    <th>Image</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php if(mysqli_num_rows($result) > 0){
                while ($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td scope="row"><?php echo $row['maduan'] ?></td>
                    <td><?php echo $row['tenduan'] ?></td>
                    <td style = "min-width:200px !important"><?php echo $row['anh'] ?></td>
                    <td><?php echo $row['mota'] ?></td>
                    <td><div style = "display: flex; justify-content:space-between; width: 100px ;"><a href="xemtt.php?id=<?php echo $row['mamota'] ?>"><i class="fas fa-eye"></i></a> <a href="#"><i class="fas fa-wrench"></i></a> <a href="xoa.php?id=<?php echo $row['mamota'];?>" onclick = "return confirm('Are you sure want to delete?');"><i class="fas fa-trash-alt"></i></a></div></td>
                </tr>
                <?php } 
              } ?>
            </tbody>
        </table>
        </div>
      </div>
  <?php
}
elseif($_GET['action'] == 'experience'){
    require 'index.php';
    require 'ketnoi.php';
    $sql = "SELECT * from kinhnghiem";
    $result =mysqli_query($conn,$sql); ?>
      <div style =" background:#bfbbbb ;display: flex;flex-direction: column; align-items: center;">
  <div style = "margin-top : 3%;margin-bottom:3%"><H1>Experience Management</H1></div>
  <div class = "xem" style ="width : 90vw">
      <table class="table" >
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Skill</th> 
                  <th>First Time</th>
                  <th>Last Time</th>
                  <th>Position</th>
                  <th>Description</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
          <?php if(mysqli_num_rows($result) > 0){
              while ($row = mysqli_fetch_assoc($result)){ ?>
              <tr>
                  <td scope="row"><?php echo $row['makinhnghiem'] ?></td>
                  <td><?php echo $row['tenkinhnghiem'] ?></td>
                  <td style = "min-width:200px !important"><?php echo $row['thoigianbatdau'] ?></td>
                  <td><?php echo $row['thoigianketthuc'] ?></td>
                  <td><?php echo $row['chucvu'] ?></td>
                  <td><?php echo $row['motakinhnghiem'] ?></td>
                  <td><div style = "display: flex; justify-content:space-between; width: 100px ;"><a href="xemtt.php?id=<?php echo $row['mamota'] ?>"><i class="fas fa-eye"></i></a> <a href="#"><i class="fas fa-wrench"></i></a> <a href="xoa.php?id=<?php echo $row['mamota'];?>" onclick = "return confirm('Are you sure want to delete?');"><i class="fas fa-trash-alt"></i></a></div></td>
              </tr>
              <?php } 
            } ?>
          </tbody>
      </table>
      </div>
    </div>
<?php
}
elseif($_GET['action'] == 'education'){
    require 'index.php';
    require 'ketnoi.php';
    $sql = "SELECT * from hoctap";
    $result =mysqli_query($conn,$sql);?>
      <div style =" background:#bfbbbb ;display: flex;flex-direction: column; align-items: center;">
  <div style = "margin-top : 3%;margin-bottom:3%"><H1>Education</H1></div>
  <div class = "xem" style ="width : 90vw">
      <table class="table" >
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Degree</th> 
                  <th>Describe Degree</th>
                  <th>School</th>
                  <th>First Time</th>
                  <th>Last Time</th>
                  <th>Describe</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
          <?php if(mysqli_num_rows($result) > 0){
              while ($row = mysqli_fetch_assoc($result)){ ?>
              <tr>
                  <td scope="row"><?php echo $row['mahoctap'] ?></td>
                  <td><?php echo $row['tenbang'] ?></td>
                  <td style = "min-width:200px !important"><?php echo $row['tenbang1'] ?></td>
                  <td><?php echo $row['tentruong'] ?></td>
                  <td><?php echo $row['thoigianbatdau'] ?></td>
                  <td><?php echo $row['thoigianketthuc'] ?></td>
                  <td><?php echo $row['mota'] ?></td>
                  <td><div style = "display: flex; justify-content:space-between; width: 100px ;"><a href="xemtt.php?id=<?php echo $row['mamota'] ?>"><i class="fas fa-eye"></i></a> <a href="#"><i class="fas fa-wrench"></i></a> <a href="xoa.php?id=<?php echo $row['mamota'];?>" onclick = "return confirm('Are you sure want to delete?');"><i class="fas fa-trash-alt"></i></a></div></td>
              </tr>
              <?php } 
            } ?>
          </tbody>
      </table>
      </div>
    </div>
<?php
}
elseif($_GET['action'] == 'contact'){
    require 'index.php';
    require 'ketnoi.php';
    $sql = "SELECT * from lienhe";
    $result =mysqli_query($conn,$sql);?>
      <div style =" background:#bfbbbb ;display: flex;flex-direction: column; align-items: center;">
  <div style = "margin-top : 3%;margin-bottom:3%"><H1>Comment Management</H1></div>
  <div class = "xem" style ="width : 90vw">
      <table class="table" >
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Name</th> 
                  <th>Email</th>
                  <th>Comment</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
          <?php if(mysqli_num_rows($result) > 0){
              while ($row = mysqli_fetch_assoc($result)){ ?>
              <tr>
                  <td scope="row"><?php echo $row['manguoidung'] ?></td>
                  <td><?php echo $row['ten'] ?></td>
                  <td style = "min-width:200px !important"><?php echo $row['email'] ?></td>
                  <td><?php echo $row['noidung'] ?></td>
                  <td><div style = "display: flex; justify-content:space-between; width: 100px ;"><a href="xemtt.php?id=<?php echo $row['mamota'] ?>"><i class="fas fa-eye"></i></a> <a href="#"><i class="fas fa-wrench"></i></a> <a href="xoa.php?id=<?php echo $row['mamota'];?>" onclick = "return confirm('Are you sure want to delete?');"><i class="fas fa-trash-alt"></i></a></div></td>
              </tr>
              <?php } 
            } ?>
          </tbody>
      </table>
      </div>
    </div>
<?php
}
elseif($_GET['action'] == 'language'){
    require 'index.php';
    require 'ketnoi.php';
    $sql = "SELECT * from ngonngu";
    $result =mysqli_query($conn,$sql); ?>
      <div style =" background:#bfbbbb ;display: flex;flex-direction: column; align-items: center;">
  <div style = "margin-top : 3%;margin-bottom:3%"><H1>Programming language</H1></div>
  <div class = "xem" style ="width : 90vw">
      <table class="table" >
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Name</th> 
                  <th>% Complate</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
          <?php if(mysqli_num_rows($result) > 0){
              while ($row = mysqli_fetch_assoc($result)){ ?>
              <tr>
                  <td scope="row"><?php echo $row['mangonngu'] ?></td>
                  <td><?php echo $row['tenngonngu'] ?></td>
                  <td style = "min-width:200px !important"><?php echo $row['%hoanthanh'] ?></td>
                  <td><div style = "display: flex; justify-content:space-between; width: 100px ;"><a href="xemtt.php?id=<?php echo $row['mamota'] ?>"><i class="fas fa-eye"></i></a> <a href="#"><i class="fas fa-wrench"></i></a> <a href="xoa.php?id=<?php echo $row['mamota'];?>" onclick = "return confirm('Are you sure want to delete?');"><i class="fas fa-trash-alt"></i></a></div></td>
              </tr>
              <?php } 
            } ?>
          </tbody>
      </table>
      </div>
    </div>
<?php
}
elseif($_GET['action'] == 'skill'){
    require 'index.php';
    require 'ketnoi.php';
    $sql = "SELECT * from kynang";
    $result =mysqli_query($conn,$sql);?>
      <div style =" background:#bfbbbb ;display: flex;flex-direction: column; align-items: center;">
  <div style = "margin-top : 3%;margin-bottom:3%"><H1>My Skill</H1></div>
  <div class = "xem" style ="width : 90vw">
      <table class="table" >
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Name</th> 
                  <th>Describe Skill</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
          <?php if(mysqli_num_rows($result) > 0){
              while ($row = mysqli_fetch_assoc($result)){ ?>
              <tr>
                  <td scope="row"><?php echo $row['makynang'] ?></td>
                  <td><?php echo $row['tenkynang'] ?></td>
                  <td style = "min-width:200px !important"><?php echo $row['motakynang'] ?></td>
                  <td><div style = "display: flex; justify-content:space-between; width: 100px ;"><a href="xemtt.php?id=<?php echo $row['mamota'] ?>"><i class="fas fa-eye"></i></a> <a href="#"><i class="fas fa-wrench"></i></a> <a href="xoa.php?id=<?php echo $row['mamota'];?>" onclick = "return confirm('Are you sure want to delete?');"><i class="fas fa-trash-alt"></i></a></div></td>
              </tr>
              <?php } 
            } ?>
          </tbody>
      </table>
      </div>
    </div>
<?php
}
else{
    require 'index.php';
    require 'ketnoi.php';
    $sql = "SELECT * from nguoigioithieu";
    $result =mysqli_query($conn,$sql);?>
      <div style =" background:#bfbbbb ;display: flex;flex-direction: column; align-items: center;">
  <div style = "margin-top : 3%;margin-bottom:3%"><H1>Presenter</H1></div>
  <div class = "xem" style ="width : 90vw">
      <table class="table" >
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Name</th> 
                  <th>Avatar</th>
                  <th>Position</th>
                  <th>Introduction</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
          <?php if(mysqli_num_rows($result) > 0){
              while ($row = mysqli_fetch_assoc($result)){ ?>
              <tr>
                  <td scope="row"><?php echo $row['manguoigioithieu'] ?></td>
                  <td><?php echo $row['ten'] ?></td>
                  <td style = "min-width:200px !important"><?php echo $row['anh'] ?></td>
                  <td><?php echo $row['chucvu'] ?></td>
                  <td><?php echo $row['mota'] ?></td>
                  <td><div style = "display: flex; justify-content:space-between; width: 100px ;"><a href="xemtt.php?id=<?php echo $row['mamota'] ?>"><i class="fas fa-eye"></i></a> <a href="#"><i class="fas fa-wrench"></i></a> <a href="xoa.php?id=<?php echo $row['mamota'];?>" onclick = "return confirm('Are you sure want to delete?');"><i class="fas fa-trash-alt"></i></a></div></td>
              </tr>
              <?php } 
            } ?>
          </tbody>
      </table>
      </div>
    </div>
<?php
}
 ?> 
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
