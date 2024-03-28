<style>
.nav_title {
    width: 230px;
    float: left;
    background: #2A3F54;
    border-radius: 0;
    height: 57px;
}
</style>
  <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view" style="overflow-y: scroll !important">
            <div class="navbar nav_title" style="border: 0;">
            <a href="https://foodlinked.com/social/social" class="site_title logo-fl">
                <img src="https://foodlinked.com/social/landing/assets/images/logo.png" class="img-responsive logo-fl">
            </a>
             <!--  <a href="<?php echo url('/') ?>" class="site_title"><i class="fa fa-paw"></i> <span>Foodlinked</span></a> -->
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
              <img src="<?php echo config('constants.base.social_url'); ?>/assets/<?php if(strlen(trim(Session::get('photo'))) > 0){ echo 'photo/'; echo Session::get('photo'); } else { echo 'images/user.png'; }  ?> " alt="..." class="img-circle profile_img">
              </div>
              

              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{Auth::check() ? Auth::user()->name : 'Account'}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
<!-- sidebar menu -->
 <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo url('/employer') ?>"><i class="fa fa-home"></i>Dashboard</a>
                  </li>
                  <li><a href="<?php echo url('/employer/createjobposting') ?>"><i class="fa fa-edit"></i>Create Job Postings</a>
                  </li>
                  <li><a><i class="fa fa-desktop"></i>Draft Job Postings</a>
                  <ul class="nav child_menu">
                      <li><a href="<?php echo url('/employer/savedjobposting') ?>">Draft Jobs</a></li>
                      <li><a href="<?php echo url('/employer/savedcampusrecruitements') ?>">Draft Campus Recruitements</a></li>
                    </ul>
                  </li>
                   <li><a href="<?php echo url('/employer/posttojobboards') ?>"><i class="fa fa-edit"></i>Post to Job Boards</a>
                  </li>
                  <li><a><i class="fa fa-table"></i> Active Job Postings</a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo url('/employer/activejobopening') ?>">Active Job Openings</a></li>
                      <li><a href="<?php echo url('/employer/inactivejobopening') ?>">In-Active Job Openings</a></li>
                      <li><a href="<?php echo url('/employer/activecampusrecruitement') ?>">Active Campus Recruitements</a></li>
                    </ul>
                  </li>
                  <li><a href="<?php echo url('/employer/candidateinformation') ?>"><i class="fa fa-bar-chart-o"></i> Candidate Application</a>
                  </li>
                  <li><a href="<?php echo url('/employer/profile') ?>"><i class="fa fa-clone"></i>Employer Profile</a>
                  </li>
                  <li><a href="<?php echo url('/employer/assesmentandvideointerview') ?>"><i class="fa fa-camera"></i> Assessment Test and Video Interview</a>
                  </li>
                  <li><a><i class="fa fa-users"></i>Campus Recruitement</a>
                  <ul class="nav child_menu">
                      <li><a href="<?php echo url('/employer/campusrecruitement') ?>">Post to Schools</a></li>
                      <li><a href="<?php echo url('/employer/memberavailability') ?>">Members Availability Schedule</a></li>
                      <li><a href="<?php echo url('/employer/issued_offers') ?>">Issued Offers</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <!-- <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                          <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      <input type="text" value='{{csrf_token()}}' name='_token'>
                                    </form>
                      </div>
                       /menu footer buttons -->
                    </div>
                  </div> 
