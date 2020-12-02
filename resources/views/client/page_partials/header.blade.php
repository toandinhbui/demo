  <!-- hd-top -->
  <div class="hd-top">
    <div class="hd-top-grid">
        <div class="hd-top__left">
            <div class="slogan">
                Website giới thiệu gia sư IT Online
            </div>
        </div>
        <div class="hd-top__right">
            <div class="user-btn">
                <a href="login-reg-to-student.html" ><i class="fa fa-user"></i> Đăng ký </a>
                <a href="login-reg-to-student.html" > <i class="fa fa-user"></i> Đăng nhập</a>
            </div>
            <!-- modal login-reg form -->


             <!-- modal login-reg form end-->
        </div>
    </div>
</div>
<!-- hd-top end -->
<!-- hd-area -->
<div class="hd-area">
    <div class="hd-area-grid">
        <div class="hd-area__left">
            <a class="logo">
            <img src="{{asset('client/assets/img/logo/rsz_logo2.png')}}" class="img-fluid" alt="">
        </div>

        <div class="hd-area__right">
            <!-- nav -->
            <nav class="navigation">
                <ul class="menu">
                    <li> <a href="home.html" class=""> Trang chủ </a> </li>
                    <li> <a href="course.html" class=""> Khóa học </a> </li>
                    <li> <a href="mentor-list.html" class=""> Gia sư </a> </li>
                    <li> <a href="blog.html" class=""> Tin tức </a> </li>
                    <li> <a href="contact.html" class=""> Liên hệ </a> </li>
                    <!-- search -->

                    <!-- search end -->
                </ul>
                <div class="search">
                    <button class="btn-drop" onclick="show()">
                        <i class="fa fa-search" id="hide-icon" class="mystyle"></i>
                    </button>
                    <div id="show-content">
                        <form action="" method="post" class="form-search">
                            <input type="text" class="import-search" placeholder="">
                            <button type="submit" class="icon-search">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <!-- user-dropdown -->
                <div class="dropdown">
                    <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{asset('client/assets/img/user/user.png')}}" alt="">
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Hồ sơ</a>
                        <a class="dropdown-item" href="#">Cài đặt</a>
                        <a class="dropdown-item" href="#">Đăng xuất</a>
                    </div>
                </div>
            </nav>
            <!-- nav end -->
        </div>
    </div>
</div>
<!-- hd-area end -->
<!-- hd-responsive -->
<div class="hd-reponsive">
    <div class="hd-reponsive-grid">
        <!-- tab-menu -->
        <div class="tab-menu">
            <button class="repon-drop-search" onclick="openNav()">
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <!-- open nav content -->
        <div class="show-nav-box" id="show_nav">
            <a href="" class="close-nav" onclick="closeNav()">
                <i class="fa fa-window-close"></i>
            </a>
            <ul class="menu-open-nav">
                <li><a href="home.html">Trang chủ</a></li>
                <li><a href="course.html">Khoá học</a></li>
                <li><a href="mentor-list.html">Gia sư</a></li>
                <li><a href="blog.html">Tin tức</a></li>
                <li><a href="contact.html">Liên hệ</a></li>
            </ul>
            <ul class="menu-open-user">
                <li> <a href="login-reg-to-student.html"> <i class="fa fa-user"></i> Đăng ký </a> </li>
                <li> <a href="login-reg-to-student.html"> <i class="fa fa-user"></i> Đăng nhập</a> </li>
            </ul>
        </div>

        <!-- open nav content end-->
        <!-- tab-menu end -->
        <!-- logo reponsive -->
        <div class="reponsive-logo">
            <a href="home.html">
                <img src="{{asset('client/assets/img/logo/rsz_logo2.png')}}" class="img-fluid" alt="">
            </a>
        </div>
        <!-- logo reponsive -->
        <!-- search-reponsive -->
        <div class="search-reponsive">
            <button id="icon_show" onclick="showSearch()">
                <i class="fa fa-search"></i>
            </button>
            <div class="box-search-reponsive" id="showSearch_box">
                <form action="" method="post">
                    <input type="text" class="input_showSearch" id="" placeholder="Từ khóa">
                    <button type="submit" class="btn_showSearch">
                        <svg width="16px" height="" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                            <path fill-rule="evenodd"
                                d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                        </svg>
                    </button>
                    <div onclick="hideSearch_box()" class="hidesearch">
                        <i class="fa fa-window-close"></i>
                    </div>
                </form>
            </div>
        </div>
        <!-- search-reponsive end-->
    </div>

</div>
<!-- hd-responsive end -->