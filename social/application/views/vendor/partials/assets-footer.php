<!-- jQuery --> 
<script src="<?php echo base_url(); ?>vendors/jquery/dist/jquery.min.js"></script> 
<!-- Bootstrap --> 
<script src="<?php echo base_url(); ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script> 
<!-- FastClick --> 
<script src="<?php echo base_url(); ?>vendors/fastclick/lib/fastclick.js"></script> 
<!-- NProgress --> 
<script src="<?php echo base_url(); ?>vendors/nprogress/nprogress.js"></script> 
<!-- Chart.js --> 
<script src="<?php echo base_url(); ?>vendors/Chart.js/dist/Chart.min.js"></script> 
<!-- gauge.js --> 
<script src="<?php echo base_url(); ?>vendors/gauge.js/dist/gauge.min.js"></script> 
<!-- bootstrap-progressbar --> 
<script src="<?php echo base_url(); ?>vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> 
<!-- iCheck --> 
<script src="<?php echo base_url(); ?>vendors/iCheck/icheck.min.js"></script> 
<!-- Skycons --> 
<script src="<?php echo base_url(); ?>vendors/skycons/skycons.js"></script> 
<!-- Flot --> 
<script src="<?php echo base_url(); ?>vendors/Flot/jquery.flot.js"></script> 
<script src="<?php echo base_url(); ?>vendors/Flot/jquery.flot.pie.js"></script> 
<script src="<?php echo base_url(); ?>vendors/Flot/jquery.flot.time.js"></script> 
<script src="<?php echo base_url(); ?>vendors/Flot/jquery.flot.stack.js"></script> 
<script src="<?php echo base_url(); ?>vendors/Flot/jquery.flot.resize.js"></script> 
<!-- Flot plugins --> 
<script src="<?php echo base_url(); ?>vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script> 
<script src="<?php echo base_url(); ?>vendors/flot-spline/js/jquery.flot.spline.min.js"></script> 
<script src="<?php echo base_url(); ?>vendors/flot.curvedlines/curvedLines.js"></script> 
<!-- DateJS --> 
<script src="<?php echo base_url(); ?>vendors/DateJS/build/date.js"></script> 
<!-- JQVMap --> 
<script src="<?php echo base_url(); ?>vendors/jqvmap/dist/jquery.vmap.js"></script> 
<script src="<?php echo base_url(); ?>vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script> 
<script src="<?php echo base_url(); ?>vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script> 
<!-- bootstrap-daterangepicker --> 
<script src="<?php echo base_url(); ?>vendors/moment/min/moment.min.js"></script> 
<script src="<?php echo base_url(); ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script> 
<!-- Datatables --> 
<script src="<?php echo base_url(); ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script> 
<script src="<?php echo base_url(); ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script> 
<script src="<?php echo base_url(); ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script> 
<script src="<?php echo base_url(); ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script> 
<script src="<?php echo base_url(); ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script> 
<script src="<?php echo base_url(); ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script> 
<script src="<?php echo base_url(); ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script> 
<script src="<?php echo base_url(); ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script> 
<script src="<?php echo base_url(); ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script> 
<script src="<?php echo base_url(); ?>vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script> 
<script src="<?php echo base_url(); ?>vendors/jszip/dist/jszip.min.js"></script> 
<script src="<?php echo base_url(); ?>vendors/pdfmake/build/pdfmake.min.js"></script> 
<script src="<?php echo base_url(); ?>vendors/pdfmake/build/vfs_fonts.js"></script> 

<style>
    .mb-10{
        margin-bottom: 15px !important
    }
    .productImage{
        height: 200px !important;
        width: 100% !important
    }
</style>
<script>
    function toggleFullScreen() {
        if ((document.fullScreenElement && document.fullScreenElement !== null) ||
                (!document.mozFullScreen && !document.webkitIsFullScreen)) {
            if (document.documentElement.requestFullScreen) {
                document.documentElement.requestFullScreen();
            } else if (document.documentElement.mozRequestFullScreen) {
                document.documentElement.mozRequestFullScreen();
            } else if (document.documentElement.webkitRequestFullScreen) {
                document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
            }
        } else {
            if (document.cancelFullScreen) {
                document.cancelFullScreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitCancelFullScreen) {
                document.webkitCancelFullScreen();
            }
        }
    }
</script>
<!-- Start of LiveChat (www.livechatinc.com) code -->
<script type="text/javascript">
    window.__lc = window.__lc || {};
    window.__lc.license = 11781699;
    (function () {
        var lc = document.createElement('script');
        lc.type = 'text/javascript';
        lc.async = true;
        lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(lc, s);
    })();
</script>
<noscript>
<a href="https://www.livechatinc.com/chat-with/11781699/" rel="nofollow">Chat with us</a>,
powered by <a href="https://www.livechatinc.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a>
</noscript>
<!-- End of LiveChat code -->