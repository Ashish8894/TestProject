
<?php echo $this->include('components/header.php'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">     
    
<?php echo $this->include('components/header-end.php'); ?>
    <div class="container container-custom no-padding main-container mob-main-container">
        <div class="row">
            <div class="col-md-4 col-lg-3 col-sm-4 col-12">
                <?php echo $this->include('components/sidebar.php'); ?>
            </div>
            <div class="col-md-8 col-lg-9 col-sm-8 col-12">
                <!-- <div class="row dashload">
                    <div class="col-xs-12" style="padding:10px;">
                        <div class="panel panel-default">
                            <div class="panel-body text-center">
                                <h4>STUDY PLAN & Other Tools are Loading ... <i class="fa fa-spinner fa-pulse fa-fw"></i></h4>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="col-lg-12 col-12 no-padding right-container">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding slider-home">
                        <section class="carousel-section">
                            <div class="carousel-container">
                            <div class="owl-carousel owl-theme">
                                <div class="carousel-item" onclick="window.location.href='<?= base_url(); ?>practice'">
                                    <div class="carousel-item__card">
                                        <h2 class="carousel-sections-name">Practice</h4>
                                        <h2 class="carousel-sections-subname">Daily Lecture Specific </br> Solving Material</h4>
                                        <img class="carousel-sections-img" src="<?= base_url()?>assets/images/blogging.png">
                                        <!--<img class="carousel-slide-corner-img" src="assets/images/Ellipse 3.svg">-->
                                    </div>
                                </div>
                                <div class="carousel-item" onclick="window.location.href='<?= base_url(); ?>tests'">
                                    <div class="carousel-item__card">
                                        <h2 class="carousel-sections-name">Test</h4>
                                        <h2 class="carousel-sections-subname invisible" >Daily Lecture Specific </br> Solving Material</h4>
                                        <img class="carousel-sections-img" src="<?= base_url()?>images/Group-4135.png">
                                       <!-- <img class="carousel-slide-corner-img" src="assets/images/Ellipse 3.svg">-->
                                    </div>
                                </div>
                                <div class="carousel-item" onclick="window.location.href='<?= base_url(); ?>video'">
                                    <div class="carousel-item__card">
                                        <h2 class="carousel-sections-name">Discover Stories</h4>
                                        <h2 class="carousel-sections-subname" >Video Sessions  With<br> Topper and Experts</h4>
                                        <img class="carousel-sections-img invisible" src="<?= base_url(); ?>assets/images/blogging.png">
                                        <img class="carousel-slide-corner-img" src="<?= base_url()?>images/orangeequipse.png">
                                    </div>
                                </div>
                                <div class="carousel-item" onclick="javascript:void(0);"><!--window.location.href='<?//= base_url(); ?>telegenic'-->
                                    <div class="carousel-item__card">
                                        <h2 class="carousel-sections-name">Telegenic</h4>
                                        <h2 class="carousel-sections-subname" >JEE And NEET <br/> Videos</h4>
                                        <img class="carousel-sections-img invisible" src="<?= base_url()?>assets/images/blogging.png">
                                        <div class="coming-soon-box">
                                            <h2 class="sections-subname coming-soon-text" style="font-weight:normal;">Launching <br> Soon!</h2>
                                        </div>
                                        <img class="carousel-slide-corner-img" src="<?= base_url()?>assets/images/Ellipse 3.svg">
                                    </div>
                                </div>
                            </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
          
        </div>
    </div>
<?php echo $this->include('components/footer.php'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script type="text/javascript">

        $("#pgdashboard").addClass('active');
        $('#mobDashboard').addClass('active');

        jQuery(document).ready(function($){
        let slider = $('.owl-carousel');
        slider.each(function () {
          $(this).owlCarousel({
            nav: true,
            loop:false,
            dots: false,
            items: 2,
            pagination: false,
            margin: 30,
            autoHeight: false,
            stagePadding: 50,
            responsiveClass: true,
            
            responsive:{
              //setting for ipad mobile view
              0:{
                items: 1,
                stagePadding: 0,
                margin:20,
                nav: true,
                dots: false,
              },
              //setting for ipad portrait view
              767:{
                items: 1,
                nav: true,
                stagePadding: 50,
              },
              //setting for ipad landscape view and desktop
              1024:{
                items: 2,
                nav: true,
                dots: false,
                stagePadding: 100,
                margin: 30,
                
              }
            }
          });
        });
        
      });

      $('.owl-carousel').on('changed.owl.carousel', function(e) {

            var items     = e.item.count;     // Number of items
            var item      = e.item.index;     // Position of the current item
            var size      = e.page.size;      // Number of items per page

            if (item === 0) {
                //console.log('Start')
                $(".owl-carousel .owl-stage").css({"display": "flex", "justify-content": "left"});
            }
            if ((items - item) === size) {
                //console.log('Last')s
                //$(".owl-carousel .owl-item").css("float", "right");
                $(".owl-carousel .owl-stage").css({"display": "flex", "justify-content": "right"});
            }
            });      

        function storage(){
            if (typeof(Storage) !== "undefined") {
              //alert("Code for localStorage/sessionStorage.");
                return true;
            } else {
              //alert('Sorry! No Web Storage support..');
               return false;
            }
        }
        
        
        </script>
<?php echo $this->include('components/footer-end.php'); ?>
