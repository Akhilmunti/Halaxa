<?php
$result = $this->session->flashdata('result');
?>
<?php if ($result) { ?>
    <div class="alert alert-success">
        <?php echo $result ?>
    </div>
<?php } ?>