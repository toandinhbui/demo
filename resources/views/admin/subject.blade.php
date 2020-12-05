@extends('admin.layout.index')
@section('content')

<table class="table" id="subject_table">
    <thead class="thead-dark">
        <tr>
            <th>STT</th>
            <th>name</th>
            <th>chuyên ngành</th>
            <th colspan="2">Chức năng</th>
            <th><a class="addSubject" href="">Add Subject</a></th>
        </tr>
    </thead>
    <tbody>
        @foreach($subject as $value =>$Objrow)
        <tr>
            <th>{{$Objrow->id}}</th>
            <td>{{$Objrow->name}}</td>
            <td>{{$Objrow->specialized_name}}</td>
            <td> <a href="{{ route('ajax_deleteSubjects',$Objrow->id) }}" class=" btn btn-danger btn-sm js-deleteSubject">Xóa</a>
                <a onclick="event.preventDefault();editSubject({{ $Objrow->id }});" href="" class="btn btn-danger btn-sm">Sửa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="modal fade" id="modal-addSubject">
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
                <form action="" method="POST" id="form-addSubject" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div id="ctl10_formContain" class="col-md-12">
                        <div class="clear_both"></div>
                        <div class="prf-contacts sttng">
                            <h2> Khóa học</h2>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Chuyên ngành</label>
                                <select name="id_specialized" class="form-control">
                                    @foreach($Specialized_name as $value =>$vv)
                                    <option value="{{$vv->id}}">{{$vv->name}}</option>
                                    @endforeach
                                </select>

                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="name">
                                <span class="error-form"></span>
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary js-btn-addSubject">Submit</button>

                </form>

            </div>
        </div>
    </div>

</div>
<div class="modal fade" id="modal-editSubject">
    <div class="modal-dialog modal-lg">
        <!-- Modal body -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Subject</h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="POST" id="form-editSubject" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label">name</label>
                            <input type="text" name="name" class="form-control" placeholder="name">
                            <input type="hidden" name="id" id="idSubject" class="form-control">
                            <span class="error-form"></span>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Chuyên ngành</label>
                            <select name="id_specialized" class="form-control">
                                @foreach($Specialized_name as $value =>$vv)
                                <option value="{{$vv->id}}">{{$vv->name}}</option>
                                @endforeach
                            </select>

                            <span class="error-form"></span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary js-EditSubject">Submit</button>
            </div>


            </form>

        </div>
    </div>
</div>

</div>

@endsection
@section('script')
<script>
    $(function() {
        $(".addSubject").click(function(event) {
            event.preventDefault();
            $("#modal-addSubject").modal('show');
            $('.error-form').hide();
        })

        let URL = "{{ route('ajax_post.AddSubject')}}"
        $('.js-btn-addSubject').click(function(e) {
            e.preventDefault();
            let $this = $(this);
            let $domForm = $this.closest('#form-addSubject');
            $.ajax({
                url: URL,
                data: new FormData($("#modal-addSubject form")[0]),
                contentType: false,
                processData: false,
                method: "POST",
            }).done(function(data) {
                console.log(data);
                $("#modal-addSubject").modal('hide');
                $("#form-addSubject")[0].reset();
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
    function editSubject(id) {
        console.log(id);
        $.ajax({
            type: 'GET',
            url: 'EditSubjects/' + id,
            success: function(data) {
                $("#form-editSubject input[name=id]").val(data.editSubject.id);
                $("#form-editSubject input[name=name]").val(data.editSubject.name);
                $('#modal-editSubject').modal('show');
            },
            error: function(data) {

            }
        });
    }
</script>
<script type="text/javascript">
    //post sửa folder
    $(function() {
        $('.js-EditSubject').click(function(e) {
            e.preventDefault();
            let $this = $(this);
            var r = confirm("Bạn có chắc chắn muốn sửa không?");
            if (r == true) {
                $.ajax({
                    method: "POST",
                    url: 'postEditSubjects/' + $("#form-editSubject input[name=id]").val(),
                    data: new FormData($("#modal-editSubject form")[0]),
                    contentType: false,
                    processData: false,
                }).done(function(data) {
                    console.log(data);
                    $("#modal-editSubject").modal('hide');
                    $("#form-editSubject")[0].reset();
                    $('#subject_table tbody').html(data);
                    toastr.success('', 'Sửa thành công');
                }).fail(function(data) {});
            }
        })
    })
</script>
<!-- Xóa Subject -->
<script>
    $(function() {
        $('body').on("click", '.js-deleteSubject', function(event) {
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
    function deleteSubject(id) {
        $.ajax({
            type: 'GET',
            url: 'deleteSubjects/' + id,
        }).done(function(results) {
            if (results.code == 200) {
                window.location.reload().delay(10000);
                toastr.success('', 'Xóa thành công');
            }
        }).fail(function(data) {});

    }
</script>
@endsection
