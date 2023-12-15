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

           /* mjx-container.MathJax.CtxtMenu_Attached_0 {
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
        <!-- <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
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
                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12 no-padding right-container">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding orange-bg  orange-bg-common-pd top-data-container" style="height:auto;">
                            <h4 class="coming-soon-back-text ">
                                <a style="color:#fff;" href="<?= base_url(); ?>tests" class="back-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> 
                                    Back</a>
                            </h4>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 col-xxl-12 col-12 no-padding tests-box avail-appeared-box">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12 col-md-3 col-xxl-4 col-xl-4 col-12 text-center align-self-center">
                                        <img class="result-img" src="<?= base_url()?>images/result.svg" />
                                    </div>
                                    <div class="col-lg-8 col-sm-12 col-md-9 col-xxl-8 col-xl-8 col-12 align-self-center">
                                        <div class="middle-container-data" style="background: none;border-radius: 0;">
                                            <div class="text-center">
                                                
                                                <div class="row row-eq-height">
                                                    <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-1"></div>
                                                    <div class="col-lg-4 col-xl-4 col-xxl-4  col-md-4 col-sm-6  col-6">
                                                        <div class="col-lg-12 col-xs-12 stud-profile-box mb-0 pratice-box-result-height" style="margin-top:0;">
                                                            <div class="">
                                                                <div class="text-center">
                                                                    <h1 class="socre-head"><span id="markObt">0</span> / <span id="markTotal">300</span></h1>
                                                                    <h5>Score<br/><small> </small></h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-xl-4 col-xxl-4  col-md-4 col-sm-6  col-6">
                                                        <div class="col-lg-12 col-xs-12 stud-profile-box mb-0 pratice-box-result-height" style="margin-top:0;">
                                                            <div class="">
                                                                <div class="text-center">
                                                                    <h1 class="socre-head"><span id="percentObt">0.00 </span>%</h1>
                                                                    <h5>Percentage<br/><small> </small> </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-1"></div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding orange-bg-common-pd middle-container-data" >
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 ">
                                    <div class="">
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12  no-padding">
                                            <h4 class="analysis-heading mt-3 mb-3"> <strong>Analysis : </strong>
                                            <span class="testtitle"></span>
                                            </h4>
                                        </div>
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12  no-padding view-result-box">
                                            <div class="row row-eq-height" id="earnedOpt">
                                    
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
                                <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12 col-xl-12 col-12">
                                    <div class="">
                                        <!-- <div class="panel-body col-md-12 col-lg-12 col-sm-12 col-xs-12 common-mb attendace-list-box" style="padding-bottom: 0;max-height: 400px;">
                                        </div> -->

                                        <div class="panel-body col-md-12 col-lg-12 col-sm-12 col-xs-12 common-mb attendace-list-box currentstatus">
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="panel-body col-md-12 col-lg-12 col-sm-12 col-xs-12 common-mb attendace-list-box feeds" style="padding: 0px;">
                                        </div>
                                        <div class="panel-body col-md-12 col-lg-12 col-sm-12 col-xs-12 common-mb attendace-list-box text-center"> 
                                            <a href="javascript:void(0);" class="btn btn-lg btn-warning" id="sbtnresult">Done</a>
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
                    <div class="modal-header  d-block" style="padding-bottom:0;border-bottom:none;">
                        <h4 class="modal-title practice-custom-modal-title">Question</h4>
                    </div>
                    <div class="modal-body" style="padding-bottom: 0;" id="queText">
                                 (1/1000) in terms of exponents means
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 text-center">
                            <button type="button" class="btn btnmodal-custom-submit" data-bs-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade practice-custom-modal" tabindex="-1" role="dialog" id="tryagain" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <button type="button" class="btn-close modal-button-close" data-bs-dismiss="modal"></button>
                    <div class="modal-header">
                        <h4 class="modal-title testhead">Exam Not Submitted</h4>
                    </div>
                    <div class="modal-body text-center" style="padding-bottom: 0;">
                        <p>Something went wrong! Do not press back button your exam data will be lost. Instead click on Try Again.</p>
                    </div>
                    <div class="modal-footer">
                        <!-- <button id="tryagainbtn" type="button" class="btn btn-warning">Try Again</button> -->
                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 text-center">
                            <button id="tryagainbtn" type="button" class="btn btnmodal-custom-submit">Try Again</button>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <?= $this->include('components/footer.php'); ?> 
        <script type="text/javascript">
            $(document).ready(function() {
                window.history.pushState(null, "", window.location.href);        
                window.onpopstate = function() {
                    window.history.pushState(null, "", window.location.href);
                };
            });
        </script>
        <script type="text/javascript">
            $("#pgtest").addClass('active');
            $('#mobTest').addClass('active');
            /**** Following code is for math type ***/
            /*let promise = Promise.resolve();  // Used to hold chain of typesetting calls
            function typeset(code) {
              promise = promise.then(() => MathJax.typesetPromise(code()))
                               .catch((err) => console.log('Typeset failed: ' + err.message));
              return promise;
            }*/
            /**** ENd ****/
            var alphaArr = {'1':'A', '2':'B', '3':'C', '4':'D', '5':'E', '6':'F', '7':'G', '8':'H'};
            $(document).ready(function(){
                $('#pgtests').addClass('active');
                $('#tryagain').modal('hide');
                $('#sbtnresult').show();

                $('.loading').show(); //for now

                if(storage()){
                    localStorage.removeItem('exam_changed_duration');
                    var var1 = <?php if(isset($_GET['tid'])){ echo $_GET['tid']; }else{ echo 1; } ?>;
                    //var i=var1;
                    var retrievedObject = localStorage.getItem('fulltestdata');
                    var eObj = JSON.parse(retrievedObject);

                    let tlen = eObj.length;
                    let testid = '<?php echo $examId; ?>';
                    let i = 0;
                    for(let k = 0; k < tlen; k++){
                        if(eObj[k].EXAM_ID == testid){
                            i = k;
                        }
                    }

                        
                    var testlist="";
                    var cnt1=0;
                    var cnt2=0;                           
                    //var testid=eObj[i].EXAM_ID;
                    var fresid=eObj[i].fid;
                    var names =eObj[i].SUBJECT_IDS;
                    var sarray=names.split(',')
                    $('.testtitle').text(eObj[i].EXAM_NAME);
                    //testlist+=tObj[i].EXAM_NAME+' | '+tObj[i].EXAM_DURATION+' min | '+tObj[i].NUMBER_OF_QUESTIONS+' questions | '+tObj[i].TOTAL_MARKS+' marks';

                    //alert(testlist);
                    $('.testhead').text(testlist);
                    var retrievedObject = localStorage.getItem('questionstext');
                    var tObj = JSON.parse(retrievedObject);
                    var slimdata2=JSON.stringify(tObj);
                    $('.currentstatus').text('Analysing Score');
                    var retrievedObject2=localStorage.getItem('fullsubjectdata');
                    var sObj=JSON.parse(retrievedObject2);
                        
                    $.ajax({
                        url:'<?= site_url() ?>tests/fulltest_result_dt_submit',
                        type:"POST",
                        cache:false,
                        data:{txtdata: slimdata2,tid: testid, sid:localStorage.icduserid, ['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'},
                        success:function(data){
                            console.log(data);
                            $('.loading').hide();
                            //$('#jsondata').html(data); 
                                       
                            // localStorage.removeItem('questionstext');
                            //$('#status').text("Test answers submitted Successfully!!");
                            $('.currentstatus').html(data);
                            $('#sbtnresult').show();
                            var rObj1 = JSON.parse(data);
                            var rObj = rObj1.data;
                            
                            var rlen=rObj.length;
                            //console.log("len => ",rlen);
                            if(rObj1.existMessage == 'Exist'){
                                var output='<div class="text-danger text-center" style="font-weight:600;">You have already submitted this exam. Please click on Done button to go back to check your result.</div>';
                                $('#earnedOpt').hide();
                                $('.currentstatus').html(output);
                            }else if(rObj1.existMessage == 'Not Inserted'){
                                $('#sbtnresult').hide();
                                $('#tryagain').modal('show');
                            }else{
                                if(rlen>0){
                                   
                                    /*var output='<div class="table-responsive"> <table class="table2"> <thead> <tr> <th>Subject</th><th>Questions</th><th class="hidden"> Unsolved </th><th class="hidden"><span class="fa fa-check text-success"></span></th><th class="hidden">Part <span class="fa fa-check text-success"></span></th><th class="hidden"><span class="fa fa-check text-danger"></span></th><th>+ Marks</th>   <th class="hidden">Part Marks</th><th>- Marks</th><th>Marks (net)</th><th>Marks (sub)</th><th>Marks Obt.</th></tr></thead><tbody>';*/
                                    var output='<div class="table-responsive"><table class="table2"><thead><tr><th><span class="od">Subject</th></span></th><th><span class="od">Questions</th></span></th><th><span class="od">Unsolved</th></span></th><th><span class="od"><span class="fa fa-check text-success"></span></th></span></th><th><span class="od">Part <span class="fa fa-check text-success"></span></th></span></th><th><span class="od"><span class="fa fa-times text-danger"></span></th></span></th><th><span class="od">+ Marks</th></span></th><th><span class="od">Part Marks</th></span></th><th><span class="od">- Marks</th></span></th><th><span class="od">Marks Obt.</th></span></th></tr></thead><tbody>';
                                    var totquest=0;
                                    var tot_nt_att=0;
                                    var tot_correct=0;
                                    var tot_pcorrect=0;
                                    var tot_wrong_ans=0;
                                    var tot_pos_marks=0;
                                    var tot_par_marks=0;
                                    var tot_neg_marks=0;
                                    var tot_marks_obt=0;
                                    var tot_sub_marks=0;
                                    var tot_att = 0;


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
                                    for(i = 0; i < rlen; i++){

                                        var unattemptQue = parseInt(rObj[i].secQuestion) - parseInt(rObj[i].secAttemptQue);
                                        totExamMark = parseInt(totExamMark) + parseInt(rObj[i].subTotalMark);
                                        totQuest = parseInt(totQuest) + parseInt(rObj[i].secQuestion);
                                        totUnattemptQue = parseInt(totUnattemptQue) + parseInt(unattemptQue);
                                        totcorrectQue = parseInt(totcorrectQue) + parseInt(rObj[i].secCorrectQue);
                                        totPartQue = parseInt(totPartQue) + parseInt(rObj[i].partialCorrectQue);
                                        totWrongQue = parseInt(totWrongQue) + parseInt(rObj[i].secWrongQue);
                                        totPlusMark = parseInt(totPlusMark) + parseInt(rObj[i].secPlusMark);
                                        totPartialMark = parseInt(totPartialMark) + parseInt(rObj[i].secPartialMark);
                                        totMinusMark = parseInt(totMinusMark) + parseInt(rObj[i].secMinusMark);
                                        totEarnedMark = parseInt(totEarnedMark) + parseInt(rObj[i].secNetMark) + parseInt(rObj[i].secPartialMark);
                                        var secMarkObt = parseInt(rObj[i].secNetMark) + parseInt(rObj[i].secPartialMark);
                                        output+='<tr><th>'+rObj[i].subName+'</th><td>'+rObj[i].secQuestion+'</td><td>'+unattemptQue+'</td><td>'+rObj[i].secCorrectQue+'</td><td>'+rObj[i].partialCorrectQue+'</td><td>'+rObj[i].secWrongQue+'</td><td>'+rObj[i].secPlusMark+'</td><td>'+rObj[i].secPartialMark+'</td><td>'+rObj[i].secMinusMark+'</td><td>'+secMarkObt+'</td></tr>';
                                        
                                        /*tot_att = tot_att + rObj[i].secAttemptQue;
                                        tot_correct = tot_correct + rObj[i].secCorrectQue;
                                        totQuest = totQuest + rObj[i].secQuestion;
                                        tot_pos_marks = tot_pos_marks + rObj[i].secPlusMark;
                                        tot_neg_marks = tot_neg_marks + rObj[i].secMinusMark;
                                        tot_sub_marks = tot_sub_marks + rObj[i].subTotalMark;
                                        tot_marks_obt = tot_marks_obt + rObj[i].secNetMark;
                                        output+='<tr><td>'+rObj[i].subName+'</td><td>'+ rObj[i].secQuestion+'</td><td class="hidden"></td><td class="hidden"></td><td class="hidden"></td><td class="hidden"></td><td>'+ rObj[i].secPlusMark+'</td><td class="hidden"></td><td>'+ rObj[i].secMinusMark+'</td><td>'+ rObj[i].secNetMark+'</td><td>'+ rObj[i].subTotalMark+'</td><td>'+ rObj[i].secNetMark+'</td></tr>';*/
                                    }
                                    /*output+='<tr><td><b>Total</b></td><td><b>'+ totquest+'</b></td><td class="hidden"><b>'+ tot_nt_att+'</b></td><td class="hidden"><b>'+ tot_correct+'</b></td><td class="hidden"><b>'+ tot_pcorrect+'</b></td><td class="hidden"><b>'+ tot_wrong_ans+'</b></td><td><b>'+ tot_pos_marks+'</b></td><td class="hidden"><b>'+ tot_par_marks+'</b></td><td><b>'+ tot_neg_marks+'</b></td><td><b>'+ tot_marks_obt+'</b></td><td><b>'+ tot_sub_marks+'</b></td><td><b>'+ tot_marks_obt+'</b></td></tr></tbody></table>';*/

                                    output+='<tr><td><b>Total</b></td><td><b>'+totQuest+'</b></td><td><b>'+totUnattemptQue+'</b></td><td><b>'+totcorrectQue+'</b></td><td><b>'+totPartQue+'</b></td><td><b>'+totWrongQue+'</b></td><td>'+totPlusMark+'</td><td>'+totPartialMark+'</td><td>'+totMinusMark+'</td><td>'+totEarnedMark+'</td></tr></tbody></table></div><p class="text-center hidden-md hidden-lg"><img src="<?= base_url(); ?>images/swipeleft.svg"/> Swipe Left Right <img src="<?= base_url(); ?>images/swiperight.svg"/></p><h4 class="card-score-box" >Score <span style="font-weight: 700;">'+totEarnedMark+'/'+totExamMark+'</span></h4>';

                                    
                    
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

                                    $('#ccount').text(totCorrect);
                                    $('#wcount').text(totWrongQue);
                                    $('#ucount').text(totUnattemptQue);

                                    $('#totPlusMarks').text(totPlusMark);
                                    $('#marksObt').text(totEarnedMark);
                                    $('#negativeMark').text(totMinusMark);
                                    $('#timeSpent').text(rObj[0].timespentStr);
                    


                                    /*$('#markObt').text(tot_marks_obt);
                                    $('#markTotal').text(tot_sub_marks);
                                    var tper = (tot_marks_obt/tot_sub_marks)*100;
                                    var tper1 = tper.toFixed(2);
                                    $('#percentObt').text(tper1);

                                    //var atteQue = totquest - totUnattemptQue;
                                    var attQueStr = tot_att +' out of '+totquest;
                                    $('#queOutOf').text(attQueStr);
                                    var totCorrect = tot_correct;
                                    $('#correctAns').text(totCorrect);
                                    $('#totPlusMarks').text(tot_pos_marks);
                                    $('#marksObt').text(tot_marks_obt);
                                    $('#negativeMark').text(tot_neg_marks);
                                    $('#timeSpent').text(rObj[0].timespentStr);
*/
                                    var srno =1;
                                    var tddata='<div><h4 class="right-panel-list-title"><img style="width:25px;" valign="middle" src="<?= base_url(); ?>images/dscoresheet.svg"/> View Detailed Result </h4></div><div style="padding: 0px;"><div class="table-responsive"><table class="table3">';
                                    var no_of_quest = 0;
                                    
                                    for(j=0;j<rlen;j++){
                        
                                        tddata+='<thead><tr><th colspan="5" style="background: #f89a6c;color: #ffffff;">'+rObj[j].subName+'</th></tr><tr><th>Q. No.</th><th>Status</th><th>Correct</th><th>Your</th></tr></thead><tbody>';
                                        var status='';
                                        var ansstatus='';
                                        var cans="";
                                        var givenans="";
                                        
                                        var txtclr='#D9534F';
                                        var aObj = rObj[j].ques_detail;
                                        //console.log("aObj => ",aObj);
                                        for(k=0;k<aObj.length;k++){
                                            
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
                                                
                                                
                                            //}
                                            tddata+='<tr style="color: '+txtclr+';"><td><button class="result-circle-btn qbtnx btn btn-'+status+'" lid="'+aObj[k].question_id+'" amid="'+aObj[k].given_answer+'" id="'+(srno)+'">'+(srno++)+'</td><td>'+ansstatus+'</td><td>'+cans+'</td><td>'+givenans+'</td></tr>';
                                        }
                                    }

                                    
                                       
                                    $('.currentstatus').html(output);
                                    $('.feeds').html(tddata);
                                }else{
                                   // alert("Something went wrong!!");
                                }
                            }
                        }
                    });

                    $('.feeds').on('click', 'button.qbtnx', function() {
                        var sequID = $(this).attr('id');
                        var question = 'Question no. -'+sequID;
                        var qid = $(this).attr('lid') ? $(this).attr('lid') : '';
                        var txtamid = $(this).attr('amid') ? $(this).attr('amid') : 0;
                        $('#questionbox').find('.modal-title').html(question);
                        $.ajax({ 
                            type: "POST",
                            data: {qid,txtamid,['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                            dataType: 'json', 
                            url: "<?= site_url(); ?>tests/view_question",
                            success: function(data) {
                                
                                $('#questionbox').modal('show');
                                $('#questionbox').find('.modal-body').html(data);
                                /*typeset(() => {
                                    const math = document.querySelector('#queText');
                                    math.innerHTML = data;
                                    return [math];
                                });*/
                                applyCatex();
                                /*if(sta == 'Canceled'){
                                    $('#ques_stat').text('This Question has been canceled.');
                                }else{
                                    $('#ques_stat').text('');
                                }*/
                            },
                            // error: function(error){
                            //     console.log(error);
                            // }
                        });
                       
                        
                    });           
                }  
            });
            $('#sbtnresult').on('click', function(){
                localStorage.removeItem('questionstext');
                window.location.href = '<?php echo site_url(); ?>tests/tests';
            })
            $('#tryagainbtn').on('click',function(){
                window.location.reload();
            })

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