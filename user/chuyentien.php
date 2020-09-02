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
        <div class="col-md-10">
           
            

<div class="panel">
    <div class="panel-heading clearfix header-title-right">
        <label class="control-label t20 header-title-lb">CHUYỂN TIỀN</label>
    </div>
    <?php
    if(isset($_POST['chuyentien']) && $_SESSION["token"]==$_POST["_token"]){
        $user_nhan = tmq_boc($_POST['usernhan']);
        $sotien = tmq_boc(intval(abs($_POST['sotien'])));
     
        $total = $sotien+100;
        $saugd_chuyen = $TMQ['cash']-$total;
        
        $check_user = $db->query("SELECT * FROM `TMQ_user` WHERE `uid` = '$user_nhan'")->fetch();
        $saugd_nhan = $check_user['cash']+$sotien;
        if($total > $TMQ['cash']){
               echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button><center>Tài khoản của bạn không đủ để thực hiện giao dịch này. </center></div></div>';
        }elseif(empty($user_nhan) || empty($sotien)){
              echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button><center>Vui lòng nhập đủ thông tin.</center> </div></div>';
        }elseif($check_user['id'] == null){
             echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button><center>Tài khoản nhận không tồn tại</center> </div></div>';
        }elseif($user_nhan == $uid){
             echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button><center>user nhận không được trùng với tài khoản của bạn.</center> </div></div>';
        }else{
            $db->exec("UPDATE `TMQ_user` SET `cash` = `cash` - '$total' WHERE `uid` = '$uid'");
            $db->exec("INSERT INTO `TMQ_chuyentien` SET
            `uid_chuyen` = '$uid',
            `uid_nhan` = '$user_nhan',
            `sotien` = '$sotien',
            `time` = '".date('H:i:s d-m-Y')."'
            ");
            //biến đổi người chuyển
             $db->exec("INSERT INTO `TMQ_biendoi` SET
    `uid` = '$uid',
    `noidung` = 'Chuyển tiền cho #$user_nhan, số tiền ".number_format($sotien)." <sup>đ</sup>, phí GD 100<sup>đ</sup>',
    `truocgd` = '".$TMQ['cash']."',
   `saugd` = '$saugd_chuyen',
    `time` = '". time() ."'
    ");
    
    //biến đổi số dư người nhận
    $db->exec("INSERT INTO `TMQ_biendoi` SET
    `uid` = '$user_nhan',
    `noidung` = 'Nhận tiền từ #$uid, số tiền ".number_format($sotien)." <sup>đ</sup>',
    `truocgd` = '".$check_user['cash']."',
    `saugd` = '$saugd_nhan',
    `time` = '". time() ."'
    ");
    
    
             echo'<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button><center>Thành công</center> </div></div>';
        }
        
    }
    
$salt = "Iui8*&@IJsad".date("Y-m-d H:i:s");
$token = md5($salt.taochuoi(20)); // nhớ viết hàm random riêng
$_SESSION["token"] = $token;
    ?>
        <form class="row" method="POST">
             <input type="hidden" name="_token" value="<?=$token;?>">
          
            <div class="col-md-12">
                <div class="col-md-12 has-textbox">
                    <div class="form-group row">
                        <span class="col-md-4 control-label RoM ar">Tài khoản nhận:</span>
                        <div class="col-md-8">
                            <input class="form-control t14 RoM" id="usernhan" name="usernhan" placeholder="Nhập tài khoản nhận tiền" type="text" value="" />
                         
                        </div>
                    </div>
                </div>
                <div id="nguoinhan"></div>
                
                <div class="col-md-12 has-textbox">
                    <div class="form-group row">
                        <span class="col-md-4 control-label RoM ar">Phí chuyển tiền:</span>
                        <div class="col-md-8">
                            <input type="text" id="Name" class="form-control t14 RoR" placeholder="" value="100VNĐ,VD: chuyển 100K sẽ mất 100.100VNĐ" disabled="disabled">
                        </div>
                    </div>
                </div>
                
                
                <hr />
              

                <div class="col-md-12 has-textbox">
                    <div class="form-group row">
                        <span class="col-md-4 control-label RoM ar">Số tiền chuyển:</span>
                        <div class="col-md-8">
                            <input name="sotien" type="number" class="form-control t14 RoR" min="0" placeholder="Số tiền chuyển" value="">
                        </div>
                    </div>
                </div>
                
                
            
                <center><div class="col-md-12">
                    <div class="form-group">
                            <input type="submit" name="chuyentien" class="btn btn-success col-xs-12 col-md-4 col-md-offset-5" value="Thực hiện" />

                    </div>
                </div></center>
                

            </div>
            
        </form>
                   
             

       
    </div>

  
</div>



 <div class="panel-heading clearfix header-title-right">
        <label class="control-label t20 header-title-lb" style="padding-top: 20px;">LỊCH SỬ CHUYỂN TIỀN</label>
    </div>
    <form class="" id="form_search" style="display:none;">
        <div class="box-body">

        </div>
    </form>
   <div id="divTable" class="nthoa_table" data-page="1">
    <table id="tb_hisser" class="table-bordered table-striped table-condensed cf dataTable no-footer" style="width: 100%;line-height: 2;">
        <thead class="cf">
            <tr>
               
                <th class="f-xs " align="left" data-title="Tài khoản">Tài khoản nhận</th>
                <th class="f-xs " align="left" data-title="Số tiền trừ">Số tiền trừ</th>
                <th class="f-xs " align="left" data-title="Số tiền nhận">Số tiền nhận</th>
                <th class="f-xs " align="left" data-title="Thời gian">Thời gian</th>
                </tr></thead>
                 <tbody>
                
            <?php 
            $TMQ_dulieu = $db->query("SELECT * FROM `TMQ_chuyentien` WHERE `uid_chuyen` = '$uid'");
            foreach($TMQ_dulieu as $chuyentien){
                ?>
                    <tr>
      
        <td><?=$chuyentien['uid_nhan'];?></td>
        <td><?=number_format($chuyentien['sotien']+100);?><sup>đ</sup></td>
        <td><?=number_format($chuyentien['sotien']);?><sup>đ</sup></td>
        <td><?=$chuyentien['time'];?></td>
                        </tr>
                
        <?php    }    ?>
    
                
                
               
                    
                    </tbody>
                    
                    </table>
                    





</div>

</div>

</div>

</div>

</div>

</div>

<br />
<br />


<script>
    $(document).ready(function() {
  $('#usernhan').keyup(function() {
  var taikhoan = $('#usernhan').val();
$('#nguoinhan').html('<div class="col-md-12 has-textbox"><div class="form-group row"><span class="col-md-4 control-label RoM ar">Phí chuyển tiền:</span><div class="col-md-8"><input type="text" id="Name" class="form-control t14 RoR" placeholder="" value="" disabled="disabled"></div></div></div>');

$.ajax({
url : '/check_chuyentien.php',
type : 'POST',
data : {taikhoan : taikhoan},
success : function(result){
				$('#nguoinhan').html(result);	
}
});
}) 
});
</script>



<?php require("../TMQ/end.php"); ?>