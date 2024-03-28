
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('vendor/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('vendor/partials/left-nav'); ?>    
                <?php $this->load->view('vendor/partials/top-nav'); ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <?php $this->load->view('vendor/partials/searchbar'); ?>
                    <div class="">
                        <div class="clearfix"></div>
                        <div class="">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Invite Friends</h2>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Social Networks</a> </li>
                                                            <!--                                                            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Contact</a> </li>-->
                                                        </ul>
                                                        <div id="myTabContent" class="tab-content">
                                                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab"> 
                                                                <img src="<?php echo base_url(); ?>assets/images/Social-media-banner.png" width="100%"/>
                                                                <div class='share-rectangle'> 
                                                                    <span style='margin:0 0 10px;display:block;'>Invite through Social Networks</span> 
                                                                    <a target="_blank" href="http://www.facebook.com/sharer.php?u=http://www.vendorglobe.com/social_v3" class='facebook' rel='nofollow'><span class='square'><i class='fa fa-facebook'></i></span><span class='title'>Facebook</span></a> 
                                                                    <a target="_blank" href="http://twitter.com/share?text=An%20intersting%20blog&url=http://www.vendorglobe.com/social_v3" class='twitter'  rel='nofollow'><span class='square'><i class='fa fa-twitter'></i></span><span class='title'>Twitter</span></a>
                                                                    <a target="_blank" href="https://plus.google.com/share?url=http://www.vendorglobe.com/social_v3" class='gplus' rel='nofollow'><span class='square'><i class='fa fa-google-plus'></i></span><span class='title'>Google+</span></a>
                                                                    <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=http://www.vendorglobe.com/social_v3" class='linkedin' rel='nofollow'><span class='square'><i class='fa fa-linkedin'></i></span><span class='title'>LinkedIn</span></a>
                                                                </div>
                                                            </div>
                                                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                                                <div class="share-rectangle"> <span class="text-center">Invite through Social Networks</span>
                                                                    <div class="form-group">
                                                                        <div class="col-md-6 col-md-offset-3">
                                                                            <div class="custom-file-upload"> 
                                                                                <!--<label for="file">File: </label>-->
                                                                                <input type="file" id="file" name="myfiles[]" multiple />
                                                                            </div>
                                                                        </div>
                                                                        <br><br><br><br>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                                                <div class="share-rectangle"> <span class="text-center">Invite through Email</span>
                                                                    <div class="row">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Recipients</label>
                                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                <input id="tags_1" type="text" class="tags form-control" value="admin@foodlinked.com" />
                                                                                <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Custom Message</label>
                                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                                <textarea class="resizable_textarea form-control" placeholder="This text area automatically resizes its height as you fill in more text courtesy of autosize-master it out..."></textarea>
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
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /page content --> 

                <!-- footer content -->
                <?php $this->load->view('vendor/partials/footer') ?>

                <!-- /footer content --> 
            </div>
        </div>

        <?php $this->load->view('vendor/partials/assets-footer'); ?>
        <!-- Custom Theme Scripts --> 
        <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
        <script>
            document.addEventListener("touchstart", function () {}, true);
        </script>
    </body>
</html>