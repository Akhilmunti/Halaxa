<div class="col-md-6 col-lg-7 fullscreen-md d-flex justify-content-center align-items-center overlay gradient gradient-53 alpha-7 image-background cover" style="background-image:url(Foodlinked_Sample/background.jpg)">
    <div class="content">
        <h4 class="color-1 mt-4 mt-md-0 d-block d-sm-none">Welcome to <span class="bold">Foodlinked</span></h4>
        <h2 class="display-4 display-md-3 color-1 mt-4 mt-md-0 d-none d-sm-block">Welcome to <span class="bold d-block">Foodlinked</span></h2>
        <p class="lead color-1 alpha-5">
            FOOD AND HOSPITALITY<br>
            Professional Business Network 
        </p>
        <div class="d-flex flex-column">
            <nav class="nav text-center  d-none d-sm-block">
                <a class="btn btn-accent btn-rounded mr-2 mb-2" style="background-color: #00C3AE; border-color: #DFF0D8;" href="<?php echo base_url('home/network'); ?>">Network</a> 
                <a class="btn btn-accent btn-rounded mr-2 mb-2" style="background-color: #00C3AE; border-color: #DFF0D8;" href="#">Find a job</a> 
                <a class="btn btn-accent btn-rounded mr-2 mb-2" style="background-color: #00C3AE; border-color: #DFF0D8;" href="#">Post a job</a>
            </nav>
            <br class="d-none d-sm-block">
            <nav class="nav text-center  d-none d-sm-block">
                <a class="btn btn-accent btn-rounded mr-2" style="background-color: #00C3AE; border-color: #DFF0D8;" href="<?php echo base_url('home/sell'); ?>">Sell Products</a> 
                <a class="btn btn-accent btn-rounded mr-2" style="background-color: #00C3AE; border-color: #DFF0D8;" href="<?php echo base_url('home/buy'); ?>">Buy Products</a>
            </nav>
            <nav class="nav d-block d-sm-none">
                <a class="btn btn-accent btn-rounded mr-2 mb-2 btn-block" style="background-color: #00C3AE; border-color: #DFF0D8;" href="<?php echo base_url('home/network'); ?>">Network</a> 
                <a class="btn btn-accent btn-rounded mr-2 mb-2 btn-block" style="background-color: #00C3AE; border-color: #DFF0D8;" href="#">Find a job</a> 
                <a class="btn btn-accent btn-rounded mr-2 mb-2 btn-block" style="background-color: #00C3AE; border-color: #DFF0D8;" href="#">Post a job</a>
                <a class="btn btn-accent btn-rounded mr-2 mb-2 btn-block" style="background-color: #00C3AE; border-color: #DFF0D8;" href="<?php echo base_url('home/sell'); ?>">Sell Products</a> 
                <a class="btn btn-accent btn-rounded mr-2 mb-2 btn-block" style="background-color: #00C3AE; border-color: #DFF0D8;" href="<?php echo base_url('home/buy'); ?>">Buy Products</a>
            </nav>
        </div>
        <hr class="mt-md-6 w-25">
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