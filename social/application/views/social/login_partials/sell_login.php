<div class="col-md-6 col-lg-7 fullscreen-md d-flex justify-content-center align-items-center overlay gradient gradient-53 alpha-7 image-background cover" style="background-image:url(Foodlinked_Sample/background.jpg)">
    <div class="content">
        <h4 class="color-1 mt-4 mt-md-0 d-block d-sm-none">Welcome to <span class="bold">Foodlinked</span></h4>
        <h2 class="display-4 display-md-3 color-1 mt-4 mt-md-0 d-none d-sm-block">Welcome to <span class="bold d-block">Foodlinked</span></h2>
        <p class="lead color-1 alpha-5">
            FOOD AND HOSPITALITY<br>
            Professional Business Network 
        </p>
        <div class="d-flex flex-column">
            <p class="medium bold color-1">SELL</p>
            <ul class="list-unstyled color-1" style="font-size: 12px">
                <li><i class="fa fa-square-o "></i> Increase your sales​</li>
                <li><i class="fa fa-square-o "></i> Add and Manage products – upload 1,000+ products in 2 clicks</li>
                <li><i class="fa fa-square-o "></i> Set your delivery areas and quantities per product</li>
                <li><i class="fa fa-square-o "></i> Display and Promote your products</li>
                <li><i class="fa fa-square-o "></i> Receive RFQs</li>
                <li><i class="fa fa-square-o "></i> Issue Quotations</li>
                <li><i class="fa fa-square-o "></i> Receive Purchase Orders</li>
                <li><i class="fa fa-square-o "></i> Browse public Buying requests and issue quotations</li>
                <li><i class="fa fa-square-o "></i> Easy tools to negotiate and discuss issued quotations with Buyers​</li>
                <li><i class="fa fa-square-o "></i> Maintain and Track all your sale communications and transactions ​</li>
            </ul>
        </div>
        <hr class="mt-md-2 w-25">
        <?php
        $type = $this->uri->segment('2');
        if ($type == "register") {
            ?>
            <div class="d-flex flex-column">
                <p class="small bold color-1">Or sign up with</p>
                <nav class="nav mb-4 d-none d-sm-block">
                    <a href="<?php echo base_url('socialauthentication/facebook/network'); ?>" class="btn btn-outline-2 brand-facebook mr-2" href="#"><i class="fa fa-facebook-f"></i> Facebook</a> 
                    <a href="<?php echo base_url('socialauthentication/linkedin/network'); ?>" class="btn btn-outline-2 brand-linkedin mr-2"><i class="fa fa-linkedin"></i> LinkedIn </a>
                    <a href="<?php echo base_url('socialauthentication/google/network'); ?>" class="btn btn-outline-2 brand-google mr-2"><i class="fa fa-google"></i> Google </a>
                </nav>
                <nav class="nav mb-4 d-block d-sm-none">
                    <a href="<?php echo base_url('socialauthentication/facebook/network'); ?>" class="btn btn-outline-2 brand-facebook mr-2 btn-block" href="#"><i class="fa fa-facebook-f"></i> Facebook</a> 
                    <a href="<?php echo base_url('socialauthentication/linkedin/network'); ?>" class="btn btn-outline-2 brand-linkedin mr-2 btn-block"><i class="fa fa-linkedin"></i> LinkedIn </a>
                    <a href="<?php echo base_url('socialauthentication/google/network'); ?>" class="btn btn-outline-2 brand-google mr-2 btn-block"><i class="fa fa-google"></i> Google </a>
                </nav>
            </div>
        <?php } else { ?>
            <div class="d-flex flex-column">
                <p class="small bold color-1">Or sign in with</p>
                <nav class="nav mb-4 d-none d-sm-block">
                    <a href="<?php echo base_url('socialauthentication/facebook/network'); ?>" class="btn btn-outline-2 brand-facebook mr-2" href="#"><i class="fa fa-facebook-f"></i> Facebook</a> 
                    <a href="<?php echo base_url('socialauthentication/linkedin/network'); ?>" class="btn btn-outline-2 brand-linkedin mr-2"><i class="fa fa-linkedin"></i> LinkedIn </a>
                    <a href="<?php echo base_url('socialauthentication/google/network'); ?>" class="btn btn-outline-2 brand-google mr-2"><i class="fa fa-google"></i> Google </a>
                </nav>
                <nav class="nav mb-4 d-block d-sm-none">
                    <a href="<?php echo base_url('socialauthentication/facebook/network'); ?>" class="btn btn-outline-2 brand-facebook mr-2 btn-block" href="#"><i class="fa fa-facebook-f"></i> Facebook</a> 
                    <a href="<?php echo base_url('socialauthentication/linkedin/network'); ?>" class="btn btn-outline-2 brand-linkedin mr-2 btn-block"><i class="fa fa-linkedin"></i> LinkedIn </a>
                    <a href="<?php echo base_url('socialauthentication/google/network'); ?>" class="btn btn-outline-2 brand-google mr-2 btn-block"><i class="fa fa-google"></i> Google </a>
                </nav>
            </div>
        <?php } ?>
    </div>
</div>