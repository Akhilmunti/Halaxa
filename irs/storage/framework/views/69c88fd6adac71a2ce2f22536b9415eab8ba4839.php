<select class="form-control select2" id="streamdetail" name="streamdetail" style="width: 100%;" required="">
<option value="">Select Stream</option>
<?php foreach ($StreamShowing as $stream) { ?>
<option value="<?php echo $stream->value?>"> <?php echo $stream->value?></option>
<?php } ?> 
</select>

                <script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

     
    })
  </script>