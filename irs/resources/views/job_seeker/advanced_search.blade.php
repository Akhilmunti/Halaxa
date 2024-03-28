<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        @include('halaxatheme.css')

    </head>

    <body>
        <!-- Main -->
        <div class="main">
            <div class="container">
                <form action="<?php echo url("/job_seeker/searchapplyforjob"); ?>" method="post" id="mins" enctype="multipart/form-data" >
                    <input type = "hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="row">
                    <div class="col-md-6 mx-auto mt-5">
                        <div class="theme-card p-5 job-description">
                            <h5 class="text-center">Search</h5>
                            <div class="form-group row mt-3">
                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                    Keyword
                                </label>
                                <div class="col-md-8">
                                    <input placeholder="Enter Keyword" class="form-control form-rounded" type="text" id="keyword" name="keyword"/>
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                    Country
                                </label>
                                <div class="col-md-8">
                                    <select required="" class="form-control form-rounded" id="country" name="country" onChange="ShowState()">
                                        <option value="">Select Country</option>
                                        <?php foreach ($Country as $user6) { ?>
                                                <option value="<?php echo $user6->location_id ?>"><?php echo $user6->name ?></option>
                                        <?php } ?>
                                    </select>
                                    <i class="fa fa-caret-down"></i>
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                    State
                                </label>
                                <div class="col-md-8" id="NewState">
                                    <select required="" class="form-control form-rounded" id="state" name="state" onChange="ShowCity()">
                                        <option value="">Select State</option>
                                    </select>
                                    <i class="fa fa-caret-down"></i>
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                    City
                                </label>
                                <div class="col-md-8"  id="NewCity">
                                    <select required="" class="form-control form-rounded" id="city" name="city">
                                        <option selected="" value="">Select City</option>
                                        <option>Title One</option>
                                    </select>
                                    <i class="fa fa-caret-down"></i>
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                    Experience
                                </label>
                                <div class="col-md-8">
                                    <select required="" name="exp" id="exp"  class="form-control form-rounded">
                                        <option selected="" value="">Select Experience</option>
                                        <option value="0">0</option>
                                            <?php for ($i = 1; $i <= 30; $i++) { ?>
                                                <option value="<?php echo $i ?>">
                                                    <?php echo $i ?>
                                                </option>
                                            <?php } ?> 
                                    </select>
                                    <i class="fa fa-caret-down"></i>
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="inputEmail3" class="col-md-4 col-form-label">
                                    Expected Salary
                                </label>
                                <div class="col-md-8">
                                    <select required="" class="form-control form-rounded" id="Expectedpckg" name="Expectedpckg">
                                        <option selected="" value="">Select Expected Salary</option>
                                        <option  value='786'> Less than 5,000 </option>
                                            <?php  for($x=5000;$x<=100000;$x=$x+5000){ ?>
                                                <option  value='<?php echo $x ?>'><?php echo number_format($x) ?></option>
                                            <?php  } ?>
                                        <option  value='10000000'>100,000 & above </option>
                                    </select>
                                    <i class="fa fa-caret-down"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-theme-submit mt-3">Search</button>   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- End Main -->

        @include('halaxatheme.js')

 <script>
function ShowState(){
                  //alert("---------------");
                  var Country = document.getElementById('country').value;
              // console.log(vl);
                    $.ajax({
                      type:"post",
                      url: "<?php echo url("/common/showstate"); ?>",
                    data:{Country:Country,"_token":'{{csrf_token()}}'},
                    context: document.body
                    }).done(function(msg) {
                        //alert(msg);
                    $('#NewState').html(msg);
                    });
              }
             
              
              function ShowCity(){
                  var State = document.getElementById('state').value;
              // console.log(vl);
                    $.ajax({
                      type:"post",
                      url: "<?php echo url("/common/showcity"); ?>",
                    data:{State:State,"_token":'{{csrf_token()}}'},
                    context: document.body
                    }).done(function(msg) {
                    $('#NewCity').html(msg);
                    });
              }
              </script>
    </body>

</html>