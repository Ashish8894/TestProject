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
                                    <a href="<?= site_url(); ?>practice/lecture/<?php echo $topic_id; ?>"  class="back-btn">
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
        <div class="modal fade bs-example-modal-sm practice-custom-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="dueModel">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="modal-body">
                        <h4 class="vtitle"></h4>
                        <p><strong>400</strong> students attended this video Lecture</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bs-example-modal-sm practice-custom-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="choiceModal">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
                <div class="modal-content" ><!--style="margin-top: 200px !important;"-->
                    <div class="modal-header">
                        <h4 class="modal-title">Step</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   </div>
                    <div class="modal-body">
                        <p>Loading</p>
                    </div>
                </div><!-- /.modal-content -->
            </div>
        </div>
        <?php echo $this->include('components/footer.php'); ?>
        <script type="text/javascript">
            function goBack() {
              window.history.back();
            }
           
            $(document).ready(function(){
                $('#pgpractice').addClass('active');
                $('#mobPractice').addClass('active');
                let tid = <?php echo $topic_id; ?>;
                let level = <?php echo $lectureId; ?>;
                $('#dueModel').on('hide.bs.modal', function (e) {
                    $('.embed-responsive-item').attr('src','');
                });
                if(storage()){
                    let objQueObject = localStorage.getItem('oqdata');
                    let oObj = JSON.parse(objQueObject);
                    let x = oObj.length;
                    let subQueObject = localStorage.getItem('sqdata');
                    let sObj = JSON.parse(subQueObject);
                    let z = sObj.length;

                    let stepObject = localStorage.getItem('stepsdata');
                    let stp = JSON.parse(stepObject);
                    let st = stp.length;

                    let topicObject = localStorage.getItem('topicdata');
                    let tObj = JSON.parse(topicObject);

                    let tlen = tObj.length;
                    let backlink = 'lectures2.html?';
                    let title='';
                    for(j = 0;j < tlen;j++){
                        if(tObj[j].TOPIC_ID == tid){
                            backlink += j;
                            title = tObj[j].TOPIC_NAME;
                        }
                    }
                    /*$(window).on('popstate', function(e) {
                        e.preventDefault();
                        window.location.href=backlink;
                    });*/
                    if(level == ""){
                        title += " Challenge Steps";
                    }else{ 
                        title += " | Lecture "+level;
                    }
                    $('.ptitle').text(title);

                    let testlist2 = "";
                    //commented by Devendra
                    let topicResObject = localStorage.getItem('topicresdata');
                    let rObj = JSON.parse(topicResObject);
                    
                    let y = rObj.length;
                    let stepDetail
                    //let s = 1;
                    for(let s = 1;s <= st;s++){
                        let addtext = "";
                        let run = 0;
                        let stepn = 0;
                        let stepi = 0;
                        let stepk = 0;

                        for(i = 0;i < x;i++){
                           
                            //if(oObj[i].level==level && oObj[i].topic_id==tid && oObj[i].qno>0 && oObj[i].step==s){
                            if(oObj[i].level == level && oObj[i].TOPIC_ID == tid && oObj[i].qno > 0 && oObj[i].STEP_ID == s){
                                
                                let tcount = 0;
                                let scount = 0;
                                let ccount = 0;
                                //commented by Devendra for now
                                for(j = 0;j < y; j++){
                                    if(rObj[j].level == level && rObj[j].TOPIC_ID == tid && rObj[j].STEP_ID == oObj[i].STEP_ID){
                                        if(rObj[j].given_answer == '' || rObj[j].given_answer == null){
                                            scount++;
                                        }
                                        
                                        if(rObj[j].question_type == 3){
                                            if(rObj[j].answer <= rObj[j].range2 && rObj[j].answer >= rObj[j].range1){
                                                ccount++;
                                            }
                                        }else{
                                            if(rObj[j].given_answer == rObj[j].answer){
                                                ccount++;
                                            }
                                        }
                                        tcount++;
                                    }
                                }
                               
                                if(tcount == scount){
                                    var btn = '<a href="<?= base_url()?>practice/sotestins/'+tid+'/'+level+'/'+s+'" class="btn btn-danger stepqna float-end">Start </a>';
                                    var btnx = 'Start';
                                }else if(tcount == ccount){
                                    var btn = '<div ><a href="<?= base_url()?>practice/step_result/'+tid+'/'+level+'/'+s+'/res" class="btn btn-success">Result </a> <a href="<?= base_url()?>practice/sotestins/'+tid+'/'+level+'/'+s+'" class="btn btn-success">Completed </a></div>';
                                    var btnx = 'Review';
                                }else{
                                    
                                    var btn = '<div><a href="<?= base_url()?>practice/step_result/'+tid+'/'+level+'/'+s+'/res" class="btn btn-success ms-1">Result </a><a href="<?= base_url()?>practice/sotestins/'+tid+'/'+level+'/'+s+'" class="btn btn-warning stepqna ms-1">Review </a></div>';
                                    var btnx = 'Review';
                                } 

                                addtext += '<div class="panel panel-default common-mb pratice-box attendace-list-box"><div class="panel-body"><div class="row"><div class="col-xs-8 col-lg-8 col-sm-7 col-md-8 col-xl-9 col-7 align-self-center"><h4 class="study-plan-name mb-0 "> '+stp[oObj[i].STEP_ID - 1].STEP_NAME+'</h4><div class="d-none"><small class="study-plan-name-questions">Total-'+tcount+ ' Unsolved- ' +scount+' Currect-'+ccount+'</small></div></div><div class="col-xs-4 col-lg-4 col-sm-5 col-md-4 col-xl-3 col-5 align-self-center text-end">'+ btn +'</div></div></div></div>';

                                stepn = oObj[i].STEP_ID;
                                stepi = i;
                                run++;
                                 
                            }
                        }
                        for(k = 0;k < z;k++){
                            
                            if(sObj[k].level == level && sObj[k].TOPIC_ID == tid && sObj[k].qno > 0 && sObj[k].STEP_ID == s){

                                addtext += '<div class="panel panel-default common-mb pratice-box attendace-list-box"><div class="panel-body"><div class="row"><div class="col-xs-8 col-lg-8 col-sm-7 col-md-8 col-xl-9 col-7 align-self-center"><h4 class="study-plan-name mb-0 ">'+stp[sObj[k].STEP_ID - 1].STEP_NAME+'</h4></div><div class="col-xs-4 col-lg-4 col-sm-5 col-md-4 col-xl-3 col-5 align-self-center text-end">'+ '<a href="<?= base_url(); ?>practice/sstestins/'+tid+'/'+level+'/'+s+'" class="btn btn-danger stepqna float-end">Start </a>' +'</div></div></div></div>';
                                run++
                                stepk = k;
                            }   
                        }
                        if(run == 1){                                    
                            testlist2 += addtext;
                        }
                        if(run == 2){
                            testlist2 += '<div class="panel panel-default common-mb pratice-box attendace-list-box"><div class="panel-body"><div class="row"><div class="col-xs-8 col-lg-8 col-sm-7 col-md-8 col-xl-9 col-7 align-self-center"><h4 class="study-plan-name mb-0 ">'+stp[stepn - 1].STEP_NAME+'</h4></div><div class="col-xs-4 col-lg-4 col-sm-5 col-md-4 col-xl-3 col-5 align-self-center text-end">'+ '<a href="#" class="btn btn-warning btnchoice float-end" stepn="'+stepn+'" stepi="'+stepi+'" stepk="'+stepk+'" btnx="'+btnx+'" curStep="'+s+'">'+btnx+' </a>' +'</div></div></div></div>';
                        }
                    }
                    $('.feeds').html(testlist2);
                }

                $('.feeds').on('click','.btnchoice',function(e){
                    e.preventDefault();
                    var stepn = $(this).attr('stepn');
                    var stepk = $(this).attr('stepk');
                    var stepi = $(this).attr('stepi');                            
                    var btnx = $(this).attr('btnx');
                    var curStep = $(this).attr('curStep');
                    var modaldata = '<div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12 text-center"><p class="section-selection-p">Which section do you want to solve?</p></div><div class="col-xs-6 col-lg-6 col-md-6 col-sm-6 col-xl-6 col-6"><a href="<?= base_url()?>/practice/sstestins/'+tid+'/'+level+'/'+curStep+'" class="btn btn-warning stepqna pull-right btn-block">Subjective</a></div><div class="col-xs-6 col-lg-6 col-md-6 col-sm-6 col-xl-6 col-6">';

                    modaldata += '<a href="<?= base_url()?>practice/sotestins/'+tid+'/'+level+'/'+curStep+'" class="btn btn-warning stepqna btn-block float-endt">Objective</a>';

                    modaldata += '</div></div>';
                    //$('#choiceModal').find('.modal-title').html(stp[stepn - 1]);
                    $('#choiceModal').find('.modal-title').html('STEP - '+curStep);
                    $('#choiceModal').find('.modal-body').html(modaldata);
                    $('#choiceModal').modal('show');
                });
                $('.feeds').on('click','.stepqna',function(e){
                    e.preventDefault();
                    var link = $(this).attr('href');
                        window.location.href = link;
                });
            });
        </script>
<?= $this->include('components/footer-end.php'); ?>
