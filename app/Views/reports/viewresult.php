<?= $this->include('components/header.php'); ?>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.min.css" rel="stylesheet">
        <style type="text/css">
           
            .socre-head{
                font-size: 26px;
            }
           
            @media only screen and (max-width: 600px) {
              .socre-head {
                    font-size: 16px;
                    font-weight: 600;
                }
            }
        </style>
        <?= $this->include('components/header-end.php'); ?>
        <div class="container container-custom no-padding main-container">
            <div class="row">
                <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-4 col-12">
                    <?= $this->include('components/sidebar.php'); ?>
                </div>
                <div class="col-md-8 col-lg-9 col-xl-9 col-xxl-9 col-sm-8 col-12">
                    <!--<h4><a href="<?= base_url(); ?>index.php?page=tests" class="back-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a></h4>-->
                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12 no-padding right-container">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding orange-bg  orange-bg-common-pd top-data-container" style="height:auto;">
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 col-sm-4 col-4">
                                    <h4 class="coming-soon-back-text">
                                        <a style="color:#ffffff;" href="<?= base_url(); ?>reports/analysis/<?=$resultId?>" class=" coming-soon-back-text back-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                                    </h4>
                                </div>
                                <?php if($count['count'] >0){?>
                                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 col-sm-8 col-8 text-right">
                                    <button onclick="window.location.href='<?= base_url();?>reports/test_analysis_report/<?= $examId?>'" class="btn btn-custom-submit btn-custom-white float-end">Test Analysis Report</button>
                                </div>
                                <?php }else{?>
                                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 col-sm-8 col-8 text-right">
                                    <button onclick="emptyAction('Please fill self analysis first to view Test Analysis Report!')" class="btn btn-custom-submit btn-custom-white float-end">Test Analysis Report</button>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12">
                                    <h4 class="heading-title-center"><?=$exam_name?>
                                </div>
                            </div>
                        </div>
                        <form action="<?= base_url()?>reports/save_selfdata" method="POST" name="selfTestAnalysis">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding orange-bg-common-pd middle-container-data" >
                                <div class="row">
                                    <input type="hidden" name="exam_id" id="exam_id" value="<?= $examId?>">
                                    <input type="hidden" name="result_id" id="result_id" value="<?= $resultId?>">
                                    <input type="hidden" id="box_count" value="5">
                                    <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12 col-xl-12 col-12"><!--style="padding: 5px;"-->
                                        <div class=""><!--panel panel-default-->
                                            <div class="panel-body col-md-12 col-lg-12 col-sm-12 col-xs-12 common-mb feeds2"><!--style="padding: 0px;"-->
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding text-center" >
                                                <button type="submit" class="btn btn-custom-submit btn-custom-submit-large">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div style="height: 100px;"></div>
        <div class="sideline"></div>
        <div class="hidbtn text-center" style="position: fixed;width: 95%;bottom: 0px;left:0px;height: 0px;opacity:0;overflow: hidden;z-index: 999;">
            <button class="btn btn-info btnupdate">Tap to Update</button>
        </div>

        <div class="modal fade practice-custom-modal" tabindex="-1" role="dialog" id="questionbox">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
                <div class="modal-content">
                    <button type="button" class="btn-close modal-button-close" data-bs-dismiss="modal"></button>
                    <div class="modal-header justify-content-center" style="padding-bottom:0;border-bottom:none;">
                        <h4 class="modal-title practice-custom-modal-title">Question No.</h4>
                    </div>
                    <div class="modal-body" style="padding-bottom: 0;">
                        <h4 class="modal-title practice-custom-modal-title">Question</h4>
                        (1/1000) in terms of exponents means
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 text-center">
                            <button type="button" class="btn btnmodal-custom-submit" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->include('components/footer.php'); ?>        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.all.min.js"></script>
        <script type="text/javascript">
            $('#pgreport').addClass('active');
            $('#mobreport').addClass('active');
            var alphaArr = {'1':'A', '2':'B', '3':'C', '4':'D', '5':'E', '6':'F', '7':'G', '8':'H'};
            var unattemptSectionCount = {};
            var unattemptSectionCountStatus = {};
            $(document).ready(function(){
                
                var url = window.location.pathname;
                var var1 = url.substring(url.lastIndexOf('/') + 1);
                var box_count = jQuery('#box_count').val();
                <?php
                    $sql3 = "SELECT sarm.id,sarm.reason_for,sarm.reason_dtl FROM self_analysis_reason_mst as sarm where sarm.is_deleted = 0 AND sarm.status = 'ENABLE' AND sarm.reason_for ='S'";
                    $newSql3 = $this->db->query($sql3);
                    $data3 = $newSql3->getResultArray();

                    $sql5 = "SELECT sarm.id,sarm.reason_for,sarm.reason_dtl FROM self_analysis_reason_mst as sarm where sarm.is_deleted = 0 AND sarm.status = 'ENABLE' AND sarm.reason_for ='W'";
                    $newSql5 = $this->db->query($sql5);
                    $data5 = $newSql5->getResultArray();

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
                            $unattempted = intval($totQuest) - intval($attempted);
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
                    // console.log('dev',subObj)
                    var slen = subObj.length;
                    var tdata='';                    
                    var srno = 1;
                    var sldata ='<?php echo json_encode($data3); ?>';
                    var slObj=JSON.parse(sldata);
                    var wldata ='<?php echo json_encode($data5); ?>';
                    var wlObj=JSON.parse(wldata);
                    
                    
                    var tddata='<div><h4 class="right-panel-list-title"><img valign="middle" src="<?= base_url(); ?>images/dscoresheet.svg"/> View / Submit Reason <img class="pull-right" src="<?= base_url(); ?>images/arrowdown.svg"/></h4></div><div style="padding: 0px;"><div class="table-responsive"><table class="table3">';
                    var no_of_quest = 0;
                    for(j=0;j<slen;j++){
                        tddata+='<thead><tr><th colspan="5" style="background:#f89a6c;color:#ffffff;">'+subObj[j].subject+'</th></tr><tr><th>Q. No.</th><th>Status</th><th>Reason</th></tr></thead><tbody>';
                        var status='';
                        var ansstatus='';
                        var reason="";
                        var givenans="";
                        var sectionName = (subObj[j].subject).replace(/[^A-Za-z]/g,"");
                        unattemptSectionCount[sectionName] = 0;
                        unattemptSectionCountStatus[sectionName] = false;
                        // console.log('sectionName',unattemptSectionCount)
                        
                        var txtclr='#D9534F';
                        var aObj = subObj[j].ques_detail;
                        var totalcount =subObj[j].total_quest;
                        var unsolvecount =subObj[j].unattempted;
                        var wrongcount =subObj[j].wrong_quest;
                        // console.log('totalcount',totalcount,'unsolvecount',unsolvecount,'wrongcount',wrongcount)
                        for(k=0;k<aObj.length;k++){
                            var cause="";
                            no_of_quest++;
                                if(aObj[k].question_type==3){
                                    a1= aObj[k].range1;
                                    a2= aObj[k].range2;
                                    cans= a1+"-"+ a2;
                                    var givenans = aObj[k].given_answer;
                                    
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
                                }else{
                                    cans = alphaArr[aObj[k].answer];
                                    if(aObj[k].given_answer){
                                        var givenans = alphaArr[aObj[k].given_answer];
                                    }else{
                                        var givenans = '';
                                    }
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
                            $sql4 = "SELECT orsr.reason_id,sarm.reason_for,sarm.reason_dtl,orsr.question_id FROM self_analysis_reason_mst as sarm JOIN os_result_self_response as orsr ON orsr.reason_id = sarm.id where sarm.is_deleted = 0 AND sarm.status = 'ENABLE' AND orsr.exam_id = :examId: AND orsr.student_id = :userid:";
                            $newSql4 = $this->db->query($sql4, [
                                'examId'     => $examId,
                                'userid'   => $_SESSION['icaduserid']
                            ]);
                            $data4 = $newSql4->getResultArray();
                            ?>

                            var tdata1= '';
                            if(aObj[k].status =='C'){
                                srno++;
                            }else if(aObj[k].status !='C'){
                                var qStatus = (aObj[k].status).trim();
                                // "'+(qStatus)+'",'+sectionName+',
                                tddata+= '<tr style="color: '+txtclr+';"><td><input type="hidden" name="questId[]" value="'+aObj[k].question_id+'"><button class=" qbtnx btn question-btn-circle btn-'+status+'" lid="'+aObj[k].question_id+'" amid="'+aObj[k].given_answer+'" id="'+(srno)+'">'+(srno)+'</td><td><input type="hidden" name="status[]" value="'+ansstatus+'">'+ansstatus+'</td><td><select class="form-select '+sectionName+'" data-id="'+qStatus+'" id="sel_'+sectionName+'_'+srno+'" onchange="unattemptedCount('+unsolvecount+',this)" name="sellist1[]"><option value="">Select</option>';
                                <?php if(!empty($data4)){
                                    foreach($data4 as $val4){
                                        ?>
                                        var qids = '<?php echo $val4['question_id']?>';
                                        var reasonid = '<?php echo $val4['reason_for']?>';
                                        var scount =subObj[j].total_quest;
                                        console.log('kk',scount)
                                        if(aObj[k].question_id == qids){
                                            if(aObj[k].status == 'U'){
                                                for(var key in slObj){
                                                    tddata +='<option value="'+slObj[key].id+'" selected>'+slObj[key].reason_dtl+'</option>';
                                                }
                                            }else if(aObj[k].status == 'W'){
                                                for(var key1 in wlObj){
                                                    tddata +='<option value="'+wlObj[key1].id+'" selected>'+wlObj[key1].reason_dtl+'</option>';
                                                }
                                            }
                                        }
                                    <?php }
                                }else{?>
                                    if(aObj[k].status == 'U'){
                                        var count = 0;
                                        for(var key in slObj){
                                            if(count <= unsolvecount){
                                                tddata +='<option value="'+slObj[key].id+'">'+slObj[key].reason_dtl+'</option>';
                                                count += 1;
                                            }else{
                                                tddata += '<option value=" " readonly>Not Required</option>';
                                            }
                                        }
                                    }else if(aObj[k].status == 'W'){
                                        for(var key1 in wlObj){
                                            tddata +='<option value="'+wlObj[key1].id+'">'+wlObj[key1].reason_dtl+'</option>';
                                        }
                                    }
                                <?php }?>
                                tdata += tdata1;
                                tddata+='</select></td></tr>';
                                srno++;
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

                    function emptyAction(message){
                        Swal.fire({
                            type: "error",
                            title: "",
                            text: message,
                            buttonsStyling: false,
                            customClass: {
                                confirmButton: "btn btn-sweet-alert"
                            }
                        });
                    }

                    console.log("Before unattemptSectionCount",unattemptSectionCount)
                    console.log("Before unattemptSectionCountStatus",unattemptSectionCountStatus)
                    function unattemptedCount(unsolvedCount, event){
                        // unattemptSectionCount
                        // console.log('totalcount',totalcount,'unsolvecount',unsolvecount,'wrongcount',wrongcount)
                        //     console.log('event',event)
                        //     console.log('name',$(event).data("id"))
                          let id_name = event.id;
                          var last = id_name.split("_");
                          console.log('last',last[1])
                          var data_value = document.getElementById(id_name)
                        //   console.log(dd.id)
                        var status = $(event).data("id");
                        if(status =='U')
                        {
                            console.log("kk",data_value.value)
                            if(data_value.value == ""){
                                console.log("k",unattemptSectionCount[last[1]])
                                if(unattemptSectionCount[last[1]] == 0){
                                    unattemptSectionCount[last[1]] = 0;
                                }else{
                                    unattemptSectionCount[last[1]] -= 1;
                                }
                                // unattemptSectionCount[last[1]] = (unattemptSectionCount[last[1]] == 0) ? 0 : unattemptSectionCount[last[1]] - 1; 
                                if(unattemptSectionCount[last[1]] <= unsolvedCount )
                                {
                                    unattemptSectionCountStatus[last[1]] = false
                                    $("."+last[1]).prop('disabled', false);
                                }
                            }else{
                                unattemptSectionCount[last[1]] += 1; 
                                if(unattemptSectionCount[last[1]] == unsolvedCount )
                                {
                                    unattemptSectionCountStatus[last[1]] = true;
                                    //$("."+last[1]).prop('disabled', true);
                                  
                                    // -----------------------------testing -------------------------------

                                    $('select.'+last[1]).each(function() {
                                        var currentSelect = $(this).value;
                                    // // ... do your thing ;-)
                                    console.log("hello", currentSelect)
                                    });




                                    // -----------------------------testing -------------------------------



                                    
                                }
                            }
                            
                            console.log("After select unattemptSectionCount",unattemptSectionCount[last[1]])
                            console.log("After select  unattemptSectionCountStatus",unattemptSectionCountStatus[last[1]])

                        }
                    
                    }
            
        </script>
<?= $this->include('components/footer-end.php'); ?>
