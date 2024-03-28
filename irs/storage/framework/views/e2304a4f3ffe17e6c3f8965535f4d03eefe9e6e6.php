<select class="form-control select2" name="state" style="width: 100%;" id="state"   onChange="ShowCity()" required>
<option value=''>Select State</option>
<?php foreach ($StateShowing as $state) { ?>
<option value="<?php echo $state->location_id?>"> <?php echo $state->name?></option>
<?php } ?> 
</select>
<script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

     
    })
  </script>