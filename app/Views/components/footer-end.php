<script type="text/javascript">
    $(document).ready(function(){
        /*** following code is to check other device login ***/
        $.ajax({ 
            type: "POST",
            data: {['<?= csrf_token() ?>']:'<?= csrf_hash() ?>'}, 
            dataType: 'json', 
            url: "<?= site_url(); ?>users/check_other_device",
            success: function(data) {
                if(data.msg != ''){
                    window.location.href = '<?php echo site_url(); ?>';
                }
            }
        });
        /*** End ***/
    });
</script>        
    </body>
</html>