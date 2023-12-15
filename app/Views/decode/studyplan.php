<?php echo $this->include('components/header.php'); ?>
<?php echo $this->include('components/header-end.php'); ?>

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
                            <a href="<?= base_url() ?>practice" class="back-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> 
                                Back</a>
                        </h4>
                        <div class="row no-padding" id="perform-tab" style="padding-top:0;">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs mlist" role="tablist">
                                    <li role="presentation" class="nav-item">
                                        <a class="nav-link active" href="#">Loading...</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 common-mb  feeds">
                                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 no-padding" >
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 no-padding">
                                        Preparing Decode <span id="status"></span>
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
            $('#pgpractice').addClass('active');
            $('#mobPractice').addClass('active');
            
            // var enaCon = '<?//php echo ENABLE_CONSOLE; ?>';
           // localStorage.setItem('consEna',enaCon);
            /*** following function is to get topic related data ***/
            function gettopics(){
                $('#status').text('Topics...');
                
                $.ajax({ 
                    type: "POST",
                    data: {['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                    dataType: 'json', 
                    url: "<?= site_url(); ?>practice/list_topic",
                    success: function(data) {
                        var pdata = JSON.stringify(data);
                        if(pdata.error){
                            // window.location.href='';
                        }else{
                            localStorage.setItem('topicdata', pdata);
                            scount();
                            //gettopicresults();
                        }
                    }
                });
            }
            /*** End ***/
            /*** This function is for count subjective question ****/
            function scount(){
                $('#status').text('Subjective Questions ...');
            
                $.ajax({ 
                    type: "POST",
                    data: {['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                    dataType: 'json', 
                    url: "<?= site_url(); ?>practice/count_subjective",
                    success: function(data) {
                        var sqdata = JSON.stringify(data);
                        localStorage.setItem('sqdata', sqdata);
                        ocount();
                    }
                });
            }
            /*** End ***/
            /*** This function is for count Objective question ****/
            function ocount(){
                $('#status').text('Objective Questions ...');
                
                $.ajax({ 
                    type: "POST",
                    data: {['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                    dataType: 'json', 
                    url: "<?= site_url(); ?>practice/count_objective",
                    success: function(data) {
                        var oqdata = JSON.stringify(data);
                        localStorage.setItem('oqdata', oqdata);
                        gettopicresults();
                    }
                });
            }
            /*** End ***/

            function gettopicresults(){
                $('#status').text('Finalising...');
                //var userid = $('#user_id').val();
                $.ajax({ 
                    type: "POST",
                    data: {['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                    dataType: 'json', 
                    url: "<?= site_url(); ?>practice/gettopicresult",
                    success: function(data) {
                        var gtrdata = JSON.stringify(data);
                        localStorage.setItem('topicresdata', gtrdata);
                        loaddata();
                    }
                });
            }
            function loaddata(){
                let subjectObject = localStorage.getItem('subjectdata');
                let subObj = JSON.parse(subjectObject);
                let slen = subObj.length;
                let subid = '<?php echo $subid; ?>';
                let sublist = "";
                for(j = 0; j < slen; j++) {
                    let subAct = '';  
                    if(subObj[j].SUBJECT_ID == subid){
                        subAct = 'active';
                    }  
                    sublist += '<li role="presentation" class="nav-item"><a class="nav-link '+subAct+'" href="<?= base_url()?>practice/studyplan/'+subObj[j].SUBJECT_ID+'">'+subObj[j].SUBJECT_NAME+'</a></li>';

                }
                $('.mlist').html(sublist);
                
                let topicObject = localStorage.getItem('topicdata');
                let tObj = JSON.parse(topicObject);

                let y = tObj.length;

                let topiresObject = localStorage.getItem('topicresdata');
                let rObj = JSON.parse(topiresObject);
                let x = rObj.length;
                
                let testlist2 = "";
                var tno=0;
                for (j = 0; j < y; j++) {
                    var tcount=0;
                    var scount=0;  
                    var ccount=0;
                    var wcount=0;
                    for(i=0;i<x; i++){
                        
                        if(rObj[i].TOPIC_ID == tObj[j].TOPIC_ID){

                            if(rObj[i].ques_status == 'C'){
                                scount++;
                            }else if(rObj[i].ques_status == 'W'){
                                wcount++;
                            }else{
                                ccount++;
                            }
                            tcount++;
                        }
                    }
                    var succesCnt = scount;
                    var wrongCnt = wcount;
                    var remain = tObj[j].tqnos - wrongCnt - succesCnt;
                    var total = tObj[j].tqnos;
                    var unsolve = total - wrongCnt - succesCnt;
                    
                    var pers = Math.round(((total - remain)/total)*100);
                    
                    if(Number.isNaN(pers))
                        pers = 0;
                    
                    var pbar = '<svg viewBox="0 0 36 36" class="circular-chart orange"> <defs> <clipPath id="myCircle"> <path class="circle-bg" d="M18 5.0845 a 10.9155 10.9155 0 0 1 0 25.831 a 10.9155 10.9155 0 0 1 0 -25.831"/> </clipPath> </defs> <image width="40" height="32" xlink:href="<?= base_url()?>images/book.svg" clip-path="url(#myCircle)"/> <path class="circle" stroke-dasharray="'+pers+', 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/> </svg>';

                    
                    var digits = '<div><span class="badge bg-success">'+succesCnt+' <span class="fa-solid  fa-check"></span></span> <span class="badge bg-danger">'+wrongCnt+' <span class="fa-solid fa-times"></span></span> <span class="badge bg-warning">'+unsolve+' Unsolved</span></div>';

                    if(subid==tObj[j].SUBJECT_ID){ 
                        
                        if(tObj[j].tqnos>0 && tObj[j].allocation_status == 'ENABLE'){
                            var lock = '<img src="<?= base_url();?>assets/images/unlock.svg" style="position:relative;left:10px;bottom:5px;"/>';
                           var pclick = ' onclick="window.location.href=\'<?= base_url();?>practice/lecture/'+tObj[j].TOPIC_ID+'\'"';
                        }else{
                            var lock='<img src="<?= base_url();?>assets/images/lock.svg" style="position:relative;left:10px;bottom:5px;"/>';
                            var pclick='';
                        }
                        testlist2+='<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 common-mb border-orange-box attendace-list-box" '+pclick+'><div class="panel-body"><div class="row"><div class="col-xs-9 col-lg-9 col-sm-9 col-md-9 col-xl-9 col-9"><div><h4 class="study-plan-name">'+tObj[j].TOPIC_NAME+lock+'<br/><small class="study-plan-name-questions">'+tObj[j].tqnos+' Questions</small><br/><small class="study-plan-name-questions">'+tObj[j].tqnoss+' Subjective Questions</small></h4>'+digits+'</div></div><div class="col-xs-3 col-lg-3 col-sm-3 col-md-3 col-xl-3 col-3 align-self-center telegenic-img-align ">';
                      
                        if(tObj[j].file == '' || tObj[j].file == null){
                            // var lectCount = tObj[j].LECTURE_COUNT;
                            var lectCountArr = tObj[j].lecture.split(", ");
                            var lectCount = lectCountArr.length;
                            testlist2 += '<a class="btn btn-link btn-block" href="javascript:void(0)" style="margin-bottom:2px;padding:0 !important;cursor: not-allowed !important;">'+pbar+'</a><small style="font-style: normal;font-weight: 600;font-size: 12px;text-align: center;color: #F17336;">'+lectCount+'</small>';

                        }else{
                            //var lectCount = tObj[j].LECTURE_COUNT;
                            var lectCountArr = tObj[j].lecture.split(", ");
                            var lectCount = lectCountArr.length;
                            testlist2 += '<a class="btn btn-link btn-block" href="https://admin.digitalicad.com/index_topic_pdf/'+tObj[j].file+'" style="margin-bottom:2px;padding:0 !important;" target="_blank">'+pbar+'</a><small font-style: normal;font-weight: 600;font-size: 12px;text-align: center;color: #F17336;">'+lectCount+'</small>';

                        }
                    
                      testlist2 += '</div></div></div></div>';
                      tno++;
                    }
                    
                }
                if(tno > 0){
                    $('.feeds').html(testlist2);
                }else{

                    testlist2 = '<div class=""><div class="study-plan-topic-not-allot">Topic not alloted for this subject.</div></div>';
                    $('.feeds').html(testlist2);
                }
                 $('.loading').hide();
            }

            $(document).ready(function(){
               
                //$('#pgstudyplan').addClass('active');
                
                localStorage.practicerd='studyplan';     
                //window.location.search.substr(1);
                // $('.mlist').find('li:first').css("border-color","#F17336");
                /*** following code commented by Devendra ***/
                if(storage()){
                    if(localStorage.getItem("topicdata") === null) {
                        $('.loading').show();
                        gettopics();
                    }else if(localStorage.getItem("sqdata") === null) {
                        scount();
                    }else if(localStorage.getItem("oqdata") === null) {
                        ocount();
                    }else if(localStorage.getItem("topicresdata") === null) {
                        gettopicresults();
                    }else{
                        loaddata();
                    }
                }
                /*** End***/

                $('.feeds').on('click','.stepqna',function(e){
                    e.preventDefault();
                    var link=$(this).attr('href');
                    window.location.href=link;
                });
            });
        </script>
<?php echo $this->include('components/footer-end.php'); ?>

