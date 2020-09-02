
	$("#themthe").on("click", function(){

		 $.ajax({
                    url : "/ajax/themthe.php",
                    type : "post",
                    dataType:"text",
                    data : {
                        info : $('#info').val(), //get dữ liệu
                        loaithe : $('#loaithe').val(),
                        menhgia : $('#menhgia').val(),
                      
                       
                    },
                    success : function (result){
                        $('#result').html(result); // Lấy thông tin trả về

                    }
                });

	});
	
	
	

		$("#setting").on("click", function(){

		 $.ajax({
                    url : "/ajax/setting.php",
                    type : "post",
                    dataType:"text",
                    data : {
                        title : $('#title').val(), //Đọc tài khoản
                        phone : $('#phone').val(),
                        baotri : $('#baotri').val(),
                        facebook : $('#facebook').val(),
                        thongbao : $('#thongbao').val(),
                        tb_napthe : $('#tb_napthe').val(),
                        tb_muathe : $('#tb_muathe').val(),
                        logo : $('#logo').val()
                    },
                    success : function (result){
                        $('#result').html(result); // Lấy thông tin trả về

                    }
                });

	});
	
	$("#congtien").on("click", function(){

		 $.ajax({
                    url : "/ajax/congtien.php",
                    type : "post",
                    dataType:"text",
                    data : {
                        uid : $('#uid').val(),
                        sotien : $('#sotien').val(), //Đọc tài khoản
                    },
                    success : function (result){
                        $('#result').html(result); // Lấy thông tin trả về

                    }
                });

	});
	
		$("#phanquyen").on("click", function(){

		 $.ajax({
                    url : "/ajax/phanquyen.php",
                    type : "post",
                    dataType:"text",
                    data : {
                        chucvu : $('#chucvu').val(),
                        pass : $('#pass').val(),
                        uid : $('#uid').val()
                    },
                    success : function (result){
                        $('#result').html(result); // Lấy thông tin trả về

                    }
                });

	});