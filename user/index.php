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
if(!isset($uid)){
    header('location: /');
}
require("../TMQ/head.php");
require("../TMQ/menu.php");
?>
  <div class="col-md-9">
            <div class="clearfix"></div>
            

<div class="panel">
    <div class="panel-heading clearfix header-title-right" style="padding: 0; margin: 0 0 35px 0px;">
        <label class="control-label t20 header-title-lb">THÔNG TIN TÀI KHOẢN</label>
    </div>
    <div class="row">
        <div class="panel-body">
            <section>
                <table id="tb_hisser" class="table-bordered table-striped table-condensed cf" style="width: 100%;">
                    <thead class="cf" style="display:none;">
                        <tr>
                            <th class="f-xs" data-title="Thời gian">Thời gian</th>
                            <th class="f-xs">Tiêu đề</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="ar" data-title="Thời gian">Họ Tên:</td>
                            <td class="RoM"><?=$TMQ['name'];?></td>
                        </tr>
                        <tr>
                            <td class="ar" data-title="Thời gian">Tên đăng nhập:</td>
                            <td class="RoM"><?=$TMQ['uid'];?></td>
                        </tr>
                        <tr>
                            <td class="ar" data-title="Thời gian">Email:</td>
                            <td class="RoL"><a data-toggle='modal' data-target='#Modal_ChangeEmail' class="RoMI" style="color:red;cursor: pointer;" id="btnChangeEmail"><?=$TMQ['email'];?> </a></td>
                        </tr>
                        <tr>
                            <td class="ar" data-title="Thời gian">Mật khẩu:</td>
                            <td><a href="/doi-mat-khau.html" class="RoMI" style="color:#19b1ff;cursor: pointer;" id="btnChangePass">Nhấn vào đây để đổi mật khẩu</a></td>
                        </tr>

                        <tr>
                            <td class="ar" data-title="Thời gian">Số dư tài khoản:</td>
                            <td style="color:#e7151c;"><?=number_format($TMQ['cash']);?> VNĐ</td>
                        </tr>
                        
                        <tr>
                            <td class="ar" data-title="Thời gian">Ngày tham gia:</td>
                            <td style="font-weight: normal;"><?=$TMQ['date'];?></td>
                        </tr>
                        
                    </tbody>

                </table>
            </section>
        </div>
    </div>

</div></div></div></div></div>


<?php require("../TMQ/end.php"); ?>