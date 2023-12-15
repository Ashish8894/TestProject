<?php 
$sql = 'SELECT ism.*,ibm.BATCH_NAME,icm.COURSE_NAME,icem.NAME,igm.DESCRIPTION from icad_student_mst as ism LEFT JOIN icad_batches_mst as ibm ON ism.BATCH_ID = ibm.BATCH_ID LEFT JOIN icad_course_mst as icm ON ism.COURSE_ID = icm.COURSE_ID LEFT JOIN icad_center_mst as icem ON ism.CENTER_ID = icem.CENTER_ID LEFT JOIN icad_gender_mst as igm ON igm.GENDER_ID = ism.GENDER_ID WHERE ism.STUDENT_ID  = :icaduserid:';
$ures = $this->db->query($sql,[
   'icaduserid' => $_SESSION['icaduserid']
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
?>
<script type="text/javascript">
    function logOut(){
        localStorage.clear();
        window.location.href = "<?php base_url();?>/users/logout";
    }
</script>
<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/custom.css">

<div class="col-lg-12 col-sm-12 col-md-12 desk-sidebar no-padding d-none d-sm-block d-lg-block d-md-block">
    <div class="panel panel-default desk-menutray">
        <div class="panel-body">
                <div class="d-flex desk-profile-box">
                    <div class="flex-shrink-0">
                        <a href="<?= base_url(); ?>users/profile">
                            <img class="media-object align-self-start rounded-circle desk-profile-img" src="<?= base_url(); ?>/<?php echo $photo; ?>" alt="..." height="60">
                        </a>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h4 class="profile-name" onclick="window.location.href='<?= base_url(); ?>users/profile'"><?php echo $usernamex; ?></h4>
                        <p class="profile-name"><stong>Roll No.</stong> : <span id="pid"><?php echo $rno; ?></span></p>
                        <p class="profile-name"><span><?php echo $course; ?></span></p>
                    </div>
                </div>
                <div class="col-12 col-lg-12 col-md-12 col-sm-12 no-padding desk-menu-box">
                <div class="col-12 desk-menu-link">
                    <a class="desk-menu-link-a" href="<?= base_url(); ?>users/dashboard" id="pgdashboard">
                        <span><img src="<?= base_url();?>assets/images/iconwhome.svg"/></span>Home
                    </a>
                </div>
                <div class="col-12 desk-menu-link">
                    <a class="desk-menu-link-a" href="<?= base_url(); ?>users/profile" id="pgprofile">
                        <span><i class="fa-solid fa-user-alt" aria-hidden="true"></i></span>Profile
                    </a>
                </div>
                <div class="col-12 desk-menu-link">
                    <a class="desk-menu-link-a" href="<?= base_url(); ?>telegenic" id="pgtelegenic">
                        <span><img src="<?= base_url();?>assets/images/iconwtel.svg"/></span>Telegenic
                    </a>
                </div>
                <div class="col-12 desk-menu-link">
                    <a class="desk-menu-link-a" href="<?= base_url(); ?>practice" id="pgpractice">
                        <span><img src="<?= base_url();?>assets/images/iconwsrb.svg"/></span>Practice
                    </a>
                </div>
                <div class="col-12 desk-menu-link">
                    <a class="desk-menu-link-a" href="<?= base_url(); ?>tests" id="pgtest">
                        <span><img src="<?= base_url();?>assets/images/iconwonstream.svg"/></span>Test
                    </a>
                </div>
                <div class="col-12 desk-menu-link">
                    <a href="<?= base_url(); ?>noticeboard" id="pgnotifications">
                        <span><i class="fa-solid fa-list-alt" aria-hidden="true"></i></span> Noticeboard 
                    </a>
                </div>
                <div class="col-12 desk-menu-link">
                    <a class="desk-menu-link-a" href="<?= base_url(); ?>video" id="pgvideosc">
                        <span><img src="<?= base_url();?>assets/images/iconwstories.svg"/></span>Discover Stories 
                    </a>
                </div>
                <div class="col-12 desk-menu-link">
                    <a href="<?= base_url(); ?>notifications" id="pgnotice">
                        <span><img src="<?= base_url();?>assets/images/iconwbell.svg" /></span> Notifications 
                    </a>
                </div>
                <div class="col-12 desk-menu-link">
                    <a href="<?= base_url(); ?>reports" id="pgreport">
                        <span><i class="fa-solid fa-line-chart" aria-hidden="true"></i></span> My Performance 
                    </a>
                </div>
                <!-- <div class="col-12 desk-menu-link">
                    <a href="<?//= base_url(); ?>notifications" id="pgnotifications">
                        <span><img src="<?//= base_url();?>assets/images/iconwbell.svg" /></span> Notifications 
                    </a>
                </div>
                <div class="col-12 desk-menu-link">
                    <a href="<?//= base_url(); ?>feedback" id="pgfeedback">
                        <span><img src="<?//= base_url();?>assets/images/iconwfb.svg"/></span> Feedback 
                    </a>
                </div> 
                <div class="col-12 desk-menu-link">
                    <a href="<?//= base_url(); ?>downloads" id="pgdownloads">
                        <span><img src="<?//= base_url();?>assets/images/iconwdownload.svg"/></span>
                        Short Notes
                    </a>
                </div>   -->
                <!-- <div class="col-12 desk-menu-link">
                    <a class="desk-menu-link-a" href="javascript:void(0);" id="pgsync">
                        <span><img src="<?//= base_url();?>images/sync-white.png"/></span>Sync
                    </a>
                </div> -->
                <div class="col-12 desk-menu-link" style="height:150px;"></div>
                <div class="col-12 desk-menu-link">
                    <a class="desk-menu-link-a" href="javascript:void(0)" onclick="logOut()" id="pglogout">
                        <span><img src="<?= base_url();?>assets/images/iconwsignout.svg"/></span>Logout 
                    </a>
                </div>
                </div>
        </div>
    </div>
</div>