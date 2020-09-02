<?php
/////////////////////////////////////////////////
/// code được thực hiện bởi Trần Minh Quang   ///
/// vui lòng không xóa dòng này               ///
/// cảm ơn các bạn đã sử dụng bộ code nàyy    ///
/////////////////////////////////////////////////


include $_SERVER['DOCUMENT_ROOT'].'/TMQ/config.php';


//bọc dữ liệu 
function tmq_boc($var){
$dulieu = trim(addslashes(htmlspecialchars($var)));
return $dulieu;    
}
//list bank
function string_bank($bank)
    {
    switch ($bank) {
        case 1:
            $name = "Techcombank";
            break;
        case 2:
             $name = "Vietcombank";
            break;
        case 3:
             $name = "Vietinbank";
            break;
        case 4:
             $name = "Bidv";
            break;
        case 5:
             $name = "Mbbank";
            break;
        case 6:
            $name = "Sacombank";
            break;
        case 7:
             $name = "Seabank";
            break;
         case 8:
             $name = "tkcr(tkcr.vn)";
            break;
         case 9:
             $name = "Tcsr(Thecaosieure)";
            break;
         case 10:
             $name = "TKCR";
            break; 
        case 11:
             $name = "azpro";
            break; 
        case 12:
             $name = "Momo";
            break; 
           
      
    }
   
    return $name;
}

/*function TaoChuoiRandom($sokitu){
	$mang = array("a", "b", "c", "A", "B", "C", 0, 1, 2 ,3, 4, 5, 6, 7, 8, 9);	
	$kq = "";
	for($i=1; $i<=$sokitu; $i++){
		$kq = $kq . $mang[rand(0, count($mang)-1)];
	}
	return $kq;
} */
//đổi time int sang dạng date
function time_stamp($time){
    $date = date("H:i:s d-m-Y",$time);
    return $date;
}
//get url
$link = $_SERVER["REQUEST_URI"]; 

//lấy dữ liệu cài đặt
function caidat($text){
     global $db;
     $cd = $db->query("SELECT * FROM `TMQ_setting` WHERE `key` = '$text'")->fetch();
     return html_entity_decode($cd['text']);
}
//tạo chuỗi ngẫu nhiên
function taochuoi($length){
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";;
	$size = strlen( $chars );
	$str = '';
	for( $i = 0; $i < $length; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}
	return $str;
}


//xóa dấu tiếng việt
function xoa_dau ($str){
 
$unicode = array(
 
'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
 
'd'=>'đ',
 
'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
 
'i'=>'í|ì|ỉ|ĩ|ị',
 
'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
 
'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
 
'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
 
'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
 
'D'=>'Đ',
 
'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
 
'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
 
'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
 
'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
 
'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
 
);
 
foreach($unicode as $nonUnicode=>$uni){
 
$str = preg_replace("/($uni)/i", $nonUnicode, $str);
 
}
$str = str_replace(' ','-',$str);
 
return $str;
 
}