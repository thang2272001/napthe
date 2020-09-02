<?php
require("../TMQ/function.php");


    $info = addslashes($_POST['info']);
    $info = explode("\n", $info);
    $loai = tmq_boc($_POST['loaithe']);
    $menhgia = tmq_boc($_POST['menhgia']);
    $i = 0;
        foreach($info as $key){
            $cc = explode("|", $info[$i]);
            $check = $db->query("SELECT * FROM `TMQ_khothe` WHERE `serial` = '".$cc[0]."' AND `mathe` = '".$cc[1]."'");
            if($check->fetch()['id'] != null){
               echo'<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                        <span class="badge badge-pill badge-danger">Thất bại</span>
                                       Serial '.$cc[0].' và mã thẻ '.$cc['1'].' đã tồn tại trên hệ thống, vui lòng kiểm tra lại.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
                                    $i++;
            }else{
            $db->exec("INSERT INTO `TMQ_khothe` SET
            `uid` = '$uid',
            `serial` = '".$cc[0]."',
            `mathe` = '".$cc[1]."',
            `menhgia` = '$menhgia',
            `loaithe` = '$loai',
            `date` = '".date('H:i:s d-m-Y')."'");
            $db->exec("UPDATE `TMQ_loaithe` SET `soluong` = `soluong` + 1 WHERE `menhgia` = '$menhgia' AND `loaithe` = '$loai'");
             echo '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Thành công</span>
                                       Thẻ '.$cc[0].'/'.$cc['1'].' đã được thêm thành công.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
            $i++;
            
        } }
       