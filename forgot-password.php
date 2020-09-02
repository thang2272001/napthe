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
?><!DOCTYPE html>
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
                            if(isset($_POST['laymk'])){
                            $email = tmq_boc($_POST['email']);
                            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                            $email = filter_var($email, FILTER_VALIDATE_EMAIL);
                              
                              $check = $db->query("SELECT * FROM `TMQ_user` WHERE `email` = '$email'");
               
                if($check->fetch()['id'] == null){
                                  echo '<div class="alert alert-danger">
    <strong>Thất bại!</strong> Tài khoản hoặc mật khẩu không chính xác.</div>';
                }elseif(empty($email)){
                 echo "<div class='alert alert-success'>
    <strong>Thất bại!</strong> Vui lòng nhập đủ thông tin.</div>";    
                
                              }else{
                               	$expFormat = mktime(date("H"), date("i"), date("s"), date("m")  , date("d")+1, date("Y"));
	$expDate = date("Y-m-d H:i:s",$expFormat);
	$key = md5(2418*2+$email);
	$addKey = substr(md5(uniqid(rand(),1)),3,10);
	$key = $key . $addKey;
//lưu key vào sql
$db->exec("INSERT INTO `TMQ_key` SET
`email` = '$email',
`key` = '$key',
`time` = '$expDate'");

$output='<p>Chào bạn,</p>';
$output.='<p>Để lấy lại mật khẩu, vui lòng nhấp vào liên kết sau.</p>';
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p><a href="https://'.$website.'/reset-password.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">https://'.$website.'/reset-password.php?key='.$key.'&email='.$email.'&action=reset</a></p>';		
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p>Hãy chắc chắn sao chép toàn bộ liên kết vào trình duyệt của bạn.
Liên kết sẽ hết hạn sau 1 ngày vì lý do bảo mật.</p>';
$output.='<p>Nếu bạn không yêu cầu email quên mật khẩu này, không có hành động
là cần thiết, mật khẩu của bạn sẽ không được thiết lập lại. Tuy nhiên, bạn có thể muốn đăng nhập vào
tài khoản của bạn và thay đổi mật khẩu bảo mật của bạn như ai đó có thể đã đoán được.</p>';   	
$output.='<p>Thanks,</p>';
$output.='<p>TMQ</p>';
$body = $output; 
$subject = "Quen mat khau - $website";

$email_to = $email;
$fromserver = "xxx@gmail.com"; 
require("PHPMailer/PHPMailerAutoload.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = "smtp.gmail.com"; // Enter your host here
$mail->SMTPAuth = true;
$mail->Username = "xxx@gmail.com"; // Enter your email here
$mail->Password = "quangdz123"; //Enter your passwrod here
$mail->Port = 25;
$mail->IsHTML(true);
$mail->From = "xxx@gmail.com";
$mail->FromName = "TMQ";
$mail->Sender = $fromserver; // indicates ReturnPath header
$mail->Subject = $subject;
$mail->Body = $body;
$mail->AddAddress($email_to);
if(!$mail->Send()){
echo "Mailer Error: " . $mail->ErrorInfo;
}else{

   echo "<div class='alert alert-success'>
    <strong>Thành công!</strong> Link kích hoạt đã được gửi về mail.</div>";
}
                              }
                              
                            }
                            ?>
<form method="POST">
                            <div class="form-group">
                                <input type="text" id="email" name="email" class="form-control input-lg no-border" required="" placeholder="Nhập email để lấy mã kích hoạt">
                                
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-12">
                                    <button type="submit" id="laymk" name="laymk" class="btn btn-gray btn-lg btn-block no-border">Lấy lại mật khẩu</button>
                                </div>
                            </div>

                            <!-- /.social-auth-links -->
                           
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
