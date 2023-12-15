<?php echo $this->include('components/header.php'); ?>	
		<style>
            .progress-a 
            {
                color: #f07336 !important;
            }
            .progress-a:hover
            {
                color: grey !important;
                text-decoration: none;
            }
            .right-container .tbl-attendance 
            {
                font-size: 12px;
                margin-bottom: 0;
                height: 1px;
            }
            .sub-title
            {
                font-size:20px;
                margin-bottom:15px;
                color:#f07336;
            }
        </style>
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
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding form-group">
                                    <h4 class="coming-soon-back-text ">
                                        <a  href="<?= base_url(); ?>practice" class="back-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> 
                                            Back</a>
                                    </h4>
                                </div>
                                <div class="row no-padding" id="perform-tab" style="padding-top:0;">
                                    <div class="col-md-12">
                                        <input type="hidden" id="user_id" name="user_id" value="<?= $_SESSION['icaduserid']?>">
                                        <ul class="nav nav-tabs newmlist" style=""><!--nav nav-pills attendace-list-box-->
                                            <li class="nav-item" role="presentation" >
                                                <h2 class="sub-title"></h2>
                                            </li>
                                        </ul>
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12 common-mb">
                                            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12 no-padding inner-box-shadow">
                                                <div class="table-responsive">
                                                    <table class="table table-striped  tbl-attendance" style="border: 0.5px solid #f07336;">
                                                        <thead>
                                                            <tr>
                                                                <th class="theadbg" scope="col">Session</th>
                                                                <th class="theadbg" scope="col">Step 1</th>
                                                                <th class="theadbg" scope="col">Step 2</th>
                                                                <th class="theadbg" scope="col">Step 3</th>
                                                                <th class="theadbg" scope="col">Step 4</th>
                                                                <th class="theadbg" scope="col">Step 5</th>
                                                                <th class="theadbg" scope="col">Step 6</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="mlist">
                                                            <tr>
                                                                <td colspan="7">Loading</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
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
		<?php echo $this->include('components/footer')?>
		<script type="text/javascript">
            $('#pgpractice').addClass('active');
            $('#mobPractice').addClass('active');
            $(document).ready(function(){
                /*** following code is to check other device login ***/
                /*** End ***/
                var var1 = <?php if(isset($tid)){ echo $tid; }else{ echo 1; } ?>; 

                var retrieveSub = localStorage.getItem('subjectdata');
                var sObj = JSON.parse(retrieveSub);
                x=sObj.length;

                var retrievedObject = localStorage.getItem('topicdata');
                var tObj = JSON.parse(retrievedObject);
                y=tObj.length;
                var subid=0;
                var testlist2="";
                var topicTitle = "";
                for (j = 0; j < y; j++) {
                    if(var1==tObj[j].TOPIC_ID){
                        var ttlec=tObj[j].lecture;
                        var lecArr = ttlec.split(', ');
                        topicTitle = tObj[j].TOPIC_NAME;
                        subid = tObj[j].SUBJECT_ID;
                        var number=1;
                        jQuery.each(lecArr, function(index, item) {
                            var levellink=item;
                            number=index;
                            /*if(number==0){
                                testlist2+='<tr><th><span>Challenge Steps</span></th>';
                            }else{
                                testlist2+='<tr><th><span>Session '+number+'</span></th>';
                            }*/
                            if(item==0){
                                testlist2+='<tr><th><span class="progress-a">Challenge Steps</span></th>';
                            }else{
                                testlist2+='<tr><th><span class="progress-a">Lecture '+item+'</span></th>';
                            }         
                            for(k=1;k<=6;k++){
                                        
                                var retrievedObject3 = localStorage.getItem('topicresdata');
                                var rObj = JSON.parse(retrievedObject3);
                                var x=rObj.length;

                                var tcount=0;
                                var scount=0;
                                var ccount=0;
                                var wcount=0;

                                for(i=0;i<x; i++){
                                    //if(rObj[i].TOPIC_ID!=tObj[j].TOPIC_ID || 'L-'+number!=rObj[i].level || rObj[i].step!=k){
                                    if(rObj[i].TOPIC_ID != tObj[j].TOPIC_ID || item != rObj[i].level || rObj[i].STEP_ID!=k){
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

                                    var ts = (ccount+wcount);
                                    var pbar = qcount+'<div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated" aria-valuemax="'+ tcount +'" aria-valuenow="'+ ts +'" style="width:' + progressBarWidth + '%;"></div></div>';
                                }

                                        
                                testlist2+='<td><div class="srb-progressbar">'+pbar+'</div></td>';
                            }
                            testlist2+='</tr>';
                                    
                        });
                    }
                }
                var SubName = '';
                for (h = 0; h < x; h++) {
                    if(subid == sObj[h].SUBJECT_ID){
                        SubName = sObj[h].SUBJECT_NAME;
                    }
                }
                $('.mlist').html(testlist2);
                $('.sub-title').text('SRB - '+SubName+' - '+topicTitle);
              
            });
        </script>
<?php echo $this->include('components/footer-end.php'); ?>
