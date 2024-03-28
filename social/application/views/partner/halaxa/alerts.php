<?php
$result = $this->session->flashdata('result');
$error = $this->session->flashdata('error');
?>
<?php if ($result) { ?>
    <div class="alert alert-success">
        <?php echo $result ?>
    </div>
<?php } ?>
<?php if ($error) { ?>
    <div class="alert alert-danger">
        <?php echo $error ?>
    </div>
<?php } ?>