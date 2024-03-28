<!-- Sidebar  -->

<?php
if ($sidebar == "home") {
    $home = "active";
    $parent = "collapse";
    $all = "";
    $public = "";
    $can = "";
    $fav = "";
    $received = "";
    $sellers = "";
    $po = "";
    $parentT = "collapse";
} elseif ($sidebar == "all") {
    $home = "";
    $all = "active";
    $parent = "collapsed";
    $public = "";
    $can = "";
    $po = "";
    $sellers = "";
    $fav = "";
    $received = "";
    $parentT = "collapse";
} elseif ($sidebar == "public") {
    $home = "";
    $all = "";
    $can = "";
    $received = "";
    $public = "active";
    $po = "";
    $fav = "";
    $sellers = "";
    $parent = "collapsed";
    $parentT = "collapse";
} elseif ($sidebar == "mp") {
    $home = "";
    $all = "";
    $public = "";
    $received = "";
    $fav = "";
    $sellers = "";
    $mp = "active";
    $po = "";
    $parent = "collapse";
    $parentT = "collapsed";
} elseif ($sidebar == "received") {
    $home = "";
    $all = "";
    $public = "";
    $can = "";
    $po = "";
    $fav = "";
    $sellers = "";
    $received = "active";
    $parent = "collapse";
    $parentT = "collapse";
} elseif ($sidebar == "po") {
    $home = "";
    $all = "";
    $public = "";
    $can = "";
    $received = "";
    $fav = "";
    $sellers = "";
    $po = "active";
    $parent = "collapse";
    $parentT = "collapse";
} elseif ($sidebar == "add") {
    $home = "";
    $all = "";
    $public = "";
    $can = "";
    $received = "";
    $po = "";
    $sellers = "";
    $add = "active";
    $parent = "collapse";
    $parentT = "collapsed";
} elseif ($sidebar == "groups") {
    $home = "";
    $all = "";
    $public = "";
    $can = "";
    $received = "";
    $po = "";
    $fav = "";
    $groups = "active";
    $parent = "collapse";
    $parentT = "collapsed";
} elseif ($sidebar == "cata") {
    $home = "";
    $all = "";
    $public = "";
    $can = "";
    $received = "";
    $po = "";
    $fav = "";
    $cata = "active";
    $groups = "";
    $parent = "collapse";
    $parentT = "collapsed";
} elseif ($sidebar == "client") {
    $home = "";
    $all = "";
    $public = "";
    $can = "";
    $received = "";
    $po = "";
    $fav = "";
    $cata = "";
    $client = "active";
    $groups = "";
    $parent = "collapse";
    $parentT = "collapse";
} elseif ($sidebar == "profile") {
    $home = "";
    $all = "";
    $public = "";
    $can = "";
    $received = "";
    $po = "";
    $fav = "";
    $cata = "";
    $profile = "active";
    $groups = "";
    $parent = "collapse";
    $parentT = "collapse";
} else {
    $home = "";
    $all = "";
    $public = "";
    $po = "";
    $can = "";
    $received = "";
    $fav = "";
    $sellers = "";
    $profile = "";
    $parent = "collapse";
    $parentT = "collapse";
}
?>

<nav id="sidebar">
    <div class="sidebar-header">
        <a href="<?php echo base_url(); ?>" class="no-decoration">
            <img class="img-fluid logo-big" src="<?php echo base_url('assets/halaxa_dashboard/images/logo.png'); ?>" />
        </a>
        <a href="<?php echo base_url(); ?>" class="no-decoration">
            <img class="img-fluid logo-small" src="<?php echo base_url('assets/halaxa_dashboard/images/favicon.png'); ?>" />
        </a>
    </div>

    <ul class="list-unstyled components">

        <li class="sidebar-li <?php echo $home; ?>">
            <a href="<?= base_url("vendor/home"); ?>">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo base_url('assets/halaxa_buyer/images/dashboard-icon.png'); ?>" />
                </i>
                <span class="span-desc">
                    Dashboard
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
                    Received RFQs
                </span>
            </a>
            <ul class="<?php echo $parent; ?> list-unstyled" id="homeSubmenu">
                <li class="sidebar-li <?php echo $all; ?>">
                    <a href="<?= base_url("vendor/recieved_rfq"); ?>">All</a>
                </li>
                <li class="sidebar-li <?php echo $public; ?>">
                    <a href="<?= base_url("vendor/public_rfq"); ?>">Public</a>
                </li>
                <li class="sidebar-li <?php echo $can; ?>">
                    <a href="<?= base_url("vendor/requote_rfq"); ?>">Under Negotiation</a>
                </li>
            </ul>
        </li>
        <hr class="hr-theme">
        <li class="sidebar-li <?php echo $po; ?>">
            <a href="<?= base_url("vendor/purchase_orders"); ?>">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo base_url('assets/halaxa_buyer/images/po-icon.png'); ?>" />
                </i>
                <span class="span-desc">
                    POs Management
                </span>
            </a>
        </li>
        <hr class="hr-theme">
        <li class="sidebar-li sidenav-label">Products</li>
        <li class="sidebar-li">
            <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo base_url('assets/halaxa_buyer/images/view-rfq-icon.png'); ?>" />
                </i>
                <span class="span-desc">
                    Products
                </span>
            </a>
            <ul class="<?php echo $parentT; ?> list-unstyled" id="homeSubmenu2">
                <li class="sidebar-li <?php echo $add; ?>">
                    <a href="<?= base_url("vendor/products/add_new"); ?>">Add</a>
                </li>
                <li class="sidebar-li <?php echo $groups; ?>">
                    <a href="<?= base_url("vendor/groups"); ?>">Manage Group</a>
                </li>
                <li class="sidebar-li <?php echo $mp; ?>">
                    <a href="<?= base_url("vendor/products/manageProducts"); ?>">List Products</a>
                </li>
                <li class="sidebar-li <?php echo $cata; ?>">
                    <a href="<?php echo base_url('vendor/products/viewCatalogue'); ?>">View catalogue</a>
                </li>
            </ul>
        </li>
        <hr class="hr-theme">
        <li class="sidebar-li <?php echo $client; ?>">
            <a href="<?= base_url("vendor/clientele"); ?>">
                <i class="span-icon">
                    <img class="img-fluid" src="<?php echo base_url('assets/halaxa_buyer/images/dashboard-icon.png'); ?>" />
                </i>
                <span class="span-desc">
                    Clientele
                </span>
            </a>
        </li>
        <hr class="hr-theme">
        <li class="sidebar-li sidenav-label">Seller Profile</li>
        <li class="sidebar-li <?php echo $profile; ?>">
            <a href="<?php echo base_url('vendor/profile'); ?>">
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