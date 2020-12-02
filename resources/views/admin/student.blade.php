@extends('admin.layout.index')
@section('content')

<table class="table" id="Student_table">
    <thead class="thead-dark">
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Sinh nhật</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Ảnh đại diện</th>
            <th>Địa chỉ</th>
            <th colspan="2">Chức năng</th>
            <th><a class="addStudent" href="">Thêm học viên</a></th>
        </tr>
    </thead>
    <tbody>
        @php 
        $i = !isset($_GET['page']) ? 1 : (20 * ($_GET['page']-1) + 1)
    @endphp
        @foreach($students as $value =>$std)
        <tr>
            <th>{{$i++}}</th>
            <td>{{$std->name}}</td>
            <td>{{$std->birthday}}</td>
            <td>{{ $std->phone}}</td>
            <td>{{ $std->email}}</td>
            <td><img src="{{url('')}}/upload/img/{{$std->avatar}}" alt=""width="120px"></td>
            <td>{{ $std->address}}</td>
            <td> <a href="{{ route('ajax_deleteStudent',$std->id) }}" class=" btn btn-danger js-deleteStudent">Xóa</a>
                <a onclick="event.preventDefault();editStudent({{$std->id}});" href="" class="btn btn-primary">Sửa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="modal fade" id="modal-addStudent">
    <div class="modal-dialog modal-lg">
        <!-- Modal body -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Thêm học viên</h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="POST" id="form-addStudent" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div id="ctl10_formContain" class="col-md-12">
                        <div class="clear_both"></div>
                        <div class="prf-contacts sttng">
                            <h2>Thông tin</h2>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Tên</label>
                                <input type="text" name="name" class="form-control" placeholder="Họ và tên">
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Ngày tháng năm sinh</label>
                                <input type="date" name="birthday" class="form-control">
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Só điện thoại</label>
                                <input type="text" name="phone" class="form-control" placeholder="Số điện thoại">
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Email">
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
                    <button type="submit" class="btn btn-primary js-btn-addStudent">Thêm học viên</button>

                </form>

            </div>
        </div>
    </div>

</div>
<div class="modal fade" id="modal-editStudent">
    <div class="modal-dialog modal-lg">
        <!-- Modal body -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Sửa thông tin học viên</h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="POST" id="form-editStudent" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div id="ctl10_formContain" class="col-md-12">
                        <div class="clear_both"></div>
                        <div class="prf-contacts sttng">
                            <h2>Thông tin</h2>
                        </div>
                        <input type="hidden" name="id" id="idStudent">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Tên</label>
                                <input type="text" name="name" class="form-control" placeholder="Họ và tên">
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Ngày tháng năm sinh</label>
                                <input type="date" name="birthday" class="form-control">
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Só điện thoại</label>
                                <input type="text" name="phone" class="form-control" placeholder="Số điện thoại">
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Email">
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
                                <label class="control-label">Địa chỉ</label>
                                <input type="text" name="address" class="form-control" placeholder="Địa chỉ">
                                <span class="error-form"></span>
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary js-editStudent">Lưu</button>

                </form>

            </div>
        </div>
    </div>

</div>

@endsection
@section('script')
<script>
    $(function() {
        $(".addStudent").click(function(event) {
            event.preventDefault();
            $("#modal-addStudent").modal('show');
        })

        let URL = "{{ route('ajax_post.addStudent') }}"
        $('.js-btn-addStudent').click(function(e) {
            e.preventDefault();
            let $this = $(this);
            let $domForm = $this.closest('#form-addStudent');
            $.ajax({
                url: URL,
                data: new FormData($("#modal-addStudent form")[0]),
                contentType: false,
                processData: false,
                method: "POST",
            }).done(function(data) {
                console.log(data);
                $("#modal-addStudent").modal('hide');
                $("#form-addStudent")[0].reset();
                toastr.success('', 'Thêm mới thành công');
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
    function editStudent(id) {
        $.ajax({
            type: 'GET',
            url: 'edit-student/' + id,

            success: function(data) {
                console.log(data);
                $("#form-editStudent input[name=img_hi]").val(data.editStudent.avatar);
                $("#form-editStudent input[name=id]").val(data.editStudent.id);
                $("#form-editStudent input[name=name]").val(data.editStudent.name);
                $("#form-editStudent input[name=birthday]").val(data.editStudent.birthday);
                $("#form-editStudent input[name=phone]").val(data.editStudent.phone);
                $("#form-editStudent input[name=email]").val(data.editStudent.email);
                $("#form-editStudent input[name=address]").val(data.editStudent.address);
                $("#form-editStudent #img_cu").attr('src', '{{url("")}}/upload/img/' + data.editStudent.avatar);


                $('#modal-editStudent').modal('show');

            },
            error: function(data) {

            }
        });
    }
</script>
<script type="text/javascript">
    //post sửa folder
    $(function() {
        $('.js-editStudent').click(function(e) {
            e.preventDefault();
            let $this = $(this);
            var r = confirm("Bạn có chắc chắn muốn sửa không?");
            if (r == true) {
                $.ajax({
                    method: "POST",
                    url: 'post-edit-student/' + $("#form-editStudent input[name=id]").val(),
                    data: new FormData($("#modal-editStudent form")[0]),
                    contentType: false,
                    processData: false,
                }).done(function(data) {
                    $("#modal-editStudent").modal('hide');
                    $("#form-editStudent")[0].reset();
                    $('#Student_table tbody').html(data);
                    toastr.success('', 'Sửa thành công');
                }).fail(function(data) {

                });
            }
        })
    })
</script>
<script>
    $(function() {
        $('body').on("click", '.js-deleteStudent', function(event) {
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
@endsection
