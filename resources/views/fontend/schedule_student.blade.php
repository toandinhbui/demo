@extends('client.profile_dashboard')
@section('fontend')

<div class="container">
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
                                    <input type="text" name="title" id="title" class="form-control" readonly>
                                    <span class="error-form"></span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Khóa học</label>
                                    @foreach($bill_student as $value)
                                    <input type="text" name="course" id="course" value="{{$value->title}}" class="form-control" readonly>
                                    @endforeach
                                    <span class="error-form"></span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Học sinh</label>
                                    @foreach($bill_student as $value)
                                    <input type="text" name="stundent" value="{{$value->name}}" id="stundent" class="form-control" readonly>
                                    @endforeach
                                    <span class="error-form"></span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group" readonly>
                                    <label class="control-label" readonly>Màu sắc</label>
                                    <select name="color" id="color" class="form-control" id="color" readonly>
                                        <option value="" readonly>Chọn</option>
                                        <option style="color:#0071c5;" value="#0071c5" readonly>&#9724; Dark blue</option>
                                        <option style="color:#40E0D0;" value="#40E0D0" readonly>&#9724; Turquoise</option>
                                        <option style="color:#008000;" value="#008000" readonly>&#9724; Green</option>
                                        <option style="color:#FFD700;" value="#FFD700" readonly>&#9724; Yellow</option>
                                        <option style="color:#FF8C00;" value="#FF8C00" readonly>&#9724; Orange</option>
                                        <option style="color:#FF0000;" value="#FF0000" readonly>&#9724; Red</option>
                                        <option style="color:#000;" value="#000" readonly>&#9724; Black</option>

                                    </select>
                                </div>

                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Nội dung</label>

                                    <textarea name="content" id="editor2" readonly></textarea>

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
                                    <input type="date" name="start" id="start" class="form-control" readonly>
                                    <label class="control-label" readonly>Giờ</label>

                                    <select name="time_start" id="time_start" readonly>
                                        <option value="09" readonly>9</option>
                                        <?php
                                        $i = 10;
                                        for ($i; $i <= 24; $i++) { ?>
                                            <option value="<?php echo $i ?>"><?php echo $i ?></option>

                                        <?php } ?>
                                    </select>
                                    <label for="">phút</label>
                                    <select name="startdate_minute" id="startdate_minute" readonly>
                                        <option value="00" readonly>00</option>
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
                                    <input type="date" name="end" id="end" class="form-control" readonly>
                                    <label class="control-label">Giờ</label>

                                    <select name="time_end" id="time_end" readonly>
                                        <option value="09">9</option>
                                        <?php
                                        $i = 10;
                                        for ($i; $i <= 24; $i++) { ?>
                                            <option value="<?php echo $i ?>"><?php echo $i ?></option>

                                        <?php } ?>
                                    </select>
                                    <label for="">phút</label>
                                    <select name="enddate_minute" id="enddate_minute" readonly>
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
                <?php foreach ($schedule_student as $event) :


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
</script>
</script>

@endsection
