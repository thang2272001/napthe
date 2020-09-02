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
                                    
                                    <li class="active">Danh sách nhà mạng</li>
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
<?php if(isset($_GET['add'])){ ?>
<?php if(isset($_POST['addthe'])){
    $name = tmq_boc($_POST['ten']);
    $ck_mua = tmq_boc($_POST['ck_mua']);
    
  $ck_10k = intval($_POST['10k']); 
  $ck_20k = intval($_POST['20k']); 
  $ck_30k = intval($_POST['30k']); 
  $ck_50k = intval($_POST['50k']); 
  $ck_100k = intval($_POST['100k']); 
  $ck_200k = intval($_POST['200k']); 
  $ck_300k = intval($_POST['300k']); 
  $ck_500k = intval($_POST['500k']); 
   $ck_1000k = intval($_POST['1000k']); 
  
  $check = $db->query("SELECT * FROM `TMQ_network` WHERE `ten` = '$name'");
  
  if(empty($ck_10k) || empty($ck_mua) || empty($ck_20k) || empty($ck_30k) || empty($ck_50k) || empty($ck_100k) || empty($ck_200k) || empty($ck_300k) || empty($ck_500k) || empty($ck_1000k)){
      echo 'Vui lòng nhập đủ thông tin';
  }elseif($check->fetch()['ten'] != null){
      echo 'đã tồn tại';
  }else{
      $db->exec("INSERT INTO `TMQ_network` SET
      `ten` = '$name',
      `ck_mua` = '$ck_mua',
      `trangthai` = '1'");
      $db->exec("INSERT INTO `TMQ_chietkhau` SET
      `loaithe` = '$name',
      `10000` = '$ck_10k',
      `20000` = '$ck_20k',
      `30000` = '$ck_30k',
      `50000` = '$ck_50k',
      `100000` = '$ck_100k',
      `200000` = '$ck_200k',
      `300000` = '$ck_300k',
      `500000` = '$ck_500k',
      `1000000` = '$ck_1000k'
       ");
    $db->exec("INSERT INTO `TMQ_loaithe` SET `menhgia` = '10000', `loaithe` = '$name', `soluong` = '0'");
    $db->exec("INSERT INTO `TMQ_loaithe` SET `menhgia` = '20000', `loaithe` = '$name', `soluong` = '0'");
    $db->exec("INSERT INTO `TMQ_loaithe` SET `menhgia` = '30000', `loaithe` = '$name', `soluong` = '0'");
    $db->exec("INSERT INTO `TMQ_loaithe` SET `menhgia` = '50000', `loaithe` = '$name', `soluong` = '0'");
    $db->exec("INSERT INTO `TMQ_loaithe` SET `menhgia` = '100000', `loaithe` = '$name', `soluong` = '0'");
    $db->exec("INSERT INTO `TMQ_loaithe` SET `menhgia` = '200000', `loaithe` = '$name', `soluong` = '0'");
    $db->exec("INSERT INTO `TMQ_loaithe` SET `menhgia` = '300000', `loaithe` = '$name', `soluong` = '0'");
    $db->exec("INSERT INTO `TMQ_loaithe` SET `menhgia` = '500000', `loaithe` = '$name', `soluong` = '0'");
    $db->exec("INSERT INTO `TMQ_loaithe` SET `menhgia` = '1000000', `loaithe` = '$name', `soluong` = '0'");
      echo "oke";
  }
  

}
?>
 <div class="card">
                            <div class="card-header">
                                <strong>Thêm nhà mạng</strong>
                            </div>
                         
                          
                            <div class="card-body card-block">
                                <form method="POST">
									 <div class="form-group">
                                    <label class=" form-control-label">Tên nhà mạng: </label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-info-alt"></i></div>
                                      <input type="text" class="form-control" name="ten" />
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class=" form-control-label">Chiết khấu mua thẻ: </label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-info-alt"></i></div>
                                      <input type="text" class="form-control" name="ck_mua" />
                                    </div> <small>VD: đặt là 70 thì thẻ 10k sẽ được mua với giá 7k.</small>
                                </div>
                               
                                 <div class="form-group">
                                    <label class=" form-control-label">Chiết khấu thẻ 10k: </label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-info-alt"></i></div>
                                      <input type="text" class="form-control" name="10k" />
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class=" form-control-label">Chiết khấu thẻ 20k:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-info-alt"></i></div>
                                      <input type="text" class="form-control" name="20k" />
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class=" form-control-label">Chiết khấu thẻ 30k: </label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-info-alt"></i></div>
                                      <input type="text" class="form-control" name="30k" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Chiết khấu thẻ 50k: </label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-info-alt"></i></div>
                                      <input type="text" class="form-control" name="50k" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Chiết khấu thẻ 100k: </label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-info-alt"></i></div>
                                      <input type="text" class="form-control" name="100k" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Chiết khấu thẻ 200k: </label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-info-alt"></i></div>
                                      <input type="text" class="form-control" name="200k" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Chiết khấu thẻ 300k: </label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-info-alt"></i></div>
                                      <input type="text" class="form-control" name="300k" />
                                    </div>
                                </div>
                              <div class="form-group">
                                    <label class=" form-control-label">Chiết khấu thẻ 500k: </label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-info-alt"></i></div>
                                      <input type="text" class="form-control" name="500k" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Chiết khấu thẻ 1000k: </label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-info-alt"></i></div>
                                      <input type="text" class="form-control" name="1000k" />
                                    </div>
                                </div>
                            
                        <button type="submit" class="btn btn-outline-success" name="addthe" id="addthe">Thêm</button>
                        </form>
                            </div>
                            </div>
                        </div>
                    </div>
                    
<?php }else{ ?>

<?php
if($TMQ['admin'] == 9){
if(isset($_GET['del'])){
    $id = tmq_boc($_GET['del']);
    $db->exec("DELETE FROM `TMQ_network` WHERE `ten` = '$id'");
    $db->exec("DELETE FROM `TMQ_loaithe` WHERE `loaithe` = '$id'");
    echo' <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Success</span>
                                        Nhà mạng '.$id.' đã bị xóa khỏi hệ thống.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
}elseif(isset($_GET['edit'])){
        $id = tmq_boc($_GET['edit']);
        $get = $db->query("SELECT * FROM `TMQ_network` WHERE `ten` = '$id'")->fetch();
         $get_ck = $db->query("SELECT * FROM `TMQ_chietkhau` WHERE `loaithe` = '$id'")->fetch();
       
        if(isset($_POST['edit_the'])){
       $name = tmq_boc($_POST['ten']);
    $ck_mua = tmq_boc($_POST['ck_mua']);
    
  $ck_10k = intval($_POST['10k']); 
  $ck_20k = intval($_POST['20k']); 
  $ck_30k = intval($_POST['30k']); 
  $ck_50k = intval($_POST['50k']); 
  $ck_100k = intval($_POST['100k']); 
  $ck_200k = intval($_POST['200k']); 
  $ck_300k = intval($_POST['300k']); 
  $ck_500k = intval($_POST['500k']); 
  $ck_1000k = intval($_POST['1000k']); 

 
  
  if(empty($ck_10k) || empty($ck_mua) || empty($ck_20k) || empty($ck_30k) || empty($ck_50k) || empty($ck_100k) || empty($ck_200k) || empty($ck_300k) || empty($ck_500k) || empty($ck_1000k)){
      echo 'Vui lòng nhập đủ thông tin';
  }else{
      $db->exec("UPDATE `TMQ_network` SET
      `ten` = '$name',
      `ck_mua` = '$ck_mua'
    
      WHERE `ten` = '$id'");
      $db->exec("UPDATE `TMQ_chietkhau` SET
      `loaithe` = '$name',
      `10000` = '$ck_10k',
      `20000` = '$ck_20k',
      `30000` = '$ck_30k',
      `50000` = '$ck_50k',
      `100000` = '$ck_100k',
      `200000` = '$ck_200k',
      `300000` = '$ck_300k',
      `500000` = '$ck_500k',
      `1000000` = '$ck_1000k'
      WHERE `loaithe` = '$id'
       ");
       $db->exec("UPDATE `TMQ_loaithe` SET `loaithe` = '$name' WHERE `loaithe` = '$id'");
         echo' <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Success</span>
                                        Thẻ #'.$id.' đã sửa thành công
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
        } }
    ?>
  <div class="col-xs-12 col-sm-12">
                      
                        
                        <div class="card">
                            <div class="card-header">
                                <strong>Sửa thẻ</strong>
                            </div>
                         
                          
                            <div class="card-body card-block">
                        <form method="POST">
									 <div class="form-group">
                                    <label class=" form-control-label">Tên nhà mạng: </label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-info-alt"></i></div>
                                      <input type="text" class="form-control" name="ten" value="<?=$get['ten'];?>" />
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class=" form-control-label">Chiết khấu mua thẻ: </label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-info-alt"></i></div>
                                      <input type="text" class="form-control" name="ck_mua" value="<?=$get['ck_mua'];?>"/>
                                    </div>
                                </div>
                               
                                 <div class="form-group">
                                    <label class=" form-control-label">Chiết khấu thẻ 10k: </label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-info-alt"></i></div>
                                      <input type="text" class="form-control" name="10k"  value="<?=$get_ck['10000'];?>"/>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class=" form-control-label">Chiết khấu thẻ 20k:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-info-alt"></i></div>
                                      <input type="text" class="form-control" name="20k" value="<?=$get_ck['20000'];?>"/>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class=" form-control-label">Chiết khấu thẻ 30k: </label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-info-alt"></i></div>
                                      <input type="text" class="form-control" name="30k" value="<?=$get_ck['30000'];?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Chiết khấu thẻ 50k: </label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-info-alt"></i></div>
                                      <input type="text" class="form-control" name="50k" value="<?=$get_ck['50000'];?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Chiết khấu thẻ 100k: </label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-info-alt"></i></div>
                                      <input type="text" class="form-control" name="100k" value="<?=$get_ck['100000'];?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Chiết khấu thẻ 200k: </label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-info-alt"></i></div>
                                      <input type="text" class="form-control" name="200k" value="<?=$get_ck['200000'];?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Chiết khấu thẻ 300k: </label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-info-alt"></i></div>
                                      <input type="text" class="form-control" name="300k" value="<?=$get_ck['300000'];?>"/>
                                    </div>
                                </div>
                              <div class="form-group">
                                    <label class=" form-control-label">Chiết khấu thẻ 500k: </label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-info-alt"></i></div>
                                      <input type="text" class="form-control" name="500k" value="<?=$get_ck['500000'];?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Chiết khấu thẻ 1000k: </label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-info-alt"></i></div>
                                      <input type="text" class="form-control" name="1000k" value="<?=$get_ck['1000000'];?>"/>
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
                                <strong class="card-title">Hệ thống hiện tại có <?php echo $db->query("SELECT * FROM `TMQ_network`")->rowCount();?> nhà mạng - <a style="color:red;"href="?add">Thêm thẻ</a></strong>
                            </div>
                          
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            
                                           
                                           
                                            <th>Tên thẻ</th>
                                           
                                            <th>Chiết khấu mua</th>
                                          
                                            <th>Thao tác</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
    <?php
$get = $db->query("SELECT * FROM `TMQ_network`"); //lấy danh sách bài viết theo chuyên mục

while($row = $get->fetch()){
?>
                                        <tr>
                                           
                                            <td><?=$row['ten'];?></td>
                                           
                                            <td><?=$row['ck_mua'];?></td>
                                          
                                             <td><a  href="?edit=<?=$row['ten'];?>"><li class="fa  fa-pencil"></li></a>
                                           
                                             <a href="?del=<?=$row['ten'];?>"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<?php } ?>

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>
<?php require('end.php'); ?>



