<?= $this->include('components/header'); ?>
    
<?= $this->include('components/header-end'); ?>
        
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
                                    <a href="<?= base_url(); ?>practice/studyplan" id="backButton" class="back-btn">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i> 
                                        Back</a>
                                </h4>
                                <div class="row no-padding">
                                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 feeds">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="sideline"></div> -->

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
                    <div class="modal-body d-none">
                        <h4 class="modal-title practice-custom-modal-title vtitle">Alert!</h4>
                        <p  class="practice-text-heading"><strong>400</strong> students attended this video Lecture</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade practice-custom-modal" tabindex="-1" role="dialog" id="conceptModal">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <button type="button" class="btn-close modal-button-close" data-bs-dismiss="modal"></button>
                    <div class="modal-header justify-content-center" style="padding-bottom:0;border-bottom:none;">
                        <h4 class="modal-title practice-custom-modal-title">Lecture Concept</h4>
                    </div>
                    <div class="modal-body conceptdata" style="padding-bottom: 0;">
                        <p class="practice-text-heading">Loading...</p>
                    </div>
                    <div class="modal-footer d-block">
                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 text-center">
                            <button type="button" class="btn btnmodal-custom-submit" data-bs-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        



        <div class="modal fade practice-custom-modal" tabindex="-1" role="dialog" id="spModal">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <button type="button" class="btn-close modal-button-close" data-bs-dismiss="modal"></button>
                    <div class="modal-header justify-content-center" style="padding-bottom:0;border-bottom:none;">
                        <h4 class="modal-title practice-custom-modal-title" id="msg-head">Suggested Problems</h4>
                    </div>
                    <div class="modal-body spdata" style="padding-bottom: 0;">
                        <p class="practice-text-heading">Loading...</p>
                    </div>
                    <div class="modal-footer d-block">
                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 text-center">
                            <button type="button" class="btn btnmodal-custom-submit" data-bs-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         
      
        
        <?= $this->include('components/footer'); ?>
        <script type="text/javascript">
            
            $(document).ready(function(){
               
                //$('#pgstudyplan').addClass('active');
                $('#pgpractice').addClass('active');
                $('#mobPractice').addClass('active');
                    let tid = '<?php echo $topic_id; ?>';
                    if(storage()){

                        let topicObject = localStorage.getItem('topicdata');
                        let tObj = JSON.parse(topicObject);
                        let ttlec = '';
                        let topicData = '';

                        tObj.forEach((topicDetail) => {
                            if(topicDetail.TOPIC_ID == tid){
                                ttlec = topicDetail.lecture;
                                topicData = topicDetail;
                            }
                        });
                        $('.ttitle').text(topicData.TOPIC_NAME);
                        $('.ptitle').text(topicData.TOPIC_NAME);
                        let bkurl = '<?= site_url(); ?>practice/studyplan/'+topicData.SUBJECT_ID;
                        $('#backButton').attr('href',bkurl);
                        
                        document.addEventListener("backbutton", function(e){
                            e.preventDefault();
                            window.location.href='<?= site_url(); ?>practice/studyplan/'+topicData.SUBJECT_ID;
                        }, false);
                        let lectureObject = localStorage.getItem('lectureMstdata');
                        let lect = JSON.parse(lectureObject);
                        
                        let subQueObject = localStorage.getItem('sqdata');
                        let sObj = JSON.parse(subQueObject);
                        
                        let y = sObj.length;

                        let objQueObject = localStorage.getItem('oqdata');
                        let oObj = JSON.parse(objQueObject);
                        
                        let x = oObj.length;

                        let topicResObject = localStorage.getItem('topicresdata');
                        
                        let pObj = JSON.parse(topicResObject);
                        
                        let p = pObj.length;
                        let testlist2 = "";
                        let testlist = "";
                        
                        if(ttlec == ''){

                            let number = 1;
                             
                            let index = 0;
                            let item = '';
                            let btncnt = 0;
                            let pqflag = 0;
                            let btns = '<div class="row">';
                            let tcount = 0;
                            for(i = 0;i < x;i++){
                                if((oObj[i].level == item || oObj[i].level == null) && oObj[i].TOPIC_ID == tid && oObj[i].qno > 0){
                                    tcount = Number(tcount) + Number(oObj[i].qno);
                                    btncnt++;
                                    pqflag = 1;
                                    //break;
                                }
                            }
                            for(i = 0;i < y;i++){
                                if((sObj[i].level == item || sObj[i].level == null) && sObj[i].TOPIC_ID == tid && sObj[i].qno > 0){
                                    btncnt++;
                                    pqflag = 1;
                                    break;
                                }
                            }
                            
                            let scount = 0;  
                            let ccount = 0;
                            let wcount = 0;
                            //commented by Devendra
                            
                            for(n = 0;n < p; n++){
                                //console.log("pObj[n] => ",pObj[n]);
                                if(pObj[n].TOPIC_ID == tid && (pObj[n].level == item || pObj[n].level==null)){
                                    if(pObj[n].ques_status == 'C'){
                                        scount++;
                                    }else if(pObj[n].ques_status == 'W'){
                                        wcount++;
                                    }else{
                                        ccount++;
                                    }
                                    //tcount++;
                                    
                                }else{
                                    continue;
                                }
                            }
                            ccount = tcount - scount - wcount;
                            let pers = Math.round(((tcount-ccount)/tcount)*100);
                            
                            if(Number.isNaN(pers))
                                pers = 0;
                            let pbar = '<svg viewBox="0 0 36 36" class="circular-chart orange"> <path class="circle-bg" d="M18 5.0845 a 10.9155 10.9155 0 0 1 0 25.831 a 10.9155 10.9155 0 0 1 0 -25.831"/> <path class="circle" stroke-dasharray="'+pers+', 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/> <text x="18" y="22" class="percentage">'+pers+'</text> </svg>';
                            if(pqflag == 1){
                                btns += '<div class="col-lg-4 col-xl-4 col-xxl-4 col-md-4 col-sm-6 col-12 mobile-btn-m"><a href="msteps.html?'+i+'" class="btn btn-block w-100 btn-warning stepqna" tqs="'+topicData.tqnos+'">Practice Questions</a></div>';
                            }
                            btns += '</div>';
                            if(btncnt > 0){
                                if(item == ''){
                                         
                                }else{
                                    testlist2 += '<div class="panel panel-default common-mb pratice-box attendace-list-box" ><div class="panel-body"><h4 class="study-plan-name mb-3"> '+lect[number - 1].DESCRIPTION+'</h4><div class="row align-items-center"><div class="col-lg-2 col-xl-2 col-xxl-2 col-md-2 col-sm-3 col-3">'+pbar+'</div><div class="col-lg-10 col-xl-10 col-xxl-10 col-md-10 col-sm-9 col-9">'+btns+'</div></div></div></div>';
                                    number++;
                                }
                            }
                        }else{
                            
                            let lecArr = ttlec.split(', ');
                            let number = 1;
                            jQuery.each(lecArr, function(index, item) {
                                var levellink=item;
                                var btncnt=0;
                                var pqflag=0;
                                var btns='<div class="row">';
                                
                                var l = '';
                                var tcount=0;
                                /*for(i=0;i<y;i++){
                                    if(sObj[i].level==item && sObj[i].TOPIC_ID==tid && sObj[i].qno>0){
                                        btncnt++;
                                        pqflag=1;
                                        l = i;
                                        break;
                                    }
                                }*/
                                sObj.forEach((subQue, ind) => {
                                    if(subQue.level == item && subQue.TOPIC_ID == tid && subQue.qno > 0){
                                        btncnt++;
                                        pqflag=1;
                                        l = ind;
                                        //break;
                                    }
                                });
                                var m = '';
                                /*for(i=0;i<x;i++){
                                    if(oObj[i].level==item && oObj[i].TOPIC_ID==tid && oObj[i].qno>0){
                                        tcount = Number(tcount) + Number(oObj[i].qno);
                                        btncnt++;
                                        pqflag=1;
                                        m=i;
                                        
                                    }
                                }*/
                                oObj.forEach((objQue, ind) => {
                                    if(objQue.level == item && objQue.TOPIC_ID == tid && objQue.qno > 0){
                                        tcount = Number(tcount) + Number(objQue.qno);
                                        btncnt++;
                                        pqflag=1;
                                        m=ind;
                                        
                                    }
                                });
                                
                                var lm = l;
                                var mtype = '&mtype=1';
                                if(m != ''){
                                    lm = m;
                                    mtype = '';
                                }
                                //alert(i);
                                //var tcount=0;
                                var scount=0;  
                                var ccount=0;
                                var wcount=0;
                                //commented by Devendra
                                /*for(n=0;n<p; n++){
                                    
                                    if(pObj[n].TOPIC_ID==tid && (pObj[n].level==item || pObj[n].level==null)){
                                        if(pObj[n].ques_status == 'C'){
                                            scount++;
                                        }else if(pObj[n].ques_status == 'W'){
                                            wcount++;
                                        }else{
                                            ccount++;
                                        }
                                        
                                    }else{
                                        continue;
                                    }
                                }*/
                                pObj.forEach((resQue, ind) => {
                                    if(resQue.TOPIC_ID==tid && (resQue.level==item || resQue.level==null)){
                                        if(resQue.ques_status == 'C'){
                                            scount++;
                                        }else if(resQue.ques_status == 'W'){
                                            wcount++;
                                        }else{
                                            ccount++;
                                        }
                                        
                                    }/*else{
                                        continue;
                                    }*/
                                });
                                ccount = tcount - scount - wcount;
                                var pers = Math.round(((tcount-ccount)/tcount)*100);
                                if(Number.isNaN(pers))
                                pers=0;
                                var ftype = 'L';
                                var stype = 'S';
                                var mid=lm+mtype;
                                var pbar='<svg viewBox="0 0 36 36" class="circular-chart orange"> <path class="circle-bg" d="M18 5.0845 a 10.9155 10.9155 0 0 1 0 25.831 a 10.9155 10.9155 0 0 1 0 -25.831"/> <path class="circle" stroke-dasharray="'+pers+', 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/> <text x="18" y="22" class="percentage">'+pers+'</text> </svg>';
                                if(pqflag==1){
                                    btns+='<div class="col-lg-12 col-xl-12 col-xxl-12 col-md-12 col-sm-12 col-12"><h4 class="study-plan-name mb-3"> '+lect[number - 1].DESCRIPTION+'</h4></div><div class="col-lg-4 col-xl-4 col-xxl-4 col-md-4 col-sm-6 col-6 mobile-btn-m" ><a href="<?= base_url()?>practice/lectursedetails/'+ftype+'/'+levellink+'/'+tid+'" class="btn btn-block w-100 btn-border conbtn" tqs="'+topicData.tqnos+'" >Concept</a></div><div class="col-lg-4 col-xl-4 col-xxl-4 col-md-4 col-sm-6 col-6 mobile-btn-m" ><a href="<?= base_url()?>practice/lectursedetails/'+stype+'/'+levellink+'/'+tid+'" class="btn btn-block w-100 btn-border spbtn" tqs="'+topicData.tqnos+'" >SP</a></div><div class="col-lg-4 col-xl-4 col-xxl-4 col-md-4 col-sm-6 col-12 mobile-btn-m"><a href="<?= base_url()?>practice/msteps/'+tid+'/'+item+'" class="btn btn-block w-100 btn-warning stepqna" tqs="'+topicData.tqnos+'">Practice</a></div>';
                                }
                                btns+='</div>';
                                if(btncnt>0){
                                    if(item=='' || item=='0'){s
                                      
                                    }else{
                                        testlist2+='<div class="panel panel-default common-mb pratice-box attendace-list-box" ><div class="panel-body"><h4 class="d-lg-none d-md-none d-none"> '+lect[number - 1].DESCRIPTION+'</h4><div class="row align-items-center"><div class="col-lg-2 col-xl-2 col-xxl-2 col-md-2 col-sm-3 col-3">'+pbar+'</div><div class="col-lg-10 col-xl-10 col-xxl-10 col-md-10 col-sm-9 col-9">'+btns+'</div></div></div></div>';
                                        number++;
                                    }
                                }
                               
                            });
                        }

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
                        var link = $(this).attr('href');
                        $('#spModal').modal('show');
                        $.get(link, function(data, status){
                            $('.spdata').html(data);
                        });
                    });
                });
            </script>
        <?= $this->include('components/footer-end'); ?>
