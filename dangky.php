<?php
/*
**********************************************************
+ Tên code: website gạch thẻ                             +
+ Người viết: TMQ                                        +
+ Vui lòng không xóa bản quyền để tôn trọng tác giả      +
+ LIÊN HỆ: tmquang0209@gmail.com                         +
**********************************************************
*/
require("TMQ/function.php");
if(isset($uid) != null){
header('location: /');
}?>
<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <title>Đăng ký - <?=$website;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="PGO" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="PVN" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap  -->
    <link href="../assets/frontend/theme/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/frontend/css/LTE.css">
    <script src="../Scripts/jquery-3.3.1.js"></script>
    <!-- SweetAlert Plugin Js -->
    <script src="../Scripts/sweetalert/sweetalert.min.js"></script>
    <script src="../Scripts/helpers.js"></script>
    <!-- Bootstrap -->
    <script src="../assets/frontend/theme/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../Scripts/loadingoverlay/loadingoverlay.min.js"></script>
    <script src="../Scripts/loadingoverlay/loadingoverlay_progress.min.js"></script>
    <!-- Sweetalert Css -->
    <link href="../Scripts/sweetalert/sweetalert.css" rel="stylesheet" />
    <!-- //Custom Theme files -->
    <!-- web font -->
    <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- //web font -->
</head>
<body>
    <div class="loader"></div>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('../img/Login_bg.jpg'); ">
            <div class="login-box">
             
                 
                    <div class="login-box-body">
                        <div class="login-logo">
                            <a href="/"><img src="<?=caidat('logo');?>" alt="" title="" media-simple="true" style="width: 115px;"></a>
                        </div>
                        </br>
                        <!--<h2 class="login-box-msg">QUÊN MẬT KHẨU</h2>-->
                        <?php if(isset($_POST['dangky'])){
                         $name = tmq_boc($_POST['name']);
                         $taikhoan = tmq_boc($_POST['username']);
                         $email = tmq_boc($_POST['email']);
                         $matkhau = tmq_boc($_POST['password']);
                         $rematkhau = tmq_boc($_POST['repassword']);
                         
                         $check = $db->query("SELECT * FROM `TMQ_user` WHERE `uid` = '$taikhoan'");
                         $check_mail = $db->query("SELECT * FROM `TMQ_user` WHERE `email` = '$email'");
                       
    if(empty($name) || empty($taikhoan) || empty($email) || empty($matkhau) || empty($rematkhau)){
                             echo"<div class='alert alert-danger'>
    <strong>Thất bại!</strong> Vui lòng nhập đủ thông tin</div>";
                         }elseif($matkhau != $rematkhau){
                             echo"<div class='alert alert-danger'>
    <strong>Thất bại!</strong> Hai mật khẩu không trùng nhau.</div>";
                         }elseif($check->fetch()['id'] != null){
                             echo"<div class='alert alert-danger'>
    <strong>Thất bại!</strong> Tài khoản đã tồn tại trên hệ thống.</div>";
                         }elseif($check_mail->fetch()['id'] != null){
                             echo"<div class='alert alert-danger'>
    <strong>Thất bại!</strong> Email đã tồn tại trên hệ thống.</div>";
                         }else{
                             $db->exec("
                             INSERT INTO `TMQ_user` SET
                             `uid` = '$taikhoan',
                             `matkhau` = '".md5($matkhau)."',
                             `name` = '$name',
                             `email` = '$email',
                             `cash` = '0',
                             `admin` = '0',
                             `ban` = '0',
                             `date` = '".date('d-m-Y')."'
                             ");
                             
                             echo "<div class='alert alert-success'>
    <strong>Thành công!</strong> Tạo tài khoản thành công.</div>";
                         
                             
                         }
                            
                        }
                        ?>
<form method="POST">                        
                        <div>
                            <div class="form-group">
                                <input type="text" name="name" class="form-control input-lg no-border" placeholder="Họ và tên" value="<?php if(!empty($name)){echo $name;} ?>">
                                <!--<span class="fa fa-user t40 form-control-feedback"></span>-->
                            </div>
                           
                            <div class="form-group">
                                <input type="text"  name="username" class="form-control input-lg no-border" placeholder="Tài khoản" value="<?php if(!empty($taikhoan)){echo $taikhoan;} ?>">
                                <!--<span class="fa fa-phone t40 form-control-feedback"></span>-->
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control input-lg no-border" placeholder="Email" value="<?php if(!empty($email)){echo $email;} ?>">
                                <!--<span class="fa fa-phone t40 form-control-feedback"></span>-->
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control input-lg no-border" placeholder="Mật khẩu">
                                <!--<span class="fa fa-lock t40 form-control-feedback"></span>-->
                            </div>
                            <div class="form-group">
                                <input type="password" name="repassword" class="form-control input-lg no-border" placeholder="Xác nhận mật khẩu">
                                <!--<span class="fa fa-lock t40 form-control-feedback"></span>-->
                            </div>
                         
                            <div class="row">
                                <div class="col-xs-12">
                                    <button type="submit" id="dangky" name="dangky" class="btn btn-gray btn-lg btn-block no-border">Đăng ký</button>
                                </div>
                            </div>
</form>
                            <!-- /.social-auth-links -->
                            <div class="login-fg text-center">
                                <i style="color:#616161;">Đã có tài khoản ? </i>
                                <a href="/login" class="bb t16" style="color:#616161;">Đăng nhập</a>
                            </div>
                            </br>
                        </div>

                    </div>
                
            </div>
        </div>
    </div>


<!-- Mirrored from gachthe.vn/SYS_Users/Register by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 Sep 2019 04:26:38 GMT -->
</html>