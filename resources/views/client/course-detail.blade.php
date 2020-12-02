<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('client.page_partials.style')

    <link rel="stylesheet" href="{{asset('client/assets/css/default.css')}}">
    <link rel="stylesheet" href="{{asset('client/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('client/assets/css/reponsive.css')}}">
    <link rel="stylesheet" href="{{asset('client/assets/css/course-detail.css')}}">

    <title>Chi tiết - khóa học</title>
</head>

<body>
    <div class="container-fluid">
        <!-- hd-top -->
        @include('client.page_partials.header')
        <!-- hd-responsive end -->
        <!-- banner -->
        <div class="banner">
            <h1> Chi tiết khóa học </h1>
        </div>
        <!-- banner end -->
        <!-- content -->
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-3 course-detail-sidebar">
                    <div class="block_widget-3">
                        <span class="widget-title "><span>Khóa Học Nổi Bật</span></span>
                        <!-- large column 1 -->
                        <div class="large-column1">
                            <div class="post-item">
                                <div class="post-inner">
                                    <div class="box-img">
                                        <a href="">
                                            <img src="{{ asset('client/assets/img/course/1200x630wa-400x210.png') }}" class="img-fluid" alt="">
                                        </a>

                                    </div>
                                    <div class="box-text">
                                        <a href="">
                                            Giáo trình Pascal
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- large column 1 end -->
                        <!-- large column 1 -->
                        <div class="large-column1">
                            <div class="post-item">
                                <div class="post-inner">
                                    <div class="box-img">
                                        <a href="">
                                            <img src="{{ asset('client/assets/img/course/1200x630wa-400x210.png') }}" class="img-fluid" alt="">
                                        </a>

                                    </div>
                                    <div class="box-text">
                                        <a href="">
                                            Giáo trình Pascal
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- large column 1 end -->
                        <!-- large column 1 -->
                        <div class="large-column1">
                            <div class="post-item">
                                <div class="post-inner">
                                    <div class="box-img">
                                        <a href="">
                                            <img src="{{ asset('client/assets/img/course/1200x630wa-400x210.png') }}" class="img-fluid" alt="">
                                        </a>

                                    </div>
                                    <div class="box-text">
                                        <a href="">
                                            Giáo trình Pascal
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- large column 1 end -->
                    </div>

                </div>
                <div class="col-md-9 course-detail-artice">
                    <!-- title reg to learn -->
                    <div class="main-box-course">
                        <h3 class="entry-name-course">
                            @foreach($course_detail as $value)
                            Khóa học : {{$value->title}}
                            @endforeach
                        </h3>
                        <p class="total-time-course">
                            Thời gian học: từ <b>36 – 49 giờ</b>
                        </p>

                        <p class="total-time-course">
                            @foreach($mentor_detail as $value)
                            Gia sư : {{$value->name}}
                            @endforeach
                        </p>
                        <a href="" class="btn-reg-learn">
                            Đăng ký
                        </a>
                    </div>
                    <div class="nav-btn-change">
                        <nav>
                            <li class="" onclick="showCourse1()"> Tổng quan</li>
                            <li class="" onclick="showCourse2()">Đối tượng - kết quả đạt được</li>
                            <li class="" onclick="showCourse3()">Lộ trình</li>
                        </nav>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <!-- title reg to learn end-->
                    <div class="main-box-course">
                        @foreach($course_detail as $value)
                        <div class="content-detail-course">
                            <div class="detail-course-item" id="hide_Course1">
                                <div class="tab-panels">
                                    <a href="" class="mentor-of-course">
                                        Môn học : {{$value->subject_name}}
                                    </a><br>
                                    <a href="" class="mentor-of-course">
                                        tiêu đề : {{$value->title}}
                                    </a>
                                    <br>
                                    <h4 class="price-of-course">Giá:

                                        {{$value->price}}/
                                        <span>khóa</span>
                                    </h4>
                                    <h4 class="price-of-course">Giá khuyến mại:
                                        {{$value->price_sale}}/
                                        <span>khóa</span>
                                    </h4>
                                </div>
                                <div class="tab-panels">
                                    <p>
                                        {!!$value->content!!}
                                    </p>
                                </div>
                                @endforeach
                            </div>
                            <div class="detail-course-item" id="hide_Course2">
                                <div class="tab-panels">
                                    <h3> Học xong bạn có thể ? </h3>
                                    <ul>
                                        <li>Học nghề – học thành nghề.</li>
                                        <li>Hiểu biết toàn tập về android.</li>
                                        <li>Lập trình ứng dụng với android.</li>
                                        <li>Học theo dự án thực tế.</li>
                                        <li>Tham gia vào các công ty lớn trong và ngoài nước.</li>
                                        <li>Xây dựng các app cho riêng mình.</li>
                                        <li>Gia tăng thu nhập – Freelancer.</li>
                                    </ul>
                                    <h3> Đối tượng theo học khóa học </h3>
                                    <ul>
                                        <li>Học sinh - sinh viên - người đi làm</li>
                                        <li>Tất cả các bạn đam mê lĩnh vực CNTT.</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="detail-course-item" id="hide_Course3">
                                <div class="tab-panels">
                                    <h3>Phần 1 – Lập trình giao diện web </h3>
                                    <ul>
                                        <li>Ôn tập , nhắc lại , dạy mới kiến thức về giao diện web</li>
                                        <li>HTML,CSS,JS,JQuery,Boostrap cơ bản</li>
                                    </ul>
                                    <h3>Phần 2 – PHP cơ bản </h3>
                                    <ul>
                                        <li>Cài đặt Localhost Server Xampp</li>
                                        <li>Giới thiệu và làm quen với PHP</li>
                                        <li>Biến trong php</li>
                                        <li>Toán tử trong PHP</li>
                                        <li>Biểu thức điều kiện</li>
                                        <li>Vòng lặp</li>
                                        <li>Mảng và các hàm hỗ trợ Mảng</li>
                                        <li>Hàm trong PHP</li>
                                        <li>Thao tác với File</li>
                                        <li>Quy trình Upload File</li>
                                        <li>Quy trình Download File</li>
                                        <li>Phiên làm việc Session & Cookie trong PHP</li>
                                        <li>Thời gian trong PHP</li>
                                    </ul>
                                    <h3>Phần 3 – MySql cơ bản và nâng cao </h3>
                                    <ul>
                                        <li>Các kiểu dữ liệu trong MySQL</li>
                                        <li>Các thuộc tính: NULL, AUTO_INCREMENT, UNSIGNED, PRIMARY KEY,…</li>
                                        <li>Tạo Cơ sở dữ liệu (Database)</li>
                                        <li>Tạo Bảng (Table), tạo cột ( Column) , thao tác với table</li>
                                        <li>INSERT INTO</li>
                                        <li>SELECT</li>
                                        <li>UPDATE</li>
                                        <li>DELETE</li>
                                        <li>WHERE</li>
                                        <li>AND</li>
                                        <li>OR</li>
                                        <li>LIKE</li>
                                        <li>IN</li>
                                        <li>ORDER BY</li>
                                        <li>LIMIT</li>
                                        <li>JOIN (LEFT, RIGHT, INNER)</li>
                                        <li>Kết nối tới MySQL Server</li>
                                        <li>Kết nối tới Database</li>
                                        <li>SELECT Language</li>
                                        <li>Fetch Data</li>
                                        <li>Fetch Rows…</li>
                                    </ul>
                                </div>


                            </div>
                        </div>
                    </div>
                <form method="POST" action="../post-comment/{{$value->id}}" enctype="multipart/form-data">
                @csrf
                    <div class="form comment">
                        <div class="form-group">
                            <label class="font-weight-bold" for="exampleFormControlTextarea1">Bình luận</label>
                            <input type="hidden" name="id_student" value="1">

                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
                        </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </div>

                </form>
                    
                    <div class="title-course-like">
                        <h3> Khoá học liên quan </h3>
                    </div>
                    <div class="course-like">
                        <div class="carousel" data-flickity=' {"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : 4000} '>
                            <div class="carousel-cell">
                                <div class="post3-column">
                                    <div class="img-post3">
                                        <a href="">
                                            <img src="{{ asset('client/assets/img/course/kien-thuc-hay-ky-nang-mem-quan-trong-hon.jpg') }}" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="text-post3">
                                        <h3>
                                            khoá học kỹ năng mềm
                                        </h3>
                                        <p>
                                            Thực tế cho thấy người thành đạt chỉ có 25% là do những kiến thức.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-cell">
                                <div class="post3-column">
                                    <div class="img-post3">
                                        <a href="">
                                            <img src="{{ asset('client/assets/img/course/kien-thuc-hay-ky-nang-mem-quan-trong-hon.jpg') }}" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="text-post3">
                                        <h3>
                                            khoá học kỹ năng mềm
                                        </h3>
                                        <p>
                                            Thực tế cho thấy người thành đạt chỉ có 25% là do những kiến thức.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-cell">
                                <div class="post3-column">
                                    <div class="img-post3">
                                        <a href="">
                                            <img src="{{ asset('client/assets/img/course/kien-thuc-hay-ky-nang-mem-quan-trong-hon.jpg') }}" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="text-post3">
                                        <h3>
                                            khoá học kỹ năng mềm
                                        </h3>
                                        <p>
                                            Thực tế cho thấy người thành đạt chỉ có 25% là do những kiến thức.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-cell">
                                <div class="post3-column">
                                    <div class="img-post3">
                                        <a href="">
                                            <img src="{{ asset('client/assets/img/course/kien-thuc-hay-ky-nang-mem-quan-trong-hon.jpg') }}" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="text-post3">
                                        <h3>
                                            khoá học kỹ năng mềm
                                        </h3>
                                        <p>
                                            Thực tế cho thấy người thành đạt chỉ có 25% là do những kiến thức.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-cell">
                                <div class="post3-column">
                                    <div class="img-post3">
                                        <a href="">
                                            <img src="{{ asset('client/assets/img/course/kien-thuc-hay-ky-nang-mem-quan-trong-hon.jpg') }}" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="text-post3">
                                        <h3>
                                            khoá học kỹ năng mềm
                                        </h3>
                                        <p>
                                            Thực tế cho thấy người thành đạt chỉ có 25% là do những kiến thức.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- course like -->
                </div>


            </div>
        </div>
        <!-- content end -->
        <!-- footer -->
        @include('client.page_partials.footer')
        @include('client.page_partials.script')
    </div>
</body>

</html>
