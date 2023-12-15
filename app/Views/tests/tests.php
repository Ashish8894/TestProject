<?= $this->include('components/header.php'); ?>
        <style type="text/css">
           .qtybtn{
                display: none;
            }
            .shadow .well:hover{
                transition: all 0.4s;
                box-shadow: 0px 0px 30px #666;
            }
            .loop .item img{
                background:url('images/sponser/loading.jpg');
            }
            .loop2 .item img{
                background:url('images/achievers/shrm.jpg');
            }
              .bottom-left{
                position: absolute;bottom: 0px; left: 0px;background: linear-gradient(to bottom,rgba(41,53,65,0) 0,rgba(41,53,65,.8) 50%,#293541 100%);color: #fff;width: 100%;
            }
            .imgbox .bottom-left div{                        
                transition: padding 0.4s;
                padding: 15px;
            }
            .imgbox:hover .bottom-left div{
                transition: padding 0.4s;
                padding-bottom: 50px;
            }
             .form-control,.form-control:hover,.form-control:active{
                border: none;
                border-radius: 0 !important;
                border-bottom: 2px solid #F17336;
                outline:none;
                box-shadow: none;
            }
            .backimg{
                background-color: #F9AB5A;
                background: url('images/Mask Group.png');
                border-bottom-left-radius: 20px;
                border-bottom-right-radius: 20px;
            }
            .backimg h1{
                font-family: Muli;
                font-style: normal;
                font-weight: bold;
                font-size: 26px;
                line-height: 33px;
                color: #21345F;
            }
            .backimg h5{
                font-family: Muli;
                font-style: normal;
                font-weight: 600;
                font-size: 14px;
                line-height: 18px;
                color: #21345F;
            }
        </style>
        <?= $this->include('components/header-end.php'); ?>
        <div class="container container-custom no-padding main-container" >
            <div class="row">
                <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-4 col-12">
                    <?= $this->include('components/sidebar.php'); ?>
                </div>
                <?php //print_r($pagetitle);die;?>
                <div class="col-md-8 col-lg-9 col-xl-9 col-xxl-9 col-sm-8 col-12">
                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12 no-padding right-container">
                        <!-- <h4><a href="<?= base_url();?>index.php?page=test" class="back-btn">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                        </h4>
                        <div class="backimg" style="padding: 15px;">
                            <div class="row" style="margin-left: -5px;margin-right: -5px;">                                
                                <div class="col-md-3 col-xs-4 col-md-offset-2 col-xs-offset-1" style="padding: 5px;">
                                    <div class="panel panel-default">
                                        <div class="panel-body text-center">
                                            <h1 id="atest">0</h1>
                                            <h5>Available<br/><small> </small></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-md-offset-2 col-xs-4 col-xs-offset-1" style="padding: 5px;">
                                    <div class="panel panel-default">
                                        <div class="panel-body text-center">
                                            <h1 id="ctest">0</h1>
                                            <h5>Appeared<br/><small> </small> </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12 no-padding orange-bg orange-bg-profile orange-bg-common-pd top-data-container" style="height:auto;">
                            <div class="coming-soon-back-text">
                                <h4><a style="color:#ffffff;" href="<?= base_url(); ?>users/dashboard" class="coming-soon-back-text back-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a></h4>
                            </div>
                            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12 no-padding orange-bg-common-pd middle-container-data" style="background:transparent;padding:0;">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12 no-padding avail-appeared-box">
                                    <div class="row">
                                        <div class="col-lg-3 col-xl-3 col-xxl-3 col-md-2"></div>
                                        <div class="col-lg-3 col-xl-3 col-xxl-3  col-md-4 col-sm-6  col-6">
                                            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12  stud-profile-box  mb-0" style="margin-top:0;">
                                                <div class="">
                                                    <div class="text-center">
                                                        <h1 class="" id="atest">0</h1>
                                                        <h5>Available<br/><small> </small></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-xl-3 col-xxl-3  col-md-4 col-sm-6  col-6">
                                            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 stud-profile-box mb-0" style="margin-top:0;">
                                                <div class="">
                                                    <div class="text-center">
                                                        <h1 id="ctest">0</h1>
                                                        <h5>Appeared<br/><small> </small> </h5>
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
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12">
                                    <h4 class="testhead">On Stream: Tests</h4>
                                </div>
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 feeds">
                                    <div class="panel panel-default common-mb pratice-box attendace-list-box" >
                                        <div class="panel-body">
                                            Not Available
                                        </div>
                                    </div>
                                </div>
                                <div class="jsondata">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="sideline"></div>
        <div class="hidbtn text-center" style="position: fixed;width: 95%;bottom: 0px;left:0px;height: 0px;opacity:0;overflow: hidden;z-index: 999;">
            <button class="btn btn-info btnupdate">Tap to Update</button>
        </div> -->
        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="dueModel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  ...
                </div>
            </div>
        </div>
        <div class="modal fade practice-custom-modal " tabindex="-1" role="dialog" id="msgbox" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close modal-button-close" data-bs-dismiss="modal"></button>
                <div class="modal-header d-block" style="padding-bottom:0;border-bottom:none;">
                    <h4 class="modal-title practice-custom-modal-title" id="msg-head">Alert!</h4>
                </div>
                <div class="modal-body">
                    <p class="practice-text-heading" id="msg-text">Time Out!!! Your answers have been saved successfully!</p>
                </div>
                <div class="modal-footer d-block">
                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 text-center">
                        <button id="finsbtn2" type="button" class="btn btnmodal-custom-submit">OK</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <?= $this->include('components/footer.php');?>

        <script type="text/javascript">
            $("#pgtest").addClass('active');
            $('#mobTest').addClass('active');
            $(document).ready(function(){ 
                var cnt1=0;
                var cnt2=0;

                var var1 = 'refresh';
               // alert(var1);

               if(storage()){
                   $('.loading').show();
                    $.ajax({ 
                        type: "POST",
                        data: {['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                        dataType: 'json', 
                        url: "<?= site_url(); ?>tests/list_full_test",
                        success: function(data) {
                        $('.loading').hide();
                        var ftddata = JSON.stringify(data);
                        localStorage.setItem('fulltestdata', ftddata);
                        
                        var retrievedObject = localStorage.getItem('fulltestdata');
                        var tObj = JSON.parse(retrievedObject);
                        //console.log("tObj => ",tObj);
                        y=tObj.length;
                        if(y == 0){
                            window.location.href='<?= base_url()?>/tests/err_onstream';
                        }else{
                            var testlist="";
                            for (i = 0; i < y; i++) {
                                var phase = '';
                                if(tObj[i].EXAM_PHASE_NAME){
                                    phase = '( '+tObj[i].EXAM_PHASE_NAME+' )';
                                }
                                testlist+='<div class="panel panel-default common-mb pratice-box attendace-list-box"><div class="panel-body"><div class="row"><div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-7 align-self-center"><h4 class="study-plan-name mb-0 ttitle">'+tObj[i].EXAM_NAME+' '+phase+'<br><small class="study-plan-name-questions">'+tObj[i].TOTAL_MARKS+' marks | '+tObj[i].EXAM_DURATION+' min</small></h4></div><div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-5 telegenic-img-align align-self-center">';
                                if(tObj[i].examstatus=='completed'){
                                    //following code comment at the time of remove review reason
                                    /*if(tObj[i].review_status=='NO'){
                                        testlist+='<a href="index.php?page=treview&tid='+i+'" class="btn btn-success btn-block">Result & Review</a>';
                                    }else{
                                        testlist+='<a href="index.php?page=viewresult&tid='+i+'&ttid='+tObj[i].EXAM_ID+'" class="btn btn-success btn-block">Result</a>';
                                    }index.php?page=viewresult&tid='+i+'&ttid='+tObj[i].EXAM_ID+*/
                                    testlist+='<a href="<?= base_url()?>tests/viewresult/'+i+'/'+tObj[i].EXAM_ID+'" class="btn btn-success btn-block">Result</a>';
                                    //testlist+='<a href="javascript:void();" class="btn btn-success">Appeared</a>';
                                    cnt1++;
                                }else{                                    
                                    //testlist+='<a href="index.php?page=instructions&tid='+i+'" class="btn btn-warning btn-block">Start</a>';
                                    testlist+='<a href="javascript:void(0);" onclick="checkExamProcess('+tObj[i].EXAM_ID+')" class="btn btn-warning btn-block">Start</a>';
                                    cnt2++;
                                }
                                testlist+='</div></div></div></div>';
                            } 
                            // alert(testlist);
                            $('.feeds').html(testlist);

                            $('#atest').text(cnt2);
                            $('#ctest').text(cnt1);
                        }
                        
                        }
                    });
                }
            });
            function checkExamProcess(testid){
                if(testid){
                    $.ajax({ 
                        type: "POST",
                        data: {testid,['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                        dataType: 'json', 
                        url: "<?= site_url(); ?>tests/check_user_exam_status",
                        success: function(data) {
                            var cuesdata = JSON.stringify(data);              
                            var checkObj=JSON.parse(cuesdata);
                            if(checkObj.status == 'success'){
                                window.location.href='<?= site_url()?>tests/instruction/'+testid;
                                /*localStorage.setItem('examTimeData', checkObj.examtime_row);*/
                            }else{
                                var errMsg = checkObj.msg;
                                if(errMsg == '1'){
                                    window.location.href='<?= site_url()?>tests/err_exam_submited';
                                }else if(errMsg == '2'){
                                    window.location.href='<?= site_url()?>tests/err_exam_inprocess';
                                }else if(errMsg == '3'){
                                    var err_msg = checkObj.err_msg;
                                    //alert(err_msg);
                                    //$('#msg-head').text('Exam Not Started');
                                    $('#msg-text').text(err_msg);
                                    $('#msgbox').modal('show');
                                    //window.location.href='index.php?page=err-exam-not-started';
                                }else{
                                    var err_msg = checkObj.err_msg;

                                    //$('#msg-head').text('Exam Expired');
                                    $('#msg-text').text(err_msg);
                                    $('#msgbox').modal('show');
                                    //alert(err_msg);
                                    //window.location.href='index.php?page=err-exam-expired';
                                }
                            }
                        }
                    });
                }
            }
            $('#finsbtn2').on('click', function(){
                $('#msgbox').modal('hide');
            });
        </script>
    <?= $this->include('components/footer-end.php');?>
