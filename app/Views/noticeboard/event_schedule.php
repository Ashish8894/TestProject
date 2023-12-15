<?= $this->include('components/header.php'); ?>
    <?= $this->include('components/header-end.php'); ?>
        <div class="container container-custom no-padding main-container">
            <div class="row">
                <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-4 col-12">
                    <?= $this->include('components/sidebar.php'); ?>
                </div>
                <div class="col-md-8 col-lg-9 col-xl-9 col-xxl-9 col-sm-8 col-12">
                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12 no-padding right-container">
                        <div class="panel panel-default rightpanel-box">
                            <div class="panel-body rightpanel-box1">
                                <h4 class="coming-soon-back-text">
                                    <a href="<?= base_url(); ?>noticeboard" class="back-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> 
                                    Back</a>
                                </h4>
                                <div class="row no-padding">                        
                                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 feeds">
                                        <?php  
                                        if(!empty($asset)){
                                            foreach($asset as $key => $val){?>
                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 no-padding" >
                                                    <div class="panel-body col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 common-mb pratice-box attendace-list-box">
                                                        <div class="row align-items-center">
                                                            <div class="col-xs-8 col-lg-9 col-sm-7 col-md-8 col-xl-9 col-7">
                                                                <h4 class="study-plan-name mb-0 ttitle"><?= $title[$key];?></h4>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-3 col-sm-5 col-md-4 col-xl-3 col-5 telegenic-img-align align-self-center">
                                                                <button class="pull-right btn btn-warning" onclick="window.location.href='<?= base_url(); ?>noticeboard/loaddata/<?=$val?>'">View</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } 
                                        }else{ ?>
                                            <div class="panel-body col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 common-mb attendace-list-box">
                                                <h3 class="study-plan-topic-not-allot mb-0">Data Not Available</h3>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->include('components/footer.php'); ?>
        <script type="text/javascript">
            $("#pgnotifications").addClass('active');
            $('#mobNotification').addClass('active');
             $( document ).ready(function() {
            $(document).ready(function(){

                
                /*** following code is to check other device login ***/
                /*** End ***/
                $('#pgnoticeboard').addClass('active');

                var cnt1=0;
                var cnt2=0;

                var var1 = 'refresh';
               
            });
            $('#test').click(function () {
                var id = $(this).attr(asset_space);
                var src = base_url()+'+asset_space/'+id;
                $("#mymodel").attr('src', src);
                return false;
            });

            function checkExamProcess(testid,ind){
                var testid = testid;
                var ind = ind;
                var userid = localStorage.icduserid;
                    $.ajax({ 
                        type: "POST",
                        data: {testid,ind,userid,['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                        dataType: 'json', 
                        url: "<?= site_url(); ?>tests/check_user_exam_status/"+testid+"/"+ind+"/"+userid+"",
                        success: function(data) {
                            var cuesdata = JSON.stringify(data);              
                            var checkObj=JSON.parse(cuesdata);
                            if(checkObj.status == 'success'){
                                window.location.href='<?= base_url()?>tests/instructions/'+ind;
                                /*localStorage.setItem('examTimeData', checkObj.examtime_row);*/
                            }else{
                                var errMsg = checkObj.msg;
                                if(errMsg == '1'){
                                    window.location.href='<?= base_url()?>tests/err_exam_submited';
                                }else if(errMsg == '2'){
                                    window.location.href='<?= base_url()?>tests/err_exam_inprocess';
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
            $('#finsbtn2').on('click', function(){
                $('#msgbox').modal('hide');
            });
        });
        </script>
 <?= $this->include('components/footer-end.php'); ?>
