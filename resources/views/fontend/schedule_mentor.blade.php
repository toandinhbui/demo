@extends('client.profile_dashboard')
@section('fontend')
<div class="item-menu col-md-2 b-r m-t-xs m-b-xs">
    <a href="" data-toggle="modal" data-target="#modal-AddTask">
        <span class="i-s i-s-1-5x pull-left m-r-xs">
            <i class="i i-hexagon2 i-s-base text-success-lt hover-rotate"></i>
            <i class="fa fa-edit text-white i-sm"></i>
        </span>
        <span class="clear">
            <span class="h5 block m-t-xs text-danger">Thêm mới Công việc</span>

        </span>
    </a>
    <button onclick="event.preventDefault();time();">Điểm danh</button>
</div>

<div class="container">
    <div class="response">
        <div class="modal fade" id="modal-AddTask">
            <div class="modal-dialog modal-lg">
                <!-- Modal body -->
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm Mới Công Việc</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="" method="POST" id="form-AddTask" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Tiêu đề</label>
                                    <input type="text" name="title" id="title" class="form-control">
                                    <span class="error-form"></span>
                                </div>

                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Khóa học</label>
                                    @foreach($bill_student as $value)
                                    <input type="text" name="course" id="course" value="{{$value->title}}" class="form-control">
                                    @endforeach
                                    <span class="error-form"></span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Học sinh</label>
                                    @foreach($bill_student as $value)
                                    <input type="text" name="stundent" value="{{$value->name}}" id="stundent" class="form-control">
                                    @endforeach
                                    <span class="error-form"></span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Màu sắc</label>
                                    <select name="color" id="color" class="form-control" id="color">
                                        <option value="">Chọn</option>
                                        <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
                                        <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                                        <option style="color:#008000;" value="#008000">&#9724; Green</option>
                                        <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                                        <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                                        <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                                        <option style="color:#000;" value="#000">&#9724; Black</option>

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
                                    <label class="control-label">Ngày bắt đầu</label>
                                    <input type="date" name="start" id="start" class="form-control">
                                    <span class="error-form"></span>
                                    <label class="control-label">Giờ </label>
                                    <select name="time_start" id="time_start">
                                        <option value="09">9</option>
                                        <?php
                                        $i = 10;
                                        for ($i; $i <= 24; $i++) { ?>
                                            <option value="<?php echo $i ?>"><?php echo $i ?></option>

                                        <?php } ?>
                                    </select>
                                    <label for="">phút</label>
                                    <select name="startdate_minute" id="startdate_minute">
                                        <option value="00">00</option>
                                        <?php
                                        $j = 15;
                                        for ($j; $j <= 60;) { ?>
                                            <option value="<?php echo $j ?>"><?php echo $j ?></option>
                                            <?php $j = $j + 15; ?>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Ngày kết thúc</label>
                                    <input type="date" name="end" id="end" class="form-control">
                                    <span class="error-form"></span>
                                    <label class="control-label">Giờ</label>
                                    <select name="time_end" id="time_end">
                                        <option value="09">9</option>
                                        <?php
                                        $i = 10;
                                        for ($i; $i <= 24; $i++) { ?>
                                            <option value="<?php echo $i ?>"><?php echo $i ?></option>

                                        <?php } ?>
                                    </select>
                                    <label for="">phút</label>
                                    <select name="enddate_minute" id="enddate_minute">
                                        <option value="00">00</option>
                                        <?php
                                        $j = 0;
                                        for ($j; $j <= 45;) { ?>
                                            <option value="<?php echo $j ?>"> <?php echo $j ?> </option>
                                            <?php $j = $j + 15; ?>

                                        <?php } ?>
                                    </select>
                                </div>
                                <span id="error_form"></span>
                            </div>
                            <button type="submit" class="btn btn-primary js-btn-AddTask">Thêm mới</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="response">
        <div class="modal fade" id="modal-EditTask">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Sửa Công Việc</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="" method="GET" id="form-EditTask" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Tiêu đề</label>
                                    <input type="text" name="title" id="title" class="form-control">
                                    <span class="error-form"></span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Khóa học</label>
                                    @foreach($bill_student as $value)
                                    <input type="text" name="course" id="course" value="{{$value->title}}" class="form-control">
                                    @endforeach
                                    <span class="error-form"></span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Học sinh</label>
                                    @foreach($bill_student as $value)
                                    <input type="text" name="stundent" value="{{$value->name}}" id="stundent" class="form-control">
                                    @endforeach
                                    <span class="error-form"></span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Màu sắc</label>
                                    <select name="color" id="color" class="form-control" id="color">
                                        <option value="">Chọn</option>
                                        <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
                                        <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                                        <option style="color:#008000;" value="#008000">&#9724; Green</option>
                                        <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                                        <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                                        <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                                        <option style="color:#000;" value="#000">&#9724; Black</option>

                                    </select>
                                </div>

                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Nội dung</label>

                                    <textarea name="content" id="editor2"></textarea>

                                    <span class="error-form"></span>
                                    <input type="hidden" name="test1" id="test1">
                                    <input type="hidden" name="id" id="id">
                                </div>



                            </div>

                            <div class="clearfix" style="clear:both;height:30px;text-align:center">
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Ngày bắt đầu</label>
                                    <input type="date" name="start" id="start" class="form-control">
                                    <label class="control-label">Giờ</label>

                                    <select name="time_start" id="time_start">
                                        <option value="09">9</option>
                                        <?php
                                        $i = 10;
                                        for ($i; $i <= 24; $i++) { ?>
                                            <option value="<?php echo $i ?>"><?php echo $i ?></option>

                                        <?php } ?>
                                    </select>
                                    <label for="">phút</label>
                                    <select name="startdate_minute" id="startdate_minute">
                                        <option value="00">00</option>
                                        <?php
                                        $j = 0;
                                        for ($j; $j <= 45;) { ?>
                                            <option value="<?php echo $j ?>"> <?php echo $j ?> </option>
                                            <?php $j = $j + 15; ?>

                                        <?php } ?>
                                    </select>
                                    <span class="error-form"></span>
                                </div>

                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Ngày kết thúc</label>
                                    <input type="date" name="end" id="end" class="form-control">
                                    <label class="control-label">Giờ</label>

                                    <select name="time_end" id="time_end">
                                        <option value="09">9</option>
                                        <?php
                                        $i = 10;
                                        for ($i; $i <= 24; $i++) { ?>
                                            <option value="<?php echo $i ?>"><?php echo $i ?></option>

                                        <?php } ?>
                                    </select>
                                    <label for="">phút</label>
                                    <select name="enddate_minute" id="enddate_minute">
                                        <option value="00">00</option>
                                        <?php
                                        $j = 0;
                                        for ($j; $j <= 45;) { ?>
                                            <option value="<?php echo $j ?>"> <?php echo $j ?> </option>
                                            <?php $j = $j + 15; ?>

                                        <?php } ?>
                                    </select>
                                    <span class="error-form"></span>
                                </div>
                            </div>

                            <input type="hidden" name="id" class="form-control" id="id">

                            <button type="submit" class="btn btn-primary js-btn-EditTask">Sửa</button>
                            <button type="submit" class="btn btn-primary js-btn-deleteTask">Xóa</button>


                        </form>

                    </div>

                    <!-- Modal body -->

                </div>
            </div>
        </div>
    </div>
    <div id="calendar">
    </div>
</div>
@endsection
@section('script_font')
<script>
    CKEDITOR.replace('editor1');
</script>
<script>
    CKEDITOR.replace('editor2');
</script>
<script>
    $(document).ready(function() {
        var date = new Date();

        var day = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();

        var SITEURL = "{{url('/')}}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var calendar = $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            events: [
                <?php foreach ($task as $event) :


                    $time_start = explode(" ", $event['start']);
                    $time_end = explode(" ", $event['end']);

                    $startdate = explode(":", $time_start[1]);

                    $enddate = explode(":", $time_end[1]);


                ?> {
                        id: '<?php echo $event['id']; ?>',
                        title: '<?php echo $event['title']; ?>',
                        content: '<?php echo $event['content']; ?>',
                        start: '<?php echo $event['start']; ?>',
                        end: '<?php echo $event['end']; ?>',
                        color: '<?php echo $event['color']; ?>',
                    },
                <?php endforeach; ?>

            ],


            defaultDate: day,
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            selectHelper: true,
            // editable: true,
            // weekends: true,
            timeFormat: 'H:mm',


            eventRender: function(event, element) {
                element.bind('dblclick', function() {
                    $('#modal-EditTask #id').val(event.id);
                    $('#modal-EditTask #title').val(event.title);
                    $('#modal-EditTask #start').val(event.start._i.split(" ")[0]);
                    $('#modal-EditTask #time_start').val(event.start._i.split(" ")[1].split(":")[0]);
                    $('#modal-EditTask #startdate_minute').val(event.start._i.split(" ")[1].split(":")[1]);
                    $('#modal-EditTask #end').val(event.end._i.split(" ")[0]);
                    $('#modal-EditTask #time_end').val(event.end._i.split(" ")[1].split(":")[0]);
                    $('#modal-EditTask #enddate_minute').val(event.end._i.split(" ")[1].split(":")[1]);
                    $('#modal-EditTask #editor2').val(event.content);
                    $('#modal-EditTask #color').val(event.color);
                    CKEDITOR.instances.editor2.setData(event.content);
                    editTask(event.id);
                    $('#modal-EditTask').modal('show');
                    console.log(event.start._i.split(" ")[1].split(":")[1]);
                });
            },
        });
    });
</script>
<script>
    $(function() {
        $('.js-btn-AddTask').click(function(e) {
            e.preventDefault();
            let a = CKEDITOR.instances.editor1.getData();
            $("#test").attr('value', a);
            let $this = $(this);
            let $domForm = $this.closest('#form-AddTask');
            $.ajax({
                url: 'addTask',
                data: new FormData($("#modal-AddTask form")[0]),
                contentType: false,
                processData: false,
                method: "POST",
            }).done(function(data) {
                if (data.code == 406) {
                    $('#error_form').text("Bạn cần nhập thời gian bắt đầu trước thời gian kết thúc");
                } else {
                    $("#modal-AddTask").modal('hide');
                    toastr.success('', 'thêm mới thành công');
                    window.location.reload().delay(1000);
                }
            }).fail(function(data) {
                var errors = data.responseJSON;
                $.each(errors.errors, function(i, val) {
                    $domForm.find('input[name=' + i + ']').siblings('.error-form').text(val[0]);
                });
            });
        });
    })

    function editTask(id) {
        $.ajax({
            type: 'GET',
            url: 'editTask' + id,
            success: function(data) {},
            error: function(data) {

                console.log(data);
            }
        });
    }

    $(function() {
        $('.js-btn-EditTask').click(function(e) {
            e.preventDefault();
            let a = CKEDITOR.instances.editor2.getData();
            $("#test1").attr('value', a);
            let $this = $(this);
            let $domForm = $this.closest('#form-EditTask');
            $.ajax({
                url: 'updateTask/' + $("#form-EditTask input[name=id]").val(),
                data: new FormData($("#modal-EditTask form")[0]),
                contentType: false,
                processData: false,
                method: "POST",
            }).done(function(data) {
                $("#modal-EditTask").modal('hide');
                $("#form-EditTask")[0].reset();
                // $("#calendar").load("/task");
                toastr.success('', 'Tên vẫn thế');
                window.location.reload().delay(10000);
            }).fail(function(data) {
                var errors = data.responseJSON;
                $.each(errors.errors, function(i, val) {
                    $domForm.find('input[name=' + i + ']').siblings('.error-form').text(val[0]);
                });
            });

        });
    })

    $(function() {
        $('body').on("click", '.js-btn-deleteTask', function(e) {

            //$id = $('#id').val();

            var r = confirm("Bạn có muốn xóa Task này không?");
            let $this = $(this);
            let $domForm = $this.closest('#form-EditTask');
            if (r == true) {
                $('#modal-EditTask').modal('hide');
                $.ajax({

                    url: 'deleteTask/' + $("#form-EditTask input[name=id]").val(),
                    data: new FormData($("#modal-EditTask form")[0]),
                    contentType: false,
                    processData: false,
                    method: "GET",
                }).done(function(results) {
                    if (results.code == 200) {
                        $('#modal-EditTask').modal('hide');
                        window.location.reload().delay(10000);
                        toastr.success('', 'Xóa thành công');
                    }
                }).fail(function(data) {

                    toastr.success('', 'Xóa thất bại');
                });
            }
        })
    })
</script>
<script>
    function time() {
        $.ajax({
                url: 'check_attendance',
                contentType: false,
                processData: false,
                method: 'post',
            })
            .done(function(data) {}).fail(function(data) {})
    }
</script>


@endsection
