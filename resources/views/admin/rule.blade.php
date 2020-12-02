@extends('admin.layout.index')
@section('content')

<table class="table" id="rules_table" border="1">
    <thead class="thead-dark">
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Nội dung</th>
            <th colspan="2">Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @php 
            $i = !isset($_GET['page']) ? 1 : (20 * ($_GET['page']-1) + 1)
        @endphp
        @foreach($rules as $value)
        <tr>
            <th>{{$i++}}</th>
            <td>{{$value->name}}</td>
            <td>{{ $value->content}}</td>
            <td>
                <a onclick="event.preventDefault();editRule({{$value->id}});" href="" class="btn btn-danger btn-sm">Sửa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="modal fade" id="modal-editRule">
    <div class="modal-dialog modal-lg">
        <!-- Modal body -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Sửa điều khoản</h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="POST" id="form-editRule" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div id="ctl10_formContain" class="col-md-12">
                        <div class="clear_both"></div>
                        <div class="prf-contacts sttng">
                            <h2> Sửa điều khoản</h2>
                        </div>
                        <input type="hidden" name="id" id="idRule" class="form-control">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Tên</label>
                                <input type="text" name="name" class="form-control" placeholder="Tiên điều khoản">
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Nội dung</label>
                                <input type="text" name="content" class="form-control" placeholder="Nội dung">
                                <span class="error-form"></span>
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary js-editRule">Submit</button>

                </form>

            </div>
        </div>
    </div>

</div>

@endsection
@section('script')
<script>
    function editRule(id) {
        $.ajax({
            type: 'GET',
            url: 'edit-rule/' + id,

            success: function(data) {
                console.log(data);
                $("#form-editRule input[name=id]").val(data.editRule.id);
                $("#form-editRule input[name=name]").val(data.editRule.name);
                $("#form-editRule input[name=content]").val(data.editRule.content);
                $('#modal-editRule').modal('show');

            },
            error: function(data) {

            }
        });
    }
</script>
<script type="text/javascript">
    //post sửa folder
    $(function() {
        $('.js-editRule').click(function(e) {
            e.preventDefault();
            let $this = $(this);
            var r = confirm("Bạn có chắc chắn muốn sửa không?");
            if (r == true) {
                $.ajax({
                    method: "POST",
                    url: 'post-edit-rule/' + $("#form-editRule input[name=id]").val(),
                    data: new FormData($("#modal-editRule form")[0]),
                    contentType: false,
                    processData: false,
                }).done(function(data) {
                    $("#modal-editRule").modal('hide');
                    $("#form-editRule")[0].reset();
                    $('#rules_table tbody').html(data);
                    toastr.success('', 'Sửa thành công');
                }).fail(function(data) {

                });
            }
        })
    })
</script>
@endsection
