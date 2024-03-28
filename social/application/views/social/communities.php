<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('buyer/partials/assets-head') ?>
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('vendor/partials/left-nav'); ?>    
                <!-- top navigation -->
                <?php $this->load->view('vendor/partials/top-nav'); ?>
                <!-- /top navigation --> 
            </div>
            <div class="right_col" role="main">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">
                                <div class="row">
                                    <?php
                                    $result = $this->session->flashdata('result');
                                    if ($result == NULL) {
                                        $hidealert = "hide";
                                    } else {
                                        $showalert = $result;
                                        $hidealert = "";
                                    }
                                    ?>
                                    <div class="alert alert-success <?php echo $hidealert ?>">
                                        <?php echo $showalert ?>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="border-dark" role="tabpanel" data-example-id="togglable-tabs">
                                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Join Communities</a> </li>
                                                <li role="presentation" class=""><a href="#tab_content2" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">My Communities</a> </li>
                                            </ul>
                                            <div id="myTabContent" class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="right"> <a href="#" class="btn btn-dark">Filter V</a> </div>
                                                            <div class="left"> <a href="#" class="btn btn-dark">Sort by V</a> </div>
                                                            <div class="clearfix"></div>
                                                            <?php
                                                            $i = 1;
                                                            foreach ($all as $one) {
                                                                $mUserId = $this->session->userdata('User_Id');
                                                                $request = $this->association_model->checkRequest($mUserId, $one['C_Id']);
                                                                $status = $request['Request_status'];
                                                                $reject = $request['reject_by_user'];
                                                                if ($reject == "1") {
                                                                    $hideDiv = "hide";
                                                                } else {
                                                                    $hideDiv = "";
                                                                }
                                                                ?>
                                                                <div class="communities-card light-back <?php echo $hideDiv; ?>">
                                                                    <div class="row">
                                                                        <div class="col-md-1"> 
                                                                            <?php
                                                                            $mPic = base_url('uploads/' . $one['Photo']);
                                                                            if (file_exists($mPic)) {
                                                                                ?>
                                                                                <img class="img-fluid community-img" src="<?php echo base_url(); ?>uploads/<?php echo $one['Photo']; ?>" />
                                                                            <?php } else { ?>
                                                                                <img class="img-fluid community-img" src="http://via.placeholder.com/100x100" />
                                                                            <?php } ?>
                                                                        </div>
                                                                        <div class="col-md-11">
                                                                            <h4><?php echo $one['Groupname']; ?> (<?php echo $one['Username']; ?>)</h4>
                                                                            <i>34,555 Followers</i> </div>
                                                                        <div class="col-md-12">
                                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="left"> <a href="#">Members</a> </div>
                                                                            <div class="clearfix"></div>
                                                                            <br>
                                                                            <div class="anchor-img"> 
                                                                                <a><img src="http://via.placeholder.com/40x40" class="img-circle img-responsive"/></a> 
                                                                                <a><img src="http://via.placeholder.com/40x40" class="img-circle img-responsive"/></a> 
                                                                                <a><img src="http://via.placeholder.com/40x40" class="img-circle img-responsive"/></a> 
                                                                                <a><img src="http://via.placeholder.com/40x40" class="img-circle img-responsive"/></a> 
                                                                                <a><img src="http://via.placeholder.com/40x40" class="img-circle img-responsive"/></a> 
                                                                                <a><img src="http://via.placeholder.com/40x40" class="img-circle img-responsive"/></a> 
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="right"> 
                                                                                <br>
                                                                                <br>
                                                                                <br>
                                                                                <?php if ($request == "") {
                                                                                    ?>
                                                                                    <a href="<?php echo base_url() . "communities/request/" . $one['C_Id']; ?>" class="btn btn-dark btn-sm">Ask to join</a> 
                                                                                <?php } else {
                                                                                    ?>
                                                                                    <?php if ($status == "1") {
                                                                                        ?>
                                                                                        <a href="#" class="btn btn-success btn-sm">Requested</a> 
                                                                                    <?php } else {
                                                                                        ?>
                                                                                        <a href="<?php echo base_url() . "communities/request/" . $one['C_Id']; ?>" class="btn btn-dark btn-sm">Ask to join</a> 
                                                                                    <?php } ?> 
                                                                                <?php } ?> 
                                                                                <?php if ($reject == "1") {
                                                                                    ?>
                                                                                    <a href="#" class="btn btn-danger btn-sm">Rejected</a> 
                                                                                <?php } else {
                                                                                    ?>
                                                                                    <a href="<?php echo base_url() . "communities/reject/" . $one['C_Id']; ?>" class="btn btn-dark btn-sm">Not Interested</a>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <br>
                                                            <?php }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                                    <div class="row">
                                                        <?php if (!empty($myComs)) {
                                                            ?>
                                                            <?php
                                                            $i = 1;
                                                            foreach ($myComs as $my) {
                                                                $community = $this->association_model->getCommunity($my['C_Id']);
                                                                $photo = $community['Photo'];
                                                                $user = $community['Groupname'];
                                                                ?>
                                                                <div class="col-md-12">
                                                                    <div class="right"> <a href="#" class="btn btn-dark">Filter V</a> </div>
                                                                    <div class="left"> <a href="#" class="btn btn-dark">Sort by V</a> </div>
                                                                    <div class="clearfix"></div>
                                                                    <div class="communities-card light-back">
                                                                        <div class="row">
                                                                            <div class="col-md-1"> 
                                                                                <img class="img-responsive img-rounded" src="<?php echo base_url(); ?>uploads/<?php echo $photo; ?>" width="100%"/> 
                                                                            </div>
                                                                            <div class="col-md-10">
                                                                                <h4><?php echo $user; ?></h4>
                                                                                <i>(123) new conversations</i> </div>
                                                                            <div class="col-md-1 text-center">
                                                                                <div class="dropdown"> <a class="fa fa-size fa-cog dropdown-toggle" type="button" data-toggle="dropdown"></a>
                                                                                    <ul class="dropdown-menu">
                                                                                        <li><a href="#">Group Settings</a></li>
                                                                                        <li><a href="#">Leave Group</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                            <?php }
                                                            ?>
                                                        <?php } else {
                                                            ?>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                                    <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                                                        photo booth letterpress, commodo enim craft beer mlkshk </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="light-back">
                                            <h4 class="text-justify">Lorem Ipsum</h4>
                                            <p class="text-justify">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</p>
                                            <a href="#">Group rules</a> </div>
                                        <br>
                                        <div class="light-back">
                                            <h4>Quick Links</h4>
                                            <button class="btn btn-sm btn-dark btn-block">Posting buy request</button>
                                            <a href="#">
                                                <button class="btn btn-sm btn-dark btn-block">Request for quotation</button>
                                            </a>
                                            <button class="btn btn-sm btn-dark btn-block">Post a product</button>
                                            <button class="btn btn-sm btn-dark btn-block">Post a job</button>
                                            <button class="btn btn-sm btn-dark btn-block">Apply for job</button>
                                            <button class="btn btn-sm btn-dark btn-block">Join communities</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer content -->
            <?php $this->load->view('buyer/partials/footer') ?>
            <!-- /footer content --> 
        </div>

        <?php $this->load->view('buyer/partials/assets-footer'); ?>

        <!-- plugin script --> 
        <script src="<?php echo base_url(); ?>build/js/jquery.mThumbnailScroller.js"></script> 
        <script>
            (function ($) {
                $(window).load(function () {

                    $("#content-1").mThumbnailScroller({
                        type: "click-50",
                        theme: "buttons-in"
                    });

                    $("#content-2").mThumbnailScroller({
                        type: "click-50",
                        theme: "buttons-in"
                    });

                    $("#content-3").mThumbnailScroller({
                        type: "click-50",
                        theme: "buttons-in"
                    });

                });
            })(jQuery);
        </script> 
        <script>
            document.addEventListener("touchstart", function () {}, true);
        </script>
        <script>
            // Type change event
            $('#filterby').change(function () {
                $.post("<?php echo base_url('buyer/search/getFilterResults/'); ?>",
                        {
                            filter: this.value,
                        },
                        function (data, status) {
                            $('#products').html(data);
                        });
            });
        </script>
    </body>
</html>
