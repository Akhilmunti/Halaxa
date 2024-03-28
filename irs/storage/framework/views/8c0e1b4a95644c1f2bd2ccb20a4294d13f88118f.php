<select class="form-control select2" id="DoctorateStreams" style="width: 100%;">
<option value="">Select Doctorate Streams</option>  
<?php foreach ($DoctorateStreamShowing as $stream) { ?>
<option value="<?php echo $stream->value?>"> <?php echo $stream->value?></option>
<?php } ?> 
</select>
<script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

    })
  </script>