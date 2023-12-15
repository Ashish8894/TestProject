<?php echo $this->include('components/header.php'); ?>		
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
                                    <a href="<?= base_url(); ?>reports/analysis/<?= $resultId;?>" class="back-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
                                </h4> 
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 common-mb pratice-box attendace-list-box" onclick="window.location.href='<?= base_url();?>reports/potential_score/<?= $examId?>'">
                                    <div class="row pract-main">
                                        <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-7 align-self-center">
                                            <h4 class="practice-name">Score and Potential score</h4>
                                            <a class="view-more-practice-detail">View More <span><i class="fa fa-arrow-circle-right"></i></span></a>
                                        </div>
                                        <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-5 telegenic-img-align align-self-center">
                                            <img src="<?=base_url()?>/assets/images/score_and_potential.svg" alt="" class="ml-3 align-self-center practice-image" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12 common-mb pratice-box attendace-list-box" onclick="window.location.href='<?= base_url();?>reports/question_management/<?= $examId?>'">
                                    <div class="row pract-main">
                                        <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-7 align-self-center">
                                            <h4 class="practice-name">Question Management</h4>
                                            <a class="view-more-practice-detail">View More <span><i class="fa fa-arrow-circle-right"></i><!--<img src="assets/images/chevroncircle.svg"/>--></span></a>
                                        </div>
                                        <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-5 telegenic-img-align align-self-center">
                                            <img src="<?=base_url()?>/assets/images/question_management.svg" alt="" class="ml-3 align-self-center practice-image" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12 common-mb pratice-box attendace-list-box" onclick="window.location.href='<?= base_url();?>reports/subject_balance/<?= $examId?>'">
                                    <div class="row pract-main">
                                        <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-7 align-self-center">
                                            <h4 class="practice-name">Subject balance</h4>
                                            <a class="view-more-practice-detail">View More <span><i class="fa fa-arrow-circle-right"></i><!--<img src="assets/images/chevroncircle.svg"/>--></span></a>
                                        </div>
                                        <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-5 telegenic-img-align align-self-center">
                                            <img src="<?=base_url()?>/assets/images/subject_balance.svg" alt="" class="ml-3 align-self-center practice-image">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12 common-mb pratice-box attendace-list-box" onclick="window.location.href='<?= base_url();?>reports/time_management/<?= $examId?>'">
                                    <div class="row pract-main">
                                        <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-7 align-self-center">
                                            <h4 class="practice-name">Time Management</h4>
                                            <a class="view-more-practice-detail">View More <span><i class="fa fa-arrow-circle-right"></i><!--<img src="assets/images/chevroncircle.svg"/>--></span></a>
                                        </div>
                                        <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-5 telegenic-img-align align-self-center">
                                            <img src="<?=base_url()?>/assets/images/time_management.svg" alt="" class="ml-3 align-self-center practice-image">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12 common-mb pratice-box attendace-list-box" onclick="window.location.href='<?= base_url();?>reports/weakness/<?= $examId?>'">
                                    <div class="row pract-main">
                                        <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8 col-7 align-self-center">
                                            <h4 class="practice-name">Weakness</h4>
                                            <a class="view-more-practice-detail">View More <span><i class="fa fa-arrow-circle-right"></i><!--<img src="assets/images/chevroncircle.svg"/>--></span></a>
                                        </div>
                                        <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 col-sm-4 col-5 telegenic-img-align align-self-center">
                                            <img src="<?=base_url()?>/assets/images/weakness.svg" alt="" class="ml-3 align-self-center practice-image">
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
    $('#pgreport').addClass('active');
    $('#mobreport').addClass('active');
</script>
<?php echo $this->include('components/footer-end.php'); ?>
