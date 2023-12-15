<?php echo $this->include('components/header.php'); ?>		
<?php echo $this->include('components/header-end.php'); ?>
<div class="container container-custom no-padding main-container">
    <div class="row">
        <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-4 col-12">
            <?php echo $this->include('components/sidebar.php'); ?>
        </div>
        <div class="col-md-8 col-lg-9 col-xl-9 col-xxl-9 col-sm-8 col-12">
            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12 no-padding right-container">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding orange-bg  orange-bg-common-pd top-data-container" style="height:auto;">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12">
                            <h4 class="coming-soon-back-text">
                            <a style="color:#ffffff;" href="<?= base_url(); ?>reports/analysis/<?=$resultId?>" class=" coming-soon-back-text back-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12">
                            <h4 class="heading-title-center"><?=$exam_name?></h4>
                        </div>
                    </div>

                </div>
                <div class="panel panel-default rightpanel-box">
                    <div class="panel-body rightpanel-box1" >
                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 no-padding">
                            <div class="row">
                                <div class="panel-body col-md-12 col-lg-12 col-sm-12 col-xs-12 common-mb">
                                    <div class="row">
                                        <div class="col-xxl-8 col-8 col-xl-8 col-md-8 col-sm-8">
                                            <h4 class="right-panel-list-title">
                                                <img style="width:25px;" valign="middle" src="<?= base_url(); ?>images/dscoresheet.svg"> View Remedial Action
                                            </h4>
                                        </div>
                                    </div>                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding middle-container-data" >
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 no-padding"><!--style="padding: 5px;"-->
                                            <div class=""><!--panel panel-default -->
                                                <div class="panel-body col-md-12 col-lg-12 col-sm-12 col-xs-12 common-mb  feeds2" ><!--style="padding: 0px;"-->
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
    </div>
</div>

<div class="modal fade practice-custom-modal " tabindex="-1" role="dialog" id="modal-question"  data-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close modal-button-close" data-bs-dismiss="modal"></button>
            <div class="modal-header d-block" style="padding-bottom:0;border-bottom:none;">
                <h4 class="modal-title practice-custom-modal-title" ></h4>
            </div>
            <div class="modal-body" style="padding-bottom: 0;">
                <p>A graph is plotted below x and y and it follows equation . The value of y for  is</p>
            </div>
            <div class="modal-footer d-block" style="padding-top:0;">
                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 text-center mt-4">
                    <button type="button" class="btn btnmodal-custom-submit" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade practice-custom-modal " tabindex="-1" role="dialog" id="modal-hint"  data-keyboard="false">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close modal-button-close" data-bs-dismiss="modal"></button>
            <div class="modal-header d-block" style="padding-bottom:0;border-bottom:none;">
                <h4 class="modal-title practice-custom-modal-title hint-title" >Hint</h4>
            </div>
            <div class="modal-body text-center">
                <div class="question-answer-modal-box">
                    
                </div>
            </div>
            <div class="modal-footer d-block" style="padding-top:0;">
                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 text-center mt-4">
                    <button type="button" class="btn btnmodal-custom-submit" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade practice-custom-modal " tabindex="-1" role="dialog" id="modal-question-alert"  data-keyboard="false">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close modal-button-close" data-bs-dismiss="modal"></button>
            <div class="modal-header d-block" style="padding-bottom:0;border-bottom:none;">
                <h4 class="modal-title practice-custom-modal-title" >Alert !</h4>
            </div>
            <div class="modal-body text-center" style="padding-bottom: 0;">
                <img src="<?=base_url()?>/assets/images/test_schedule.svg" alt="" class=" modal-customimg">
                <p class="practice-text-heading">Do you like to retake this exam?</p>
            </div>
            <div class="modal-footer d-block" style="padding-top:0;">
                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 text-center mt-4">
                    <button type="button" class="btn btnmodal-custom-submit btnmodal-custom-cancle" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btnmodal-custom-submit" data-bs-toggle="modal" data-bs-target="#modal-question-retake">Retake</button>
                    <button  type="button" class="btn btnmodal-custom-submit btnmodal-custom-result">Result</button>
                </div>
            </div>
        </div>
    </div>
</div>




<!--similar question modal-->
<div class="modal fade practice-custom-modal " tabindex="-1" role="dialog" id="modal-question-retake"  data-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close modal-button-close" data-bs-dismiss="modal"></button>
            <div class="modal-header d-block" style="padding-bottom:0;border-bottom:none;">
                <h4 class="modal-title practice-custom-modal-title" >Similar Questions Test</h4>
            </div>
            <div class="modal-body" >
                        
            </div>
            <div class="modal-footer d-block" style="padding-top:0;">
                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 text-center mt-4">    
                    <!-- <a href="terminal.html" class="btn btn-block btn-warning startbtn">Start Now</a> -->
                </div>
            </div>
        </div>
    </div>
</div>




<!--similar question modal-->

<div class="modal fade practice-custom-modal " tabindex="-1" role="dialog" id="modal-report"  data-keyboard="false">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable" role="document">
        <form action="<?= site_url(); ?>reports/saveReport" method="post" id="form_img" enctype="multipart/form-data" accept-charset="utf-8" onsubmit="return validateForm();" style="width:100%;">
            <div class="modal-content">
                <button type="button" class="btn-close modal-button-close" data-bs-dismiss="modal"></button>
                <div class="modal-header d-block" style="padding-bottom:0;border-bottom:none;">
                    <h4 class="modal-title practice-custom-modal-title" >Report Reason</h4>
                </div>
                <div class="modal-body" >
                    <div class="mb-3 mt-3">
                        
                    </div>
                </div>
                <div class="modal-footer d-block" style="padding-top:0;">
                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 text-center mt-4">
                        <button type="submit" class="btn btnmodal-custom-submit" data-bs-dismiss="modal">submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php echo $this->include('components/footer.php'); ?>
<script type="text/javascript">
    $('#pgreport').addClass('active');
            $('#mobreport').addClass('active');
            var alphaArr = {'1':'A', '2':'B', '3':'C', '4':'D', '5':'E', '6':'F', '7':'G', '8':'H'};
            $(document).ready(function(){
                getsujects();
                var url = window.location.pathname;
                var var1 = url.substring(url.lastIndexOf('/') + 1);
                
                <?php
                    $sql2 = "SELECT * FROM `icad_student_result_os_dtl` WHERE `EXAM_ID` = :examId: AND  STUDENT_ID =:userid:";
                    $sqldata = $this->db->query($sql2, [
                        'examId'     => $examId,
                        'userid'   => $_SESSION['icaduserid']
                    ]);
                    $subres = $sqldata->getResultArray();

                    $sql3 = "SELECT iqm.QUESTION_ID,iqm.HINT FROM icad_question_mst as iqm WHERE iqm.IS_DELETED ='NO' ";
                    $sqldata2 = $this->db->query($sql3);
                    $subres2 = $sqldata2->getResultArray();
                    $questionDetails = array();
                    foreach($subres2 as $key => $value){
                        $questionDetails[$value['QUESTION_ID']] = array(
                            'hint' => ($value['HINT'] != '' || $value['HINT'] != NULL ) ? $value['HINT'] : 'Not Available',
                        ); 
                    }

                    $r1 = array();
                    foreach($subres as $subrow){
                        $subjectIdArr = explode(",",$subrow['EXAM_SUBJECT_ID']);
                        $subjectNameArr = explode(",",$subrow['EXAM_SUBJECT_NAME']);
                        $secWrongQuestArr = explode(",",$subrow['WRONG_QUESTION_SECTION']);
                        $secCorrectgQuestArr = explode(",",$subrow['CORRECT_QUESTION_SECTION']);
                        $secAttemptQuestArr = explode(",",$subrow['EXAM_SUBJECT_ATTEMPT_TOTAL']);
                        $sectotExamMarkArr = explode(",",$subrow['TOTAL_EXAM_MARKS_SECTION']);
                        $secTotPlusMarkArr = explode(",",$subrow['TOTAL_PLUS_MARKS_SECTION']);
                        $secTotMinusMarkArr = explode(",",$subrow['TOTAL_MINUSE_MARKS_SECTION']);
                        $secTotEarnedMarkArr = explode(",",$subrow['TOTAL_MARKS_SECTION']);
                        $secPartialCorrectArr = explode(",",$subrow['PARTIAL_CORRECT_QUESTION_SECTION']);
                        $secPartialCorrectMarkArr = explode(",",$subrow['CORRECT_PARTIAL_MARK_SECTION']);

                        $allQueIdArr = explode(";",$subrow['ALL_QUESTION_IDS']);
                        $allQueTypeIdArr = explode(";",$subrow['ALL_QUESTION_TYPE_IDS']);
                        $queStatusArr = explode(";",$subrow['QUESTION_STATUS_DTL']);
                        $queCorrectDetailArr = explode(";",$subrow['QUESTION_CORRECT_DTL']);
                        $queGivenDetailArr = explode(";",$subrow['QUESTION_GIVEN_DTL']);
                        $multiGivenAnsArr = explode(";",$subrow['GIVEN_ANSWER_MULTIPLE_OPTIONS']);
                        $textGivenAnsArr = explode(";",$subrow['GIVEN_ANSWER_TEXT_NUMBER']);
                        $timeSpent = $subrow['TIMESPENT'];
                        $submitedDate = $subrow['EXAM_SUBMITTED_DATE'];

                        $tminHrs = gmdate("H:i:s", $timeSpent);
                        $hrsArr = explode(":",$tminHrs);
                        $totmin = intval($hrsArr[0]) * 60 + intval($hrsArr[1]);
                        $totSec = $hrsArr[2];
                        $timespentStr = $totmin." m ".$totSec." s";
                        foreach($subjectIdArr as $key => $value){
                            $data = array();
                            $data['subject'] = $subjectNameArr[$key];
                            $attemptedArr = explode("/",$secAttemptQuestArr[$key]);
                            $attempted = $attemptedArr[0];
                            $totQuest = $attemptedArr[1];
                            $unattempted = $totQuest - $attempted;
                            $data['total_quest'] = $totQuest;
                            $data['unattempted'] = $unattempted;
                            $data['correct_quest'] = $secCorrectgQuestArr[$key];
                            $data['partial_correct_quest'] = $secPartialCorrectArr[$key];
                            $data['wrong_quest'] = $secWrongQuestArr[$key];
                            $data['plus_mark'] = $secTotPlusMarkArr[$key];
                            $data['partial_mark'] = $secPartialCorrectMarkArr[$key];
                            $data['minus_mark'] = $secTotMinusMarkArr[$key];
                            $data['earned_mark'] = $secTotEarnedMarkArr[$key];
                            $data['sec_total_exam_mark'] = $sectotExamMarkArr[$key];
                            
                            $data['timespentStr'] = $timespentStr;
                            $data['submitedDate'] = $submitedDate;
                           
                            $allQuestIdStr = str_replace(array('[', ']'), '', trim($allQueIdArr[$key]));
                            $allQuestIds = explode(", ",$allQuestIdStr);

                            $allQuestTypeIdStr = str_replace(array('[', ']'), '', trim($allQueTypeIdArr[$key]));
                            $allQuestTypeIds = explode(", ",$allQuestTypeIdStr);

                            $statusArr = explode(",",$queStatusArr[$key]);
                            $correctAnsDtlArr = explode(",",$queCorrectDetailArr[$key]);
                            $givenAnsDtlArr = explode(",",$queGivenDetailArr[$key]);
                            
                            $multiGivenAnsStr = str_replace(array('[', ']'), '', trim($multiGivenAnsArr[$key]));
                            $multiAnsArr = explode(", ",$multiGivenAnsStr);

                            $textGivenAnsStr = str_replace(array('[', ']'), '', trim($textGivenAnsArr[$key]));
                            $textAnsArr = explode(", ",$textGivenAnsStr);
                            $r2 = array();
                            foreach($allQuestIds as $key1 => $value1){
                                $data1 = array();
                                $data1['question_id'] = $value1;
                                $data1['question_type'] = $allQuestTypeIds[$key1];
                                $data1['answer'] = $correctAnsDtlArr[$key1];
                                $data1['range1'] = '';
                                $data1['range2'] = '';
                                $data1['hint'] = '';
                                $data1['status'] = $statusArr[$key1];

                                if($allQuestTypeIds[$key1] == 1){
                                    if($givenAnsDtlArr[$key1] != '-1'){
                                        $data1['given_answer'] = $givenAnsDtlArr[$key1] + 1;
                                    }else{
                                        $data1['given_answer'] = '';
                                    }
                                }else if($allQuestTypeIds[$key1] == 2){
                                    $mulValArr = explode(":",$multiAnsArr[$key1]);
                                    $mulValArr1 = array();
                                    foreach($mulValArr as $item){
                                        if($item != ''){
                                            $mulValArr1[] = intval($item) + 1;
                                        }else{
                                            $mulValArr1[] = '';
                                        }
                                    }
                                    $data1['given_answer'] = implode(":",$mulValArr1);
                                }else{
                                    $rangeArr = explode("-",$correctAnsDtlArr[$key1]);
                                    $data1['range1'] = $rangeArr[0];
                                    $data1['range2'] = $rangeArr[1];
                                    $data1['given_answer'] = $textAnsArr[$key1];
                                }
                                if(isset($questionDetails[$value1])){
                                    $data1['hint'] =  $questionDetails[$value1]['hint'];
                                }else{
                                    $data1['hint'] =  'Not Avialable';
                                }
                                $data1['question_type'] = $allQuestTypeIds[$key1];
                                $r2[] =  $data1;
                            }
                            $data['ques_detail'] = $r2;
                            $r1[] = $data;
                        }
                    }
                    ?>
                    var i= var1;
                    var retrievedObject = localStorage.getItem('fulltestdata');
                    var tObj = JSON.parse(retrievedObject);
                    var sdata ='<?php echo json_encode($r1); ?>';
                    var subObj=JSON.parse(sdata);
                    var slen = subObj.length;

                    var tdata='';                    
                    var srno =1;
                    var tddata='<div style="padding: 0px;"><div class="table-responsive"><table class="table3">';
                    var no_of_quest = 0;
                    
                    for(j=0;j<slen;j++){
                        tddata+='<thead><tr><th colspan="5" style="background:#f89a6c;color:#ffffff;">'+subObj[j].subject+'</th></tr><tr><th>Q. No.</th><th>Hint</th><th>Similar Question</th><th>Reported Issue</th></tr></thead><tbody>';
                        var status='';
                        var ansstatus='';
                        var reason="";
                        var givenans="";
                        var hint="";
                        
                        var txtclr='#D9534F';
                        var aObj = subObj[j].ques_detail;
                        for(k=0;k<aObj.length;k++){
                            var cause="";
                            no_of_quest++;
                            if(aObj[k].question_type==3){
                                a1= aObj[k].range1;
                                a2= aObj[k].range2;
                                cans= a1+"-"+ a2;
                                var givenans = aObj[k].given_answer;
                                var hint = aObj[k].hint;
                                
                            }else if(aObj[k].question_type==2){
                                var valArr = aObj[k].answer.split(":");
                                var strAns = '';
                                for(var m = 0; m<valArr.length; m++){
                                    if(strAns == ''){
                                        strAns += alphaArr[valArr[m]];
                                    }else{
                                        strAns += ':'+alphaArr[valArr[m]];
                                    }
                                } 
                                cans = strAns;
                              
                                var strgiven = '';
                                if(aObj[k].given_answer){
                                    var givenValArr = aObj[k].given_answer.split(":");
                                   
                                    if(givenValArr.length > 0){
                                        for(var l = 0; l<givenValArr.length; l++){
                                            if(strgiven == ''){
                                                strgiven += alphaArr[givenValArr[l]];
                                            }else{
                                                strgiven += ':'+alphaArr[givenValArr[l]];
                                            }
                                        } 
                                    }
                                }
                                var givenans = strgiven;
                                var hint = aObj[k].hint;
                            }else{
                                cans = alphaArr[aObj[k].answer];
                                if(aObj[k].given_answer){
                                    var givenans = alphaArr[aObj[k].given_answer];
                                }else{
                                    var givenans = '';
                                }
                                var hint = aObj[k].hint;
                            }
                            status=aObj[k].status;
                            if(aObj[k].status=="C" || aObj[k].status=="W"){                                          
                                 status="success";
                            }else{                                                  
                                 status="default";
                            }
                            if( givenans==""){
                                 ansstatus="Unsolved";
                                 txtclr='#0099cb';
                                 status="default";

                            }else{
                                if(aObj[k].status=='C'){
                                    ansstatus="Correct";
                                    txtclr='#00b085';
                                    status="success";
                                }else if(aObj[k].status=='P'){
                                    ansstatus="Partial";
                                    txtclr='#00b085';
                                    status="partial";
                                }else{
                                    ansstatus="Wrong";
                                    txtclr='#D9534F';

                                    status="danger";
                                }
                            }
                            <?php 
                           $sql3 = "SELECT QUESTION_REPORT_REASON_ID,QUESTION_REPORT_REASON_NAME FROM icad_question_report_reason where IS_DELETED = 'NO' AND STATUS = 'ENABLE'";
                            $newSql3 = $this->db->query($sql3);
                            $data3 = $newSql3->getResultArray();
                            ?>
                            var url = window.location.origin;
                            tddata+='<tr style="color: '+txtclr+';"><td><input type="hidden" name="questId[]" value="'+aObj[k].question_id+'"><button class=" qbtnx btn question-btn-circle btn-'+status+'" lid="'+aObj[k].question_id+'" amid="'+aObj[k].given_answer+'" id="'+(srno)+'">'+(srno++)+'</td><td><a href="javascript:void(0);" onclick="hints('+aObj[k].question_id+')">View</a></td><td><a href="javascript:void(0);" onclick="similar_question('+aObj[k].question_id+')" >Start</a></td><td><a href="javascript:void(0);" onclick="question_report('+aObj[k].question_id+')">Report</a></td>';
                            tddata+='</td></tr>';
                        }
                    }
                    
                    $('.feeds2').html(tddata);
                        $('.feeds2').on('click', 'button.qbtnx', function() {
                            var sequID = $(this).attr('id');
                            var question = 'Question no. -'+sequID;
                            var x=$(this).attr('lid');
                            var xx=$(this).attr('amid');
                            $('#modal-question').find('.modal-title').html(question);
                            $('#modal-question').find('.modal-body').html('');
                            $.ajax({ 
                                type: "POST",
                                data: {x,xx,['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                                dataType: 'json', 
                                url: "<?= site_url(); ?>reports/view_question",
                                success: function(data) {
                                    $('#modal-question').modal('show');
                                    $('#modal-question').find('.modal-body').html(data);
                                },
                            });
                            
                            
                        });

                    $('.feeds2').html(tddata);
                        $('.feeds2').on('click', 'button.hintnx', function() {
                            var sequID = $(this).attr('id');
                            var question = 'Question no. -'+sequID;
                            var x=$(this).attr('lid');
                            var xx=$(this).attr('amid');
                            $('#questionbox').find('.modal-title').html(question);
                            $('#questionbox').find('.modal-body').html('');
                            $.ajax({ 
                                type: "POST",
                                data: {x,xx,['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                                dataType: 'json', 
                                url: "<?= site_url(); ?>reports/view_hint",
                                success: function(data) {
                                    $('#questionbox').modal('show');
                                    $('#questionbox').find('.modal-body').html(data);
                                },
                            });
                            
                            
                        });
                            
                    });  

                    function hints(id){
                        var questionid = id;
                        let csrfName = $('.txt_csrfname').attr('name');
                        let csrfHash = $('.txt_csrfname').val();
                        $('.modal-body').html('');
                        $.ajax({
                            url:"<?= site_url(); ?>reports/hint_detail/",
                            method:"POST",
                            data:{questionid,['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'},
                            cache:false,
                            success:function(data)
                            {
                                var json = JSON.parse(data);
                                var title = json.pagetitle;
                                var desc = json.hint;
                                
                                $('#modal-hint').modal('show');
                                $('#modal-hint').find('.modal-title').html(title);
                                $('#modal-hint').find('.modal-body').html(desc);
                            }
                        });
                    }

                    function question_report(id){
                        var questionid = id;
                        let csrfName = $('.txt_csrfname').attr('name');
                        let csrfHash = $('.txt_csrfname').val();
                        $('.modal-body').html('');
                        $.ajax({
                            url:"<?= site_url(); ?>reports/report_detail/",
                            method:"POST",
                            data:{questionid,['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'},
                            cache:false,
                            success:function(data)
                            {
                                var json = JSON.parse(data);
                                console.log('kk',json)
                                var title = json.pagetitle;
                                var tdata = '';
                                var l = json.dropdown.length;
                                tdata +='<input type="hidden" name="question_id" id="question_id" value="'+json.questionid+'"><input type="hidden" name="exam_id" id="exam_id" value="'+json.examId+'"><select class="form-select" id="reported" name="reported">';
                                for (var i = 0 ; i < l; i++) {
                                    var obj = json.dropdown[i];
                                    tdata +='<option value='+obj.QUESTION_REPORT_REASON_ID+'>'+obj.QUESTION_REPORT_REASON_NAME+'</option>';
                                    
                                }
                                tdata +='</select>';
                                $('#modal-report').modal('show');
                                $('#modal-report').find('.modal-title').html(title);
                                $('#modal-report').find('.modal-body').html(tdata);
                            }
                        });
                    }

                    function similar_question(id){
                        var questionid = id;
                        let csrfName = $('.txt_csrfname').attr('name');
                        let csrfHash = $('.txt_csrfname').val();
                        $.ajax({
                            url:"<?= site_url(); ?>reports/similar_question_status/",
                            method:"POST",
                            data:{questionid,['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'},
                            cache:false,
                            success:function(data)
                            {
                                var questionData = JSON.parse(data);
                                var squestion = questionData.status;
                                var similarquestion = questionData.question;
                                var similarQuestion = JSON.stringify(similarquestion);
                                localStorage.setItem('similarQuestion', similarQuestion);
                                let questionstatus = squestion.quesstatus;
                                let resultstatus = squestion.resstatus;
                                let examId = parseInt(squestion.examId);
                                let questionid = parseInt(squestion.questionId);
                                var tdata = " ";
                                if(questionstatus === 'Yes' & similarquestion != ''){
                                    tdata +='<div class="panel-body"><h2 id="ttitle"></h2><h4 class="instructions-text mt-0">Exam specific Instructions</h4></div><div class="panel-body inswindow"><h4>IMPORTANT NOTE</h4><ul class="list-unstyled"><li><span class="fa fa-check"></span>The purpose of this MOCK TEST is to familiarize the candidates with the Computer Based Test (CBT) environment of the JEE (Advanced) - 2019.</li><li><span class="fa fa-check"></span>Candidates may use this MOCK TEST to get acclimatized with the functionalities of CBT.</li><li><span class="fa fa-check"></span>This MOCK TEST has used previous years questions of JEE (Advanced).</li><li><span class="fa fa-check"></span>The type of questions and illustrative marking scheme in this MOCK TEST is in NO WAY INDICATIVE of the type of questions and marking scheme of JEE (Advanced) - 2021 question paper.</li></ul><p class="inner-heading-inst">General Instructions:</p><ul class="list-unstyled"><li><span class="fa fa-check"></span> Total duration of examination is <span class="tdur">0</span> minutes.</li><li><span class="fa fa-check"></span> The clock will be set at the server. The countdown timer in the top right corner of screen will display the remaining time available for you to complete the examination. When the timer reaches zero, the examination will end by itself. You will not be required to end or submit your examination.</li><li><span class="fa fa-check"></span> The Question Palette displayed on the right side of screen will show the status of each question using one of the following symbols:</ul><div class="col-xl-12 col-lg-12 col-md-12 col-12 col-xs-12 no-padding mb-3"><div class="align-self-center palette-instmb"><span><button class="btn btn-default btn-sm palette palate-btn-width" type="button">0</button></span> "Not&nbsp;Visited" - You have not visited the question yet.</div><div class="align-self-center palette-instmb"><span><button class="btn btn-danger btn-sm palette palate-btn-width" type="button">0</button></span> "Not&nbsp;Answered" - You have not answered the question.</div><div class="align-self-center palette-instmb"><span><button class="btn btn-success btn-sm palette palate-btn-width" type="button">0</button></span> "Answered" - You have answered the question.</div></div><p class="inner-heading-inst">Navigating to a Question:</p><p>To answer a question, do the following:</p><ul class="list-unstyled"><li><span class="fa fa-check"></span> Click on the question number in the Question Palette at the right of your screen to go to that numbered question directly. Note that using this option does NOT save your answer to the current question.</li><li><span class="fa fa-check"></span> Click on <b>Save & Next</b> to save your answer for the current question and then go to the next question.</li><li><span class="fa fa-check"></span> Click on <b>Mark for Review & Next</b> to save your answer for the current question, mark it for review, and then go to the next question.<br /><span style="color:red;">Caution: Note that your answer for the current question will not be saved, if you navigate to another question directly by clicking on its question number.</span></li><li><span class="fa fa-check"></span> You can view all the questions by clicking on the Question Paper button. Note that the options for multiple choice type questions will not be shown.</li></ul><p class="inner-heading-inst">Answering a Question:</p><p>Procedure for answering a multiple choice type question:</p><ul class="list-unstyled"><li><span class="fa fa-check"></span> To select your answer, click on the button of one of the options</li><li><span class="fa fa-check"></span> To deselect your chosen answer, click on the button of the chosen option again or click on the <b>Clear Response</b> button</li><li><span class="fa fa-check"></span> To change your chosen answer, click on the button of another option</li><li><span class="fa fa-check"></span> To save your answer, you MUST click on the <b>Save & Next</b> button</li><li><span class="fa fa-check"></span> To mark the question for review, click on the <b>Mark for Review & Next</b> button.</li></ul><hr/></div><div class="panel-body"><div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 col-12  mx-auto text-center"></div></div>';
                                    if(resultstatus === 'Start'){
                                        tdata +='<a style="text-align:center" href="<?= base_url(); ?>reports/similar_question_test/'+examId+'/'+questionid+'" class="btn btn-block btn-warning startbtn">Start Now</a>';
                                    }else{
                                        tdata +='<a style="text-align:center" href="<?= base_url(); ?>reports/similar_question_test/'+examId+'/'+questionid+'" class="btn btn-block btn-warning startbtn">Retake</a>';
                                        tdata +='<a style="text-align:center" href="<?=base_url();?>reports/similar_result/'+questionid+'" class="btn btn-block btn-success startbtn">Result</a>';
                                    }                         
                                }else{
                                    txtanstext = '';
                                    $('#modal-question-retake').find('.modal-body').html('');
                                    txtanstext +='<p style="text-align:center">No similar question Test available.</p>';
                                    tdata +=txtanstext;
                                }
                                    $('#modal-question-retake').modal('show');
                                    $('#modal-question-retake').find('.modal-body').html(tdata);
                            }
                        });
                    }

                    if(storage()){
                        let examId = <?php echo $examId; ?>;
                        $('.startbtn').attr('href','<?= base_url(); ?>reports/similar_question_test/'+examId);
                    }   

                    function getsujects(){
                        $('#status').text('Fetching Contact...');
                        var userid = $('#user_id').val();
                        $.ajax({ 
                            type: "POST",
                            data: {userid,['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                            dataType: 'json', 
                            url: "<?= site_url(); ?>practice/list_subjects",
                            success: function(data) {
                                var lsdata = JSON.stringify(data);
                                getQuestionReportReasons();
                                localStorage.setItem('subjectdata', lsdata);
                            }
                        });
                    }

                    function getQuestionReportReasons(){
                        $('#status').text('Fetching Question Report Reasons...');
                        var userid = $('#user_id').val();
                        $.ajax({ 
                            type: "POST",
                            data: {['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                            dataType: 'json', 
                            url: "<?= site_url(); ?>practice/questionReport",
                            success: function(data) {
                                var qrdata = JSON.stringify(data);
                                localStorage.setItem('reportreasondata', qrdata);           
                            }
                        });
                    }
        </script>

</script>
<?php echo $this->include('components/footer-end.php'); ?>
