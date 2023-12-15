<!DOCTYPE html>
<html lang="en"> 
    <head> 
        <meta charset="utf-8" />
        <title>ICAD</title>
        <meta name="viewport" content="width=device-width, user-scalable=0, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="icad_online_logo.ico">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.typekit.net/lkl1xgh.css">   
        <link rel="stylesheet" href="<?= base_url()?>assets/plugin/owl-carousel/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="<?= base_url()?>assets/plugin/owl-carousel/assets/owl.theme.default.min.css">

        <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/style.css">  
        <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/loader.css">

        <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/fileinput.min.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/exam-screen-setting.css">

       <!--  <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
        <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
        <script>
            MathJax = {
                tex: {
                    inlineMath: [['$', '$'], ['\\(', '\\)']]
                },
                svg: {
                    fontCache: 'global'
                }
            }; 
        </script> -->

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css" integrity="sha384-n8MVd4RsNIU0tAv4ct0nTaAbDJwPJzDEaqSD1odI+WdtXRGWt2kTvGFasHpSy3SV" crossorigin="anonymous">

        <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js" integrity="sha384-XjKyOOlGwcjNTAIQHIpgOno0Hl1YQqzUOEleOLALmuqehneUG+vnGctmUb0ZY0l8" crossorigin="anonymous"></script>

        <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/contrib/mhchem.min.js" integrity="sha384-ifpG+NlgMq0kvOSGqGQxW1mJKpjjMDmZdpKGq3tbvD3WPhyshCEEYClriK/wRVU0"  crossorigin="anonymous"></script>


       <!--  <script type="module" src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/contrib/mathtex-script-type.mjs" integrity="sha384-4EJvC5tvqq9XJxXvdD4JutBokuFw/dCe2AB4gZ9sRpwFFXECpL3qT43tmE0PkpVg" crossorigin="anonymous"></script>
 -->


        <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/contrib/mathtex-script-type.min.js" integrity="sha384-jiBVvJ8NGGj5n7kJaiWwWp9AjC+Yh8rhZY3GtAX8yU28azcLgoRo4oukO87g7zDT" crossorigin="anonymous"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/contrib/auto-render.min.js" integrity="sha384-+VBxd3r6XgURycqtZ117nYw44OOcIax56Z4dCRWbxyPt0Koah1uHoK0o4+/RRE05" crossorigin="anonymous"></script>

        <!-- To automatically render math in text elements, include the auto-render extension: -->
        <!-- <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/contrib/auto-render.min.js" integrity="sha384-+VBxd3r6XgURycqtZ117nYw44OOcIax56Z4dCRWbxyPt0Koah1uHoK0o4+/RRE05" crossorigin="anonymous"
        onload="renderMathInElement(document.body);"></script> -->



        <style type="text/css">
            body
            {
                background-color: #F1F5FD;
                background-size: 100% auto;
                background-position: center;
                background-attachment: fixed;
            }
            .qtybtn
            {
                display: none;
            }
            
            @media screen and (max-width: 767px)
            {
                .qspannel
                {
                    position: fixed;
                    width: 80%;
                    height: 100%;
                    background-color: #fff;
                    left: 100%;
                    top:0%;
                    z-index: 99999;
                }
                .btn-qp
                {
                    outline: none;
                }
            }

           
                    
            /* Some custom styling for Bootstrap */
            .qtyInput 
            {
                display: block;
                width: 100%;
                padding: 6px 12px;
                color: #555;
                background-color: white;
                border: 1px solid #ccc;
                border-radius: 4px;
                -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
                box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
                -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
                -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
                transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
            }
            .white
            {
                color: #fff;
            }
            .btn
            {
                border:none;
                font-family: Muli;
                font-style: normal;
                font-weight: bold;
                font-size: 12px;
                text-align: center;
                text-transform: capitalize;
                border-radius: 20px;
                margin-bottom:4px;
                color: #FEFEFE;
                padding: 5px 10px;
            }
            .btn:hover
            {
                color:#ffffff;
            }
            .btn-purple:hover, 
            .btn-purple:focus, 
            .btn-purple:active, 
            .btn-purple.active, 
            .open .dropdown-toggle.btn-purple
            { 
                color: #ffffff; 
                background-color: #49247A; 
            }  
            .btn-purple:active,
            .btn-purple.active, 
            .open .dropdown-toggle.btn-purple
            { 
                background-image: none; 
            }      
            .btn-purple.disabled, 
            .btn-purple[disabled], 
            fieldset[disabled] .btn-purple, 
            .btn-purple.disabled:hover, 
            .btn-purple[disabled]:hover, 
            fieldset[disabled] .btn-purple:hover, 
            .btn-purple.disabled:focus, 
            .btn-purple[disabled]:focus, 
            fieldset[disabled] .btn-purple:focus, 
            .btn-purple.disabled:active, 
            .btn-purple[disabled]:active, 
            fieldset[disabled] .btn-purple:active, 
            .btn-purple.disabled.active, 
            .btn-purple[disabled].active, 
            fieldset[disabled] .btn-purple.active
            { 
                background-color: #49247A; 
                border-color: #49247A; 
            } 
             
            .btn-purple .badge 
            { 
                color: #49247A; 
                background-color: #ffffff; 
            }
            .btn-purple
            { 
                background-color: #926AC2;
                border: 1px solid #926AC2;
            }
            .btn-purple:hover
            { 
                background-color: #9e76cf; 
            }  
            .btn-purple:not(:disabled):not(.disabled).active:focus,
            .btn-purple:not(:disabled):not(.disabled):active:focus,
            .show>.btn-purple.dropdown-toggle:focus
            {
                box-shadow: 0 0 0 0.2rem rgba(179, 148, 218, 0.87);
            }
            .btn-success
            {
                background: #079874 !important;
                border: 1px solid #079874;
            }
            .btn-success:hover
            {
                background: #089975 !important;
            }
            .btn-danger
            {
                background: #DC4545;
                border: 1px solid #DC4545;
            }
            .btn-danger:hover
            {
                background-color: #fc3e50;
            }
            .btn-default
            {
               background: #eae9e9;
               border: 1px solid #eae9e9;
               color: #333333;
            }
            .btn-default:hover
            {
               background: #dad6d6;
               color:#333333;
            }
            .btn-default:not(:disabled):not(.disabled).active:focus,
            .btn-default:not(:disabled):not(.disabled):active:focus,
            .show>.btn-default.dropdown-toggle:focus
            {
                box-shadow: 0 0 0 0.2rem #eae9e9;
            }
            .btn-warning
            {
                background: #F17336;
                border: 1px solid #F17336;
            }
            .btn-warning:hover
            {
                background: #f8a57c;
            }
            .btn-warning:not(:disabled):not(.disabled).active,
            
            .btn-warning:not(:disabled):not(.disabled):active, .show>.btn-warning.dropdown-toggle
             {
                color: #ffffff;
                background-color: #F17336;
                border-color: #F17336;
            }
            .btn-check{
                border:none;  
                background-image: url('../images/check.png');
                background-position: 47px 15px;
                background-repeat: no-repeat;
                background-size: 10px 10px;
                border-radius: 20px;
               }
            .checkbox,.number
            {
                display: none;
            }
            .image-wrap 
            {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0,0,0,0.5);
                z-index:999;
            }
            .image-wrap img 
            {
                position: absolute;
                width:90%;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;

            }
            .nav-pills
            {
              overflow-x: auto;
              overflow-y: hidden;
              display: -webkit-box;
              display: -moz-box;
            }
            .nav-pills>li
            {
              float: none;
            }
            
            @media (max-width: 767px)
            {
                .btn-check 
                {
                    background-position: 44px 8px;
                }
            }

            /*mjx-container.MathJax.CtxtMenu_Attached_0 {
                display: initial !important;
                text-align: left!important;
                margin:0px;
                font-size:  12px !important;
            }
           
            .MathJax .CtxtMenu_Attached_0{
                font-size:  12px !important;
            }
            .optext{
                margin-top:20px;
            }*/

            .mspace{margin-right: 0.1em !important;}
        </style>
    </head>
    <body oncopy="return false" oncut="return false" onpaste="return false">
        <div class="image-wrap">
            <img src="<?= base_url(); ?>images/scrollquestion.png" alt="some image here"/>
        </div>
        <div class="loading">
            <div class="loader">
                <div class="loadingio-spinner-rolling-f2iw3b6dje9"><div class="ldio-184e7aj6qib"><div></div></div></div>
            </div>
        </div>
        <div class="container-fluid exam-top-panal" >
            <div class="col-lg-12 col-sm-12 col-xl-12 col-md-12 no-padding">
                <div class="row">
                    <div class="col-lg-2 col-xl-2 col-sm-4 col-md-3 col-xs-12 align-self-center exam-top-panal-common-pd d-lg-block d-sm-none d-md-block d-xl-block d-none" ><!--style="opacity: 0;"-->
                        <p class="exam-remain-time"><span id="timesh">Time Left: <span id="getting-started">00:00:00</span></span></p>
                    </div>
                    <div class="col-lg-8 col-xl-8 col-sm-10 col-md-6 col-xs-10 col-10 text-center exam-top-panal-common-pd">
                        <h3 class="exam-name testhead">
                         Power with Negative Coefficients
                        </h3>
                    </div>
                    <!-- <div class="col-lg-2 col-xl-2 col-sm-2 col-md-3 col-xs-12  d-lg-block d-sm-none d-md-block d-xl-block d-none">
                        <button class="btn btn-default exam-submit-button btn-lg btn-block" id="submittest">Submit Test</button>
                    </div> -->
                    <div class="col-xs-2 col-2  col-sm-2 d-md-none d-lg-none text-right exam-top-panal-common-pd align-self-center">
                        <a href="#" style="color: #fff;" class="cart btn-qp">
                            <img class="mobile-palate-toggle" src="<?= base_url()?>images/grid-two-up-24.png"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
         <!--Time display for mobile view-->
        <!--<div class="container-fluid  exam-panal-box d-lg-none d-sm-block d-md-none d-xl-none d-block exam-panal-box-mobile-timebg" style="opacity: 0;">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 col-xl-12 text-center pt-1 pb-1 ">
                    <p class="exam-remain-time mb-0"><span id="timesh">Time Left: <span id="getting-started">00:00:00</span></span></p>
               </div>
            </div>
        </div>-->
        <!--Time display for mobile view-->

        <div class="container-fluid" >
            <div class="col-lg-12 col-sm-12 col-xl-12 col-md-12 exam-tabs examcommon-mt-mb">
                <ul class="nav nav-tabs mlist"><!--nav-pills-->
                    <li role="presentation" class="active">
                        <a href="#">Loading...</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container-fluid examcommon-mt-mb exam-panal-box" >
            <div class="row exam-row-m">
                <div class="col-md-7 col-xl-9 col-lg-8 col-sm-12 col-xs-12" >
                    <div class="panel panel-default table-responsive exam-question-box qp" >
                        <div class="panel-body"><!--style="padding-bottom: 0;border-bottom-right-radius: 0px;border-bottom-left-radius: 0px;"-->
                            <h4 class="exam-question-no">Question No. <span id="pqno">0</span></h4><!--style="font-family: Muli;font-style: normal;font-weight: bold;font-size: 16px;line-height: 20px;color: #21345F;"-->
                        </div>
                        <div class="panel-body question-body" style="padding-bottom: 0;" id="pque">

                        </div>
                        <div class="panel-body question-option-body" id="pqopt">

                        </div>
                        <!-- following code added by Devendra for showing report question -->
                        <!--<div class="panel-body" id="reportQue">
                            <a href="" data-toggle="modal" data-target="#quesReport" style="color:grey">
                                <i class="fa fa-exclamation-triangle" style=""></i> 
                                Report an Issue</a>
                        </div>-->
                        <input type="hidden" id="reportQuesId" value="">
                        <input type="hidden" id="reportQuesTypeId" value="">
                        <input type="hidden" id="redirectStatus" value="0">

                        <input type="hidden" id="count" value="0">

                        <input type="hidden" id="currentQuestion" value="0">
                        <!-- End -->
                       

                        <!--answer options added by shraddha-->
                        <!--<div class="col-xs-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 col-12 no-padding" >
                            <div class="radio" id="anssingle">
                                <div class="form-check">
                                    <label style="font-size: 1.2em;display:none;" class="form-check-label rdo-in" id="rdo-in-1">
                                    <input type="radio" value="1" name="ansopts" class="ansopt form-check-input"> 
                                    A
                                    </label>
                                </div>
                                <div class="form-check pl-0">
                                    <label style="font-size: 1.2em;display:none;" class="form-check-label rdo-in" id="rdo-in-2">
                                    <input type="radio" value="2" name="ansopts" class="ansopt"> 
                                    B
                                    </label>
                                </div>
                                <div class="form-check pl-0">
                                    <label style="font-size: 1.2em;display:none;" class="form-check-label rdo-in" id="rdo-in-3">
                                    <input type="radio" value="3" name="ansopts" class="ansopt"> 
                                    C
                                    </label>
                                </div>
                                <div class="form-check pl-0">
                                    <label style="font-size: 1.2em;display:none;" class="form-check-label rdo-in" id="rdo-in-4">
                                    <input type="radio" value="4" name="ansopts" class="ansopt"> 
                                    D
                                    </label>
                                </div>
                                <div class="form-check pl-0">
                                    <label style="font-size: 1.2em;display:none;" class="form-check-label rdo-in" id="rdo-in-5">
                                    <input type="radio" value="5" name="ansopts" class="ansopt"> 
                                    E
                                    </label>
                                </div>
                                <div class="form-check pl-0">
                                    <label style="font-size: 1.2em;display:none;" class="form-check-label rdo-in" id="rdo-in-6">
                                    <input type="radio" value="6" name="ansopts" class="ansopt"> 
                                    F
                                    </label>
                                </div>
                                <div class="form-checkpl-0">
                                    <label style="font-size: 1.2em;display:none;" class="form-check-label rdo-in" id="rdo-in-7">
                                    <input type="radio" value="7" name="ansopts" class="ansopt"> 
                                    G
                                    </label>
                                </div>
                                <div class="form-check pl-0 ">
                                    <label style="font-size: 1.2em;display:none;" class="form-check-label rdo-in" id="rdo-in-8">
                                    <input type="radio" value="8" name="ansopts" class="ansopt"> 
                                    H
                                    </label>
                                </div>
                            </div>
                            <div class="checkbox">
                                <div class="form-check pl-0 ">
                                    <label style="font-size: 1.2em;display:none;" class="form-check-label check-in" id="check-in-1">
                                    <input type="checkbox" id="checkboxSuccess" value="1" name="ansopts" class="ansopt">
                                    A
                                    </label>
                                </div>
                                <div class="form-check pl-0 ">
                                    <label style="font-size: 1.2em;display:none;" class="form-check-label check-in" id="check-in-2">
                                    <input type="checkbox" id="checkboxSuccess" value="2" name="ansopts" class="ansopt">
                                    B
                                    </label>
                                </div>
                                <div class="form-check pl-0 ">
                                    <label style="font-size: 1.2em;display:none;" class="form-check-label check-in" id="check-in-3">
                                    <input type="checkbox" id="checkboxSuccess" value="3" name="ansopts" class="ansopt">
                                    C
                                    </label>
                                </div>
                                <div class="form-check pl-0 ">
                                    <label style="font-size: 1.2em;display:none;" class="form-check-label check-in" id="check-in-4">
                                    <input type="checkbox" id="checkboxSuccess" value="4" name="ansopts" class="ansopt">
                                    D
                                    </label>
                                </div>
                                <div class="form-check pl-0 ">
                                    <label style="font-size: 1.2em;display:none;" class="form-check-label check-in" id="check-in-5">
                                    <input type="checkbox" id="checkboxSuccess" value="5" name="ansopts" class="ansopt">
                                    E
                                    </label>
                                </div>
                                <div class="form-check pl-0 ">
                                    <label style="font-size: 1.2em;display:none;" class="form-check-label check-in" id="check-in-6">
                                    <input type="checkbox" id="checkboxSuccess" value="6" name="ansopts" class="ansopt">
                                    F
                                    </label>
                                </div>
                                <div class="form-check pl-0 ">
                                    <label style="font-size: 1.2em;display:none;" class="form-check-label check-in" id="check-in-7">
                                    <input type="checkbox" id="checkboxSuccess" value="7" name="ansopts" class="ansopt">
                                    G
                                    </label>
                                </div>
                                <div class="form-check pl-0 ">
                                    <label style="font-size: 1.2em;display:none;" class="form-check-label check-in" id="check-in-8">
                                    <input type="checkbox" id="checkboxSuccess" value="8" name="ansopts" class="ansopt">
                                    H
                                    </label>
                                </div>
                            </div>
                            <div class="number">
                                <label style="font-size: 1.2em;">
                                <input type="number" class="form-control ansopt numberx" value="" name="ansopts" onkeypress="return isNumberKey(this, event);">
                                </label>
                            </div>
                        </div>-->
                        <!--answer options added by shraddha-->
                    </div>
                </div>
                <div class="col-md-5 col-xl-3 col-lg-4 col-sm-12 col-xs-12" >
                    <div class="qspannel exam-question-box-left-outer rightBox">
                        <div class="exam-question-box-left exam-name-right d-lg-none d-xl-none d-md-none d-sm-block d-xs-block"><!--padding: 15px;border-bottom:1px solid #ddd;border-top-right-radius:15px;border-top-left-radius: 15px;-->
                            <div class="row">
                                <div class="col-xs-10 col-lg-10 col-sm-10 col-md-10 col-xl-10 col-10">
                                    <div class="d-none "><!--hidden-xs-->
                                        <strong class="testhead right-section-title"> Power with Negative Coefficients | 10 min | 3 questions | 12 marks</strong>
                                    </div>
                                    <div class="d-none"><!--visible-xs-->
                                    <strong class="testhead right-section-title"> Power with Negative Coefficients <br> 10 min | 3 questions | 12 marks</strong>
                                    </div>

                                    <!--<div class="text-left" style="opacity: 0;">
                                        <strong style="font-family: Muli;font-style: normal;font-weight: 600;font-size: 14px;line-height: 18px;text-transform: capitalize;color: #21345F;"><span id="timesh">Time Left: <span id="getting-started">00:00:00</span></span></strong>
                                    </div>-->
                                </div>
                                <div class="col-xs-2 col-lg-2 col-sm-2 col-md-2 col-xl-2 col-2 text-right" >
                                    <a href="#" class="btn-back btn btn-lg btn-link" style="padding:0;">
                                        <img src="<?= base_url()?>images/x.svg"/>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-left d-none"><!--hidden-->
                                    <small><STRONG>686</STRONG> Students attempted this test.</small><br/>
                                    <small><STRONG>139</STRONG> Students currently attempting this test.</small>
                                </div>
                            </div>
                        </div>
                        <div class="exam-question-box-left-outer-height">
                            <div class="exam-question-box-left btn-indication-box" >
                                <table width="100%" cellspacing="5" cellpadding="5">
                                    <tbody>
                                        <tr>
                                            <td><button class="btn btn-success btn-sm palette pull-right exam-status-btn"  id="cntansd" type="button">0</button> Answered  </td>
                                        </tr>
                                        <tr>
                                            <td><button class="btn btn-danger btn-sm palette pull-right exam-status-btn"  id="cntnota" type="button">0</button> Not&nbsp;Answered</td>
                                        </tr>
                                        <tr>
                                            <td><button class="btn btn-default btn-sm palette pull-right exam-status-btn" id="cntnotv" type="button">60</button> Not&nbsp;Visited  </td>
                                        </tr>
                                        <!-- <tr>
                                            <td><button class="btn btn-purple btn-sm palette pull-right exam-status-btn" id="cntmark" type="button">0</button> Marked&nbsp;for&nbsp;Review</td>
                                        </tr>

                                        <tr>
                                            <td><button class="btn btn-purple btn-check btn-sm palette pull-right exam-status-btn" id="cntmarkc" type="button">0</button> Answered &amp; Marked&nbsp;for&nbsp;Review</td>
                                        </tr> -->

                                        <input type="hidden" id="answeredText" value="0">
                                        <input type="hidden" id="totalQuest" value="0">
                                        <input type="hidden" id="endDate" value="">
                                        <input type="hidden" id="liveTime" value="">
                                        <input type="hidden" id="liveStatus" value="ACTIVE">
                                    </tbody>
                                </table>
                            </div>
                            <div class="exam-question-box-left que-pallate-box">
                                <h4 class="selected-sub-name"><span id="subhead" ctab="CHEMSEC1">Physics</span>
                                    <br/><small class="selected-ques-no">Choose a Question</small>
                                </h4>
                                <div  style="" class="qpallete"><!--height: 150px; overflow: auto;-->
                                </div>
                                <!--question-pallat-box-->
                                <!--<div class="text-right">
                                    <button class="btn btn-warning" id="submittest">Submit Test</button>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="container-fluid navbar fixed-bottom navbar-fixed-bottom-inner mob-pl-pr" style="background-color: #fff;width:100%;"><!--navbar-fixed-bottom-->
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 col-xl-12 ">
                <div class="row">
                   
                        <div class="col-lg-2 col-xl-1 col-xs-3 col-md-3 col-3 align-self-center" >
                            <!--<div class="">-->
                                <label class="options-font-size">Answer</label>
                            <!--</div>-->
                        </div>
                        <div class="col-lg-3 col-xl-3  col-xs-9 col-md-9 col-9 align-self-center">
                            <div class="radio" id="anssingle">
                                <label style="display:none;" class="rdo-in options-font-size" id="rdo-in-1">
                                <input type="radio" value="1" name="ansopts" class="ansopt"> 
                                A
                                </label>
                                <label style="display:none;" class="rdo-in options-font-size" id="rdo-in-2">
                                <input type="radio" value="2" name="ansopts" class="ansopt"> 
                                B
                                </label>
                                <label style="display:none;" class="rdo-in options-font-size" id="rdo-in-3">
                                <input type="radio" value="3" name="ansopts" class="ansopt"> 
                                C
                                </label>
                                <label style="display:none;" class="rdo-in options-font-size" id="rdo-in-4">
                                <input type="radio" value="4" name="ansopts" class="ansopt"> 
                                D
                                </label>
                                <label style="display:none;" class="rdo-in options-font-size" id="rdo-in-5">
                                <input type="radio" value="5" name="ansopts" class="ansopt"> 
                                E
                                </label>
                                <label style="display:none;" class="rdo-in options-font-size" id="rdo-in-6">
                                <input type="radio" value="6" name="ansopts" class="ansopt"> 
                                F
                                </label>
                                <label style="display:none;" class="rdo-in options-font-size" id="rdo-in-7">
                                <input type="radio" value="7" name="ansopts" class="ansopt"> 
                                G
                                </label>
                                <label style="display:none;" class="rdo-in options-font-size" id="rdo-in-8">
                                <input type="radio" value="8" name="ansopts" class="ansopt"> 
                                H
                                </label>
                            </div>

                            <div class="checkbox">
                                <label style="display:none;" class="check-in options-font-size" id="check-in-1">
                                <input type="checkbox" id="checkboxSuccess" value="1" name="ansopts" class="ansopt">
                                A
                                </label>
                                <label style="display:none;" class="check-in options-font-size" id="check-in-2">
                                <input type="checkbox" id="checkboxSuccess" value="2" name="ansopts" class="ansopt">
                                B
                                </label>
                                <label style="display:none;" class="check-in options-font-size" id="check-in-3">
                                <input type="checkbox" id="checkboxSuccess" value="3" name="ansopts" class="ansopt">
                                C
                                </label>
                                <label style="display:none;" class="check-in options-font-size" id="check-in-4">
                                <input type="checkbox" id="checkboxSuccess" value="4" name="ansopts" class="ansopt">
                                D
                                </label>
                                <label style="display:none;" class="check-in options-font-size" id="check-in-5">
                                <input type="checkbox" id="checkboxSuccess" value="5" name="ansopts" class="ansopt">
                                E
                                </label>
                                <label style="display:none;" class="check-in options-font-size" id="check-in-6">
                                <input type="checkbox" id="checkboxSuccess" value="6" name="ansopts" class="ansopt">
                                F
                                </label>
                                <label style="display:none;" class="check-in options-font-size" id="check-in-7">
                                <input type="checkbox" id="checkboxSuccess" value="7" name="ansopts" class="ansopt">
                                G
                                </label>
                                <label  style="display:none;" class="check-in options-font-size" id="check-in-8">
                                <input type="checkbox" id="checkboxSuccess" value="8" name="ansopts" class="ansopt">
                                H
                                </label>
                            </div>

                            <div class="number">
                                <label class="options-font-size" style="width:100%;">
                                <input type="number" class="form-control ansopt numberx" value="" name="ansopts" onkeypress="return isNumberKey(this, event);">
                                </label>
                            </div>
                        </div>
                    
                        <div class="col-lg-7 col-xl-8  col-md-12  col-sm-12 col-xs-12 align-self-center" ><!--style="padding: 0px !important;"-->

                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 col-xl-12 no-padding">
                                <!--<button type="button" class="btn btn-purple common-btn-fontsize" id="mfreview">Mark for Review b<span class="d-none"> and Next</span><i class="fa fa-paperclip ml-2" aria-hidden="true"></i></button>-->

                                <button type="button" class="btn btn-success common-btn-fontsize mob-save-next" id="savenext">Save and Next<i class="fa fa-arrow-right ml-2" aria-hidden="true"></i></button><!--common-btn-clear-mobile-->

                                <button type="button" class="btn btn-danger common-btn-fontsize" id="clrres">Clear<span class="d-none"> Response</span><i class="fa fa-pencil ml-2" aria-hidden="true"></i></button><!-- common-btn-clear-mobile-->
                            
                                <button data-toggle="modal" data-target="#quesReport" type="button" class="btn btn-warning common-btn-fontsize" id="reportQue">
                                    
                                    Report an Issue<i class="fa fa-reply ml-2" aria-hidden="true"></i>
                                </button>
                                
                                <button class="btn btn-default exam-submit-button float-right d-lg-block d-sm-none d-md-block d-xl-block d-none" id="submittest">Submit Test</button>
                                <!--<div class="panel-body" id="reportQue">
                                    <a href="" data-toggle="modal" data-target="#quesReport" style="color:grey">
                                        <i class="fa fa-exclamation-triangle" style=""></i> 
                                        Report an Issue</a>
                                </div>-->
                            </div>
                        </div>
                   
                    <!--<div class="col-md-4 col-xl-4 col-lg-2 col-sm-4 col-xs-12">
                        <button type="button" class="btn btn-success common-btn-fontsize pull-right d-lg-block d-sm-block d-md-block d-xl-block d-none" id="savenext">Save and Next<i class="fa fa-arrow-right ml-2" aria-hidden="true"></i></button>
                    </div>-->
                </div>
            </div>
             <!--Submit button for mobile view-->
             <div class="col-lg-12 col-sm-12 col-md-12 col-xl-12 col-xs-12 col-12 mob-pl-pr d-lg-none d-sm-block d-md-none d-xl-none d-block " style="background-color: #fff;width:100%;">
               <button class="btn btn-default exam-submit-button-mobile btn-lg btn-block mb-0" id="submittest_mob">Submit Test</button>
            </div>
            <!--Submit button for mobile view-->
        </div>     


        
        <div class="modal fade exam-modal-box" tabindex="-1" role="dialog" id="confirmbox" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close modal-button-close" data-dismiss="modal" aria-label="Close">
                            <img src="<?= base_url()?>images/x.svg"/>
                        </button>
                        <h4 class="modal-title testhead"></h4>
                    </div>
                    <div class="modal-body text-center">
                        <img class="mb-3" src="<?= base_url()?>images/blogging.svg"/>
                        <p class="exam-modal-box-heading">Have you cross checked all Answers?<!-- Do you really want to submit the Test? --> </p>
                    </div>
                    <div class="modal-footer">
                         <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 col-xl-12 no-padding">
                            <div class="row">
                                <div class="col-xs-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 col-6">
                                    <button type="button" class="btn btn-default btn-block exam-modal-btns" data-dismiss="modal">No</button>
                                </div>
                                <div class="col-xs-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 col-6">
                                    <button type="button" class="btn btn-warning btn-block exam-modal-btns finsbtn" id="finsbtn">Yes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade exam-modal-box" tabindex="-1" role="dialog" id="confirmbox2" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title testhead"></h4>
                        <button type="button" class="close modal-button-close" data-dismiss="modal" aria-label="Close">
                            <img src="<?= base_url()?>images/x.svg"/>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <img class="mb-3" src="<?= base_url()?>images/blogging.svg"/>
                        <h4 class="testhead"></h4>
                        <p class="exam-modal-box-heading">Do you want to submit the Test ?</p>
                    </div>
                    <div class="modal-footer">
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 col-xl-12 no-padding">
                            <div class="row">
                                <div class="col-xs-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 col-6">
                                    <button type="button" class="btn btn-default exam-modal-btns btn-block" data-dismiss="modal">No</button>
                                </div>
                                <div class="col-xs-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 col-6">
                                    <button type="button" class="btn btn-warning exam-modal-btns btn-block finsbtn">Yes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade exam-modal-box" tabindex="-1" role="dialog" id="msgbox" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">                
                        <h4 class="modal-title testhead">Power with Negative Coefficients</h4>
                        <button type="button" class="close modal-button-close" data-dismiss="modal" aria-label="Close">
                            <img src="<?= base_url()?>images/x.svg"/>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <p class="exam-modal-box-heading">Time Out!!! Your answers have been saved successfully!</p>
                    </div>
                    <div class="modal-footer">
                        <div class="col-lg-4 col-sm-6 col-md-4 col-xs-6 col-6 col-xl-4 mx-auto">
                            <button type="button" class="btn btn-warning exam-modal-btns btn-block finsbtn">OK</button>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade exam-modal-box" tabindex="-1" role="dialog" id="timealert" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">                
                        <h4 class="modal-title testhead">Power with Negative Coefficients</h4>
                        <button type="button" class="close modal-button-close" data-dismiss="modal" aria-label="Close">
                            <img src="<?= base_url()?>images/x.svg"/>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <p class="timemsg exam-modal-box-heading">Time Out!!! Your answers have been saved successfully!</p>
                    </div>
                    <div class="modal-footer">
                        <div class="col-lg-4 col-sm-6 col-md-4 col-xs-6 col-6 col-xl-4 mx-auto">
                            <button type="button" class="btn btn-warning exam-modal-btns btn-block" data-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade exam-modal-box" tabindex="-1" role="dialog" id="networkalert" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">                
                        <h4 class="modal-title"><strong>Alert!</strong></h4>
                        <button type="button" class="close modal-button-close" data-dismiss="modal" aria-label="Close">
                            <img src="<?= base_url()?>images/x.svg"/>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <p class="timemsg exam-modal-box-heading">Network Connection Problem!!! Please check your connection and try again!</p>
                    </div>
                    <div class="modal-footer">
                        <div class="col-lg-4 col-sm-6 col-md-4 col-xs-6 col-6 col-xl-4 mx-auto">
                            <button type="button" class="btn btn-warning exam-modal-btns btn-block" data-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- following modal added by Devendra for report question -->
        <div class="modal fade exam-modal-box" tabindex="-1" role="dialog" id="quesReport" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">        
                        <h4 class="modal-title">Report Question</h4>        
                        <button type="button" class="close modal-button-close" data-dismiss="modal" aria-label="Close">
                            <img src="<?= base_url()?>images/x.svg"/>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <div  id="reasonOption"></div>
                        <div id="otherReasonDiv" style="display:none;margin-top: 20px;">
                            <label>Other</label>
                            <input type="text" class="form-control" id="otherReason" placeholder="Enter Reason" />
                        </div>
                        <span class="text-danger" id="reason-err"></span>
                    </div>
                    <div class="modal-footer">
                        <div class="col-lg-4 col-sm-6 col-md-4 col-xs-6 col-6 col-xl-4 mx-auto">
                            <button type="button" class="btn btn-warning exam-modal-btns btn-block RepoSubmit">Submit</button>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        
        <!-- <script type="text/javascript" src="cordova.js"></script> -->
        <script src="<?= base_url()?>assets/js/jquery-1.11.3.min.js"></script>    
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>    
        <!-- <script src="<?= base_url()?>assets/js/jquery.mobile-1.2.1.min.js"></script> -->
       <!--<script src="assets/js/bootstrap.min.js"></script>-->
       
        <!-- <script src="<?= base_url()?>assets/plugin/owl-carousel/owl.carousel.js"></script> -->
        <script src="<?= base_url()?>assets/js/ux.js"></script>
        <script src="<?= base_url()?>assets/js/jquery.countdown.min.js"></script>
        
        <script type="text/javascript">
            $("#pgtest").addClass('active');
            $('#mobTest').addClass('active');
            function preventBack() {
                window.history.forward(); 
            }
            setTimeout("preventBack()", 0);

            //window.onunload = function () { null };
            function applyCatex(){
                renderMathInElement(document.querySelector('#pque'), {

                    delimiters: [

                        {left: "$$", right: "$$", display: false},
                        {left: "$", right: "$", display: false},
                        {left: "\\(", right: "\\)", display: false},
                        /*{left: "\\begin{array}{cc}", right: "\\end{array}", display: false},
                        {left: "\\begin{equation}", right: "\\end{equation}", display: true},
                        {left: "\\begin{align}", right: "\\end{align}", display: true},
                        {left: "\\begin{alignat}", right: "\\end{alignat}", display: true},
                        {left: "\\begin{gather}", right: "\\end{gather}", display: true},
                        {left: "\\begin{CD}", right: "\\end{CD}", display: true},*/
                        {left: "\\[", right: "\\]", display: false}
                    ],
                    throwOnError : false
                });
                myMathFunction();
            }
            function applyCatexOnOption(){
                renderMathInElement(document.querySelector('#pqopt'), {
                    delimiters: [
                        {left: '$$', right: '$$', display: false},
                        {left: '$', right: '$', display: false},
                        {left: '\\(', right: '\\)', display: false},
                        {left: '\\[', right: '\\]', display: false},
                      
                    ],
                    throwOnError : false
                });
                myMathFunction();
            }
            function myMathFunction(){
                $('math').each(function (i, link) {
                    $(link).attr('display', '');
                });
            }
        </script>

        <script>
            /*** following code added on 25-01-22 for browser close***/
            var myEvent = window.attachEvent || window.addEventListener;
            var chkevent = window.attachEvent ? 'onbeforeunload' : 'beforeunload'; /// make IE7, IE8 compitable

            myEvent(chkevent, function(e) { // For >=IE7, Chrome, Firefox
                var redStat = $('#redirectStatus').val();
                if(redStat == 0){
                    var confirmationMessage = 'Are you sure to leave the page?';  // a space
                    (e || window.event).returnValue = confirmationMessage;
                    return confirmationMessage;
                }
            });
            /*** End ***/

            /*** following code is to restrict right click event ***/
            document.addEventListener("contextmenu", function(e){
                e.preventDefault();
            }, false);
            var consEna = localStorage.getItem('consEna');
            if(consEna == 'NO'){
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
                }
            }
            /*** ENd ***/
           
            /*window.addEventListener('beforeunload', function (e) {
                var redStat = $('#redirectStatus').val();
                if(redStat == 0){
                    e.preventDefault();
                    e.returnValue = '';
                    //localStorage.setItem("windows",0);
                }
            });*/
            var refreshSn = function ()
            {
                var time = 600000; // 10 mins
                setTimeout(
                    function ()
                    {
                        $.ajax({
                           url: 'refresh_session.php',
                           cache: false,
                           complete: function () {refreshSn();}
                        });
                    },
                    time
                );
            };
            function isNumberKey(txt, evt) {
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                
                if (charCode == 46 || charCode == 45) {
                    //Check if the text already contains the . character
                    if (txt.value.indexOf('.') === -1) {
                        if(charCode == 45 && txt.value.length > 0){
                            return false;
                        }
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    if (charCode > 31 && (charCode < 48 || charCode > 57))
                        return false;
                }
                if(txt.value.length > 12){
                    return false;
                }
                var number = txt.value.split('.');
                if(number[1] && number[1].length > 5){
                    return false;
                }
                return true;
            }

            

            /*** following code is to restrict e,+,- character in number type input box ***/
            /*document.querySelector(".numberx").addEventListener("keypress", function (evt) {
                if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57)
                {
                    evt.preventDefault();
                }
            });*/
            /*** End ***/
           
            var alphaArr = {'1':'A', '2':'B', '3':'C', '4':'D', '5':'E', '6':'F', '7':'G', '8':'H'};

            /**** Following code is for math type ***/
            /*let promise = Promise.resolve();  // Used to hold chain of typesetting calls
            function typeset(code) {
              promise = promise.then(() => MathJax.typesetPromise(code()))
                               .catch((err) => console.log('Typeset failed: ' + err.message));
              return promise;
            }*/
            /**** ENd ****/


            //$(document).ready(function(){
            $(window).load(function(){
                startInterval()
                localStorage.setItem('icduserid',<?php echo $userId; ?>);

                var queIns = '';
                //var startTime = new Date().toLocaleString();
                var dt = new Date();
                var curr_month = dt.getMonth() + 1;
                $('#liveTime').val(dt.getFullYear() +  "-" + curr_month + "-" + dt.getDate() + " " + dt.getHours() + ":" + dt.getMinutes() +":" + dt.getSeconds());
                $('#liveStatus').val('ACTIVE');
                var startTime = dt.getFullYear() +  "-" + curr_month + "-" + dt.getDate() + " " + dt.getHours() + ":" + dt.getMinutes() +":" + dt.getSeconds();

                refreshSn();
                $('.btn-back').click(function(){
                    $('.qspannel').animate(({left: '100%'}));
                    qpflag = 0;
                });   

                var qpflag = 0;
                var queno = 0;
                var lstsno = 0;
                $('.btn-qp').click(function(){
                    if(qpflag == 0){
                        $(this).animate(({right: '80%'}));
                        $('.qspannel').animate(({left: '20%'}));
                        qpflag=1;
                    }else{
                        $(this).animate(({right: '0%'}));
                        $('.qspannel').animate(({left: '100%'}));
                        qpflag=0;
                    }
                });

                $(".qspannel").on("swiperight",function(){
                    $('.qspannel').animate(({left: '100%'}));
                    qpflag = 0;
                });

                var var1 = window.location.search.substr(1);
                //var i = var1;
                var retrievedObject = localStorage.getItem('dynamictestdata');
                var tObj = JSON.parse(retrievedObject);
                let tlen = tObj.length;
                let testid = '<?php echo $tid; ?>';
                let i = 0;
                for(let k = 0; k < tlen; k++){
                    if(tObj[k].DYNAMIC_TEST_ID == testid){
                        i = k;
                    }
                }
                var testlist = "";
                var cnt1 = 0;
                var cnt2 = 0;                           
                //var testid = tObj[i].EXAM_ID;
                /*var examEndTime = tObj[i].SCHEDULE_END_DATE;
                var resultShowTime = tObj[i].RESULT_SHOW_TIME;
                var resultShowStatus = tObj[i].SHOW_RESULT_STATUS;
                var isQuestionRestricted = tObj[i].IS_QUESTION_ATTEMPT_RESTRICTED;
                var quesRestrictedStatus = tObj[i].QUESTION_ATTEMPT_RESTRICTION_STATUS;
                var subRestrictedCount = tObj[i].QUESTION_RESTRICTED_COUNT.split(",");*/
                //console.log('subRestrictedCount => ',subRestrictedCount);
                let totMark = Number(tObj[i].NUMBER_OF_QUESTIONS) * 4;
                testlist += tObj[i].TEST_TITLE+' | '+tObj[i].TEST_DURATION+' min | '+tObj[i].NUMBER_OF_QUESTIONS+' questions | '+totMark+' marks';
                $('#totalQuest').val(tObj[i].NUMBER_OF_QUESTIONS);
                var exDuration = tObj[i].TEST_DURATION;
                /*if(tObj[i].expire_duration != '' && tObj[i].expire_duration < tObj[i].TEST_DURATION){
                    exDuration = tObj[i].expire_duration;
                }*/
                if(localStorage.getItem('exam_changed_duration')){
                    //alert('hiiii');
                    if(Number(localStorage.getItem('exam_changed_duration')) < Number(tObj[i].TEST_DURATION)){
                        exDuration = localStorage.getItem('exam_changed_duration');
                    }else{
                        exDuration = tObj[i].TEST_DURATION;
                    }
                }
                var fiveSeconds = new Date().getTime() + (exDuration*60*1000);
                
                var flagmbox = 0;
                var flagmbox2 = 0;
                var flagmbox3 = 0;
                var idoltime = 0;
                var statideltime = 0;
                //var tmin = tObj[i].EXAM_DURATION;
                var tmin = exDuration;
                var poptime1 = Math.round(tmin/100*30);
                var poptime2 = Math.round(tmin/100*20);
                var poptime3 = Math.round(tmin/100*10);
                
                $("#getting-started").countdown(fiveSeconds, function(event) {
                    var h = eval(event.strftime('%H'))*60;
                    var m = eval(event.strftime('%M'))+h;
                    
                    if(idoltime%180 == 0 && idoltime != 0){
                        $('.timemsg').text((idoltime/60)+' min passed on this Questions!!');
                        $('#timealert').modal('show');
                         idoltime++;
                         statideltime++;
                    }else{
                        idoltime++;
                        statideltime++;    
                    }
                    //if(statideltime%300 == 0 && statideltime != 0){
                    if(statideltime%1800 == 0 && statideltime != 0){
                        var dt1 = new Date();
                        var today = new Date();
                        var liveDt = $('#liveTime').val();
                        var prevDate = new Date(liveDt);
                        var diffMs = (today - prevDate); // milliseconds between now & Christmas
                        var diffMins = Math.round(((diffMs % 86400000) % 3600000) / 60000);
                        /*if(diffMins > 25){
                            updateAttStatus('INACTIVE', testid, localStorage.icduserid);
                        }else{
                            updateAttStatus('ACTIVE', testid, localStorage.icduserid);
                        }*/
                        //alert(idoltime);
                    }
                    if(flagmbox == 0){
                        if(m == poptime1){
                            $('.timemsg').text(m+' min left to complete the Practice Questions!!');
                            $('#timealert').modal('show');
                            flagmbox=1;
                            //alert(idoltime);
                        }
                    }
                    if(flagmbox2 == 0){
                        if(m == poptime2){
                            $('.timemsg').text(m+' min left to complete the Practice Questions!!');
                            $('#timealert').modal('show');
                            flagmbox2 = 1;
                        }
                    }
                    if(flagmbox3 == 0){
                        if(m == poptime3){
                            $('.timemsg').text(m+' min left to complete the Practice Questions!!');
                            $('#timealert').modal('show');
                            flagmbox3 = 1;
                        }
                    }
                    $(this).text(event.strftime('%H:%M:%S'));
                }).on('finish.countdown', function() {
                    $('#msgbox').modal('show');
                    $('#finsbtn2').trigger('click');
                    $('.ansopt').prop('disabled',true);//for disable input if time is over

                });
                       
                /*** following code for showing data on report question popup ***/
                var retriveReportObject = localStorage.getItem('reportreasondata');
                var qrrObj = JSON.parse(retriveReportObject);
                var qrlen = qrrObj.length;
                var reportReas = '<label>Report Reason</label><select class="form-control" id="report_reason_id"><option value="">Select Reason</option>';
                for(rv = 0; rv < qrlen; rv++){
                    reportReas += '<option value="'+qrrObj[rv].QUESTION_REPORT_REASON_ID+'">'+qrrObj[rv].QUESTION_REPORT_REASON_NAME+'</option>';
                   
                }
                reportReas += '</select>';
                $('#reasonOption').html(reportReas);
                /*** End ***/ 

                $('.testhead').text(testlist);
                var names = tObj[i].SUBJECT_ID;
                
                //alert(names);
                var nameArr = names.split(',');
                //var retrievedObjects = localStorage.getItem('fullsubjectdata'); 
                var retrievedObjects = localStorage.getItem('testSubjects'); 
                var sObj = JSON.parse(retrievedObjects);
                
                z = sObj.length;
                var testlist3="";
                var subRestricted = [];
                var selRestrictQuesCnt = [];
                let totRestrictedCnt = 0;
                for (j = 0; j < z; j++) {
                    var n = nameArr.includes(sObj[j].subjectId);
                    if(n){
                        testlist3 += '<li role="presentation" ctab="'+sObj[j].subjectName+'" class="htabs"><a href="javascript:void(0);">'+sObj[j].subjectName+'</a></li>';
                        /*if(isQuestionRestricted == 'YES'){
                            if(quesRestrictedStatus == 'SECTIONWISE'){
                                subRestricted[sObj[j].subjectId] = sObj[j].QUESTION_RESTRICTED_COUNT;
                                totRestrictedCnt = Number(totRestrictedCnt) + Number(sObj[j].QUESTION_RESTRICTED_COUNT);
                            }else{
                                subRestricted[sObj[j].subjectId] = subRestrictedCount[j];
                                totRestrictedCnt = Number(totRestrictedCnt) + Number(subRestrictedCount[j]);
                            }
                        }*/
                    }
                }
                //console.log("subRestricted => ",subRestricted);
                if(totRestrictedCnt > 0){
                    $('#is_restricted_div').show();
                    $('#totRestrictedQue').text(totRestrictedCnt);
                }
                
                //console.log('subRestricted => ',subRestricted);
                $('.mlist').html(testlist3);

                $('.mlist').find('li:first').addClass("active");
                var xxtab = $('.mlist').find('li:first').text();
                $('#subhead').text(xxtab);
                $('#subhead').attr('ctab',xxtab);

                function changetab(gtab){
                    $('.htabs').each(function (i, obj) {
                      var atab = $(this).attr('ctab');
                      if(gtab == atab){
                        $(".mlist").find('li').removeClass("active");
                        $(this).addClass("active");
                        $('#subhead').text(atab);
                        $('#subhead').attr('ctab',atab);
                      }
                    });
                }
                       
                var data = localStorage.getItem('questionstext');
                var qObj = JSON.parse(data);
                //console.log('qObj => ',qObj);
                //console.log("qObj => ",qObj);
                qObj[0].startTime = startTime;
                
                var qasts = qObj[queno].question_type;
                $('#pqno').html(queno+1);
                var optionhtml="";
                /*if(qasts == 3 || qObj[queno].option1 == ""){
                    optionhtml = "";
                }else{*/
                var canQueCnt = 0;
                if(qasts != 3 || qObj[queno].option1 != ""){
                    var numOfQuest = qObj[queno].number_of_options;
                    $('.rdo-in').hide();
                    $('.check-in').hide();
                    if(qObj[queno].IS_CANCELED == 'YES'){
                        canQueCnt++;
                    }
                    //var optionhtml = '';
                    for(q = 1; q <= numOfQuest; q++){
                        //console.log('in rest => ',subRestricted[qObj[queno].subject_section_id]);
                        if(qasts == 1){
                            $('#rdo-in-'+q).show();
                            if(qObj[queno].IS_CANCELED == 'YES'){
                                //canQueCnt++;
                                //console.log('canQueCnt',canQueCnt);
                                $('#rdo-in-'+q+' input').prop('disabled',true);
                            }else{
                                $('#rdo-in-'+q+' input').prop('disabled',false);
                            }
                        }
                        if(qasts == 2){
                            $('#check-in-'+q).show();
                            if(qObj[queno].IS_CANCELED == 'YES'){
                                //canQueCnt++;
                                $('#check-in-'+q+' input').prop('disabled',true);
                            }else{
                                $('#check-in-'+q+' input').prop('disabled',false);
                            }
                        }
                        if(q == 1){
                            var optvar = qObj[queno].option1;
                        }
                        if(q == 2){
                            var optvar = qObj[queno].option2;
                        }
                        if(q == 3){
                            var optvar = qObj[queno].option3;
                        }
                        if(q == 4){
                            var optvar = qObj[queno].option4;
                        }
                        if(q == 5){
                            var optvar = qObj[queno].option5;
                        }
                        if(q == 6){
                            var optvar = qObj[queno].option6;
                        }
                        if(q == 7){
                            var optvar = qObj[queno].option7;
                        }
                        if(q == 8){
                            var optvar = qObj[queno].option8;
                        }
                        if(optionhtml == ''){
                            optionhtml += alphaArr[q]+')'+optvar;
                        }else{
                            optionhtml += "<br/>"+alphaArr[q]+')'+optvar;
                        }
                    }
                    //optionhtml='A) '+qObj[queno].option1+"<br/>B) "+qObj[queno].option2+"<br/>C) "+qObj[queno].option3+"<br/>D) "+qObj[queno].option4;
                }
                /*if(qObj[queno].instructions){
                    queIns = qObj[queno].instructions;
                }*/
                $('#pque').html(qObj[queno].question);
                $('#pqopt').html(optionhtml);
                applyCatex();
                applyCatexOnOption();
                /*typeset(() => {
                    const math = document.querySelector('#pque');
                    math.innerHTML = qObj[queno].instructions+'<br/>'+qObj[queno].question+'<br/>'+optionhtml;
                    return [math];
                });*/

                if(qObj[queno].IS_CANCELED == 'YES'){
                    $('#cancel-message-div').text('This Question has been canceled');
                }else{
                    $('#cancel-message-div').text('');
                }
                /*** following code is for report issue get current question id ***/
                $('#reportQuesId').val(qObj[queno].question_id);
                $('#reportQuesTypeId').val(qObj[queno].question_type);
                /*** End ***/
                var ad = 0;
                var na = 0;
                var nv = 0;
                var mr = 0;
                var mrc = 0;
                y = qObj.length;
                lstsno = y;
                var testlist2 = "";
                var stsval = "";
                var clr = "";

                for (j = 0; j < y; j++) {
                    
                    stsval = qObj[j].status;
                    ssans = qObj[j].given_answer;

                    if(stsval == "U"){
                        nv++;
                        clr = "default";
                        qObj[j].color = clr;
                    }
                    if(stsval == "A"){
                        ad++;
                        clr = "success";
                        qObj[j].color = clr;
                    }
                    if(stsval == "NA"){
                        na++;
                        clr = "danger";
                        qObj[j].color = clr;
                    }
                    if(stsval == "M"){
                        if(ssans == ""){
                            mr++;
                            clr = "purple";
                        }else{
                            mrc++;
                            clr = "purple btn-check";
                        }
                        qObj[j].color = 'purple';
                    }

                    testlist2 += '<button class="btn btn-'+clr+' palette" type="button">'+(j+1)+'</button> '; 
                    if((j+1)%4 == 0){
                        testlist2 += '</br>';
                    }
                }

                $('#cntnotv').text(nv);
                $('#cntnota').text(na);
                $('#cntansd').text(ad);
                $('#cntmark').text(mr);
                $('#cntmarkc').text(mrc);
                
                $('.qpallete').html(testlist2);

                //$('#pqopt').html(qObj[0].question);
                $('.radio').hide();
                $('.checkbox').hide();
                $('.number').hide();
                var sans = qObj[0].given_answer;
                if(qObj[0].question_type == 1){
                    $('.radio').show();
                    $('#anssingle .ansopt[value="'+sans+'"]').prop('checked', true);
                }
                if(qObj[0].question_type == 2){
                    $('.checkbox').show();
                }
                if(qObj[0].question_type == 3){
                    $('.number').show();
                    if(qObj[queno].IS_CANCELED == 'YES'){
                        canQueCnt++;
                        $('.number').hide();
                    }
                }


                $('.radio .ansopt').click(function(){
                    var x=$(this).val();
                    //console.log('qObj[queno].given_answer => ',qObj[queno].given_answer);
                    //console.log('qObj[queno] => ',qObj[queno]);
                    /*if(isQuestionRestricted == 'YES'){
                        if(quesRestrictedStatus == 'SECTIONWISE'){
                            if(selRestrictQuesCnt[qObj[queno].subject_section_id]){
                                if(qObj[queno].given_answer == ''){
                                    selRestrictQuesCnt[qObj[queno].subject_section_id] = Number(selRestrictQuesCnt[qObj[queno].subject_section_id]) + 1;
                                }
                            }else{
                                selRestrictQuesCnt[qObj[queno].subject_section_id] = 1;
                            }
                        }else{
                            if(selRestrictQuesCnt[qObj[queno].subject_id]){
                                if(qObj[queno].given_answer == ''){
                                    selRestrictQuesCnt[qObj[queno].subject_id] = Number(selRestrictQuesCnt[qObj[queno].subject_id]) + 1;
                                }
                            }else{
                                selRestrictQuesCnt[qObj[queno].subject_id] = 1;
                            }
                        }
                    }*/
                    qObj[queno].given_answer = x;
                })

                $('.checkbox .ansopt').click(function(){
                    var values = "";
                    $(".checkbox .ansopt:checked").each(function() { 
                        values += $(this).val() + ":";
                    });
                    values = values.substring(0, values.length - 1);
                    /*if(isQuestionRestricted == 'YES'){
                        if(quesRestrictedStatus == 'SECTIONWISE'){
                            if(selRestrictQuesCnt[qObj[queno].subject_section_id]){
                                if(qObj[queno].given_answer == ''){
                                    selRestrictQuesCnt[qObj[queno].subject_section_id] = Number(selRestrictQuesCnt[qObj[queno].subject_section_id]) + 1;
                                }else{
                                    if(values == ''){
                                        selRestrictQuesCnt[qObj[queno].subject_section_id] = Number(selRestrictQuesCnt[qObj[queno].subject_section_id]) - 1;
                                    }
                                }
                            }else{
                                selRestrictQuesCnt[qObj[queno].subject_section_id] = 1;
                            }
                        }else{
                            if(selRestrictQuesCnt[qObj[queno].subject_id]){
                                if(qObj[queno].given_answer == ''){
                                    selRestrictQuesCnt[qObj[queno].subject_id] = Number(selRestrictQuesCnt[qObj[queno].subject_id]) + 1;
                                }else{
                                    if(values == ''){
                                        selRestrictQuesCnt[qObj[queno].subject_id] = Number(selRestrictQuesCnt[qObj[queno].subject_id]) - 1;
                                    }
                                }
                            }else{
                                selRestrictQuesCnt[qObj[queno].subject_id] = 1;
                            }
                        }
                    }*/
                    qObj[queno].given_answer = values;
                })

                $('.number .ansopt').change(function(){
                    let x = $(this).val();
                    /*if(isQuestionRestricted == 'YES'){
                        if(quesRestrictedStatus == 'SECTIONWISE'){
                            if(selRestrictQuesCnt[qObj[queno].subject_section_id]){
                                if(qObj[queno].given_answer == ''){
                                    selRestrictQuesCnt[qObj[queno].subject_section_id] = Number(selRestrictQuesCnt[qObj[queno].subject_section_id]) + 1;
                                }else{
                                    if(x == ''){
                                        selRestrictQuesCnt[qObj[queno].subject_section_id] = Number(selRestrictQuesCnt[qObj[queno].subject_section_id]) - 1;
                                    }
                                }
                            }else{
                                selRestrictQuesCnt[qObj[queno].subject_section_id] = 1;
                            }
                        }else{
                            if(selRestrictQuesCnt[qObj[queno].subject_id]){
                                if(qObj[queno].given_answer == ''){
                                    selRestrictQuesCnt[qObj[queno].subject_id] = Number(selRestrictQuesCnt[qObj[queno].subject_id]) + 1;
                                }else{
                                    if(x == ''){
                                        selRestrictQuesCnt[qObj[queno].subject_id] = Number(selRestrictQuesCnt[qObj[queno].subject_id]) - 1;
                                    }
                                }
                            }else{
                                selRestrictQuesCnt[qObj[queno].subject_id] = 1;
                            }
                        }
                    }*/
                    qObj[queno].given_answer = x;
                });

                var tstart = (new Date()).getTime();
                var tend = 0;
                var interval = 0;
                var counttime = function(){
                    var t2 = (new Date()).getTime();
                    tend = t2;
                    idoltime = 0;
                    interval = tend-tstart;
                    tstart = tend;
                    //alert(interval);
                    var b = eval(qObj[queno].timetaken);
                    qObj[queno].timetaken = (b+interval/1000);
                }
                var countques = function() {
                    var ad = 0;
                    var na = 0;
                    var nv = 0;
                    var mr = 0;
                    var mrc = 0;
                    var ans = 0;
                    for(i = 0;i < y;i++){
                        
                        var stsval = qObj[i].status;
                        var ssans = qObj[i].given_answer;
                        //strsub+=stsval;
                        if(stsval == "U"){
                            nv++;
                        }
                        if(stsval == "A"){
                            ad++;
                        }
                        if(stsval == "NA"){
                            na++;
                        }
                        if(stsval == "M"){
                            if(ssans == ""){
                                mr++;
                            }else{
                                mrc++;
                            }
                        }
                        if(ssans != ""){
                            ans++;
                        }

                    }                            
                    $('#cntnotv').text(nv);
                    $('#cntnota').text(na);
                    $('#cntansd').text(ad);
                    $('#cntmark').text(mr);
                    $('#cntmarkc').text(mrc);
                    $('#answeredText').val(ans);
                }
                $('.mlist').on('click','li',function(){

                     let cque = $('#currentQuestion').val();
                    qObj[cque].time_consume = Number(qObj[cque].time_consume) + Number($('#count').val());
                    stopInterval()
                    startInterval() 


                    /*** For update time when click ***/
                    /*var edt = new Date();
                    var ecurr_month1 = edt.getMonth() + 1;
                    var livetime = edt.getFullYear() +  "-" + ecurr_month1 + "-" + edt.getDate() + " " + edt.getHours() + ":" + edt.getMinutes() + ":" + edt.getSeconds();
                    $('#liveTime').val(livetime);
                    if($('#liveStatus').val() == 'INACTIVE'){
                        updateAttStatus('ACTIVE', testid, localStorage.icduserid);
                    }*/
                    /*** End ***/

                    $(".mlist").find('li').css("border-color","#fff");
                    $(this).css("border-color","#F17336");
                    // do something
                    var clicksub = $(this).attr('ctab');
                    
                    var qcnt = qObj.length;
                    var jumpq = 0;
                    for (j = 0; j < qcnt; j++) {
                        if(qObj[j].section){
                            if(clicksub == qObj[j].section){
                                jumpq = j;
                                break;
                            }
                        }else{
                            if(clicksub == qObj[j].subject){
                                jumpq = j;
                                break;
                            }
                        }
                        
                    }
                    counttime();
                    queno = jumpq;
                    $('#currentQuestion').val(queno);
                    var que = qObj[queno].question_id;
                    var question = qObj[queno].instructions+'<br/>'+qObj[queno].question;
                    var clr = qObj[queno].color;
                    
                    if(qObj[queno].section){
                        var sub = qObj[queno].section;
                    }else{
                        var sub = qObj[queno].subject;
                    }
                    
                    var subx = sub.replace(/\s/g, "");
                    var subobj = 'li.'+subx;
                    var qatype = qObj[queno].question_type;
                    $('h4#subhead').text(sub);
                    changetab(sub);
                    var subobj = 'li.'+subx;
                    $('#pqno').html(queno+1);

                    var optionhtml = "";
                    /*if(qatype == 3 || qObj[queno].option1 == ""){
                        optionhtml="";
                    }else{*/
                    let restStat = 0;
                    if(qObj[queno].given_answer == ''){
                        /*if(isQuestionRestricted == 'YES'){
                            if(quesRestrictedStatus == 'SECTIONWISE'){
                                if(selRestrictQuesCnt[qObj[queno].subject_section_id]){
                                    if(subRestricted[qObj[queno].subject_section_id] == selRestrictQuesCnt[qObj[queno].subject_section_id]){
                                        restStat = 1;
                                    }
                                }
                            }else{
                                if(selRestrictQuesCnt[qObj[queno].subject_id]){
                                    if(subRestricted[qObj[queno].subject_id] == selRestrictQuesCnt[qObj[queno].subject_id]){
                                        restStat = 1;
                                    }
                                }
                            }
                        }*/
                    }
                    if(restStat == 1){
                        $('#restricted-message-div').text('Not attempt this question');
                    }else{
                        $('#restricted-message-div').text('');
                    }
                    if(qatype != 3 || qObj[queno].option1 != ""){
                        var numOfQuest = qObj[queno].number_of_options;
                        //var optionhtml = '';
                        $('.rdo-in').hide();
                        $('.check-in').hide();
                        for(q = 1; q <= numOfQuest; q++){
                            if(qatype == 1){
                                $('#rdo-in-'+q).show();
                                if(qObj[queno].IS_CANCELED == 'YES' || restStat == 1){
                                    $('#rdo-in-'+q+' input').prop('disabled',true);
                                }else{
                                    $('#rdo-in-'+q+' input').prop('disabled',false);
                                }
                            }
                            if(qatype == 2){
                                $('#check-in-'+q).show();
                                if(qObj[queno].IS_CANCELED == 'YES' || restStat == 1){
                                    $('#check-in-'+q+' input').prop('disabled',true);
                                }else{
                                    $('#check-in-'+q+' input').prop('disabled',false);
                                }
                            }
                            if(q == 1){
                                var optvar = qObj[queno].option1;
                            }
                            if(q == 2){
                                var optvar = qObj[queno].option2;
                            }
                            if(q == 3){
                                var optvar = qObj[queno].option3;
                            }
                            if(q == 4){
                                var optvar = qObj[queno].option4;
                            }
                            if(q == 5){
                                var optvar = qObj[queno].option5;
                            }
                            if(q == 6){
                                var optvar = qObj[queno].option6;
                            }
                            if(q == 7){
                                var optvar = qObj[queno].option7;
                            }
                            if(q == 8){
                                var optvar = qObj[queno].option8;
                            }
                            if(optionhtml == ''){
                                optionhtml += alphaArr[q]+')'+optvar;
                            }else{
                                optionhtml += "<br/>"+alphaArr[q]+')'+optvar;
                            }
                        }

                        //optionhtml='A) '+qObj[queno].option1+"<br/>B) "+qObj[queno].option2+"<br/>C) "+qObj[queno].option3+"<br/>D) "+qObj[queno].option4;
                    }

                    if(qObj[queno].IS_CANCELED == 'YES'){
                        $('#cancel-message-div').text('This Question has been canceled');
                    }else{
                        $('#cancel-message-div').text('');
                    }

                    /*if(qObj[queno].instructions){
                        queIns = qObj[queno].instructions;
                    }*/
                    $('#pque').html(qObj[queno].question);
                    $('#pqopt').html(optionhtml);
                    applyCatex();
                    applyCatexOnOption();
                    /*typeset(() => {
                        const math = document.querySelector('#pque');
                        math.innerHTML = qObj[queno].instructions+'<br/>'+qObj[queno].question+'<br/>'+optionhtml;
                        return [math];
                    });*/

                    $('.qspannel').animate({left: '100%'});
                    /*** following code is for report issue get current question id ***/
                    $('#reportQuesId').val(qObj[queno].question_id);
                    $('#reportQuesTypeId').val(qObj[queno].question_type);
                    /*** End ***/
                    qpflag = 0;
                    var sts = qObj[queno].status;
                    if(sts != "A" && sts != "M"){
                        $('.qpallete').find('button.palette').eq(queno).removeClass('btn-'+clr);
                        $('.qpallete').find('button.palette').eq(queno).addClass('btn-danger');
                        qObj[queno].status='NA';
                        qObj[queno].color='danger';
                    }
                    //var qatype=qObj[queno].question_type; 
                    var ansq = qObj[queno].given_answer;
                    $('.ansopt').prop('checked', false);
                    setOptions(eval(queno));
                    countques();
                });

                $('.qpallete').on('click', 'button.palette', function() {
                    let cque = $('#currentQuestion').val();
                    qObj[cque].time_consume = Number(qObj[cque].time_consume) + Number($('#count').val());
                    stopInterval()
                    startInterval() 

                    counttime();

                    /*** For update time when click ***/
                    /*var edt = new Date();
                    var ecurr_month1 = edt.getMonth() + 1;
                    var livetime = edt.getFullYear() +  "-" + ecurr_month1 + "-" + edt.getDate() + " " + edt.getHours() + ":" + edt.getMinutes() + ":" + edt.getSeconds();
                    $('#liveTime').val(livetime);
                    if($('#liveStatus').val() == 'INACTIVE'){
                        updateAttStatus('ACTIVE', testid, localStorage.icduserid);
                    }*/
                    /*** End ***/

                    queno = $(this).text()-1;

                    $('#currentQuestion').val(queno);

                    var que = qObj[queno].question_id;
                    var question = qObj[queno].instructions+'<br/>'+qObj[queno].question;
                    var clr = qObj[queno].color;
                    if(qObj[queno].section){
                        var sub = qObj[queno].section;
                    }else{
                        var sub = qObj[queno].subject;
                    }
                    var subx = sub.replace(/\s/g, "");
                    var subobj = 'li.'+subx;
                    var qatype = qObj[queno].question_type;
                    //console.log('qObj[queno] => ', qObj[queno]);
                    /*** following code added for click on color pallet and refress input according to question number***/
                    if(qatype == 3){
                        var npadans = $('.number .ansopt').val();
                        if(npadans != ""){
                            var f = true;
                        }else{
                            var f = false;
                        }
                    }else{
                        var f = $('.ansopt').is(':checked');
                    } 
                    
                    $('.ansopt').prop('checked', false);
                    /*** End ***/
                    $('h4#subhead').text(sub);
                    changetab(sub);
                    var subobj = 'li.'+subx;

                    $('#pqno').html(queno+1);
                    var optionhtml = "";
                    /*if(qatype == 3 || qObj[queno].option1 == ""){
                        optionhtml="";
                    }else{*/
                    let restStat = 0;
                    if(qObj[queno].given_answer == ''){
                        /*if(isQuestionRestricted == 'YES'){
                            if(quesRestrictedStatus == 'SECTIONWISE'){
                                if(selRestrictQuesCnt[qObj[queno].subject_section_id]){
                                    if(subRestricted[qObj[queno].subject_section_id] == selRestrictQuesCnt[qObj[queno].subject_section_id]){
                                        restStat = 1;
                                    }
                                }
                            }else{
                                if(selRestrictQuesCnt[qObj[queno].subject_id]){
                                    if(subRestricted[qObj[queno].subject_id] == selRestrictQuesCnt[qObj[queno].subject_id]){
                                        restStat = 1;
                                    }
                                }
                            }
                        }*/
                    }
                    if(restStat == 1){
                        $('#restricted-message-div').text('Not attempt this question');
                    }else{
                        $('#restricted-message-div').text('');
                    }
                    if(qatype != 3 || qObj[queno].option1 != ""){
                        var numOfQuest = qObj[queno].number_of_options;
                        $('.rdo-in').hide();
                        $('.check-in').hide();
                        //var optionhtml = '';
                        for(q = 1; q <= numOfQuest; q++){
                            if(qatype == 1){
                                $('#rdo-in-'+q).show();
                                if(qObj[queno].IS_CANCELED == 'YES' || restStat == 1){
                                    $('#rdo-in-'+q+' input').prop('disabled',true);
                                }else{
                                    $('#rdo-in-'+q+' input').prop('disabled',false);
                                }
                            }
                            if(qatype == 2){
                                $('#check-in-'+q).show();
                                if(qObj[queno].IS_CANCELED == 'YES' || restStat == 1){
                                    $('#check-in-'+q+' input').prop('disabled',true);
                                }else{
                                    $('#check-in-'+q+' input').prop('disabled',false);
                                }
                            }
                            if(q == 1){
                                var optvar = qObj[queno].option1;
                            }
                            if(q == 2){
                                var optvar = qObj[queno].option2;
                            }
                            if(q == 3){
                                var optvar = qObj[queno].option3;
                            }
                            if(q == 4){
                                var optvar = qObj[queno].option4;
                            }
                            if(q == 5){
                                var optvar = qObj[queno].option5;
                            }
                            if(q == 6){
                                var optvar = qObj[queno].option6;
                            }
                            if(q == 7){
                                var optvar = qObj[queno].option7;
                            }
                            if(q == 8){
                                var optvar = qObj[queno].option8;
                            }
                            if(optionhtml == ''){
                                optionhtml += alphaArr[q]+')'+optvar;
                            }else{
                                optionhtml += "<br/>"+alphaArr[q]+')'+optvar;
                            }
                        }
                        //optionhtml='A) '+qObj[queno].option1+"<br/>B) "+qObj[queno].option2+"<br/>C) "+qObj[queno].option3+"<br/>D) "+qObj[queno].option4;
                    }

                    if(qObj[queno].IS_CANCELED == 'YES'){
                        $('#cancel-message-div').text('This Question has been canceled');
                    }else{
                        $('#cancel-message-div').text('');
                    }

                    /*typeset(() => {
                        const math = document.querySelector('#pque');
                        math.innerHTML = qObj[queno].instructions+'<br/>'+qObj[queno].question+'<br/>'+optionhtml;
                        return [math];
                    });*/
                    

                    /*if(qObj[queno].instructions){
                        queIns = qObj[queno].instructions;
                    }*/
                    $('#pque').html(qObj[queno].question);
                    $('#pqopt').html(optionhtml);
                    applyCatex();
                    applyCatexOnOption();
                    //myMathFunction();
                    $('.qspannel').animate({left: '100%'});
                    /*** following code is for report issue get current question id ***/
                    $('#reportQuesId').val(qObj[queno].question_id);
                    $('#reportQuesTypeId').val(qObj[queno].question_type);
                    /*** End ***/

                    qpflag = 0;
                    var sts = qObj[queno].status;
                    if(sts != "A" && sts != "M"){
                        $('.qpallete').find('button.palette').eq(queno).removeClass('btn-'+clr);
                        $('.qpallete').find('button.palette').eq(queno).addClass('btn-danger');
                        qObj[queno].status='NA';
                        qObj[queno].color='danger';
                    }
                    var qatype = qObj[queno].question_type; 
                    var ansq = qObj[queno].given_answer;
                    
                    $('.ansopt').prop('checked', false);
                    setOptions(eval(queno));
                    
                    countques();
                });

                $('#clrres').click(function(){
                    /*** For update time when click ***/
                    /*var edt = new Date();
                    var ecurr_month1 = edt.getMonth() + 1;
                    var livetime = edt.getFullYear() +  "-" + ecurr_month1 + "-" + edt.getDate() + " " + edt.getHours() + ":" + edt.getMinutes() + ":" + edt.getSeconds();
                    $('#liveTime').val(livetime);
                    if($('#liveStatus').val() == 'INACTIVE'){
                        updateAttStatus('ACTIVE', testid, localStorage.icduserid);
                    }*/
                    /*** End ***/
                    /*if(isQuestionRestricted == 'YES'){
                        if(quesRestrictedStatus == 'SECTIONWISE'){
                            if(selRestrictQuesCnt[qObj[queno].subject_section_id]){
                                if(qObj[queno].given_answer != ''){
                                    selRestrictQuesCnt[qObj[queno].subject_section_id] = Number(selRestrictQuesCnt[qObj[queno].subject_section_id]) - 1;
                                }
                            }
                        }else{
                            if(selRestrictQuesCnt[qObj[queno].subject_id]){
                                if(qObj[queno].given_answer != ''){
                                    selRestrictQuesCnt[qObj[queno].subject_id] = Number(selRestrictQuesCnt[qObj[queno].subject_id]) - 1;
                                }
                            }
                        }
                    }*/

                    qObj[queno].given_answer = '';
                    var qatype = qObj[queno].question_type;
                            
                    if(eval(qatype) == 3){
                        $('.ansopt').val('');
                    }else{
                        $('.ansopt').prop('checked', false);
                    }
                    
                    var clr = qObj[queno].color;
                    $('.qpallete').find('button.palette').eq(queno).removeClass('btn-'+clr);
                    $('.qpallete').find('button.palette').eq(queno).removeClass('btn-check');
                    qObj[queno].status = 'NA';
                    $('.qpallete').find('button.palette').eq(queno).addClass('btn-danger');
                    qObj[queno].color = 'danger';
                    
                    var a = qObj[queno].id;
                    var b = qObj[queno].given_answer;
                    var c = qObj[queno].status;
                    var d = qObj[queno].timetaken;
                    /*$.ajax({
                        url : jsonurl+"submit_answer.php?id="+a+"&ans="+b+"&s="+c+"&time="+d,
                        type: 'GET'
                    });*/
                    countques();
                });

                //$('#savenext').click(function(){    
                $('.ansopt').on('change',function(){    
                    counttime();
                    var clr = qObj[queno].color;
                    var qasts = qObj[queno].question_type;

                    var end_date = $('#endDate').val();
                    /*** For update time when click ***/
                    var edt = new Date();
                    var ecurr_month1 = edt.getMonth() + 1;
                    /*var livetime = edt.getFullYear() +  "-" + ecurr_month1 + "-" + edt.getDate() + " " + edt.getHours() + ":" + edt.getMinutes() + ":" + edt.getSeconds();
                    $('#liveTime').val(livetime);
                    if($('#liveStatus').val() == 'INACTIVE'){
                        
                        updateAttStatus('ACTIVE', testid, localStorage.icduserid);
                    }*/
                    /*** End ***/
                    if(end_date != ''){
                        var ecurr_month = edt.getMonth() + 1;
                        end_date = edt.getFullYear() +  "-" + ecurr_month + "-" + edt.getDate() + " " + edt.getHours() + ":" + edt.getMinutes() +":" + edt.getSeconds();
                        $('#endDate').val(end_date);
                    }

                    $('.qpallete').find('button.palette').eq(queno).removeClass('btn-'+clr);
                    if(qasts == 3){
                        var npadans = $('.number .ansopt').val();
                        if(npadans != ""){
                            var f = true;
                        }else{
                            var f = false;
                        }
                    }else{
                        var f = $('.ansopt').is(':checked');
                    } 

                    $('.qpallete').find('button.palette').eq(queno).removeClass('btn-check');
                    if(f){
                        $('.qpallete').find('button.palette').eq(queno).addClass('btn-success');
                        qObj[queno].status = 'A';
                        qObj[queno].color = 'success';
                    }else{
                        qObj[queno].status = 'NA';
                        $('.qpallete').find('button.palette').eq(queno).addClass('btn-danger');
                        qObj[queno].color = 'danger';
                    }
                    $('.ansopt').prop('checked', false);

                    var a = qObj[queno].id;
                    var b = qObj[queno].given_answer;
                    var c = qObj[queno].status;
                    var d = qObj[queno].timetaken;
                   
                   /* $.ajax({
                        url : jsonurl+"submit_answer.php?id="+a+"&ans="+b+"&s="+c+"&time="+d,
                        type: 'GET'
                    });*/
                        
                    //queno++;
                    if(queno==lstsno){
                        queno=queno-1;
                        //following code is for show submit popup after click on last save and next button
                        $('.qspannel').animate(({left: '100%'}));
                        qpflag=0;
                        var totQuest = $('#totalQuest').val();
                        var answered = $('#answeredText').val();
                        var notAns = Number(totQuest) - Number(answered) - Number(canQueCnt);
                        $('#totQuest').text(totQuest);
                        $('#totAnswered').text(answered);
                        $('#totNotAnswered').text(notAns);
                        $('#totCancelQue').text(canQueCnt);
                        $('#confirmbox').modal('show');
                    }
                    
                    var que = qObj[queno].question_id;
                    var question = qObj[queno].instructions+'<br/>'+qObj[queno].question;
                    var clr = qObj[queno].color;
                    if(qObj[queno].section){
                        var sub = qObj[queno].section;
                    }else{
                        var sub = qObj[queno].subject;
                    }
                    var qasts = qObj[queno].question_type;
                    var subx = sub.replace(/\s/g, "");
                    var subobj = 'li.'+subx;
                    
                    $('#pqno').html(queno+1);
                    var optionhtml="";
                    /*if(qasts ==3 || qObj[queno].option1==""){
                        optionhtml="";
                    }else{*/
                    if(qasts != 3 || qObj[queno].option1 != ""){
                        var numOfQuest = qObj[queno].number_of_options;
                        $('.rdo-in').hide();
                        $('.check-in').hide();
                        var optionhtml = '';
                        for(q = 1; q <= numOfQuest; q++){
                            if(qasts == 1){
                                $('#rdo-in-'+q).show();
                            }
                            if(qasts == 2){
                                $('#check-in-'+q).show();
                            }
                            if(q == 1){
                                var optvar = qObj[queno].option1;
                            }
                            if(q == 2){
                                var optvar = qObj[queno].option2;
                            }
                            if(q == 3){
                                var optvar = qObj[queno].option3;
                            }
                            if(q == 4){
                                var optvar = qObj[queno].option4;
                            }
                            if(q == 5){
                                var optvar = qObj[queno].option5;
                            }
                            if(q == 6){
                                var optvar = qObj[queno].option6;
                            }
                            if(q == 7){
                                var optvar = qObj[queno].option7;
                            }
                            if(q == 8){
                                var optvar = qObj[queno].option8;
                            }
                            if(optionhtml == ''){
                                optionhtml += alphaArr[q]+')'+optvar;
                            }else{
                                optionhtml += "<br/>"+alphaArr[q]+')'+optvar;
                            }
                        }
                        //optionhtml='A) '+qObj[queno].option1+"<br/>B) "+qObj[queno].option2+"<br/>C) "+qObj[queno].option3+"<br/>D) "+qObj[queno].option4;
                    }
                    /*typeset(() => {
                        const math = document.querySelector('#pque');
                        math.innerHTML = qObj[queno].instructions+'<br/>'+qObj[queno].question+'<br/>'+optionhtml;
                        return [math];
                    });*/
                   
                    /*if(qObj[queno].instructions){
                        queIns = qObj[queno].instructions;
                    }*/
                    $('#pque').html(qObj[queno].question);
                    $('#pqopt').html(optionhtml);
                    applyCatex();
                    applyCatexOnOption();

                    /*** following code is for report issue get current question id ***/
                    $('#reportQuesId').val(qObj[queno].question_id);
                    $('#reportQuesTypeId').val(qObj[queno].question_type);
                    /*** End ***/

                    $('h4#subhead').text(sub);
                    changetab(sub);
                    var sts = qObj[queno].status;
                    if(sts != "A" && sts != "M"){
                        $('.qpallete').find('button.palette').eq(queno).removeClass('btn-'+clr);
                        $('.qpallete').find('button.palette').eq(queno).addClass('btn-danger');
                        qObj[queno].status='NA';
                        qObj[queno].color='danger';
                    }
                    var qatype = qObj[queno].question_type; 
                    setOptions(eval(queno));
                    var ansq=qObj[queno].given_answer;
                    countques();

                });

                /*** on save and nex button click new code 25-01-22 ***/
                $('#savenext').click(function(){   
                    qObj[queno].time_consume = Number(qObj[queno].time_consume) + Number($('#count').val());
                    stopInterval()
                    startInterval()         
                    //console.log('selRestrictQuesCnt => ', selRestrictQuesCnt);
                //$('.ansopt').on('change',function(){    
                    counttime();
                    /*** For update time when click ***/
                    /*var edt = new Date();
                    var ecurr_month1 = edt.getMonth() + 1;
                    var livetime = edt.getFullYear() +  "-" + ecurr_month1 + "-" + edt.getDate() + " " + edt.getHours() + ":" + edt.getMinutes() + ":" + edt.getSeconds();
                    $('#liveTime').val(livetime);
                    if($('#liveStatus').val() == 'INACTIVE'){
                        updateAttStatus('ACTIVE', testid, localStorage.icduserid);
                    }*/
                    /*** End ***/

                    var clr = qObj[queno].color;
                    var qasts = qObj[queno].question_type;

                    $('.qpallete').find('button.palette').eq(queno).removeClass('btn-'+clr);
                    if(qasts == 3){
                        var npadans = $('.number .ansopt').val();
                        if(npadans != ""){
                            var f = true;
                        }else{
                            var f = false;
                        }
                    }else{
                        var f = $('.ansopt').is(':checked');
                    } 

                    $('.qpallete').find('button.palette').eq(queno).removeClass('btn-check');
                    if(f){
                        $('.qpallete').find('button.palette').eq(queno).addClass('btn-success');
                        qObj[queno].status = 'A';
                        qObj[queno].color = 'success';
                    }else{
                        qObj[queno].status = 'NA';
                        $('.qpallete').find('button.palette').eq(queno).addClass('btn-danger');
                        qObj[queno].color = 'danger';
                    }
                    $('.ansopt').prop('checked', false);

                    var a = qObj[queno].id;
                    var b = qObj[queno].given_answer;
                    var c = qObj[queno].status;
                    var d = qObj[queno].timetaken;
                   
                   /* $.ajax({
                        url : jsonurl+"submit_answer.php?id="+a+"&ans="+b+"&s="+c+"&time="+d,
                        type: 'GET'
                    });*/
                        
                    queno++;
                    if(queno==lstsno){
                        queno=queno-1;
                        //following code is for show submit popup after click on last save and next button
                        $('.qspannel').animate(({left: '100%'}));
                        qpflag=0;
                        /*var totQuest = $('#totalQuest').val();
                        var answered = $('#answeredText').val();
                        var notAns = Number(totQuest) - Number(answered) - Number(canQueCnt);
                        $('#totQuest').text(totQuest);
                        $('#totAnswered').text(answered);
                        $('#totNotAnswered').text(notAns);
                        $('#totCancelQue').text(canQueCnt);
                        $('#confirmbox').modal('show');*/

                        var answered = $('#cntansd').text();
                        var notAnswered = $('#cntnota').text();
                        var notVisited = $('#cntnotv').text();
                        var naMarkReview = $('#cntmark').text();
                        var aMarkReview = $('#cntmarkc').text();

                        var totQuest = Number(answered) + Number(notAnswered) + Number(notVisited) + Number(naMarkReview) + Number(aMarkReview);
                        var totAnswered = Number(answered) + Number(aMarkReview);

                        var notAns = Number(notVisited) + Number(naMarkReview) + Number(notAnswered) - Number(canQueCnt);

                        $('#totQuest').text(totQuest);
                        $('#totAnswered').text(totAnswered);
                        $('#totNotAnswered').text(notAns);
                        $('#totCancelQue').text(canQueCnt);

                        if(canQueCnt > 0){
                            $('#canQueCntDiv').show();
                        }else{
                            $('#canQueCntDiv').hide();
                        }
                        $('#confirmbox').modal('show');
                    }
                    $('#currentQuestion').val(queno);
                    var que = qObj[queno].question_id;
                    var question = qObj[queno].instructions+'<br/>'+qObj[queno].question;
                    var clr = qObj[queno].color;
                    if(qObj[queno].section){
                        var sub = qObj[queno].section;
                    }else{
                        var sub = qObj[queno].subject;
                    }
                    var qasts = qObj[queno].question_type;
                    var subx = sub.replace(/\s/g, "");
                    var subobj = 'li.'+subx;
                    
                    $('#pqno').html(queno+1);
                    var optionhtml="";
                    /*if(qasts ==3 || qObj[queno].option1==""){
                        optionhtml="";
                    }else{*/
                    let restStat = 0;
                    if(qObj[queno].given_answer == ''){
                        /*if(isQuestionRestricted == 'YES'){
                            if(quesRestrictedStatus == 'SECTIONWISE'){
                                if(selRestrictQuesCnt[qObj[queno].subject_section_id]){
                                    if(subRestricted[qObj[queno].subject_section_id] == selRestrictQuesCnt[qObj[queno].subject_section_id]){
                                        restStat = 1;
                                    }
                                }
                            }else{
                                if(selRestrictQuesCnt[qObj[queno].subject_id]){
                                    if(subRestricted[qObj[queno].subject_id] == selRestrictQuesCnt[qObj[queno].subject_id]){
                                        restStat = 1;
                                    }
                                }
                            }
                        }*/
                    }
                    if(restStat == 1){
                        $('#restricted-message-div').text('Not attempt this question');
                    }else{
                        $('#restricted-message-div').text('');
                    }

                    if(qasts != 3 || qObj[queno].option1 != ""){
                        var numOfQuest = qObj[queno].number_of_options;
                        $('.rdo-in').hide();
                        $('.check-in').hide();
                        var optionhtml = '';
                        for(q = 1; q <= numOfQuest; q++){
                            if(qasts == 1){
                                $('#rdo-in-'+q).show();
                                if(qObj[queno].IS_CANCELED == 'YES' || restStat == 1){
                                    $('#rdo-in-'+q+' input').prop('disabled',true);
                                }else{
                                    $('#rdo-in-'+q+' input').prop('disabled',false);
                                }
                            }
                            if(qasts == 2){
                                $('#check-in-'+q).show();
                                if(qObj[queno].IS_CANCELED == 'YES' || restStat == 1){
                                    $('#check-in-'+q+' input').prop('disabled',true);
                                }else{
                                    $('#check-in-'+q+' input').prop('disabled',false);
                                }
                            }
                            if(q == 1){
                                var optvar = qObj[queno].option1;
                            }
                            if(q == 2){
                                var optvar = qObj[queno].option2;
                            }
                            if(q == 3){
                                var optvar = qObj[queno].option3;
                            }
                            if(q == 4){
                                var optvar = qObj[queno].option4;
                            }
                            if(q == 5){
                                var optvar = qObj[queno].option5;
                            }
                            if(q == 6){
                                var optvar = qObj[queno].option6;
                            }
                            if(q == 7){
                                var optvar = qObj[queno].option7;
                            }
                            if(q == 8){
                                var optvar = qObj[queno].option8;
                            }
                            if(optionhtml == ''){
                                optionhtml += alphaArr[q]+')'+optvar;
                            }else{
                                optionhtml += "<br/>"+alphaArr[q]+')'+optvar;
                            }
                        }
                        //optionhtml='A) '+qObj[queno].option1+"<br/>B) "+qObj[queno].option2+"<br/>C) "+qObj[queno].option3+"<br/>D) "+qObj[queno].option4;
                    }

                    if(qObj[queno].IS_CANCELED == 'YES'){
                        $('#cancel-message-div').text('This Question has been canceled');
                    }else{
                        $('#cancel-message-div').text('');
                    }
                    
                    /*if(qObj[queno].instructions){
                        queIns = qObj[queno].instructions;
                    }*/
                    $('#pque').html(qObj[queno].question);
                    $('#pqopt').html(optionhtml);
                    applyCatex();
                    applyCatexOnOption();

                    /*typeset(() => {
                        const math = document.querySelector('#pque');
                        math.innerHTML = qObj[queno].instructions+'<br/>'+qObj[queno].question+'<br/>'+optionhtml;
                        return [math];
                    });*/

                    /*** following code is for report issue get current question id ***/
                    $('#reportQuesId').val(qObj[queno].question_id);
                    $('#reportQuesTypeId').val(qObj[queno].question_type);
                    /*** End ***/

                    $('h4#subhead').text(sub);
                    changetab(sub);
                    var sts = qObj[queno].status;
                    if(sts != "A" && sts != "M"){
                        $('.qpallete').find('button.palette').eq(queno).removeClass('btn-'+clr);
                        $('.qpallete').find('button.palette').eq(queno).addClass('btn-danger');
                        qObj[queno].status='NA';
                        qObj[queno].color='danger';
                    }
                    var qatype = qObj[queno].question_type; 
                    setOptions(eval(queno));
                    var ansq=qObj[queno].given_answer;
                    countques();

                });
                /*** End ***/
                $('#mfreview').click(function(){  
                    qObj[queno].time_consume = Number(qObj[queno].time_consume) + Number($('#count').val());
                    stopInterval()
                    startInterval() 

                     counttime();
                    /*** For update time when click ***/
                    /*var edt = new Date();
                    var ecurr_month1 = edt.getMonth() + 1;
                    var livetime = edt.getFullYear() +  "-" + ecurr_month1 + "-" + edt.getDate() + " " + edt.getHours() + ":" + edt.getMinutes() + ":" + edt.getSeconds();
                    $('#liveTime').val(livetime);
                    if($('#liveStatus').val() == 'INACTIVE'){
                        updateAttStatus('ACTIVE', testid, localStorage.icduserid);
                    }*/
                    /*** End ***/
                    var clr=qObj[queno].color;
                    qObj[queno].status = 'M';

                    $('.qpallete').find('button.palette').eq(queno).removeClass('btn-'+clr);
                    $('.qpallete').find('button.palette').eq(queno).addClass('btn-purple');
                    qObj[queno].color='purple';
                    var qasts = qObj[queno].question_type;
                    if(qasts == 3){
                        var npadans = $('.number .ansopt').val();
                        if(npadans != ""){
                            var f = true;
                        }else{
                            var f = false;
                        }
                    }else{
                        var f = $('.ansopt').is(':checked');
                    } 
                    if(f){
                        $('.qpallete').find('button.palette').eq(queno).addClass('btn-check');
                    }
                    $('.ansopt').prop('checked', false);
                    var a = qObj[queno].id;
                    var b = qObj[queno].given_answer;
                    var c = qObj[queno].status;
                    var d = qObj[queno].timetaken;

                    /*$.ajax({
                        url : jsonurl+"submit_answer.php?id="+a+"&ans="+b+"&s="+c+"&time="+d,
                        type: 'GET'
                    });*/

                    queno++;
                    if(queno == lstsno){
                        queno = 0;
                    }

                    $('#currentQuestion').val(queno);

                    var que = qObj[queno].question_id;
                    var question = qObj[queno].instructions+'<br/>'+qObj[queno].question;
                    var clr = qObj[queno].color;
                    if(qObj[queno].section){
                        var sub = qObj[queno].section;
                    }else{
                        var sub = qObj[queno].subject;
                    }
                    var subx = sub.replace(/\s/g, "");
                    var subobj = 'li.'+subx;
                    $('h4#subhead').text(sub);
                    changetab(sub);
                    $('#pqno').html(queno+1);
                     var optionhtml = "";
                    /*if(qasts == 3 || qObj[queno].option1 == ""){
                        optionhtml = "";
                    }else{*/

                    let restStat = 0;
                    if(qObj[queno].given_answer == ''){
                        /*if(isQuestionRestricted == 'YES'){
                            if(quesRestrictedStatus == 'SECTIONWISE'){
                                if(selRestrictQuesCnt[qObj[queno].subject_section_id]){
                                    if(subRestricted[qObj[queno].subject_section_id] == selRestrictQuesCnt[qObj[queno].subject_section_id]){
                                        restStat = 1;
                                    }
                                }
                            }else{
                                if(selRestrictQuesCnt[qObj[queno].subject_id]){
                                    if(subRestricted[qObj[queno].subject_id] == selRestrictQuesCnt[qObj[queno].subject_id]){
                                        restStat = 1;
                                    }
                                }
                            }
                        }*/
                    }
                    if(restStat == 1){
                        $('#restricted-message-div').text('Not attempt this question');
                    }else{
                        $('#restricted-message-div').text('');
                    }
                    if(qasts != 3 || qObj[queno].option1 != ""){
                        var numOfQuest = qObj[queno].number_of_options;
                        //var optionhtml = '';
                        $('.rdo-in').hide();
                        $('.check-in').hide();
                        for(q = 1; q <= numOfQuest; q++){
                            if(qasts == 1){
                                $('#rdo-in-'+q).show();
                                if(qObj[queno].IS_CANCELED == 'YES' || restStat == 1){
                                    $('#rdo-in-'+q+' input').prop('disabled',true);
                                }else{
                                    $('#rdo-in-'+q+' input').prop('disabled',false);
                                }
                            }
                            if(qasts == 2){
                                $('#check-in-'+q).show();
                                if(qObj[queno].IS_CANCELED == 'YES' || restStat == 1){
                                    $('#check-in-'+q+' input').prop('disabled',true);
                                }else{
                                    $('#check-in-'+q+' input').prop('disabled',false);
                                }
                            }
                            if(q == 1){
                                var optvar = qObj[queno].option1;
                            }
                            if(q == 2){
                                var optvar = qObj[queno].option2;
                            }
                            if(q == 3){
                                var optvar = qObj[queno].option3;
                            }
                            if(q == 4){
                                var optvar = qObj[queno].option4;
                            }
                            if(q == 5){
                                var optvar = qObj[queno].option5;
                            }
                            if(q == 6){
                                var optvar = qObj[queno].option6;
                            }
                            if(q == 7){
                                var optvar = qObj[queno].option7;
                            }
                            if(q == 8){
                                var optvar = qObj[queno].option8;
                            }
                            if(optionhtml == ''){
                                optionhtml += alphaArr[q]+')'+optvar;
                            }else{
                                optionhtml += "<br/>"+alphaArr[q]+')'+optvar;
                            }
                        }
                        //optionhtml='A) '+qObj[queno].option1+"<br/>B) "+qObj[queno].option2+"<br/>C) "+qObj[queno].option3+"<br/>D) "+qObj[queno].option4;
                    }

                    if(qObj[queno].IS_CANCELED == 'YES'){
                        $('#cancel-message-div').text('This Question has been canceled');
                    }else{
                        $('#cancel-message-div').text('');
                    }

                   
                    /*if(qObj[queno].instructions){
                        queIns = qObj[queno].instructions;
                    }*/
                    $('#pque').html(qObj[queno].question);
                    $('#pqopt').html(optionhtml);
                    applyCatex();
                    applyCatexOnOption();
                    /*typeset(() => {
                        const math = document.querySelector('#pque');
                        math.innerHTML = qObj[queno].instructions+'<br/>'+qObj[queno].question+'<br/>'+optionhtml;
                        return [math];
                    });*/
                    /*** following code is for report issue get current question id ***/
                    $('#reportQuesId').val(qObj[queno].question_id);
                    $('#reportQuesTypeId').val(qObj[queno].question_type);
                    /*** End ***/
                    var qatype=qObj[queno].question_type; 
                    setOptions(eval(queno));
                    var ansq=qObj[queno].given_answer;

                    if(ansq!=""){
                           // $('.ansopt[value="'+ansq+'"]').prop('checked', true);
                    }

                    var sts=qObj[queno].status;
                    if(sts!="A" && sts!="M"){
                        $('.qpallete').find('button.palette').eq(queno).removeClass('btn-'+clr);
                        $('.qpallete').find('button.palette').eq(queno).addClass('btn-danger');
                        qObj[queno].status='NA';
                        qObj[queno].color='danger';
                    } 
                    countques();
                });

                $('#submittest,#submittest_mob').click(function(){

                    let cque = $('#currentQuestion').val();
                    qObj[cque].time_consume = Number(qObj[cque].time_consume) + Number($('#count').val());
                    stopInterval()
                    /*var totQuest = $('#totalQuest').val();
                    var answered = $('#answeredText').val();
                    var notAns = Number(totQuest) - Number(answered);
                    $('#totQuest').text(totQuest);
                    $('#totAnswered').text(answered);
                    $('#totNotAnswered').text(notAns);*/

                    var answered = $('#cntansd').text();
                    var notAnswered = $('#cntnota').text();
                    var notVisited = $('#cntnotv').text();
                    var naMarkReview = $('#cntmark').text();
                    var aMarkReview = $('#cntmarkc').text();

                    var totQuest = Number(answered) + Number(notAnswered) + Number(notVisited) + Number(naMarkReview) + Number(aMarkReview);
                    var totAnswered = Number(answered) + Number(aMarkReview);

                    var notAns = Number(notVisited) + Number(naMarkReview) + Number(notAnswered) - Number(canQueCnt);

                    $('#totQuest').text(totQuest);
                    $('#totAnswered').text(totAnswered);
                    $('#totNotAnswered').text(notAns);
                    $('#totCancelQue').text(canQueCnt);

                    if(canQueCnt > 0){
                        $('#canQueCntDiv').show();
                    }else{
                        $('#canQueCntDiv').hide();
                    }
                    $('.qspannel').animate(({left: '100%'}));
                    qpflag=0;
                    $('#confirmbox').modal('show');
                });
                $('#submittest4').click(function(){

                    $('.qspannel').animate(({left: '100%'}));
                    qpflag=0;
                    $('#confirmbox').modal('show');
                });


                //$('#finsbtn').click(function(){
                $('.finsbtn').click(function(){
                    
                    //$('#redirectStatus').val(1);
                   /* var retrievedObject = localStorage.getItem('fulltestdata');
                    var tObj = JSON.parse(retrievedObject);*/
                    var connection = window.navigator.onLine ? 'on' : 'off';
                    var end_date = $('#endDate').val();
                    if(end_date == ''){
                        var edt = new Date();
                        var ecurr_month = edt.getMonth() + 1;

                        end_date = edt.getFullYear() +  "-" + ecurr_month + "-" + edt.getDate() + " " + edt.getHours() + ":" + edt.getMinutes() +":" + edt.getSeconds();
                        $('#endDate').val(end_date);
                    }
                    qObj[0].endTime = end_date;
                    if(connection == 'off'){
                        $('#confirmbox').modal('hide');
                        $('#networkalert').modal('show');
                        setTimeout(function(){
                            $('#networkalert').modal('hide')
                        }, 5000);
                    }else{
                        $('#redirectStatus').val(1);
                        var finaldata=JSON.stringify(qObj);
                        localStorage.setItem('questionstext', finaldata); 
                        window.location.href='<?php echo site_url(); ?>rewind/dxresult/'+testid;
                    }
                })

                $('#finsbtn2').click(function(){
                    //$('#redirectStatus').val(1);
                    var connection = window.navigator.onLine ? 'on' : 'off';
                    var end_date = $('#endDate').val();
                    if(end_date == ''){
                        var edt = new Date();
                        var ecurr_month = edt.getMonth() + 1;

                        end_date = edt.getFullYear() +  "-" + ecurr_month + "-" + edt.getDate() + " " + edt.getHours() + ":" + edt.getMinutes() +":" + edt.getSeconds();
                        $('#endDate').val(end_date);
                    }
                    qObj[0].endTime = end_date;
                    if(connection == 'off'){
                        $('#msgbox').modal('hide');
                        $('#networkalert').modal('show');
                        setTimeout(function(){
                            $('#networkalert').modal('hide')
                        }, 5000);
                    }else{
                        $('#redirectStatus').val(1);
                        var finaldata = JSON.stringify(qObj);
                        localStorage.setItem('questionstext', finaldata);
                        window.location.href='<?php echo site_url(); ?>rewind/dxresult/'+testid;
                    }
                })
                /*** Following code is for save Report question issue ***/
                $('#report_reason_id').on('change', function(){
                    $('#reason-err').text('');
                    if(this.value == 3){
                        $('#otherReasonDiv').show();
                    }
                }); 
                $('.RepoSubmit').on('click', function(){

                    /*** For update time when click ***/
                    /*var edt = new Date();
                    var ecurr_month1 = edt.getMonth() + 1;
                    var livetime = edt.getFullYear() +  "-" + ecurr_month1 + "-" + edt.getDate() + " " + edt.getHours() + ":" + edt.getMinutes() + ":" + edt.getSeconds();
                    $('#liveTime').val(livetime);
                    if($('#liveStatus').val() == 'INACTIVE'){
                        updateAttStatus('ACTIVE', testid, localStorage.icduserid);
                    }*/
                    /*** End ***/

                    var questionId = $('#reportQuesId').val();
                    var quesTypeId = $('#reportQuesTypeId').val();
                    var reasonId = $('#report_reason_id').val();
                    var name = '';
                    for(rv = 0; rv < qrlen; rv++){
                        if(qrrObj[rv].QUESTION_REPORT_REASON_ID == reasonId){
                            name = qrrObj[rv].QUESTION_REPORT_REASON_NAME;
                        }
                        
                    }
                    var otherReason = $('#otherReason').val();
                    var stat = 0;
                    if(reasonId == 3 && otherReason == ''){
                        stat = 1;
                    }
                    var activity = 'ACTIVITY_DYNAMIC';
                    var errMsg = '';
                    $('#reason-err').text(errMsg);
                    if(questionId && reasonId && stat == 0){

                        $.ajax({
                            url:'<?= site_url() ?>practice/report_issue_questions',
                            type:"POST",
                            cache:false,
                            data: {txtuserid: localStorage.icduserid, questionId, otherReason, quesTypeId, name, activity, reasonId, ['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'},
                            success:function(data){
                                //console.log('data => ', data)
                                if(data){
                                     //$('#reportQuesId').val('');
                                    //$('#reportQuesTypeId').val('');
                                    $('#report_reason_id').val('');
                                    $('#otherReason').val('');
                                    $('#otherReasonDiv').hide();
                                    $('#quesReport').modal('hide');
                                }
                            }
                        });
                        
                    }else{
                        if(reasonId == ''){
                            errMsg = 'Please Select Reason!';
                        }
                        if(stat == 1){
                            errMsg = 'Please Enter Reason!';
                        }
                        $('#reason-err').text(errMsg);
                    }
                });
                /*** End ***/
                function setOptions(i){
                    var qai = eval(qObj[i].question_type);
                    var sans = qObj[i].given_answer;
                    //console.log("sans => ",sans);
                    $('.radio').hide();
                    $('.checkbox').hide();
                    $('.number').hide();
                    if(qai==1){
                        $('.radio').show();
                        if(sans!=""){
                            $('.radio .ansopt[value="'+sans+'"]').prop('checked', true);
                        }else{
                            $('.radio .ansopt').prop('checked', false);
                        }
                    }

                    if(qai==2){
                        $('.checkbox').show();
                        if(sans!=""){
                            var saarray = sans.split(':');
                            $.each(saarray, function( index, value ) {
                               // alert(index+" "+value);
                              $('.checkbox .ansopt[value="'+value+'"]').prop('checked', true);
                            });
                        }else{
                            $('.checkbox .ansopt').prop('checked', false);
                        }
                    }

                    if(qai==3){
                        $('.number').show();
                        if(qObj[i].IS_CANCELED == 'YES'){
                            $('.number').hide();
                        }
                        $('.number .ansopt').prop('disabled',false);
                        if(sans!=""){
                            $('.number .ansopt').val(sans);

                        }else{
                            let restStat1 = 0;
                            if(qObj[i].given_answer == ''){
                                /*if(isQuestionRestricted == 'YES'){
                                    if(quesRestrictedStatus == 'SECTIONWISE'){
                                        if(selRestrictQuesCnt[qObj[i].subject_section_id]){
                                            if(subRestricted[qObj[i].subject_section_id] == selRestrictQuesCnt[qObj[i].subject_section_id]){
                                                restStat1 = 1;
                                            }
                                        }
                                    }else{
                                        if(selRestrictQuesCnt[qObj[i].subject_id]){
                                            if(subRestricted[qObj[i].subject_id] == selRestrictQuesCnt[qObj[i].subject_id]){
                                                restStat1 = 1;
                                            }
                                        }
                                    }
                                }*/
                            }
                            $('.number .ansopt').val('');
                            if(restStat1 == 1){
                                $('.number .ansopt').prop('disabled',true);
                            }
                            //$('.number .ansopt').val('');
                        }
                    }
                }   
                
            });
            function updateAttStatus(status,exam_id,student_id){
                $.ajax({
                    url:'<?= site_url() ?>tests/update_exam_attemp_status',
                    type:"POST",
                    cache:false,
                    data: {status, exam_id, student_id, ['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'},
                    success:function(data){
                        if(data){
                            $('#liveStatus').val(status1);
                        }
                    }
                });
            }


let intervalId; // Variable to store the interval ID

function startInterval() {
    // Start the interval and store its ID in the intervalId variable
    intervalId = setInterval(function() {
        // This code will run repeatedly at the specified interval
        $('#count').val(Number($('#count').val()) + 1);
    }, 1000); // Interval is set to 1 second (1000 milliseconds)
}

function stopInterval() {
    // Use clearInterval with the intervalId to stop the interval
    clearInterval(intervalId);
    $('#count').val(0);
}
//Script added by ui designer to calculate height dynamically
$(document).ready(function(){
    if ($(window).width() > 767) {
        var screenHeight = $(window).height();
        var headerHeight = $('.exam-top-panal').innerHeight();
        var tabsHeight = $('.exam-tabs').innerHeight();
        var footerHeight = $('.navbar-fixed-bottom-inner').innerHeight();
        var questionNumheight = $('.exam-question-no').innerHeight();
        var btnIndicationheight = $('.btn-indication-box').innerHeight();
        var selectedSubNameheight = $('.selected-sub-name').innerHeight();

       
        
        var remainingscrenHeight = screenHeight - (headerHeight + tabsHeight + footerHeight + 50);
        $('.exam-panal-box').css('height', remainingscrenHeight + 'px');
        $('.exam-question-box').css('height', remainingscrenHeight + 'px');
        $('.rightBox').css('height', remainingscrenHeight + 'px');
        var screnHeightdivideportion = ( remainingscrenHeight/ 2 ) - (questionNumheight + 20);
        
        $('.question-body').css('height', screnHeightdivideportion + 'px');
        $('.question-option-body').css('height', screnHeightdivideportion + 'px');

        var remainingRightsectotalheight = remainingscrenHeight - btnIndicationheight;
        $('.btn-indication-box').css('height', btnIndicationheight + 'px');
        $('.que-pallate-box').css('height', remainingRightsectotalheight + 'px');

        var remainingPalatearea = remainingRightsectotalheight - selectedSubNameheight - 30;
        $('.qpallete').css('height', remainingPalatearea + 'px');
        
    }
    else {
    

        var mobscreenHeight = $(window).height();
        var mobbtnIndicationheight = $('.btn-indication-box').innerHeight();
        var mobselectedSubNameheight = $('.selected-sub-name').innerHeight();
        $('.rightBox').css('height', mobscreenHeight + 'px');

        var mobreminingheight = mobscreenHeight - mobbtnIndicationheight - 50;
        $('.que-pallate-box').css('height', mobreminingheight + 'px');

        var mobremainingPalatearea = mobreminingheight - mobselectedSubNameheight - 30;
        $('.qpallete').css('height', mobremainingPalatearea + 'px');
        

    }
});









        </script>
    </body>
</html>
