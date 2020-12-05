@extends('admin.layout.index')
@section('content')

<table class="table" id="course_table">
    <thead class="thead-dark">
        <tr>
            <th>STT</th>
            <th>gia sư</th>
            <th>Tiêu đề</th>
            <th>Ảnh</th>
            <th>Môn học</th>
            <th>Nội dung</th>
            <th>Gía</th>
            <th>Gía khuyến mại</th>
            <th colspan="2">Chức năng</th>
            <th><a class="addCourse" href="">Add Course</a></th>
        </tr>
    </thead>
    <tbody>
        @foreach($course as $value =>$Objrow)
        <tr>
            <th>{{$Objrow->id}}</th>
            <td>{{$Objrow->mentors_name}}</td>
            <td>{{$Objrow->title}}</td>
            <td><img src="{{url('')}}/upload/img/{{$Objrow->image}}" alt="" width="30px"></td>
            <td>{{$Objrow->subject_name}}</td>
            <td>{!!$Objrow->content!!}</td>
            <td>{{$Objrow->price}}</td>
            <td>{{$Objrow->sale_price}}</td>
            <td> <a onclick="event.preventDefault();deleteCourse({{ $Objrow->id }});" href="{{ route('ajax_deleteCourse',$Objrow->id) }}" class=" btn btn-danger btn-sm js-deleteCourse">Xóa</a>
                <a onclick="event.preventDefault();editCourse({{ $Objrow->id }});" href="" class="btn btn-danger btn-sm">Sửa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="modal fade" id="modal-addCourse">
    <div class="modal-dialog modal-lg">
        <!-- Modal body -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Manager</h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="POST" id="form-addCourse" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div id="ctl10_formContain" class="col-md-12">
                        <div class="clear_both"></div>
                        <div class="prf-contacts sttng">
                            <h2> Chuyên ngành</h2>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Gia sư</label>
                                <select name="mentor_name" class="form-control">
                                    @foreach($mentor_name as $value =>$vv)
                                    <option value="{{$vv->id}}">{{$vv->name}}</option>
                                    @endforeach
                                </select>

                                <span class="error-form"></span>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">title</label>
                                <input type="text" name="title" class="form-control" placeholder="title">
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">images</label>
                                <input type="file" name="image" class="form-control" placeholder="image">
                                <span class="error-form"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Môn học</label>
                            <select name="subject_name" class="form-control">
                                @foreach($subject_name as $value =>$vv)
                                <option value="{{$vv->id}}">{{$vv->name}}</option>
                                @endforeach
                            </select>
                            <span class="error-form"></span>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Nội dung</label>
                            <textarea name="test" id="editor1"></textarea>
                            <span class="error-form"></span>
                            <input type="hidden" name="content" id="test">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label">price</label>
                            <input type="text" name="price" class="form-control" placeholder="title">
                            <span class="error-form"></span>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label">sale_price</label>
                            <input type="text" name="sale_price" class="form-control" placeholder="title">
                            <span class="error-form"></span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary js-btn-addCourse">Submit</button>

                </form>

            </div>
        </div>
    </div>

</div>
<div class="modal fade" id="modal-editCourse">
    <div class="modal-dialog modal-lg">
        <!-- Modal body -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Course</h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="POST" id="form-editCourse" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div id="ctl10_formContain" class="col-md-12">
                        <div class="clear_both"></div>
                        <div class="prf-contacts sttng">
                            <h2> Chuyên ngành</h2>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Gia sư</label>
                                <select name="mentor_name" class="form-control">
                                    @foreach($mentor_name as $value =>$vv)
                                    <option value="{{$vv->id}}">{{$vv->name}}</option>
                                    @endforeach
                                </select>
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <input type="hidden" name="id" id="idCourse" class="form-control">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">title</label>
                                <input type="text" name="title" class="form-control" placeholder="title">
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">images</label>
                                <input type="file" name="image" class="form-control" placeholder="image">
                                <input type="hidden" name="img_hi" id="img_hi" class="form-control">
                                <img src="" alt="" id="img_cu" name="im g_cu" width="50px">
                                <span class="error-form"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Môn học</label>
                            <select name="subject_name" class="form-control">

                                @foreach($subject_name as $value =>$vv)
                                <option value="{{$vv->id}}">{{$vv->name}}</option>
                                @endforeach
                            </select>
                            <span class="error-form"></span>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Nội dung</label>
                            <textarea name="test" id="editor2"></textarea>
                            <span class="error-form"></span>
                            <input type="hidden" name="content" id="test1">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label">price</label>
                            <input type="text" name="price" class="form-control" placeholder="title">
                            <span class="error-form"></span>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label">sale_price</label>
                            <input type="text" name="sale_price" class="form-control" placeholder="title">
                            <span class="error-form"></span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary js-EditCourse">Submit</button>

                </form>

            </div>
        </div>
    </div>

</div>

@endsection
@section('script')
<script>
    CKEDITOR.replace('editor1');
</script>
<script>
    CKEDITOR.replace('editor2');
</script>
<script>
    $(function() {
        $(".addCourse").click(function(event) {
            event.preventDefault();
            $("#modal-addCourse").modal('show');
        })
        let URL = "{{ route('ajax_post.AddCourse')}}"
        $('.js-btn-addCourse').click(function(e) {
            e.preventDefault();
            let a = CKEDITOR.instances.editor1.getData();
            $("#test").attr('value', a);
            let $this = $(this);
            let $domForm = $this.closest('#form-addCourse');
            $.ajax({
                url: URL,
                data: new FormData($("#modal-addCourse form")[0]),
                contentType: false,
                processData: false,
                method: "POST",
            }).done(function(data) {
                console.log(data);
                $("#modal-addCourse").modal('hide');
                $("#form-addCourse")[0].reset();
                toastr.success('', 'thêm mới thành công');
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
    function editCourse(id) {
        $.ajax({
            type: 'GET',
            url: 'Editcourses/' + id,
            success: function(data) {
                $("#form-editCourse input[name=id]").val(data.editCourse.id);
                $("#form-editCourse input[name=img_hi]").val(data.editCourse.image);
                $("#form-editCourse input[name=title]").val(data.editCourse.title);
                $("#form-editCourse #editor2").val(data.editCourse.content);
                $("#form-editCourse input[name=price]").val(data.editCourse.price);
                $("#form-editCourse input[name=sale_price]").val(data.editCourse.sale_price);
                $("#form-editCourse input[name=id]").val(data.editCourse.id);
                $("#form-editCourse #img_cu").attr('src', '{{url("")}}/upload/img/' + data.editCourse.image);
                CKEDITOR.instances.editor2.setData(data.editCourse.content);
                $('#modal-editCourse').modal('show');
            },
            error: function(data) {

            }
        });
    }
</script>
<script type="text/javascript">
    //post sửa folder
    $(function() {
        $('.js-EditCourse').click(function(e) {
            e.preventDefault();
            let a = CKEDITOR.instances.editor2.getData();
            $("#test1").attr('value', a);
            let $this = $(this);
            var r = confirm("Bạn có chắc chắn muốn sửa không?");
            if (r == true) {
                $.ajax({
                    method: "POST",
                    url: 'postEditcourse/' + $("#form-editCourse input[name=id]").val(),
                    data: new FormData($("#modal-editCourse form")[0]),
                    contentType: false,
                    processData: false,
                }).done(function(data) {
                    console.log(data);
                    $("#modal-editCourse").modal('hide');
                    $("#form-editCourse")[0].reset();
                    $('#course_table tbody').html(data);
                    toastr.success('', 'Sửa thành công');
                }).fail(function(data) {});
            }
        })
    })
</script>
<!-- Xóa Subject -->
<script>
    $(function() {
        $('body').on("click", '.js-deleteCourse', function(event) {
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
    function deleteCourse(id) {
        $.ajax({
            type: 'GET',
            url: 'deletecourses/' + id,
        }).done(function(results) {
            if (results.code == 200) {
                window.location.reload().delay(10000);
                toastr.success('', 'Xóa thành công');
            }
        }).fail(function(data) {});

    }
</script>
@endsection
