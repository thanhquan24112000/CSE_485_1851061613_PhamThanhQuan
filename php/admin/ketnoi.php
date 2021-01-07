<?php 
//ket noi mysql
$db = array(
    'server' => 'localhost',
    'username' => 'root',
    'password' => '',
    'dbname' => 'btl'
);
$conn = mysqli_connect($db['server'],$db['username'],$db['password'],$db['dbname']);
if(!$conn){
    die('error connect'.mysqli_connect_error($conn));
}