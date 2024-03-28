<select class="form-control form-rounded" name="jobrole" id="jobrole" onChange="removeerroejobrole()"  required="">
<option value="">Select Job role</option>  
<?php foreach ($JobRolesShowing as $user7) { ?>
<option value="<?php echo $user7->id?> -- <?php echo $user7->value?>"><?php echo $user7->value?></option>
<?php } ?>
</select>

<script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
    })
  </script>
