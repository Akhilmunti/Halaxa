<select required="" class="form-control form-rounded" id="state" name="state" onChange="ShowCity()">
                                                <option value="">Select State/Province</option>
                                                <?php foreach ($StateShowing as $state) { ?>
<option value="<?php echo $state->location_id?>"> <?php echo $state->name?></option>
<?php } ?>
                                            </select>
                                            <i class="fa fa-caret-down"></i>
<script>
   /* $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

     
    })*/
  </script>