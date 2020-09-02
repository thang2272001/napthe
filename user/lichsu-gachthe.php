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
require("../TMQ/head.php");
require("../TMQ/menu.php");
?>

   <div class="col-md-9">
            <div class="clearfix"></div>
            

<style>
    th[data-title="Nội dung"], td[data-title="Nội dung"] {
        min-width: 300px;
        text-align: left;
    }

    th[data-title="Số tiền"], td[data-title="Số tiền"] {
        min-width: 70px;
        text-align: left;
    }
</style>
<div class="panel">
    <div class="panel-heading clearfix header-title-right">
        <label class="control-label t20 header-title-lb">LỊCH SỬ GIAO DỊCH</label>
    </div>
    <div class="panel-body">
       <!--- <form class="" id="form_search">
            <div class="box-body">
                <div class="col-md-5 has-textbox">
                    <div class="form-group row">
                        <spam class="col-md-4 control-label">Loại tiền: </spam>
                        <div class="col-md-8">
                            <select class="form-control t14" id="MoneyTypeID" name="MoneyTypeID"><option value="09109b10-b147-461b-9186-d162438dcc96">VNĐ</option>
</select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <a id="btnSearch" class="btn btn-info">Tìm Kiếm</a>
                    </div>
                </div>
            </div>
        </form> --->
    </div>
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
                
                
                <?php }  ?>
               
                    
                    </tbody>
                    
                    </table>
                    
    </div>
    <div class="clearfix"></div>
</div>


</div>


        </div>

    </div>
<?php require("../TMQ/end.php"); ?>    

