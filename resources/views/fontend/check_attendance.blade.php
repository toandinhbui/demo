@extends('client.profile_dashboard')
@section('fontend')
<table class="table" id="Student_table">
    <thead class="thead-dark">
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Khóa học</th>
            <th>Ngày</th>
            <th>thời gian điểm danh</th>
        </tr>
    </thead>
    <tbody>
        @php
        $i = !isset($_GET['page']) ? 1 : (20 * ($_GET['page']-1) + 1)
        @endphp
        @foreach($check_attendance as $value =>$std)
        <tr>
            <th>{{$i++}}</th>
            <td>{{$std->id_mentor}}</td>
            <td>{{$std->id_course}}</td>
            <td>{{ $std->day}}</td>
            <td>{{ $std->time}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
