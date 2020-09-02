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
                                    
                                    <li class="active">Danh sách thẻ</li>
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
if(isset($_GET['del'])){
    $id = intval($_GET['del']);
    $db->exec("DELETE FROM `TMQ_khothe` WHERE `id` = '$id'");
    echo' <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Success</span>
                                        Thẻ #'.$id.' đã xóa thành công
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
    }elseif(isset($_GET['edit'])){
        $id = intval($_GET['edit']);
        $get = $db->query("SELECT * FROM `TMQ_khothe` WHERE `id` = '$id'")->fetch();
       
        if(isset($_POST['edit_the'])){
        $serial = tmq_boc(intval($_POST['serial']));
        $mathe = tmq_boc(intval($_POST['mathe']));
        $menhgia =tmq_boc(intval($_POST['menhgia']));
        $loaithe = tmq_boc($_POST['loaithe']);
        $db->exec("UPDATE `TMQ_khothe` SET
        `serial` = '$serial',
        `mathe` = '$mathe',
        `menhgia` = '$menhgia',
        `loaithe` = '$loaithe',
        `date` = '".date('H:i:s d-m-Y')."'
        WHERE `id` ='$id'");
         echo' <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Success</span>
                                        Thẻ #'.$id.' đã sửa thành công
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
        }
    ?>
  <div class="col-xs-12 col-sm-12">
                      
                        
                        <div class="card">
                            <div class="card-header">
                                <strong>Sửa thẻ</strong>
                            </div>
                         
                          
                            <div class="card-body card-block">
                       <form method="POST">
                                <div class="form-group">
                                    <label class=" form-control-label">Mệnh giá thẻ</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                       <select class="form-control" name="menhgia" id="menhgia">
                                           <option value="10000" <?php if($get['menhgia'] == 10000){echo "selected"; }?>>10.000<sup>đ</sup></option>
                                           <option value="20000" <?php if($get['menhgia'] == 20000){echo "selected"; }?>>20.000<sup>đ</sup></option>
                                           <option value="30000" <?php if($get['menhgia'] == 30000){echo "selected"; }?>>30.000<sup>đ</sup></option>
                                           <option value="50000" <?php if($get['menhgia'] == 50000){echo "selected"; }?>>50.000<sup>đ</sup></option>
                                           <option value="100000" <?php if($get['menhgia'] == 100000){echo "selected"; }?>>100.000<sup>đ</sup></option>
                                           <option value="200000" <?php if($get['menhgia'] == 200000){echo "selected"; }?>>200.000<sup>đ</sup></option>
                                           <option value="500000" <?php if($get['menhgia'] == 500000){echo "selected"; }?>>500.000<sup>đ</sup></option>
                                         
                                       </select>
                                    </div>
                                    
                                </div>
                              
                                <div class="form-group">
                                         <label class=" form-control-label">Loại thẻ</label>
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="ti-dropbox-alt"></i></div>
                                        
                                            <select name="loaithe" id="loaithe" class="form-control">
                                                <?php $get_cm = $db->query("SELECT * FROM `TMQ_network`"); ?>
                                                <?php foreach($get_cm as $get_t){ ?>
                                                <option value="<?=$get_t['ten'];?>" <?php if($get_t['loaithe'] == $get['ten']){echo "selected"; }?>><?=$get_t['ten'];?></option>
                                              <?php } ?>
                                            </select>
                                        
                                    </div>
                                    </div>
									 <div class="form-group">
                                    <label class=" form-control-label">Serial: </label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-info-alt"></i></div>
                                       <input type="number" class="form-control" name="serial" value="<?=$get['serial'];?>" />
                                       
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Mã thẻ: </label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-info-alt"></i></div>
                                       <input type="number" class="form-control" name="mathe" value="<?=$get['mathe'];?>" />
                                       
                                    </div>
                                   
                                </div>
                              
                            
                        <button type="submit" class="btn btn-outline-success" name="edit_the" id="edit_the">Sửa</button>
                            </div>
                            </div>
                            </form>
                            </div>
                            
<?php    
    }
}
?>
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Kho thẻ hiện tại có <?php echo $db->query("SELECT * FROM `TMQ_khothe`")->rowCount();?> thẻ - <a style="color:red;"href="/admin/them-the.html">Thêm thẻ</a></strong>
                              
                            </div>  
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            
                                            <th>Id</th>
                                            <th>UID</th>
                                            <th>Serial</th>
                                            <th>Mã thẻ</th>
                                            <th>Mệnh giá</th>
                                            <th>Loại thẻ</th>
                                            <th>Thời gian</th>
                                            <th>Thao tác</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
    <?php
$get = $db->query("SELECT * FROM `TMQ_khothe`"); //lấy danh sách bài viết theo chuyên mục

while($row = $get->fetch()){
?>
                                        <tr>
                                            <td><?=$row['id'];?></td>
                                            <td><?=$row['uid'];?></td>
                                            <td><?=$row['serial'];?></td>
                                            <td><?=$row['mathe'];?></td>
                                            <td><?=number_format($row['menhgia']);?><sup>đ</sup></td>
                                            <td><?=$row['loaithe'];?></td>
                                            <td><?=$row['date'];?></td>
                                             <td><a  href="?edit=<?=$row['id'];?>"><li class="fa  fa-pencil"></li></a>
                                           
                                             <a href="/admin/quan-ly-the.html?del=<?=$row['id'];?>"><i class="fa fa-trash"></i></a></td>
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



