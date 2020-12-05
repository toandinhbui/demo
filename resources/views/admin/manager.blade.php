@extends('admin.layout.index')
@section('content')

<table class="table" id="Manager_table">
    <thead class="thead-dark">
        <tr>
            <th>STT</th>
            <th>Họ và tên</th>
            <th>Ảnh đại diện</th>
            <th>Ngày sinh</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Quyền quản trị</th>
            <th colspan="2">Chức năng</th>
            <th><a class="addManager" href="">Thêm quản trị viên</a></th>
        </tr>
    </thead>
    <tbody>
        @php
        $i = !isset($_GET['page']) ? 1 : (20 * ($_GET['page']-1) + 1)
        @endphp
        @foreach($managers as $value =>$Objrow)
        <tr>
            <th>{{$i++}}</th>
            <td>{{$Objrow->name}}</td>
            <td><img src="{{url('')}}/upload/img/{{$Objrow->avatar}}" alt="" width="30px"></td>
            <td>{{$Objrow->birthday}}</td>
            <td>{{ $Objrow->email}}</td>
            <td>{{ $Objrow->address}}</td>
            <td>{{ $Objrow->phone}}</td>
            <td>{{ $Objrow->namerole}}</td>
            <td> <a href="{{ route('ajax_deleteManager',$Objrow->id) }}" class=" btn btn-danger btn-sm js-deleteManager">Xóa</a>
                <a onclick="event.preventDefault();editManager({{$Objrow->id}});" href="" class="btn btn-danger btn-sm">Sửa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="modal fade" id="modal-addManager">
    <div class="modal-dialog modal-lg">
        <!-- Modal body -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Thêm quản trị viên</h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="POST" id="form-addManager" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div id="ctl10_formContain" class="col-md-12">
                        <div class="clear_both"></div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Họ và tên</label>
                                <input type="text" name="name" class="form-control" placeholder="Họ và tên">
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Phân quyền</label>
                                <select name="id_role" class="form-control">
                                    @foreach($role as $value =>$vv)
                                    <option value="{{$vv->id}}">{{$vv->name}}</option>
                                    @endforeach
                                </select>
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Trạng thái</label>
                                <select name="id_status" class="form-control">
                                    @foreach($status as $value =>$vv)
                                    <option value="{{$vv->id}}">{{$vv->name}}</option>
                                    @endforeach
                                </select>
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Ảnh đại diện</label>
                                <input type="file" name="avatar" id="avatar" class="form-control" placeholder="Ảnh đại diện">
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Ngày sinh</label>
                                <input type="date" name="birthday" class="form-control">
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Email:</label>
                                <input type="text" name="email" class="form-control" placeholder="Email">
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Số điện thoại</label>
                                <input type="number" name="phone" class="form-control" placeholder="Số điện thoại">
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
                                <label class="control-label">Mật khẩu</label>
                                <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                                <span class="error-form"></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary js-btn-addManager">Lưu</button>

                </form>

            </div>
        </div>
    </div>

</div>
<div class="modal fade" id="modal-editManager">
    <div class="modal-dialog modal-lg">
        <!-- Modal body -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Sửa thông tin quản trị</h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="POST" id="form-editManager" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div id="ctl10_formContain" class="col-md-12">
                        <div class="clear_both"></div>
                        <input type="hidden" name="id" id="idManager" class="form-control">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Họ và tên</label>
                                <input type="text" name="name" class="form-control" placeholder="name">
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Phân quyền</label>
                                <select name="id_role" class="form-control">
                                    @foreach($role as $value =>$vv)
                                    <option value="{{$vv->id}}">{{$vv->name}}</option>
                                    @endforeach
                                </select>
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Trạng thái</label>
                                <select name="id_status" class="form-control">
                                    @foreach($status as $value =>$vv)
                                    <option value="{{$vv->id}}">{{$vv->name}}</option>
                                    @endforeach
                                </select>
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Ảnh đại diện</label>
                                <input type="file" name="avatar" class="form-control" placeholder="avatar">
                                <input type="hidden" name="img_hi" id="img_hi" class="form-control">
                                <img src="" alt="" id="img_cu" name="img_cu" width="50px">
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="email">
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Ngày sinh</label>
                                <input type="date" name="birthday" id="avatar" class="form-control" placeholder="avatar">
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Số điện thoại</label>
                                <input type="text" name="phone" class="form-control" placeholder="phone">
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Địa chỉ</label>
                                <input type="text" name="address" class="form-control" placeholder="address">
                                <span class="error-form"></span>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary js-Editmanager">Lưu</button>

                </form>

            </div>
        </div>
    </div>

</div>

@endsection
@section('script')
<script>
    $(function() {
        $(".addManager").click(function(event) {
            event.preventDefault();
            $("#modal-addManager").modal('show');
        })

        let URL = "{{ route('ajax_post.AddManager') }}"
        $('.js-btn-addManager').click(function(e) {
            e.preventDefault();
            let $this = $(this);
            let $domForm = $this.closest('#form-addManager');
            $.ajax({
                url: URL,
                data: new FormData($("#modal-addManager form")[0]),
                contentType: false,
                processData: false,
                method: "POST",
            }).done(function(data) {
                console.log(data);
                $("#modal-addManager").modal('hide');
                $("#form-addManager")[0].reset();
                toastr.success('', 'Thêm thành công');
                $('tbody').html(data);
            }).fail(function(data) {
                $(".error-form").show();
                var errors = data.responseJSON;
                $.each(errors.errors, function(i, val) {
                    $domForm.find('input[name=' + i + ']').siblings('.error-form').text(val[0]);
                });


            });
        });
    });
</script>
<script>
    function editManager(id) {
        $.ajax({
            type: 'GET',
            url: 'Editmanager/' + id,

            success: function(data) {
                console.log(data);
                $("#form-editManager input[name=img_hi]").val(data.editManager.avatar);
                $("#form-editManager input[name=id]").val(data.editManager.id);
                $("#form-editManager input[name=name]").val(data.editManager.name);
                $("#form-editManager input[name=email]").val(data.editManager.email);
                $("#form-editManager input[name=birthday]").val(data.editManager.birthday);
                $("#form-editManager input[name=phone]").val(data.editManager.phone);
                $("#form-editManager input[name=address]").val(data.editManager.address);
                $("#form-editManager #img_cu").attr('src', '{{url("")}}/upload/img/' + data.editManager.avatar);


                $('#modal-editManager').modal('show');

            },
            error: function(data) {

            }
        });
    }
</script>
<script type="text/javascript">
    //post sửa folder
    $(function() {
        $('.js-Editmanager').click(function(e) {
            e.preventDefault();
            let $this = $(this);
            var r = confirm("Bạn có chắc chắn muốn sửa không?");
            if (r == true) {
                $.ajax({
                    method: "POST",
                    url: 'postEditManager/' + $("#form-editManager input[name=id]").val(),
                    data: new FormData($("#modal-editManager form")[0]),
                    contentType: false,
                    processData: false,
                }).done(function(data) {
                    $("#modal-editManager").modal('hide');
                    $("#form-editManager")[0].reset();
                    $('#Manager_table tbody').html(data);
                    toastr.success('', 'Sửa thành công');
                }).fail(function(data) {

                });
            }
        })
    })
</script>
<!-- Xóa Manager -->
<script>
    $(function() {
        $('body').on("click", '.js-deleteManager', function(event) {
            event.preventDefault();
            let URL = $(this).attr('href');
            let $this = $(this);
            $.ajax({
                url: URL,
            }).done(function(results) {
                if (results.code == 200) {
                    $this.parents("tr").remove();
                    toastr.success('', 'Xóa thành công');
                }
            }).fail(function(data) {

            });

        })
    })
</script>
<script>
    function deleteManager(id) {
        $.ajax({
            type: 'GET',
            url: 'deleteManager/' + id,
        }).done(function(results) {
            if (results.code == 200) {
                window.location.reload().delay(10000);
                toastr.success('', 'Xóa thành công');
            }
        }).fail(function(data) {});

    }
</script>
@endsection
