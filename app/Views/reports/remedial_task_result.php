<?php echo $this->include('components/header.php'); ?>		
<?php echo $this->include('components/header-end.php'); ?>
<div class="container container-custom no-padding main-container">
    <div class="row">
        <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-4 col-12">
            <?php echo $this->include('components/sidebar.php'); ?>
        </div>
        <div class="col-md-8 col-lg-9 col-xl-9 col-xxl-9 col-sm-8 col-12">
            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12 no-padding right-container">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 col-xxl-12 col-12 no-padding orange-bg  orange-bg-common-pd top-data-container" style="height:auto;">
                    <h4 class="coming-soon-back-text ">
                        <a style="color:#fff;" href="<?= base_url(); ?>reports/analysis/<?=$resultId?>" class="back-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> 
                            Back</a>
                    </h4>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 col-xxl-12 col-12 no-padding tests-box avail-appeared-box">
                        <div class="row">
                            <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 col-xxl-12 col-12" >
                                <p class="testtitle custom-testtitle">
                                    Similar question: <span class="testhead">0 m 19 s</span>
                                </p>
                            </div> -->
                            <div class="col-lg-4 col-sm-12 col-md-3 col-xxl-4 col-xl-4 col-12 text-center align-self-center">
                                <img class="result-img" src="<?= base_url()?>images/result.svg" />
                            </div>
                            <div class="col-lg-8 col-sm-12 col-md-9 col-xxl-8 col-xl-8 col-12 align-self-center">
                                <div class="middle-container-data" style="background: none;border-radius: 0;">
                                    <div class="text-center">
                                        <div class="row">
                                            <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4 col-xxl-4 col-4">
                                                <div class="col-lg-12 col-xxl-12 stud-profile-box result-count-box mb-0">
                                                    <div class="text-center">
                                                        <h1 class="ipadview-h1" style="color: #00B085;" id="ccount">2</h1>
                                                        <h5 class="ipadview-h5">Correct</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4 col-xxl-4 col-4">
                                                <div class="col-lg-12 col-xxl-12 stud-profile-box result-count-box mb-0">
                                                    <div class="text-center">
                                                        <h1 class="ipadview-h1" style="color: #F17336;" id="wcount">2</h1>
                                                        <h5 class="ipadview-h5">Wrong</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4 col-xxl-4 col-4">
                                                <div class="col-lg-12 col-xxl-12 stud-profile-box  result-count-box mb-0 ">
                                                    <div class="text-center">
                                                        <h1 class="ipadview-h1" style="color: #0099CB;" id="ucount">3</h1>
                                                        <h5 class="ipadview-h5">Unsolved</h5>
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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 col-xxl-12 col-12 no-padding orange-bg-common-pd middle-container-data ">
                    <div class="" style="margin-top: 15px">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12 col-xxl-12 col-12">
                                <div class="panel-body col-lg-12 col-md-12 col-sm-12 col-xl-12 col-xxl-12 col-12 common-mb" >
                                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12  no-padding">
                                        <h4 class="testhead">
                                        Time spend on  -  : <span>0 m 37 s</span>
                                        </h4>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12  no-padding">
                                        <h4 class="analysis-heading mt-3 mb-3">
                                            <span>Attempted  - <span style="color:#f17336;" class="testtitle">1</span></span>
                                        </h4>
                                    </div>
                                    <div class="panel-body col-lg-12 col-md-12 col-sm-12 col-xl-12 col-xxl-12 col-12 no-padding mb-5">
                                        <div class="table-responsive">
                                            <table class="table3">
                                                <thead>
                                                    <tr>
                                                        <th>Q. No.</th>
                                                        <th>Hint</th>
                                                        <th>Status</th>
                                                        <th>Correct</th>
                                                        <th>Your</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="feeds">
                                                    <tr>
                                                        <td>
                                                            <button class="result-circle-btn qbtnx btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-question">1</button>
                                                        </td>
                                                        <td ><a href="#" data-bs-toggle="modal" data-bs-target="#modal-hint">View</a></td>
                                                        <td>Correct</td>
                                                        <td>A</td>
                                                        <td>B</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade practice-custom-modal " tabindex="-1" role="dialog" id="modal-question"  data-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close modal-button-close" data-bs-dismiss="modal"></button>
            <div class="modal-header d-block" style="padding-bottom:0;border-bottom:none;">
                <h4 class="modal-title practice-custom-modal-title" >Question No. -</h4>
            </div>
            <div class="modal-body" style="padding-bottom: 0;">
                <p>A graph is plotted below x and y and it follows equation . The value of y for  is</p>
            </div>
            <div class="modal-footer d-block" style="padding-top:0;">
                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 text-center mt-4">
                    <button type="button" class="btn btnmodal-custom-submit" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade practice-custom-modal " tabindex="-1" role="dialog" id="modal-hint"  data-keyboard="false">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close modal-button-close" data-bs-dismiss="modal"></button>
            <div class="modal-header d-block" style="padding-bottom:0;border-bottom:none;">
                <h4 class="modal-title practice-custom-modal-title" >Hint</h4>
            </div>
            <div class="modal-body" style="padding-bottom: 0;">
                <div class="question-answer-modal-box">
                    <div class="question-modal-box">
                        <p class="que-ans-heading">
                            Hint 1 -
                        </p>
                    </div>
                    <div class="question-modal-box">
                        <p>lorem ipsum</p>
                    </div>
                </div>
                <div class="question-answer-modal-box">
                    <div class="question-modal-box">
                        <p class="que-ans-heading">
                            Hint 2 -
                        </p>
                    </div>
                    <div class="question-modal-box">
                        <p>lorem ipsum</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php echo $this->include('components/footer.php'); ?>
<script type="text/javascript">
    $('#pgreport').addClass('active');
    $('#mobreport').addClass('active');
</script>
<?php echo $this->include('components/footer-end.php'); ?>
