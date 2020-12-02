@extends('admin.layout.index')
@section('content')

<table class="table" id="settings_table">
    <thead class="thead-dark">
        <tr>
            <th>STT</th>
            <th>Logo</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Tên công ty</th>
            <th>Url Facbook</th>
            <th>Url Youtube</th>
            <th colspan="2">Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach($settings as $value)
        <tr>
            <th>{{$value->id}}</th>
            <td><img src="{{url('')}}/upload/img/{{$value->logo}}" alt=""width="120px"></td>
            <td>{{$value->phone}}</td>
            <td>{{ $value->address}}</td>
            <td>{{ $value->company_name}}</td>
            <td>{{ $value->facebook_url}}</td>
            <td>{{ $value->youtube_url}}</td>
            <td>
                <a onclick="event.preventDefault();editSetting({{$value->id}});" href="" class="btn btn-primary">Sửa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="modal fade" id="modal-editSetting">
    <div class="modal-dialog modal-lg">
        <!-- Modal body -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Sửa cấu hình website</h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="POST" id="form-editSetting" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div id="ctl10_formContain" class="col-md-12">
                        <div class="clear_both"></div>
                        <input type="hidden" name="id" id="idSetting" class="form-control">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Logo</label>
                                <input type="file" name="logo" class="form-control" placeholder="logo">
                                <input type="hidden" name="img_hi" id="img_hi" class="form-control">
                                <img src="" alt="" id="img_cu" name="img_cu" width="50px">
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Số điện thoại</label>
                                <input type="text" name="phone" class="form-control" placeholder="Số điện thoại">
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Địa chỉ</label>
                                <input type="text" name="address" class="form-control" placeholder="Địa chỉ">
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Tên công ty</label>
                                <input type="text" name="company_name" class="form-control" placeholder="Tên công ty">
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">FacebookUrl</label>
                                <input type="text" name="facebook_url" class="form-control" placeholder="Link facebook">
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">YoutubeUrl</label>
                                <input type="text" name="youtube_url" class="form-control" placeholder="Link Youtube">
                                <span class="error-form"></span>
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary js-editSetting">Submit</button>

                </form>

            </div>
        </div>
    </div>

</div>

@endsection
@section('script')
<script>
    function editSetting(id) {
        $.ajax({
            type: 'GET',
            url: 'edit-setting/' + id,

            success: function(data) {
                console.log(data);
                $("#form-editSetting input[name=img_hi]").val(data.editSetting.logo);
                $("#form-editSetting input[name=id]").val(data.editSetting.id);
                $("#form-editSetting input[name=phone]").val(data.editSetting.phone);
                $("#form-editSetting input[name=address]").val(data.editSetting.address);
                $("#form-editSetting input[name=company_name]").val(data.editSetting.company_name);
                $("#form-editSetting input[name=facebook_url]").val(data.editSetting.facebook_url);
                $("#form-editSetting input[name=youtube_url]").val(data.editSetting.youtube_url);
                $("#form-editSetting #img_cu").attr('src', '{{url("")}}/upload/img/' + data.editSetting.logo);
                $('#modal-editSetting').modal('show');

            },
            error: function(data) {

            }
        });
    }
</script>
<script type="text/javascript">
    //post sửa folder
    $(function() {
        $('.js-editSetting').click(function(e) {
            e.preventDefault();
            let $this = $(this);
            var r = confirm("Bạn có chắc chắn muốn sửa không?");
            if (r == true) {
                $.ajax({
                    method: "POST",
                    url: 'post-edit-setting/' + $("#form-editSetting input[name=id]").val(),
                    data: new FormData($("#modal-editSetting form")[0]),
                    contentType: false,
                    processData: false,
                }).done(function(data) {
                    $("#modal-editSetting").modal('hide');
                    $("#form-editSetting")[0].reset();
                    $('#settings_table tbody').html(data);
                    toastr.success('', 'Sửa thành công');
                }).fail(function(data) {

                });
            }
        })
    })
</script>
@endsection
