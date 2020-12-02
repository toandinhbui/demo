@extends('admin.layout.index')
@section('content')

<table class="table table-hover " id="news_table">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Danh mục</th>
            <th>Title</th>
            <th>Image</th>
            <th>Content</th>
            <th colspan="2">Chức năng</th>
            <th><a class="btn btn-success btn-lg addNews" href="">Add News</a></th>
        </tr>
    </thead>
    <tbody>
        @foreach($news as $value)
        <tr>
            <th>{{$value->id}}</th>
            <td>{{$value->categories_news_name}}</td>
            <td>{{$value->title}}</td>
            <td><img src="{{url('')}}/upload/img/{{$value->image}}" alt="" width="30px"></td>
            <td>{!!$value->content!!}</td>
            <td>
                <a onclick="event.preventDefault();editNews({{ $value->id }});" href="" class="btn btn-primary btn-lg">Sửa</a>
                <a href="{{ route('ajax_deleteNews',$value->id) }}" class=" btn btn-danger btn-lg js-deleteNews">Xóa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="modal fade" id="modal-addNews">
    <div class="modal-dialog modal-lg">
        <!-- Modal body -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add News</h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="POST" id="form-addNews" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div id="ctl10_formContain" class="col-md-12">
                        <div class="clear_both"></div>
                        <div class="prf-contacts sttng">
                            <h2>Bài viết</h2>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Danh mục</label>
                                <select name="categories_news_name" class="form-control">
                                    @foreach($categories_news_name as $value =>$vv)
                                    <option value="{{$vv->id}}">{{$vv->name}}</option>
                                    @endforeach
                                </select>
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Title">
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Image</label>
                                <input type="file" name="image" class="form-control" placeholder="image">
                                <input type="hidden" name="img_hi" id="img_hi" class="form-control">
                                <img src="" alt="" id="img_cu" name="im g_cu" width="50px">
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Content</label>
                                <textarea name="test" id="editor1"></textarea>
                                <span class="error-form"></span>
                                <input type="hidden" name="content" id="test">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg js-btn-addNews">Submit</button>

                </form>

            </div>
        </div>
    </div>

</div>
<div class="modal fade" id="modal-editNews">
    <div class="modal-dialog modal-lg">
        <!-- Modal body -->
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit News</h4>
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="POST" id="form-editNews" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div id="ctl10_formContain" class="col-md-12">
                        <div class="clear_both"></div>
                        <div class="prf-contacts sttng">
                            <h2>Bài viết</h2>
                        </div>
                        <input type="hidden" name="id" id="idNews" class="form-control">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Danh mục</label>
                                <select name="categories_news_name" class="form-control">
                                    @foreach($categories_news_name as $value =>$vv)
                                        <option value="{{$vv->id}}">{{$vv->name}}</option>
                                    @endforeach
                                </select>
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="title">
                                <span class="error-form"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Image</label>
                                <input type="file" name="image" class="form-control" placeholder="image">
                                <input type="hidden" name="img_hi" id="img_hi" class="form-control">
                                <img src="" alt="" id="img_cu" name="img_cu" width="50px">
                                <span class="error-form"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Content</label>
                            <textarea name="test" id="editor2"></textarea>
                            <span class="error-form"></span>
                            <input type="hidden" name="content" id="test2">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg js-editNews">Submit</button>

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
        $(".addNews").click(function(event) {
            event.preventDefault();
            $("#modal-addNews").modal('show');
        })
        let URL = "{{ route('ajax_post.addNews')}}"
        $('.js-btn-addNews').click(function(e) {
            e.preventDefault();
            let a = CKEDITOR.instances.editor1.getData();
            $("#test").attr('value', a);
            let $this = $(this);
            let $domForm = $this.closest('#form-addNews');
            $.ajax({
                url: URL,
                data: new FormData($("#modal-addNews form")[0]),
                contentType: false,
                processData: false,
                method: "POST",
            }).done(function(data) {
                console.log(data);
                $("#modal-addNews").modal('hide');
                $("#form-addNews")[0].reset();
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
    function editNews(id) {
        $.ajax({
            type: 'GET',
            url: 'editNews/' + id,
            success: function(data) {
                $("#form-editNews input[name=id]").val(data.editNews.id);
                // $("#form-editNews input[name=categories_news_name]").val(data.editNews.categories_news_name);
                $("#form-editNews input[name=title]").val(data.editNews.title);
                $("#form-editNews input[name=img_hi]").val(data.editNews.image);
                $("#form-editNews input[name=id]").val(data.editNews.id);
                $("#form-editNews #img_cu").attr('src', '{{url("")}}/upload/img/' + data.editNews.image);
                CKEDITOR.instances.editor2.setData(data.editNews.content);
                $('#modal-editNews').modal('show');
            },
            error: function(data) {

            }
        });
    }
</script>
<script type="text/javascript">
    //post sửa folder
    $(function() {
        $('.js-editNews').click(function(e) {
            e.preventDefault();
            let a = CKEDITOR.instances.editor2.getData();
            $("#test2").attr('value', a);
            let $this = $(this);
            var r = confirm("Bạn có chắc chắn muốn sửa không?");
            if (r == true) {
                $.ajax({
                    method: "POST",
                    url: 'postEditNews/' + $("#form-editNews input[name=id]").val(),
                    data: new FormData($("#modal-editNews form")[0]),
                    contentType: false,
                    processData: false,
                }).done(function(data) {
                    console.log(data);
                    $("#modal-editNews").modal('hide');
                    $("#form-editNews")[0].reset();
                    $('#news_table tbody').html(data);
                    toastr.success('', 'Sửa thành công');
                }).fail(function(data) {});
            }
        })
    })
</script>
<!-- Xóa News -->
<script>
    $(function() {
        $('body').on("click", '.js-deleteNews', function(event) {
            event.preventDefault();
            let URL = $(this).attr('href');
            let $this = $(this);
            if(confirm('Bạn có chắc muốn xóa không?')){
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
