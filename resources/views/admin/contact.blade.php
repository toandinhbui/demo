@extends('admin.layout.index')
@section('content')

<table class="table" id="Contacts_table">
    <thead class="thead-dark">
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Nội dung liên hệ</th>
            <th colspan="2">Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contacts as $value)
        <tr>
            <th>{{$value->id}}</th>
            <td>{{$value->name}}</td>
            <td>{{$value->mail}}</td>
            <td>{{$value->phone}}</td>
            <td>{{ $value->message}}</td>
            <td>
                <button type="button" class="btn btn-success">Trả lời</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
@section('script')
@endsection