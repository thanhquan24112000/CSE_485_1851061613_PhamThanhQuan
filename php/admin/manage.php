<?php session_start();
if(!isset($_SESSION['email'])){
    header('location:login.php');
}else{?>
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
  <body >
<?php
if($_GET['action'] == 'about'){
require 'ketnoi.php';
//TÌM TỔNG SỐ RECORDS
        $resultt = mysqli_query($conn, 'SELECT count(mamota) as total from motaban');
        $rowt = mysqli_fetch_assoc($resultt);
        $total_records = $rowt['total'];   
        // TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 2;
        // tổng số trang
        $total_page = ceil($total_records / $limit);
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
        // Tìm Start
        $start = ($current_page - 1) * $limit;

        // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
        $sql = "SELECT * from motaban LIMIT $start, $limit";
        $result = mysqli_query($conn,$sql);
    require 'index2.php';
    require 'ketnoi.php';
?>

  <div style =" display: flex;flex-direction: column; align-items: center;">
  <div style = "margin-top : 3%;margin-bottom:3%"><H1>Personal Information Management</H1></div>
  <div class = "haaa"><button><a href="insert.php?action0=motaban">ADD</a></button></div>
  <div class = "xem">
      <table class="table ha" >
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
                  <td><div style = "display: flex; justify-content:space-between; width: 100px ;"><a href="update.php?id=<?php echo $row['mamota'] ?>"><i class="fas fa-wrench"></i></a> <a href="delete.php?id=<?php echo $row['mamota'];?>" onclick = "return confirm('Are you sure want to delete?');"><i class="fas fa-trash-alt"></i></a></div></td>
              </tr>
              <?php } 
            } ?>
          </tbody>
      </table>
      
      </div>
      <div class="pagination haha">
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){ ?>
               <div class ='hi'>  <?php echo '<h4><a href="manage.php?action=about&&page='.($current_page-1).'"><i class="fas fa-caret-left"></i></a></h4>'?></div>
            <?php }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){ ?>
                    <div class ='hi i'><?php echo '<h6>' .$i.'</h6>' ?></div> 
                 <?php }
                else{ ?>
                    <div class ='hi'> <?php echo '<h6><a href="manage.php?action=about&&page='.$i.'">'.$i.'</a></h6>' ?></div>
                <?Php }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){?>
                <div class ='hi'> <?php echo '<h4><a href="manage.php?action=about&&page='.($current_page+1).'"><i class="fas fa-caret-right"></i></a></h4> ' ?> </div>
             <?php }
           ?>
      </div>
    </div>
<?php
require 'index3.php';
}
elseif($_GET['action'] == 'project'){
    require 'ketnoi.php';
//TÌM TỔNG SỐ RECORDS
        $resultt = mysqli_query($conn, 'SELECT count(maduan) as total from duan');
        $rowt = mysqli_fetch_assoc($resultt);
        $total_records = $rowt['total'];   
        // TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 2;
        // tổng số trang
        $total_page = ceil($total_records / $limit);
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
        // Tìm Start
        $start = ($current_page - 1) * $limit;

        // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
        $sql = "SELECT * from duan LIMIT $start, $limit";
        $result = mysqli_query($conn,$sql);
    require 'index2.php';
    require 'ketnoi.php';
?>
    <div style ="display: flex;flex-direction: column; align-items: center;">
    <div style = "margin-top : 3%;margin-bottom:3%"><H1>Project</H1></div>
    <div class = "haaa"><button><a href="insert.php?action1=duan">ADD</a></button></div>
    <div class = "xem">
        <table class="table ha" >
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
                    <td ><?php echo'<img style = "width:7em; height : 7em;" src="data:anh;base64,'.base64_encode($row['anh']).'"alt="Image">'; ?></td>
                    <td><?php echo $row['mota'] ?></td>
                    <td><div style = "display: flex; justify-content:space-between; width: 100px ;"> <a href="update.php?id1=<?php echo $row['maduan'] ?>"><i class="fas fa-wrench"></i></a> <a href="delete.php?id1=<?php echo $row['maduan'];?>" onclick = "return confirm('Are you sure want to delete?');"><i class="fas fa-trash-alt"></i></a></div></td>
                </tr>
                <?php } 
              } ?>
            </tbody>
        </table>
        
      </div>
      <div class="pagination haha">
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){ ?>
               <div class ='hi'>  <?php echo '<h4><a href="manage.php?action=project&&page='.($current_page-1).'"><i class="fas fa-caret-left"></i></a></h4>'?></div>
            <?php }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){ ?>
                    <div class ='hi i'><?php echo '<h6>' .$i.'</h6>' ?></div> 
                 <?php }
                else{ ?>
                    <div class ='hi'> <?php echo '<h6><a href="manage.php?action=project&&page='.$i.'">'.$i.'</a></h6>' ?></div>
                <?Php }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){?>
                <div class ='hi'> <?php echo '<h4><a href="manage.php?action=project&&page='.($current_page+1).'"><i class="fas fa-caret-right"></i></a></h4> ' ?> </div>
             <?php }
           ?>
      </div>
    </div>
  <?php
  require 'index3.php';
}
elseif($_GET['action'] == 'experience'){
    require 'ketnoi.php';
    //TÌM TỔNG SỐ RECORDS
            $resultt = mysqli_query($conn, 'SELECT count(makinhnghiem) as total from kinhnghiem');
            $rowt = mysqli_fetch_assoc($resultt);
            $total_records = $rowt['total'];   
            // TÌM LIMIT VÀ CURRENT_PAGE
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 2;
            // tổng số trang
            $total_page = ceil($total_records / $limit);
            // Giới hạn current_page trong khoảng 1 đến total_page
            if ($current_page > $total_page){
                $current_page = $total_page;
            }
            else if ($current_page < 1){
                $current_page = 1;
            }
            // Tìm Start
            $start = ($current_page - 1) * $limit;
    
            // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
            $sql = "SELECT * from kinhnghiem LIMIT $start, $limit";
            $result = mysqli_query($conn,$sql);
    require 'index2.php'; ?>
      <div style ="display: flex;flex-direction: column; align-items: center;">
  <div style = "margin-top : 3%;margin-bottom:3%"><H1>Experience Management</H1></div>
  <div class = "haaa"><button><a href="insert.php?action2=kinhnghiem">ADD</a></button></div>
  <div class = "xem">
      <table class="table ha" >
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
                  <td><div style = "display: flex; justify-content:space-between; width: 100px ;"> <a href="update.php?id2=<?php echo $row['makinhnghiem'] ?>"><i class="fas fa-wrench"></i></a> <a href="delete.php?id2=<?php echo $row['makinhnghiem'];?>" onclick = "return confirm('Are you sure want to delete?');"><i class="fas fa-trash-alt"></i></a></div></td>
              </tr>
              <?php } 
            } ?>
          </tbody>
      </table>
      
      </div>
      <div class="pagination haha">
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){ ?>
               <div class ='hi'>  <?php echo '<h4><a href="manage.php?action=experience&&page='.($current_page-1).'"><i class="fas fa-caret-left"></i></a></h4>'?></div>
            <?php }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){ ?>
                    <div class ='hi i'><?php echo '<h6>' .$i.'</h6>' ?></div> 
                 <?php }
                else{ ?>
                    <div class ='hi'> <?php echo '<h6><a href="manage.php?action=experience&&page='.$i.'">'.$i.'</a></h6>' ?></div>
                <?Php }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){?>
                <div class ='hi'> <?php echo '<h4><a href="manage.php?action=experience&&page='.($current_page+1).'"><i class="fas fa-caret-right"></i></a></h4> ' ?> </div>
             <?php }
           ?>
      </div>
    </div>
<?php
require 'index3.php';
}
elseif($_GET['action'] == 'education'){
    require 'ketnoi.php';
    //TÌM TỔNG SỐ RECORDS
            $resultt = mysqli_query($conn, 'SELECT count(mahoctap) as total from hoctap');
            $rowt = mysqli_fetch_assoc($resultt);
            $total_records = $rowt['total'];   
            // TÌM LIMIT VÀ CURRENT_PAGE
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 2;
            // tổng số trang
            $total_page = ceil($total_records / $limit);
            // Giới hạn current_page trong khoảng 1 đến total_page
            if ($current_page > $total_page){
                $current_page = $total_page;
            }
            else if ($current_page < 1){
                $current_page = 1;
            }
            // Tìm Start
            $start = ($current_page - 1) * $limit;
    
            // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
            $sql = "SELECT * from hoctap LIMIT $start, $limit";
            $result = mysqli_query($conn,$sql);
    require 'index2.php';
?>
      <div style ="display: flex;flex-direction: column; align-items: center;">
  <div style = "margin-top : 3%;margin-bottom:3%"><H1>Education</H1></div>
  <div class = "haaa"><button><a href="insert.php?action3=hoctap">ADD</a></button></div>
  <div class = "xem">
      <table class="table ha" >
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
                  <td><div style = "display: flex; justify-content:space-between; width: 100px ;"> <a href="update.php?id8=<?php echo $row['mahoctap'] ?>"><i class="fas fa-wrench"></i></a> <a href="delete.php?id3=<?php echo $row['mahoctap'];?>" onclick = "return confirm('Are you sure want to delete?');"><i class="fas fa-trash-alt"></i></a></div></td>
              </tr>
              <?php } 
            } ?>
          </tbody>
      </table>
      </div>
      <div class="pagination haha">
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){ ?>
               <div class ='hi'>  <?php echo '<h4><a href="manage.php?action=education&&page='.($current_page-1).'"><i class="fas fa-caret-left"></i></a></h4>'?></div>
            <?php }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){ ?>
                    <div class ='hi i'><?php echo '<h6>' .$i.'</h6>' ?></div> 
                 <?php }
                else{ ?>
                    <div class ='hi'> <?php echo '<h6><a href="manage.php?action=eduaction&&page='.$i.'">'.$i.'</a></h6>' ?></div>
                <?Php }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){?>
                <div class ='hi'> <?php echo '<h4><a href="manage.php?action=eduaction&&page='.($current_page+1).'"><i class="fas fa-caret-right"></i></a></h4> ' ?> </div>
             <?php }
           ?>
      </div>
    </div>
<?php
require 'index3.php';
}
elseif($_GET['action'] == 'contact'){
    if(isset($_GET['sendmail']) && $_GET['sendmail'] = "sendmail"){
      require './sendmail/PHPMailerAutoload.php';
      $mail = new PHPMailer(true);                                 // Enable verbose debug output  
      $mail->isSMTP();                                       // Set mailer to use SMTP  
      $mail->Host = 'smtp.gmail.com;';                       // Specify main and backup SMTP servers  
      $mail->SMTPAuth = true;                                // Enable SMTP authentication  
      $mail->Username = 'traituoirong2411@gmail.com';               // your SMTP username  
      $mail->Password = 'sqjjznytuusymvas';                      // your SMTP password  
      $mail->SMTPSecure = 'tls';                             // Enable TLS encryption, `ssl` also accepted  
      $mail->Port = 587;                                     // TCP port to connect to  
      $mail->setFrom('traituoirong2411@gmail.com', 'Pham Thanh Quan');  
      $mail->addAddress($_POST['email']);                 // Name is optional  
      $mail->addReplyTo($_POST['email'], 'Information');  
      //$mail->addCC('cc@example.com');                        // set your CC email address  
      //$mail->addBCC('bcc@example.com');                      // set your BCC email address  
      $mail->isHTML(true);                                   // Set email format to HTML  
      $mail->Subject = ''.$_POST['theme']; 
      $mail->Body  = ''.$_POST['comment'];
      if($mail->send()) { 
          header("location:manage.php?action=contact");
       } else {  
        echo 'Message could not be sent';  
       }
      } 
      else{
    require 'ketnoi.php';
    //TÌM TỔNG SỐ RECORDS
            $resultt = mysqli_query($conn, 'SELECT count(manguoidung) as total from lienhe');
            $rowt = mysqli_fetch_assoc($resultt);
            $total_records = $rowt['total'];   
            // TÌM LIMIT VÀ CURRENT_PAGE
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 5;
            // tổng số trang
            $total_page = ceil($total_records / $limit);
            // Giới hạn current_page trong khoảng 1 đến total_page
            if ($current_page > $total_page){
                $current_page = $total_page;
            }
            else if ($current_page < 1){
                $current_page = 1;
            }
            // Tìm Start
            $start = ($current_page - 1) * $limit;
    
            // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
            $sql = "SELECT * from lienhe LIMIT $start, $limit";
            $result = mysqli_query($conn,$sql);
            $a = 0;
            $b = 0;
    require 'index2.php';?>
      <div style ="display: flex;flex-direction: column; align-items: center;">
  <div style = "margin-top : 3%;margin-bottom:3%"><H1>Comment Management</H1></div>
  <div class = "xem">
      <table class="table ha" >
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
                  <td><div style = "display: flex; justify-content:space-between; width: 100px ;"> <!-- Button trigger modal -->
      <button type="button" class="btn" data-toggle="modal" data-target="#modelId<?php echo $a++ ?>">
      <a  href="#"><i class="fas fa-reply"></i></a>
      </button>
      <!-- Modal -->
      <div class="modal fade" id="modelId<?php echo $b++ ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header" style = "background : black !important">
                      <h5 class="modal-title" style = "color : white !important">Send mail</h5>
                          <button type="button" style = "color : white !important" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                  </div>
             <form action="manage.php?action=contact&&sendmail=sendmail" class="c2" method="POST">
                <div class="c3">
                  <div>
                    <input required="" value = "<?php  echo $row['email'] ?>" type="email" class="form-control" name="email" placeholder="Enter Receiver" title="Please enter a valid email address">
                  </div>
                  <div>
                   <input required="" type="text" class="form-control" name="theme" id="email" placeholder="Enter Theme" title="Please enter a valid email address">
                  </div>
                </div>
                <div class="c3">
                    <textarea required="" name="comment" class="form-control" id="comments" cols="3" rows="5" placeholder="Enter your message…" title="Please enter your message (at least 10 characters)"></textarea>
                </div>
                <div class="modal-footer">
                  <input type="submit" class="btn btn-primary" value ="Submit">
                </div>
             </form>
                  
              </div>
          </div>
      </div>
     <a style = "color :#007bff !important;" class="btn" href="delete.php?id4=<?php echo $row['manguoidung'];?>" onclick = "return confirm('Are you sure want to delete?');"><i class="fas fa-trash-alt"></i></a></div></td>
              </tr>
              <?php } 
            } ?>
          </tbody>
      </table>
      </div><div class="pagination haha">
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){ ?>
               <div class ='hi'>  <?php echo '<h4><a href="manage.php?action=contact&&page='.($current_page-1).'"><i class="fas fa-caret-left"></i></a></h4>'?></div>
            <?php }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){ ?>
                    <div class ='hi i'><?php echo '<h6>' .$i.'</h6>' ?></div> 
                 <?php }
                else{ ?>
                    <div class ='hi'> <?php echo '<h6><a href="manage.php?action=contact&&page='.$i.'">'.$i.'</a></h6>' ?></div>
                <?Php }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){?>
                <div class ='hi'> <?php echo '<h4><a href="manage.php?action=contact&&page='.($current_page+1).'"><i class="fas fa-caret-right"></i></a></h4> ' ?> </div>
             <?php }
           ?>
      </div>
    </div>
<?php
require 'index3.php';
} }
elseif($_GET['action'] == 'language'){
    require 'ketnoi.php';
    //TÌM TỔNG SỐ RECORDS
            $resultt = mysqli_query($conn, 'SELECT count(mangonngu) as total from ngonngu');
            $rowt = mysqli_fetch_assoc($resultt);
            $total_records = $rowt['total'];   
            // TÌM LIMIT VÀ CURRENT_PAGE
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 5;
            // tổng số trang
            $total_page = ceil($total_records / $limit);
            // Giới hạn current_page trong khoảng 1 đến total_page
            if ($current_page > $total_page){
                $current_page = $total_page;
            }
            else if ($current_page < 1){
                $current_page = 1;
            }
            // Tìm Start
            $start = ($current_page - 1) * $limit;
    
            // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
            $sql = "SELECT * from ngonngu LIMIT $start, $limit";
            $result = mysqli_query($conn,$sql);
    require 'index2.php';
?>
      <div style ="display: flex;flex-direction: column; align-items: center;">
  <div style = "margin-top : 3%;margin-bottom:3%"><H1>Programming language</H1></div>
  <div class = "haaa"><button><a href="insert.php?action5=ngonngu">ADD</a></button></div>
  <div class = "xem">
      <table class="table ha" >
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
                  <td><div style = "display: flex; justify-content:space-between; width: 100px ;"><a href="update.php?id5=<?php echo $row['mangonngu'] ?>"><i class="fas fa-wrench"></i></a> <a href="delete.php?id5=<?php echo $row['mangonngu'];?>" onclick = "return confirm('Are you sure want to delete?');"><i class="fas fa-trash-alt"></i></a></div></td>
              </tr>
              <?php } 
            } ?>
          </tbody>
      </table>
      
      
    </div><div class="pagination haha">
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){ ?>
               <div class ='hi'>  <?php echo '<h4><a href="manage.php?action=language&&page='.($current_page-1).'"><i class="fas fa-caret-left"></i></a></h4>'?></div>
            <?php }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){ ?>
                    <div class ='hi i'><?php echo '<h6>' .$i.'</h6>' ?></div> 
                 <?php }
                else{ ?>
                    <div class ='hi'> <?php echo '<h6><a href="manage.php?action=language&&page='.$i.'">'.$i.'</a></h6>' ?></div>
                <?Php }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){?>
                <div class ='hi'> <?php echo '<h4><a href="manage.php?action=language&&page='.($current_page+1).'"><i class="fas fa-caret-right"></i></a></h4> ' ?> </div>
             <?php }
           ?>
      </div>
<?php
require 'index3.php';
}
elseif($_GET['action'] == 'skill'){
    require 'ketnoi.php';
    //TÌM TỔNG SỐ RECORDS
            $resultt = mysqli_query($conn, 'SELECT count(makynang) as total from kynang');
            $rowt = mysqli_fetch_assoc($resultt);
            $total_records = $rowt['total'];   
            // TÌM LIMIT VÀ CURRENT_PAGE
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 5;
            // tổng số trang
            $total_page = ceil($total_records / $limit);
            // Giới hạn current_page trong khoảng 1 đến total_page
            if ($current_page > $total_page){
                $current_page = $total_page;
            }
            else if ($current_page < 1){
                $current_page = 1;
            }
            // Tìm Start
            $start = ($current_page - 1) * $limit;
    
            // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
            $sql = "SELECT * from kynang LIMIT $start, $limit";
            $result = mysqli_query($conn,$sql);
    require 'index2.php'; ?>

      <div style ="display: flex;flex-direction: column; align-items: center;">
  <div style = "margin-top : 3%;margin-bottom:3%"><H1>My Skill</H1></div>
  <div class = "haaa"><button><a href="insert.php?action6=skill">ADD</a></button></div>
  <div class = "xem">
      <table class="table ha" >
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
                  <td><div style = "display: flex; justify-content:space-between; width: 100px ;"><a href="update.php?id6=<?php echo $row['makynang'] ?>"><i class="fas fa-wrench"></i></a> <a href="delete.php?id6=<?php echo $row['makynang'];?>" onclick = "return confirm('Are you sure want to delete?');"><i class="fas fa-trash-alt"></i></a></div></td>
              </tr>
              <?php } 
            } ?>
          </tbody>
      </table>
      
      </div>
      <div class="pagination haha">
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){ ?>
               <div class ='hi'>  <?php echo '<h4><a href="manage.php?action=skill&&page='.($current_page-1).'"><i class="fas fa-caret-left"></i></a></h4>'?></div>
            <?php }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){ ?>
                    <div class ='hi i'><?php echo '<h6>' .$i.'</h6>' ?></div> 
                 <?php }
                else{ ?>
                    <div class ='hi'> <?php echo '<h6><a href="manage.php?action=skill&&page='.$i.'">'.$i.'</a></h6>' ?></div>
                <?Php }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){?>
                <div class ='hi'> <?php echo '<h4><a href="manage.php?action=skill&&page='.($current_page+1).'"><i class="fas fa-caret-right"></i></a></h4> ' ?> </div>
             <?php }
           ?>
      </div>
    </div>
<?php
require 'index3.php';
}
else{
    require 'ketnoi.php';
    //TÌM TỔNG SỐ RECORDS
            $resultt = mysqli_query($conn, 'SELECT count(manguoigioithieu) as total from nguoigioithieu');
            $rowt = mysqli_fetch_assoc($resultt);
            $total_records = $rowt['total'];   
            // TÌM LIMIT VÀ CURRENT_PAGE
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 5;
            // tổng số trang
            $total_page = ceil($total_records / $limit);
            // Giới hạn current_page trong khoảng 1 đến total_page
            if ($current_page > $total_page){
                $current_page = $total_page;
            }
            else if ($current_page < 1){
                $current_page = 1;
            }
            // Tìm Start
            $start = ($current_page - 1) * $limit;
    
            // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
            $sql = "SELECT * from nguoigioithieu LIMIT $start, $limit";
            $result = mysqli_query($conn,$sql);
    require 'index2.php';?>
      <div style ="display: flex;flex-direction: column; align-items: center;">
  <div style = "margin-top : 3%;margin-bottom:3%"><H1>Presenter</H1></div>
  <div class = "haaa"><button><a href="insert.php?action7=nguoigioithieu">ADD</a></button></div>
  <div class = "xem">
      <table class="table ha" >
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
                  <td style = "min-width:200px !important"><?php echo'<img style = "width:7em; height : 7em;" src="data:anh;base64,'.base64_encode($row['anh']).'"alt="Image">'; ?></td>
                  <td><?php echo $row['chucvu'] ?></td>
                  <td><?php echo $row['mota'] ?></td>
                  <td><div style = "display: flex; justify-content:space-between; width: 100px ;"><a href="update.php?id7=<?php echo $row['manguoigioithieu'] ?>"><i class="fas fa-wrench"></i></a> <a href="delete.php?id7=<?php echo $row['manguoigioithieu'];?>" onclick = "return confirm('Are you sure want to delete?');"><i class="fas fa-trash-alt"></i></a></div></td>
              </tr>
              <?php } 
            } ?>
          </tbody>
      </table>
      </div>
      <div class="pagination haha">
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){ ?>
               <div class ='hi'>  <?php echo '<h4><a href="manage.php?action=references&&page='.($current_page-1).'"><i class="fas fa-caret-left"></i></a></h4>'?></div>
            <?php }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){ ?>
                    <div class ='hi i'><?php echo '<h6>' .$i.'</h6>' ?></div> 
                 <?php }
                else{ ?>
                    <div class ='hi'> <?php echo '<h6><a href="manage.php?action=references&&page='.$i.'">'.$i.'</a></h6>' ?></div>
                <?Php }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){?>
                <div class ='hi'> <?php echo '<h4><a href="manage.php?action=references&&page='.($current_page+1).'"><i class="fas fa-caret-right"></i></a></h4> ' ?> </div>
             <?php }
           ?>
      </div>
    </div>
<?php
require 'index3.php';
}
 ?> 
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<?php } ?>
