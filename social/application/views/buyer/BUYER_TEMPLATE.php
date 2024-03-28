<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('buyer/partials/assets-head') ?>
  <!-- Custom Theme Style -->
  <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
</head>
<body class="nav-md">
<div class="container body">
  <div class="main_container">
  <?php $this->load->view('buyer/partials/left-nav'); ?>    
  <?php $this->load->view('buyer/partials/top-nav'); ?>
    <!-- page content -->
    
    <!-- /page content --> 

    <!-- footer content -->
    <?php $this->load->view('buyer/partials/footer') ?>
    <!-- /footer content --> 
  </div>
</div>

<?php $this->load->view('buyer/partials/assets-footer'); ?>
  <!-- Custom Theme Scripts --> 
<script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
<script>
	  document.addEventListener("touchstart", function(){}, true);
</script>
</body>

</html>