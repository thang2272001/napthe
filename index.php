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
require("TMQ/head.php");
require("TMQ/menu.php");

?>


        
        <div class="col-md-9">
            <div class="clearfix"></div>
            
<style>
    .header-title-buy {
        padding: 10px 15px 5px 15px;
        background: #bbe7fe;
    }
</style>

<div class="panel">
    <div class="header-ball">
        <div class="col-md-12 header-title-buy">
            <div class="">
               <?=caidat('tb_napthe');?>

            </div>
        </div>
    </div>

    <div class="panel-heading clearfix header-title-right">
        <label class="control-label t20 header-title-lb">GẠCH THẺ CHẬM</label>
    </div>
    <?php
if(isset($_POST['guithe'])){
    
    $network = tmq_boc($_POST['Network']);
    $menhgia = tmq_boc(intval($_POST['InputValue']));
    $serial = tmq_boc(intval($_POST['CardSeri']));
    $mathe = tmq_boc(intval($_POST['CardCode']));
    $ck = $db->query("SELECT * FROM `TMQ_chietkhau` WHERE `loaithe` = '$network'")->fetch();
   $thucnhan = $menhgia * (100-$ck[$menhgia])/100;
    //kiểm tra thẻ đã tồn tại trên hệ thống
$check_sr = $db->query("SELECT * FROM `TMQ_gachthe` WHERE `serial` = '$serial'");
$check_mt = $db->query("SELECT * FROM `TMQ_gachthe` WHERE `mathe` = '$mathe'");


     if(empty($network) || empty($menhgia) || empty($serial) || empty($mathe)){
         echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                 Vui lòng điền đủ thông tin.</div>
            </div>';
     }elseif(!isset($uid)){
           echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                 Vui lòng đăng nhập để sử dụng dịch vụ.</div>
            </div>';
     
  }elseif($check_sr->fetch()['id'] != null || $check_mt->fetch()['id'] != null){
    echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                 Thẻ đã tồn tại trên hệ thống. Vui lòng kiểm tra lại</div>
            </div>';
           }else{
       $db->exec("INSERT INTO `TMQ_gachthe` SET
       `uid` = '$uid',
       `serial` = '$serial',
       `mathe` = '$mathe',
       `menhgia` = '$menhgia',
       `thucnhan` = '$thucnhan',
       `loaithe` = '$network',
       `trangthai` = 'Chờ Duyệt',
       `time` = '".date('h:i:s d-m-Y')."'
       ");
        echo '<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                Thành công! Vui lòng chờ 5-10p để duyệt thẻ.</div>
            </div>';    
    }
}
?>
    <form class="row" id="frmWithDraw" method="POST">
        <div class="content_post">
<div id="trangthai"></div>
            <div class="col-md-12" style="margin-top: 15px;">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">Tài khoản hiện có</span>
                        <input class="form-control cored" disabled="disabled" id="Money" name="Money" type="text" value="<?php if(empty($uid)){echo""; }else{ echo number_format($TMQ['cash']); }?>" />

                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">Nhà mạng</span>
                        <select class="form-control" data-live-search="true" name="Network" id="Network">
                            <option value="">Chọn nhà mạng</option>
                                  <?php 
                                  $get = $db->query("SELECT * FROM `TMQ_network` WHERE `trangthai` = '1'");
                                  
                                  foreach($get as $network){
                                      
                                      echo"<option value='".$network['ten']."'>".$network['ten']."</option> ";
                                      
                                  }
                                  ?>

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">Mệnh giá</span>
                        <select class="form-control" name="InputValue">
                            <option value="">Chọn mệnh giá</option>
                            <option value="10000">10.000<sup>đ</sup></option>
                            <option value="20000">20.000<sup>đ</sup></option>
                            <option value="30000">30.000<sup>đ</sup></option>
                            <option value="50000">50.000<sup>đ</sup></option>
                            <option value="100000">100.000<sup>đ</sup></option>
                            <option value="200000">200.000<sup>đ</sup></option>
                            <option value="300000">300.000<sup>đ</sup></option>
                            <option value="500000">500.000<sup>đ</sup></option>
                            <option value="1000000">1.000.000<sup>đ</sup></option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">Số Seri</span>
                        <input class="form-control" type="text" name="CardSeri" id="CardSeri" placeholder="Nhập số seri của thẻ" />
                    </div>
                </div>

             
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">Mã thẻ</span>
                        <input class="form-control" type="text" name="CardCode" id="CardCode" placeholder="Nhập mã thẻ dưới lớp cào" />
                    </div>
                </div>


                <div class="form-group" style="display: none">
                    <div class="input-group">
                        <span class="input-group-addon capcha" style="padding: 0;"><img id="imgCaptcha" style="border: 0px solid #ccc; border-radius: 0px;cursor: pointer; min-width: 100%; padding: 0; margin: 0; text-align: center; max-height: 32px;" id="imgcaptcha" src="/Image/Captcha?1166" onclick="document.getElementById('imgcaptcha').src = '/Image/Captcha?'+ Math.random(); document.getElementById('captcha').focus();"></span>
                        <input id="captcha" name="captcha" type="text" class="form-control" placeholder="Nhập mã xác nhận">
                    </div>
                </div>

                <div class="form-group" style="margin-top: 20px;">
                        <button type="submit" name="guithe" class="col-md-4 col-xs-5 col-xs-offset-4 btn btn-success">Nạp thẻ</button>
                </div>

                <div class="clearfix"></div>
                <div class="form-group text-center" style="margin-top: 20px;" id="divResult">

                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </form>
    
    <div class="panel-heading clearfix header-title-right">
        <label class="control-label t20 header-title-lb">BẢNG GIÁ</label>
    </div>
    <div class="header-ball">
        <div class="col-md-12 header-title-buy">
            <div class=" nthoa_table">
                <table class="table table-bordered table-hover table-responsive nthoa_table">
                    <tr>
                        <th class="text-center">Nhà mạng</th>
                        <th class="text-center">10.000</th>
                        <th class="text-center">20.000</th>
                        <th class="text-center">30.000</th>
                        <th class="text-center">50.000</th>
                        <th class="text-center">100.000</th>
                        <th class="text-center">200.000</th>
                        <th class="text-center">300.000</th>
                        <th class="text-center">500.000</th>
                        <th class="text-center">1.000.000</th>
                    </tr>
<?php
$dulieu = $db->query("SELECT * FROM `TMQ_chietkhau`");
foreach($dulieu as $dl){
?>
                    <tr>
        <td class="text-center"><?=$dl['loaithe'];?></td>
        <td class="text-center"><?=$dl['10000'];?></td>
        <td class="text-center"><?=$dl['20000'];?></td>
        <td class="text-center"><?=$dl['30000'];?></td>
        <td class="text-center"><?=$dl['50000'];?></td>
        <td class="text-center"><?=$dl['100000'];?></td>
        <td class="text-center"><?=$dl['200000'];?></td>
        <td class="text-center"><?=$dl['300000'];?></td>
        <td class="text-center"><?=$dl['500000'];?></td>
        <td class="text-center"><?=$dl['1000000'];?></td>
                    </tr>
             <?php } ?>
                </table>

            </div>
        </div>
    </div>

    <div class="panel-heading clearfix header-title-right">
        <label class="control-label t20 header-title-lb" style="padding-top: 20px;">LỊCH SỬ GẠCH THẺ (10 THẺ NẠP GẦN NHẤT)</label>
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
                <th class="f-xs " align="left" data-title="Mã thẻ">Mã thẻ</th>
                <th class="f-xs " align="left" data-title="Số Seri">Số Seri</th><th class="f-xs " align="left" data-title="Mạng">Mạng</th>
                <th class="f-xs " align="left" data-title="MG Nhập">MG Nhập</th>
               <!-- <th class="f-xs " align="left" data-title="MG Thực">MG Thực</th>-->
                <th class="f-xs " align="left" data-title="Ngày">Ngày</th>
                </tr></thead>
                 <tbody>
                
<?php
$TMQ_dulieu = $db->query("SELECT * FROM `TMQ_gachthe` WHERE `uid` = '".$TMQ['uid']."' LIMIT 10");
foreach($TMQ_dulieu as $dulieu){ ?>
                <tr>
                <td><?php if($dulieu['trangthai'] == "Chờ Duyệt"){ 
                echo "<span class='label label-warning'>Chờ Duyệt</span>"; 
                }elseif($dulieu['trangthai'] == "Thành công"){
                echo "<span class='label label-success'>Thành công</span>"; 
                }else{
                 echo "<span class='label label-danger'>Thẻ Sai</span>"; 
                }?></td>
                 <td><?=$dulieu['mathe'];?></td>
                  <td><?=$dulieu['serial'];?></td>
                   <td><?=$dulieu['loaithe'];?></td>
                    <td><?=number_format($dulieu['menhgia']);?><sup>đ</sup></td>
                     <td><?=$dulieu['time'];?></td>
                                      </tr>
                                      <?php } ?>
                    </tbody>
                    
                    </table>
<br>
    <div class="clearfix"></div>
</div>







        <div class="modal fade" id="noticeModal" role="dialog" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Thông báo</h4>
                    </div>
<div class="modal-body" style="font-family: helvetica, arial, sans-serif;"> 
<?=caidat('thongbao');?>

                       </div>                     <div class="modal-footer">
                        <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
        <script>

            $(document).ready(function(){
                if ($.cookie('noticeModal') != '1') {

                    $('#noticeModal').modal('show')
                    //show popup here

                    var date = new Date();
                    var minutes = 60*12;
                    date.setTime(date.getTime() + (minutes * 60 * 1000));
                    $.cookie('noticeModal', '1', { expires: date}); }
            });
        </script>
        

<script>
        GetAmount();
        $("#Network").on('change', function () {

            GetAmount();

        });
        function GetAmount(){

            var telecom_key= $("#Network").val();


            var getamount = $.get( "/check.php?id="+telecom_key, function(data,status) {

                $("#InputValue").find('option').remove();
                
                $("#InputValue").html(data).val($("#InputValue option:first").val());;

            }).done(function() {

            }).fail(function() {

                alert( "Không tìm thấy mệnh giá phù hợp" );
            })
        }
    </script>
        </div>

    </div>
 
</section>

<?php require("TMQ/end.php"); ?>