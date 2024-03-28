<!-- Sidebar  -->

<?php
$mUserId = $this->session->userdata('User_Id');
if ($sidebar == "home") {
    $home = "active";
    $parent = "collapse";
    $all = "";
    $public = "";
    $can = "";
    $fav = "";
    $profile = "";
    $received = "";
    $products = "";
    $sellers = "";
    $po = "";
} elseif ($sidebar == "viewrfq") {
    $home = "";
    $all = "active";
    $parent = "collapsed";
    $public = "";
    $can = "";
    $po = "";
    $sellers = "";
    $products = "";
    $profile = "";
    $fav = "";
    $received = "";
} elseif ($sidebar == "publicrfq") {
    $home = "";
    $all = "";
    $can = "";
    $received = "";
    $public = "active";
    $po = "";
    $profile = "";
    $fav = "";
    $products = "";
    $sellers = "";
    $parent = "collapsed";
} elseif ($sidebar == "canrfq") {
    $home = "";
    $all = "";
    $public = "";
    $received = "";
    $fav = "";
    $sellers = "";
    $can = "active";
    $products = "";
    $profile = "";
    $po = "";
    $parent = "collapsed";
} elseif ($sidebar == "received") {
    $home = "";
    $all = "";
    $public = "";
    $can = "";
    $po = "";
    $profile = "";
    $fav = "";
    $sellers = "";
    $products = "";
    $received = "active";
    $parent = "collapse";
} elseif ($sidebar == "po") {
    $home = "";
    $all = "";
    $public = "";
    $can = "";
    $received = "";
    $fav = "";
    $profile = "";
    $sellers = "";
    $products = "";
    $po = "active";
    $parent = "collapse";
} elseif ($sidebar == "fav") {
    $home = "";
    $all = "";
    $public = "";
    $can = "";
    $received = "";
    $po = "";
    $profile = "";
    $sellers = "";
    $products = "";
    $fav = "active";
    $parent = "collapse";
} elseif ($sidebar == "sellers") {
    $home = "";
    $all = "";
    $public = "";
    $can = "";
    $received = "";
    $po = "";
    $fav = "";
    $products = "";
    $profile = "";
    $sellers = "active";
    $parent = "collapse";
} elseif ($sidebar == "pro") {
    $home = "";
    $all = "";
    $public = "";
    $can = "";
    $received = "";
    $po = "";
    $fav = "";
    $products = "active";
    $sellers = "";
    $profile = "";
    $parent = "collapse";
} elseif ($sidebar == "profile") {
    $home = "";
    $all = "";
    $public = "";
    $can = "";
    $received = "";
    $po = "";
    $fav = "";
    $products = "";
    $profile = "active";
    $sellers = "";
    $parent = "collapse";
} else {
    $home = "";
    $all = "";
    $public = "";
    $po = "";
    $can = "";
    $received = "";
    $fav = "";
    $sellers = "";
    $products = "";
    $profile = "";
    $parent = "collapse";
}

$quotedrq = $this->vendor_model->getAllQuotedRFQsForRqNew($mUserId);
if (!empty($quotedrq)) {
    $temp_array = array();
    $i = 0;
    $key_array = array();
    foreach ($quotedrq as $val) {
        if (!in_array($val['RFQ_Id'], $key_array)) {
            $key_array[$i] = $val['RFQ_Id'];
            $temp_array[$i] = $val;
        }
        $i++;
    }
    $receivedQs = $temp_array;
}
$poissued = $this->vendor_model->getAllPOIssuedRFQs("1", $mUserId);
?>

<nav id="sidebar">
    <div class="sidebar-header">
        <a href="<?php echo base_url(); ?>" class="no-decoration">
            <img class="img-fluid logo-big" src="<?php echo base_url('assets/halaxa_dashboard/images/logo.png'); ?>" />
        </a>
        <a href="<?php echo base_url(); ?>" class="no-decoration">
            <img class="img-fluid logo-small" src="<?php echo base_url('assets/halaxa_dashboard/images/favicon.png'); ?>" />
        </a>
        <a href="<?= base_url("buyer/rfq/create"); ?>" class="btn btn-info-post btn-block">
            New RFQ <i class="fa fa-plus ml-2"></i>
        </a>
    </div>

    <ul class="list-unstyled components">
        <li class="sidebar-li <?php echo $products; ?>">
            <a href="<?php echo base_url('buyer/products'); ?>">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo base_url('assets/halaxa_buyer/images/find-products-icon.png'); ?>" />
                </i>
                <span class="span-desc">
                    Find Products
                </span>
            </a>
        </li>
        <li class="sidebar-li <?php echo $sellers; ?>">
            <a href="<?php echo base_url('buyer/vendors'); ?>">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo base_url('assets/halaxa_buyer/images/find-sellers-icon.png'); ?>" />
                </i>
                <span class="span-desc">
                    Find Sellers
                </span>
            </a>
        </li>
        <hr class="hr-theme">
        <li class="sidebar-li <?php echo $home; ?>">
            <a href="<?php echo base_url('buyer'); ?>">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo base_url('assets/halaxa_buyer/images/dashboard-icon.png'); ?>" />
                </i>
                <span class="span-desc">
                    Dashboard
                </span>
            </a>
        </li>
        <li class="sidebar-li <?php echo $received; ?>">
            <a href="<?php echo base_url('buyer/received-quotes'); ?>">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo base_url('assets/halaxa_buyer/images/received-icon.png'); ?>" />
                </i>
                <span class="span-desc">
                    Rec. Quotations
                </span>
                <span class="float-right badge badge-danger sidenav-badge">
                    <?php if (!empty($receivedQs)) { ?> 
                        <?php echo count($receivedQs); ?>
                    <?php } else { ?>
                        0
                    <?php } ?>
                </span>
            </a>
        </li>
        <li class="sidebar-li <?php echo $po; ?>">
            <a href="<?php echo base_url('buyer/purchase-order'); ?>">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo base_url('assets/halaxa_buyer/images/po-icon.png'); ?>" />
                </i>
                <span class="span-desc">
                    My POs
                </span>
                <span class="float-right badge badge-danger sidenav-badge">
                    <?php if (!empty($poissued)) { ?> 
                        <?php echo count($poissued); ?>
                    <?php } else { ?>
                        0
                    <?php } ?>                
                </span>
            </a>
        </li>
        <hr class="hr-theme">
        <li class="sidebar-li sidenav-label">RFQs</li>
        <li class="sidebar-li">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo base_url('assets/halaxa_buyer/images/view-rfq-icon.png'); ?>" />
                </i>
                <span class="span-desc">
                    View RFQs
                </span>
            </a>
            <ul class="<?php echo $parent; ?> list-unstyled" id="homeSubmenu">
                <li class="sidebar-li <?php echo $all; ?>">
                    <a href="<?php echo base_url('buyer/rfq'); ?>">All</a>
                </li>
                <li class="sidebar-li <?php echo $public; ?>">
                    <a href="<?php echo base_url('buyer/rfq/publicRFQ'); ?>">Public</a>
                </li>
                <li class="sidebar-li <?php echo $can; ?>">
                    <a href="<?php echo base_url('buyer/rfq/cancelledRFQ'); ?>">Cancelled</a>
                </li>
            </ul>
        </li>
        <hr class="hr-theme">
        <li class="sidebar-li sidenav-label">Sellers</li>
        <li class="sidebar-li <?php echo $fav; ?>">
            <a href="<?php echo base_url('buyer/favourite-seller'); ?>">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo base_url('assets/halaxa_buyer/images/fav-icon.png'); ?>" />
                </i>
                <span class="span-desc">
                    Favourite Sellers
                </span>
            </a>
        </li>
        <hr class="hr-theme">
        <li class="sidebar-li sidenav-label">Buyer Profile</li>
        <li class="sidebar-li <?php echo $profile; ?>">
            <a href="<?php echo base_url('buyer/profile'); ?>">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo base_url('assets/halaxa_dashboard/images/profile-icon.png'); ?>" />
                </i>
                <span class="span-desc">
                    Profile
                </span>
            </a>
        </li>
        <hr class="hr-theme">
    </ul>
</nav>