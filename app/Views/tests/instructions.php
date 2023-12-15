<?php echo $this->include('components/header.php'); ?>
<style type="text/css">
    .startbtn
    {
        display: none; 
    }
    .btn-check
    {
        border:none;  
        background-image: url('<?= base_url(); ?>images/check.png');
        background-position: 45px 15px;
        background-repeat: no-repeat;
        background-size: 10px 10px;
        border-radius: 15px;
        border-bottom-right-radius: 5px;
        position:relative;
    }
    .right-container .btn.palate-btn-width
    {
        width: 60px;
        border-radius: 5px;
        padding: 5px;
        font-size: 12px;
    }
</style>
<?php echo $this->include('components/header-end.php'); ?>
<div class="container container-custom no-padding main-container">
    <div class="row">
        <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-4 col-12">
            <?= $this->include('components/sidebar.php'); ?>
        </div>
        <div class="col-md-8 col-lg-9 col-xl-9 col-xxl-9 col-sm-8 col-12">
            <input type="hidden" id="user_id" name="user_id" value="<?= $_SESSION['icaduserid']?>">
            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12 no-padding right-container instructions-box">
                <div class="panel panel-default rightpanel-box">
                    <div class="panel-body rightpanel-box1 x" >
                        <div class="panel-body">
                            <h2 id="ttitle"></h2>
                            <h4 class="instructions-text mt-0">Exam specific Instructions</h4>
                        </div>
                        <div class="panel-body inswindow">
                            <h4>IMPORTANT NOTE</h4>
                            <ul class="list-unstyled">
                                <li>
                                    <span class="fa fa-check"></span> 
                                    The purpose of this MOCK TEST is to familiarize the candidates with the Computer Based Test (CBT) environment of the JEE (Advanced) - 2019.</li>
                                <li>
                                    <span class="fa fa-check"></span> 
                                    Candidates may use this MOCK TEST to get acclimatized with the functionalities of CBT.</li>
                                <li>
                                    <span class="fa fa-check"></span> 
                                    This MOCK TEST has used previous years' questions of JEE (Advanced).</li>
                                <li>
                                    <span class="fa fa-check"></span> 
                                    The type of questions and illustrative marking scheme in this MOCK TEST is in NO WAY INDICATIVE of the type of questions and marking scheme of JEE (Advanced) - 2021 question paper.</li>
                            </ul>

                            <p class="inner-heading-inst">
                                General Instructions:
                            </p>
                            <ul class="list-unstyled">
                                <li><span class="fa fa-check"></span> Total duration of examination is <span class="tdur">0</span> minutes.</li>
                                <li><span class="fa fa-check"></span> The clock will be set at the server. The countdown timer in the top right corner of screen will display the remaining time available for you to complete the examination. When the timer reaches zero, the examination will end by itself. You will not be required to end or submit your examination.</li>
                                <li><span class="fa fa-check"></span> The Question Palette displayed on the right side of screen will show the status of each question using one of the following symbols:
                            </ul> 
                            <div class="col-xl-12 col-lg-12 col-md-12 col-12 col-xs-12 no-padding mb-3">
                                <div class="align-self-center palette-instmb"><span><button class="btn btn-default btn-sm palette palate-btn-width" type="button">0</button></span> "Not&nbsp;Visited" - You have not visited the question yet.</div>

                                <div class="align-self-center palette-instmb"><span><button class="btn btn-danger btn-sm palette palate-btn-width" type="button">0</button></span> "Not&nbsp;Answered" - You have not answered the question.</div>

                                <div class="align-self-center palette-instmb"><span><button class="btn btn-success btn-sm palette palate-btn-width" type="button">0</button></span> "Answered" - You have answered the question.</div>

                                <!-- <div class="align-self-center palette-instmb"><span> <button class="btn btn-purple btn-sm palette palate-btn-width" type="button">0</button></span> "Mark&nbsp;for&nbsp;Review" - You have NOT answered the question, but marked it for review.</div>

                                <div class="align-self-center palette-instmb"><span> <button class="btn btn-purple btn-sm palette palate-btn-width btn-check" type="button">0</button>
                                    </span> "Mark&nbsp;for&nbsp;Review" - You have ans" type="button">0</button></span> "Mark&nbsp;for&nbsp;Review" - You have answered the question, but marked it for review.
                                </div>
 
                                <div class="align-self-center palette-instmb">
                                    The Marked for Review status for a question simply indicates that you would like to look at that question again.<span style="color:red;"> If a question is answered and Marked for Review, your answer for that question will be considered in the evaluation.</span>
                                </div>-->
                            </div>

                            <p class="inner-heading-inst">
                                Navigating to a Question:
                            </p>
                            <p>To answer a question, do the following:</p>
                            <ul class="list-unstyled">
                                <li><span class="fa fa-check"></span> Click on the question number in the Question Palette at the right of your screen to go to that numbered question directly. Note that using this option does NOT save your answer to the current question.</li>
                                <li><span class="fa fa-check"></span> Click on <b>Save & Next</b> to save your answer for the current question and then go to the next question.</li>
                                <li><span class="fa fa-check"></span> Click on <b>Mark for Review & Next</b> to save your answer for the current question, mark it for review, and then go to the next question.<br /><span style="color:red;">Caution: Note that your answer for the current question will not be saved, if you navigate to another question directly by clicking on its question number.</span></li>
                                <li><span class="fa fa-check"></span> You can view all the questions by clicking on the Question Paper button. Note that the options for multiple choice type questions will not be shown.</li>
                            </ul>



                            <p class="inner-heading-inst">
                                Answering a Question:
                            </p>
                            <p>Procedure for answering a multiple choice type question:</p>
                            <ul class="list-unstyled">
                                <li><span class="fa fa-check"></span> To select your answer, click on the button of one of the options</li>
                                <li><span class="fa fa-check"></span> To deselect your chosen answer, click on the button of the chosen option again or click on the <b>Clear Response</b> button</li>
                                <li><span class="fa fa-check"></span> To change your chosen answer, click on the button of another option</li>
                                <li><span class="fa fa-check"></span> To save your answer, you MUST click on the <b>Save & Next</b> button</li>
                                <li><span class="fa fa-check"></span> To mark the question for review, click on the <b>Mark for Review & Next</b> button.</li>
                            </ul>
                            <hr/>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 col-12  mx-auto text-center">                
                                <a href="javascript:void" class="btn btn-info w-100 quebtn" style="text-transform: inherit;"><i class="fa fa-spinner fa-pulse fa-fw"></i>
                                    <span class="sr-only">Loading...</span> Please wait while <br/> Questions are being loaded...</a>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 col-12  mx-auto text-center mt-3 mb-3">
                                <a href="javascript:void(0)" class="btn btn-warning w-100 startbtn btn-start-exam" id="startbtn">Start Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->include('components/footer.php');?>
<script type="text/javascript">
    $("#pgtest").addClass('active');
    $('#mobTest').addClass('active');
    var browser = (function() {
            var test = function(regexp) {return regexp.test(window.navigator.userAgent)}
            switch (true) {
                case test(/edg/i): return "Microsoft Edge";
                case test(/trident/i): return "Microsoft Internet Explorer";
                case test(/firefox|fxios/i): return "Mozilla Firefox";
                case test(/opr\//i): return "Opera";
                case test(/ucbrowser/i): return "UC Browser";
                case test(/samsungbrowser/i): return "Samsung Browser";
                case test(/chrome|chromium|crios/i): return "Google Chrome";
                case test(/safari/i): return "Apple Safari";
                default: return "Other";
            }
        })();
       
        var osName = navigator.platform;
        /* Storing user's device details in a variable*/
        let details = navigator.userAgent;
       
  
        /* Creating a regular expression 
        containing some mobile devices keywords 
        to search it in details string*/
        let regexp = /android|iphone|kindle|ipad/i;
  
        /* Using test() method to search regexp in details
        it returns boolean value*/
        let isMobileDevice = regexp.test(details);
        var device = 'Desktop';
        if (isMobileDevice) {
            var device = 'Mobile';
        }
              //var serverlink="../";
            // var serverlink="";
            // var jsonurl=serverlink+"json/";
            $(document).ready(function(){
                /*** following code is to check other device login ***/
               /* $.post(jsonurl+"check_other_device.php",{      
                },
                function(data, status){
                    var pdata = JSON.parse(data);
                    if(pdata.msg != ''){
                        window.location.href='index.php';
                    }
                });*/
                /*** End ***/
                $('#pgdtests').addClass('active');
                var var1 = <?php if(isset($tid)){ echo $tid; }else{ echo 1; } ?>;

                /*if(storage()){
                    $.ajaxSetup({ cache: false });
                    getdyntests();
                    $('.startbtn').attr('href','<?php echo base_url();?>rewind/exam/'+var1);
                }  

                function getdyntests(){
                    $('#status').text('Fetching News...');
                    var userid = $('#user_id').val();
                        $.ajax({ 
                            type: "POST",
                            data: {userid,['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                            dataType: 'json', 
                            url: "<?= site_url(); ?>rewind/list_dynamic_tests",
                            success: function(data) {
                                var dtdata = JSON.stringify(data);
                                localStorage.setItem('dynamictestdata', dtdata);
                                getdynquestions();
                            }
                        });
                }
            

                function getdynquestions(){
                    var retrievedObject = localStorage.getItem('dynamictestdata');
                    
                    var tObj = JSON.parse(retrievedObject);
                   
                    var testlist = "";
                    var cnt1 = 0;
                    var cnt2 = 0;                           
                    var testid = var1;
                    var names = "";

                    var y = tObj.length;
                    var timeduration = 0;

                    
                    for (j = 0; j < y; j++) {
                        if(tObj[j].ICAD_DYNAMIC_TEST_ID == var1){
                            testlist = tObj[j].TEST_TITLE+' | '+tObj[j].TEST_DURATION+' min | '+tObj[j].NUMBER_OF_QUESTIONS+' questions'; 
                            //' | '+tObj[j].max_marks+' marks';
                            //names = tObj[j].subject;
                            timeduration = tObj[j].NUMBER_OF_QUESTIONS*2;
                        }
                    }
                    //alert(testlist);
                    $('#ttitle').html(testlist);    
                    $('.tdur').text(timeduration);      

                    //alert(jsonurl+"dyn_questions.php"+localStorage.icduserid+" "+testid);
                    $('#status').text('Fetching News...');
                    var userid = $('#user_id').val();
                    var testid = var1;
                        $.ajax({ 
                            type: "POST",
                            data: {userid,testid,['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                            dataType: 'json', 
                            url: "<?= site_url(); ?>rewind/dyn_questions",
                            success: function(data) {
                            if(data!=""){
                                var qstdata = JSON.stringify(data);
                                localStorage.setItem('questionstext', qstdata);
                                $('.quebtn').hide();
                                $('.startbtn').show();
                            }else{
                                alert('Not able to load Questions from Server!!');
                                window.location.href='<?= base_url()?>users/dashboard';
                            }
                        }
                    });
                }*/

                var retrievedObject = localStorage.getItem('fulltestdata');
                var tObj = JSON.parse(retrievedObject);
                let tlen = tObj.length;
               
                var testlist = "";
                var cnt1 = 0;
                var cnt2 = 0;

                var testid = '<?php echo $examid; ?>';
                var is_section = 'NO';
                var subIds = '';

                let examName = '';
                let examEndDate = '';
                let examDuration = '';
                let numOfQuestion = '';
                let totMarks = '';
                let instrct = '';
                for(let i = 0; i < tlen; i++){
                    if(tObj[i].EXAM_ID == testid){
                        is_section = tObj[i].IS_SECTION_AVAILABLE;
                        subIds = tObj[i].SUBJECT_IDS;
                        examName = tObj[i].EXAM_NAME;
                        examDuration = tObj[i].EXAM_DURATION;
                        numOfQuestion = tObj[i].NUMBER_OF_QUESTIONS;
                        totMarks = tObj[i].TOTAL_MARKS;
                        instrct = tObj[i].INSTRUCTIONS;
                        examEndDate = tObj[i].SCHEDULE_END_DATE;
                    }
                }                           
                
                
                $.ajax({ 
                    type: "POST",
                    data: {testid, is_section, subIds, ['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                    dataType: 'json', 
                    url: "<?= site_url(); ?>tests/get_subject_list",
                    success: function(data) {
                        /*var dtdata = JSON.stringify(data);
                        localStorage.setItem('dynamictestdata', dtdata);
                        getdynquestions();*/
                        localStorage.setItem('testSubjects', JSON.stringify(data));
                    }
                });

                /*$.post(jsonurl+"get_subject_list.php",
                {
                    txtuserid: localStorage.icduserid,
                    testidx:testid,
                    is_section:is_section,
                    subIds:subIds
                },
                function(data, status){
                    localStorage.setItem('testSubjects', data);
                });*/
 

               $.ajax({ 
                    type: "POST",
                    data: {testid,['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                    dataType: 'json', 
                    url: "<?= site_url(); ?>tests/check_user_exam_status",
                    success: function(data1) {
                        //console.log('data => ',data.status);
                        //var checkObj = JSON.parse(data);
                        if(data1.status == 'success'){
                            testlist += examName+' | '+examDuration+' min | '+numOfQuestion+' questions | '+totMarks+' marks';
                            $('.tdur').text(examDuration);

                            //alert(testlist);
                            if(instrct != ''){
                                $('.inswindow').html(instrct);
                            }
                            $.ajax({ 
                                type: "POST",
                                data: {testid,['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                                dataType: 'json', 
                                url: "<?= site_url(); ?>tests/live_questions",
                                success: function(data) {
                                    /*$.post(jsonurl+"live_questions.php",
                                    {
                                        txtuserid: localStorage.icduserid,
                                        testidx:testid
                                    },
                                    function(data, status){*/
                                    if(data != ""){
                                        //var ntObj = JSON.parse(data);
                                        if(data.length > 0){
                                            localStorage.setItem('questionstext', JSON.stringify(data));
                                            $('.quebtn').hide();
                                            $('.startbtn').show();
                                        }else{
                                            $('.quebtn').text('No Questions Available in this Test');
                                        }
                                    }else{
                                        alert('Not able to load Questions from Server!!');
                                    }
                                }
                            });
                        }else{
                            var errMsg = data1.msg;
                            if(errMsg == '1'){
                                window.location.href = '<?= site_url()?>tests/err_exam_submited';
                            }else{
                                window.location.href = '<?= site_url()?>tests/err_exam_inprocess';
                            }
                        }
                    }
                });
                $('#startbtn').on('click',function(){
                    
                    $.ajax({ 
                        type: "POST",
                        data: {testid, browser, device, osName, examEndDate, examDuration, ['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                        dataType: 'json', 
                        url: "<?= site_url(); ?>tests/exam_start_status",
                        success: function(data) {
                            //var d1 = JSON.parse(data);
                            console.log('data.status => ',data.status);
                            if(data.status == 'success'){
                                if(data.message == 'Exist'){
                                    localStorage.setItem('exam_changed_duration', data.end_duration);
                                }else{
                                    localStorage.removeItem('exam_changed_duration');
                                }
                                if(data){
                                    window.location.href = '<?= site_url()?>tests/on_stream/'+testid;
                                }
                            }else{
                                var errMsg = data.msg;
                                if(errMsg == '1'){
                                    window.location.href = '<?= site_url()?>tests/err_exam_submited';
                                }else if(errMsg == '2'){
                                    window.location.href = '<?= site_url()?>tests/err_exam_inprocess';
                                }else if(errMsg == '3'){
                                    var err_msg = data.err_msg;
                                    $('#msg-text').text(err_msg);
                                    $('#msgbox').modal('show');
                                }else{
                                    var err_msg = data.err_msg;
                                    $('#msg-text').text(err_msg);
                                    $('#msgbox').modal('show');
                                }
                            }
                        }
                    });
                    
                })

            });
         </script>
<?= $this->include('components/footer-end.php'); ?>
