<?php echo $this->include('components/header.php'); ?>
              <style type="text/css">
                    .badge-fontsize
                    {
                        font-size:12px;
                    }
              </style>
            <?php echo $this->include('components/header-end.php'); ?>
                <div class="container container-custom no-padding main-container">
                    <div class="row">
                    <!-- <input type="hidden" id="user_id" name="user_id" value="<?= $_SESSION['icaduserid']?>"> -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-12">
                        <?php echo $this->include('components/sidebar.php'); ?>
                        </div>
                        <div class="col-md-8 col-lg-9 col-sm-8 col-12">
                            <div class="col-lg-12 col-12 no-padding right-container">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
                                    <div class="panel panel-default rightpanel-box" >
                                        <div class="panel-body rightpanel-box1">
                                            <h4 class="coming-soon-back-text">
                                                <a href="<?= base_url(); ?>practice" class="back-btn">
                                                <i class="fa fa-arrow-left" aria-hidden="true"></i> 
                                                    Back</a>
                                            </h4>
                                            <div class="row no-padding">
                                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 feeds">
                                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 no-padding " >
                                                            Preparing Stong Box <span id="status"></span>
                                                    </div>
                                                    <div class="jsondata">
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
            function getsbexams(){
                $('#status').text('Exams...');
                $.ajax({ 
                    type: "POST",
                    data: {['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                    dataType: 'json', 
                    url: "<?= site_url(); ?>strong_box/sb_list_exam",
                    success: function(data) {
                        var gfsdata = JSON.stringify(data);
                        localStorage.setItem('sbexamdata', gfsdata);
                        getsbtopics();
                    }
                });
            }
            function getsbtopics(){
                $('#status').text('Topics...');
                //var userid = $('#user_id').val();
                $.ajax({ 
                    type: "POST",
                    data: {['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                    dataType: 'json', 
                    url: "<?= site_url(); ?>strong_box/sb_list_topics",
                    success: function(data) {
                        var sltdata = JSON.stringify(data);
                        if(sltdata.error){
                            // window.location.href='index.php?page=err-sb-topic';
                        }else{
                            localStorage.setItem('sbtopicdata', sltdata);
                            sbscount();
                        }
                    }
                });
            }
            function sbscount(){
                $('#status').text('Subjective Questions...');
                //var userid = $('#user_id').val();
                $.ajax({ 
                    type: "POST",
                    data: {['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                    dataType: 'json', 
                    url: "<?= site_url(); ?>strong_box/sb_count_subjective",
                    success: function(data) {
                        var scsdata = JSON.stringify(data);
                        localStorage.setItem('sbsqdata', scsdata);
                        sbocount();                        
                    }
                });
            }
            function sbocount(){
                $('#status').text('Objective Questions...');
                //var userid = $('#user_id').val();
                $.ajax({ 
                    type: "POST",
                    data: {['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                    dataType: 'json', 
                    url: "<?= site_url(); ?>strong_box/sb_count_objective",
                    success: function(data) {
                        var scodata = JSON.stringify(data);
                        localStorage.setItem('sboqdata', scodata);
                        getsbtopicresults();  
                    }
                });
            }
            function getsbtopicresults(){
                $('#status').text('Finalising...');
                //var userid = $('#user_id').val();
                $.ajax({ 
                    type: "POST",
                    data: {['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                    dataType: 'json', 
                    url: "<?= site_url(); ?>strong_box/sb_topic_result",
                    success: function(data) {
                        var strdata = JSON.stringify(data);
                        localStorage.setItem('sbtopicresdata', strdata);
                        loaddata();  
                    }
                });
            }
            function loaddata(){
                $('#status').text('Almost Done...');
                var retrievedObject = localStorage.getItem('sbexamdata');
                var tObj = JSON.parse(retrievedObject);
                y=tObj.length;

                var retrievedObject2 = localStorage.getItem('fullsubjectdata');
                var sObj = JSON.parse(retrievedObject2);
                z=sObj.length;
                 
                var testlist="";
                for (i = 0; i < y; i++) {
                    var subjectsx='';
                    var subs=tObj[i].SUBJECTS;
                    let examId = tObj[i].SB_EXAM_ID;

                    var subsArr = subs.split(',');
                    var fid=0;
                    for (j = 0; j < z; j++) {
                        var newKey = j+1;
                       subsArr.forEach(function(item) {
                            if(item==sObj[j].SUBJECT_ID){
                                if(fid==0){
                                    fid=sObj[j].SUBJECT_ID;
                                }
                               // alert(item+'-|-'+sObj[j].subject);
                                subjectsx+='<div class="badge rounded-pill badges-bg-'+j+' badges-margin">'+sObj[j].SUBJECT_NAME+'</div>';
                            }
                        })
                    }
                    //index.php?page=strongboxtopics&sid='+i+'&sbeid='+fid+'
                    testlist+='<div><div class="panel-body col-md-12 col-lg-12 col-sm-12 col-xs-12 common-mb border-orange-box attendace-list-box"><div class="row  align-items-center"><div class="col-xs-8 col-lg-9 col-sm-7 col-md-8 col-xl-9 col-7"><h4 class="study-plan-name mb-1 ttitle">'+tObj[i].SB_EXAM_NAME+'</h4>'+subjectsx+'</div><div class="col-xs-4 col-lg-3 col-sm-5 col-md-4 col-xl-3 col-5 telegenic-img-align align-self-center">';

                    
                    //testlist+='<a href="<?= site_url()?>strong_box/examtopics/'+i+'/'+fid+'" class="btn btn-custom-submit btn-block">Start</a>';
                    testlist+='<a href="<?= site_url()?>strong_box/examtopics/'+examId+'/'+fid+'" class="btn btn-custom-submit btn-block">Start</a>';
                    testlist+='</div></div></div></div>';

                   
                } 
                // alert(testlist);
                 $('.feeds').html(testlist);
                 $('.loading').hide();
            }
            $(document).ready(function(){
                
                $('#pgpractice').addClass('active');
                $('#mobPractice').addClass('active');

                var cnt1=0;
                var cnt2=0;

                if(storage()){
                    if(localStorage.getItem("sbexamdata") === null) {
                         $('.loading').show();
                        getsbexams();
                    }else if(localStorage.getItem("sbtopicdata") === null) {
                         $('.loading').show();
                        getsbtopics();
                    }else if(localStorage.getItem("sbsqdata") === null) {
                         $('.loading').show();
                        sbscount();
                    }else if(localStorage.getItem("sboqdata") === null) {
                        sbocount();
                    }else if(localStorage.getItem("sbtopicresdata") === null) {
                        getsbtopicresults();
                    }else{
                        loaddata();
                    }
                }
            });
        </script>
<?php echo $this->include('components/footer-end.php'); ?>
