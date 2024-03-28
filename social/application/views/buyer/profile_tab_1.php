<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('buyer/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('buyer/partials/left-nav'); ?>    
                <?php $this->load->view('buyer/partials/top-nav'); ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <?php $this->load->view('buyer/partials/searchbar'); ?>
                    <div class="">

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">

                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Profile</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="panel-group">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <a style="font-size: 25px">Personal Details</a>
                                                    <a href="<?php echo base_url(); ?>buyer/profile/edit/<?php echo $user->User_Id; ?>" class="btn btn-sm btn-success" style="float: right"><i class="fa fa-edit"></i> Edit</a>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div id="collapse1" class="panel-collapse collapse in">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="profile_img">
                                                                    <div id="crop-avatar">
                                                                        <?php
                                                                        if (!empty($user->Photo)) {
                                                                            ?>
                                                                            <!-- Current avatar -->
                                                                            <img class="img-responsive avatar-view" src="<?php echo base_url(); ?>assets/photo/<?php echo $user->Photo; ?>" alt="Avatar" title="Change the avatar">
                                                                        <?php } else { ?>
                                                                            <img src="<?php echo base_url(); ?>/assets/images/favi.jpg" alt="..." class="img-circle avatar-view">
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <table class="table-striped table table-responsive">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>Name : <?php echo $user->Name; ?></td>
                                                                        </tr>
                                                                        <?php if ($user->Address) {
                                                                            ?>
                                                                            <tr>
                                                                                <td>Address : <?php echo $user->Address; ?></td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                        <?php if ($user->Email) {
                                                                            ?>
                                                                            <tr>
                                                                                <td>Email : <?php echo $user->Email; ?></td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                        <?php if ($user->Phone) {
                                                                            ?>
                                                                            <tr>
                                                                                <td>Phone : <?php echo $user->Phone; ?></td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel-group">
                                            <?php
                                            if ($user->Company_name) {
                                                $collapse = "in";
                                            } else {
                                                $collapse = "";
                                            }
                                            ?>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <a style="font-size: 25px">Buyer Details</a>
                                                    <a href="<?php echo base_url(); ?>buyer/profile/edit_corporate/<?php echo $user->User_Id; ?>" class="btn btn-sm btn-success" style="float: right"><i class="fa fa-edit"></i> Edit Buyer Profile</a>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div id="collapse1" class="panel-collapse collapse <?php echo $collapse; ?>">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <table class="table-striped table table-responsive">
                                                                    <tbody>
                                                                        <?php if ($user->Company_name) {
                                                                            ?>
                                                                            <tr>
                                                                                <td>Company Name : <?php echo $user->Company_name; ?></td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                        <?php if ($user->Company_brief) {
                                                                            ?>
                                                                            <tr>
                                                                                <td>Company Brief : <?php echo $user->Company_brief; ?></td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                        <?php if ($user->category) {
                                                                            ?>
                                                                            <tr>
                                                                                <td>
                                                                                    Preferences : <?php echo $user->category ?>
                                                                                </td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table> 
                                                            </div>
                                                            <div class="col-md-6">
                                                                <table class="table-striped table table-responsive">
                                                                    <tbody>
                                                                        <?php if ($user->brand) {
                                                                            ?>
                                                                            <tr>
                                                                                <td>Brand : <?php echo $user->brand; ?></td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                        <?php if ($user->payment_mode) {
                                                                            ?>
                                                                            <tr>
                                                                                <td>Payment Mode : 
                                                                                    <?php
                                                                                    $itemdata = json_decode($user->payment_mode);
                                                                                    foreach ($itemdata as $value) {
                                                                                        echo $value;
                                                                                    }
                                                                                    ?>
                                                                                </td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                        <?php if ($user->payment_structure) {
                                                                            ?>
                                                                            <tr>
                                                                                <td>Payment Structure : <?php echo $user->payment_structure; ?></td>
                                                                            </tr>
                                                                        <?php } ?>    
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
                            </div>
                        </div>
                    </div>
                    <!-- /page content --> 
                    <div class="clearfix"></div>

                </div>
                <!-- footer content -->
                <?php $this->load->view('buyer/partials/footer') ?>
                <!-- /footer content --> 
            </div>
            <!-- modals -->
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> </button>
                            <h4 class="modal-title" id="myModalLabel">Add Delivery Address</h4>
                        </div>
                        <div class="modal-body">
                            <form id="adressForm" method="POST" action="<?php echo base_url() . "buyer/profile/addDeliveryAdress"; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Delivery Address</label>
                                        <input required="" name="delivery" type="text" class="form-control" placeholder="Delivery Address">
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success right-float">Submit</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="button" class="close" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $i = 1;
            foreach ($addresses as $val) {
                ?>
                <!-- Modal -->
                <div id="add<?php echo "_" . $val['id']; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> </button>
                                <h4 class="modal-title" id="myModalLabel">Edit Delivery Address</h4>
                            </div>
                            <div class="modal-body">
                                <form id="adressForm" method="POST" action="<?php echo base_url() . "buyer/profile/updateDeliveryAdress"; ?>/<?php echo $val['id']; ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="control-label">Delivery Address</label>
                                            <input value="<?php echo $val['delivery_address']; ?>" required="" name="delivery" type="text" class="form-control" placeholder="Delivery Address">
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-success right-float">Update</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="button" class="close" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>

    <?php $this->load->view('buyer/partials/assets-footer'); ?>

    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

    <!-- Custom Theme Scripts --> 
    <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script>
    <script>
        document.addEventListener("touchstart", function () {}, true);
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function () {
            readURL(this);
        });
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