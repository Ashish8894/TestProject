<?php echo $this->include('components/header.php'); ?>
        <style type="text/css">
            .dashload{
                display: none;
            }
            .dashpanel{
                display: none;
            }
        </style>
            <?php echo $this->include('components/header-end.php'); ?>
                <div class="container container-custom no-padding main-container">
                    <div class="row">
                        <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-4 col-12">
                            <?php echo $this->include('components/sidebar.php'); ?>
                        </div>
                        <div class="col-md-8 col-lg-9 col-xl-9 col-xxl-9 col-sm-8 col-12">
                            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12 no-padding right-container">
                                <div class="panel panel-default rightpanel-box">
                                    <div class="panel-body rightpanel-box1" >
                                        <input type="hidden" id="user_id" name="user_id" value="<?= $_SESSION['icaduserid']?>">
                                        <h4 class="coming-soon-back-text">
                                            <a href="<?= base_url(); ?>users/dashboard" class="back-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> 
                                                Back</a>
                                        </h4>
                                    
                                        
                                        <?php $id = 1; ?>
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 common-mb pratice-box attendace-list-box" onclick="window.location.href='<?= site_url();?>tests/tests'">
                                            <div class="row pract-main">
                                                <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-7 align-self-center">
                                                    <h4 class="practice-name">On Stream</h4>
                                                    <p class="practice-name-p">Online Tests</p>
                                                    <a class="view-more-practice-detail">View More <span><i class="fa fa-arrow-circle-right"></i></span></a>
                                                </div>
                                                <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-5 telegenic-img-align align-self-center">
                                                    <img src="<?=base_url()?>/assets/images/stream.svg" alt="" class="ml-3 align-self-center practice-image" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12 common-mb pratice-box attendace-list-box" onclick="window.location.href='<?= site_url(); ?>rewind'">
                                            <div class="row pract-main">
                                                <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-7 align-self-center">
                                                    <h4 class="practice-name">Rewind</h4>
                                                    <p class="practice-name-p">Create &amp; Practice<br> Your Own Tests</p>
                                                    <a class="view-more-practice-detail">View More <span><i class="fa fa-arrow-circle-right"></i></span></a>
                                                </div>
                                                <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-5 telegenic-img-align align-self-center">
                                                    <img src="<?=base_url()?>/assets/images/rewind.svg" alt="" class="ml-3 align-self-center practice-image" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12 common-mb pratice-box attendace-list-box" onclick="window.location.href='<?= site_url(); ?>tests/spark'">
                                            <div class="row pract-main">
                                                <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-7 align-self-center">
                                                    <h4 class="practice-name">Spark</h4>
                                                    <p class="practice-name-p">Online Test <br>Analysis</p>
                                                    <a class="view-more-practice-detail">View More <span><i class="fa fa-arrow-circle-right"></i></span></a>
                                                </div>
                                                <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-5 telegenic-img-align align-self-center">
                                                    <img src="<?=base_url()?>/assets/images/spark.svg" alt="" class="ml-3 align-self-center practice-image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          
        <?= $this->include('components/footer')?>
        <script type="text/javascript">
            $("#pgtest").addClass('active');
            $('#mobTest').addClass('active');

            $( document ).ready(function() {
                getsujects();
            });
       function storage(){
            if (typeof(Storage) !== "undefined") {
              //alert("Code for localStorage/sessionStorage.");
                return true;
            } else {
              //alert('Sorry! No Web Storage support..');
               return false;
            }
        }
        function getsujects(){
            $('#status').text('Fetching Contact...');
            var userid = $('#user_id').val();
            $.ajax({ 
                type: "POST",
                data: {userid,['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                dataType: 'json', 
                url: "<?= site_url(); ?>practice/list_subjects",
                success: function(data) {
                    var lsdata = JSON.stringify(data);
                    localStorage.setItem('subjectdata', lsdata); 
                    getfullsujects(userid);
                }
            });
        }
    
        function getfullsujects(){
            $('#status').text('Fetching Contact...');
            var userid = $('#user_id').val();
            $.ajax({ 
                type: "POST",
                data: {['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                dataType: 'json', 
                url: "<?= site_url(); ?>practice/list_full_subjects",
                success: function(data) {
                    var gfsdata = JSON.stringify(data);
                    localStorage.setItem('fullsubjectdata', gfsdata);
                    getQuestionReportReasons(userid);
                }
            });
        }
        
        function getQuestionReportReasons(){
            $('#status').text('Fetching Question Report Reasons...');
            var userid = $('#user_id').val();
            $.ajax({ 
                type: "POST",
                data: {['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                dataType: 'json', 
                url: "<?= site_url(); ?>practice/questionReport",
                success: function(data) {
                    var qrdata = JSON.stringify(data);
                    localStorage.setItem('reportreasondata', qrdata);
                    getLectures();
                }
            });
        }
        
        function getLectures(){
            $('#status').text('Fetching Lecture...');
            var userid = $('#user_id').val();
            $.ajax({ 
                type: "POST",
                data: {['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                dataType: 'json', 
                url: "<?= site_url(); ?>practice/getLecture",
                success: function(data) {
                    var ldata = JSON.stringify(data);
                    localStorage.setItem('lectureMstdata', ldata);
                    getSteps();
                }
            });
        }
        
        function getSteps(){
            $('#status').text('Fetching Steps...');
            var userid = $('#user_id').val();
            $.ajax({ 
                type: "POST",
                data: {['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                dataType: 'json', 
                url: "<?= site_url(); ?>practice/getSteps",
                success: function(data) {
                    var pdata = JSON.stringify(data);
                    localStorage.setItem('stepsdata', pdata);
                    $('.loading').hide();
                }
            });
        }
         
        function checksession(){
            $('.loading').hide();
            $('.dashpanel').show();
            $('.dashload').hide();
        }
        $(document).ready(function(){
            /*** following code is to check other device login ***/
            // $.post(jsonurl+"check_other_device.php",
            // {
                
            // },
            // function(data, status){
            //     var pdata = JSON.parse(data);
            //     if(pdata.msg != ''){
            //         window.location.href='index.php';
            //     }
            // });
            /*** End ***/
            $('.fbbtn').show();
            
            if(storage()){
                localStorage.icduserid=<?php echo $_SESSION['icaduserid']; ?>;
                if(localStorage.getItem("subjectdata") === null) {
                    $('.dashpanel').hide();
                    $('.dashload').show();
                    $('.loading').show();
                    getsujects(localStorage.icduserid);
                }else if(localStorage.getItem("fullsubjectdata") === null) {
                    getfullsujects(localStorage.icduserid);
                }else if(localStorage.getItem("stepsdata") === null) {
                    getSteps();
                }else if(localStorage.getItem("lectureMstdata") === null) {
                    getLectures();
                }else if(localStorage.getItem("reportreasondata") === null){
                    getQuestionReportReasons(localStorage.icduserid);
                }else{
                    $('.dashpanel').show();
                }
            }
        });
        
        </script>
<?= $this->include('components/footer-end.php'); ?>
