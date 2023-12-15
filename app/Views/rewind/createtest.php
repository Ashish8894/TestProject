<?php echo $this->include('components/header.php'); ?>
<?php echo $this->include('components/header-end.php'); ?>
        <div class="container container-custom no-padding main-container">
            <div class="row">
                <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-4 col-12">
                    <?= $this->include('components/sidebar.php'); ?>
                </div>
                <div class="col-md-8 col-lg-9 col-xl-9 col-xxl-9 col-sm-8 col-12">
                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12 no-padding right-container">
                        <div class="panel panel-default rightpanel-box">
                            <div class="panel-body rightpanel-box1" >
                                <h4 class="coming-soon-back-text">
                                    <a href="<?= base_url(); ?>rewind" class="back-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> 
                                        Back</a>
                                </h4>
                                <div class="row no-padding">
                                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12">
                                        <div class=""><!--panel panel-info-->
                                            <div class="panel-body">
                                                <form class="rightsection-form" id="form-data" name="dynamic_test">
                                                    <input type="hidden" id="user_id" name="user_id" value="<?= $_SESSION['icaduserid']?>">
                                                    <div class="form-group">
                                                        <label class="anim-text-lbl" for="exam_title">Set Test Title</label>
                                                        <input type="text" class="form-control" id="exam_title" placeholder="Enter exam title" name="exam_title">
                                                        <input type="hidden" id="exam_exist_status" value="0">
                                                        <span id="err-exam_title" class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="anim-text-lbl" for="subject_id">Subject</label>
                                                        <select class="form-control" id="subject_id" name="subject_id">
                                                        </select>
                                                        <span id="err-subject" class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group" id="topic-sec" style="display:none;">
                                                        <label for="">Topic</label>
                                                        <div id="seltopic" style="max-height: 150px;height:auto;overflow-y: scroll;"></div>
                                                    </div>
                                                    <span id="err-topics" class="text-danger"></span>

                                                    <div class="form-group" id="step-sec" style="display:none;">
                                                        <label for="exampleInputPassword1">Steps</label>
                                                        <div id="selstp" style="max-height: 150px;height:auto;overflow-y: scroll;"></div>
                                                    </div>
                                                    <span id="err-step" class="text-danger"></span>

                                                    <input type="hidden" id="stepQuesCnt" value="0">
                                                    <div class="form-group">
                                                        <input type="hidden" name="level" value="1">
                                                        <label class="anim-text-lbl" for="exampleInputPassword1">Total Questions</label>
                                                        <input type="number" name="no_of_question" id="no_of_question" class="form-control" value="10" min="10" max="90">
                                                        <span id="err-noOfQuestion" class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group" id="not-enough-sec" style="background: red;padding: 10px 10px 2px 10px;color: #fff; display:none;">
                                                        <p id="not_enough_msg"></p>
                                                    </div>
                                                    <div class="form-group" id="enough-sec" style="background: green;padding: 10px 10px 2px 10px;color: #fff; display:none;">
                                                        <p>Now you can create an exam. </p>
                                                    </div>
                                                    <div class="form-group text-center">
                                                        <button type="submit" class="btn btn-warning btn-lg " id="sbt-btn" disabled="true">Done</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="modal fade" tabindex="-1" role="dialog" id="confirmbox" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="<?= base_url()?>images/blogging.svg"/>
                <h4 class="testhead"></h4>
                <p style="font-size: 1.2em;">Your Test is Ready!<br><small>Click Ok</small><!-- Do you really want to submit the Test? --> </p>
            </div>
            <div style="padding:30px;" class="text-center">
                <a href="" class="btn btn-warning finsbtn">Ok</a>
            </div>
        </div>
    </div>
</div>
<?php echo $this->include('components/footer.php'); ?>
<script src="<?= base_url()?>assets/js/jquery.serializeJSON.min.js"></script>
<script src="<?= base_url()?>assets/js/jquery.validate.min.js"></script>
<script src="<?= base_url()?>assets/js/additional-methods.js"></script>
<script type="text/javascript">

$("#pgtest").addClass('active');
$('#mobTest').addClass('active');

$(document).ready(function(){
    if(storage()){
        var retrievedObject = localStorage.getItem('subjectdata');
        var sObj = JSON.parse(retrievedObject);
        y=sObj.length;
        var testlist='<option value="">Select</option>';
        for (i = 0; i < y; i++) {
            testlist+='<option value="'+sObj[i].SUBJECT_ID+'">'+sObj[i].SUBJECT_NAME+'</option>';

        }
        $('#subject_id').html(testlist);
        
        $('#subject_id').change(function(){
            var subId = $(this).val();
            if(subId){
                $('#topic-sec').show();

                $.ajax({
                    type: "POST",
                    data: {subId,['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                    dataType: 'json', 
                    url: "<?= site_url(); ?>rewind/getTopicBySubject",
                    success: function(msg) {
                        let tplen = msg.length;
                        var html = '';
                        for(var i = 0; i < tplen; i++){
                            html += '<label style="font-weight:normal;"><input type="checkbox" name="topic[]" value="'+msg[i].TOPIC_ID+'" class="selTopic" /> '+msg[i].TOPIC_NAME+'</label><br/>';
                        }
                        $('#seltopic').empty().append(html);
                    }
                });
            }else{
                $('#topic-sec').hide();
                $('#seltopic').empty();
            }
            checkComplete();
        });

        $('body').on('click', '.selTopic', function() { 
                
            if($('.selTopic:checked').length > 0){
                $('.loading').show();
                var topic = [];
                $('.selTopic:checked').each(function() {
                   topic.push(this.value);
                });
                let topic_ids = topic.toString();
                let subject_id = $('#subject_id').val();
                $.ajax({
                    type: "POST",
                    data: {topic_ids, subject_id, ['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                    dataType: 'json', 
                    url: "<?= site_url(); ?>rewind/get_step_count_by_topics",
                    success: function(data) {
                        let pl = data.length;
                        var retrievedSteps = localStorage.getItem('stepsdata');
                        var steps = JSON.parse(retrievedSteps);
                        let sl = steps.length;
                        var testlist2="";
                        for (let k = 1; k < sl; k++) {
                            let stcount = '';
                            stcount += '(';
                            for(let j = 0; j < pl; j++){
                                if(steps[k].STEP_ID == data[j].STEP_ID){
                                    stcount += '<span id="stpCount-'+steps[k].STEP_ID+'">'+data[j].stepCount+'</span>';
                                }
                            }
                            stcount += ')';
                            testlist2+= '<label style="font-weight:normal;"><input type="checkbox" class="selStep" name="step[]" value="'+steps[k].STEP_ID+'"/> '+steps[k].STEP_NAME+' '+stcount+' </label><br/>';
                        }
                        $('.loading').hide();
                        $('#selstp').html(testlist2);
                        $('#step-sec').show();
                        
                    }
                });
            }else{
                $('#selstp').empty();
                $('#step-sec').hide();
            }
            checkComplete();
        }); 


        $('body').on('click', '.selStep', function() { 
            
            let selQue = 0;
            $('.selStep:checked').each(function() {
                var stpq = Number($('#stpCount-'+this.value).text());
                selQue = selQue + stpq;
            });
            $('#stepQuesCnt').val(selQue);
            checkComplete();
        });


        $('#exam_title').on('change', function(){
            var exam_title = this.value;
            $.ajax({
                type: "POST",
                data: {exam_title, ['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                dataType: 'json', 
                url: "<?= site_url(); ?>rewind/check_rewind_exist",
                success: function(data) {
                    if(data > 0){
                        $('#exam_exist_status').val(1);
                        $('#err-exam_title').text('This Test title already exist!');
                    }else{
                        $('#exam_exist_status').val(0);
                        $('#err-exam_title').text('');
                    }
                }
            });
            checkComplete();
            
        })     

    }  

    $(function(){
        //$("#form-data").validate();    
        $("#form-data").on('submit', function(e) {
            //var isvalid = $("#form-data").valid();

            let exam_title = $('#exam_title').val();
            let isExistTitle = $('#exam_exist_status').val();
            let subject_id = $('#subject_id').val();
            let steplen = $('input[name="step[]"]:checked').length;
            let topicLen = $('input[name="topic[]"]:checked').length;
            let no_of_question = $('#no_of_question').val();
            $('#err-step').text('');
            $('#err-subject').text('');
            $('#err-exam_title').text('');
            $('#err-topics').text('');
            $('#err-noOfQuestion').text('');
            let stpStatus = 0;
            let stat = 0;
            let notEnoughSubstr = '';

            
            if(exam_title == ''){
                stat = 1;
                $('#err-exam_title').text('Please enter test title!');
            }else{
                if(isExistTitle == 1){
                    stat = 1;
                    $('#err-exam_title').text('This Test title already exist!');
                }
            }
            if(no_of_question == ''){
                stat = 1;
                $('#err-noOfQuestion').text('Please enter no of questions!');
            }
            if(subject_id == ''){
                stat = 1;
                $('#err-subject').text('Please select subject!');
            }else{
                
                let tplen = $('.selTopic:checked').length;
                if(Number(tplen) > 0){
                    let steplen = $('input[name="step[]"]:checked').length;
                    $('#err-step').text('');
                    if(Number(steplen) > 0){
                        let selectedQueCnt = $('#stepQuesCnt').val();
                        if(Number(selectedQueCnt) < Number(no_of_question)){
                           stat = 1;
                        }
                    }else{
                        stat = 1;
                        $('#err-step').text('Please select at least 1 step!');
                    }
                }else{
                    stat = 1;
                    $('#err-topics').text('Please select at least 1 topic!');
                }
            }
            if (stat == 0) {
                $('.loading').show();
                e.preventDefault();
                var datatable = $("#form-data").serializeJSON();
                var datatablejson = JSON.stringify(datatable);
                $.ajax({ 
                    type: "POST",
                    data: {datatablejson,['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                    dataType: 'json', 
                    url: "<?= site_url(); ?>rewind/submit_bdtest",
                    success: function(data) {
                        if(data !='' && data > 0)
                        {
                            //$('.finsbtn').attr("href","<?= base_url()?>rewind/dtestins/"+data);
                            $('.finsbtn').attr("href","<?= base_url()?>rewind");
                            $('.loading').hide('slow',$('#confirmbox').modal('show'));
                        }else{
                            $('.loading').hide('slow',alert("Enough questions are not availalble!!"));
                        }
                    }
                });
                
            }else{
                alert('invalid data');
            }
        });
    });
});

function checkComplete(){
    let exam_title = $('#exam_title').val();
    let isExistTitle = $('#exam_exist_status').val();
    let subject_id = $('#subject_id').val();
    let steplen = $('input[name="step[]"]:checked').length;
    let topicLen = $('input[name="topic[]"]:checked').length;
    let no_of_question = $('#no_of_question').val();
    $('#err-step').text('');
    $('#err-subject').text('');
    $('#err-exam_title').text('');
    $('#err-topics').text('');
    $('#err-noOfQuestion').text('');
    let stpStatus = 0;
    let stat = 0;
    let notEnoughSubstr = '';

    
    if(exam_title == ''){
        stat = 1;
        $('#err-exam_title').text('Please enter test title!');
    }else{
        if(isExistTitle == 1){
            stat = 1;
            $('#err-exam_title').text('This Test title already exist!');
        }
    }
    if(no_of_question == ''){
        stat = 1;
        $('#err-noOfQuestion').text('Please enter no of questions!');
    }
    if(subject_id == ''){
        stat = 1;
        $('#err-subject').text('Please select subject!');
    }else{
        
        let tplen = $('.selTopic:checked').length;
        if(Number(tplen) > 0){
            let steplen = $('input[name="step[]"]:checked').length;
            $('#err-step').text('');
            if(Number(steplen) > 0){
                stpStatus = 1;

                let selectedQueCnt = $('#stepQuesCnt').val();
                if(Number(selectedQueCnt) < Number(no_of_question)){
                    stpStatus = 2;
                }
            }else{
                stat = 1;
                $('#err-step').text('Please select at least 1 step!');
            }
        }else{
            stat = 1;
            $('#err-topics').text('Please select at least 1 topic!');
        }
    }
    if(Number(stpStatus) > 0 && Number(stat) == 0){
        if(stpStatus == 2){
            let not_enough_msg = 'Selected questions are not enough to create this test.';
            stat = 1;
            $('#not_enough_msg').text(not_enough_msg);
            $('#not-enough-sec').show();
            $('#enough-sec').hide();
        }else{
            $('#not_enough_msg').text('');
            $('#not-enough-sec').hide();
            $('#enough-sec').show();
        }
    }else{
        stat = 1;
        $('#not-enough-sec').hide();
        $('#enough-sec').hide();
    }
    if(stat == 1){
        $('#sbt-btn').prop('disabled',true);
    }else{
        $('#sbt-btn').prop('disabled',false);
    }

}
</script>
<?php echo $this->include('components/footer-end.php'); ?>