<?php echo $this->include('components/header.php'); ?>
<style type="text/css">
    .hinttext,.hintsolution,.hintvideo
    {
        display: none;
    }
</style>
<?php echo $this->include('components/header-end.php'); ?>
<div class="container container-custom no-padding main-container">
    <div class="row">
        <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-4 col-12">
            <?= $this->include('components/sidebar.php'); ?>
        </div>
        <div class="col-md-8 col-lg-9 col-xl-9 col-xxl-9 col-sm-8 col-12">

            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12 no-padding right-container">
                <h4 class="coming-soon-back-text">
                    
                    <a href="<?= site_url(); ?>practice/msteps/<?php echo $topic_id; ?>/<?php echo $level; ?>"  class="back-btn">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i> 
                        Back</a>
                </h4>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 col-xxl-12 col-12 no-padding orange-bg  orange-bg-common-pd top-data-container" style="height:auto;">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 col-xxl-12 col-12 no-padding tests-box avail-appeared-box">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 col-xxl-12 col-12" >
                                <p class="testtitle custom-testtitle">
                                    Topic: <span class="testhead"></span>
                                </p>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-3 col-xxl-4 col-xl-4 col-12 text-center align-self-center">
                                <img class="result-img" src="<?= base_url()?>images/result.svg" />
                            </div>
                            <div class="col-lg-8 col-sm-12 col-md-9 col-xxl-8 col-xl-8 col-12 align-self-center">
                                <div class="middle-container-data" style="background: none;border-radius: 0;">
                                    <div class="text-center">
                                        <div class="row">
                                            <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4 col-xxl-4 col-4">
                                                <div class="col-lg-12 col-xxl-12 stud-profile-box result-count-box mb-0">
                                                    <div class="text-center">
                                                        <h1 class="ipadview-h1" style="color: #00B085;" id="ccount">2</h1>
                                                        <h5 class="ipadview-h5">Correct</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4 col-xxl-4 col-4">
                                                <div class="col-lg-12 col-xxl-12 stud-profile-box result-count-box mb-0">
                                                    <div class="text-center">
                                                        <h1 class="ipadview-h1" style="color: #F17336;" id="wcount">2</h1>
                                                        <h5 class="ipadview-h5">Incorrect</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4 col-xxl-4 col-4">
                                                <div class="col-lg-12 col-xxl-12 stud-profile-box  result-count-box mb-0 ">
                                                    <div class="text-center">
                                                        <h1 class="ipadview-h1" style="color: #0099CB;" id="ucount">3</h1>
                                                        <h5 class="ipadview-h5">Unsolved</h5>
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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 col-xxl-12 col-12 no-padding orange-bg-common-pd middle-container-data ">
                    <?php 
                        if($from == 'test'){ ?>

                            <h4 class="answer-submit-box">Your Answers have been submitted Successfully!!</h4>
                            <?php
                        } ?>
                        <div class="" style="margin-top: 15px">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 col-xxl-12 col-12">
                                    <div class="panel-body col-lg-12 col-md-12 col-sm-12 col-xl-12 col-xxl-12 col-12 common-mb  qp" >
                                        <!-- <div class="panel-body" style="padding-bottom: 0">
                                            <h4 style="font-family: Muli;font-style: normal;font-weight: 600;font-size: 14px;line-height: 18px;color: #21345F;">&nbsp;Attempt : <span id="patt"></span></h4>
                                        </div> -->
                                        <div class="panel-body col-lg-12 col-md-12 col-sm-12 col-xl-12 col-xxl-12 col-12 no-padding mb-5">
                                            <div class="table-responsive">
                                                <table class="table3">
                                                    <thead>
                                                        <tr>
                                                            <th>Q. No.</th>
                                                            <th>Status</th>
                                                            <th>Correct</th>
                                                            <th>Your</th>
                                                            <th class="d-none">Cause</th><!--hidden-->
                                                            <th class="d-none">Remark</th><!--hidden-->
                                                        </tr>
                                                    </thead>
                                                    <tbody class="feeds">
                                                        <tr>
                                                            <td colspan="4">Loading</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- <div class="panel-body">
                                            <p class="text-center d-md-none d-lg-none">
                                                <img src="<?= base_url()?>images/swipeleft.svg"/> Swipe Left Right 
                                                <img src="<?= base_url()?>images/swiperight.svg"/></p>
                                        </div> -->
                                        <div class="panel-body" id="jsondata" style="padding-bottom: 0px;">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 col-xxl-12 col-12 text-center">
                                            <p class="mt-2 mb-4" style="color: #F17336;margin-bottom:0;">
                                            Click on Question Number to see Question details..</p>
                                            <button type="button" class="btn btn-lg btn-warning" id="sbtnresult">Done</button>
                                        </div>
                                    </div>
                                </div>
                            <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>      
    </div>
</div>

 <div class="modal fade practice-custom-modal" tabindex="-1" role="dialog" id="questionbox">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close modal-button-close" data-bs-dismiss="modal"></button>
            <div class="modal-header d-block" style="padding-bottom:0;border-bottom:none;">
                <h4 class="modal-title practice-custom-modal-title">Question no. - <span id="qboxid"></span></h4>
            </div>
            <div class="modal-body" style="padding-bottom: 0;">
                (1/1000) in terms of exponents means
            </div>
            <div class="modal-footer d-block">
                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 text-center">
                    <button type="button" class="btn btnmodal-custom-submit" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div> 

<!-- <div class="modal fade practice-custom-modal" tabindex="-1" role="dialog" id="questionbox">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close modal-button-close" data-bs-dismiss="modal"></button>
            <div class="modal-body">
                <h4 class="modal-title practice-custom-modal-title">Question <span id="qboxid"></span></h4>
                <p class="practice-text-heading"><strong> (1/1000)</strong> in terms of exponents means</p>
                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 text-center mt-4">
                    <button type="button" class="btn btnmodal-custom-submit" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div> -->


<!-- <div class="modal fade" tabindex="-1" role="dialog" id="confirmbox" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="images/blogging.svg"/>
                <h4 class="testhead"></h4>
                <p style="font-size: 1.2em;">Your Answers have been submitted Successfully!!<br><small>Click Ok</small></p>
            </div>
            <div style="padding:30px;" class="text-center">
                <a href="" class="btn btn-warning finsbtn">Ok</a>
            </div>
        </div>
    </div>
</div> -->


<div class="modal fade practice-custom-modal" tabindex="-1" role="dialog" id="confirmbox" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close modal-button-close" data-bs-dismiss="modal"></button>
            <div class="modal-body">
                <img src="<?= base_url(); ?>images/blogging.svg"/>
                <h4 class="modal-title practice-custom-modal-title testhead"></h4>
                <p>Your Answers have been submitted Successfully!!<br><small>Click Ok</small></p>
                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 text-center mt-4">
                    <a href="" class="btn btnmodal-custom-submit finsbtn">Ok</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php echo $this->include('components/footer.php'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        window.history.pushState(null, "", window.location.href);        
        window.onpopstate = function() {
            window.history.pushState(null, "", window.location.href);
        };
    });
</script>
<script type="text/javascript">
$('#mobPractice').addClass('active');
$('#pgpractice').addClass('active');
    //var serverlink="../";
    var serverlink="";
    var jsonurl=serverlink+"json/";
    var alphaArr = {'1':'A', '2':'B', '3':'C', '4':'D', '5':'E', '6':'F', '7':'G', '8':'H'};


    $(window).on('popstate', function(event) {
        alert("pop");
    });
    $(document).ready(function(){
         
        if(storage()){

            
            let retrievedObject4 = localStorage.getItem('oqdata');
            let oObj = JSON.parse(retrievedObject4);

            let x = oObj.length;
            let level = <?php echo $level; ?>;
            let step = <?php echo $stepId; ?>;
            let tid = <?php echo $topic_id; ?>;
            //var res = level.substr(2, 4);
            let res = level;

            let retrievedObject = localStorage.getItem('topicdata');
            let tpObj = JSON.parse(retrievedObject);
            let t = tpObj.length;
            var i = 0;
            for(j = 0;j < t;j++){
                if(tid == tpObj[j].TOPIC_ID){
                    i=j;
                }
            }
            
            let testid = tpObj[i].TOPIC_ID;
            let subid = tpObj[i].SUBJECT_ID;
           
            let title = tpObj[i].TOPIC_NAME+' | Lecture '+res+' - Step '+step;
            $('.testhead').text(title);

            /*var retrievedObject = localStorage.getItem('questionstext');
                //alert(retrievedObject);
            var tObj = JSON.parse(retrievedObject);*/
            let tObj = <?php echo json_encode($result); ?>;
            //console.log("ques tObj =>",tObj);
            let y = tObj.length;
            let testlist="";
            let cnt1=0;
            let cnt2=0;
            let cnt3=0;
            let testlist2="";

            let carray=['Question not read correctly','Question not understood properly','Incorrect writing of formula','Wrong substitution of values','Numerical Calculation mistake','Bubbling Mistake','Guess Work','Other(Specify)'];

            let aremark=['Conceptual Mistake','Silly (rush) Mistake','Risk'];

            let aremark2=['Not Understood','Lengthy','Confused','No time to read'];
            let txtclr='#D9534F';

            for (i = 0; i < y; i++) {
                
                var couse='<option value="">Cause</option>';
                /*for(rv = 0; rv < rlen; rv++){
                    if(rrObj[rv].QUESTION_REVIEW_REASON_ID == tObj[i].cause){
                        couse+='<option value="'+rrObj[rv].QUESTION_REVIEW_REASON_ID+'" selected>'+rrObj[rv].QUESTION_REVIEW_REASON_NAME+'</option>';
                    }else{
                        couse+='<option value="'+rrObj[rv].QUESTION_REVIEW_REASON_ID+'">'+rrObj[rv].QUESTION_REVIEW_REASON_NAME+'</option>';
                    }
                }*/
                /*$.each(carray, function( index, value ) {
                    if(value==tObj[i].cause){
                        couse+='<option value="'+value+'" selected>'+value+'</option>';
                    }else{
                        couse+='<option value="'+value+'">'+value+'</option>';
                    }
                });*/
                // alert(y);
                var ans='';
                var rset=[];
                var rset2='<option value="">Remark</option>';
                if(tObj[i].given_answer!=''){
                    var givenAns = tObj[i].given_answer;
                    //console.log("tObj[i] => ",tObj[i]);
                    if(tObj[i].QUESTIONS_TYPE_ID == 3){
                        if(Number(givenAns) >= Number(tObj[i].range1) && Number(givenAns) <= Number(tObj[i].range2)){
                            txtclr='#c7f136';
                            ans='Correct';
                            cnt3++;
                        }else{
                            ans='Wrong';
                            cnt1++;
                            rset=aremark;
                            txtclr='#D9534F';
                        }
                    }else{
                        if(tObj[i].answer!=givenAns){
                            ans='Wrong';
                            cnt1++;
                            rset=aremark;
                            txtclr='#D9534F';
                        }else{
                            
                            txtclr='#c7f136';
                            ans='Correct';
                            cnt3++;
                        }
                    }
                    /*if(tObj[i].answer!=givenAns){
                        ans='Wrong';
                        cnt1++;
                        rset=aremark;
                        txtclr='#D9534F';
                    }else{
                        if(tObj[i].attempt==1){
                            txtclr='#00b085';
                        }else if(tObj[i].attempt==2){
                            txtclr='#42c66b';
                        }else if(tObj[i].attempt==3){
                            txtclr='#8bde4e';
                        }else{
                            txtclr='#c7f136';
                        }

                        ans='Correct';
                        cnt3++;
                    }*/
                }else{
                    ans='Unsolved';
                    txtclr='#0099cb';
                    cnt2++;
                    rset=aremark2;
                }

                $.each(rset, function( index, value ) {
                    if(value==tObj[i].remark){
                        rset2+='<option value="'+value+'" selected>'+value+'</option>';
                    }else{
                        rset2+='<option value="'+value+'">'+value+'</option>';
                    }
                });

                if(tObj[i].QUESTIONS_TYPE_ID==3){
                    if(tObj[i].answer==''){
                        var ansrng=tObj[i].range1+" to "+tObj[i].range2;
                    }else{
                        //var ansrng=tObj[i].range1+" to "+tObj[i].range2+" OR "+tObj[i].answer;
                        var ansrng=tObj[i].range1+" to "+tObj[i].range2;
                    }
                    var givenAns = tObj[i].given_answer;
                    
                }else if(tObj[i].QUESTIONS_TYPE_ID==2){
                    var valArr = tObj[i].answer.split(":");

                    var strAns = '';
                    for(var k = 0; k<valArr.length; k++){
                        if(strAns == ''){
                            strAns += alphaArr[valArr[k]];
                        }else{
                            strAns += ':'+alphaArr[valArr[k]];
                        }
                    } 
                    var ansrng = strAns;
                    var givenValArr = tObj[i].given_answer.split(":");
                    var strgiven = '';
                    if(givenValArr.length > 0){
                        for(var l = 0; l < givenValArr.length; l++){
                            if(givenValArr[l] > 0){
                                if(strgiven == ''){
                                    strgiven += alphaArr[givenValArr[l]];
                                }else{
                                    strgiven += ':'+alphaArr[givenValArr[l]];
                                }
                            }
                        } 
                    }
                    var givenAns = strgiven;
                }else{
                    var ansrng = alphaArr[tObj[i].answer];
                    if(tObj[i].given_answer){
                        var givenAns = alphaArr[tObj[i].given_answer];
                    }else{
                        var givenAns = '';
                    }
                }
                if(ans=='Unsolved'){
                        var ansrng='';
                        var givenAns = '';
                }

                if(ans=='Correct'){
                    testlist+='<tr style="color:'+txtclr+';"><td><button class="qbtnx btn btn-xs btn-success  result-circle-btn" iid="'+i+'">'+(i+1)+'</button></td><td>'+ans+'</td><td>'+ansrng+'</td><td>'+givenAns+'</td><td width="20%" class="d-none"></td><td width="20%" class="d-none"></td></tr>';
                }else{
                    if(givenAns != ''){
                        var btnclr = 'btn-danger';
                    }else{
                        var btnclr = 'btn-default';
                    }
                    testlist+='<tr style="color:'+txtclr+';"><td><button class="result-circle-btn qbtnx btn btn-xs '+btnclr+'" iid="'+i+'">'+(i+1)+'</button></td><td>'+ans+'</td><td>'+ansrng+'</td><td>'+givenAns+'</td><td width="20%" class="d-none"><select style="width:80px;" class="cngcouse" iid="'+i+'"">'+couse+'</select></td><td width="20%" class="d-none"><select style="width:80px;" class="cngrem" iid="'+i+'"">'+rset2+'</select></td></tr>';
                }
            }
                    
            $('.feeds').html(testlist);                        
            $('#ccount').text(cnt3);
            $('#wcount').text(cnt1);
            $('#ucount').text(cnt2);    

            $('body').on('change', 'select.cngcouse', function() {
                var x=$(this).attr('iid');
                var couse=$(this).val();
                tObj[x].cause=couse;
                var finaldata=JSON.stringify(tObj);
                localStorage.setItem('questionstext', finaldata);
            });

            $('body').on('change', 'select.cngrem', function() {
                var x=$(this).attr('iid');
                var remark=$(this).val();
                tObj[x].remark=remark;
                var finaldata=JSON.stringify(tObj);
                localStorage.setItem('questionstext', finaldata);    
            });
            $('body').on('click', 'button.qbtnx', function() {
                var x=$(this).attr('iid');
                var qbxno=$(this).text();
                //console.log("tObj[x] => ",tObj[x]);
                $('#questionbox').modal('show');
                var qtext=tObj[x].question;
                if(tObj[x].given_answer != ''){
                    if(tObj[x].QUESTIONS_TYPE_ID != 3){
                        for(i = 1; i <= tObj[x].NUMBER_OF_OPTIONS; i++){
                            if(i == 1){
                                var optvar = tObj[x].option1;
                            }
                            if(i == 2){
                                var optvar = tObj[x].option2;
                            }
                            if(i == 3){
                                var optvar = tObj[x].option3;
                            }
                            if(i == 4){
                                var optvar = tObj[x].option4;
                            }
                            if(i == 5){
                                var optvar = tObj[x].option5;
                            }
                            if(i == 6){
                                var optvar = tObj[x].option6;
                            }
                            if(i == 7){
                                var optvar = tObj[x].option7;
                            }
                            if(i == 8){
                                var optvar = tObj[x].option8;
                            }

                            if(tObj[x].QUESTIONS_TYPE_ID == 1){
                                if(tObj[x].CORRECT_ANSWER_OPTION == i){
                                    qtext += '<span style="color:#00b085;"><br/>'+alphaArr[i]+')'+optvar+'</span>';
                                }else{
                                    qtext += '<br/>'+alphaArr[i]+')'+optvar;
                                }
                            }else{
                                var coptionArr = tObj[x].CORRECT_ANSWER_MULTIPLE.split(":");
                                var result = coptionArr.map(Number);
                                if(result.includes(i)){
                                    qtext += '<span style="color:#00b085;"><br/>'+alphaArr[i]+')'+optvar+'</span>';
                                }else{
                                    qtext += '<br/>'+alphaArr[i]+')'+optvar;
                                }
                            }
                        }
                    }else{
                        qtext += '<span style="color:#00b085;">'+tObj[x].range1+' - '+tObj[x].range2+'</span>';
                    }
                }else{
                    if(tObj[x].QUESTIONS_TYPE_ID != 3){

                        for(i = 1; i <= tObj[x].NUMBER_OF_OPTIONS; i++){
                            if(i == 1){
                                var optvar = tObj[x].option1;
                            }
                            if(i == 2){
                                var optvar = tObj[x].option2;
                            }
                            if(i == 3){
                                var optvar = tObj[x].option3;
                            }
                            if(i == 4){
                                var optvar = tObj[x].option4;
                            }
                            if(i == 5){
                                var optvar = tObj[x].option5;
                            }
                            if(i == 6){
                                var optvar = tObj[x].option6;
                            }
                            if(i == 7){
                                var optvar = tObj[x].option7;
                            }
                            if(i == 8){
                                var optvar = tObj[x].option8;
                            }
                            qtext += '<br/>'+alphaArr[i]+')'+optvar;
                        }
                    }
                }
                
                var solutiontext='';
                qtext+='<div class="text-center" style="padding:15px;">';
                if(tObj[x].HINT && tObj[x].HINT!=''){
                    qtext+='<button class="btn btn-success btn-xs btn-hint"><span class="fa fa-lightbulb-o "> <span> Hint</button>';
                    solutiontext+='<div class="hinttext"><h4>Hint</h4>'+tObj[x].HINT+'</div>';
                }
                if(tObj[x].SOLUTION && tObj[x].SOLUTION!=''){
                    qtext+=' <button class="btn btn-warning btn-xs btn-solution"><span class="fa fa-edit"> <span> Solution</button>';
                    solutiontext+='<div class="hintsolution"><h4>Solution</h4>'+tObj[x].SOLUTION+'</div>';
                }
                /*if(tObj[x].video_url && tObj[x].video_url!=''){
                    qtext+=' <button class="btn btn-danger btn-xs btn-video" style="margin:0px;margin-left:10px;margin-right:10px;"><span class="fa fa-play"><span> Video</button>';
                    solutiontext+='<div class="hintvideo"><h4>Videos</h4><div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'+tObj[x].video_url+'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div></div>';
                }*/
                qtext+='</div>'+solutiontext;

                $('#questionbox').find('.modal-body').html(qtext);
                $('#qboxid').text(qbxno);
            });
            $('#questionbox').on('hidden.bs.modal', function (e) {
                $('#questionbox').find('.modal-body').html('qtext');
            })
            $('body').on('click', 'button.btn-hint', function() {
                $('.hinttext').slideToggle();
            });
            $('body').on('click', 'button.btn-solution', function() {
                $('.hintsolution').slideToggle();
            });
            $('body').on('click', 'button.btn-video', function() {
                $('.hintvideo').slideToggle();
            });

            $('#sbtnresult').click(function(){
                localStorage.removeItem('questionstext');
                        window.location.href='<?= site_url(); ?>practice/msteps/'+tid+'/'+level;
            })                       
        }  
    });
</script>
<?php echo $this->include('components/footer-end.php'); ?>
