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
                        <div class="">
                            <div class="page-title">
                                <div class="title_left">
                                    <h3>Received Quotation </h3>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                        <?php
                                        $alert = $this->session->flashdata('requoteNot');
                                        if ($alert == NULL) {
                                            $hidealert = "hide";
                                        } else {
                                            $showalert = $alert;
                                            $hidealert = "";
                                        }
                                        ?>
                                        <div class="alert alert-success <?php echo $hidealert ?>">
                                            <?php echo $showalert ?>
                                        </div>
                                        <div class="x_title">
                                            <h2>Quotation Info</h2>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Sl No</th>
                                                        <th>RFQ Id</th>
                                                        <th>Quotation count</th>
                                                        <th>Category</th>
                                                        <th>Status</th>
                                                        <th>End Date</th>
                                                        <th>Date Added</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (!empty($quotedRfq)) {
                                                        $i = 1;
                                                        $count = count($quotedRfq);
                                                        foreach ($quotedRfq as $key => $rfq) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $i++; ?></td>
                                                                <td><a href="<?php echo base_url() . "buyer/received_quotes/show/" . $rfq['RFQ_Id']; ?>"><?php echo $rfq['RFQ_Id']; ?></a></td>
                                                                <td>
                                                                    <?php
                                                                    $count = $this->vendor_model->getAllQuotedRFQsById($rfq['RFQ_Id']);
                                                                    echo count($count);
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    $category = $this->category_model->getCategoryById($rfq['q_catid']);
                                                                    echo $category['Category'];
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    $negotiate = $rfq['q_negotiate'];
                                                                    $postatus = $rfq['po_status'];
                                                                    $rejectstatus = $rfq['reject_status'];
                                                                    if ($rejectstatus == 0) {
                                                                        if ($negotiate == "1") {
                                                                            $status = "Under Negotiation";
                                                                            $style = "danger";
                                                                            $hideissueaction = "";
                                                                        } elseif ($postatus == "1") {
                                                                            $status = "PO Issued";
                                                                            $style = "success";
                                                                            $hideissueaction = "hide";
                                                                        } else {
                                                                            $status = "Quoted";
                                                                            $style = "primary";
                                                                            $hideissueaction = "";
                                                                        }
                                                                    } else {
                                                                        $status = "Rejected : " . $rfq['rejection_message'];
                                                                        $style = "danger";
                                                                        $hideissueaction = "hide";
                                                                    }
                                                                    ?>
                                                                    <span class="label label-<?php echo $style; ?>"><?php echo $status; ?></span>
                                                                </td>
                                                                <td><?php echo $rfq['q_enddate']; ?></td>
                                                                <td><?php echo $rfq['date_added']; ?></td>
                                                                <td>
                                                                    <a href="<?php echo base_url() . "buyer/received_quotes/show/" . $rfq['RFQ_Id']; ?>" class="btn btn-success btn-xs">View</a>
                                                                    <a href="<?php echo base_url() . "buyer/received_quotes/showNegotiate/" . $rfq['RFQ_Id']; ?>" class="btn btn-primary btn-xs">Negotiate</a>
                                                                    <a href="<?php echo base_url() . "buyer/received_quotes/showCompare/" . $rfq['RFQ_Id']; ?>" class="btn btn-success btn-xs">Compare</a>
                                                                    <a href="<?php echo base_url() . "buyer/received_quotes/showPo/" . $rfq['RFQ_Id']; ?>" class="btn btn-success btn-xs <?php echo $hideissueaction; ?>">Issue PO</a>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <tr>
                                                            <td colspan="6">Data empty</td>
                                                        </tr>
                                                    <?php }
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
                <!-- /page content --> 

                <!-- footer content -->
                <?php $this->load->view('buyer/partials/footer') ?>
                <!-- /footer content --> 
            </div>
        </div>

        <?php $this->load->view('buyer/partials/assets-footer'); ?>
        <!-- Custom Theme Scripts --> 
        <script src="<?php echo base_url(); ?>assets/build/js/custom.js"></script> 
        <script>
            document.addEventListener("touchstart", function () {}, true);
            $('#datatable-responsive').dataTable({
                "orderFixed": [0, 'desc'],
                "ordering": false
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