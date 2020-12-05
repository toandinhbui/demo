@extends('admin.layout.index')
@section('content')

<table class="table" id="specialized_table">
    <thead class="thead-dark">
        <tr>
            <th>STT</th>
            <th>name</th>
            <th><a class="addSpecialized" href="">Add Specialized</a></th>
        </tr>
    </thead>
    <tbody>
        @foreach($specialized as $value =>$Objrow)
        <tr>
            <th>{{$Objrow->id}}</th>
            <td>{{$Objrow->name}}</td>
            <td> <a href="{{ route('ajax_deleteSpecialized',$Objrow->id) }}" class=" btn btn-danger btn-sm js-deleteSpecialized">Xóa</a>
                <a onclick="event.preventDefault();editSpecialized({{ $Objrow->id }});" href="" class="btn btn-danger btn-sm">Sửa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="modal fade" id="modal-addSpecialized">
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
                <form action="" method="POST" id="form-addSpecialized" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div id="ctl10_formContain" class="col-md-12">
                        <div class="clear_both"></div>
                        <div class="prf-contacts sttng">
                            <h2> Chuyên ngành</h2>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="name">
                                <span class="error-form"></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary js-btn-addSpecialized">Submit</button>

                </form>

            </div>
        </div>
    </div>

</div>
<div class="modal fade" id="modal-editSpecialized">
    <div class="modal-dialog modal-lg">
        <!-- Modal body -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Specialized</h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="POST" id="form-editSpecialized" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div id="ctl10_formContain" class="col-md-12">
                        <div class="clear_both"></div>
                        <div class="prf-contacts sttng">
                            <h2> Chuyên ngành</h2>
                        </div>
                        <input type="hidden" name="id" id="idManager" class="form-control">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">name</label>
                                <input type="text" name="name" class="form-control" placeholder="name">

                                <span class="error-form"></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary js-EditSpecialized">Submit</button>

                </form>

            </div>
        </div>
    </div>

</div>

@endsection
@section('script')
<script>
    $(function() {
        $(".addSpecialized").click(function(event) {
            event.preventDefault();
            $("#modal-addSpecialized").modal('show');
        })

        let URL = "{{ route('ajax_post.AddSpecialized')}}"
        $('.js-btn-addSpecialized').click(function(e) {
            e.preventDefault();
            let $this = $(this);
            let $domForm = $this.closest('#form-addSpecialized');
            $.ajax({
                url: URL,
                data: new FormData($("#modal-addSpecialized form")[0]),
                contentType: false,
                processData: false,
                method: "POST",
            }).done(function(data) {
                console.log(data);
                $("#modal-addSpecialized").modal('hide');
                $("#form-addSpecialized")[0].reset();
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
    function editSpecialized(id) {
        $.ajax({
            type: 'GET',
            url: 'EditSpecialized/' + id,
            success: function(data) {

                $("#form-editSpecialized input[name=id]").val(data.editSpecialized.id);
                $("#form-editSpecialized input[name=name]").val(data.editSpecialized.name);
                $('#modal-editSpecialized').modal('show');
            },
            error: function(data) {

            }
        });
    }
</script>
<script type="text/javascript">
    //post sửa folder
    $(function() {
        $('.js-EditSpecialized').click(function(e) {
            e.preventDefault();
            let $this = $(this);
            var r = confirm("Bạn có chắc chắn muốn sửa không?");
            if (r == true) {
                $.ajax({
                    method: "POST",
                    url: 'postEditSpecialized/' + $("#form-editSpecialized input[name=id]").val(),
                    data: new FormData($("#modal-editSpecialized form")[0]),
                    contentType: false,
                    processData: false,
                }).done(function(data) {
                    console.log(data);
                    $("#modal-editSpecialized").modal('hide');
                    $("#form-editSpecialized")[0].reset();
                    $('#specialized_table tbody').html(data);
                    toastr.success('', 'Sửa thành công');
                }).fail(function(data) {});
            }
        })
    })
</script>
<!-- Xóa Specialized -->
<script>
    $(function() {
        $('body').on("click", '.js-deleteSpecialized', function(event) {
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
    function deleteSpecialized(id) {
        $.ajax({
            type: 'GET',
            url: 'deleteSpecialized/' + id,
        }).done(function(results) {
            if (results.code == 200) {
                window.location.reload().delay(10000);
                toastr.success('', 'Xóa thành công');
            }
        }).fail(function(data) {});

    }
</script>
@endsection
