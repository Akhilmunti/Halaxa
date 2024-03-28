<style>
    .vendor-details-card{
        background-color: #eeeeee;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }
</style>
<?php
if (!empty($vendors)) {
    $count = 0;
    foreach ($vendors as $key => $vendor) {
        $count++;
        ?>
        <!-- Modal -->
        <div id="vendor_<?php echo $count ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">
                            <?php
                            $company = $this->users_model->get_vendor_details($vendor['User_Id']);
                            print_r($company->comapany_name);
                            ?>
                            (<i>
                                <?php
                                $user = $this->users_model->getUser($vendor['User_Id']);
                                print_r($user[0]['Name']);
                                ?>
                            </i>)
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="vendor-details-card">
                                    <div class="row card-details-content">
                                        <div class="col-md-4">
                                            <?php
                                            $user = $this->users_model->getUser($vendor['User_Id']);
                                            if (!empty(($user[0]['Photo']))) {
                                                ?>
                                                <img style="height: 150px !important;width: 100%" src="<?php echo base_url(); ?>assets/photo/<?php
                                                $user = $this->users_model->getUser($vendor['User_Id']);
                                                print_r($user[0]['Photo']);
                                                ?>" alt="..." class="img-rounded img-responsive">

                                            <?php } else { ?>
                                                <img style="height: 150px !important;width: 100%" src="https://via.placeholder.com/150" alt="..." class="img-rounded img-responsive">
                                            <?php } ?>
                                        </div>
                                        <div class="col-md-8">
                                            <h5>Company Brief : <?php echo $vendor['company_brief']; ?></h5>
                                            <h5>Language : <?php echo $vendor['language']; ?></h5>
                                            <h5>Country : <?php echo $vendor['country']; ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-md-3">
                                <a class="btn btn-dark btn-block btn-sm" data-toggle="collapse" data-target="#clientv">Clientele</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-dark btn-block btn-sm" data-toggle="modal" data-target="#Modalm">Send Mail</a>
                                <!-- Modal -->
                                <div id="Modalm" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Send Message</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="<?php echo base_url() . "buyer/search/sendMessage/"; ?><?php echo $productData['id']; ?>" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <label class="control-label">Message</label>
                                                            <textarea rows="3" required="" name="message" type="text" class="form-control" placeholder="Enter Message"></textarea>
                                                        </div>
                                                        <br>
                                                        <div class="col-md-2">
                                                            <button type="submit" class="btn btn-sm btn-dark btn-block">Send Mail</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <a target="_blank" href="<?php echo base_url(); ?>profile/index/<?php echo $vendor['User_Id']; ?>" class="btn btn-dark btn-block btn-sm">View Vendor Profile</a>
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="btn btn-default btn-block btn-sm" data-dismiss="modal">Close</button>
                            </div>
                            <div class="col-md-12">
                                <div id="clientv" class="collapse">
                                    <?php
                                    $clientsResult = $this->product_model->getClientsByVendor($vendor['User_Id']);
                                    ?>
                                    <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Sl No</th>
                                                <th>Client Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $counter = 0;
                                            if (!empty($clientsResult)) {
                                                foreach ($clientsResult as $key => $client) {
                                                    $counter++;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $counter; ?></td>
                                                        <td>
                                                            <?php echo $client['client_name']; ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="3">Clientele Empty !!</td>
                                                </tr>
                                                <?php
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
        <?php
    }
} else {
    ?>
<?php }
?>