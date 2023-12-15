<?= $this->include('components/header.php'); ?>
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

            /*mjx-container.MathJax.CtxtMenu_Attached_0 {
                display: initial !important;
                text-align: left!important;
                margin:0px;
                font-size:  12px !important;
            }
           
            .MathJax .CtxtMenu_Attached_0{
                font-size:  12px !important;
            }
            .optext{
                margin-top:20px;
            }*/
            .mspace{margin-right: 0.1em !important;}
        </style>
       <!--  <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
        <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
        <script>
            MathJax = {
                tex: {
                    inlineMath: [['$', '$'], ['\\(', '\\)']]
                },
                svg: {
                    fontCache: 'global'
                }
            }; 
        </script> -->

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css" integrity="sha384-n8MVd4RsNIU0tAv4ct0nTaAbDJwPJzDEaqSD1odI+WdtXRGWt2kTvGFasHpSy3SV" crossorigin="anonymous">

        <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js" integrity="sha384-XjKyOOlGwcjNTAIQHIpgOno0Hl1YQqzUOEleOLALmuqehneUG+vnGctmUb0ZY0l8" crossorigin="anonymous"></script>

        <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/contrib/mhchem.min.js" integrity="sha384-ifpG+NlgMq0kvOSGqGQxW1mJKpjjMDmZdpKGq3tbvD3WPhyshCEEYClriK/wRVU0"  crossorigin="anonymous"></script>

        <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/contrib/mathtex-script-type.min.js" integrity="sha384-jiBVvJ8NGGj5n7kJaiWwWp9AjC+Yh8rhZY3GtAX8yU28azcLgoRo4oukO87g7zDT" crossorigin="anonymous"></script>

        <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/contrib/auto-render.min.js" integrity="sha384-+VBxd3r6XgURycqtZ117nYw44OOcIax56Z4dCRWbxyPt0Koah1uHoK0o4+/RRE05" crossorigin="anonymous"></script>
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
                            <div class="coming-soon-back-text">
                                <h4><a style="color:#ffffff;" href="<?= base_url(); ?>tests" class=" coming-soon-back-text back-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a></h4>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding orange-bg-common-pd middle-container-data" style="background:transparent;padding:0;"><!--row  style="margin-left: -5px;margin-right: -5px;"-->
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 col-xl-12 no-padding avail-appeared-box"><!--tests-box-->
                                    <div class="row row-eq-height">
                                        <div class="col-lg-3 col-xl-3 col-xxl-3 col-md-2"></div>
                                        <div class="col-lg-3 col-xl-3 col-xxl-3  col-md-4 col-sm-6  col-6">
                                            <div class="col-lg-12 col-xs-12 stud-profile-box mb-0 pratice-box-result-height" style="margin-top:0;"><!--profile-box-mb-->
                                                <div class=""><!--panel panel-default-->
                                                    <div class="text-center"><!--panel-body -->
                                                        <h1 class="socre-head"><span id="markObt">0</span> / <span id="markTotal">300</span></h1>
                                                        <h5>Score<br/><small> </small></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-xl-3 col-xxl-3  col-md-4 col-sm-6  col-6">
                                            <div class="col-lg-12 col-xs-12 stud-profile-box mb-0 pratice-box-result-height" style="margin-top:0;"><!--profile-box-mb-->
                                                <div class=""><!--panel panel-default-->
                                                    <div class="text-center"><!--panel-body -->
                                                        <h1 class="socre-head"><span id="percentObt">0.00 </span>%</h1>
                                                        <h5>Percentage<br/><small> </small> </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-xl-3 col-xxl-3 col-md-2"></div>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding orange-bg-common-pd middle-container-data" >
                            <div class="row" >
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 ">
                                    <div class="">
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12  no-padding" >
                                            <h4 class="testhead">
                                                Date : <span id="examDate"> 14/10/2021</span>
                                            </h4>
                                        </div>
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12  no-padding">
                                            <!-- <h4 class="analysis-heading mt-3 mb-3"> <strong>Analysis : </strong>
                                            <span class="testtitle"></span>
                                            </h4> -->
                                            <h4 class="analysis-heading mt-3 mb-3">
                                                <span>Analysis - <span style="color:#f17336;" class="testtitle"></span></span>
                                            </h4>
                                        </div>
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12  no-padding view-result-box">
                                            <div class="row row-eq-height">
                                                <div class="col-md-6 col-lg-4 col-xxl-4 col-sm-6 col-xl-4 col-6 common-mb common-mb-mobile box-outer view-result-box-outer">
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
                                                </div>
                                                <div class="col-md-6 col-lg-4 col-xxl-4 col-sm-6 col-xl-4 col-6 common-mb common-mb-mobile box-outer view-result-box-outer">
                                                    <div class="pratice-box-result attendace-list-box info-box pratice-box-result-height">
                                                        <div class="row">
                                                            <div class="col-md-3 col-xxl-3 col-lg-3 col-sm-3 col-xl-3 col-3 view-result-box-pl-0 box-icon">
                                                                <img src="<?= base_url(); ?>images/ic_attempted.png" class="result-box-img">
                                                            </div>
                                                            <div class="col-md-9 col-xxl-9 col-lg-9 col-sm-9 col-xl-9 col-9 view-result-box-pr-0 box-text">
                                                                <p class="view-result-box-p1" id="queOutOf">0 out of 75 </p>
                                                                <p class="view-result-box-p2">Attempted</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-4 col-xxl-4 col-sm-6 col-xl-4 col-6 common-mb common-mb-mobile box-outer view-result-box-outer">
                                                    <div class="pratice-box-result attendace-list-box info-box pratice-box-result-height">
                                                        <div class="row">
                                                            <div class="col-md-3 col-xxl-3 col-lg-3 col-sm-3 col-xl-3 col-3 view-result-box-pl-0 box-icon">
                                                                <img src="<?= base_url(); ?>images/ic_correct_answer.png" class="result-box-img">
                                                            </div>
                                                            <div class="col-md-9 col-xxl-9 col-lg-9 col-sm-9 col-xl-9 col-9 view-result-box-pr-0 box-text">
                                                                <p class="view-result-box-p1" id="correctAns">0 </p>
                                                                <p class="view-result-box-p2">Correct Answer</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-4 col-xxl-4 col-sm-6 col-xl-4 col-6 common-mb common-mb-mobile box-outer view-result-box-outer">
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
                                                </div>
                                                <div class="col-md-6 col-lg-4 col-xxl-4 col-sm-6 col-xl-4 col-6 common-mb common-mb-mobile box-outer view-result-box-outer">
                                                    <div class="pratice-box-result attendace-list-box info-box pratice-box-result-height">
                                                        <div class="row">
                                                            <div class="col-md-3 col-xxl-3 col-lg-3 col-sm-3 col-xl-3 col-3 view-result-box-pl-0 box-icon">
                                                                <img src="<?= base_url(); ?>images/ic_marks_obtained.png" class="result-box-img">
                                                            </div>
                                                            <div class="col-md-9 col-xxl-9 col-lg-9 col-sm-9 col-xl-9 col-9 view-result-box-pr-0 box-text">
                                                                <p class="view-result-box-p1" id="marksObt">0 </p>
                                                                <p class="view-result-box-p2">Marks Obtained</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-4 col-xxl-4 col-sm-6 col-xl-4 col-6 common-mb common-mb-mobile box-outer view-result-box-outer">
                                                    <div class="pratice-box-result attendace-list-box info-box pratice-box-result-height">
                                                        <div class="row">
                                                        <div class="col-md-3 col-xxl-3 col-lg-3 col-sm-3 col-xl-3 col-3 view-result-box-pl-0 box-icon">
                                                                <img src="<?= base_url(); ?>images/ic_negative_marks.png" class="result-box-img">
                                                            </div>
                                                            <div class="col-md-9 col-xxl-9 col-lg-9 col-sm-9 col-xl-9 col-9 view-result-box-pr-0 box-text">
                                                                <p class="view-result-box-p1" id="negativeMark">0 </p>
                                                                <p class="view-result-box-p2">Negative Marks</p>
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
                                        <div class="panel-body col-md-12 col-lg-12 col-sm-12 col-xs-12 common-mb feeds"><!--style="padding: 0px;"-->
                                       
                                        </div>
                                    </div>
                                    <div class=""><!--panel panel-default-->
                                        <div class="panel-body col-md-12 col-lg-12 col-sm-12 col-xs-12 common-mb  feeds2"><!--style="padding: 0px;"-->
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

        <script type="text/javascript">
            $("#pgtest").addClass('active');
            $('#mobTest').addClass('active');
            
            //var serverlink="../";
            var serverlink="";
            var jsonurl=serverlink+"json/";
            var alphaArr = {'1':'A', '2':'B', '3':'C', '4':'D', '5':'E', '6':'F', '7':'G', '8':'H'};

            /**** Following code is for math type ***/
           /* let promise = Promise.resolve();  // Used to hold chain of typesetting calls
            function typeset(code) {
              promise = promise.then(() => MathJax.typesetPromise(code()))
                               .catch((err) => console.log('Typeset failed: ' + err.message));
              return promise;
            }*/
            /**** ENd ****/
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
                $('#pgtests').addClass('active');  
                var url = window.location.pathname;
                var var1 = url.substring(url.lastIndexOf('/') + 1);
                var sbeids = url.substring(url.lastIndexOf('/') - 1);
                const myArray = sbeids.split("/");
                var sbeid  = myArray[0];
                
                <?php
                    $sql2 = "SELECT * FROM `icad_student_result_os_dtl` WHERE `EXAM_ID` = :ttid: AND  STUDENT_ID =:userid:";
                    $sqldata = $this->db->query($sql2, [
                        'ttid'     => $ttid,
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
                            //print_r($attemptedArr);
                            $attempted = trim($attemptedArr[0]);
                            $totQuest = trim($attemptedArr[1]);
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
                                //print_r($value1);
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
                    var i= sbeid;
                    var retrievedObject = localStorage.getItem('fulltestdata');
                    var tObj = JSON.parse(retrievedObject);
                    var sdata ='<?php echo json_encode($r1); ?>';
                    var subObj=JSON.parse(sdata);
                    var slen = subObj.length;
                    $('.testtitle').text(tObj[i].EXAM_NAME);
                    var tdata='';
                    tdata+='<div class="table-responsive"><table class="table2"><thead><tr><th><span class="od">Subject</span></th><th><span class="od">Questions</span></th><th><span class="od">Unsolved</span></th><th><span class="od"><span class="fa fa-check text-success"></span></span></th><th><span class="od">Part <span class="fa fa-check text-success"></span></span></th><th><span class="od"><span class="fa fa-times text-danger"></span></span></th><th><span class="od">+ Marks</span></th><th><span class="od">Part Marks</span></th><th><span class="od">- Marks</span></th><th><span class="od">Marks Obt.</span></th></tr></thead><tbody>';
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
                        tdata+='<tr><th>'+subObj[j].subject+'</th><td>'+subObj[j].total_quest+'</td><td>'+subObj[j].unattempted+'</td><td>'+subObj[j].correct_quest+'</td><td>'+subObj[j].partial_correct_quest+'</td><td>'+subObj[j].wrong_quest+'</td><td>'+subObj[j].plus_mark+'</td><td>'+subObj[j].partial_mark+'</td><td>'+subObj[j].minus_mark+'</td><td>'+subObj[j].earned_mark+'</td></tr>';
                    }
                    tdata+='<tr><td><b>Total</b></td><td><b>'+totQuest+'</b></td><td><b>'+totUnattemptQue+'</b></td><td><b>'+totcorrectQue+'</b></td><td><b>'+totPartQue+'</b></td><td><b>'+totWrongQue+'</b></td><td>'+totPlusMark+'</td><td>'+totPartialMark+'</td><td>'+totMinusMark+'</td><td>'+totEarnedMark+'</td></tr></tbody></table></div><p class="text-center d-md-none d-lg-none mt-3"><img src="images/swipeleft.svg"/> Swipe Left Right <img src="images/swiperight.svg"/></p><h4 class="card-score-box">Score <span class="float-right">'+totEarnedMark+'/'+totExamMark+'</span></h4>';
                    $('.feeds').html(tdata);
                    $('#markObt').text(totEarnedMark);
                    $('#markTotal').text(totExamMark);
                    var tper = (totEarnedMark/totExamMark)*100;
                    var tper1 = tper.toFixed(2);
                    $('#percentObt').text(tper1);

                    var atteQue = totQuest - totUnattemptQue;
                    var attQueStr = atteQue +' out of '+totQuest;
                    $('#queOutOf').text(attQueStr);
                    var totCorrect = totcorrectQue + totPartQue;
                    $('#correctAns').text(totCorrect);
                    $('#totPlusMarks').text(totPlusMark);
                    $('#marksObt').text(totEarnedMark);
                    $('#negativeMark').text(totMinusMark);
                    $('#timeSpent').text(subObj[0].timespentStr);
                    $('#examDate').text(subObj[0].submitedDate);
                    //console.log("sdata => ",sdata);
                    var srno =1;
                    var tddata='<div><h4 class="right-panel-list-title"><img valign="middle" src="<?= base_url(); ?>images/dscoresheet.svg"/> View Detailed Result </h4></div><div style="padding: 0px;"><div class="table-responsive"><table class="table3">';
                    var no_of_quest = 0;
                    /*var retriveCauseObject = localStorage.getItem('reviewreasondata');
                    var rrObj = JSON.parse(retriveCauseObject);
                    
                    var rlen = rrObj.length;*/
                    for(j=0;j<slen;j++){
                        //tddata+='<thead><tr><th colspan="5">'+subObj[j].subject+'</th></tr><tr><th>Q. No.</th><th>Status</th><th>Correct</th><th>Your</th><th>Cause</th></tr></thead><tbody>';
                        tddata+='<thead><tr><th colspan="5" style="background:#f89a6c;color:#ffffff;">'+subObj[j].subject+'</th></tr><tr><th>Q. No.</th><th>Status</th><th>Correct</th><th>Your</th></tr></thead><tbody>';
                        var status='';
                        var ansstatus='';
                        var cans="";
                        var givenans="";
                        
                        var txtclr='#D9534F';
                        var aObj = subObj[j].ques_detail;
                        for(k=0;k<aObj.length;k++){
                            console.log("aObj[k].status => ",aObj[k].status);
                            var cause="";
                             //console.log("aObj[k] => ",aObj[k]);
                            //var queid
                            /*if(aObj[k].subject!= subObj[j].subject)
                                continue;*/
                             ///var queid = aObj[k].question_id;
                            //amrid=aObj[k].id;
                            no_of_quest++;
                            /*if(aObj[k].question_type==3){
                                a1= aObj[k].range1;
                                a2= aObj[k].range2;
                                cans= a1+"-"+ a2;
                            }else{
                                cans=aObj[k].answer;
                            }*/

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

                            /*for(rv = 0; rv < rlen; rv++){
                                if(rrObj[rv].QUESTION_REVIEW_REASON_ID == aObj[k].cause){
                                    cause = rrObj[rv].QUESTION_REVIEW_REASON_NAME;
                                }
                            }*/
                           
                            //cause=aObj[k].cause;
                            //givenans=aObj[k].given_answer;
                            status=aObj[k].status;
                            if(aObj[k].status=="C" || aObj[k].status=="W"){                                          
                                 status="success";
                            }/*else if(aObj[k].status=="Not Answered"){                                                 
                                 status="danger";
                            }*/else{                                                  
                                 status="default";
                            }/*else if(aObj[k].status=="Mark for Review"){  
                                if(aObj[k].given_answer==""){                                             
                                     status="purple";
                                }else{
                                     status="purple btn-check";
                                }
                            }*/
                            /*if( givenans==""){
                                 ansstatus="Unsolved";
                                 txtclr='#0099cb';
                                 status="default";

                            }else{*/
                                if(aObj[k].status=='C'){
                                    ansstatus="Correct";
                                    txtclr='#00b085';
                                    status="success";
                                }else if(aObj[k].status=='P'){
                                    ansstatus="Partial";
                                    txtclr='#00b085';
                                    status="partial";
                                }else if(aObj[k].status=='W'){
                                    ansstatus="Wrong";
                                    txtclr='#D9534F';

                                    status="danger";
                                }else if(aObj[k].status=='X'){
                                    ansstatus="Canceled";
                                    txtclr='#D9534F';

                                    status="primary";
                                }else{
                                    ansstatus="Unsolved";
                                     txtclr='#0099cb';
                                     status="default";
                                }
                                /*if(aObj[k].given_answer!=aObj[k].answer && (aObj[k].status=='Answered' || (aObj[k].status=='Mark for Review' && aObj[k].given_answer!=''))){
                                    pfo= aObj[k].mark_partial;
                                    if(aObj[k].question_type==2 &&  pfo!=0){
                                         pflag=0;
                                         var rga=aObj[k].given_answer;
                                         var ra=aObj[k].answer;
                                         a1=rga.split(',');;
                                         a2=ra.split(',');;
                                         p=0;
                                         $.each(a1, function( index, valuex ){
                                            if(a2.includes(valuex)){
                                                 p+= pfo;
                                            }else{
                                                 pflag=1;
                                            }
                                        })
                                        if( pflag==0){
                                             ansstatus="Correct";
                                             txtclr='#00b085';

                                         status="success";
                                        }else{
                                             ansstatus="Wrong";
                                             txtclr='#D9534F';

                                         status="danger";
                                        }

                                    }else if(aObj[k].question_type==3){
                                        
                                        if(aObj[k].given_answer<= a2 && aObj[k].given_answer>= a1){
                                             ansstatus="Correct";
                                             txtclr='#00b085';

                                         status="success";
                                        }else{
                                             ansstatus="Wrong";
                                             txtclr='#D9534F';

                                         status="danger";

                                        }

                                    }else{                                                      
                                         ansstatus="Wrong";
                                         txtclr='#D9534F';
                                         status="danger";
                                    }
                                }*/
                            //}
                            //tddata+='<tr style="color: '+txtclr+';"><td><button class="qbtnx btn btn-'+status+'" lid="'+aObj[k].question_id+'" amid="'+aObj[k].given_answer+'">'+(srno++)+'</td><td>'+ansstatus+'</td><td>'+cans+'</td><td>'+givenans+'</td><td>'+cause+'</td></tr>';
                            tddata+='<tr style="color: '+txtclr+';"><td><button class=" qbtnx btn question-btn-circle btn-'+status+'" lid="'+aObj[k].question_id+'" amid="'+aObj[k].given_answer+'" id="'+(srno)+'">'+(srno++)+'</td><td>'+ansstatus+'</td><td>'+cans+'</td><td>'+givenans+'</td></tr>';
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
                                    applyCatex();
                                },
                            });
                            
                            
                        });
                            
                    });
            
            function applyCatex(){
               
                renderMathInElement(document.querySelector('#queText'), {

                    delimiters: [

                        {left: "$$", right: "$$", display: false},
                        {left: "$", right: "$", display: false},
                        {left: "\\(", right: "\\)", display: false},
                        /*{left: "\\begin{array}{cc}", right: "\\end{array}", display: false},
                        {left: "\\begin{equation}", right: "\\end{equation}", display: true},
                        {left: "\\begin{align}", right: "\\end{align}", display: true},
                        {left: "\\begin{alignat}", right: "\\end{alignat}", display: true},
                        {left: "\\begin{gather}", right: "\\end{gather}", display: true},
                        {left: "\\begin{CD}", right: "\\end{CD}", display: true},*/
                        {left: "\\[", right: "\\]", display: false}
                    ],
                    throwOnError : false
                });
                myMathFunction();
            }
            function myMathFunction(){
                $('math').each(function (i, link) {
                    $(link).attr('display', '');
                });
            }
        </script>
<?= $this->include('components/footer-end.php'); ?>
