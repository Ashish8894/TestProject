<?php echo $this->include('components/header.php'); ?>
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
                       
                        <div class="row">
                            <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 col-4">
                                <h4 class="coming-soon-back-text">
                                    <a href="<?= base_url(); ?>tests" class="back-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> 
                                        Back</a>
                                </h4>
                            </div>
                            <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8 col-8 text-end mb-3">
                                <!-- <a href="<?= base_url()?>rewind/createtest" id="floatbtn" class="btn btn-lg btn-custom-submit btn-custom-submit-large"><span class="fa fa-plus"></span> Create Test</a> -->

                                <a href="<?= base_url()?>rewind/createtest" id="floatbtn"  class="btn create-test-btn btn-lg">
                                    <span>Create Test</span>
                                </a>
                            </div>
                        </div>

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
            
        
<?= $this->include('components/footer.php');?>
<script type="text/javascript">
    $("#pgtest").addClass('active');
    $('#mobTest').addClass('active');
    var cnt1=0;
    var cnt2=0;

    var var1 = 'refresh';

    function loaddata(){
        /*if(var1=='refresh'){*/
            
            $.ajax({ 
                type: "POST",
                data: {['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                dataType: 'json', 
                url: "<?= site_url(); ?>rewind/list_dynamic_tests",
                success: function(data) {
                    $('.loading').hide();
                    var dtdata = JSON.stringify(data);
                    localStorage.setItem('dynamictestdata', dtdata);
                
                    var retrievedObject = localStorage.getItem('dynamictestdata');
                    var tObj = JSON.parse(retrievedObject);
                    
                    y=tObj.length;
                    var testlist="";
                    for (i = 0; i < y; i++) {
                        testlist+='<div class="panel panel-default common-mb pratice-box attendace-list-box" ><div class="panel-body"><div class="row  align-items-center"><div class="col-xs-8 col-lg-8 col-sm-7 col-md-8 col-xl-9 col-7 align-self-center"><h4 class="study-plan-name mb-0">'+tObj[i].TEST_TITLE+'<br><small class="study-plan-name-questions">'+tObj[i].NUMBER_OF_QUESTIONS+' Questions | '+tObj[i].TEST_DURATION+' min</small></h4></div><div class="col-xs-4 col-lg-4 col-sm-5 col-md-4 col-xl-3 col-5 align-self-center text-end"><div><a href="#" class="btn btn-custom-submit btn-custom-delete stndtest btn-block ms-1" dtestid="'+tObj[i].DYNAMIC_TEST_ID+'">Delete</a>';

                    

                        if(tObj[i].EXAM_COMPLETED=='YES'){
                            testlist+='<a href="<?= base_url()?>rewind/viewdresult/'+tObj[i].DYNAMIC_TEST_ID+'/'+i+'" class="btn btn-custom-submit btn-custom-result ms-1">Result</a>';
                        }else{                         
                            testlist+='<a href="<?= base_url()?>rewind/dtestins/'+tObj[i].DYNAMIC_TEST_ID+'" class="btn btn-custom-submit ms-1">Start</a>';
                        }
                        testlist+='</div></div></div></div></div>';

                    } 
                
                    $('.feeds').html(testlist);
                }
            });
            
        /*}else{
            var retrievedObject = localStorage.getItem('dynamictestdata');
            var tObj = JSON.parse(retrievedObject);
            
            y=tObj.length;
            var testlist="";
            for (i = 0; i < y; i++) {
                testlist+='<div class="panel panel-default common-mb pratice-box attendace-list-box"><div class="panel-body"><div class="row  align-items-center"><div class="col-xs-8 col-lg-8 col-sm-7 col-md-8 col-xl-9 col-7 align-self-center"><h4 class="study-plan-name mb-0">'+tObj[i].TEST_TITLE+'<br/><small class="study-plan-name-questions">'+tObj[i].NUMBER_OF_QUESTIONS+' Questions | '+tObj[i].TEST_DURATION+' min</small></h4></div><div class="col-xs-4 col-lg-4 col-sm-5 col-md-4 col-xl-3 col-5 align-self-center text-end"><div><a href="#" class="btn  btn-custom-delete ms-1 stndtest btn-block" dtestid="'+tObj[i].DYNAMIC_TEST_ID+'">Delete</a> ';

                    

                if(tObj[i].EXAM_COMPLETED == 'YES'){
                    testlist+='<a href="<?= base_url()?>rewind/viewdresult/'+tObj[i].DYNAMIC_TEST_ID+'/'+i+'" class="btn btn-custom-submit btn-custom-result ms-1">Result</a>';
                }else{                          
                    testlist+='<a href="<?= base_url()?>rewind/dtestins/'+tObj[i].DYNAMIC_TEST_ID+'" class="btn btn-warning ms-1">Start</a>';
                }
                testlist+='</div></div></div></div></div>';

            } 
            $('.feeds').html(testlist);
            $('.loading').hide();
        }  */
    }
    $(document).ready(function(){
        /*** following code is to check other device login ***/
        /*** End ***/
        $('#pgdtests').addClass('active');

            
        if(storage()){
                
            /*if(localStorage.getItem("topicdata") === null) {
                $('.loading').show();
                gettopics(localStorage.icduserid);
            }else if(localStorage.getItem("sqdata") === null) {
                scount(localStorage.icduserid);
            }else if(localStorage.getItem("oqdata") === null) {
                ocount(localStorage.icduserid);
            }else if(localStorage.getItem("topicresdata") === null) {
                gettopicresults(localStorage.icduserid);
            }else{
                loaddata(localStorage.icduserid);
            }  */
            loaddata();
        }

        $('.feeds').on('click', '.stndtest', function(e) {
            e.preventDefault();
            var dtestid=$(this).attr('dtestid');
            var divdel=$(this).parents('.panel');
            var c=confirm('Do you really want to delete test record?');
            //var userid = $('#user_id').val();
            if(c){
                $('.loading').show();
                $.ajax({ 
                        type: "POST",
                        data: {dtestid,['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
                        dataType: 'json', 
                        url: "<?= site_url(); ?>rewind/deletedtest",
                        success: function(data){
                            // var deldata = JSON.stringify(data);
                            // var tObj = JSON.parse(deldata);
                            if(data.msg == 'success'){
                                $('.loading').hide();
                                //divdel.hide();
                                window.location.reload();
                            }
                        }
                });
            }
            //alert( dtestid );
        });
    });
</script>

<?= $this->include('components/footer-end.php'); ?>
