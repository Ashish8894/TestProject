<?= $this->include('components/header.php'); ?>
<?=$this->include('components/header-end.php'); ?>
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
                                    <a href="<?= base_url(); ?>users/dashboard" class="back-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> 
                                        Back</a>
                                </h4>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
                                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 feeds">
                                            <?php
                                            if(!empty($notifications)){
                                                foreach($notifications as $val){?>
                                                <!-- data-bs-toggle="modal" data-bs-target="#notificationbox" style="cursor:pointer;" -->
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding" onclick="myFunctionId('<?=$val['PUSH_NOTIFICATION_DTL_ID']?>');">
                                                        <div class="alert alert-custom alert-dismissible col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding custom-notification ">
                                                            <div class="row pract-main">
                                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12 align-self-center">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding notification-time-ribbon">
                                                                        <h2 class="notification-time"><?= date('d-M-Y',strtotime($val['CREATED_ON']))?></h2>
                                                                    </div>
                                                                    <h5 class="notify-text"><strong><?= $val['PUSH_NOTIFICATION_DTL_TITLE']?></strong></h5>
                                                                    <p class="notify-subtext"><?= $val['PUSH_NOTIFICATION_DTL_MESSAGE']?></p>
                                                                </div>
                                                                <!-- <a  class="close btn-noty-close " data-bs-dismiss="alert">&times;</a> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }
                                            }else{ ?>
                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 no-padding">
                                                    <div class="panel panel-default common-mb pratice-box attendace-list-box">
                                                        <div class="panel-body">
                                                            No Notifications
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

        <!--modal with modal header-->
        <div class="modal fade practice-custom-modal " tabindex="-1" role="dialog" id="noticeModal"  data-keyboard="false">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close modal-button-close" data-bs-dismiss="modal"></button>
                <div class="modal-header d-block" style="padding-bottom:0;border-bottom:none;">
                    <h4 class="modal-title practice-custom-modal-title"></h4>
                </div>
                <div class="modal-body" style="padding-bottom: 0;">
                    
                </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div>
      
        <?= $this->include('components/footer.php');?>
        <script type="text/javascript">
            $("#pgnotice").addClass('active');
            $('#mobNotice').addClass('active');
            function myFunctionId (id) {
                var notificationid = id;
                let csrfName = $('.txt_csrfname').attr('name');
                let csrfHash = $('.txt_csrfname').val();
                $.ajax({
                    url:"<?= site_url(); ?>notifications/notification_detail",
                    method:"POST",
                    data:{notificationid,['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'},
                    cache:false,
                    success:function(data)
                    {
                        var json = JSON.parse(data);
                        var title = json.title;
                        var desc = json.desc;
                        var exp = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
                        var text1=desc.replace(exp, "<a href='$1' target='_blank'>$1</a>");
                        var exp2 =/(^|[^\/])(www\.[\S]+(\b|$))/gim;
                        var descnew = text1.replace(exp2, '$1<a target="_blank" href="http://$2">$2</a>');
                        $('.modal-title').html(title);
                        $('.modal-body').html(descnew);
                        $('#noticeModal').modal('show');
                    }
                });
            }
         </script>
            </body>
        </html>
