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
$id = $_GET["id"];
$get = $db->query("SELECT * FROM `TMQ_loaithe` WHERE `loaithe` = '$id' AND `soluong` != '0'");
$chietkhau = $db->query("SELECT * FROM `TMQ_network` WHERE `ten` = '$id'")->fetch();

    foreach($get as $lt){
echo "<option value='".$lt['menhgia']."' rel-ratio='".$chietkhau['ck_mua']."'>".number_format($lt['menhgia'])."</option>";
}?>