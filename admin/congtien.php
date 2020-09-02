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
if(isset($_GET['uid'])){
$ct = tmq_boc($_GET['uid']);

}?>  


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
                                 
                                    <li class="active">Cộng tiền</li>
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

                    <div class="col-xs-12 col-sm-12">
                        <p id="result"></p>
                        
                        <div class="card">
                            <div class="card-header">
                                <strong>Cộng tiền cho UID #<?=$ct;?></strong>
                            </div>
                        
                          
                            <div class="card-body card-block">
                             <input class="form-control" name="uid" type="hidden" id="uid" value="<?=$ct;?>">
                                <div class="form-group">
                                    <label class=" form-control-label">Giá tiền</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                        <input class="form-control" name="sotien" type="number" id="sotien">
                                    </div>
                                    
                                </div>
                             <button type="submit" class="btn btn-outline-success" name="congtien" id="congtien">Thêm</button>
                             
                             </br>
        <small class="form-text text-muted"><b>Bạn cần biết :</b></small>
        <strong>+Số tiền bạn nhập sẽ công dồn số tiền hiện có </strong></br>
        <strong>+Để trừ tiền thành viên đang có hãy thêm dấu - trước số tiền muốn trừ (ví dụ -50000)</strong>
                            </div>
                            </div>
                        </div>
                    </div>          
</div><!-- .animated -->
</div><!-- .content -->
    <div class="clearfix"></div></div>
<?php require('end.php'); ?>





