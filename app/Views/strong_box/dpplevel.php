<?php echo $this->include('components/header.php'); ?>
<style>
.circular-chart 
{
    display: initial !important;
}

</style>
<?php echo $this->include('components/header-end.php'); ?>
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
                                    <a href="<?php echo site_url(); ?>strong_box/examtopics/<?php echo $examid; ?>/<?php echo $subjectid; ?>" class="back-btn">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i> 
                                        Back</a>
                                </h4>
                                <div class="row no-padding">
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 feeds">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade practice-custom-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="dueModel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button type="button" class="btn-close modal-button-close" data-bs-dismiss="modal"></button>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-xl-12 col-xxl-12 col-12">
                                <div class="embed-responsive embed-responsive-16by9" style="background-image: url('images/loading.gif');background-repeat: no-repeat;background-position: center;">
                                    <iframe class="embed-responsive-item" src="" frameborder="0" scrolling style="max-height: 100%" allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen></iframe>
                                </div>
                            </div>            
                        </div>
                    </div>
                    <div class="modal-body">
                        <h4 class="modal-title practice-custom-modal-title vtitle">Alert!</h4>
                        <p  class="practice-text-heading"><strong>400</strong> students attended this video Lecture</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="modal fade practice-custom-modal" tabindex="-1" role="dialog" id="choiceModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button type="button" class="btn-close modal-button-close" data-bs-dismiss="modal"></button>
                    <div class="modal-body conceptdata">
                        <h4 class="modal-title practice-custom-modal-title">Step</h4>
                        <p class="practice-text-heading">Loading</p>
                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 text-center mt-4">
                            <button type="button" class="btn btnmodal-custom-submit" data-bs-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        
        <?php echo $this->include('components/footer.php'); ?>
        <script type="text/javascript">
            function goBack() {
              window.history.back();
            }
            // var serverlink="";
            // var jsonurl=serverlink+"json/";
            $(document).ready(function(){
                /*** following code is to check other device login ***/
                // $.post(jsonurl+"check_other_device.php",{      
                // },
                // function(data, status){
                //     var pdata = JSON.parse(data);
                //     if(pdata.msg != ''){
                //         window.location.href='index.php';
                //     }
                // });
                /*** End ***/
                //$('#pgsbexams').addClass('active');
                $('#pgpractice').addClass('active');
                $('#mobPractice').addClass('active');
                var var1 = <?php if(isset($_GET['sid'])){ echo $_GET['sid']; }else{ echo 1; } ?>;
                        
                // $('.mlist').find('li:first').css("border-color","#F17336");

                $('.feeds').on('click','.vdobtn',function(e){
                    e.preventDefault();
                    if(checkConnection()=="No network connection"){
                        alert('No network connection!!')

                    }else{
                        var lnk=$(this).attr('vid');
                        screen.orientation.unlock();
                        
                        //alert(lnk);
                        var urlx="https://lamphub.livebox.co.in/livebox/player/?url="+lnk;
                            $('.embed-responsive-item').attr('src',urlx);
                        $('#dueModel').modal('show');
                        $('.vtitle').text($(this).attr('vtitle'));
                    }
                });

                $('#dueModel').on('hide.bs.modal', function (e) {
                    $('.embed-responsive-item').attr('src','');
                    screen.orientation.lock('portrait');
                    
                });
                if(storage()){
                    let topicObject = localStorage.getItem('sbtopicdata');
                    let tObj = JSON.parse(topicObject);
                    let t = tObj.length;
                    let ttlec = '';
                    
                    

                   
                    let subId = <?php echo $subjectid; ?>;
                    let tid = <?php echo $topicid; ?>;
                    //let j=var1;
                    let eid = <?php echo $examid; ?>;

                    let str = '';
                    for(let i = 0; i < t; i++){
                        if(tObj[i].SB_TOPIC_ID == tid){
                            ttlec = tObj[i].lecture;
                            str = tObj[i].SB_TOPIC_NAME;
                        }   
                    }
                    $('.ttitle').text(str.substr(0, 20));
                    let examObject = localStorage.getItem('sbexamdata');
                    let sbObj = JSON.parse(examObject);
                    //console.log("sbObj => ",sbObj);
                    let title = '';
                    for(let ei = 0; ei < sbObj.length; ei++){
                      if(sbObj[ei].SB_EXAM_ID == eid){
                        title = sbObj[ei].SB_EXAM_NAME;
                      }
                    }
                    $('.ptitle').text(title+' | '+str);

                    // document.addEventListener("backbutton", function(e){
                    //     e.preventDefault();
                    //     window.location.href="strongboxtopics.html?"+tObj[var1].SUBJECT_ID;
                    // }, false);

                    /*var retrievedObject2 = localStorage.getItem('topicvideos');
                    var vObj = JSON.parse(retrievedObject2);
                    z=vObj.length;*/

                 
                    let resultObject = localStorage.getItem('sbtopicresdata');
                    let pObj = JSON.parse(resultObject);
                    //console.log("pObj => ",pObj);
                    let p = pObj.length;

                    let objQueObject = localStorage.getItem('sboqdata');
                    let oObj = JSON.parse(objQueObject);
                    //console.log("oObj => ",oObj);
                    let x = oObj.length;

                    let testlist2 = "";
                    let testlist = "";
                    let lecArr = ttlec.split(', ');
                    let number = 1;
                    let subQueObject = localStorage.getItem('sbsqdata');
                    let sObj = JSON.parse(subQueObject);
                    let z = sObj.length;
                        
                    for(let k = 0; k < z; k++){
                        if(sObj[k].SB_TOPIC_ID == tid){
                            let btns = '<div>';
                            // btns += '<div><a href="https://admin.digitalicad.com/question_pdf/'+sObj[k].FILE_PATH+'" class="btn btn-block btn-warning" target="_blank" rel="noopener noreferrer">Practice</a></div>';
                            btns += '<div><a href="<?=base_url()?>strong_box/loaddata/'+sObj[k].SB_SUBJECTIVE_QUESTION_ID+'" class="btn btn-block btn-warning ms-1" rel="noopener noreferrer">Practice</a></div>';
                            btns+='</div>';
                            testlist2+='<div class="panel-body col-md-12 col-lg-12 col-sm-12 col-xs-12 common-mb border-orange-box attendace-list-box"><div class="row align-items-center"><div class="col-xs-8 col-lg-8 col-sm-7 col-md-8 col-xl-9 col-7"><h4 class="study-plan-name mb-0">Subjective</div><div class="col-xs-4 col-lg-4 col-sm-5 col-md-4 col-xl-3 col-5 align-self-center text-end">'+btns+'</div></div></div>';

                            
                        }

                    }
                    jQuery.each(lecArr, function(index, item) {
                        let levellink = item;
                        let btncnt = 0;
                        let pqflag = 0;
                            
                        let btns = '<div>';
                        let tcount = 0;
                        let scount = 0;  
                        let ccount = 0;
                        let wcount = 0;
                        /*** followign loop for count total question in selected topic and total wrong answer, correct answer and unsolved question ***/
                        for(let n = 0; n < p; n++){
                            if(pObj[n].SB_TOPIC_ID == tid && (pObj[n].level == item || pObj[n].level == null)){
                                if(pObj[n].given_answer == '' || pObj[n].given_answer == null){
                                    ccount++;
                                }else if((pObj[n].answer != pObj[n].given_answer && pObj[n].question_type != 3) || (pObj[n].answer <= pObj[n].range2 && pObj[n].answer >= pObj[n].range1 && pObj[n].question_type == 3)){
                                    wcount++;
                                }else{
                                    scount++;
                                }
                                //tcount++;
                            }else{
                                continue;
                            }
                        }
                        

                        /*** following code is for showing topic stages like start and review ***/
                        for(let i = 0; i < x; i++){
                            
                            if((oObj[i].level == item || oObj[i].level == null) && oObj[i].SB_TOPIC_ID == tid && oObj[i].qno > 0){
                                   // btns+='<div class="col-xs-4" style="padding:5px;"><a href="msteps.html?'+i+'" class="btn btn-block btn-warning stepqna" tqs="'+tObj[j].tqnos+'">Objective</a></div>';
                                tcount = tcount + oObj[i].qno;
                                ccount = tcount - wcount - scount;
                                let btnx = '';
                                let btnType = '';
                                if(tcount == ccount){
                                    btnx = 'Start';
                                    btnType = 'btn-warning';
                                }else if(tcount == scount){
                                    
                                    btnx = 'Completed';
                                    btnType = 'btn-success';
                                }else{
                                    btnx = 'Review';
                                    btnType = 'btn-warning';
                                }
                                if(btnx == 'Completed' || btnx == 'Review'){
                                    btns += '<a href="<?=base_url()?>strong_box/sbresult/'+eid+'/'+tid+'" class="btn btn-success stepqna  btn-block ms-1">Result </a>';
                                }
                                
                                btns += '<a href="<?=base_url()?>strong_box/sbins/'+eid+'/'+subId+'/'+tid+'" class="btn '+btnType+' stepqna  btn-block ms-1">'+btnx+' </a>';
                                btns += '</div>';   
                                break;
                            }
                        }
                        /*** following code is for find percent for round progress bar ***/
                        ccount = tcount - wcount - scount;
                        let pers = Math.round(((tcount-ccount)/tcount)*100) ;
                        if(Number.isNaN(pers))
                            pers=0;
                        let digits = '<div><span class="badge bg-success">'+scount+' <span class="fa fa-check"></span></span> <span class="badge bg-danger">'+wcount+' <span class="fa fa-times"></span></span> <span class="badge bg-warning">'+ccount+' Unsolved</span></div>';

                                
                        let pbar = '<svg viewBox="0 0 36 36" class="circular-chart orange"> <path class="circle-bg" d="M18 5.0845 a 10.9155 10.9155 0 0 1 0 25.831 a 10.9155 10.9155 0 0 1 0 -25.831"/> <path class="circle" stroke-dasharray="'+pers+', 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/> <text x="18" y="22" class="percentage">'+pers+'</text> </svg>';

                        if(pqflag==1){

                        }
                           //  btns+='<div class="col-xs-6 col-xs-offset-6" style="padding:5px;"><a href="index.php?page=sbins&tid='+index+'" class="btn btn-block btn-warning stepqna">Practice</a></div>';

                            //commented by Devendra
                            /* testlist2+='<div class="panel panel-default" style="border-radius: 0px;"><div class="panel-body"><h4> '+item+'<span class="text-danger hidden">'+oObj[i].qno+'</h4><div class="row"><div class="col-xs-3">'+pbar+'</div><div class="col-xs-9">'+btns+'</div></div></div><div class="panel-body">'+digits+'</div></div>';*/
                            //Added by Devendra
                        if(tcount > 0){
                            
                             testlist2+='<div><div class="panel-body col-md-12 col-lg-12 col-sm-12 col-xs-12 common-mb border-orange-box attendace-list-box"><div class="row align-items-center"><div class="col-xs-8 col-lg-8 col-sm-7 col-md-8 col-xl-9 col-7 align-self-center"><h4 class="study-plan-name mb-1"> '+str+'<span class="text-danger hidden"></h4><div class="mt-3 mb-3">'+pbar+'</div>'+digits+'</div><div class="col-xs-4 col-lg-4 col-sm-5 col-md-4 col-xl-3 col-5 align-self-center text-end">'+btns+'</div></div></div></div>';

                           
                        }
                        number++;
                           
                    });
                    $('.feeds').html(testlist2+testlist);
                }

                $('.feeds').on('click','.stepqna',function(e){
                    e.preventDefault();
                     var link=$(this).attr('href');
                        window.location.href=link;
                });

                $('.feeds').on('click','.conbtn',function(e){
                    e.preventDefault();
                    var link=$(this).attr('href');
                    $('#conceptModal').modal('show');
                    $.get(link, function(data, status){
                        $('.conceptdata').html(data);
                    });
                });

                $('.feeds').on('click','.spbtn',function(e){
                    e.preventDefault();
                    var link=$(this).attr('href');
                    $('#spModal').modal('show');
                    $.get(link, function(data, status){
                        $('.spdata').html(data);
                    });
                });
            });
        </script>
    <?php echo $this->include('components/footer-end.php'); ?>
