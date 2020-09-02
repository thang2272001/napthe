<?php
/*
**********************************************************
+ Tên code: website gạch thẻ                             +
+ Người viết: TMQ                                        +
+ Vui lòng không xóa bản quyền để tôn trọng tác giả      +
+ LIÊN HỆ: tmquang0209@gmail.com                         +
**********************************************************
*/
require("../TMQ/function.php");
if(isset($uid) == null){
    header('Location: /login');
}
require("../TMQ/head.php");
require("../TMQ/menu.php");
?>
  <div class="col-md-9">
            <div class="clearfix"></div>
            
<style>
    .header-title-buy {
        padding: 10px 15px 5px 15px;
        background: #bbe7fe;
    }
</style>                
        <div class="col-md-9">
           
            

<div class="panel">
    <div class="panel-heading clearfix header-title-right">
        <label class="control-label t20 header-title-lb">ĐỔI MẬT KHẨU</label>
    </div>
    <?php
    if(isset($_POST['change-password'])){
      $passcu = tmq_boc($_POST['pass-old']);
      $passmoi = tmq_boc($_POST['pass-new']);
      $repassmoi = tmq_boc($_POST['re-pass-new']);
      
      if(empty($passcu) || empty($passmoi) || empty($repassmoi)){
             echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><center>Vui lòng nhập đủ thông tin.</center> </div></div>';
      }elseif($passmoi != $repassmoi){
            echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><center>2 mật khẩu không trùng nhau</center> </div></div>';
      }elseif($passcu == $passmoi){
             echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><center>Mật khẩu cũ và mới không được giống nhau.</center> </div></div>';
      }elseif(md5($passcu) != $TMQ['matkhau']){
            echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><center>Mật khẩu cũ không chính xác</center> </div></div>';
      }else{
          $db->exec("UPDATE `TMQ_user` SET `matkhau` = '".md5($passmoi)."' WHERE `uid` = '$uid'");
             echo'<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><center>Đổi mật khẩu thành công.</center> </div></div>';
      }
    }
    ?>
        <form class="row" method="POST">
          
            <div class="col-md-11">
                
                
                <div class="col-md-12 has-textbox">
                    <div class="form-group row">
                        <span class="col-md-4 control-label RoM ar">Mật khẩu cũ:</span>
                        <div class="col-md-8">
                            <input class="form-control t14 RoM" name="pass-old" placeholder="Nhập mật khẩu hiện tại" type="password" value="" />
                         
                        </div>
                    </div>
                </div>
                
                
                <div class="col-md-12 has-textbox">
                    <div class="form-group row">
                        <span class="col-md-4 control-label RoM ar">Mật khẩu mới:</span>
                        <div class="col-md-8">
                            <input class="form-control t14 RoM" name="pass-new" placeholder="Nhập mật khẩu muốn đổi" type="password" value="" />
                            
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 has-textbox">
                    <div class="form-group row">
                        <span class="col-md-4 control-label RoM ar">Xác nhận mật khẩu mới:</span>
                        <div class="col-md-8">
                            <input class="form-control t14 RoM" name="re-pass-new" placeholder="Nhập lại mật khẩu muốn đổi" type="password" value="" />
                         
                        </div>
                    </div>
                </div>
                
            
                <center><div class="col-md-12">
                    <div class="form-group">
                            <input type="submit" name="change-password" class="btn btn-success col-xs-12 col-md-4 col-md-offset-5" value="Thực hiện">

                    </div>
                </div></center>
                

            </div>
            
        </form>
                   
              

        </div>
    </div>

    <div class="clearfix"></div>
</div>
</div>
</div>
</div></div>
</div>
<?php require("../TMQ/end.php"); ?>