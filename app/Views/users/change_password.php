<?php echo $this->include('components/header.php'); ?>
<?php echo $this->include('components/header-end.php'); ?>
<div class="container container-custom no-padding main-container">
    <div class="row">
        <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-4 col-12">
            <?= $this->include('components/sidebar.php'); ?>
        </div>
        <div class="col-md-8 col-lg-9 col-xl-9 col-xxl-9 col-sm-8 col-12">
            <div class="col-lg-12 col-xl-12 col-xxl-12 col-md-12 col-sm-12 col-xs-12 no-padding right-container">
                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12 no-padding orange-bg orange-bg-profile orange-bg-common-pd top-data-container">
                    <!--<div class="head-text">Change Password</div>-->
                    <h4 class="coming-soon-back-text ">
                        <a style="color:#fff;" href="<?= base_url()?>users/profile" class="back-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> 
                            Back</a>
                    </h4>
                </div>
                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12 no-padding  orange-bg-common-pd middle-container-data">
                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12 no-padding stud-profile-box-page stud-profile-box profile-box-mb">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-12  no-padding rightsection-form form-ml-mr">
                            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12 no-padding change-pw-block">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12 no-padding text-center form-group">
                                    <img class="img-change-pw" src="<?= base_url(); ?>assets/images/change_password.png">
                                </div>
                                <div class="panel-body">
                                    <?php
                                    if(isset($_SESSION['error'])) {
                                        $errmessage = $_SESSION['error'];
                                        unset($_SESSION['error']);
                                        ?>
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                                        <div class="row vertical-align">
                                                            <div class="col-xxl-1 col-xl-1 col-lg-2 col-md-2 col-sm-2 col-2 text-center">
                                                                <i class="fa fa-exclamation-triangle"></i> 
                                                            </div>
                                                            <div class="col-xxl-11 col-xl-11 col-lg-10 col-md-10 col-sm-10 col-10">
                                                                <div style="text-align:left;">
                                                                    <?php echo $errmessage; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>      
                                                </div>
                                            </div>  
                                        </div>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if(isset($_SESSION['success'])){
                                        $smessage = $_SESSION['success'];
                                        unset($_SESSION['success']);
                                        ?>
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                                        <div class="row vertical-align">
                                                            <div class="col-xxl-1 col-xl-1 col-lg-2 col-md-2 col-sm-2 col-2 text-center">
                                                                <i class="fa fa-exclamation-triangle"></i> 
                                                            </div>
                                                            <div class="col-xxl-11 col-xl-11 col-lg-10 col-md-10 col-sm-10 col-10">
                                                                <div style="text-align:left;">
                                                                    <?php echo $smessage; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>      
                                                </div>
                                            </div>  
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <form id="change_pass" method="post" autocomplete="off" onsubmit="return Validate()" action="<?= site_url(); ?>/users/change_password_save">
                                        <div class="form-group col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12">
                                            <p>Your new password must be different from previous used password</p>
                                        </div>
                                        <div class="form-group col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12 ">
                                            <label class="anim-text-lbl">Enter Old Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control input-lg" id="old_password" placeholder="Old Password" name="old_password" required >
                                            <i data-target="old_password"  class="fa fa-eye-slash togglePassword"></i>
                                            <span id="err-old_password" class="errorcode"></span>
                                        </div>
                                        <div class="form-group col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12">
                                            <label  class="anim-text-lbl">Enter New Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control input-lg" id="new_password" placeholder="New Password" name="new_password" required minlength="6">
                                            <i data-target="new_password"  class="fa fa-eye-slash togglePassword"></i>
                                            <span id="err-new_password" class="errorcode"></span>
                                            <p class="errorcode" style="color:#f17336;">Password must contain min 6 characters.</p>
                                        </div>
                                        <div class="form-group col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12">
                                            <label for="confirm_pw" class="anim-text-lbl">Confirm Password</label> 
                                            <input type="password"  class="form-control input-lg" id="confirm_password" placeholder="Re-enter Password" name="confirm_password" required />
                                            <i data-target="confirm_password"  class="fa fa-eye-slash togglePassword"></i>
                                            <span id="err-confirm_password" class="errorcode"></span>
                                            <!-- <p class="confirmPwError" style="font-size: 12px;color: red;margin-bottom:5px; display:none;">Password and confirm password do not match.</p> -->
                                        </div>
                                        
                                        <div class="text-center form-group">
                                            <button id="loginbtn"  type="submit" class="btn btn-custom-submit" >Change Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
        
<?= $this->include('components/footer.php'); ?> 
<script>
$("#pgprofile").addClass('active');
$('#mobProfile').addClass('active');
$(".togglePassword").on('click', function() {
    var id = this.getAttribute("data-target");
    const password = document.querySelector("#" + id);
    const type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);
    this.classList.toggle("fa-eye");
    this.classList.toggle("fa-eye-slash");
});
function validate_password() {
    if(password.length<6)
    {  
    alert("Password must be at least 6 characters long.");  
    return false;  
    } 
}

function Validate() {
    let oldPass = $('#old_password').val();
        let newPass = $('#new_password').val();
        let confPass = $('#confirm_password').val();
        let stat = 0;
        $('#err-old_password').text('');
        if(oldPass == ''){
        stat = 1;
        $('#err-old_password').text('Please enter old password');
        }
        if(newPass == ''){
            stat = 1;
            $('#err-new_password').text('Please enter password');
        }else{
            if($('#is_valid_password').val() == 1){
                stat = 1;
            }else{
                $('#err-new_password').text('');
            }
        }
        if(confPass == ''){
            stat = 1;
            $('#err-confirm_password').text('Please enter confirm password');
        }else{
            if(newPass != confPass){
                stat = 1;
                $('#err-confirm_password').text('Password and confirm password do not match.');
            } 
        }
        if(stat == 0){
            $('#change_pass').submit();
        }else{
            return false;
        }
    }

    function lookup(arg){
    var id = arg.getAttribute('id');
    if(id.includes("new_password")){
        if (/[0-9a-zA-Z@%!]{6,16}$/.test($('#'+id).val())) {
            $('#err-'+id).text('');
            $('#is_valid_password').val('');
        }else{
            $('#err-'+id).text('Password must be at least 6 characters long.');
            $('#is_valid_password').val(1);
        }
    }
    
}
</script>
<?= $this->include('components/footer-end.php'); ?> 
