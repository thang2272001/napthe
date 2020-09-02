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
        <label class="control-label t20 header-title-lb">RÚT TIỀN</label>
    </div>
    <?php
    if(isset($_POST['ruttien']) && $_SESSION["token"]==$_POST["_token"]){
        $taikhoan = tmq_boc($_POST['taikhoan']);
        $sotien = tmq_boc(intval(abs($_POST['sotien'])));
        $hinhthuc = tmq_boc($_POST['hinhthuc']);
        $total = $sotien+5000;
        if($total > $TMQ['cash']){
                echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><center>Tài khoản của bạn không đủ để thực hiện giao dịch này.</center> </div></div>';
        }elseif(empty($taikhoan) || empty($sotien) || empty($hinhthuc)){
                                   echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><center>Vui lòng nhập đủ thông tin.</center> </div></div>';
        }else{
            $db->exec("UPDATE `TMQ_user` SET `cash` = `cash` - '$total' WHERE `uid` = '$uid'");
            $db->exec("INSERT INTO `TMQ_ruttien` SET
            `uid` = '$uid',
            `bank` = '$hinhthuc',
            `stk` = '$taikhoan',
            `amount` = '$sotien',
            `trangthai` = 'Chờ GD',
            `time` = '".date('H:i:s d-m-Y')."'
            ");
            echo'<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><center>Thành công</center> </div></div>';
        }
        
    }
    
$salt = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ".date("Y-m-d H:i:s");
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
                            <input class="form-control t14 RoM" name="taikhoan" placeholder="Nhập tài khoản nhận tiền" type="text" value="" />
                         
                        </div>
                    </div>
                </div>
                
                
                <div class="col-md-12 has-textbox">
                    <div class="form-group row">
                        <span class="col-md-4 control-label RoM ar">Phí Rút tiền:</span>
                        <div class="col-md-8">
                            <input type="text" id="Name" class="form-control t14 RoR" placeholder="" value="5.000VNĐ,VD: Rút 100K sẽ mất 105K" disabled="disabled">
                        </div>
                    </div>
                </div>
                
                
                <hr />
              

                <div class="col-md-12 has-textbox">
                    <div class="form-group row">
                        <span class="col-md-4 control-label RoM ar">Số tiền rút:</span>
                        <div class="col-md-8">
                            <input name="sotien" type="number" class="form-control t14 RoR" min="0" placeholder="Số tiền chuyển" value="">
                        </div>
                    </div>
                </div>
                
                
                
                <div class="col-md-12 has-textbox">
                    <div class="form-group row">
                        <span class="col-md-4 control-label RoM ar">Hình thức nhận:</span>
                        <div class="col-md-8">
                            <select class="form-control" data-live-search="true" name="hinhthuc">
                        <?php for($i = 8; $i <= 12;$i++){ ?>
                         <option value="<?=string_bank($i);?>"><?=string_bank($i);?></option>
                        <?php } ?>

                        </select>
                        </div>
                    </div>
                </div>
                
                
                

            

                <div class="col-md-12 has-textbox">
                    <div class="form-group row">
                        <span class="col-md-4 control-label RoM ar"></span>
                        <span class="col-md-8 control-label RoL" style="color:#fa044d;">
                            <i>
                                Vui lòng nhập đúng thông tin để chúng tôi xử lý một cách nhanh nhất.
                            </i>
                        </span>
                    </div>
                </div>
                <center><div class="col-md-12">
                    <div class="form-group">
                            <input type="submit" name="ruttien" class="btn btn-success col-xs-12 col-md-4 col-md-offset-5" value="Thực hiện" />

                    </div>
                </div></center>
                

            </div>
            
        </form>
                   
             

       
    </div>

  
</div>



 <div class="panel-heading clearfix header-title-right">
        <label class="control-label t20 header-title-lb" style="padding-top: 20px;">LỊCH SỬ RÚT TIỀN</label>
    </div>
    <form class="" id="form_search" style="display:none;">
        <div class="box-body">

        </div>
    </form>
   <div id="divTable" class="nthoa_table" data-page="1">
    <table id="tb_hisser" class="table-bordered table-striped table-condensed cf dataTable no-footer" style="width: 100%;line-height: 2;">
        <thead class="cf">
            <tr>
                <th class="f-xs " align="left" data-title="Tình trạng">Tình trạng</th>
                <th class="f-xs " align="left" data-title="Hình thức">Hình thức</th>
                <th class="f-xs " align="left" data-title="Tài khoản">Tài khoản</th>
                <th class="f-xs " align="left" data-title="Số tiền trừ">Số tiền trừ</th>
                <th class="f-xs " align="left" data-title="Số tiền nhận">Số tiền nhận</th>
                <th class="f-xs " align="left" data-title="Thời gian">Thời gian</th>
                </tr></thead>
                 <tbody>
                
            <?php 
            $TMQ_dulieu = $db->query("SELECT * FROM `TMQ_ruttien` WHERE `uid` = '$uid'");
            foreach($TMQ_dulieu as $ruttien){
                ?>
                    <tr>
        <td><?=$ruttien['trangthai'];?></td>
        <td><?=$ruttien['bank'];?></td>
        <td><?=$ruttien['stk'];?></td>
        <td><?=number_format($ruttien['amount']+5000);?><sup>đ</sup></td>
        <td><?=number_format($ruttien['amount']);?><sup>đ</sup></td>
        <td><?=$ruttien['time'];?></td>
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






<?php require("../TMQ/end.php"); ?>