<?php echo $this->include('components/header.php'); ?>		
<?php echo $this->include('components/header-end.php'); ?>
<div class="container container-custom no-padding main-container">
    <div class="row">
        <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-4 col-12">
            <?php echo $this->include('components/sidebar.php'); ?>
        </div>
        <div class="col-md-8 col-lg-9 col-xl-9 col-xxl-9 col-sm-8 col-12">
            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12 no-padding right-container">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding orange-bg  orange-bg-common-pd top-data-container" style="height:auto;">
                   <div class="row">
                        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 col-sm-4 col-4">
                            <h4 class="coming-soon-back-text">
                            <a style="color:#ffffff;" href="<?= base_url(); ?>reports/test_analysis_report/<?=$examId?>" class=" coming-soon-back-text back-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                            </h4>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 col-sm-8 col-8 text-right">
                            <button onclick="window.location.href='<?= base_url();?>reports/time_management/<?= $examId?>'" class="btn btn-custom-submit btn-custom-white float-end">Time Management</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12">
                            <h4 class="heading-title-center"><?=$exam_name?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding orange-bg-common-pd middle-container-data" >
                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 no-padding">
                        <div class="panel panel-default common-mb pratice-box attendace-list-box">
                            <div class="panel-body">
                                <div id="test-score-pi-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding orange-bg-common-pd middle-container-data" >
                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 no-padding">
                        <div class="panel panel-default common-mb pratice-box attendace-list-box">
                            <div class="panel-body">
                                <div id="subject-balance-pi-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>


<?php echo $this->include('components/footer.php'); ?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script type="text/javascript">
    $('#pgreport').addClass('active');
    $('#mobreport').addClass('active');
    Highcharts.chart('test-score-pi-chart', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Test Score',
            style: {
                fontSize: '18px',
                color: '#333333',
                fontWeight: 'bold'
                //fontFamily: 'Aerial'
            }
        },
        legend: {
            // enabled: true,
            layout: "horizontal",
            symbolRadius: 0,
            align: "center",
            verticalAlign: "top",
            y: 30, // -ve = up, +ve = down
        },
        credits: {
            enabled: false
        },
        tooltip: {
            pointFormat: ': <b>{point.percentage}%</b>'
        },
        colors: ['#5D9CEC','#ff8853'],
        plotOptions: {
            pie:{
                size: 200,
                dataLabels: {
                    enabled: true,
                    //connectorWidth: 0,
                    distance: -40,
                    color: '#ffffff',
                    style: {
                        textShadow: false 
                    },
                    //format: '{point.name}: {point.y:0f}%',
                    format: '{point.y:0f}%',
                    formatter: function() {
                    return this.y ;
                    }
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Brands',
            data: [{
                    name: 'Correct',
                    y: <?= $correctPer; ?>
                }, {
                    name: 'Incorrect',
                    y: <?= $wrongPer; ?>
            }]
        }]
    });



    Highcharts.chart('subject-balance-pi-chart', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Subject Balance',
            style: {
                fontSize: '18px',
                color: '#333333',
                fontWeight: 'bold'
                //fontFamily: 'Aerial'
            }
        },
        legend: {
            // enabled: true,
            layout: "horizontal",
            symbolRadius: 0,
            align: "center",
            verticalAlign: "top",
            y: 30, // -ve = up, +ve = down
        },
        credits: {
            enabled: false
        },
        tooltip: {
            pointFormat: ': <b>{point.percentage}%</b>'
        },
        colors: ['#5D9CEC','#ff8853','#1ab31a'],
        plotOptions: {
            pie: {
                size: 200,
                dataLabels: {
                    enabled: true,
                    //connectorWidth: 0,
                    distance: -40,
                    color: '#ffffff',
                    style: {
                        textShadow: false 
                    },
                    //format: '{point.name}: {point.y:0f}%',
                    format: '{point.y:0f}%',
                    formatter: function() {
                        return this.y ;
                    }
                },
                showInLegend: true
            }
        },
        
        series: [{
            name: 'Brands',
            data: [<?= $grphData; ?>]
        }]
    });
    </script>
<?php echo $this->include('components/footer-end.php'); ?>
