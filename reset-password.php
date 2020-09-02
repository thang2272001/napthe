<?php
/*
**********************************************************
+ Tên code: website gạch thẻ                             +
+ Người viết: TMQ                                        +
+ Vui lòng không xóa bản quyền để tôn trọng tác giả      +
+ LIÊN HỆ: tmquang0209@gmail.com                         +
**********************************************************
*/
    # Import Hệ thống
  
    require('TMQ/function.php');
    if (!empty($uid)){
        header('Location: /');
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
if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"]=="reset") && !isset($_POST["action"])){
$key = $_GET["key"];
$email = $_GET["email"];
$curDate = date("Y-m-d H:i:s");

$check = $db->query("SELECT * FROM `TMQ_key` WHERE `key` = '$key'")->fetch();
if($check['key'] == null){
    echo "Liên kết không tồn tại.";
}elseif($check['time'] >= $curDate){


?>
               
            	<form method="post" action="" name="update">
	<input type="hidden" name="action" value="update" />
    <input type="hidden" name="email" value="<?php echo $email;?>"/>            
                  <div class="form-group has-feedback">
                                <input type="text" id="pass" name="pass" class="form-control input-lg no-border" required="" placeholder="Mật khẩu">
                                <span class="fa fa-user t40 form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" id="re-pass" name="re-pass" class="form-control input-lg no-border" required="" placeholder="Nhập lại mật khẩu">
                                <span class="fa fa-lock t40 form-control-feedback"></span>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button type="submit" id="login" name="login" class="btn btn-gray btn-lg btn-block no-border">Đăng nhập</button>
                                </div>
                            </div>
            </form>
            <!-- /.social-auth-links -->
        </div>
        <!-- /.login-box-body -->
<?php }else{ ?>
Lỗi!
<?php } }

if(isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"]=="update")){

$pass = tmq_boc($_POST["pass"]);
$re_pass = tmq_boc($_POST["re-pass"]);
$email = tmq_boc($_POST['email']);

if(empty($pass) || empty($re_pass)){
    echo "Vui lòng nhập đủ dữ liệu.";
}elseif($pass != $re_pass){
    echo "2 mật khẩu không trùng nhau.";
}else{
    $db->exec("UPDATE `TMQ_user` SET `matkhau` = '".md5($pass)."' WHERE `email` = '".$email."' ");
    $db->exec("DELETE FROM `TMQ_key` WHERE `email` = '".$email."' ");
    echo "<div class='alert alert-success'>
    <strong>Thành công!</strong>  Vui lòng đăng nhập.</div>";
} }?>
    </div>
    <!-- /.login-box -->

			<!-- END: PAGE CONTENT -->
</div>
