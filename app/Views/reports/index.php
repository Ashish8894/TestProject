<?php echo $this->include('components/header.php'); ?>		
        <?php echo $this->include('components/header-end.php'); ?>
		<div class="container container-custom no-padding main-container">
			<div class="row">
				<div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-4 col-12">
                    <?php echo $this->include('components/sidebar.php'); ?>
				</div>
				<div class="col-md-8 col-lg-9 col-xl-9 col-xxl-9 col-sm-8 col-12">
					<div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12 no-padding right-container">
						<div class="panel panel-default rightpanel-box">
                            <div class="panel-body rightpanel-box1" >
                                <h4 class="coming-soon-back-text">
                                    <a href="<?= base_url(); ?>users/dashboard" class="back-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> 
                                        Back</a></h4>
                            <?php foreach($examlist as $val){
                                $timestamp = '';
                                if(date('H',strtotime($val['EXAM_SUBMITTED_TIME'])) > 12){
                                    $timestamp = 'PM';
                                }else{
                                    $timestamp = 'AM';
                                }?>
                                    <div class="panel panel-default common-mb pratice-box attendace-list-box" >
                                        <div class="panel-body">
                                            <div class="row  align-items-center">
                                                <div class="col-xs-8 col-lg-9 col-sm-7 col-md-8 col-xl-9 col-7">
                                                    <h4 class="study-plan-name mb-0 ttitle"><?= $val['EXAM_NAME']?><br><small class="study-plan-name-questions"><?= date('d/m/Y H:i:s',strtotime($val['EXAM_SUBMITTED_TIME']))?>&nbsp;<?= $timestamp?> </small></h4>
                                                </div>
                                                <div class="col-xs-4 col-lg-3 col-sm-5 col-md-4 col-xl-3 col-5 telegenic-img-align align-self-center">
                                                    <a href="<?= base_url()?>reports/analysis/<?=$val['STUDENT_RESULT_ID']?>" class="btn btn-success btn-block">View Performance</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>
                                </div>
					</div>
				</div>
			</div>
		</div>
		<?php echo $this->include('components/footer.php'); ?>
		<script type="text/javascript">
            $('#pgreport').addClass('active');
            $('#mobreport').addClass('active');
            //var serverlink="../";
            // var serverlink="";
            // var jsonurl=serverlink+"json/";
        
            function gettopics(){
                $('#status').text('Topics...');
                var userid = $('#user_id').val();
                $.ajax({ 
                    type: "POST",
                    data: {userid,['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                    dataType: 'json', 
                    url: "<?= site_url(); ?>practice/list_topic",
                    success: function(data) {
                        // var listtopic = JSON.parse(data);
                        var pdata = JSON.stringify(data);
                        // console.log(pdata);
                        if(pdata.error){
                            // window.location.href='';
                        }else{
                            localStorage.setItem('topicdata', pdata);
                            scount();
                        }
                    }
                });
            }
        
            /*** This function is for count subjective question ****/
            function scount(){
            $('#status').text('Subjective Questions ...');
            var userid = $('#user_id').val();
                $.ajax({ 
                    type: "POST",
                    data: {userid,['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                    dataType: 'json', 
                    url: "<?= site_url(); ?>practice/count_subjective",
                    success: function(data) {
                        var sqdata = JSON.stringify(data);
                        localStorage.setItem('sqdata', sqdata);
                        ocount();
                    }
                });
            }
            /*** End ***/
            /*** This function is for count Objective question ****/
            function ocount(){
            $('#status').text('Objective Questions ...');
            var userid = $('#user_id').val();
                $.ajax({ 
                    type: "POST",
                    data: {userid,['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                    dataType: 'json', 
                    url: "<?= site_url(); ?>practice/count_objective",
                    success: function(data) {
                        var oqdata = JSON.stringify(data);
                        localStorage.setItem('oqdata', oqdata);
                        gettopicresults();
                    }
                });
            }
            /*** End ***/
            // function getvideos(){
            // $('#status').text('Video Lectures...');
            // var userid = $('#user_id').val();
            //     $.ajax({ 
            //         type: "POST",
            //         data: {userid,['<?//= csrf_token() ?>']:'<?//= csrf_hash() ?>'}, 
            //         dataType: 'json', 
            //         url: "<?//= site_url(); ?>srb/list_videos",
            //         success: function(data) {
            //             var lvdata = JSON.stringify(data);
            //             localStorage.setItem('topicvideos', lvdata);
            //             gettopicresults();
            //         }
            //     });
            // }

            function gettopicresults(){
            $('#status').text('Finalising...');
            var userid = $('#user_id').val();
                $.ajax({ 
                    type: "POST",
                    data: {userid,['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                    dataType: 'json', 
                    url: "<?= site_url(); ?>practice/gettopicresult",
                    success: function(data) {
                        var gtrdata = JSON.stringify(data);
                        localStorage.setItem('topicresdata', gtrdata);
                        loaddata(userid);
                    }
                });
            }

            function loaddata(x){
                $('.loading').hide();
                var retrievedObject = localStorage.getItem('subjectdata');
                var tObj = JSON.parse(retrievedObject);
                y=tObj.length;
                var subid=0;
                var testlist2="";
                for (j = 0; j < y; j++) {

                    testlist2+='<tr onclick="window.location.href=\'<?= base_url(); ?>srb/subjectWiseList/'+tObj[j].SUBJECT_ID+'\'"><th><a class="progress-a">'+tObj[j].SUBJECT_NAME+'</a></th>'; 
                    
                    for(k=1;k<=6;k++){
                    
                        var retrievedObject3 = localStorage.getItem('topicresdata');
                        var rObj = JSON.parse(retrievedObject3);
                        var x=rObj.length;

                        var tcount=0;
                        var scount=0;
                        var ccount=0;
                        var wcount=0;

                        for(i=0;i<x; i++){
                            if(rObj[i].SUBJECT_ID!=tObj[j].SUBJECT_ID || rObj[i].STEP_ID!=k){
                                continue;
                            }else{
                                if(rObj[i].given_answer==''){
                                    scount++;
                                }else{
                                    if(rObj[i].answer==rObj[i].given_answer && rObj[i].question_type!=3){
                                        ccount++;
                                    }else if((rObj[i].given_answer>=rObj[i].range1 && rObj[i].given_answer<=rObj[i].range2) && rObj[i].question_type==3){
                                        ccount++;
                                    }else{
                                        wcount++;
                                    }
                                }                                    
                                tcount++;
                            }
                        }

                        var cpers=Math.round((ccount/tcount)*100) ;
                        var wpers=Math.round((wcount/tcount)*100) ;
                        //alert(tObj[j].subject+' '+cpers+' '+wpers);
                        if(tcount==0){
                            var qcount='<div class="progressText text-center">NA</div>';
                        }else{
                            //var qcount='<div>'+(ccount+wcount)+'/'+tcount+'</div>';
                            var qcount='<div><span class="progressText float-start">'+(ccount+wcount)+'</span><span class="progressText float-end">'+tcount+'</span></div><div style="clear:both;"></div>';
                        }
                        
                        //var pbar=qcount+'<div class="progress" style="margin-bottom: 0;"><div class="progress-bar progress-bar-success" style="width: '+cpers+'%"><span class="sr-only">'+cpers+'% Complete (success)</span>'+cpers+'%</div><div class="progress-bar progress-bar-danger" style="width: '+wpers+'%"><span class="sr-only">'+wpers+'% Complete (danger)</span>'+wpers+'%</div></div>';
                        if(tcount == 0){
                            var pbar = qcount+'<div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated" aria-valuemax="100" aria-valuenow="0"></div></div>';
                        }else{
                            //js added by shraddha
                            var ts = (ccount+wcount);
                            var progressBarWidth = ts/tcount*100;
                            var pbar = qcount+'<div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated" aria-valuemax="'+ tcount +'" aria-valuenow="'+ ts +'" style="width:' + progressBarWidth + '%;"></div></div>';
                            
                            //var pbar = '<div class="myProgress"><div class="myBar" style="width:10.50%"></div></div>';

                        }

                        
                        testlist2+='<td><div class="srb-progressbar">'+pbar+'</div></td>';
                    }
                    testlist2+='</tr>';

                }
                $('.mlist').html(testlist2);
                
                /*var rankingObject = localStorage.getItem('topicrankdata');
                var robj=JSON.parse(rankingObject);
                $('#srank').text(robj.ranking);*/
            }
            $(document).ready(function(){
                /*** following code is to check other device login ***/
                /*** End ***/
                $('#pganalysis').addClass('active');
                if(storage()){
                    if(localStorage.getItem("topicdata") === null) {
                        $('.loading').show();
                        gettopics();
                    }else if(localStorage.getItem("sqdata") === null) {
                        scount();
                    }else if(localStorage.getItem("oqdata") === null) {
                        ocount();
                    }else if(localStorage.getItem("topicresdata") === null) {
                        gettopicresults();
                    }else{
                        loaddata();
                    }
                }
                      
            });
        </script>
<?php echo $this->include('components/footer-end.php'); ?>
