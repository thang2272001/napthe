<?php
session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");

$dbhost = 'localhost';
$dbname = 'democode';
$dbusername = 'democode';
$dbpassword = 'democode';
//-- Kết Nối PDO --//

// Kiểm tra kết nối
try {
$db = new PDO("mysql:host=localhost;dbname=$dbname", $dbusername, $dbpassword);
$db->exec("set names utf8"); //Set bảng mã
} catch (PDOException $e) {
    //echo $e->getMessage();
    echo'Loi ket noi';
    exit;
}
 
     
     if (isset($_SESSION['uid']) && $_SESSION['uid']){
      //echo $_SESSION['uid'];
    $uid = $_SESSION['uid'];
    $TMQ  = $db->query("SELECT * FROM `TMQ_user` WHERE `uid` = '$uid' ")->fetch();
     }else{
         $TMQ = null;
     } 
     
     
     $website = $_SERVER['SERVER_NAME'];
     $timehoatdong = strtotime(date('2019-07-05 00:00:0'));
     $timehoatdong = (time()-$timehoatdong)/86400;
     $thanhvien  = $db->query("SELECT * FROM `TMQ_user`")->rowCount();
     $thedaban  = $db->query("SELECT * FROM `TMQ_muathe`")->rowCount();
     $chuaban  = $db->query("SELECT * FROM `TMQ_khothe`")->rowCount();
     $tiengachthe = $db->query("SELECT SUM(thucnhan) FROM `TMQ_gachthe`")->fetchColumn();
      $tienbanthe = $db->query("SELECT SUM(trutien) FROM `TMQ_muathe`")->fetchColumn();
     $gd_muathe = $db->query("SELECT * FROM `TMQ_muathe`")->rowCount();
     $gd_banthe = $db->query("SELECT * FROM `TMQ_gachthe`")->rowCount();
     $doanhthu =$tiengachthe + $tienbanthe;
     $allgd = $gd_banthe + $gd_muathe;




