<!DOCTYPE html>
<html lang="en">
<head>
    @include('client.page_partials.style')
 <!-- css custom -->
<link rel="stylesheet" href="{{asset('client/assets/css/login-tomentor.css')}}">
    <title>Gia sư - đăng nhập</title>
</head>
<body>
	<h2>Tham gia vào hệ thống của chúng tôi</h2>
	<h3> Đăng ký trở thành Mentor </h3>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="">
			<h1>Đăng ký</h1>
            <input type="text" placeholder="Họ và tên"  class="" />
            <input type="number" placeholder="Số điện thoại" class="" />
            <input type="email" placeholder="Email" class="" />
			<input type="password" placeholder="Password" />
			<button type="submit">Đăng ký</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
      
		<form action="mentor/index.html">
            <h1>Đăng nhập</h1>
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" />
			<a href="#">Quên mật khẩu ?</a>
			<button type="submit">Đăng nhập</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Chào mừng trở lại ! </h1>
				<p>Để giữ kết nối với chúng tôi, vui lòng đăng nhập bằng thông tin cá nhân của bạn</p>
				<button class="ghost" id="signIn">Đăng nhập</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Chào bạn! !</h1>
				<p>Nhập thông tin cá nhân của bạn và bắt đầu hành trình với chúng tôi</p>
				<button class="ghost" id="signUp">Đăng ký</button>
			</div>
		</div>
	</div>
</div>


<script src="{{asset('client/assets/js/login-to-mentor.js')}}"></script>
</body>
</html>