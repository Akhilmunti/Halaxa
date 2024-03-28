<!DOCTYPE html>
<html lang="en">
    <!-- Header -->
    <?php $this->load->view('community/partials/header'); ?>

    <body>
        <!-- Main -->
        <div class="main">
            <!-- Navbar -->
            <?php $this->load->view('community/partials/navbar'); ?>

            <div class="wrapper">
                <!-- Sidebar -->
                <?php $this->load->view('community/partials/sidebar'); ?>

                <div id="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <?php $this->load->view('community/partials/alerts'); ?>
                            </div>
                            <div class="col-md-12">
                                <div class="theme-card mb-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="post-card p-2">
                                                <span class="com-name"><?php echo $partner['Groupname'] . " Community"; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="text-theme weight-bold">Rate a Community</span><br>
                                <span class="text-theme">It only a minute! And your anonymous review help other</span>
                                <div class="theme-card mb-3 mt-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="post-card p-4">
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <form id="formThree" enctype="multipart/form-data" class="form-horizontal form-label-left" action="<?php echo base_url('communities/sendRatings/') . $com_key; ?>" method="post">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <p class="text-theme weight-bold" for="usr">Overall Rating*</p>
                                                                        <div class="rating">
                                                                            <label>
                                                                                <input required="" type="radio" name="stars" value="1" <?php if($rating['stars'] == 1){ echo "checked"; } ?>/>
                                                                                <span class="icon">★</span> </label>
                                                                            <label>
                                                                                <input type="radio" name="stars" value="2" <?php if($rating['stars'] == 2){ echo "checked"; } ?>/>
                                                                                <span class="icon">★</span> <span class="icon">★</span> </label>
                                                                            <label>
                                                                                <input type="radio" name="stars" value="3" <?php if($rating['stars'] == 3){ echo "checked"; } ?>/>
                                                                                <span class="icon">★</span> <span class="icon">★</span> <span class="icon">★</span> </label>
                                                                            <label>
                                                                                <input type="radio" name="stars" value="4" <?php if($rating['stars'] == 4){ echo "checked"; } ?> />
                                                                                <span class="icon">★</span> <span class="icon">★</span> <span class="icon">★</span> <span class="icon">★</span> </label>
                                                                            <label>
                                                                                <input type="radio" name="stars" value="5" <?php if($rating['stars'] == 5){ echo "checked"; } ?>/>
                                                                                <span class="icon">★</span> <span class="icon">★</span> <span class="icon">★</span> <span class="icon">★</span> <span class="icon">★</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <p class="text-theme weight-bold" for="usr">Members Status</p>
                                                                        <select name="stuStatus" required="" class="form-control" id="sel1">
                                                                            <option selected="" value="" disabled="">Current Student</option>
                                                                            <option <?php
                                                                            if ($rating['student_status'] == "Alumni") {
                                                                                echo "selected";
                                                                            }
                                                                            ?>>Alumni</option>
                                                                            <option <?php
                                                                            if ($rating['student_status'] == "Potential Student") {
                                                                                echo "selected";
                                                                            }
                                                                            ?>>Potential Student</option>
                                                                            <option <?php
                                                                            if ($rating['student_status'] == "Others") {
                                                                                echo "selected";
                                                                            }
                                                                            ?>>Others</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <p class="text-theme weight-bold" for="usr">Review Title</p>
                                                                        <input value="<?php echo $rating['title'] ?>" name="title" type="text" class="form-control" id="email" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <p class="text-theme weight-bold" for="usr">Pros</p>
                                                                        <textarea name="pros" class="form-control" rows="3" id="comment" required><?php echo $rating['pros'] ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <p class="text-theme weight-bold" for="usr">Cons</p>
                                                                        <textarea name="cons" class="form-control" rows="3" id="comment" required><?php echo $rating['cons'] ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <?php if (empty($rating)) { ?>
                                                                    <div class="col-md-12 float-right">
                                                                        <button class="btn btn-danger" type="submit">Submit Review</button>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="col-md-4 offset-1 p-4">
                                                        <span class="text-theme weight-bold">Keep it Real</span><br>
                                                        <span class="text-theme">
                                                            Thank you for contributing to the community. Your opinion will help others make decisions about jobs and companies. 
                                                        </span><br>
                                                        <span class="text-theme">
                                                            Please stick to the Community Guidelines and do not post: 
                                                            <br>
                                                            - Aggressive or discriminatory language 
                                                            <br>
                                                            - Profanities 
                                                            <br>
                                                            - Trade secrets/confidential information  
                                                        </span><br>
                                                        <span class="text-theme">
                                                            Thank you for doing your part to keep Glassdoor the most trusted place to find a job and company you love. See the Community Guidelines for more details. 
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
        <?php $this->load->view('community/partials/scripts'); ?>

    </body>

</html>