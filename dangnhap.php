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
}
?>
<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đăng nhập - <?=$website;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="PVN" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap  -->
    <link href="../assets/frontend/theme/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/frontend/css/LTE.css">
    <script src="../Scripts/jquery-3.3.1.js"></script>
    <!-- SweetAlert Plugin Js -->
    <script src="/Scripts/sweetalert/sweetalert.min.js"></script>
    <script src="/Scripts/helpers.js"></script>
    <!-- Bootstrap -->
    <script src="/assets/frontend/theme/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/Scripts/loadingoverlay/loadingoverlay.min.js"></script>
    <script src="/Scripts/loadingoverlay/loadingoverlay_progress.min.js"></script>
    <!-- Sweetalert Css -->
    <link href="/Scripts/sweetalert/sweetalert.css" rel="stylesheet" />
    <!-- //Custom Theme files -->
    <!-- web font -->
    <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- //web font -->
    
    
    
    
     
    
    
</head>
<body class="hold-transition login-page">
    <div class="loader"></div>
    <div class="limiter">
        <input type="hidden" id="mess" value="" />
        <div class="container-login100" style="background-image: url('/img/Login_bg.jpg'); ">
            <div class="login-box">
                <form action="#" method="post" id="frmlogin">
                    <div id="trangthai"></div>
                    <!-- /.login-logo -->
                    <div class="login-box-body">
                        <div class="login-logo">
                            <a href="/"><img src="<?=caidat('logo');?>" alt="" title="" media-simple="true" style="width: 115px;"></a>
                        </div>
                        </br>
                        <!--<h2 class="login-box-msg">QUÊN MẬT KHẨU</h2>-->
                        <div>
                            
                            <?php 
                            if(isset($_POST['login'])){
                              $taikhoan = tmq_boc($_POST['username']);
                              $matkhau = tmq_boc($_POST['password']);
                              
                              $check = $db->query("SELECT * FROM `TMQ_user` WHERE `uid` = '$taikhoan' AND `matkhau` = '".md5($matkhau)."'");
                              
                              if(empty($taikhoan) || empty($matkhau)){
                                  echo "<div class='alert alert-danger'>
    <strong>Thất bại!</strong> Vui lòng nhập đủ thông tin</div>";
                              }elseif($check->fetch()['id'] == null){
                                  echo '<div class="alert alert-danger">
    <strong>Thất bại!</strong> Tài khoản hoặc mật khẩu không chính xác.</div>';
                              }else{
                                  $_SESSION['uid'] = $taikhoan;
                                  echo "<div class='alert alert-success'>
    <strong>Thành công!</strong> Đăng nhập thành công.</div>";
    echo '<meta http-equiv="refresh" content="3;url=/">
        <script type="text/javascript">
            window.location.href = "/"
        </script>';
                              }
                              
                            }
                            ?>
<form method="POST">
                            <div class="form-group has-feedback">
                                <input type="text" id="username" name="username" class="form-control input-lg no-border" required="" placeholder="Tài khoản">
                                <span class="fa fa-user t40 form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" id="password" name="password" class="form-control input-lg no-border" required="" placeholder="Mật khẩu">
                                <span class="fa fa-lock t40 form-control-feedback"></span>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button type="submit" id="login" name="login" class="btn btn-gray btn-lg btn-block no-border">Đăng nhập</button>
                                </div>
                            </div>

                            <!-- /.social-auth-links -->
                            <div class="login-fg">
                                <a target="_blank" href="/forgot-password.html"><span class="logo-lg">Quên mật khẩu</span></a>
                                <a href="/dangky" class="r">Đăng ký</a>
                            </div>
                            </br>
                        </div>
</form>

                    </div>
                </form>
            </div>
        </div>
    </div>

 
</body>


</html>
