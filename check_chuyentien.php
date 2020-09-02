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

$taikhoan = tmq_boc($_POST['taikhoan']);

$check = $db->query("SELECT * FROM `TMQ_user` WHERE `uid` ='$taikhoan'")->fetch();

if($check['id'] == null){
    echo '<div class="col-md-12 has-textbox"><div class="form-group row"><span class="col-md-4 control-label RoM ar">Người Nhận:</span> <div class="col-md-8"><input type="text" id="Name" class="form-control t14 RoR" placeholder="" value="Không tồn tại" disabled="disabled"></div></div></div>';
}else{
    echo '<div class="col-md-12 has-textbox"><div class="form-group row"><span class="col-md-4 control-label RoM ar">Người Nhận:</span> <div class="col-md-8"><input type="text" id="Name" class="form-control t14 RoR" placeholder="" value="'.$check['name'].'" disabled="disabled"></div></div></div>';
}
