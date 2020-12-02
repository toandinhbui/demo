@extends('admin.layout.index')
@section('content')

<table class="table" id="cmt_table">
    <thead class="thead-dark">
        <tr>
            <th>STT</th>
            <th>Tên học sinh</th>
            <th>Tên khóa học</th>
            <th>Nội dung</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach($fb as $cursor)
        <tr>
            <td scope="row">{{$cursor->id}}</td>
            <td>{{$cursor->student_name}}</td>
            <td>{{$cursor->course_title}}</td>
            <td>{{$cursor->content}}</td>
            <td>
                <a href="{{ route('ajax_deleteFb',$cursor->id) }}" class=" btn btn-danger btn-lg js-deleteFb">Xóa</a>             
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
@section('script')
<script>
    $(function() {
        $('body').on("click", '.js-deleteFb', function(event) {
            event.preventDefault();
            let URL = $(this).attr('href');
            let $this = $(this);
            if (confirm('Bạn có chắc muốn xóa không?')) {
                $.ajax({
                    url: URL,
                }).done(function(results) {
                    if (results.code == 200) {
                        $this.parents("tr").remove();
                        toastr.success('', 'Xóa thành công');
                    }
                }).fail(function(data) {

                });
            }

        })
    })
</script>
@endsection