<?php
/////////////////////////////////////////////////
/// code được thực hiện bởi Trần Minh Quang   ///
/// vui lòng không xóa dòng này               ///
/// cảm ơn các bạn đã sử dụng bộ code nàyy    ///
/////////////////////////////////////////////////
?>
<?php require('../TMQ/function.php'); ?>
<?php
$title = trim(addslashes(htmlspecialchars($_POST['title'])));
$facebook = trim(addslashes(htmlspecialchars($_POST['facebook'])));
$phone = trim(addslashes(htmlspecialchars($_POST['phone'])));
$baotri = trim(addslashes(htmlspecialchars($_POST['baotri'])));
$thongbao = trim(addslashes(htmlspecialchars($_POST['thongbao'])));
$logo = trim(addslashes(htmlspecialchars($_POST['logo'])));
$tb_napthe = tmq_boc($_POST['tb_napthe']);
$tb_muathe = tmq_boc($_POST['tb_muathe']);
$db->exec("UPDATE `TMQ_setting` SET `text` = '$title' WHERE `key` = 'title'");
$db->exec("UPDATE `TMQ_setting` SET `text` = '$facebook' WHERE `key` = 'facebook'");
$db->exec("UPDATE `TMQ_setting` SET `text` = '$phone' WHERE `key` = 'phone'");
$db->exec("UPDATE `TMQ_setting` SET `text` = '$baotri' WHERE `key` = 'baotri'");
$db->exec("UPDATE `TMQ_setting` SET `text` = '$thongbao' WHERE `key` = 'thongbao'");
$db->exec("UPDATE `TMQ_setting` SET `text` = '$logo' WHERE `key` = 'logo'");
$db->exec("UPDATE `TMQ_setting` SET `text` = '$tb_napthe' WHERE `key` = 'tb_napthe'");
$db->exec("UPDATE `TMQ_setting` SET `text` = '$tb_muathe' WHERE `key` = 'tb_muathe'");
echo'<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Thành công</span>
                                     Sửa thông tin shop thành công<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';