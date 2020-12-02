@extends('client.profile_dashboard')
@section('fontend')

<div class="block-header">
    <h2>Khóa học của bạn</h2>

</div>
<div class="row clearfix">
    @foreach($courses_mentors as $val)
    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
        <div class="thumbnail card"><img src="client/mentor//assets/images/course-2.jpg" alt="" class="img-fluid">
            <div class="caption  body">
                <h3>{{$val->subject_name}}</h3>
                <p>{{$val->title}}</p>
                <p>{{$val->level}}</p>
                <p>Link: {{$val->plandetails_url}}</p>
                <p>giá: <strong class="col-blush">{{$val->price}}</strong></p>
                <p>giá khuyến mại: <strong class="col-blush">{{$val->sale_price}}</strong></p>
                <a href="courses-info.html" class="btn  btn-raised btn-info waves-effect" role="button">Read more</a>
            </div>
        </div>
    </div>
    @endforeach
    <div class="col-sm-12 text-center">
        <a href="#" class="btn btn-raised waves-effect g-bg-blush2" role="button">Load more</a>
    </div>
</div>
<div class="block-header">
    <h2>Tất cả khóa học</h2>

</div>
<div class="row clearfix">
    @foreach($courses as $value)
    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
        <div class="thumbnail card"><img src="client/mentor//assets/images/course-2.jpg" alt="" class="img-fluid">
            <div class="caption  body">
                <h3>{{$value->subject_name}}</h3>
                <p>{{$value->title}}</p>
                <p>{{$value->level}}</p>
                <p>Link: {{$value->plandetails_url}}</p>
                <p>giá: <strong class="col-blush">{{$value->price}}</strong></p>
                <p>giá khuyến mại: <strong class="col-blush">{{$value->sale_price}}</strong></p>
                <a href="courses-info.html" class="btn  btn-raised btn-info waves-effect" role="button">Read more</a>
            </div>
        </div>
    </div>
    @endforeach
    <div class="col-sm-12 text-center">
        <a href="#" class="btn btn-raised waves-effect g-bg-blush2" role="button">Load more</a>
    </div>
</div>

@endsection
