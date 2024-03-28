<select class="form-control form-rounded" id="UGStreams" onChange="removeerroeUGStreams()" required="">
<option value="">Select UG Streams</option>
<?php foreach ($UGStreamShowing as $stream) { ?>
<option value="<?php echo $stream->value?>"> <?php echo $stream->value?></option>
<?php } ?> 
</select>

                <script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

     
    })
  </script>