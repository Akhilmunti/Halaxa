<?php //echo '<pre>';print_r($connected_users);exit;                                                    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('social/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">

        <style>
            input[type="file"] {
                display: none;
            }
            .custom-file-upload {
                border:  #ccc;
                display: inline-block;
                cursor: pointer;
                font-size: 14px;
            }    

        </style>
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('social/partials/left-nav'); ?>    
                <?php $this->load->view('social/partials/top-nav'); ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Post Data</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="row">
                                            <div class="col-md-12"> 
                                                <!-- end of user messages -->
                                                <ul class="messages">
                                                    <li>
                                                        <a href="<?php echo base_url(); ?>profile/index/<?php echo $val->Posted_User_Id; ?>"> 
                                                            <?php
                                                            if (!empty($post['Photo'])) {
                                                                ?>
                                                                Current avatar 
                                                                <img src="<?php echo base_url(); ?>assets/photo/<?php echo $post['Photo']; ?>" class="avatar" alt="Avatar">
                                                            <?php } else { ?>
                                                                <img src="<?php echo base_url(); ?>/assets/images/favi.jpg" alt="..." class="avatar">
                                                            <?php } ?>
                                                        </a>
                                                        <div class="message_date">
                                                            <?php $exp = explode(" ", $post['Date_Created']); ?>
                                                            <b class="month">
                                                                <?php echo date("d", strtotime($exp[0])) . " " . date("F", strtotime($exp[0])); ?>
                                                            </b><br>
                                                            <b class="month"><?php echo substr($exp[1], 0, 5); ?></b><br>
                                                        </div>

                                                        <div class="message_wrapper">
                                                            <a href="<?php echo base_url(); ?>profile/index/<?php echo $post['User_Id']; ?>">
                                                                <h4 class="heading"><?php echo $post['Name']; ?></h4>
                                                            </a>
                                                            <p class="message"><?php echo $post['Content']; ?></p>
                                                            <br />

                                                            <?php if ($post['Image']) { ?>
                                                                <img src="<?php echo base_url(); ?>assets/posts/<?php echo $post['Image']; ?>" width="320" height="240" />

                                                                <?php
                                                            }

                                                            if ($post['Video']) {
                                                                ?>
                                                                <video width="320" height="240" controls>
                                                                    <source src="<?php echo base_url(); ?>assets/posts/<?php echo $post['Video']; ?>" >
                                                                    Your browser does not support the video tag.
                                                                </video>
                                                                <?php
                                                            }

                                                            if ($post['Music']) {
                                                                ?>
                                                                <audio controls>
                                                                    <source src="<?php echo base_url(); ?>assets/posts/<?php echo $post['Music']; ?>" >
                                                                    Your browser does not support the audio tag.
                                                                </audio>
                                                                <?php
                                                            }

                                                            if ($post['Link']) {
                                                                ?>
                                                                <a class="label label-success" href="<?php echo base_url(); ?>assets/posts/<?php echo $post['Link']; ?>" target="_blank"><?php echo $val->Link; ?></a> 
                                                                <br>
                                                            <?php }
                                                            ?>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <ul class="messages">
                                                                    <?php $comments = $this->social_model->get_comments($post['P_ID']); ?>
                                                                    <?php if ($comments != "") { ?>
                                                                        <?php
                                                                        foreach ($comments as $com) {
                                                                            ?>
                                                                            <li> 
                                                                                <?php $user = $this->users_model->get_user_by_id($com['User_commented_id']); ?>
                                                                                <?php
                                                                                if (!empty($user->Photo)) {
                                                                                    ?>
                                                                                    Current avatar 
                                                                                    <img src="<?php echo base_url(); ?>assets/photo/<?php echo $user->Photo; ?>" class="avatar" alt="Avatar">
                                                                                <?php } else { ?>
                                                                                    <img src="<?php echo base_url(); ?>/assets/images/favi.jpg" alt="..." class="avatar">
                                                                                <?php } ?>
                                                                                <div class="message_wrapper">
                                                                                    <h4 class="heading"></h4>
                                                                                    <p class="message"><?php echo $com['Content']; ?></p>
                                                                                </div>
                                                                            </li>
                                                                        <?php }
                                                                        ?>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <!-- end of user messages -->

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /page content --> 
                <!-- footer content -->
                <?php $this->load->view('social/partials/footer') ?>
                <!-- /footer content --> 
            </div>
        </div>

        <?php $this->load->view('social/partials/assets-footer'); ?>
        <!-- Custom Theme Scripts --> 
        <script src="<?php echo base_url(); ?>assets/build/js/custom.min.js"></script> 
        <script>
            document.addEventListener("touchstart", function () {}, true);

            function empty_validate()
            {

                if (document.getElementById('content').value == '')
                {
                    alert('Please enter your ideas');
                    return false;
                } else
                {
                    return true;
                }
            }

        </script>
        <script>

        </script>
    </body>

</html>