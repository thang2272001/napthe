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
require('head.php'); ?>


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
                                   
                                    <li class="active">Thêm thẻ vào kho</li>
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
                                <strong>Thêm thẻ</strong>
                            </div>
                         
                          
                            <div class="card-body card-block">
                       
                                <div class="form-group">
                                    <label class=" form-control-label">Giá tiền</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                       <select class="form-control" name="menhgia" id="menhgia">
                                           <option value="10000">10.000<sup>đ</sup></option>
                                           <option value="20000">20.000<sup>đ</sup></option>
                                           <option value="30000">30.000<sup>đ</sup></option>
                                           <option value="50000">50.000<sup>đ</sup></option>
                                           <option value="100000">100.000<sup>đ</sup></option>
                                           <option value="200000">200.000<sup>đ</sup></option>
                                           <option value="500000">500.000<sup>đ</sup></option>
                                         
                                       </select>
                                    </div>
                                    
                                </div>
                              
                                <div class="form-group">
                                         <label class=" form-control-label">Loại thẻ</label>
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="ti-dropbox-alt"></i></div>
                                        
                                            <select name="loaithe" id="loaithe" class="form-control">
                                                <?php $get_cm = $db->query("SELECT * FROM `TMQ_network`"); ?>
                                                <?php foreach($get_cm as $get){ ?>
                                                <option value="<?=$get['ten'];?>"><?=$get['ten'];?></option>
                                              <?php } ?>
                                            </select>
                                        
                                    </div>
                                    </div>
									 <div class="form-group">
                                    <label class=" form-control-label">List thẻ: </label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-info-alt"></i></div>
                                        <textarea name="info" id="info" rows="9" placeholder="Bắt buộc" class="form-control"></textarea>
                                       
                                    </div>
                                     <small>Serial|Mã thẻ, mỗi thẻ cách nhau 1 dòng</small>
                                </div>
                              
                            
                        <button type="submit" class="btn btn-outline-success" name="themthe" id="themthe">Thêm</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    </div></div> 
</div><!-- .animated -->
</div><!-- .content -->
    <div class="clearfix"></div>
<?php require('end.php'); ?>





