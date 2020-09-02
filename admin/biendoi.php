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
                                    
                                    <li class="active">Lịch sử biến đổi số dư</li>
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
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Danh sách bản ghi</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            
                                            <th>Id</th>
                                            <th>Nội dung</th>
                                            <th>Trước GD</th>
                                            <th>Sau GD</th>
                                           
                                            <th>Thời gian</th>
                                          
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
    <?php
$get = $db->query("SELECT * FROM `TMQ_biendoi`"); //lấy danh sách bài viết theo chuyên mục


while($row = $get->fetch()){
    
    
    $name = $db->query("SELECT * FROM `TMQ_user` WHERE `uid` = '".$row['uid'] ."' ")->fetch();
   
?>
                                        <tr>
                                            <td><?=$row['id'];?></td>
                                            <td><?=$name['name'];?> <?=$row['noidung'];?></td>
                                          
                                            <td><?=number_format($row['truocgd']);?><sup>đ</sup></td>
                                            <td><?=number_format($row['saugd']);?><sup>đ</sup></td>
                                            <td><?=time_stamp($row['time']);?></td>
                                           
                                         
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