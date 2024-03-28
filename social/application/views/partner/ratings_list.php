<!DOCTYPE html>
<html lang="en">
    <!-- Header -->
    <?php $this->load->view('partner/halaxa/header'); ?>

    <body>
        <!-- Main -->
        <div class="main">
            <!-- Navbar -->
            <?php $this->load->view('partner/halaxa/navbar'); ?>

            <div class="wrapper">
                <!-- Sidebar -->
                <?php $this->load->view('partner/halaxa/sidebar'); ?>

                <div id="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <?php $this->load->view('partner/halaxa/alerts'); ?>
                            </div>
                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-filter" style="background-color: #ffffff">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th><span class="icon">★</span></th>
                                                    <th>Member Status</th>
                                                    <th>Title</th>
                                                    <th>Pros</th>
                                                    <th>Cons</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($ratings)) {
                                                    $counter = 0;
                                                    foreach ($ratings as $rating) {
                                                        $counter++;
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $counter; ?>
                                                            </td>
                                                            <td class="rating-disable" style="width: 150px">
                                                                <div class="rating mb-0 mt-0">
                                                                    <?php if ($rating['stars'] == 1) { ?>
                                                                        <div class="rating-readonly">
                                                                            <i class="fa fa-star"></i>
                                                                        </div>
                                                                    <?php } elseif ($rating['stars'] == 2) { ?>
                                                                        <div class="rating-readonly">
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                        </div>
                                                                    <?php } elseif ($rating['stars'] == 3) { ?>
                                                                        <div class="rating-readonly">
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                        </div>
                                                                    <?php } elseif ($rating['stars'] == 4) { ?>
                                                                        <div class="rating-readonly">
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                        </div>
                                                                    <?php } elseif ($rating['stars'] == 5) { ?>
                                                                        <div class="rating-readonly">
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                        </div>
                                                                    <?php } else { ?>
                                                                        <div class="rating-readonly-empty">
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </td>

                                                            <td style="width: 150px">
                                                                <span class="table-type"><?php echo $rating['student_status']; ?></span>
                                                            </td>
                                                            <td>
                                                                <span class="table-type"><?php echo $rating['title']; ?></span>
                                                            </td>
                                                            <td>
                                                                <span class="table-type"><?php echo $rating['pros']; ?></span>
                                                            </td>
                                                            <td>
                                                                <span class="table-type"><?php echo $rating['cons']; ?></span>
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo base_url('partner/requests/actionDeleteRating/' . $rating['id']); ?>" class="text-danger weight-bold">Hide</a>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>       
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Main -->

        <!-- jQuery  -->
        <?php $this->load->view('partner/halaxa/scripts'); ?>

        <!-- old scripts ends here-->
    </body>

</html>