
// const ho = document.getElementById("ho");
	function check_ho(){
	   	var ho = document.getElementById("ho").value;
	   	// var icon = document.getElementById("icon").style.display = "none";

	   	 	if (ho == ""){
				document.getElementById("ho_error").innerHTML ="Nhập họ";
				document.getElementById("ho").style.border = "#d93025 2px solid";
				// document.getElementById("icon").style.display = "block";
				return false;
			}else{
				document.getElementById("ho_error").innerHTML ="";
				document.getElementById("ho").style.border = "";
				return true;
			}
	  	}
	ho.addEventListener('focusout', (event) => { 
          check_ho();
	});

// const ten = document.getElementById("ten");
	function check_ten(){
	  	var ten = document.getElementById("ten").value;
	  		if(ten == ""){
	  			document.getElementById("ten_error").innerHTML = "Nhập tên";
	  			document.getElementById("ten").style.border = "#d93025 2px solid";
	  			return false;
	  		}else{
	  			document.getElementById("ten_error").innerHTML = "";
	  			document.getElementById("ten").style.border = "";
	  			return true;
	  		}
	  	}
  	ten.addEventListener('focusout', (event) => { 
          check_ten();
	  });

// const email = document.getElementById("email");
	function check_email(){
	  	var email = document.getElementById("email").value;
	  	var mail = /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
	  		if(email == ""){
	  			document.getElementById("email_error").innerHTML = "Nhập email";
	  			document.getElementById("email").style.border = "#d93025 2px solid";
	  			return false;
	  		}else if(!mail.test(email)){
	  			document.getElementById("email_error").innerHTML = "Email không hợp lệ"
	  			document.getElementById("email").style.border = "#d93025 2px solid";
	  			return false;
	  		}else{
	  			document.getElementById("email_error").innerHTML = "";
	  			document.getElementById("email").style.border = "";
	  			return true;
	  		}
	  	}
  	email.addEventListener('focusout', (event) => { 
          check_email();
	  });

// const tendangnhap = document.getElementById("tendangnhap");
	function check_tendangnhap(){
	  	var tendangnhap = document.getElementById("tendangnhap").value;
	  		if(tendangnhap == ""){
	  			document.getElementById("tendangnhap_error").innerHTML = "Nhập tài khoản";
	  			document.getElementById("tendangnhap").style.border = "#d93025 2px solid";
	  			return false;
	  		}else if(tendangnhap.length < 6 || tendangnhap.length > 20){
				document.getElementById("tendangnhap_error").innerHTML = "Tài khoản từ 6 đến 20 ký tự";
				document.getElementById("tendangnhap").style.border = "#d93025 2px solid";
				return false;
			}else{
				document.getElementById("tendangnhap_error").innerHTML = "";
	  			document.getElementById("tendangnhap").style.border = "";
				return true;
			}		
	  	}
  	tendangnhap.addEventListener('focusout', (event) => { 
          check_tendangnhap();
	  });

// const matkhau = document.getElementById("matkhau");
	function check_matkhau(){
		var matkhau = document.getElementById("matkhau").value;
			if(matkhau == ""){
				document.getElementById("matkhau_error").innerHTML = "Nhập mật khẩu";
				document.getElementById("matkhau").style.border = "#d93025 2px solid";
				return false;
			}else if (matkhau.length <= 7){
				document.getElementById("matkhau_error").innerHTML = "Mật khẩu từ 8 ký tự trở lên";
				document.getElementById("matkhau").style.border = "#d93025 2px solid";
				return false;
			}else{
				document.getElementById("matkhau_error").innerHTML = "";
				document.getElementById("matkhau").style.border = "";
				return true;
			}
		}
	matkhau.addEventListener('focusout', (event) =>{
			check_matkhau();
		});

// const nhaplaimatkhau = document.getElementById("nhaplaimatkhau");
	function check_nhaplaimatkhau(){
		var matkhau = document.getElementById("matkhau").value;
		var nhaplaimatkhau = document.getElementById("nhaplaimatkhau").value;
			if(nhaplaimatkhau = "" || nhaplaimatkhau != matkhau){
				document.getElementById("nhaplaimatkhau_error").innerHTML = "Mật khẩu không khớp";
				document.getElementById("nhaplaimatkhau").style.border = "#d93025 2px solid";
				return false;
			}else{
				document.getElementById("nhaplaimatkhau_error").innerHTML = "";
				document.getElementById("nhaplaimatkhau").style.border = "";
				return true;
			}
		}
	nhaplaimatkhau.addEventListener('focusout', (event) =>{
		check_nhaplaimatkhau();
	});

// const sodienthoai = document.getElementById("sodienthoai");
	function check_sodienthoai(){
		var sodienthoai = document.getElementById("sodienthoai").value;
		var phone = /^\d{10}$/;
			if(sodienthoai == ""){
				document.getElementById("sodienthoai_error").innerHTML = "Nhập số điện thoại";
				document.getElementById("sodienthoai").style.border = "#d93025 2px solid";
				return false;
			}else if(!phone.test(sodienthoai)){
				document.getElementById("sodienthoai_error").innerHTML = "Số điện thoại không hợp lệ ";
				document.getElementById("sodienthoai").style.border = "#d93025 2px solid";
				return false;
			}else{
				document.getElementById("sodienthoai_error").innerHTML = "";
				document.getElementById("sodienthoai").style.border = "";
				return true;
			}
	}
	sodienthoai.addEventListener('focusout', (event) =>{
		check_sodienthoai();
	});

function signup(){


	var ho = document.getElementById("ho").value;
	var ten = document.getElementById("ten").value;
	var email = document.getElementById("email").value;
	var tendangnhap = document.getElementById("tendangnhap").value;
	var matkhau = document.getElementById("matkhau").value;
	var nhaplaimatkhau = document.getElementById("nhaplaimatkhau").value;
	var sodienthoai = document.getElementById("sodienthoai").value;

	var dangky = true;
	
   
	if (ho == ""){
		document.getElementById("ho_error").innerHTML = "Nhập họ";
		document.getElementById("ho").style.border = "#d93025 2px solid";
		dangky = false;
	}
  

	if (ten == ""){
		document.getElementById("ten_error").innerHTML = "Nhập tên";
		document.getElementById("ten").style.border = "#d93025 2px solid";
		dangky = false;
	}

	if (email == ""){
		document.getElementById("email_error").innerHTML = "Nhập email";
		document.getElementById("email").style.border = "#d93025 2px solid";
		dangky = false;
	}

	if (tendangnhap == ""){
		document.getElementById("tendangnhap_error").innerHTML = "Nhập tài khoản";
		document.getElementById("tendangnhap").style.border = "#d93025 2px solid";
		dangky = false;
	}else if(tendangnhap.length < 6 || tendangnhap.length > 20){
		document.getElementById("tendangnhap_error").innerHTML = "Tài khoản từ 6 đến 20 ký tự";
		document.getElementById("tendangnhap").style.border = "#d93025 2px solid";
	}
	
	if(matkhau == ""){
		document.getElementById("matkhau_error").innerHTML = "Nhập mật khẩu";
		document.getElementById("matkhau").style.border = "#d93025 2px solid";
		dangky = false;
	}else if(matkhau.length <= 7){
		document.getElementById("matkhau_error").innerHTML = "Mật khẩu phải từ 8 ký tự";
		document.getElementById("matkhau").style.border = "#d93025 2px solid";
		dangky = false;
	}

	if(nhaplaimatkhau != matkhau || nhaplaimatkhau == ""){
		document.getElementById("nhaplaimatkhau_error").innerHTML = "Mật khẩu không khớp";
		document.getElementById("nhaplaimatkhau").style.border = "#d93025 2px solid";
		dangky = false;
	}

	if(sodienthoai == ""){
		document.getElementById("sodienthoai_error").innerHTML = "Nhập số điện thoại";
		document.getElementById("sodienthoai").style.border = "#d93025 2px solid";
		dangky = false;
	}

	return dangky;
}

