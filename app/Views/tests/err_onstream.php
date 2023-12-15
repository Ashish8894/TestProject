<?php echo $this->include('components/header.php'); ?>
<?php echo $this->include('components/header-end.php'); ?>
<div class="container container-custom no-padding main-container">
    <div class="row">
        <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-4 col-12">
            <?php echo $this->include('components/sidebar.php'); ?>
        </div>
        <div class="col-md-8 col-lg-9 col-xl-9 col-xxl-9 col-sm-8 col-12">
            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mx-auto col-sm-12 col-12 no-padding right-container">
                <div class="panel panel-default rightpanel-box">
                    <div class="panel-body rightpanel-box1" >
                    <h4 class="coming-soon-back-text">
                        <a href="<?php echo site_url(); ?>tests" class="back-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> 
                        Back</a>
                    </h4>
                    <div class="col-md-12 col-lg-10 col-xl-10 col-xxl-8 col-sm-12 col-12 mx-auto common-mb "><!--pratice-box attendace-list-box-->
                        <div class="row">
                            <div class="coming-soon-block text-center">
                                <img src="<?= base_url()?>assets/images/error.svg" class="img-coming-soon">
                                <div class="">
                                    <p class="coming-soon-block-text">Content Not Available!</p>
                                    <p class="coming-soon-para-text">Our team is working on it to give you the best content.</p>
                                </div>
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
    $(document).ready(function(){
        $("#pgtest").addClass('active');
        $('#mobTest').addClass('active');
    })
</script>
<?= $this->include('components/footer-end.php'); ?>

