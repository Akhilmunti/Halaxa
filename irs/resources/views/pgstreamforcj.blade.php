<select class="form-control form-rounded"  id="PGStreams" onChange="addPostGraduation()">
<option value="">Select PG Streams</option>
<?php foreach ($PGStreamShowing as $stream) { ?>
<option value="<?php echo $stream->value?>"> <?php echo $stream->value?></option>
<?php } ?> 
</select>
<script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

    })
  </script>