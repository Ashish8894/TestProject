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
                                    <div class="panel-body rightpanel-box1" >
                                        <input type="hidden" id="user_id" name="user_id" value="<?= $_SESSION['icaduserid']?>">
                                        <h4 class="coming-soon-back-text">
                                            <a href="<?= base_url(); ?>users/dashboard" class="back-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> 
                                                Back</a>
                                        </h4>
                                    
                                        <?php $id = 0 ?>
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 common-mb pratice-box attendace-list-box" onclick="window.location.href='<?= base_url();?>noticeboard/weekly_schedule'">
                                            <div class="row pract-main">
                                                <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-7 align-self-center">
                                                    <h4 class="practice-name">Weekly Schedule</h4>
                                                    <!-- <p class="practice-name-p">Daily Specific<br/> Solving Material</p>
                                                    <a class="view-more-practice-detail">View More <span><i class="fa fa-arrow-circle-right"></i></span></a> -->
                                                </div>
                                                <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-5 telegenic-img-align align-self-center">
                                                    <img src="<?=base_url()?>/assets/images/weekly_schedule.svg" alt="" class="ml-3 align-self-center practice-image" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12 common-mb pratice-box attendace-list-box" onclick="window.location.href='<?= base_url(); ?>noticeboard/test_schedule'">
                                            <div class="row pract-main">
                                                <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-7 align-self-center">
                                                    <h4 class="practice-name">Test Schedule</h4>
                                                    <!-- <p class="practice-name-p">Question Bank <br/>For Specialised Exams</p>
                                                    <a class="view-more-practice-detail">View More <span><i class="fa fa-arrow-circle-right"></i></span></a> -->
                                                </div>
                                                <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-5 telegenic-img-align align-self-center">
                                                    <img src="<?=base_url()?>/assets/images/test_schedule.svg" alt="" class="ml-3 align-self-center practice-image" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12 common-mb pratice-box attendace-list-box" onclick="window.location.href='<?= base_url(); ?>noticeboard/test_syllabus'">
                                            <div class="row pract-main">
                                                <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-7 align-self-center">
                                                    <h4 class="practice-name">Test Syllabus</h4>
                                                    <!-- <p class="practice-name-p">Solving Class <br/>Records</p>
                                                    <a class="view-more-practice-detail">View More <span><i class="fa fa-arrow-circle-right"></i></span></a> -->
                                                </div>
                                                <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-5 telegenic-img-align align-self-center">
                                                    <img src="<?=base_url()?>/assets/images/test_syllabus.svg" alt="" class="ml-3 align-self-center practice-image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12 common-mb pratice-box attendace-list-box" onclick="window.location.href='<?= base_url(); ?>noticeboard/event_schedule'">
                                            <div class="row pract-main">
                                                <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-7 align-self-center">
                                                    <h4 class="practice-name">Event Schedule</h4>
                                                    <!-- <p class="practice-name-p">Solving Class <br/>Records</p>
                                                    <a class="view-more-practice-detail">View More <span><i class="fa fa-arrow-circle-right"></i></span></a> -->
                                                </div>
                                                <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-5 telegenic-img-align align-self-center">
                                                    <img src="<?=base_url()?>/assets/images/event_schedule.svg" alt="" class="ml-3 align-self-center practice-image">
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
            $("#pgnotifications").addClass('active');
            $('#mobNotification').addClass('active');
        function storage(){
            if (typeof(Storage) !== "undefined") {
                return true;
            } else {
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
        function getfullsujects(userid){
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
        
        function getQuestionReportReasons(userid){
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
                    getfulltests(userid);
                }
            });
        }

        function getfulltests(userid){
            var userid = $('#user_id').val();
                $.ajax({ 
                    type: "POST",
                    data: {userid,['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                    dataType: 'json', 
                    url: "<?= site_url(); ?>tests/list_full_test",
                    success: function(data) {
                    $('.loading').hide();
                    var ftddata = JSON.stringify(data);
                    localStorage.setItem('fulltestdata', ftddata);
                    checksession();
                }
            });
        }
        function checksession(){
            $('.loading').hide();
            $('.dashpanel').show();
           /* $('.dashload').hide();*/
        }
        $(document).ready(function(){
            /*** following code is to check other device login ***/
            /*** End ***/
            $('.fbbtn').show();
            $('#pgnoticeboard').addClass('active');
            if(storage()){
                localStorage.icduserid=<?php echo $_SESSION['icaduserid']; ?>;
                if(localStorage.getItem("subjectdata") === null) {
                    $('.dashpanel').hide();
                    /*$('.dashload').show();*/
                    $('.loading').show();
                    getsujects();
                }else if(localStorage.getItem("fullsubjectdata") === null) {
                    getfullsujects();
                }else if(localStorage.getItem("fulltestdata") === null) {
                    getfulltests();
                }else if(localStorage.getItem("reportreasondata") === null){
                    getQuestionReportReasons();
                }else{
                    $('.dashpanel').show();
                }
            }
        });
        
        </script>
        <?= $this->include('components/footer-end.php'); ?> 
