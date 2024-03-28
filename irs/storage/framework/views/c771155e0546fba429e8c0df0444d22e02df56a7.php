<select class="form-control select2" id="testname<?php echo $op_type ?>" name="testid[]"  onChange="ShowDescription(<?php echo $op_type ?>)" style="width: 100%;"  required="">
<option value=''>Select Test Name</option>
<?php foreach ($Testname as $TestName) { ?>
<option value="<?php echo $TestName->id?>"> <?php echo $TestName->test_name?></option>
<?php } ?> 
</select>

  <script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

     
    })
  </script>