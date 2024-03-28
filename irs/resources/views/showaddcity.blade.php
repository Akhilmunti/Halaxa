<!-- <label>State <small>(required)</small></label> -->
<select class="form-control select2" name="city" style="width: 100%;" id="state" onChange="removeerrorcity()" required>
<option value=''>Select City</option>
<?php foreach ($CityShowing as $city) { ?>
<option value="<?php echo $city->name?>"> <?php echo $city->name?></option>
<?php } ?> 
<option value="Other">Other</option>
</select>
<script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
    })
  </script>