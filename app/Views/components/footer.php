<div class="container container-custom footer-bottom no-padding">
    <div class="row footer-mlmr">  
        <div class="col-md-4 col-lg-3 col-sm-12 col-12">
            <p class="footer-text">&copy; 2020 - 2023, ICAD School of Learning </p>
        </div>
        <div class="col-md-8 col-lg-9 col-sm-12 col-12">
        </div>
       <!-- <div class="col-md-6 col-lg-6 col-sm-6 col-6 ml-auto">
                <p  class="footer-text"> Technology Provider 
                <a href="http://lamphub.com/" target="_blank"  class="footer-text">
                <img src="assets/images/lhlogo.png" height="25" /> LAMP Hub</a></p>
        </div>-->
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>    
<!-- <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"></script> -->     
<!-- <script src="<?= base_url();?>assets/js/ux.js"></script>  -->

<script>
    function storage(){
        if (typeof(Storage) !== "undefined") {
            return true;
        } else {
           return false;
        }
    }
    function openmobNav()
        {
        document.getElementById("mobMenutrey").style.width = "80%";
        document.getElementById('bodyOverlaycover').classList.add('bodyOverlay');   
        // document.body.style.backgroundColor = "rgba(0,0,0,0.7)";
        //document.getElementsByClassName("right-container")[0].style.opacity = "0"
        
    };
    function closemobNav()
    {
        document.getElementById("mobMenutrey").style.width = "0";
        document.getElementById('bodyOverlaycover').classList.remove('bodyOverlay'); 


        //document.body.classList.remove('overlay3'); 
        //document.body.style.backgroundColor = "white";
        //document.getElementsByClassName("right-container")[0].style.opacity = "1"
    }
</script>