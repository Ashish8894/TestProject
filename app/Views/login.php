<?php
    $session = \Config\Services::session();
    $loginStat = '';
    if($session->getFlashdata('login_error')){
        $loginStat = 1;
    }

    $errorMsg = '';
    if(isset($_SESSION['login_error'])){
        $errorMsg =  $_SESSION['login_error'];
    }

    $apperrorMsg = '';
    if(isset($_SESSION['app_login_error'])){
        $apperrorMsg =  $_SESSION['app_login_error'];
    }

    $loginError ='';
    if(isset($_SESSION['login_exist_error'])){
        $loginError = $_SESSION['login_exist_error'];
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ICAD Online</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, user-scalable=0, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="assets/icad_online_logo.ico">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fontawesome-free-6.2.1@6.2.1/css/all.min.css">   
        <link rel="stylesheet" href="https://use.typekit.net/lkl1xgh.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="assets/css/loader.css">
        <link rel="stylesheet" type="text/css" href="assets/css/custom.css?v=1.0">
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/css/sweetalert2.min.css">
    
        <style type="text/css">
            html
            {
                min-height: 100%;
            }
            body
            {
                height: 100%;
                background: #F17336;
                background-image: url('assets/images/BG-2.svg');
            }
            .error{color:#FF0000; font-size:10px;}    
            body
            {
                font-size: 18px !important;
            }
            h1,h4
            {
                font-family: Muli;
                font-weight: 700;
            }
            .form-control,.form-control:hover,.form-control:active{
                border: none;
                border-radius: 0 !important;
                border: 2px solid #F17336;
                outline:none;
                box-shadow: none;
            }
            .btn-warning{
                position: relative;
                z-index: 2;
                height: 45px;padding:10px 60px;border-radius: 15px;border-top-right-radius: 5px;
                background: #F17336;
                box-shadow: 1px 1px 32px rgba(241, 115, 54, 0.3);
                border: none;
                font-size: 20px;
                line-height: 25px;
                color: #FEFEFE;
                padding: 10px 40px;

            }
            .er,.pr{
                display: none;
            }
            h4.msgtext {
                color: #666;
                font-family: Muli;
                font-size: 16px;
                font-weight: 500;
                line-height: 30px;
            }
            .cancelBtn{
                display: block;
                position: relative;
                z-index: 2;
                height: 45px;
                padding:10px 75px;
                border-radius: 15px;
                border-top-right-radius: 5px;
                background: #ccc;
                border: none;
                font-size: 20px;
                line-height: 25px;
                color: #FEFEFE;
            }
        </style>
    </head>
    <body>
        <img class="d-lg-block d-md-none d-none d-sm-none custom-login-img" src="<?= base_url()?>images/bro-1.svg" >
        <div class="container" >
            <div class="row">
                <div class="col-md-5 col-lg-7 col-xl-7 col-xxl-7 col-sm-7 col-12"></div>
                <div class="col-md-12 col-lg-5 col-xl-5 col-xxl-5 col-sm-12 col-12 custom-login-page">
                    <div class="panel panel-default login-panal-default">
                        <div class="panel-body">
                            <div class="text-center">
                                <img src="<?= base_url()?>assets/images/icad_online_logo.png" class="login-icad-logo">
                                    <?php
                                    if($session->getFlashdata('errMsg')){
                                        ?>
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
                                                                <?= $session->getFlashdata('errMsg'); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>      
                                            </div>
                                        </div>  
                                    <?php
                                    }
                                    ?>
                            </div>
                            <div class="custom-login-inner-box" >
                                <h2 class="login-icad-name">Login To ICAD</h2>
                                <p class="login-icad-subname">Please Enter Username & Password</p>
                                 
                                    <div id="errorDiv"  class="alert alert-danger alert-dismissible fade show" role="alert"  style="display:none">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        <div class="row vertical-align">
                                            <div class="col-xxl-1 col-xl-1 col-lg-2 col-md-2 col-sm-2 col-2 text-center">
                                                <i class="fa fa-exclamation-triangle"></i> 
                                            </div>
                                            <div class="col-xxl-11 col-xl-11 col-lg-10 col-md-10 col-sm-10 col-10">
                                                <div style="text-align:left;" id="errormsgdiv"></div>
                                            </div>
                                        </div>
                                    </div> 

                                    <div  id="successDiv" class="alert alert-success alert-dismissible fade show" role="alert" style="display:none">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        <div class="row vertical-align">
                                            <div class="col-xxl-1 col-xl-1 col-lg-2 col-md-2 col-sm-2 col-2 text-center">
                                                <i class="fa fa-check"></i> 
                                            </div>
                                            <div class="col-xxl-11 col-xl-11 col-lg-10 col-md-10 col-sm-10 col-10">
                                                <div style="text-align:left;" id="succesmsgdiv"></div>
                                            </div>
                                        </div>
                                    </div> 
                                <form action="<?= site_url('users/check_login');?>" method="post">
                                    <input type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>" class="txt_csrfname" >
                                    <div class="mb-3">
                                        <input type="text" class="form-control input-lg" id="username" placeholder="Username" name="USERNAME" required>
                                    </div>
                                    <div class="mb-3" style="position:relative;">
                                        <input type="password" class="form-control input-lg" id="pass" placeholder="Password" name="PASSWORD" required minlength="6">
                                        <!-- <i data-target="pass" style="padding-right:90%" class="fa fa-eye-slash icon-eye-sett font-icon-sett togglePassword"></i> -->
                                        <i data-target="pass"  class="fa fa-eye-slash icon-eye-sett togglePassword"></i>
                                    </div>
                                    <!-- <input type="checkbox" onclick="myFunction()">Show Password -->
                                    
                                    
                                    <?php if(isset($_SESSION['lflag']) && $_SESSION['lflag']=='otp'){ ?>
                                    <?php } ?>
                                    <?php if(isset($_SESSION['lflag']) && $_SESSION['lflag']=='pass'){ ?>
                                        
                                            <?php  $_SESSION['fmobile']=$_SESSION['mobile']; ?>
                                            
                                    <?php } ?>
                                    <div class="mb-3 text-center">
                                        <button type="submit" class="btn btn-login " id="loginbtn">Login
                                            <img src="<?= base_url();?>/assets/images/chevronwhite.svg"/>
                                        </button>
                                    </div>     
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img class="d-lg-none d-md-block d-block d-sm-block custom-login-img" src="images/bro-1.svg">
        <div class="loading">
            <div class="loader">
                <div class="lds-hourglass"></div>
            </div>
        </div>
        <!-- <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="dueModel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <p class="text-center">
                        </p>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- <div class="modal fade pr-0" tabindex="-1" role="dialog" id="deviceChangeModel" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">     
                        <h4 class="modal-title already-logined">Login Permission</h4>       
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="images/x.svg"/></button>
                    </div>
                    <div class="modal-body">
                        <div><h4 class="msgtext">You are currently logged in into another device / browser, Do you want to login here? if yes then you will be logged out from other device.</h4></div>
                    </div>
                    <div class="modal-footer" style="margin-top:20px">
                        <div class="col-xxl-12 col-lg-12 col-sm-12 col-xl-12 col-md-12">
                            <div class="row">
                                <div class="col-xxl-12 col-lg-12 col-sm-12 col-xl-12 col-md-12 pd-0 text-center">
                                    <button type="button" class="btn btn-default-modal cancelBtn mr-2" data-dismiss="modal">No</button>
                                    <button type="button" class="btn btn-warning-modal RepoSubmit">Continue</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
            
        <!-- <script src="<?= base_url();?>assets/js/jquery-1.11.3.min.js"></script>
        <script src="<?= base_url();?>assets/js/bootstrap.min.js"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>  
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script> 
        <script src="<?= base_url(); ?>/assets/js/sweetalert2.all.min.js"></script>
        <script type="text/javascript">
            function myFunction() {
                var x = document.getElementById("pass");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }

            $(".togglePassword").on('click', function() {
                var id = this.getAttribute("data-target");
                const password = document.querySelector("#" + id);
                const type = password.getAttribute("type") === "password" ? "text" : "password";
                password.setAttribute("type", type);
                this.classList.toggle("fa-eye");
                this.classList.toggle("fa-eye-slash");
            });

            let msgNew = '<?php echo $errorMsg; ?>';
            if(msgNew != ''){
            $('#errorDiv').show();
            $('#errormsgdiv').text(msgNew);
                setTimeout(function(){
                    document.getElementById('errorDiv').style.display = 'none';
                },10000);
            }

            let msgApp = '<?php echo $apperrorMsg; ?>';
            if(msgApp != ''){
            $('#errorDiv').show();
            $('#errormsgdiv').text(msgApp);
            setTimeout(function(){
                    document.getElementById('errorDiv').style.display = 'none';
                },10000);
            }
            let loginError ='<?php echo $loginError; ?>';
            if(loginError != ''){
                Swal.fire({
                    title: "Are you sure?",
                    html: "You are currently logged in into another device / browser, Do you want to login here? if yes then you will be logged out from other device.",
                    type: "warning",
                    showCancelButton: true,
                    // confirmButtonColor: "#3085d6",
                    // cancelButtonColor: "#d33",
                    confirmButtonText: "Continue",
                    confirmButtonClass: "btn btn-sweetalert-submit m-1",
                    cancelButtonClass: "btn btn-sweetalert-submit btn-sweetalert-cancle m-1",
                    buttonsStyling: false
                }).then(function(result) {
                    if (result.value) {
                        $.ajax({
                            url:'<?= site_url() ?>users/login_after_confirm',
                            type:"POST",
                            cache:false,
                            data:{['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'},
                            success:function(data){
                                var obj = JSON.parse(data);
                                if(obj.msg == 'success'){
                                    window.location.href = '<?= site_url(); ?>users/dashboard';
                                }
                            }
                        });            
                    }else if(result.dismiss){
                        window.location.href = '<?= site_url(); ?>';
                    }
                });
            }
            localStorage.removeItem('subjectdata');
            localStorage.removeItem('sbexamdata');
            localStorage.removeItem('fullsubjectdata');
            localStorage.removeItem('topicdata');
            localStorage.removeItem('topicresdata');
            localStorage.removeItem('topicvideos');
            localStorage.removeItem('fulltestdata');
            localStorage.removeItem('topicfiles');
            localStorage.removeItem('sqdata');
            localStorage.removeItem('oqdata');
            localStorage.removeItem('questionstext');
            localStorage.removeItem('topicrankdata');
            localStorage.removeItem('sbtopicdata');
            localStorage.removeItem('sbtopicresdata');
            localStorage.removeItem('sbsqdata');
            localStorage.removeItem('sboqdata');


            /*** following code is to restrict right click event ***/
    document.addEventListener("contextmenu", function(e){
        e.preventDefault();
    }, false);
   
    /*var consEna = localStorage.getItem('consEna');
    if(consEna == 'NO'){*/
        document.onkeydown = function (e) {

            // disable F12 key
            if(e.keyCode == 123) {
                return false;
            }
        
            // disable I key
            if(e.ctrlKey && e.shiftKey && e.keyCode == 73){
                return false;
            }
        
            // disable J key
            if(e.ctrlKey && e.shiftKey && e.keyCode == 74) {
                return false;
            }
        
            // disable U key
            if(e.ctrlKey && e.keyCode == 85) {
                return false;
            }

            // disable ctrl + c key
            if(e.ctrlKey && e.keyCode == 67) {
                return false;
            }

            // disable ctrl + v key
            if(e.ctrlKey && e.keyCode == 86) {
                return false;
            }
        }
    //}
    document.onkeypress = function (event) {  
        event = (event || window.event);  
        if (event.keyCode == 123) {  
            return false;  
        }  
    }
        </script>
    </body>
</html>