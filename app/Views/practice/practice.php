<?php echo $this->include('components/header.php'); ?>
        <!-- <style type="text/css">
            .dashload{
                display: none;
            }
            .dashpanel{
                display: none;
            }
            
        </style> -->
            
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
                                        
                                        <h4 class="coming-soon-back-text">
                                            <a href="<?= base_url(); ?>users/dashboard" class="back-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> 
                                                Back</a>
                                        </h4>
                                    
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 common-mb pratice-box attendace-list-box" onclick="window.location.href='<?= base_url();?>practice/studyplan/<?= $first_sub_id?>'">
                                            <div class="row pract-main">
                                                <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-7 align-self-center">
                                                    <h4 class="practice-name">Decode</h4>
                                                    <p class="practice-name-p">Daily Specific<br/> Solving Material</p>
                                                    <a class="view-more-practice-detail">View More <span><i class="fa fa-arrow-circle-right"></i></span></a>
                                                </div>
                                                <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-5 telegenic-img-align align-self-center">
                                                    <img src="<?=base_url()?>/assets/images/blogging.svg" alt="" class="ml-3 align-self-center practice-image" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12 common-mb pratice-box attendace-list-box" onclick="window.location.href='<?= base_url(); ?>strong_box'">
                                            <div class="row pract-main">
                                                <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-7 align-self-center">
                                                    <h4 class="practice-name">Strong Box</h4>
                                                    <p class="practice-name-p">Question Bank <br/>For Specialised Exams</p>
                                                    <a class="view-more-practice-detail">View More <span><i class="fa fa-arrow-circle-right"></i><!--<img src="assets/images/chevroncircle.svg"/>--></span></a>
                                                </div>
                                                <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-5 telegenic-img-align align-self-center">
                                                    <img src="<?=base_url()?>/assets/images/Group-4169.svg" alt="" class="ml-3 align-self-center practice-image" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12 common-mb pratice-box attendace-list-box" onclick="window.location.href='<?= base_url(); ?>srb'">
                                            <div class="row pract-main">
                                                <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-7 align-self-center">
                                                    <h4 class="practice-name">SRB</h4>
                                                    <p class="practice-name-p">Solving Class <br/>Records</p>
                                                    <a class="view-more-practice-detail">View More <span><i class="fa fa-arrow-circle-right"></i><!--<img src="assets/images/chevroncircle.svg"/>--></span></a>
                                                </div>
                                                <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-5 telegenic-img-align align-self-center">
                                                    <img src="<?=base_url()?>/assets/images/strongbox.svg" alt="" class="ml-3 align-self-center practice-image">
                                                </div>
                                            </div>
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

        <?php echo $this->include('components/footer.php'); ?> 
        <script type="text/javascript">
            $("#pgpractice").addClass('active');
            $('#mobPractice').addClass('active');

            
        /*function storage(){
            if (typeof(Storage) !== "undefined") {
                return true;
            } else {
               return false;
            }
        }*/
        function getsujects(){
            $('#status').text('Fetching Contact...');
            
            $.ajax({ 
                type: "POST",
                data: {['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                dataType: 'json', 
                url: "<?= site_url(); ?>practice/list_subjects",
                success: function(data) {
                    var lsdata = JSON.stringify(data);
                    localStorage.setItem('subjectdata', lsdata);
                    //getQuestionReportReasons();
                    getfullsujects();
                }
            });
        }
    
        function getfullsujects(){
            $('#status').text('Fetching Contact...');
            
            $.ajax({ 
                type: "POST",
                data: {['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                dataType: 'json', 
                url: "<?= site_url(); ?>practice/list_full_subjects",
                success: function(data) {
                    var gfsdata = JSON.stringify(data);
                    localStorage.setItem('fullsubjectdata', gfsdata);
                    getQuestionReportReasons();
                }
            });
        }
        
        function getQuestionReportReasons(){
            $('#status').text('Fetching Question Report Reasons...');
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
            $.ajax({ 
                type: "POST",
                data: {['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                dataType: 'json', 
                url: "<?= site_url(); ?>practice/getSteps",
                success: function(data) {
                    var pdata = JSON.stringify(data);
                    localStorage.setItem('stepsdata', pdata);
                    checksession();
                }
            });
        }
         
        function checksession(){
            $('.loading').hide();
            //$('.dashpanel').show();
            //$('.dashload').hide();
        }
        $(document).ready(function(){
            $('.fbbtn').show();
            // $('#pgpractice').addClass('active');
            if(storage()){
                
                if(localStorage.getItem("subjectdata") === null) {
                   // $('.dashpanel').hide();
                    //$('.dashload').show();
                    $('.loading').show();
                    getsujects();
                }/*else if(localStorage.getItem("fullsubjectdata") === null) {
                    getfullsujects();
                }*/else if(localStorage.getItem("stepsdata") === null) {
                    getSteps();
                }else if(localStorage.getItem("lectureMstdata") === null) {
                    getLectures();
                }else if(localStorage.getItem("reportreasondata") === null){
                    getQuestionReportReasons();
                }else{
                    //$('.dashpanel').show();
                }
            }
        });
        
        </script>
<?php echo $this->include('components/footer-end.php'); ?>    
