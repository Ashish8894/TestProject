<?php echo $this->include('components/header.php'); ?>
    <?php echo $this->include('components/header-end.php'); ?>
        <div class="container container-custom no-padding main-container">
            <div class="row">
                <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-4 col-12">
                    <?php echo $this->include('components/sidebar.php'); ?>
                </div>
                <div class="col-md-8 col-lg-9 col-xl-9 col-xxl-9 col-sm-8 col-12">
                    <div class="col-lg-12 col-xl-12 col-xxl-12 col-md-12 col-sm-12 col-xs-12 no-padding right-container">
                        <div class="col-lg-12 col-xl-12 col-xxl-12 col-md-12 col-sm-12 col-xs-12 no-padding orange-bg orange-bg-profile orange-bg-common-pd top-data-container">
                            <!--<div class="head-text">Profile</div>-->
                            <h4 class="coming-soon-back-text ">
                                <a style="color:#fff;" href="<?= base_url()?>users/dashboard" class="back-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> 
                                    Back</a>
                            </h4>
                        </div>
                        <div class="col-lg-12 col-xl-12 col-xxl-12 col-md-12 col-sm-12 col-12 no-padding orange-bg-common-pd middle-container-data">
                            <div class="col-lg-12 col-xl-12 col-xxl-12 col-md-12 col-sm-12 col-xs-12 no-padding stud-profile-box-page stud-profile-box profile-box-mb">
                                <div class="row">
                                    <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-12 col-12">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <div class="media-inner-photo">
                                                    <img class="profile-square-img " src="<?php echo $photo; ?>" id="propic">
                                                    <!-- <a href="photoupdate.html" class="profile-edit-icon" data-bs-toggle="modal" data-bs-target="#photomodal">
                                                        <span class="fa-solid fa-stack fa-lg">
                                                        <i class="fa-solid fa-circle fa-stack-2x"></i>
                                                        <i class="fa-solid fa-edit fa-stack-1x fa-inverse"></i>
                                                        </span>
                                                    </a> -->
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <div class="row">
                                                    <div class="col-lg-12 col-xl-12 col-xxl-12 col-md-12 col-sm-12 col-12 mob-detail-mb">
                                                        <h4 class="student-profile-name"><?php echo $usernamex; ?></h4>
                                                        <div class="col-lg-12 col-xl-12 col-xxl-12 col-md-12 col-sm-12 col-12 no-padding">
                                                            <a href="tel:<?php echo $contact; ?>" class="student-profile-name student-profile-phoneno">
                                                                <small>
                                                                    <span class="fa fa-phone phoneemail-icon"></span> <span id="ph"><?php echo $contact; ?></span> 
                                                                </small> 
                                                            </a>
                                                        </div>
                                                        <!-- <div class="col-lg-12 col-xl-12 col-xxl-12 col-md-12 col-sm-12 col-12 no-padding d-md-block d-xl-none d-lg-none d-sm-block d-xs-block d-none mob-text-center">
                                                            <button class="btn  btn-custom-submit btn-change-pw" onclick="window.location.href='<?= base_url()?>index.php?page=change-password'">
                                                                Change Password
                                                            </button>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-12">
                                        <div class="col-lg-12 col-xl-12 col-xxl-12 col-md-12 col-sm-12 col-12 no-padding text-right-desktop mob-text-center">
                                            <button class="btn  btn-custom-submit" onclick="window.location.href='<?= base_url()?>users/change_password'">
                                                Change Password
                                            </button>
                                        </div>
                                    </div>
                                </div> 
                            </div> 
                            <div class="col-lg-12 col-xl-12 col-xxl-12 col-md-12 col-sm-12 col-12 no-padding profile-box">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="col-lg-12 col-xl-12 col-xxl-12 col-md-12 col-sm-12 col-12 profile-box-outer" >
                                            <div class="col-lg-12 col-xl-12 col-xxl-12 col-md-12 col-sm-12 col-12 profile-box-inner2 no-padding">
                                                
                                                
                                                <div class="col-lg-12 col-xl-12 col-xxl-12 col-md-12 col-sm-12 col-12 no-padding profile-detail-block">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-xl-4 col-xxl-4  col-md-4 col-sm-4 col-5">
                                                                <p><strong>Course</strong></p>
                                                        </div>
                                                        <div class="col-lg-8 col-xl-8 col-xxl-8  col-md-8 col-sm-8 col-7">
                                                        <p id="coursename"><?php echo $course; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-xl-12 col-xxl-12 col-md-12 col-sm-12 col-12 no-padding profile-detail-block">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-xl-4 col-xxl-4  col-md-4 col-sm-4 col-5">
                                                                <p id="rollno"><strong>Roll No.</strong></p>
                                                        </div>
                                                        <div class="col-lg-8 col-xl-8 col-xxl-8  col-md-8 col-sm-8 col-7">
                                                        <p><?php echo $rno; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-xl-12 col-xxl-12 col-md-12 col-sm-12 col-12 no-padding profile-detail-block">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-xl-4 col-xxl-4  col-md-4 col-sm-4 col-5">
                                                                <p id="business"><strong>Email</strong></p>
                                                        </div>
                                                        <div class="col-lg-8 col-xl-8 col-xxl-8  col-md-8 col-sm-8 col-7">
                                                        <p><?php echo $email; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-xl-12 col-xxl-12 col-md-12 col-sm-12 col-12 no-padding profile-detail-block">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-xl-4 col-xxl-4  col-md-4 col-sm-4 col-5">
                                                                <p id="business"><strong>Designation</strong></p>
                                                        </div>
                                                        <div class="col-lg-8 col-xl-8 col-xxl-8  col-md-8 col-sm-8 col-7">
                                                        <p><?php echo $batch; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-xl-12 col-xxl-12 col-md-12 col-sm-12 col-12 no-padding profile-detail-block">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-xl-4 col-xxl-4  col-md-4 col-sm-4 col-5">
                                                                <p id="business"><strong>Center</strong></p>
                                                        </div>
                                                        <div class="col-lg-8 col-xl-8 col-xxl-8  col-md-8 col-sm-8 col-7">
                                                        <p><?php echo $center; ?></p>
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
            </div>
        </div>

    <!-- <div class="sideline"></div>
        <div class="hidbtn text-center" style="position: fixed;width: 95%;bottom: 0px;left:0px;height: 0px;opacity:0;overflow: hidden;z-index: 999;">
        <button class="btn btn-info btnupdate">Tap to Update</button>
    </div> -->
    <div class="modal fade  change-photo-box" tabindex="-1" role="dialog" id="photomodal">
        <div class="modal-dialog " role="document">
            <div class="modal-content model-content-profile">
                <div class="modal-body">
                    <form action="index.php?submit=upload_photo" method="post" enctype="multipart/form-data" onsubmit="return submitUpload();">
                        <button type="button" class="btn-close close-popup" data-bs-dismiss="modal" aria-label="Close"></button>
                        <h4 class="modal-title upload-profile-photo-name">Change Profile Photo</h4>
                        <h4 class="text-success text-center" style="font-size: 12px;margin-bottom:10px;">
                            Accept only JPG, JPEG, PNG extension file
                        </h4>
                        <div class="form-group fileUploadWrap text-center">
                            <input  type="file" id="exampleInputEmail1"  placeholder="Profile Photo" name="txtimg1"/>
                            <label for="exampleInputEmail1" class="btn-3">
                                <span>Choose a file</span>
                            </label>
                            <span class="text-danger fileName mb-2" id="err-upload" style="display:block;"></span>
                            <!-- <p class="fileName">No file chosen, yet.</p> -->
                            
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-custom-submit">Upload</button>
                            <button type="submit" class="btn btn-custom-submit btn-profile-cancle">Cancle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        
    <?php echo $this->include('components/footer.php'); ?>
        
         <script type="text/javascript">
            $("#pgprofile").addClass('active');
            $('#mobProfile').addClass('active');
            function submitUpload(){
                $('#err-upload').text('');
                if($('#exampleInputEmail1').val()){
                    $('#uploadFrm').submit();
                }else{
                    $('#err-upload').text('Please select image!');
                    return false;
                }
            }
        </script>
<?php echo $this->include('components/footer-end.php'); ?>