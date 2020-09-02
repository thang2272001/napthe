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
if(isset($uid) == null){
    header('Location: /login');
}
require("TMQ/head.php");



?>
	
    <div class="c-content-box c-size-lg c-overflow-hide c-bg-white font-roboto">
        <div class="container">
            
                    </div>
        <div class="text-center" style="margin-bottom: 50px;">
            <h2 style="font-size: 30px;font-weight: bold;text-transform: uppercase">DỊCH VỤ MUA THẺ </h2>
<center><h3>Hệ thống sẽ cập nhật thẻ trong thời gian sắp tới.</h3></center>
        </div>
        <?php
        if(isset($_POST['d3'])){ 
  $loaithe = tmq_boc($_POST['type']);
    $menhgia = tmq_boc($_POST['amount']);
        $soluong = tmq_boc($_POST['quantity']);
        
        $get = $db->query("SELECT * FROM `TMQ_network` WHERE `ten` = '$loaithe'")->fetch();
        $laythe = $db->query("SELECT * FROM`TMQ_khothe` WHERE `menhgia` = '$menhgia' AND `loaithe` = '$loaithe' LIMIT $soluong");
        $check_kho = $db->query("SELECT * FROM`TMQ_khothe` WHERE `menhgia` = '$menhgia' AND `loaithe` = '$loaithe'");
        //tính giá tiền
        $sale = $menhgia-($menhgia*$get['ck_mua']/100);
        $money_the = $menhgia - $sale;
        $total = ($menhgia-$sale)*$soluong;
        $saugd = $TMQ['cash']-$total;
        if(empty($loaithe) || empty($menhgia) || empty($soluong)){
           echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><center>Không được để trống trường hợp nào</center> </div></div>';
        }elseif(empty($uid)){
  echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><center><span aria-hidden="true">×</span></button><center>Vui lòng đăng nhập để thực hiện giao dịch này.</center> </div></div>';
        }elseif($TMQ['cash'] < $total){
             echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><center>Tài khoản của bạn không đủ để thực hiện giao dịch này.</center> </div></div>';
        }elseif($get['ten'] == null){
              echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><center>Loại thẻ không tồn tại</center> </div></div>';
        }elseif($check_kho->fetch()['id'] <= $soluong){
           echo'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><center>Kho đã hết thẻ, vui lòng quay lại sau.</center> </div></div>';
        }else{
foreach($laythe as $lt){
    //insert vào lịch sử
$db->exec("INSERT INTO `TMQ_muathe` SET
`uid` = '$uid',
`serial` = '".$lt['serial']."',
`mathe` = '".$lt['mathe']."',
`menhgia` = '$menhgia',
`loaithe` = '$loaithe',
`trutien` = '$money_the',
`date` = '".date('H:i:s d-m-Y')."'");
//xóa thẻ
$db->exec("DELETE FROM `TMQ_khothe` WHERE `id` = '".$lt['id']."'");
//trừ tiền
$db->exec("UPDATE `TMQ_user` SET `cash` = `cash` - '$total' WHERE `uid` = '$uid'");
//trừ số lượng thẻ
$db->exec("UPDATE `TMQ_loaithe` SET `soluong` = `soluong` - '1' WHERE `menhgia` = '$menhgia' AND `loaithe` = '$loaithe'");

}
    //insert vào biến đổi số dư
 $db->exec("INSERT INTO `TMQ_biendoi` SET
    `uid` = '$uid',
    `noidung` = 'Mua thẻ $loaithe, mệnh giá ".number_format($menhgia)." <sup>đ</sup>, số lượng $soluong',
    `truocgd` = '".$TMQ['cash']."',
   `saugd` = '$saugd',
    `time` = '". time() ."'
    ");
     echo'<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><center>Thành công, check lịch sử mua thẻ để lấy mã thẻ</center> </div></div>';
        }
      
        }
        ?>
                <form method="POST" action="" accept-charset="UTF-8" class="" enctype="multipart/form-data">
        <div class="container detail-service">

                       
                       
           <div class="row">
               <div class="col-md-8" style="margin-bottom:20px;">

                   <div class="service-info">
                       <div class="col-md-5 hidden-xs hidden-sm">
                           <div class="">
                               <div class="news_image">
                                  <img src="/anhshop/store-card.jpg" width="256" alt="">
                               </div>
                           </div>

                       </div>
                       
                       <div class="col-md-7">
                           <span class="mb-15 control-label bb">Chọn nhà mạng:</span>
                           <div class="mb-15">
                               <select name="type" id="telecom_key"  class="server-filter form-control t14" style="">
                                        <?php 
                                        $dulieu = $db->query("SELECT * FROM `TMQ_network`");
                                        foreach($dulieu as $TMQ_dl){
                                            echo "<option value='".$TMQ_dl['ten']."'>".$TMQ_dl['ten']."</option> ";
                                        }
                                        ?>
                                                                  </select>
                           </div>
<br>
                           <span class="mb-15 control-label bb">Mệnh giá:</span>
                           <div class="mb-15">
                               <select name="amount" id="amount" class="server-filter form-control t14" style="">
                                   
                               </select>
                           </div>
                           <br>
                           <span class="mb-15 control-label bb">Số lượng:</span>
                           <div class="mb-15">
                               <select name="quantity" id="quantity" class="server-filter form-control t14" style="">
                                   <option value="1">1</option>
                                   <option value="2">2</option>
                                   <option value="3">3</option>
                                   <option value="4">4</option>
                                   <option value="5">5</option>
                                   <option value="6">6</option>
                                   <option value="7">7</option>
                                   <option value="8">8</option>
                                   <option value="9">9</option>
                                   <option value="10">10</option>
                               </select>
                           </div>
                           
                       </div>
                   </div>
               </div>
               <div class="col-md-4">


                    <div class="row">
                       <div class="col-md-12">
                           <div class="">
                               <a id="txtPrice" name="txtPrice" style="font-size: 20px;font-weight: bold" class="btn btn-lg btn-danger c-btn-circle btn-block c-btn-uppercase">Tổng: 0 VNĐ</a>
                               <br>
                                                                  <center><button id="btnPurchase" type="button" style="font-size: 20px;" class="btn btn-lg btn-info c-btn-circle btn-block c-btn-uppercase"><i class="fa fa-credit-card" aria-hidden="true"></i> Thanh toán</button></center>
                                                          </div>
                       </div>
                   </div>

                   <div class="row box-body" style="color: #505050;padding:20px;line-height: 2;margin-top: 30px">
                       <p><strong>Nh&acirc;n dịp khai trương chức năng b&aacute;n thẻ.</strong></p>

<p>Hệ thống giảm gi&aacute;&nbsp;thẻ cực sốc đối với tất cả c&aacute;c loại thẻ.</p>

<p><span style="color:#e74c3c"><strong>Tuyển đại l&yacute; b&aacute;n thẻ &nbsp;lh SĐT <?=caidat('phone');?> để c&oacute; chiết khấu thẻ tốt nhất.</strong></span></p>

                   </div>

               </div>
           </div>
        </div>

        <div class="modal fade" id="homealert" role="dialog" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Xác nhận thông tin thanh toán</h4>

                    </div>

                    <div class="modal-body">
                        <p> Bạn thực sự muốn thanh toán?</p>
                    </div>
                    <div class="modal-footer">

                                                    <button type="submit" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold" id="d3" name="d3" style="">Xác nhận thanh toán</button>
                        
                        <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>

                    </div>


                </div>
            </div>
        </div>




        </form>

         </div>
            

            
        
    </div>


    <script>

        $(document).ready(function () {
            $('#btnPurchase').click(function () {

                $('#homealert').modal('show');
            });



            GetAmount();
            $("#telecom_key").on('change', function () {
                GetAmount();

            });

            $("#amount").on('change', function () {
                UpdatePrice();
            });

            $("#quantity").on('change', function () {
                UpdatePrice();
            });

            function GetAmount(){

                var telecom_key= $("#telecom_key").val();
               
                var getamount = $.get( "/check.php?id="+telecom_key, function(data,status) {

                    $("#amount").find('option').remove();
                    $("#amount").html(data).val($("#amount option:first").val());;
                    UpdatePrice();
                }).done(function() {

                }).fail(function() {

                    alert( "Không tìm thấy mệnh giá phù hợp" );
                })
            }
            function UpdatePrice(){
                var amount=$("#amount").val();
                var ratio=$('#amount option:selected').attr('rel-ratio');
                var quantity=$("#quantity").val();

                if(amount=='' ||amount==null || ratio=='' ||ratio==null   || quantity=='' ||quantity==null){

                    $('#txtPrice').html('<a id="txtPrice" style="font-size: 20px;font-weight: bold" class="btn btn-lg btn-danger c-btn-circle btn-block c-btn-uppercase">Tổng: ' + 0 + ' VNĐ</a>');
                    $('#txtPrice').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                        $(this).removeClass();
                    });
                    console.log('amount:'+amount);
                    console.log('ratio:'+ratio);
                    console.log('quantity:'+quantity);
                    return;
                }



                if(ratio<=0 || ratio=="" || ratio==null){
                    ratio=100;
                }

                var sale=amount-(amount*ratio/100);

                var total=(amount-sale) *quantity;
                $('#txtPrice').html('<a id="txtPrice" style="font-size: 20px;font-weight: bold" class="btn btn-lg btn-danger c-btn-circle btn-block c-btn-uppercase">Tổng: ' + total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' VNĐ</a>');
                $('#txtPrice').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                    $(this).removeClass();
                });

            }

        });




    </script>







    <script>
        $(document).ready(function () {
            $('.load-modal').each(function (index, elem) {
                $(elem).unbind().click(function (e) {
                    e.preventDefault();
                    e.preventDefault();
                    var curModal = $('#LoadModal');
                    curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/assets/frontend/images/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");
                    curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
                });
            });
        });
    </script>

			<!-- END: PAGE CONTENT -->
</div>
</div>

<div class="modal fade" id="LoadModal" role="dialog" style="display: none;" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>
		<div class="modal-content">
		</div>
	</div>
</div>


<script>
    $(document).ready(function () {
        $('.load-modal').each(function (index, elem) {
            $(elem).unbind().click(function (e) {
                e.preventDefault();
                e.preventDefault();
                var curModal = $('#LoadModal');
                curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/assets/frontend/images/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");
                curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
            });
        });
    });
</script>
<?php require("TMQ/end.php"); ?>