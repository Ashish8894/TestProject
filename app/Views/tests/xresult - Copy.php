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
        </style>
        <?= $this->include('components/header-end.php'); ?>
        <div class="container container-custom no-padding main-container">
            <div class="row">
                <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-4 col-12">
                    <?= $this->include('components/sidebar.php'); ?>
                </div>
                <div class="col-md-8 col-lg-9 col-xl-9 col-xxl-9 col-sm-8 col-12">
                    
                    <div class="row" style="margin-left: -5px;margin-right: -5px;">
                       <!-- <div class="col-xs-12" style="padding: 5px;">
                            <div class="panel panel-default">
                                <div class="panel-body text-center testhead">
                                    Topic: Power with Negative Coefficients
                                </div>
                            </div>
                        </div> -->
                 <div class="col-xs-4 hidden" style="padding: 5px;">
                    <div class="panel panel-default">
                        <div class="panel-body text-center">
                            <h1 style="color: #00B085;" id="ccount">2</h1>
                            <h5>Correct</h5>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 hidden" style="padding: 5px;">
                    <div class="panel panel-default">
                        <div class="panel-body text-center">
                            <h1 style="color: #F17336;" id="wcount">2</h1>
                            <h5>Wrong</h5>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 hidden" style="padding: 5px;">
                    <div class="panel panel-default">
                        <div class="panel-body text-center">
                            <h1 style="color: #0099CB;" id="ucount">3</h1>
                            <h5>Unsolved</h5>
                        </div>
                    </div>
                </div>
                <div class="backimg" style="margin-bottom: 15px;">
                        <!-- <h2 class="text-center" style="margin-bottom: 40px;margin-top: 10px;"><span class="tagline">Score</span><br/>
                            <small>
                                <span class="testtitle"></span> 
                            </small> 
                        </h2> -->
                        <div class="row" style="margin-left: -5px;margin-right: -5px;">                                
                            <div class="col-md-3 col-xs-5 col-md-offset-2 " style="padding: 5px;">
                                <div class="panel panel-default">
                                    <div class="panel-body text-center">
                                        <h1 class="socre-head"><span id="markObt">0</span> / <span id="markTotal">300</span></h1>
                                        <h5>Score<br/><small> </small></h5>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3 col-md-offset-2 col-xs-5 col-xs-offset-1" style="padding: 5px;">
                                <div class="panel panel-default">
                                    <div class="panel-body text-center">
                                        <h1 class="socre-head"><span id="percentObt">0.00 </span>%</h1>
                                        <h5>Percentage<br/><small> </small> </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-left: -5px;margin-right: -5px;">
                        <div class="col-xs-12" style="padding: 5px;">
                            <div class="panel panel-default">
                                <div class="row" style="padding:10px; margin:3px;">
                                    <h4> <strong>Analysis : </strong><span class="testtitle"></span></h4>
                                </div>
                                
                                <div class="row" style="padding:5px; margin:3px;" id="earnedOpt">
                        
                                    <div class="col-md-4 col-xs-6 box-outer">
                                        <div class="info-box">
                                            <div class="row">
                                                <div class="col-md-3 col-xs-3 box-icon"><!-- <i class="fa fa-clock-o" aria-hidden="true"></i> --><img src="images/ic_time_taken.png" width="30"></div>
                                                <div class="col-md-9 col-xs-9 box-text"><span id="timeSpent">0 m 24 s</span> </br>Time Taken</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-6 box-outer">
                                        <div class="info-box">
                                            <div class="row">
                                                <div class="col-md-3 col-xs-3 box-icon"><img src="images/ic_attempted.png" width="30"></div>
                                                <div class="col-md-9 col-xs-9 box-text"><span id="queOutOf">0 out of 75 </span></br>Attempted</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-6 box-outer">
                                        <div class="info-box">
                                            <div class="row">
                                                <div class="col-md-3 col-xs-3 box-icon"><!-- <i class="fa fa-clock-o" aria-hidden="true"></i> --><img src="images/ic_correct_answer.png" width="30"></div>
                                                <div class="col-md-9 col-xs-9 box-text"><span id="correctAns">0 </span></br>Correct Answer</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-6 box-outer">
                                        <div class="info-box">
                                            <div class="row">
                                                <div class="col-md-3 col-xs-3 box-icon"><!-- <i class="fa fa-clock-o" aria-hidden="true"></i> --><img src="images/ic_plus_marks.png" width="30"></div>
                                                <div class="col-md-9 col-xs-9 box-text"><span id="totPlusMarks">0 </span></br>Plus Mark</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-6 box-outer">
                                        <div class="info-box">
                                            <div class="row">
                                                <div class="col-md-3 col-xs-3 box-icon"><img src="images/ic_marks_obtained.png" width="30"></div>
                                                <div class="col-md-9 col-xs-9 box-text"><span id="marksObt">0 </span></br>Marks Obtained</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-6 box-outer">
                                        <div class="info-box">
                                            <div class="row">
                                                <div class="col-md-3 col-xs-3 box-icon"><img src="images/ic_negative_marks.png" width="30"></div>
                                                <div class="col-md-9 col-xs-9 box-text"><span id="negativeMark">0 </span></br>Negative Marks</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="col-xs-12" style="padding: 5px;">
                    <div class="panel panel-default" >
                        <div class="panel-body" style="padding-bottom: 0;max-height: 400px;">
                            <!-- <p id="status">Please Wait</p> -->
                        </div>

                        <div class="panel-body currentstatus">
                        </div>

                         
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body feeds" style="padding: 0px;">
                        </div>
                        <div class="panel-body text-center"> <!-- <a href="index.php?page=tests" class="btn btn-lg btn-warning" id="sbtnresult">Done</a> --><a href="javascript:void(0);" class="btn btn-lg btn-warning" id="sbtnresult">Done</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div style="height: 100px;"></div>
        <div class="sideline"></div>
        <div class="hidbtn text-center" style="position: fixed;width: 95%;bottom: 0px;left:0px;height: 0px;opacity:0;overflow: hidden;z-index: 999;">
            <button class="btn btn-info btnupdate">Tap to Update</button>
        </div>
        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="dueModel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
              ...
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="questionbox">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Question</h4>
                    </div>
                    <div class="modal-body" style="padding-bottom: 0;">
                                 (1/1000) in terms of exponents means
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade" tabindex="-1" role="dialog" id="tryagain" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                
                <h4 class="modal-title testhead">Exam Not Submitted</h4>
              </div>
              <div class="modal-body">

                <p style="font-size: 1.2em;">Something went wrong! Do not press back button your exam data will be lost. Instead click on Try Again.<!-- Do you really want to submit the Test? --> </p>
              </div>
              <div class="modal-footer">
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal" style="width:65px">No</button> -->
                <button id="tryagainbtn" type="button" class="btn btn-warning">Try Again</button>
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
            //var serverlink="../";
            var serverlink="";
            var jsonurl=serverlink+"json/";
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
                            var rObj1=JSON.parse(data);
                            var rObj = rObj1.data;
                            //console.log("rObj => ",rObj1.data);
                            //console.log('existMessage => ',rObj1.existMessage);
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

                                    output+='<tr><td><b>Total</b></td><td><b>'+totQuest+'</b></td><td><b>'+totUnattemptQue+'</b></td><td><b>'+totcorrectQue+'</b></td><td><b>'+totPartQue+'</b></td><td><b>'+totWrongQue+'</b></td><td>'+totPlusMark+'</td><td>'+totPartialMark+'</td><td>'+totMinusMark+'</td><td>'+totEarnedMark+'</td></tr></tbody></table></div><p class="text-center hidden-md hidden-lg"><img src="images/swipeleft.svg"/> Swipe Left Right <img src="images/swiperight.svg"/></p><h4 class="well" style="background: rgba(101, 78, 249, 0.1);border:none;border-radius: 10px;">Score <span class="pull-right" style="font-size: 1.5em;font-weight: 700;">'+totEarnedMark+'/'+totExamMark+'</span></h4>';

                                    
                    
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
                                    var tddata='<div style="padding: 15px;"><h4 style="font-family: Muli;font-style: normal;font-weight: 600;font-size: 14px;line-height: 18px;text-align: center;color: #21345F;text-align: left !important;"><img valign="middle" src="images/dscoresheet.svg"/> View Detailed Result <img class="pull-right" src="images/arrowdown.svg"/></h4></div><div style="padding: 0px;"><div class="table-responsive"><table class="table3">';
                                    var no_of_quest = 0;
                                    
                                    for(j=0;j<rlen;j++){
                        
                                        tddata+='<thead><tr><th colspan="5">'+rObj[j].subName+'</th></tr><tr><th>Q. No.</th><th>Status</th><th>Correct</th><th>Your</th></tr></thead><tbody>';
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
                                            tddata+='<tr style="color: '+txtclr+';"><td><button class="qbtnx btn btn-'+status+'" lid="'+aObj[k].question_id+'" amid="'+aObj[k].given_answer+'">'+(srno++)+'</td><td>'+ansstatus+'</td><td>'+cans+'</td><td>'+givenans+'</td></tr>';
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
                         var x=$(this).attr('lid');

                         var xx=$(this).attr('amid');
                        $.post(jsonurl+"view_question.php",
                        {
                            qid: x,
                            txtamid:xx
                        },
                        function(data, status){
                            $('#questionbox').modal('show');
                            $('#questionbox').find('.modal-body').html(data);
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
        </script>
<?= $this->include('components/footer-end.php'); ?>