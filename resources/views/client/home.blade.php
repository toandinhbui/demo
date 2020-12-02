<!DOCTYPE html>
<html lang="en">

<head>
   @include('client.page_partials.style')
    <!-- css custom -->
<link rel="stylesheet" href="{{asset('client/assets/css/default.css')}}">
    <link rel="stylesheet" href="{{asset('client/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('client/assets/css/reponsive.css')}}">
    <title>Trang chủ</title>
    <style>
       
    </style>
</head>

<body>
    <!-- code star here -->
    <div class="container-fluid">
      {{-- header --}}
      @include('client.page_partials.header')
      {{-- header end --}}
        <!-- slide -->
        @include('client.page_partials.slider')
        <!-- slide end -->
        <!-- course -->
        <div class="container mt-50">
            <div class="ctv-course">
                <!-- button change tabs -->
                <nav class="btn-tabs-course">
                    <li onclick="showCourse1()">Khóa học mới</li>
                    <li onclick="showCourse2()">Khóa học nổi bật</li>
                    <li><a href="course.html">Xem tất cả</a></li>
                </nav>

                <!-- button change tabs end -->

                <div class="tabs-course-content mt-4">
                    <div id="show-content1">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 ">
                                <!-- course -->
                                <div class="course">

                                    <div class="img-course">
                                        <a href="course-detail.html">
                                            <img src="{{asset('client/assets/img/course/courses-1.jpg')}}" class="img-fluid w-100" alt="">
                                        </a>
                                    </div>
                                    <div class="course-content">
                                        <h3 class="course-name">
                                            Khóa học java
                                        </h3>
                                        <h4 class="course-type">
                                            Back-end
                                        </h4>
                                        <hr class="hr-course">
                                        <p class="course-detail">
                                            Java được coi là ngôn ngữ lập trình số 1 hiện nay. Nó thường được nhắc đến
                                            như
                                            một ngôn ngữ lập trình bậc cao
                                        </p>

                                        <div class="entry-total_review">
                                            <div class="total">
                                                <i class="fa fa-users"></i>
                                                <span class="number"> 1 </span> học sinh
                                            </div>
                                            <div class="review">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star"
                                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z">
                                                    </path>
                                                </svg>
                                                <span class="number">1</span> Đánh giá
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- course end-->
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3  col-xl-3 ">
                                <!-- course -->
                                <div class="course">
                                    <div class="img-course">
                                        <a href="">
                                            <img src="{{asset('client/assets/img/course/courses-1.jpg')}}" class="img-fluid w-100" alt="">
                                        </a>
                                    </div>
                                    <div class="course-content">
                                        <h3 class="course-name">
                                            Khóa học java
                                        </h3>
                                        <h4 class="course-type">
                                            Back-end
                                        </h4>
                                        <hr class="hr-course">
                                        <p class="course-detail">
                                            Java được coi là ngôn ngữ lập trình số 1 hiện nay. Nó thường được nhắc đến
                                            như
                                            một ngôn ngữ lập trình bậc cao
                                        </p>
                                        <div class="entry-total_review">
                                            <div class="total">
                                                <i class="fa fa-users"></i>
                                                <span class="number"> 1 </span> học sinh
                                            </div>
                                            <div class="review">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star"
                                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z">
                                                    </path>
                                                </svg>
                                                <span class="number">1</span> Đánh giá
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- course end-->
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3  col-xl-3 ">
                                <!-- course -->
                                <div class="course">
                                    <div class="img-course">
                                        <a href="">
                                            <img src="{{asset('client/assets/img/course/java.png')}}" class="img-fluid w-100" alt="">
                                        </a>
                                    </div>
                                    <div class="course-content">
                                        <h3 class="course-name">
                                            Khóa học java
                                        </h3>
                                        <h4 class="course-type">
                                            Back-end
                                        </h4>
                                        <hr class="hr-course">
                                        <p class="course-detail">
                                            Java được coi là ngôn ngữ lập trình số 1 hiện nay. Nó thường được nhắc đến
                                            như
                                            một ngôn ngữ lập trình bậc cao
                                        </p>

                                        <div class="entry-total_review">
                                            <div class="total">
                                                <i class="fa fa-users"></i>
                                                <span class="number"> 1 </span> học sinh
                                            </div>
                                            <div class="review">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star"
                                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z">
                                                    </path>
                                                </svg>
                                                <span class="number">1</span> Đánh giá
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- course end-->
                            </div>
                            <div class="col-sm-12 col-md-6  col-lg-3 col-xl-3">
                                <!-- course -->
                                <div class="course">
                                    <div class="img-course">
                                        <a href="">
                                            <img src="{{asset('client/assets/img/course/courses-2.jpg')}}" class="img-fluid w-100" alt="">
                                        </a>
                                    </div>
                                    <div class="course-content">
                                        <h3 class="course-name">
                                            Khóa học java
                                        </h3>
                                        <h4 class="course-type">
                                            Back-end
                                        </h4>
                                        <hr class="hr-course">
                                        <p class="course-detail">
                                            Java được coi là ngôn ngữ lập trình số 1 hiện nay. Nó thường được nhắc đến
                                            như
                                            một ngôn ngữ lập trình bậc cao
                                        </p>

                                        <div class="entry-total_review">
                                            <div class="total">
                                                <i class="fa fa-users"></i>
                                                <span class="number"> 1 </span> học sinh
                                            </div>
                                            <div class="review">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star"
                                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z">
                                                    </path>
                                                </svg>
                                                <span class="number">1</span> Đánh giá
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- course end-->
                            </div>
                        </div>
                    </div>
                    <div id="show-content2">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 ">
                                <!-- course -->
                                <div class="course">

                                    <div class="img-course">
                                        <a href="">
                                            <img src="{{asset('client/assets/img/course/courses-1.jpg')}}" class="img-fluid w-100" alt="">
                                        </a>
                                    </div>
                                    <div class="course-content">
                                        <h3 class="course-name">
                                            Khóa học java 2
                                        </h3>
                                        <h4 class="course-type">
                                            Back-end
                                        </h4>
                                        <hr class="hr-course">
                                        <p class="course-detail">
                                            Java được coi là ngôn ngữ lập trình số 1 hiện nay. Nó thường được nhắc đến
                                            như
                                            một ngôn ngữ lập trình bậc cao
                                        </p>

                                        <div class="entry-total_review">
                                            <div class="total">
                                                <i class="fa fa-users"></i>
                                                <span class="number"> 1 </span> học sinh
                                            </div>
                                            <div class="review">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star"
                                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z">
                                                    </path>
                                                </svg>
                                                <span class="number">1</span> Đánh giá
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- course end-->
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3  col-xl-3 ">
                                <!-- course -->
                                <div class="course">
                                    <div class="img-course">
                                        <a href="">
                                            <img src="{{asset('client/assets/img/course/courses-1.jpg')}}" class="img-fluid w-100" alt="">
                                        </a>
                                    </div>
                                    <div class="course-content">
                                        <h3 class="course-name">
                                            Khóa học java
                                        </h3>
                                        <h4 class="course-type">
                                            Back-end
                                        </h4>
                                        <hr class="hr-course">
                                        <p class="course-detail">
                                            Java được coi là ngôn ngữ lập trình số 1 hiện nay. Nó thường được nhắc đến
                                            như
                                            một ngôn ngữ lập trình bậc cao
                                        </p>
                                        <div class="entry-total_review">
                                            <div class="total">
                                                <i class="fa fa-users"></i>
                                                <span class="number"> 1 </span> học sinh
                                            </div>
                                            <div class="review">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star"
                                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z">
                                                    </path>
                                                </svg>
                                                <span class="number">1</span> Đánh giá
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- course end-->
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3  col-xl-3 ">
                                <!-- course -->
                                <div class="course">
                                    <div class="img-course">
                                        <a href="">
                                            <img src="{{asset('client/assets/img/course/java.png')}}" class="img-fluid w-100" alt="">
                                        </a>
                                    </div>
                                    <div class="course-content">
                                        <h3 class="course-name">
                                            Khóa học java
                                        </h3>
                                        <h4 class="course-type">
                                            Back-end
                                        </h4>
                                        <hr class="hr-course">
                                        <p class="course-detail">
                                            Java được coi là ngôn ngữ lập trình số 1 hiện nay. Nó thường được nhắc đến
                                            như
                                            một ngôn ngữ lập trình bậc cao
                                        </p>

                                        <div class="entry-total_review">
                                            <div class="total">
                                                <i class="fa fa-users"></i>
                                                <span class="number"> 1 </span> học sinh
                                            </div>
                                            <div class="review">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star"
                                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z">
                                                    </path>
                                                </svg>
                                                <span class="number">1</span> Đánh giá
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- course end-->
                            </div>
                            <div class="col-sm-12 col-md-6  col-lg-3 col-xl-3">
                                <!-- course -->
                                <div class="course">
                                    <div class="img-course">
                                        <a href="">
                                            <img src="{{asset('client/assets/img/course/courses-2.jpg')}}" class="img-fluid w-100" alt="">
                                        </a>
                                    </div>
                                    <div class="course-content">
                                        <h3 class="course-name">
                                            Khóa học java
                                        </h3>
                                        <h4 class="course-type">
                                            Back-end
                                        </h4>
                                        <hr class="hr-course">
                                        <p class="course-detail">
                                            Java được coi là ngôn ngữ lập trình số 1 hiện nay. Nó thường được nhắc đến
                                            như
                                            một ngôn ngữ lập trình bậc cao
                                        </p>

                                        <div class="entry-total_review">
                                            <div class="total">
                                                <i class="fa fa-users"></i>
                                                <span class="number"> 1 </span> học sinh
                                            </div>
                                            <div class="review">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star"
                                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z">
                                                    </path>
                                                </svg>
                                                <span class="number">1</span> Đánh giá
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- course end-->
                            </div>
                        </div>
                    </div>

                </div>
                <!-- button change tabs end-->
            </div>
        </div>
        <!-- course end -->
        <!-- ctv mentor -->
        <div class="container mt-50">
            <div class="grid-title mt-5">
                <h4 class="title-mentor">
                    Gia sư nổi bật
                </h4>
                <a href="" class="title-mentor-link">
                    Xem tất cả <i class="fa fa-angle-double-right"></i>
                    </h4>
            </div>
        </div>
        <!-- slider mentor -->
        <div class="container mt-2">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <!-- box-mentor -->
                    <div class="box">
                      <div class="img-mentor">
                        <a href="">
                          <img src="{{asset('client/assets/img/user/user2.jpg')}}" class="img-fluid w-100" alt="">
                        </a>
                      </div>
                      <div class="box-content">
                        <h3 class="content-name-mentor">
                          Nguyễn Quốc Tuấn
                        </h3>
                        <h4 class="content-subject">
                          Front-end
                        </h4>
                        <h4 class="content-price">
                          100.000 vnd / <span>Giờ</span>
                        </h4>
                        <div class="content-des">
                          <p class="views">
                            Hiện tại đang là SV năm 4 khoa CNTT trường đại học Quốc Gia.
                            Đã có 3 năm kinh nghiệm làm gia sư các môn về Front-end.
                        </div>
                        </p>
                        <div class="box-read-more">
                          <a href="mentor-detail.html" class="btn btn-read-more">
                            Xem thêm
                          </a>
                        </div>
                      </div>
                    </div>
                    <!-- box-mentor end -->
                  </div>
                  <div class="swiper-slide">
                    <!-- box-mentor -->
                    <div class="box">
                      <div class="img-mentor">
                        <a href="">
                          <img src="{{asset('client/assets/img/user/user2.jpg')}}" class="img-fluid w-100" alt="">
                        </a>
                      </div>
                      <div class="box-content">
                        <h3 class="content-name-mentor">
                          Nguyễn Quốc Tuấn
                        </h3>
                        <h4 class="content-subject">
                          Front-end
                        </h4>
                        <h4 class="content-price">
                          100.000 vnd / <span>Giờ</span>
                        </h4>
                        <div class="content-des">
                          <p class="views">
                            Hiện tại đang là SV năm 4 khoa CNTT trường đại học Quốc Gia.
                            Đã có 3 năm kinh nghiệm làm gia sư các môn về Front-end.
                        </div>
                        </p>
                        <div class="box-read-more">
                          <a href="" class="btn btn-read-more">
                            Xem thêm
                          </a>
                        </div>
                      </div>
                    </div>
                    <!-- box-mentor end -->
                  </div>
                  <div class="swiper-slide">
                    <!-- box-mentor -->
                    <div class="box">
                      <div class="img-mentor">
                        <a href="">
                          <img src="{{asset('client/assets/img/user/user2.jpg')}}" class="img-fluid w-100" alt="">
                        </a>
                      </div>
                      <div class="box-content">
                        <h3 class="content-name-mentor">
                          Nguyễn Quốc Tuấn
                        </h3>
                        <h4 class="content-subject">
                          Front-end
                        </h4>
                        <h4 class="content-price">
                          100.000 vnd / <span>Giờ</span>
                        </h4>
                        <div class="content-des">
                          <p class="views">
                            Hiện tại đang là SV năm 4 khoa CNTT trường đại học Quốc Gia.
                            Đã có 3 năm kinh nghiệm làm gia sư các môn về Front-end.
                        </div>
                        </p>
                        <div class="box-read-more">
                          <a href="" class="btn btn-read-more">
                            Xem thêm
                          </a>
                        </div>
                      </div>
                    </div>
                    <!-- box-mentor end -->
                  </div>
                  <div class="swiper-slide">
                    <!-- box-mentor -->
                    <div class="box">
                      <div class="img-mentor">
                        <a href="">
                          <img src="{{asset('client/assets/img/user/user2.jpg')}}" class="img-fluid w-100" alt="">
                        </a>
                      </div>
                      <div class="box-content">
                        <h3 class="content-name-mentor">
                          Nguyễn Quốc Tuấn
                        </h3>
                        <h4 class="content-subject">
                          Front-end
                        </h4>
                        <h4 class="content-price">
                          100.000 vnd / <span>Giờ</span>
                        </h4>
                        <div class="content-des">
                          <p class="views">
                            Hiện tại đang là SV năm 4 khoa CNTT trường đại học Quốc Gia.
                            Đã có 3 năm kinh nghiệm làm gia sư các môn về Front-end.
                        </div>
                        </p>
                        <div class="box-read-more">
                          <a href="" class="btn btn-read-more">
                            Xem thêm
                          </a>
                        </div>
                      </div>
                    </div>
                    <!-- box-mentor end -->
                  </div>
                  <div class="swiper-slide">
                    <!-- box-mentor -->
                    <div class="box">
                      <div class="img-mentor">
                        <a href="">
                          <img src="{{asset('client/assets/img/user/user2.jpg')}}" class="img-fluid w-100" alt="">
                        </a>
                      </div>
                      <div class="box-content">
                        <h3 class="content-name-mentor">
                          Nguyễn Quốc Tuấn
                        </h3>
                        <h4 class="content-subject">
                          Front-end
                        </h4>
                        <h4 class="content-price">
                          100.000 vnd / <span>Giờ</span>
                        </h4>
                        <div class="content-des">
                          <p class="views">
                            Hiện tại đang là SV năm 4 khoa CNTT trường đại học Quốc Gia.
                            Đã có 3 năm kinh nghiệm làm gia sư các môn về Front-end.
                        </div>
                        </p>
                        <div class="box-read-more">
                          <a href="" class="btn btn-read-more">
                            Xem thêm
                          </a>
                        </div>
                      </div>
                    </div>
                    <!-- box-mentor end -->
                  </div>
                  <div class="swiper-slide">
                    <!-- box-mentor -->
                    <div class="box">
                      <div class="img-mentor">
                        <a href="">
                          <img src="{{asset('client/assets/img/user/user2.jpg')}}" class="img-fluid w-100" alt="">
                        </a>
                      </div>
                      <div class="box-content">
                        <h3 class="content-name-mentor">
                          Nguyễn Quốc Tuấn
                        </h3>
                        <h4 class="content-subject">
                          Front-end
                        </h4>
                        <h4 class="content-price">
                          100.000 vnd / <span>Giờ</span>
                        </h4>
                        <div class="content-des">
                          <p class="views">
                            Hiện tại đang là SV năm 4 khoa CNTT trường đại học Quốc Gia.
                            Đã có 3 năm kinh nghiệm làm gia sư các môn về Front-end.
                        </div>
                        </p>
                        <div class="box-read-more">
                          <a href="" class="btn btn-read-more">
                            Xem thêm
                          </a>
                        </div>
                      </div>
                    </div>
                    <!-- box-mentor end -->
                  </div>
                  <div class="swiper-slide">
                    <!-- box-mentor -->
                    <div class="box">
                      <div class="img-mentor">
                        <a href="">
                          <img src="{{asset('client/assets/img/user/user2.jpg')}}" class="img-fluid w-100" alt="">
                        </a>
                      </div>
                      <div class="box-content">
                        <h3 class="content-name-mentor">
                          Nguyễn Quốc Tuấn
                        </h3>
                        <h4 class="content-subject">
                          Front-end
                        </h4>
                        <h4 class="content-price">
                          100.000 vnd / <span>Giờ</span>
                        </h4>
                        <div class="content-des">
                          <p class="views">
                            Hiện tại đang là SV năm 4 khoa CNTT trường đại học Quốc Gia.
                            Đã có 3 năm kinh nghiệm làm gia sư các môn về Front-end.
                        </div>
                        </p>
                        <div class="box-read-more">
                          <a href="" class="btn btn-read-more">
                            Xem thêm
                          </a>
                        </div>
                      </div>
                    </div>
                    <!-- box-mentor end -->
                  </div>
                  <div class="swiper-slide">
                    <!-- box-mentor -->
                    <div class="box">
                      <div class="img-mentor">
                        <a href="">
                          <img src="{{asset('client/assets/img/user/user2.jpg')}}" class="img-fluid w-100" alt="">
                        </a>
                      </div>
                      <div class="box-content">
                        <h3 class="content-name-mentor">
                          Nguyễn Quốc Tuấn
                        </h3>
                        <h4 class="content-subject">
                          Front-end
                        </h4>
                        <h4 class="content-price">
                          100.000 vnd / <span>Giờ</span>
                        </h4>
                        <div class="content-des">
                          <p class="views">
                            Hiện tại đang là SV năm 4 khoa CNTT trường đại học Quốc Gia.
                            Đã có 3 năm kinh nghiệm làm gia sư các môn về Front-end.
                        </div>
                        </p>
                        <div class="box-read-more">
                          <a href="" class="btn btn-read-more">
                            Xem thêm
                          </a>
                        </div>
                      </div>
                    </div>
                    <!-- box-mentor end -->
                  </div>
                  <div class="swiper-slide">
                    <!-- box-mentor -->
                    <div class="box">
                      <div class="img-mentor">
                        <a href="">
                          <img src="{{asset('client/assets/img/user/user2.jpg')}}" class="img-fluid w-100" alt="">
                        </a>
                      </div>
                      <div class="box-content">
                        <h3 class="content-name-mentor">
                          Nguyễn Quốc Tuấn
                        </h3>
                        <h4 class="content-subject">
                          Front-end
                        </h4>
                        <h4 class="content-price">
                          100.000 vnd / <span>Giờ</span>
                        </h4>
                        <div class="content-des">
                          <p class="views">
                            Hiện tại đang là SV năm 4 khoa CNTT trường đại học Quốc Gia.
                            Đã có 3 năm kinh nghiệm làm gia sư các môn về Front-end.
                        </div>
                        </p>
                        <div class="box-read-more">
                          <a href="" class="btn btn-read-more">
                            Xem thêm
                          </a>
                        </div>
                      </div>
                    </div>
                    <!-- box-mentor end -->
                  </div>
                </div>
                
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
              </div>
        </div>
        <!-- slider mentor end  -->
        <!-- about-us -->
        <div class="container mt-2">
            <div class="about-us-main">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="img-about-us">
                            <img src="{{asset('client/assets/img/home/tutor-1-02.png')}}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="about-us-content">
                            <h3 class="entry-about-title">
                                Giới thiệu
                            </h3>
                            <p>
                                Mentor-X là chương trình đào tạo nguồn lực công nghệ thông tin chất lượng cao, bao
                                gồm nhiều khoá học: online ngắn hạnn hằm giúp bạn trở thành lập trình
                                viên chuyên nghiệp trong thời gian ngắn nhất.
                            </p>
                            <p>
                                Chúng tôi phát triển mô hình đào tạo dựa trên phương pháp học mô phỏng môi trường làm
                                việc
                                thực tế để tất cả học viên đều “nhập cuộc” nhanh chóng với xu hướng công nghệ đang thay
                                đổi
                            </p>
                            <p>
                                Bằng việc tham gia bạn đã đồng ý với <a href="rules.html" style="font-size: 17px;" class="link-to-rules">điều khoản & nội quy</a>  của chúng tôi.
                            </p>
                            <div class="box-btn-about-us">
                                <a href="contact.html" class="read-more-btn"> Xem thêm </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- about-us end -->
        <!-- registration to mentor -->
        <div class="reg-to-mentor-box">
            <div class="box-reg-grid">
                <div class="box-left">
                    <div class="img-reg-to-mentor">
                        <img src="{{asset('client/assets/img/home/intro-pic (1).png')}}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="box-right">
                    <div class="text-reg">
                        <h3> Đăng ký làm gia sư để tham gia vào hệ thống cùng chúng tôi </h3>
                        <div class="btn-reg-box">
                            <a href="login-reg-to-mentor.html" class="btn btn-warning">Đăng ký</a>
                        </div>
                    </div>
                    <div class="text-reg">
                        <h3> Hoặc bạn đã có tài khoản </h3>
                        <div class="btn-reg-box">
                            <a href="login-reg-to-mentor.html" class="btn btn-warning">Đăng nhập</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- registration to mentor end -->
        <!-- blog -->
        <div class="container">
            <div class="blog mt-5">

                <div class="row">
                    <div class="col-xs-3 col-lg-3 col-md-6 col-sm-12">
                        <!-- simple card -->
                        <div class="simple-card">
                            <div class="simple-card-image">
                                <a href="">
                                    <img src="{{asset('client/assets/img/blog/blog-1.jpg')}}" class="img-fluid w-100" alt="" />
                                </a>
                            </div>
                            <div class="simple-card-content">
                                <h3 class="simple-card-title">Tin tức mới cập nhật</h3>
                                <p class="simple-card-desc">
                                    Các tin tức mới được cập nhật nhanh chóng, liên tục....
                                </p>
                                <div class="simple-card-line">

                                </div>
                            </div>
                        </div>
                        <!-- simple card end-->
                    </div>
                    <div class="col-xs-3 col-lg-3 col-md-6 col-sm-12">
                        <!-- simple card -->
                        <div class="simple-card">
                            <div class="simple-card-image">
                                <a href="">
                                    <img src="{{asset('client/assets/img/blog/blog-1.jpg')}}" class="img-fluid w-100" alt="" />
                                </a>
                            </div>
                            <div class="simple-card-content">
                                <h3 class="simple-card-title">Tin tức mới cập nhật</h3>
                                <p class="simple-card-desc">
                                    Các tin tức mới được cập nhật nhanh chóng, liên tục....
                                </p>
                                <div class="simple-card-line">

                                </div>
                            </div>
                        </div>
                        <!-- simple card end-->
                    </div>
                    <div class="col-xs-3 col-lg-3 col-md-6 col-sm-12">
                        <!-- simple card -->
                        <div class="simple-card">
                            <div class="simple-card-image">
                                <a href="">
                                    <img src="{{asset('client/assets/img/blog/blog-1.jpg')}}" class="img-fluid w-100" alt="" />
                                </a>
                            </div>
                            <div class="simple-card-content">
                                <h3 class="simple-card-title">Tin tức mới cập nhật</h3>
                                <p class="simple-card-desc">
                                    Các tin tức mới được cập nhật nhanh chóng, liên tục....
                                </p>
                                <div class="simple-card-line">

                                </div>
                            </div>
                        </div>
                        <!-- simple card end-->
                    </div>
                    <div class="col-xs-3 col-lg-3 col-md-6 col-sm-12">
                        <!-- simple card -->
                        <div class="simple-card">
                            <div class="simple-card-image">
                                <a href="">
                                    <img src="{{asset('client/assets/img/blog/blog-1.jpg')}}" class="img-fluid w-100" alt="" />
                                </a>
                            </div>
                            <div class="simple-card-content">
                                <h3 class="simple-card-title">Tin tức mới cập nhật</h3>
                                <p class="simple-card-desc">
                                    Các tin tức mới được cập nhật nhanh chóng, liên tục....
                                </p>
                                <div class="simple-card-line">

                                </div>
                            </div>
                        </div>
                        <!-- simple card end-->
                    </div>
                </div>


            </div>
        </div>
        <!-- blog end -->
        <!-- footer -->
        @include('client.page_partials.footer')
        <!-- footer end -->
        {{-- scripts --}}
        @include('client.page_partials.script')
        {{-- scripts end --}}
    </div>
    <!-- code finish here -->
</body>

</html>