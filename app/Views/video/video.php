<?= $this->include('components/header.php');?>
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
                                        <a href="<?= base_url(); ?>users/dashboard" class="back-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> 
                                            Back</a>
                                    </h4> 
                                        <input type="hidden" id="user_id" name="user_id" value="<?= $_SESSION['icaduserid']?>">
                                        <div class="row no-padding">
                                            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 feeds">
                                                <?php if(!empty($list)){
                                                    foreach($list as $val){?>
                                                    <div class="panel panel-default col-md-12 col-lg-12 col-sm-12 col-xs-12 common-mb pratice-box attendace-list-box" onclick="window.location.href='<?= base_url();?>video/storievideos/<?= $val['MOTIVATIONAL_VIDEO_ID']?>'">
                                                        <div class="panel-body">
                                                            <h4 class="discover-name"><?= $val['MOTIVATIONAL_VIDEO_NAME']?></h4>
                                                        </div>
                                                    </div>
                                                <?php }}else{?>
                                                    <div class="col-md-12 col-lg-10 col-xl-10 col-xxl-8 col-sm-12 col-12 mx-auto common-mb pratice-box attendace-list-box">
                                                        <div class="coming-soon-block text-center">
                                                            <div class="row">
                                                                <div class="coming-soon-block text-center">
                                                                    <img src="assets/images/cs.svg" class="img-coming-soon">
                                                                <div>
                                                                    <p class="coming-soon-block-text">Content Not Available</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>                               
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
       
    <?= $this->include('components/footer.php');?>
    <script type="text/javascript">
            /*** End ***/
            $('#pgvideosc').addClass('active');
            $('#mobVideosc').addClass('active');
            
    </script>
    <?= $this->include('components/footer-end.php');?>
