<?= $this->include('components/header'); ?>
    
<?= $this->include('components/header-end'); ?>
<div class="container container-custom no-padding main-container">
    <div class="row">
        <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-4 col-12">
            <?= $this->include('components/sidebar.php'); ?>
        </div>
        <div class="col-md-8 col-lg-9 col-xl-9 col-xxl-9 col-sm-8 col-12">

            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12 no-padding right-container">
                <div class="panel panel-default rightpanel-box">
                    <div class="panel-body rightpanel-box1" >   
                        <h4 class="coming-soon-back-text">
                            <a href="<?= site_url(); ?>strong_box/dpplevel/<?php echo $examid; ?>/<?php echo $subjectid; ?>/<?php echo $topicid; ?>"  class="back-btn">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> 
                                Back</a>
                        </h4>
                        <div class="row no-padding">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <div class="panel panel-default common-mb pratice-box attendace-list-box" >
                                    <div class="row">
                                        <div class="col-xs-8 col-lg-9 col-sm-7 col-md-8 col-xl-9 col-7 align-self-center">
                                            <div class="panel-body">
                                                <h4 class="study-plan-name mb-0 " id="ttitle"></h4>
                                                <!-- <div class="col-md-4 col-md-offset-4">                
                                                    <a href="javascript:void" class="btn btn-info btn-block btn-lg quebtn"><i class="fa fa-spinner fa-pulse fa-fw"></i>
                                                        <span class="sr-only">Loading...</span> Please wait while <br/> Questions are being loaded...</a>
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-lg-3 col-sm-5 col-md-4 col-xl-3 col-5 align-self-center">
                                            <a href="terminal.html" class="btn btn-warning btn-block float-end startbtn">Start Now</a>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-lg-6 col-xs-12 col-xl-6 col-12 quebtn mx-auto no-padding form-group mt-3">                
                                        <a href="javascript:void" class="btn btn-info w-100 btn-lg">
                                            <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                        <span class="sr-only">Loading...</span> Please wait while <br> Questions are being loaded...</a>
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
        
        
        <?php echo $this->include('components/footer.php'); ?>
        <script type="text/javascript">
            //var serverlink="../";
            var serverlink="";
            var jsonurl=serverlink+"json/";
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
                //$('#pgsbexams').addClass('active');        
                $('#pgpractice').addClass('active');
                $('#mobPractice').addClass('active');        
                var var1 = <?php if(isset($_GET['tid'])){ echo $_GET['tid']; }else{ echo 1; } ?>;
                var retrievedObject4 = localStorage.getItem('sboqdata');
                var oObj = JSON.parse(retrievedObject4);
                
                x=oObj.length;
                //var level=oObj[var1].level;
                //var tid=oObj[var1].SB_TOPIC_ID;
                //var res = level;

                let subId = <?php echo $subjectid; ?>;
                let tid = <?php echo $topicid; ?>;
                //let j=var1;
                let eid = <?php echo $examid; ?>;

                
                var retrievedObject = localStorage.getItem('sbtopicdata');
                var tObj = JSON.parse(retrievedObject);]
                y=tObj.length;
                let topic = '';
                let exam = '';
                for(i=0;i<y;i++){
                    if(tid==tObj[i].SB_TOPIC_ID){
                       /* var testid=tObj[i].SB_TOPIC_ID;
                        //var testlist=tObj[i].SB_TOPIC_NAME+'<br/><small> '+level+'</small>';
                        var testlist=tObj[i].SB_TOPIC_NAME+'<br/>';
                        var eid=tObj[i].SB_EXAM_ID;
                        var str=tObj[i].SB_TOPIC_NAME;*/
                        topic = tObj[i].SB_TOPIC_NAME;
                    }

                }

                var retrievedObject2 = localStorage.getItem('sbexamdata');
                var sbObj = JSON.parse(retrievedObject2);
                for(ei=0;ei<sbObj.length;ei++){
                    if(sbObj[ei].SB_EXAM_ID==eid){
                        exam = sbObj[ei].SB_EXAM_NAME;
                    }
                }
                //$('.ptitle').text(title+' '+str+' '+level);
                $('.ptitle').text(exam+' '+topic);
                           
                $('#ttitle').html(topic+'<br/>');

               /* function getquestions(x){
                    $.post(jsonurl+"sb_questions.php",
                    {
                        txtuserid: localStorage.icduserid,
                        testidx:tid,
                        level:level
                    },
                    function(data, status){
                        
                        if(data!="" || data!=" "){
                            localStorage.setItem('questionstext', data);
                            var tObj = JSON.parse(data);
                            obcnt=tObj.length;
                           // alert(obcnt);
                            if(obcnt==0){
                                alert('There is a data error on this screen. Please contact Data Manager on 8806698282.');
                                $.post(jsonurl+"error_questions.php",
                                    {
                                        txtuserid: localStorage.icduserid,
                                        testidx:x,
                                        level:level,
                                        step:step
                                    },
                                    function(data, status){
                                        window.history.back();
                                    });

                            }
                            $('.quebtn').hide();
                            $('.startbtn').show();
                        }else{
                            alert('Not able to load Questions from Server!!');
                        }
                    });

                }*/

                function getquestions(){
                    $('#status').text('Fetching Lecture...');
                    
                    var topic_id = tid;
                    //var level = level;
                    var exam_id = eid;
                    $.ajax({ 
                        type: "POST",
                        data: {topic_id,exam_id,['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                        dataType: 'json', 
                        url: "<?= site_url(); ?>strong_box/sb_questions",
                        success: function(data) {
                            if(data!="" || data!=" "){
                                var ldata = JSON.stringify(data);
                                localStorage.setItem('questionstext', ldata);
                                var tObj = JSON.parse(ldata);
                                obcnt=tObj.length;
                          
                                if(obcnt==0){
                                    alert('There is a data error on this screen. Please contact Data Manager on 8806698282.');
                                    window.history.back();
                                    /*var userid = localStorage.icduserid;
                                    var testidx = tid;
                                    var level = level;
                                    var step = step;
                                    $.ajax({ 
                                        type: "POST",
                                        data: {userid,testidx,level,step['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                                        dataType: 'json', 
                                        url: "<?= site_url(); ?>strong_box/error_questions",
                                        success: function(data) {
                                    
                                            window.history.back();
                                        }
                                    });*/

                                }
                            $('.quebtn').hide();
                            $('.startbtn').show();
                        }else{
                            alert('Not able to load Questions from Server!!');
                        }
                        }
                    });
                }
                /*function submitresult(x){
                    var retrievedObject = localStorage.getItem('questionstext');
                    var testidx = "Duckburg";
                    $.ajax({ 
                        type: "POST",
                        data: {retrievedObject,testidx,['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                        dataType: 'json', 
                        url: "<?= site_url(); ?>strong_box/sb_final_result_submit",
                        success: function(data) {
                        $('.loading').hide();
                            if(data>0){
                                localStorage.removeItem('questionstext');
                               var userid = localStorage.icduserid;;
                                $.ajax({ 
                                    type: "POST",
                                    data: {userid,['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                                    dataType: 'json', 
                                    url: "<?= site_url(); ?>strong_box/sb_topic_result",
                                    success: function(data) {
                                        localStorage.setItem('sbtopicresdata', data);
                                        getquestions(testid);
                                     }
                                });
                            }else{
                                //alert("Something went wrong!!");
                                localStorage.removeItem('questionstext');
                            }
                        }
                    });

                }*/
                            
                /*$.ajaxSetup({ cache: false });
                if(localStorage.getItem("questionstext") === null) {
                    getquestions(testid);                                  
                }else{
                    getquestions(testid);  
                }  */
                getquestions();                
                if(storage()){
                    //$('.startbtn').attr('href',<?= base_url()?>'strong_box/sbterminal/'+var1);
                    $('.startbtn').attr('href','<?= site_url(); ?>strong_box/test/'+eid+'/'+tid);
                }  
            });
        </script>
    <?php echo $this->include('components/footer-end.php'); ?>
