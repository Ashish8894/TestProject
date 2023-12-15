<?php echo $this->include('components/header.php'); ?>		
<?php echo $this->include('components/header-end.php'); ?>
		<div class="container container-custom no-padding main-container">
			<div class="row">
				<div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-4 col-12">
                    <?php echo $this->include('components/sidebar.php'); ?>
				</div>
				<div class="col-md-8 col-lg-9 col-xl-9 col-xxl-9 col-sm-8 col-12">
					<div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12 no-padding right-container">
                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12 no-padding orange-bg orange-bg-profile orange-bg-common-pd top-data-container" style="height:auto;">
                            <!-- <div class="coming-soon-back-text">
                                <h4><a style="color:#ffffff;" href="<?= base_url(); ?>reports/test_analysis_report/<?= $examId?>" class="coming-soon-back-text back-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a></h4>
                            </div> -->

                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 col-sm-4 col-4">
                                    <h4 class="coming-soon-back-text">
                                        <a style="color:#ffffff;" href="<?= base_url(); ?>reports/test_analysis_report/<?= $examId?>" class="coming-soon-back-text back-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                                    </h4>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 col-sm-8 col-8 text-right">
                                    <button onclick="window.location.href='<?= base_url();?>reports/weakness/<?= $examId?>'" class="btn btn-custom-submit btn-custom-white float-end">Weakness</button>
                                </div>
                            </div>


                            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12 no-padding orange-bg-common-pd middle-container-data" style="background:transparent;padding:0;">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12 no-padding avail-appeared-box">
                                    <div class="row">
                                        <div class="col-lg-3 col-xl-3 col-xxl-3 col-md-2"></div>
                                        <div class="col-lg-3 col-xl-3 col-xxl-3  col-md-4 col-sm-6  col-6">
                                            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12  stud-profile-box  mb-0" style="margin-top:0;">
                                                <div class="">
                                                    <div class="text-center">
                                                        <h1 class="" >0 Min</h1>
                                                        <h5>Time Lost<br/><small style="font-size: 11px;color: #f17336;">(Time given to conceptual mistakes) </small></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-xl-3 col-xxl-3  col-md-4 col-sm-6  col-6">
                                            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 stud-profile-box mb-0" style="margin-top:0;">
                                                <div class="">
                                                    <div class="text-center">
                                                        <h1 id="ctest"><?= $question;?></h1>
                                                        <h5>Que. count<br/><small style="font-size: 11px;color: #f17336;">(No. of que. you should have attempted) </small> </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-xl-3 col-xxl-3 col-md-2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 no-padding orange-bg-common-pd middle-container-data">
                            <div class="row">
                                <div class="panel-body col-md-12 col-lg-12 col-sm-12 col-xs-12 common-mb">
                                    <div class="row">
                                        <div class="col-xxl-8 col-8 col-xl-8 col-md-8 col-sm-8">
                                            <!-- <h4 class="right-panel-list-title">
                                                <img style="width:25px;" valign="middle" src="<?//= base_url(); ?>images/dscoresheet.svg"> View Time  Details
                                            </h4> -->
                                        </div>
                                        
                                    </div>
                                    <div class=""><!--col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding orange-bg-common-pd middle-container-data-->
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12 col-xl-12 col-12"><!--style="padding: 5px;"-->
                                                <div class=""><!--panel panel-default-->
                                                    <div class="panel-body col-md-12 col-lg-12 col-sm-12 col-xs-12 common-mb feeds2"><!--style="padding: 0px;"-->
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
        <div class="modal fade practice-custom-modal" tabindex="-1" role="dialog" id="questionbox">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <button type="button" class="btn-close modal-button-close" data-bs-dismiss="modal"></button>
                    <div class="modal-header d-block" style="padding-bottom:0;border-bottom:none;">
                        <h4 class="modal-title practice-custom-modal-title">Question no. - </h4>
                        <div id="ques_stat" style="text-align:center; color: red;"></div>
                    </div>
                    <div class="modal-body" style="padding-bottom: 0;" id="queText">
                                 (1/1000) in terms of exponents means
                    </div>
                    <div class="modal-footer d-block">
                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 text-center">
                            <button type="button" class="btn btnmodal-custom-submit" data-bs-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade practice-custom-modal " tabindex="-1" role="dialog" id="modal-report"  data-keyboard="false">
            <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable" role="document">
                <form action="<?= site_url(); ?>reports/saveReport" method="post" id="form_img" enctype="multipart/form-data" accept-charset="utf-8" onsubmit="return validateForm();" style="width:100%;">
                    <div class="modal-content">
                        <button type="button" class="btn-close modal-button-close" data-bs-dismiss="modal"></button>
                        <div class="modal-header d-block" style="padding-bottom:0;border-bottom:none;">
                            <h4 class="modal-title practice-custom-modal-title" >Report Reason</h4>
                        </div>
                        <div class="modal-body text-center" >
                            <div class="mb-3 mt-3">
                                
                            </div>
                        </div>
                        <div class="modal-footer d-block">
                            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 text-center">
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
                var url = window.location.pathname;
                var var1 = url.substring(url.lastIndexOf('/') + 1);
                
                <?php
                    $sql2 = "SELECT * FROM `icad_student_result_os_dtl` WHERE `EXAM_ID` = :examId: AND  STUDENT_ID =:userid:";
                    $sqldata = $this->db->query($sql2, [
                        'examId'     => $examId,
                        'userid'   => $_SESSION['icaduserid']
                    ]);
                    $subres = $sqldata->getResultArray();
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
                        $questionTimeArr = explode(";",$subrow['APPEAR_QUESTION_TIME']);
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
                            $questionTimeAnsStr = str_replace(array('[', ']'), '', trim($questionTimeArr[$key]));
                            $timeAnsArr = explode(", ",$questionTimeAnsStr);
                            $r2 = array();
                            
                            foreach($allQuestIds as $key1 => $value1){
                                $data1 = array();
                                $data1['question_id'] = $value1;
                                $data1['question_type'] = $allQuestTypeIds[$key1];
                                $data1['answer'] = $correctAnsDtlArr[$key1];
                                $data1['range1'] = '';
                                $data1['range2'] = '';
                                $data1['time_taken'] = '';
                                $data1['markobt'] = '';
                                $data1['diff'] = '';
                                $data1['reason'] = '';
                                $data1['status'] = $statusArr[$key1];
                                if($allQuestTypeIds[$key1] == 1){
                                    if($givenAnsDtlArr[$key1] != '-1'){
                                        $data1['given_answer'] = $givenAnsDtlArr[$key1] + 1;
                                    }else{
                                        $data1['given_answer'] = '';
                                    }
                                    if(empty($timeAnsArr[$key1])){
                                        $data1['time_taken'] = '0';
                                    }else{
                                        $data1['time_taken'] = $timeAnsArr[$key1];
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
                                    if(empty($timeAnsArr[$key1])){
                                        $data1['time_taken'] = '';
                                    }else{
                                        $data1['time_taken'] = $timeAnsArr[$key1];
                                    }
                                }else{
                                    $rangeArr = explode("-",$correctAnsDtlArr[$key1]);
                                    $data1['range1'] = $rangeArr[0];
                                    $data1['range2'] = $rangeArr[1];
                                    $data1['given_answer'] = $textAnsArr[$key1];
                                    if(empty($timeAnsArr[$key1])){
                                        $data1['time_taken'] = '0';
                                    }else{
                                        $data1['time_taken'] = $timeAnsArr[$key1];
                                    }
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
                    console.log('sdata',sdata)
                    
                    var subObj=JSON.parse(sdata);
                    var slen = subObj.length;
                    var tdata='';                    
                    var srno =1;
                    var tddata='<div><h4 class="right-panel-list-title"><img valign="middle" src="<?= base_url(); ?>images/dscoresheet.svg"/> View Time Detail <img class="pull-right" src="<?= base_url(); ?>images/arrowdown.svg"/></h4></div><div style="padding: 0px;"><div class="table-responsive"><table class="table3">';
                    var no_of_quest = 0;
                    
                    for(j=0;j<slen;j++){
                        tddata+='<thead><tr><th colspan="7" style="background:#f89a6c;color:#ffffff;">'+subObj[j].subject+'</th></tr><tr><th>Q.No.</th><th>Correct</th><th>Your</th><th>Time Taken</th><th>Mark Obt.</th><th>Diff Level.</th><th>Reported Issue</th></tr></thead><tbody>';
                        var status='';
                        var ansstatus='';
                        var cans="";
                        var givenans="";
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
                                // var topic = aObj[k].topic;
                                // var subtopic = aObj[k].subtopic;
                                // var concept = aObj[k].concept;
                                // var subconcept = aObj[k].subconcept;
                                
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
                                // var givenans = strgiven;
                                // var topic = aObj[k].topic;
                                // var subtopic = aObj[k].subtopic;
                                // var concept = aObj[k].concept;
                                // var subconcept = aObj[k].subconcept;
                            }else{
                                cans = alphaArr[aObj[k].answer];
                                if(aObj[k].given_answer){
                                    var givenans = alphaArr[aObj[k].given_answer];
                                }else{
                                    var givenans = '';
                                }
                                var markObt = '';
                                var diff = '';
                                var timetaken = '';
                                // var subtopic = aObj[k].subtopic;
                                // var concept = aObj[k].concept;
                                // var subconcept = aObj[k].subconcept;
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
                                }else
                                 if(aObj[k].status=='P'){
                                    ansstatus="Partial";
                                    txtclr='#00b085';
                                    status="partial";
                                }else{
                                    ansstatus="Wrong";
                                    txtclr='#D9534F';
                                    status="danger";
                                }
                            }
                            if(cans == givenans){
                                markObt = +4;
                                diff = 1;
                            }else if(cans != givenans && givenans !=''){
                                markObt = -1;
                                diff = 1;
                            }else{
                                markObt = 0; 
                                diff = 1;
                            }
                           if(aObj[k].time_taken != ''){
                                timetaken = aObj[k].time_taken;
                                var minutes = Math.floor(timetaken/60);
                                var secondsleft = Math.floor(timetaken%60);
                                var time_spent = minutes+':'+secondsleft;
                           }else{
                                timetaken = '00:00';
                           }
                           if(cans != givenans){
                            tddata+='<tr style="color: '+txtclr+';"><td><button class=" qbtnx btn question-btn-circle btn-'+status+'" lid="'+aObj[k].question_id+'" amid="'+aObj[k].given_answer+'" id="'+(srno)+'">'+(srno++)+'</td><td>'+cans+'</td><td>'+givenans+'</td><td>'+time_spent+'</td><td>'+markObt+'</td><td>'+diff+'</td><td><a href="javascript:void(0);" onclick="question_report('+aObj[k].question_id+')" data-bs-toggle="modal" data-bs-target="#modal-report">Report</a></td></tr>';
                           }else{
                            tddata+='<tr style="color: '+txtclr+';"><td><button class=" qbtnx btn question-btn-circle btn-'+status+'" lid="'+aObj[k].question_id+'" amid="'+aObj[k].given_answer+'" id="'+(srno)+'">'+(srno++)+'</td><td>'+cans+'</td><td>'+givenans+'</td><td>'+time_spent+'</td><td>'+markObt+'</td><td>'+diff+'</td><td><a href="javascript:void(0);">Report</a></td></tr>';
                           }
                            
                        }
                    }
                    
                    $('.feeds2').html(tddata);
                        $('.feeds2').on('click', 'button.qbtnx', function() {
                            var sequID = $(this).attr('id');
                            var question = 'Question no. -'+sequID;
                            var x=$(this).attr('lid');
                            var xx=$(this).attr('amid');
                            $('#questionbox').find('.modal-title').html(question);
                            $.ajax({ 
                                type: "POST",
                                data: {x,xx,['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                                dataType: 'json', 
                                url: "<?= site_url(); ?>reports/view_question",
                                success: function(data) {
                                    $('#questionbox').modal('show');
                                    $('#questionbox').find('.modal-body').html(data);
                                },
                            });
                            
                            
                        });
                            
                    });

                    function question_report(id){
                        var questionid = id;
                        let csrfName = $('.txt_csrfname').attr('name');
                        let csrfHash = $('.txt_csrfname').val();

                        $.ajax({
                            url:"<?= site_url(); ?>reports/report_list_detail/",
                            method:"POST",
                            data:{questionid,['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'},
                            cache:false,
                            success:function(data)
                            {
                                var json = JSON.parse(data);
                                console.log('dev',json)
                                var title = json.pagetitle;
                                var tdata = '';
                                var l = json.dropdown.length;
                                tdata +='<input type="hidden" name="question_id" id="question_id" value="'+json.questionid+'"><input type="hidden" name="exam_id" id="exam_id" value="'+json.examId+'"><select  class="form-select " id="reported" name="reported">';
                                for (var i = 0 ; i < l; i++) {
                                    var obj = json.dropdown[i];
                                    tdata +='<option value='+obj.QUESTION_REPORT_REASON_ID+'>'+obj.QUESTION_REPORT_REASON_NAME+'</option>';
                                    
                                }
                                tdata +='</select>';
                                $('#modal-report').modal('show');
                                $('.modal-title').html(title);
                                $('.modal-body').html(tdata);
                            }
                        });
                    }
            
</script>
<?php echo $this->include('components/footer-end.php'); ?>
