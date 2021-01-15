<?php
session_start(); 
if(!isset($_SESSION['email'])){
    header('location:login.php');
}else{
if(isset($_GET['id'])){
    require 'ketnoi.php';
    $sql = "DELETE from motaban where mamota = '" . $_GET['id'] . "' ";
    $result = mysqli_query($conn,$sql);
    header('location:manage.php?action=about');
}
elseif(isset($_GET['id1'])){
    require 'ketnoi.php';
    $sql = "DELETE from duan where maduan = '" . $_GET['id1'] . "' ";
    $result = mysqli_query($conn,$sql);
    header('location:manage.php?action=project');
}
elseif(isset($_GET['id2'])){
    require 'ketnoi.php';
    $sql = "DELETE from kinhnghiem where makinhnghiem = '" . $_GET['id2'] . "' ";
    $result = mysqli_query($conn,$sql);
    header('location:manage.php?action=experience');
}
elseif(isset($_GET['id3'])){
    require 'ketnoi.php';
    $sql = "DELETE from hoctap where mahoctap = '" . $_GET['id3'] . "' ";
    $result = mysqli_query($conn,$sql);
    header('location:manage.php?action=education');
}
elseif(isset($_GET['id4'])){
    require 'ketnoi.php';
    $sql = "DELETE from lienhe where manguoidung = '" . $_GET['id4'] . "' ";
    $result = mysqli_query($conn,$sql);
    header('location:manage.php?action=contact');
}
elseif(isset($_GET['id5'])){
    require 'ketnoi.php';
    $sql = "DELETE from ngonngu where mangonngu = '" . $_GET['id5'] . "' ";
    $result = mysqli_query($conn,$sql);
    header('location:manage.php?action=language');
}
elseif(isset($_GET['id6'])){
    require 'ketnoi.php';
    $sql = "DELETE from kynang where makynang = '" . $_GET['id6'] . "' ";
    $result = mysqli_query($conn,$sql);
    header('location:manage.php?action=skill');
}
else{
    require 'ketnoi.php';
    $sql = "DELETE from nguoigioithieu where manguoigioithieu = '" . $_GET['id7'] . "' ";
    $result = mysqli_query($conn,$sql);
    header('location:manage.php?action=references');
}}
?>
