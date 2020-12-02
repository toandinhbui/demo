@extends('admin.layout.index')
@section('content')

<table class="table" id="catenews_table">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Name Categories News</th>
            <th colspan="2">Chức năng</th>
            <th><a class="btn btn-success btn-lg addCatenews" href="">Add Categories News</a></th>
        </tr>
    </thead>
    <tbody>
        @foreach($catenews as $value)
        <tr>
            <th>{{$value->id}}</th>
            <td>{{$value->name}}</td>
            <td>
                <a onclick="event.preventDefault();editCatenews({{ $value->id }});" href="" class="btn btn-primary btn-lg">Sửa</a>
                <a href="{{ route('ajax_deleteCatenews',$value->id) }}" class=" btn btn-danger btn-lg js-deleteCatenews">Xóa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="modal fade" id="modal-addCatenews">
    <div class="modal-dialog modal-lg">
        <!-- Modal body -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Categories News</h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="POST" id="form-addCatenews" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div id="ctl10_formContain" class="col-md-12">
                        <div class="clear_both"></div>
                        <div class="prf-contacts sttng">
                            <h2>Danh mục bài viết</h2>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="name">
                                <span class="error-form"></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg js-btn-addCatenews">Submit</button>

                </form>

            </div>
        </div>
    </div>

</div>
<div class="modal fade" id="modal-editCatenews">
    <div class="modal-dialog modal-lg">
        <!-- Modal body -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Categories News</h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="POST" id="form-editCatenews" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div id="ctl10_formContain" class="col-md-12">
                        <div class="clear_both"></div>
                        <div class="prf-contacts sttng">
                            <h2> Danh mục bài viết</h2>
                        </div>
                        <input type="hidden" name="id" id="idCategories_news" class="form-control">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">name</label>
                                <input type="text" name="name" class="form-control" placeholder="name">

                                <span class="error-form"></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg js-editCatenews">Submit</button>

                </form>

            </div>
        </div>
    </div>

</div>

@endsection
@section('script')
<script>
    $(function() {
        $(".addCatenews").click(function(event) {
            event.preventDefault();
            $("#modal-addCatenews").modal('show');
            $('.error-form').hide();
        })

        let URL = "{{ route('ajax_post.addCatenews')}}"
        $('.js-btn-addCatenews').click(function(e) {
            e.preventDefault();
            let $this = $(this);
            let $domForm = $this.closest('#form-addCatenews');
            $.ajax({
                url: URL,
                data: new FormData($("#modal-addCatenews form")[0]),
                contentType: false,
                processData: false,
                method: "POST",
            }).done(function(data) {
                console.log(data);
                $("#modal-addCatenews").modal('hide');
                $("#form-addCatenews")[0].reset();
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
    function editCatenews(id) {
        console.log(id);
        $.ajax({
            type: 'GET',
            url: 'editCatenews/' + id,
            success: function(data) {
                $("#form-editCatenews input[name=id]").val(data.editCatenews.id);
                $("#form-editCatenews input[name=name]").val(data.editCatenews.name);
                $('#modal-editCatenews').modal('show');
            },
            error: function(data) {

            }
        });
    }
</script>
<script type="text/javascript">
    //post sửa folder
    $(function() {
        $('.js-editCatenews').click(function(e) {
            e.preventDefault();
            let $this = $(this);
            var r = confirm("Bạn có chắc chắn muốn sửa không?");
            if (r == true) {
                $.ajax({
                    method: "POST",
                    url: 'postEditCatenews/' + $("#form-editCatenews input[name=id]").val(),
                    data: new FormData($("#modal-editCatenews form")[0]),
                    contentType: false,
                    processData: false,
                }).done(function(data) {
                    console.log(data);
                    $("#modal-editCatenews").modal('hide');
                    $("#form-editCatenews")[0].reset();
                    $('#catenews_table tbody').html(data);
                    toastr.success('', 'Sửa thành công');
                }).fail(function(data) {});
            }
        })
    })
</script>
<!-- Xóa Catenews -->
<script>
    $(function() {
        $('body').on("click", '.js-deleteCatenews', function(event) {
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
