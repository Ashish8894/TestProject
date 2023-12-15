<?=  $this->include('components/header.php'); ?>
    <?=  $this->include('components/header-end.php'); ?>
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
                                    <a href="<?= base_url(); ?>video" class="back-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> 
                                        Back</a>
                                </h4>
                                <div class="row no-padding">
                                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 feeds">
                                        <?php if(!empty($datalist)){
                                                    foreach($datalist as $val){
                                                        if(strlen($val['MOTIVATIONAL_VIDEO_DTL_TITLE']) > 43){?>
                                                    <div class="panel panel-default col-md-12 col-lg-12 col-sm-12 col-xs-12 common-mb panel-body-right-bg pratice-box attendace-list-box" data-bs-toggle="tooltip" title="<?= $val['MOTIVATIONAL_VIDEO_DTL_TITLE']?>" onclick="window.location.href='<?= base_url();?>video/videods/<?= $val['MOTIVATIONAL_VIDEO_DTL_ID']?>'">
                                                    <?php }else{?>
                                                        <div class="panel panel-default col-md-12 col-lg-12 col-sm-12 col-xs-12 common-mb panel-body-right-bg pratice-box attendace-list-box" onclick="window.location.href='<?= base_url();?>video/videods/<?= $val['MOTIVATIONAL_VIDEO_DTL_ID']?>'">
                                                    <?php } ?>
                                                        <div class="row equal-height-box">
                                                            <div class=" col-md-9 col-lg-10 col-xl-10 col-xxl-10 col-sm-8 col-9 align-self-center">
                                                                <h4 class="vdbg discover-name"><?= $val['MOTIVATIONAL_VIDEO_DTL_TITLE']?></h4>
                                                            </div>
                                                            <div class="col-md-3 col-lg-2 col-xl-2 col-xxl-2 col-sm-4 col-3 telegenic-img-align align-self-center">
                                                                <img src="<?= base_url()?>assets/images/parrow24.svg">
                                                            </div>
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
                $('#pgvideosc').addClass('active');
                $('#mobVideosc').addClass('active');

                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
                })

         </script>
    <?= $this->include('components/footer-end.php');?>
