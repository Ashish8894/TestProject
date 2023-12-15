<?= $this->include('components/header.php'); ?>
        
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
                                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 col-sm-8 col-8 text-right">
                                    <button onclick="window.location.href='<?= base_url();?>reports/self_test_analysis/<?= $examId?>'" class="btn btn-custom-submit btn-custom-white float-end">Self Test Analysis</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12">
                                    <h4 class="heading-title-center"><?=$exam_name?>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding orange-bg-common-pd middle-container-data" >
                            <div class="row" >
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 ">
                                    <div class="">
                                        <!-- <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12  no-padding" >
                                            <h4 class="testhead">
                                                Date : <span id="examDate"> 14/10/2021</span>
                                            </h4>
                                        </div> -->
                                        <!-- <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12  no-padding"> -->
                                            <!-- <h4 class="analysis-heading mt-3 mb-3"> <strong>Analysis : </strong> -->
                                            <!-- <span class="testtitle"></span>
                                            </h4>
                                        </div> -->
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12  no-padding view-result-box">
                                            <div class="row row-eq-height">
                                                <!-- <div class="col-md-6 col-lg-4 col-xxl-4 col-sm-6 col-xl-4 col-6 common-mb common-mb-mobile box-outer view-result-box-outer">
                                                    <div class="pratice-box-result attendace-list-box info-box pratice-box-result-height">
                                                        <div class="row">
                                                            <div class="col-md-3 col-xxl-3 col-lg-3 col-sm-3 col-xl-3 col-3 view-result-box-pl-0 box-icon">
                                                                <img src="<?= base_url(); ?>images/ic_time_taken.png" class="result-box-img">
                                                            </div>
                                                            <div class="col-md-9 col-xxl-9 col-lg-9 col-sm-9 col-xl-9 col-9 view-result-box-pr-0 box-text">
                                                                <p class="view-result-box-p1" id="timeSpent">0 m 24 s</p> 
                                                                <p class="view-result-box-p2">Time Taken</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <div class="col-md-6 col-lg-3 col-xxl-3 col-sm-6 col-xl-3 col-6 common-mb common-mb-mobile box-outer view-result-box-outer">
                                                    <div class="pratice-box-result attendace-list-box info-box pratice-box-result-height">
                                                        <div class="row">
                                                            <div class="col-md-3 col-xxl-3 col-lg-3 col-sm-3 col-xl-3 col-3 view-result-box-pl-0 box-icon">
                                                                <img src="<?= base_url(); ?>images/ic_attempted.png" class="result-box-img">
                                                            </div>
                                                            <div class="col-md-9 col-xxl-9 col-lg-9 col-sm-9 col-xl-9 col-9 view-result-box-pr-0 box-text">
                                                                <p class="view-result-box-p1" id="queOutOf"> </p>
                                                                <p class="view-result-box-p2">Attempted</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-3 col-xxl-3 col-sm-6 col-xl-3 col-6 common-mb common-mb-mobile box-outer view-result-box-outer">
                                                    <div class="pratice-box-result attendace-list-box info-box pratice-box-result-height">
                                                        <div class="row">
                                                            <div class="col-md-3 col-xxl-3 col-lg-3 col-sm-3 col-xl-3 col-3 view-result-box-pl-0 box-icon">
                                                                <img src="<?= base_url(); ?>images/ic_correct_answer.png" class="result-box-img">
                                                            </div>
                                                            <div class="col-md-9 col-xxl-9 col-lg-9 col-sm-9 col-xl-9 col-9 view-result-box-pr-0 box-text">
                                                                <p class="view-result-box-p1" id="correctAns">0 </p>
                                                                <p class="view-result-box-p2">Correct</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-md-6 col-lg-4 col-xxl-4 col-sm-6 col-xl-4 col-6 common-mb common-mb-mobile box-outer view-result-box-outer">
                                                    <div class="pratice-box-result attendace-list-box info-box pratice-box-result-height">
                                                        <div class="row">
                                                            <div class="col-md-3 col-xxl-3 col-lg-3 col-sm-3 col-xl-3 col-3 view-result-box-pl-0 box-icon">
                                                                <img src="<?= base_url(); ?>images/ic_plus_marks.png" class="result-box-img">
                                                            </div>
                                                            <div class="col-md-9 col-xxl-9 col-lg-9 col-sm-9 col-xl-9 col-9 view-result-box-pr-0 box-text">
                                                                <p class="view-result-box-p1" id="totPlusMarks">0 </p>
                                                                <p class="view-result-box-p2">Plus Mark</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <div class="col-md-6 col-lg-3 col-xxl-3 col-sm-6 col-xl-3 col-6 common-mb common-mb-mobile box-outer view-result-box-outer">
                                                    <div class="pratice-box-result attendace-list-box info-box pratice-box-result-height">
                                                        <div class="row">
                                                            <div class="col-md-3 col-xxl-3 col-lg-3 col-sm-3 col-xl-3 col-3 view-result-box-pl-0 box-icon">
                                                                <img src="<?= base_url(); ?>images/ic_marks_obtained.png" class="result-box-img">
                                                            </div>
                                                            <div class="col-md-9 col-xxl-9 col-lg-9 col-sm-9 col-xl-9 col-9 view-result-box-pr-0 box-text">
                                                                <p class="view-result-box-p1" id="wrongAns">0 </p>
                                                                <p class="view-result-box-p2">Wrong</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-3 col-xxl-3 col-sm-6 col-xl-3 col-6 common-mb common-mb-mobile box-outer view-result-box-outer">
                                                    <div class="pratice-box-result attendace-list-box info-box pratice-box-result-height">
                                                        <div class="row">
                                                        <div class="col-md-3 col-xxl-3 col-lg-3 col-sm-3 col-xl-3 col-3 view-result-box-pl-0 box-icon">
                                                                <img src="<?= base_url(); ?>images/ic_negative_marks.png" class="result-box-img">
                                                            </div>
                                                            <div class="col-md-9 col-xxl-9 col-lg-9 col-sm-9 col-xl-9 col-9 view-result-box-pr-0 box-text">
                                                                <p class="view-result-box-p1" id="skippedMark">0 </p>
                                                                <p class="view-result-box-p2">Skipped</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12 col-xl-12 col-12"><!--style="padding: 5px;"-->
                                    <div class=""><!--panel panel-default-->
                                        <div class="panel-body col-md-12 col-lg-12 col-sm-12 col-xs-12 common-mb  feeds"><!--style="padding: 0px;"-->
                                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="height: 100px;"></div>
        <div class="sideline"></div>
        <div class="hidbtn text-center" style="position: fixed;width: 95%;bottom: 0px;left:0px;height: 0px;opacity:0;overflow: hidden;z-index: 999;">
            <button class="btn btn-info btnupdate">Tap to Update</button>
        </div>
        <?= $this->include('components/footer.php'); ?> 
        <script type="text/javascript">
            $('#pgreport').addClass('active');
            $('#mobreport').addClass('active');
            
            //var serverlink="../";
            // var serverlink="";
            // var jsonurl=serverlink+"json/";
            // var alphaArr = {'1':'A', '2':'B', '3':'C', '4':'D', '5':'E', '6':'F', '7':'G', '8':'H'};
            $(document).ready(function(){

                
                /*** following code is to check other device login ***/
                // $.post(jsonurl+"check_other_device.php",{      
                // },
                // function(data, status){
                //     var pdata = JSON.parse(data);
                //     if(pdata.msg != ''){
                //         window.location.href='index.php';
                //     }
                // });
                /*** End ***/
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
                                    //$data1['given_answer'] = $multiAnsArr[$key1] + 1;
                                    $data1['given_answer'] = implode(":",$mulValArr1);
                                }else{
                                    $rangeArr = explode("-",$correctAnsDtlArr[$key1]);
                                    $data1['range1'] = $rangeArr[0];
                                    $data1['range2'] = $rangeArr[1];
                                    $data1['given_answer'] = $textAnsArr[$key1];
                                }
                                $data1['question_type'] = $allQuestTypeIds[$key1];
                                $r2[] =  $data1;
                                //array('tqnosc' => $tqcntccarray[$row['TOPIC_ID']]) + $row;
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
                    // console.log('dev',subObj['unattempted'])
                    var slen = subObj.length;

                    var tdata='';
                    //<span class="od">Questions</span></th><th><span class="od">Unsolved</span></th><th><span class="od"><span class="fa fa-check text-success"></span></span></th><th><span class="od">Part <span class="fa fa-check text-success"></span></span></th><th><span class="od"><span class="fa fa-times text-danger"></span></span></th><th><span class="od">Part Marks</span></th>
                    tdata+='<div class="table-responsive"><table class="table2"><thead><tr><th><span class="od">Subject</span></th><th><span class="od">+ Marks</span></th><th><span class="od">- Marks</span></th><th><span class="od">Marks Obt.</span></th></tr></thead><tbody>';
                    var totQuest = 0;
                    var totUnattemptQue = 0;
                    var totcorrectQue = 0;
                    var totPartQue = 0;
                    var totWrongQue = 0;
                    var totPlusMark = 0;
                    var totPartialMark = 0;
                    var totMinusMark = 0;
                    var totEarnedMark = 0;
                    var totExamMark = 0;
                    var totAttempted = 0;
                    for(j = 0; j < slen; j++){
                        totExamMark = parseInt(totExamMark) + parseInt(subObj[j].sec_total_exam_mark);
                        totQuest = parseInt(totQuest) + parseInt(subObj[j].total_quest);
                        totUnattemptQue = parseInt(totUnattemptQue) + parseInt(subObj[j].unattempted);
                        totcorrectQue = parseInt(totcorrectQue) + parseInt(subObj[j].correct_quest);
                        totPartQue = parseInt(totPartQue) + parseInt(subObj[j].partial_correct_quest);
                        totWrongQue = parseInt(totWrongQue) + parseInt(subObj[j].wrong_quest);
                        totPlusMark = parseInt(totPlusMark) + parseInt(subObj[j].plus_mark);
                        totPartialMark = parseInt(totPartialMark) + parseInt(subObj[j].partial_mark);
                        totMinusMark = parseInt(totMinusMark) + parseInt(subObj[j].minus_mark);
                        totEarnedMark = parseInt(totEarnedMark) + parseInt(subObj[j].earned_mark);
                        totAttempted = totcorrectQue + totWrongQue;
                        tdata+='<tr><th>'+subObj[j].subject+'</th><td>'+subObj[j].plus_mark+'</td><td>'+subObj[j].minus_mark+'</td><td>'+subObj[j].earned_mark+'</td></tr>';
                        //<td>'+subObj[j].total_quest+'</td><td>'+subObj[j].unattempted+'</td><td>'+subObj[j].correct_quest+'</td><td>'+subObj[j].partial_correct_quest+'</td><td>'+subObj[j].wrong_quest+'</td><td>'+subObj[j].partial_mark+'</td>
                    }
                    //<td><b>'+totQuest+'</b></td><td><b>'+totUnattemptQue+'</b></td><td><b>'+totcorrectQue+'</b></td><td><b>'+totPartQue+'</b></td><td><b>'+totWrongQue+'</b></td><td>'+totPartialMark+'</td>
                    tdata+='<tr><td><b>Total</b></td><td>'+totPlusMark+'</td><td>'+totMinusMark+'</td><td>'+totEarnedMark+'</td></tr></tbody></table></div><p class="text-center d-md-none d-lg-none mt-3"><img src="<?=base_url()?>images/swipeleft.svg"/> Swipe Left Right <img src="<?=base_url()?>images/swiperight.svg"/></p><h4 class="card-score-box">Score <span class="float-right">'+totEarnedMark+'/'+totExamMark+'</span></h4>';
                    $('.feeds').html(tdata);
                    $('#queOutOf').html(totAttempted);
                    $('#correctAns').html(totcorrectQue);
                    $('#wrongAns').html(totWrongQue);
                    $('#skippedMark').html(totUnattemptQue);
                    
                    //console.log('unattemted',totUnattemptQue,'totWrongQue',totWrongQue,'totcorrectQue',totcorrectQue)
                });
            
        </script>
<?= $this->include('components/footer-end.php'); ?>
