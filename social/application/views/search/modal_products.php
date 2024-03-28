<style>
    .card-shadow{
        -webkit-box-shadow: 3px 3px 5px 6px #ccc;  /* Safari 3-4, iOS 4.0.2 - 4.2, Android 2.3+ */
        -moz-box-shadow:    3px 3px 5px 6px #ccc;  /* Firefox 3.5 - 3.6 */
        box-shadow:         3px 3px 5px 6px #ccc;  /* Opera 10.5, IE 9, Firefox 4+, Chrome 6+, iOS 5 */
    }
    .card-border-top{
        border-top: 3px solid #eeeeee
    }
    .card-product-display{
        background-color: #eeeeee;
        border-radius: 10px;
        padding :10px;
    }
    .card-details-content{
        max-height: 150px;
        min-height: 150px;
    }
    .product-details-card{
        background-color: #eeeeee;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }
    .content-product{
        text-align: justify;
    }
    .desc-block{
        padding: 10px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        box-shadow: 0 8px 6px -6px black;
    }
</style>
<?php
if (!empty($products)) {
    $i = 1;
    $counterIds = 0;
    foreach ($products as $key => $product) {
        $counterIds++;
        ?>
        <!-- Modal -->
        <div id="product_<?php echo $counterIds ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">
                            <?php
                            $company = $this->users_model->get_vendor_details($product['V_Id']);
                            print_r($company->comapany_name);
                            ?>
                            (<i>
                                <?php
                                $user = $this->users_model->getUser($product['V_Id']);
                                print_r($user[0]['Name']);
                                ?>
                            </i>)
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product-details-card">
                                    <?php $productData = $product[0]; ?>
                                    <div class="row card-details-content">
                                        <div class="col-md-4">
                                            <?php
                                            $image = json_decode($product['images_attached']);
                                            if (!empty($image)) {
                                                $imageId = array_values($image)[0];
                                            }
                                            ?>
                                            <?php
                                            if (!empty($imageId)) {
                                                ?>
                                                <img style="height: 150px !important;width: 100%" src="<?php echo base_url(); ?>user_files/product_images/<?php
                                                $imageData = $this->product_model->getProductImagesByid($imageId);
                                                print_r($imageData[0]['images']);
                                                ?>" alt="..." class="img-rounded img-responsive">
                                                 <?php } else { ?>
                                                <img style="height: 150px !important;width: 100%" src="https://via.placeholder.com/150" alt="..." class="img-rounded img-responsive">
                                            <?php } ?>
                                        </div>
                                        <div class="col-md-8">
                                            <h5 class="text-uppercase text-wrap text-black" style="font-weight: bold">
                                                <?php echo $product['product_name']; ?>
                                            </h5>
                                            <p class="content-product">
                                                Category : <?php echo $product['category']; ?>
                                            </p>
                                            <p class="content-product">
                                                Sub-Category : <?php echo $product['subcategory']; ?>
                                            </p>
                                            <p class="content-product">
                                                Brand : <?php echo $product['brand']; ?>
                                            </p>
                                            <p class="content-product">
                                                <?php
                                                $priceStatus = $product['price_status'];
                                                if ($priceStatus == "1") {
                                                    ?>
                                                    Price : <a class="label label-danger">Hidden <span class="glyphicon glyphicon-eye-close"></span></a>
                                                <?php } else { ?>
                                                    Price : <?php echo $product['price']; ?> <i>per <?php echo $product['uom']; ?></i>
                                                <?php } ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-12 desc-block">
                                        <div class="">
                                            <h5 class="text-uppercase text-wrap text-black" style="font-weight: bold">
                                                <?php echo $product['product_name']; ?> Description :
                                            </h5>
                                            <p class="content-product"><?php echo $product['description']; ?></p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-md-3">
                                <a class="btn btn-dark btn-block btn-sm" data-toggle="collapse" data-target="#client">Clientele</a>
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
                                <a target="_blank" href="<?php echo base_url(); ?>profile/index/<?php echo $product['V_Id']; ?>" class="btn btn-dark btn-block btn-sm">View Vendor Profile</a>
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="btn btn-default btn-block btn-sm" data-dismiss="modal">Close</button>
                            </div>
                            <div class="col-md-12">
                                <div id="client" class="collapse">
                                    <?php
                                    $clientsResult = $this->product_model->getClientsByVendor($product['V_Id']);
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