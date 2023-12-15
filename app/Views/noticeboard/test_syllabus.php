<?= $this->include('components/header.php'); ?>
<style>
    canvas{
        width: 100%;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pdfjs-dist/web/pdf_viewer.min.css">
<script src="https://cdn.jsdelivr.net/npm/pdfjs-dist/build/pdf.min.js"></script>
<?= $this->include('components/header-end.php'); ?>
        <div class="container container-custom no-padding main-container">
            <div class="row">
                <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-4 col-12">
                    <?= $this->include('components/sidebar.php'); ?>
                </div>
                <div class="col-md-8 col-lg-9 col-xl-9 col-xxl-9 col-sm-8 col-12">
                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-12 no-padding right-container">
                        <div class="panel panel-default rightpanel-box">
                            <div class="panel-body rightpanel-box1">
                                <h4 class="coming-soon-back-text">
                                    <a href="<?= base_url(); ?>noticeboard" class="back-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> 
                                        Back</a>
                                </h4>
                                <div class="pageoverlay"  style="display:none;">
                                    <div class="pageoverlay__inner">
                                        <div class="pageoverlay__content">
                                            <h2 style="color:#ffffff;">Loading...</h2>
                                            <p>PDF loading may take a few seconds, please wait...</p>
                                            <span class="spinner"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-padding">                     
                                    <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 feeds">
                                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 no-padding" >
                                            <?php
                                            $mainUrl = '';
                                            $locationUrl = '';
                                            if($detail['msg'] == 'Data Not Available'){?>
                                                <div class="panel-body col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 common-mb pratice-box attendace-list-box">
                                                    <h3 class="study-plan-topic-not-allot mb-0">Data Not Available</h3>
                                                </div>
                                            <?php
                                             }else{
                                                $url =  MAIN_ROOT.'asset_space/'.$detail['location'];

                                                if(file_exists($url)){
                                                    $locationUrl = $detail['location'];
                                                        if($detail['DOWNLOADABLE'] == 'YES'){?>
                                                            <button class="btn btn-danger btn-file-dw  btn-library-file-dw">
                                                                <a style="color:#ffffff;text-decoration:none;" href="<?= ADMIN_URL.'asset_space/'.$detail['location']?>" target="_blank" download> 
                                                                    <span><i class="fa-solid fa-cloud-download-alt" aria-hidden="true"></i></span>
                                                                    Download
                                                                </a>
                                                            </button>
                                                            <div id="pdfviewerDiv" style="width:100%">

                                                            </div>
                                                        <?php }else{ ?>
                                                            <div id="pdfviewerDiv" style="width:100%">

                                                            </div>
                                                <?php }}else{ ?>
                                                    <div class="panel-body col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-sm-12 common-mb pratice-box attendace-list-box">
                                                        <h3 class="study-plan-topic-not-allot mb-0">Data Not Available</h3>
                                                    </div>
                                                <?php }}?>
                                                <input type="hidden" id="namedata" name="namedata" value="<?= ADMIN_URL ?>asset_space/">
                                                <input type="hidden" id="data" name="data" value="<?= $locationUrl;?>">
                                        </div>
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
    
    $("#pgnotifications").addClass('active');
    $('#mobNotification').addClass('active');

    $( document ).ready(function() {
        setTimeout(function(){ $('#custom-loader').fadeOut('slow'); },2000);
    });

   
    var name = $("#namedata").val();
    var name1 = $("#data").val();
    var details = name+name1;
    
    if(name1 != ''){
        $(".pageoverlay").show();
        let source = encodeURI(details);
        $.get(source)
        .done(function() { 
            var screenwidth = screen.width;
            let pageViewPort = '';
            if(source != ''){
                initPDFViewer=()=>{
                    pdfjsLib.getDocument(source).promise.then(pdfDoc=>{
                        let pages = pdfDoc._pdfInfo.numPages
                        for(let i=1;i<=pages ;i++){
                            pdfDoc.getPage(i).then(page=>{
                                let pdfCanvas = document.createElement("canvas")
                                let context = pdfCanvas.getContext("2d")
                                if(screenwidth < 767){
                                    pageViewPort = page.getViewport({scale:1.0}) /*change by devashish*/
                                }else if(screenwidth > 768 && screenwidth < 1024 ){
                                    pageViewPort = page.getViewport({scale:1.1})
                                }else{
                                    pageViewPort = page.getViewport({scale:1.8})
                                }
                                pdfCanvas.width = pageViewPort.width
                                pdfCanvas.height = pageViewPort.height
                                $("#pdfviewerDiv").append(pdfCanvas)
                                page.render({
                                    canvasContext:context,
                                    viewport:pageViewPort
                                })
                                if(i == pages){
                                    $(".pageoverlay").hide();
                                }
                            }).catch(pageErr=>{
                                $(".pageoverlay").hide();
                            })
                        }
                    }).catch(pdfErr=>{
                        $(".pageoverlay").hide();
                    })
                }
                $(function(){
                initPDFViewer()
                })
            }
        }).fail(function() { 
            $(".pageoverlay").hide();
        })
    }
</script>
<?= $this->include('components/footer-end.php');?>