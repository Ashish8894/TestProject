<?php echo $this->include('components/header.php'); ?>
              <style type="text/css">
                  .panel-body{
                        border-radius: 20px !important;
                        border-top-left-radius: 5px !important; 
                    }
                    body .panel{
                        background: #FEFEFE;
                        border: 1px solid rgba(101, 78, 249, 0.3);
                        box-sizing: border-box;
                        box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.1);
                        border-radius: 20px !important;
                        border-top-left-radius: 5px !important; 
                        margin-bottom: 10px;
                    }
                    .panel-body h5{
                        margin-bottom: 0;
                    }
                    .paner-body h4{
                        font-family: Muli;
                        font-style: normal;
                        font-weight: 600;
                        font-size: 16px;
                        line-height: 20px;
                        color: #21345F;
                    }
                    .panel-body h4>small{
                        font-family: Muli;
                        font-style: normal;
                        font-weight: normal;
                        font-size: 12px;
                        line-height: 15px;
                        color: #8997BD;
                    }
                    html,body{
                        overscroll-behavior-y: contain;
                    }
                    
                    span.label{
                        font-family: Muli;
                        font-style: normal;
                        font-weight: normal;
                        font-size: 10px;
                        line-height: 10px;
                        color: #FFFFFF;

                        padding:3px;
                        border-radius: 3px;
                        padding-right: 8px;
                        padding-left: 8px;
                                            }
                                            .circular-chart {
                display: block;
                margin: 0px auto;
                max-width: 100%;
                max-height: 40px;
                width:40px;
                height:40px;
            }
            .circle-bg {
                fill: none;
                stroke: #eee;
                stroke-width: 3.8;
            }
            .circle {
                fill: none;
                stroke-width: 2.8;
                stroke-linecap: round;
                animation: progress 1s ease-out forwards;
            }

            @keyframes progress {
                0% {
                    stroke-dasharray: 0 100;
                }
            }
            .circular-chart.orange .circle {
                stroke: #F17336;
            }
            .circular-chart.green .circle {
                stroke: #4CC790;
            }
            .circular-chart.blue .circle {
                stroke: #3c9ee5;
            }
            .percentage {
                fill: #666;
                font-family: sans-serif;
                font-size: 0.5em;
                text-anchor: middle;
            }
              </style>
            <?php echo $this->include('components/header-end.php'); ?>
                <div class="container container-custom no-padding main-container">
                    <div class="row">
                        <div class="col-md-4 col-lg-3 col-sm-4 col-12">
                            <?php echo $this->include('components/sidebar.php'); ?>
                        </div>
                        <div class="col-md-8 col-lg-9 col-sm-8 col-12">
                            <div class="col-lg-12 col-12 no-padding right-container">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
                                    <div class="panel panel-default rightpanel-box">
                                        <div class="panel-body rightpanel-box1" >
                                            <h4 class="coming-soon-back-text">
                                                <a href="<?= base_url(); ?>strong_box" class="back-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> 
                                                    Back</a>
                                            </h4>
                                            <div class="row no-padding" id="perform-tab" >
                                                <div class="col-md-12">
                                                    <ul class="nav  nav-tabs mlist">
                                                        <li role="presentation" class="nav-item">
                                                            <a class="nav-link active" href="#" style="">Loading...</a>
                                                        </li>
                                                    </ul>
                                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 common-mb feeds">
                                                
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
        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="dueModel">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              ...
            </div>
          </div>
        </div>
        
        <?php echo $this->include('components/footer.php'); ?>
        <script type="text/javascript">
            //var serverlink="../";
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
                   
                let examid = '<?php echo $examid; ?>';
                let var1 = '<?php echo $subjectid; ?>';
                
                $('.feeds').on('click','.vdobtn',function(e){
                    e.preventDefault();
                    let lnk = $(this).attr('vid');
                    $('#dueModel').find('video1').attr('src','https://transcoding.livebox.co.in/UploadedFiles/'+lnk);
                    $('#dueModel').modal('show');
                    $('.vtitle').text($(this).attr('vtitle'));
                });

                $('#dueModel').on('hide.bs.modal', function (e) {
                    let myVideo = document.getElementById("video1"); 
                    myVideo.pause();
                });

                if(storage()){
                    let examObject = localStorage.getItem('sbexamdata');
                    let exmObj = JSON.parse(examObject);
                    let exlen = exmObj.length;
                    let subs = '';
                    let examTitle = '';
                    for(let i = 0; i < exlen; i++){
                        if(exmObj[i].SB_EXAM_ID == examid){
                            subs = exmObj[i].SUBJECTS;
                            examTitle = exmObj[i].SB_EXAM_NAME
                        }
                    }
                    let subsArr = subs.split(',');
                    $('.ptitle').text(examTitle)

                    let subjObject = localStorage.getItem('fullsubjectdata');
                    let subObj = JSON.parse(subjObject);
                    let s = subObj.length;
                    let subid = 0;
                    let sublist = "";
                    for (let j = 0; j < s; j++) {
                        subsArr.forEach(function(item) {
                            if(item == subObj[j].SUBJECT_ID){
                                let subActCls = '';
                                if(item == var1){
                                    subActCls = ' active';
                                    subid=subObj[j].SUBJECT_ID;
                                }
                                sublist+='<li role="presentation" class="nav-item"><a class="nav-link'+subActCls+'" href="<?= base_url()?>strong_box/examtopics/'+examid+'/'+subObj[j].SUBJECT_ID+'">'+subObj[j].SUBJECT_NAME+'</a></li>';
                            }
                        })
                    }
                    $('.mlist').html(sublist);

                    let topicObject = localStorage.getItem('sbtopicdata');
                    let tObj = JSON.parse(topicObject);
                   
                    let y = tObj.length;

                    let resultObject = localStorage.getItem('sbtopicresdata');
                    let rObj = JSON.parse(resultObject);
                    
                    let x = rObj.length;

                    let testlist2 = "";

                    if(var1 != ""){
                        subid = var1; 
                    }


                    var tno=0;
                    for (let j = 0; j < y; j++) {
                        //console.log("tObj[j] = >",tObj[j]);
                        let tcount=0;
                        let scount=0;  
                        let ccount=0;
                        let wcount=0;
                        for(let i = 0;i < x; i++){
                            if(rObj[i].SB_TOPIC_ID!=tObj[j].SB_TOPIC_ID){
                                continue;
                            }else{
                                
                                if(rObj[i].ques_status == 'C'){
                                    scount++;
                                }else if(rObj[i].ques_status == 'W'){
                                    wcount++;
                                }else{
                                    ccount++;
                                }
                                tcount++;
                               
                            }
                        }
                        let remain = tObj[j].tqnos - wcount - scount;
                        let total = tObj[j].tqnos;
                        let unsolve = total - wcount - scount;
                       
                        let pers = Math.round(((total - remain)/total)*100) ;
                        
                        //var pers=Math.round(((tcount-ccount)/tcount)*100) ;
                        if(Number.isNaN(pers))
                            pers=0;


                        let pbar = '<svg viewBox="0 0 36 36" class="circular-chart orange"> <defs> <clipPath id="myCircle"> <path class="circle-bg" d="M18 5.0845 a 10.9155 10.9155 0 0 1 0 25.831 a 10.9155 10.9155 0 0 1 0 -25.831"/> </clipPath> </defs> <image width="40" height="32" xlink:href="<?= base_url();?>images/book.svg" clip-path="url(#myCircle)"/> <path class="circle" stroke-dasharray="'+pers+', 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/> </svg>';


                        let digits = '<div><span class="badge bg-success">'+scount+' <span class="fa-solid fa-check"></span></span> <span class="badge bg-danger">'+wcount+' <span class="fa-solid fa-times"></span></span> <span class="badge bg-warning">'+unsolve+' Unsolved</span></div>';


                        if(subid == tObj[j].SUBJECT_ID && tObj[j].SB_EXAM_ID == examid){ // && tObj[j].tqnos>0
                            /*console.log('subid => ',subid);
                        console.log('tObj[j].SUBJECT_ID => ',tObj[j].SUBJECT_ID);
                        console.log('tObj[j].SB_EXAM_ID => ',tObj[j].SB_EXAM_ID);
                        console.log('examid => ',examid);*/
                        // console.log('tObj => ',tObj);
                            let lock = '<img src="<?= base_url();?>assets/images/lock.svg" style="position:relative;left:10px;bottom:5px;"/>';
                            let pclick = '';
                            if((tObj[j].tqnos > 0 || tObj[j].totsubq > 0) && tObj[j].allocation_status == 'ENABLE'){
                                lock = '<img src="<?= base_url();?>assets/images/unlock.svg" style="position:relative;left:10px;bottom:5px;"/>';
                                pclick = ' onclick="window.location.href=\'<?= site_url(); ?>strong_box/dpplevel/'+examid+'/'+tObj[j].SUBJECT_ID+'/'+tObj[j].SB_TOPIC_ID+'\'"';
                            }
                            testlist2 += '<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 common-mb border-orange-box attendace-list-box"><div class="panel-body"><div class="row"><div class="col-xs-9 col-lg-9 col-sm-9 col-md-9 col-xl-9 col-9"><div'+pclick+'><h4 class="study-plan-name">'+tObj[j].SB_TOPIC_NAME+lock+'<br/><small class="study-plan-name-questions">'+tObj[j].tqnos+' Questions</small><br/><small class="study-plan-name-questions">'+tObj[j].totsubq+' Subjective Questions</small></h4>'+digits+'</div></div><div class="col-xs-3 col-lg-3 col-sm-3 col-md-3 col-xl-3 col-3 align-self-center telegenic-img-align ">';

                            if(tObj[j].file == '' || tObj[j].file == null){
                                        
                                testlist2 += '<a class="btn btn-link btn-block" href="javascript:void(0)" style="margin-bottom:2px;padding:0 !important;cursor: not-allowed !important;">'+pbar+'</a><small style="font-family: Muli;font-style: normal;font-weight: 600;font-size: 12px;line-height: 15px;text-align: center;color: #F17336;">'+tObj[j].SEQUENCE+'</small>';          
                            }else{
                                        
                                testlist2 += '<a class="btn btn-link btn-block" href="https://www.icadjee.com/icadadmin/lectures/'+tObj[j].file+'" style="margin-bottom:2px;padding:0 !important;">'+pbar+'</a><small style="font-family: Muli;font-style: normal;font-weight: 600;font-size: 12px;line-height: 15px;text-align: center;color: #F17336;"></small>';
                            }
                                
                        	testlist2 += '</div></div></div></div>';
                    		tno++;
                        }
                    }
                    if(tno > 0){
                    	$('.feeds').html(testlist2);
                    }else{
                        testlist2 = '<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 common-mb border-orange-box attendace-list-box"><div class="<div class="panel-body"><div class="row"><div class="study-plan-topic-not-allot">Topic Not Alloted for this Subject in the Exam</div></div></div></div>';

                    	$('.feeds').html(testlist2);
                    }
                }

                $('.feeds').on('click','.stepqna',function(e){
                    e.preventDefault();
                    var link=$(this).attr('href');
                        window.location.href=link;
                });
            });
        </script>
<?php echo $this->include('components/footer-end.php'); ?>