    <?php 
        $this->db = db_connect();
        $session = \Config\Services::session();
    ?>
    <script type="text/javascript">
        function logOut(){
            localStorage.clear();
            window.location.href = "<?php echo site_url();?>users/logout";
        }
    </script>
</head>
<body>
    <div class="loading">
        <!-- <div class="loader">
            <div class="lds-hourglass"></div>
        </div> -->
        <div class="loader">
            <div class="load-spiner">
                <div class="item item-1"></div>
                <div class="item item-2"></div>
                <div class="item item-3"></div>
                <div class="item item-4"></div>
            </div>
        </div>
    </div>
    <?php 
        if($session->has('icaduserid')){

            $sql = 'SELECT ism.*,ibm.BATCH_NAME,icm.COURSE_NAME,icem.NAME,igm.DESCRIPTION from icad_student_mst as ism LEFT JOIN icad_batches_mst as ibm ON ism.BATCH_ID = ibm.BATCH_ID LEFT JOIN icad_course_mst as icm ON ism.COURSE_ID = icm.COURSE_ID LEFT JOIN icad_center_mst as icem ON ism.CENTER_ID = icem.CENTER_ID LEFT JOIN icad_gender_mst as igm ON igm.GENDER_ID = ism.GENDER_ID WHERE ism.STUDENT_ID  = :icaduserid:';
            $ures = $this->db->query($sql,[
                'icaduserid' => $session->get('icaduserid')
            ]);
            $urow = $ures->getRowArray();
            $usernamex = $urow['FIRST_NAME']." ".$urow['LAST_NAME'];
            $rno = $urow['ROLL_NUMBER'];
            $batch = $urow['BATCH_NAME'] ? $urow['BATCH_NAME'] : '';
            $course = $urow['COURSE_NAME'] ? $urow['COURSE_NAME'] : '';
            // $photo = $urow['PROFILE_PHOTO'] ? $urow['PROFILE_PHOTO'] : '';
            $contact = $urow['CONTACT'] ? $urow['CONTACT'] : '';
            $center = $urow['NAME'] ? $urow['NAME'] : '';
            $email = $urow['EMAIL'] ? $urow['EMAIL'] : '';
            $gender = $urow['DESCRIPTION'] ? $urow['DESCRIPTION'] : '';
            $sesId = $urow['SES_ID'] ? $urow['SES_ID'] : '';
            if($gender == "FEMALE"){
                $photo= 'images/female.png';
            }else{
                $photo = 'images/male.png';
            }
        }
        $pagetitle = isset($pagetitle) ? $pagetitle : '';
    ?>
    <div id="bodyOverlaycover" class=""></div>
    <nav class="navbar navbar-expand-lg d-none d-sm-block  d-md-block d-lg-block header-navbar">
        <div class="container container-custom no-padding">
        <div class="col-lg-12 col-sm-12 col-md-12 col-12 col-xl-12 no-padding" >
            <div class="row">
                <div class="col-lg-3 col-xl-3 col-xxl-3 col-md-3 col-sm-3 col-12">
                    <img src="<?= base_url()?>assets/images/icad_online_logo.png" class="logo-width" title="ICAD Logo">
                </div>
                <div class="col-lg-6 col-xl-6 col-xxl-6 col-md-6 col-sm-5 col-12">
                    <h4 class="ptitle header-custom-title"><?php echo $pagetitle; ?></h4>
                </div>
                <div class="col-lg-3 col-xl-3 col-xxl-3 col-md-3 col-sm-4 col-12">
                        <a href="javascript:void(0)" onclick="logOut()" class=" float-end header-notify-btn">
                            <i class="fa-solid fa-sign-out-alt"></i> Logout
                        </a>
                        <a href="<?= base_url()?>notifications" class="float-end header-notify-btn desk-bell-icon">
                            <span class="fa-solid fa-bell notification-bell"></span>
                        </a>
                </div>
            </div>
            </div>
        </div>

    </nav>
    <div class="container-fluid d-lg-none d-md-none d-block d-sm-none mob-bg-header">
        <div class="container container-custom">
        <div class="row">
            <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-2 col-sm-2 col-2 px-0">
                <a id="mobNotifyIcon" href="#" class="opentray mob-notify-icon" onclick="openmobNav()">
                    <span class="fa fa-navicon fa-lg"></span>
                </a>
            </div>
            <div class="col-lg-7 col-xl-7 col-xxl-7 col-md-7 col-sm-7 col-7">
                <a href="" class="mob-title-sett"><?php echo $mobtitle = $pagetitle; ?> </a>
            </div>
            <div class="col-lg-3 col-xl-3 col-xxl-3 col-md-3 col-sm-3 col-3 px-0">
                <a href="<?= base_url()?>notifications" class="mob-notify-icon float-end"><!--cart-->
                <span class="fa-solid fa-bell fa-lg"></span>
                <span class="badge badge-orange"></span>
                    </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-xl-12 col-xxl-12 col-md-12 col-sm-12 col-12 no-padding mb-3 mt-3 d-none">
                <div>
                    <FORM METHOD=POST name="frmsearch1" action="catalog.php">
                        <div class="input-group">
                        <input type="text" class="form-control mob-form-search" name="keywords" placeholder="Search for...">
                            <div class="input-group-append">
                                <button class="btn btn-default" type="submit">Go!</button>
                            </div>
                        </div>

                    </FORM>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="menutray mob-menutrey" id="mobMenutrey">
        <div class="mob-menutrey-inner">
            <div class="mob-menutrey-innerportion">
                <div class="">
                    <div class="col-xs-12">
                        <div class="d-flex  profile-media">
                            <div class="flex-shrink-0">
                                <a href="<?= base_url(); ?>users/profile">
                                    <img class="media-object align-self-start rounded-circle desk-profile-img" src="<?= base_url(); ?>/<?php echo $photo; ?>" alt="..." height="35" width="35">
                                </a>
                                <a  href="javascript:void(0)" class="mob-closebtn" onclick="closemobNav()">&times;</a>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <h4 class="media-heading profile-name"><?php echo $usernamex; ?></h4>
                                <p class="profile-name"><stong>Roll No.</stong> : <span id="pid">900002</span></p>
                                <p  class="profile-name"><span ><?php echo $course; ?></span></p>
                            </div>
                        </div>
                        <div class="col-12 dblink menu no-padding mob-menu-box">
                                <div class="col-12 mob-menu-link">
                                    <a id="mobDashboard"  href="<?= base_url()?>users/dashboard" class="mob-menu-link-a"><span><img src="<?= base_url()?>assets/images/home-icon.svg"></span>Home</a>
                                </div>
                                <div class="col-12 mob-menu-link">
                                    <a  id="mobProfile"  href="<?= base_url()?>users/profile" class="mob-menu-link-a"><span><i class="fa-solid fa-user-alt" aria-hidden="true"></i><!--<img src="images/home-icon.svg">--></span>Profile </a>
                                </div>
                                <div class="col-12 mob-menu-link">
                                    <a  id="mobTelegenic"  href="<?= base_url()?>telegenic" class="mob-menu-link-a"><span><img src="<?= base_url()?>assets/images/telegenic-icon.svg"></span>Telegenic </a>
                                </div>
                                <div class="col-12 mob-menu-link">
                                    <a  id="mobPractice"  href="<?= base_url(); ?>practice" class="mob-menu-link-a"><span><img src="<?= base_url()?>assets/images/srb-icon.svg"></span>Practice </a>
                                </div>
                                <div class="col-12 mob-menu-link">
                                    <a  id="mobTest"  href="<?= base_url(); ?>tests" class="mob-menu-link-a"><span><img src="<?= base_url()?>assets/images/onstream-icon.svg"></span>Test </a>
                                </div>
                                <div class="col-12 mob-menu-link">
                                    <a  id="mobVideosc"  href="<?= base_url()?>video" class="mob-menu-link-a"><span><img src="<?= base_url()?>assets/images/story-icon.svg"></span>Discover Stories  </a>
                                </div>
                                <div class="col-12 mob-menu-link">
                                    <a id="mobNotification" href="<?= base_url()?>noticeboard" class="mob-menu-link-a"><span><i class="fa-solid fa-list-alt" aria-hidden="true"></i></span>Noticeboard </a>
                                </div>
                                <div class="col-12 mob-menu-link">
                                    <a id="mobNotice" href="<?= base_url()?>notifications" class="mob-menu-link-a"><span><img src="<?= base_url()?>assets/images/notification-icon.svg"/></span>Notifications </a>
                                </div>
                                <!-- <div class="col-12 mob-menu-link">
                                    <a id="mobreport" href="<?= base_url()?>reports" class="mob-menu-link-a"><span><i class="fa-solid fa-line-chart" aria-hidden="true"></i></span>My Performance </a>
                                </div> -->
                                <!--<div class="col-12 mob-menu-link">
                                    <td><a id="mobFeedback" href="<?//= base_url()?>feedback" class="mob-menu-link-a"><span><img src="<?//= base_url()?>assets/images/feedback-icon.svg"/></span>Feedback </a>
                                </div> -->
                                <!-- <div class="col-12 mob-menu-link">
                                    <td><a id="mobShortNotes" href="<?//= base_url()?>downloads" class="mob-menu-link-a"><span><i class="fa fa-download" aria-hidden="true"></i><img src="images/feedback-icon.svg"/></span>Short Notes </a>
                                </div> -->
                                
                                <!-- <div class="col-12 mob-menu-link">
                                    <a  id="mobSync"  href="javascript:void(0);" class="mob-menu-link-a"><span><img src="<?//= base_url()?>assets/images/sync-icon.svg"></span>Sync </a>
                                </div> -->
                                <div class="col-12 mob-menu-link">
                                        <a href="javascript:void(0)" onclick="logOut()" class="mob-menu-link-a logoutbtn"><span><i class="fa fa-sign-out" aria-hidden="true"></i><!--<img src="images/home-icon.svg">--></span>Logout </a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

