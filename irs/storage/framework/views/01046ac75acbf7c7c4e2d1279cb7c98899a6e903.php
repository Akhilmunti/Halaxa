<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <?php echo $__env->make('recruitertheme.css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </head>

    <body>
        <!-- Main -->
        <div class="main">
            <div class="header">
                <?php echo $__env->make('recruitertheme.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <style>
                th {
                    padding: 3px;
                }
            </style>
            <div class="wrapper">
                <!-- Sidebar  -->
                <nav id="sidebar">
                    <?php echo $__env->make('recruitertheme.recruiter_sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </nav>

                  <div id="content-two">
                    <div class="theme-card container-fluid">
                        <div class="row">
                            <div class="col-md-9 p-5">
                                <div class="text-center">
                                    <img class="mb-3" height="150" width="150" src="<?php echo url('assets/recruit/images/success-tick-icon.png'); ?>" />
                                    <p class="p-info">
                                        Your job has been posted successfuly
                                    </p>
                                </div>
                                <h6 class="h-info mt-3"><b>What to do next?</b></h6>
                                <p class="p-info">
                                    This page guides you through the process of creating a new job post
                                </p>
                                <p class="p-info">
                                    Material confined likewise it humanity raillery an unpacked as he. Th comparison an. Matters engaged between he of pursuit manners w sentirnents simplicity connection. Far supply depart branch agreed ree chief merit no if. Now how her edward engage not horses. Oh resolution he dissimilar precaution to e moments. Merit gay end sight front Manor equal it on again ye folly by match In so melancholy as an old get our. 
                                </p>
                                <h6 class="h-info mt-3"><b>Video interview</b></h6>
                                <p class="p-info">
                                    Material confined likewise it humanity raillery an unpacked as he. Th comparison an. Matters engaged between he of pursuit manners w sentirnents simplicity connection. Far supply depart branch agreed ree chief merit no if. Now how her edward engage not horses. Oh resolution he dissimilar precaution to e moments. Merit gay end sight front Manor equal it on again ye folly by match In so melancholy as an old get our. 
                                </p>
                                <h6 class="h-info mt-3"><b>Assessment test</b></h6>
                                <p class="p-info">
                                    This page guides you through the process of creating a new job post
                                </p>
                                <div class="text-center mt-3">
                                    <a href="<?php echo url('/'); ?>/employer/createjobposting" class="btn btn-success"><i class="fa fa-plus mr-2"></i> Add another job</a>
                                    <a href="<?php echo url('/'); ?>/employer/activejobopening" class="btn btn-danger"><i class="fa fa-eye mr-2"></i> View active job</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main -->

        <?php echo $__env->make('recruitertheme.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    
    </body>

</html>