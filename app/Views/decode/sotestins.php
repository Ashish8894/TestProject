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
                                    <a href="<?= site_url(); ?>practice/msteps/<?php echo $topicid; ?>/<?php echo $level; ?>" onclick="goBack();" class="back-btn">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i> 
                                        Back</a>
                                </h4>
                                <div class="row no-padding">
                                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12">
                                        <div class="panel panel-default common-mb pratice-box attendace-list-box" >
                                            <div class="x" >
                                                <div class="row">
                                                    <div class="col-xs-8 col-lg-9 col-sm-7 col-md-8 col-xl-9 col-7  align-self-center">
                                                        <div class="panel-body">
                                                            <h2 class="study-plan-name mb-0" id="ttitle"></h2>
                                                            <h4></h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-4 col-lg-3 col-sm-5 col-md-4 col-xl-3 col-5  align-self-center">
                                                        <div class="panel-body">
                                                            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 col-xl-12 col-12 no-padding text-right-desktop">
                                                                <a href="terminal.html" class="btn btn-block btn-warning startbtn">Start Now</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="col-md-12 col-sm-12 col-lg-6 col-xs-12 col-xl-6 col-12 quebtn mx-auto no-padding form-group mt-3">                
                                                        <a href="javascript:void" class="btn btn-info w-100 btn-lg">
                                                            <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                                        <span class="sr-only">Loading...</span> Please wait while <br/> Questions are being loaded...</a>
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
            </div>
        </div>
        <?= $this->include('components/footer.php'); ?>
        <script type="text/javascript">
            function goBack() {
              window.history.back();
            }
            $(document).ready(function(){
                $('#pgpractice').addClass('active');
                $('#mobPractice').addClass('active');
                
                let objQueObject = localStorage.getItem('oqdata');
                let oObj = JSON.parse(objQueObject);
                
                let x = oObj.length;
               
                let level = <?php echo $level; ?>;
                let step = <?php echo $stepid; ?>;
                let tid = <?php echo $topicid; ?>;
                
                let res = level;

                let topicObject = localStorage.getItem('topicdata');
                let tObj = JSON.parse(topicObject);
                let y = tObj.length;

                let testlist = ''; 
                let title = '';
                for(let i = 0;i < y;i++){
                    if(tid == tObj[i].TOPIC_ID){
                       
                        testlist = tObj[i].TOPIC_NAME+'<br/><small class="study-plan-name-questions">Lecture '+res+' - Step '+step+'</small>';
                        title = tObj[i].TOPIC_NAME+' | Lecture '+res+' - Step '+step;
                    }

                }   
                $('#ttitle').html(testlist);
                $('.ptitle').text(title);
                function getquestions(){
                    $.ajax({ 
                        type: "POST",
                        data: {tid, level, step, ['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                        dataType: 'json', 
                        //url: "<?= site_url(); ?>practice/objective_steps_questions",
                        url: "<?= site_url(); ?>practice/objective_steps_solved_questions",
                        success: function(data) {
                            if(data != "" || data != " "){
                                localStorage.setItem('questionstext', JSON.stringify(data))
                                let obcnt = data.length;
                                if(obcnt == 0){
                                    alert('There is a data error on this screen. Please contact Data Manager on 8806698282.');
                                    window.history.back();
                                    
                                }
                                $('.quebtn').hide();
                                $('.startbtn').show();
                            }else{
                                alert('Not able to load Questions from Server!!');
                            }
                        }
                    });
                    

                }
                
                /*$.ajaxSetup({ cache: false });
                if(localStorage.getItem("questionstext") === null) {
                    getquestions(testid);                                  
                }else{
                    getquestions(testid); 
                }   */  
                getquestions();              
               /* if(storage()){
                    $('.startbtn').attr('href','soterminal.html?'+var1);
                } */
                if(storage()){
                    $('.startbtn').attr('href','<?= site_url(); ?>practice/step_test/'+tid+'/'+level+'/'+step);
                }   
                
            });
        </script>
   <?= $this->include('components/footer-end.php'); ?>
