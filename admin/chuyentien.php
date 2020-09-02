<?php
/*
**********************************************************
+ Tên code: website gạch thẻ                             +
+ Người viết: TMQ                                        +
+ Vui lòng không xóa bản quyền để tôn trọng tác giả      +
+ LIÊN HỆ: tmquang0209@gmail.com                         +
**********************************************************
*/
require('../TMQ/function.php');
if($TMQ['admin'] != 9){
    header('Location: /admin');
    exit;
    
}
require('head.php'); 
?>
 <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    
                                    <li class="active">Quản lý chuyển tiền</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Người chuyển</th>
                                        <th scope="col">Người nhận</th>
                                        <th scope="col">Số tiền</th>
                                       
                                        <th scope="col">Thời gian</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$get = $db->query("SELECT * FROM `TMQ_chuyentien`"); //lấy danh sách bài viết theo chuyên mục
foreach($get as $ct){
    
    $name_chuyen = $db->query("SELECT * FROM `TMQ_user` WHERE `uid` = '". $ct['uid_chuyen'] ."'")->fetch();
    
    $name_nhan = $db->query("SELECT * FROM `TMQ_user` WHERE `uid` = '". $ct['uid_nhan'] ."'")->fetch();
    ?>
    
                                    <tr>
                                        <th scope="row"><?=$ct['id'];?></th>
                                        
                                        <td><?=$name_chuyen['name'];?><br />UID:<?=$ct['uid_chuyen'];?></td>
                                        
                                        <td><?=$name_nhan['name'];?><br />UID:<?=$ct['uid_nhan'];?></td>
                                        
                                        <td><?=number_format($ct['sotien']);?><sup>đ</sup></td>
                        
                                        
                                        <td><?=$ct['time'];?></td>
                                       
                                    </tr>
                                    
                                  <?php } ?> 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

              
</div>


</div><!-- .animated -->
</div><!-- .content -->
    <div class="clearfix"></div>



<?php
require('end.php');
?>