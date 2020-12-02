<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('client.page_partials.style')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{asset('client/assets/css/default.css')}}">
    <link rel="stylesheet" href="{{asset('client/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('client/assets/css/reponsive.css')}}">
    <title>Khóa học</title>
</head>

<body>
    <div class="container-fluid">
        <!-- hd-top -->
        @include('client.page_partials.header')
        <!-- hd-top end -->
        <!-- content -->
        <!-- banner -->
        <div class="banner">
            <h1> Khóa học </h1>
        </div>
        <!-- banner end -->
        <div class="container mt-5">
            <div class="row">
                <!-- sidebar -->
                <div class=" col-lg-2 col-md-2 col-sm-12 sidebar">
                    <h3 class="title">
                        Danh mục
                    </h3>
                    <ul class="list-category">
                        <li> <a href=""> Front-end <i class="fa fa-angle-right"></i> </a></li>
                        <li> <a href=""> Back-end <i class="fa fa-angle-right"></i> </a></li>
                        <li> <a href=""> Full-stack <i class="fa fa-angle-right"></i> </a></li>
                        <li> <a href=""> Mobile <i class="fa fa-angle-right"></i> </a></li>
                        <li> <a href=""> Java <i class="fa fa-angle-right"></i> </a></li>
                    </ul>
                    <hr>

                </div>
                <!-- sidebar end -->
                <!-- artice  -->
                <div class="col-lg-10 col-md-10 col-sm-12 artice search_name">
                    <!-- list course -->
                    <div class="row wrapper" id="form-search-name">
                        <form method="post" id="form-name">
                            {{ csrf_field() }}
                            <input name="name" type="text" placeholder="Search" value="">
                            <button onclick="event.preventDefault();search_name();" type="submit">Tìm kiếm</button>
                        </form>
                    </div>
                    <div class="row">
                        <div class="filter">
                            <select name="search_position" id="search-position" onchange="event.preventDefault();change()" class="select-filter">
                                <option value="0">Tất cả vị trí</option>
                                <option value="1"> Chính thức</option>
                                <option value="2">Thực tập</option>
                            </select>
                            <select name="Sắp xếp theo " id="" class="select-filter">
                                <option value="0"> Giá cao đến thấp </option>
                                <option value="1">Giá thấp đến cao </option>
                            </select>

                        </div>
                    </div>
                    @foreach($mentor as $value)
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                            <!-- course -->
                            <div class="course">
                                <div class="img-course">
                                    <a href="course-detail/{{$value->id}}">
                                        <img src="{{url('')}}/upload/img/{{$value->avatar}}" class="img-fluid w-100" alt="">
                                    </a>
                                </div>
                                <div class="course-content">
                                    <h3 class="course-name">
                                        Gia sư : {{$value->name}}
                                    </h3>
                                    <h4 class="course-type">
                                        Chuyên ngành : {{$value->specialized_name}}
                                    </h4>
                                    <p class="course-detail">
                                        Ngày Sinh : {{$value->birthday}}
                                    </p>
                                    <p class="course-detail">
                                        Khóa học : {{$value->title}}
                                    </p>
                                    <hr class="hr-course">
                                    <div class="entry-total_review">
                                        <div class="total">
                                            <i class="fa fa-users"></i>
                                            <span class="number"> 1 </span> học sinh
                                        </div>
                                        <div class="review">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z">
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
                    @endforeach


                    <!-- list course end -->
                    <!-- pagination -->
                    <nav class="pagination mt-5 mb-5">
                        <ul class="list-link">
                            <li>
                                <a href=""><span aria-hidden="true">&laquo;</span></a>
                            </li>
                            <li>
                                <a href="">1</a>
                            </li>
                            <li>
                                <a href="">2</a>
                            </li>
                            <li>
                                <a href="">3</a>
                            </li>
                            <li>
                                <a href=""> <span aria-hidden="true">&raquo;</span></a>
                            </li>
                        </ul>
                    </nav>
                    <!-- pagination end-->
                </div>
                <!-- artice end  -->
            </div>

        </div>
        <!-- content end-->
        <!-- footer -->
        @include('client.page_partials.footer')
        @include('client.page_partials.script')
    </div>
    <script src="js/toastr.min.js"></script>
    <script src="js/overview.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/jquery-ui-11.js"></script>
    <script src="js/jquery.ui.trong.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
    <script>
        function search_name() {
            event.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: 'search-mentor',
                data: new FormData($(".search_name form")[0]),
                contentType: false,
                processData: false,
                method: "POST",
            }).done(function(data) {
                console.log(data);
                $('.search_name').html(data);
                document.getElementById('edit-pa').style.display = "none";
                document.getElementById("form-name").reset();
            }).fail(function(data) {
                console.log(data);
            });
        }
    </script>
</body>

</html>
