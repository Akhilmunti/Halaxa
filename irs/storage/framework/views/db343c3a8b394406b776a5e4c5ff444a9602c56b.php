
<select class="form-control select2" id="coursedetail" name ="coursedetail"style="width: 100%;" onChange="ShowStream(<?php echo $op_type; ?>);" required="">
<option value="">Select Course</option>
<?php foreach ($CourseShowing as $cource) { ?>
<option value="<?php echo $cource->value?>"> <?php echo $cource->value?></option>
<?php } ?> 
</select>

  <script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

     
    })
  </script>
