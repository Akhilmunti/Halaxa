 <select class="form-control form-rounded" id="city" name="city" onChange="addLocation();">
                                                <option value="">City/Locality</option>
                                                <?php foreach ($CityShowing as $city) { ?>
<option value="<?php echo $city->name?>"> <?php echo $city->name?></option>
<?php } ?> 
                                            </select>
                                            <i class="fa fa-caret-down"></i>
<script>
    /*$(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
    })*/
  </script>