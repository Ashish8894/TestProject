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
                                    <div class="panel-body rightpanel-box1">
                                    <h4 class="coming-soon-back-text">
                                        <a href="<?= base_url(); ?>video/storievideos/<?=$vid?>" class="back-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> 
                                            Back</a>
                                    </h4>
                                    <input type="hidden" name="path" id="path" value="<?= $datalist['MOTIVATIONAL_VIDEO_DTL_FILEPATH']?>">
                                        <div class="row no-padding">
                                            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12">
                                                <div class="panel panel-default col-md-12 col-lg-12 col-sm-12 col-xs-12 common-mb">
                                                    <div class="panel-body">
                                                        <div class="embed-responsive embed-responsive-16by9" style="background-image: url('assets/images/Spin-1s-98px.gif');background-repeat: no-repeat;background-position: center;">
                                                            <iframe class="embed-responsive-item video-size" src="" frameborder="0" scrolling style="max-height: 100%" allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen></iframe>
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
        <?= $this->include('components/footer.php');?>
         <script type="text/javascript">
            $(document).ready(function(){
                $('#pgvideosc').addClass('active');
                $('#mobVideosc').addClass('active');
                var data = $('#path').val();
                if(data != ''){
                    /*** following code is for play selected video ***/
                    //if(vObj[i].youtube=='1'){
                        var urlx="https://www.youtube.com/embed/"+data;
                    /*}else{                                
                        var urlx="https://lamphub.livebox.co.in/livebox/player/?url="+vObj[i].MOTIVATIONAL_VIDEO_DTL_FILEPATH;
                    }*/
                    $('.embed-responsive-item').attr('src',urlx);
                }  
            })
         </script>
    <?= $this->include('components/footer-end.php');?>
