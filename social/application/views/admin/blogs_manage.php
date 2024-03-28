<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('admin/partials/assets-head') ?>
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/prod/override-classes.css" rel="stylesheet" type="text/css">
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php $this->load->view('admin/partials/left-nav'); ?>    
                <?php $this->load->view('admin/partials/top-nav'); ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="">
                            <div class="page-title">
                                <div class="title_left">
                                    <h3>Blogs management</h3>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2>Blogs management (<b><a href="<?php echo base_url() . "admin/blogs/add_new" ?>">+ADD NEW</a></b>)</h2>
                                                <?php
                                                $result = $this->session->flashdata('result');
                                                if (isset($result)) {
                                                    echo "<p class='text-center text-success'>" . $result . "</p>";
                                                }
                                                ?>
                                                <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                                                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="#">Settings 1</a> </li>
                                                            <li><a href="#">Settings 2</a> </li>
                                                        </ul>
                                                    </li>
                                                    <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                                                </ul>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                                <table id="datatable-responsive" class="table table-bordered table-striped dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Sl No</th>
                                                            <th>Topic</th>
                                                            <th>Blog By</th>
                                                            <th>Content</th>
                                                            <th>Attachment</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $count = 0;
                                                        if (!empty($blogs)) {
                                                            foreach ($blogs as $blog) {
                                                                $count++;
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $count; ?></td>
                                                                    <td><?php echo $blog['topic']; ?></td>
                                                                    <td><?php echo $blog['blog_by']; ?></td>
                                                                    <td><?php echo $blog['blog_description']; ?></td>
                                                                    <td><?php echo $blog['attachment']; ?></td>
                                                                    <td><a href="<?php echo base_url() . "admin/blogs/edit/" . $blog['B_Id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                                                        <a onclick="return confirm('Are you sure?')" href="<?php echo base_url() . "admin/blogs/delete/" . $blog['B_Id']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <tr>
                                                                <td colspan="6"><center>No blogs found</center></td>
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
                <!-- /page content --> 

                <!-- footer content -->
                <?php $this->load->view('admin/partials/footer') ?>
                <!-- /footer content --> 
            </div>
        </div>

        <?php $this->load->view('admin/partials/assets-footer'); ?>
        <!-- Custom Theme Scripts --> 
        <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
        <script>
                                                                            document.addEventListener("touchstart", function () {}, true);
        </script>
        <script>
            function delete_category(id) {
                if (confirm("Are you sure?")) {
                    $.post("/admin/blogs/delete/" + id, {},
                            function (data, status) {
                                if (data == 'success') {
                                    alert("Data removed");
                                }
                                location.reload();
                            });
                }
            }
        </script>
        <script>
            $(document).ready(function () {
                $("#formOne").submit(function (e) {
                    var typename = $('#typename').val();
                    var catname = $('#catname').val();

                    var e1 = false;
                    var e2 = false;

                    if (typename.length > 0) {
                        $('#typename + .form-error-message').html('');
                        e1 = true;
                    } else {
                        $('#typename + .form-error-message').html('Please enter valid data.');
                        e1 = false;
                    }
                    if (catname.length > 0) {
                        e2 = true;
                        $('#catname + .form-error-message').html('');
                    } else {
                        e2 = false;
                        $('#catname + .form-error-message').html('Please enter valid data.');
                    }
                    return (e1 && e2) ? true : false;
                })
            });
        </script>
    </body>
</html>