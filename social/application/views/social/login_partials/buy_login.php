<div class="col-md-6 col-lg-7 fullscreen-md d-flex justify-content-center align-items-center overlay gradient gradient-53 alpha-7 image-background cover" style="background-image:url(Foodlinked_Sample/background.jpg)">
    <div class="content">
        <h4 class="color-1 mt-4 mt-md-0 d-block d-sm-none">Welcome to <span class="bold">Foodlinked</span></h4>
        <h2 class="display-4 display-md-3 color-1 mt-4 mt-md-0 d-none d-sm-block">Welcome to <span class="bold d-block">Foodlinked</span></h2>
        <p class="lead color-1 alpha-5">
            FOOD AND HOSPITALITY<br>
            Professional Business Network 
        </p>
        <div class="d-flex flex-column">
            <p class="medium bold color-1">BUY</p>
            <ul class="list-unstyled color-1" style="font-size: 12px">
                <li><i class="fa fa-square-o "></i> Search thousands of products and sellers</li>
                <li><i class="fa fa-square-o "></i> Issue RFQs to one or multiple sellers of your choice at a time​</li>
                <li><i class="fa fa-square-o "></i> Compare and Negotiate Quotations</li>
                <li><i class="fa fa-square-o "></i> Issue Purchase Orders</li>
                <li><i class="fa fa-square-o "></i> Easy Re-order option</li>
                <li><i class="fa fa-square-o "></i> Rate and Review Sellers that you deal with</li>
                <li><i class="fa fa-square-o "></i> If you cannot find a product then post a public RFQ and sellers will find you​</li>
                <li><i class="fa fa-square-o "></i> Reduce your procurement cost by more than 20%</li>
                <li><i class="fa fa-square-o "></i> Get Products and Sellers recommendations based on your profile preferences​</li>
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