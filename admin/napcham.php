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
if($TMQ['admin'] == 0){
    header('Location: /');
    exit;
}
require('head.php');?>

 
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

        <!-- Header-->
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
                                    
                                    <li class="active">Danh sách thẻ nạp</li>
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

                    <div class="col-md-12">
                        <?php
                        if($TMQ['admin'] == 9){
if(isset($_GET['ok'])){
    $id = intval($_GET['ok']);
    
    $check = $db->query("SELECT * FROM `TMQ_gachthe` WHERE `id` = '$id'")->fetch();
    if($check['trangthai'] == 'Chờ Duyệt'){
    $db->exec("UPDATE `TMQ_gachthe` SET `trangthai` = 'Thành công' WHERE `id` = '$id'");
    $db->exec("UPDATE `TMQ_user` SET `cash` = `cash` + '".$check['thucnhan']."' WHERE `uid` = '".$check['uid']."'");
    echo' <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Success</span>
                                       Thẻ #'.$id.' đã được duyệt thành công.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
    }
}elseif(isset($_GET['huy'])){
    $id = intval($_GET['huy']);
    
    $db->exec("UPDATE `TMQ_gachthe` SET `trangthai` = 'Thẻ Sai' WHERE `id` = '$id'");
    echo' <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Success</span>
                                       Thẻ '.$id.' đã duyệt sai.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
}}
?>
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Có <?php echo $db->query("SELECT * FROM `TMQ_gachthe`")->rowCount();?> thẻ trên hệ thống </strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            
                                            <th>Id</th>
                                            <th>UID</th>
                                            <th>Serial</th>
                                            <th>Mã thẻ</th>
                                            <th>Loại thẻ</th>
                                            <th>Mệnh giá</th>
                                            <th>Trạng thái</th>
                                            <th>Thời gian</th>
                                            <th>Thao tác</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
    <?php
$get = $db->query("SELECT * FROM `TMQ_gachthe`"); //lấy danh sách bài viết theo chuyên mục
$tt = array('Hoạt động','Bị khóa');
while($row = $get->fetch()){
?>
                                        <tr>
                                            <td><?=$row['id'];?></td>
                                            <td><?=$row['uid'];?></td>
                                            <td><?=$row['serial'];?></td>
                                            <td><?=$row['mathe'];?></td>
                                            <td><?=$row['loaithe'];?></td>
                                            <td><?=$row['menhgia'];?></td>
                                            <td><?=$row['trangthai'];?></td>
                                            <td><?=$row['time'];?></td>
                                             <td>
                                            <a STYLE="COLOR: RED;" href="?huy=<?=$row['id'];?>">[HỦY]</a>
                                           
                                            <a STYLE="COLOR: GREEN;" href="?ok=<?=$row['id'];?>">[DUYỆT]</a>
                                          </td>
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
<?php require('end.php'); ?>