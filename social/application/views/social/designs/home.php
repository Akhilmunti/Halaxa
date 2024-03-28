<!DOCTYPE html>
<html lang="en">
    <!-- Header -->
    <?php $this->load->view('social/halaxa_partials/header'); ?>

    <body>
        <!-- Main -->
        <div class="main">
            <!-- Navbar -->
            <?php $this->load->view('social/halaxa_partials/navbar'); ?>

            <div class="wrapper">
                <!-- Sidebar -->
                <!-- Sidebar  -->
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
                        <li class="sidebar-li">
                            <a href="#">
                                <i class="span-icon">
                                    <img class="img-fluid" src="<?php echo base_url('assets/halaxa_dashboard/images/feeds-icon.png'); ?>" />
                                </i>
                                <span class="span-desc">
                                    Community List
                                </span>
                            </a>
                        </li>
                        <hr class="hr-theme">
                        <li class="sidebar-li <?php echo $feeds; ?>">
                            <a href="<?php echo base_url(); ?>">
                                <i class="span-icon">
                                    <img class="img-fluid" src="<?php echo base_url('assets/halaxa_dashboard/images/feeds-icon.png'); ?>" />
                                </i>
                                <span class="span-desc">
                                    Feeds
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-li">
                            <a href="<?php echo base_url(); ?>social/network">
                                <i class="span-icon">
                                    <img class="img-fluid" src="<?php echo base_url('assets/halaxa_dashboard/images/followers-icon.png'); ?>" />
                                </i>
                                <span>
                                    Followers
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-li">
                            <a href="<?php echo base_url(); ?>communities/user">
                                <i class="span-icon">
                                    <img class="img-fluid" src="<?php echo base_url('assets/halaxa_dashboard/images/communities-icon.png'); ?>" />
                                </i>
                                <span>
                                    My Communities
                                </span>
                            </a>
                        </li>
                        <hr class="hr-theme">
                        <li class="sidebar-li sidenav-label">Profile</li>
                        <li class="sidebar-li">
                            <a href="<?php echo base_url("profile"); ?>">
                                <i class="span-icon">
                                    <img class="img-fluid" src="<?php echo base_url('assets/halaxa_dashboard/images/profile-icon.png'); ?>" />
                                </i>
                                <span>
                                    Profile
                                </span>
                            </a>
                        </li>
                    </ul>
                </nav>

                <div id="content">
                    <div class="container-fluid">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Main -->

    <!-- jQuery  -->
    <?php $this->load->view('social/halaxa_partials/scripts'); ?>

    <script>
        document.addEventListener("touchstart", function () {}, true);
        function empty_validate() {
            var a = document.getElementById('content').value;
            var b = document.getElementById('image').value;
            var c = document.getElementById('video').value;
            var d = document.getElementById('link').value;
            if ($('#content').val() || $('#image').val() || $('#video').val() || $('#link').val()) {
                return true;
            } else {
                alert("Empty Post cannot be posted.");
                return false;
            }
        }

    </script>
    <script>
        function addId(id) {
            var id = id
            alert(id);
            $.ajax({
                type: "post",
                url: "<?php echo base_url('controller/function'); ?>",
                data: {id: id},
                cache: false,
                async: false,
                success: function (result) {
                    console.log(result);
                }
            });
        }
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
    <script>
        var loadFile = function (event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
        $(document).on("change", ".file_multi_video", function (evt) {
            var $source = $('#video_here');
            $source[0].src = URL.createObjectURL(this.files[0]);
            $source.parent()[0].load();
        });
    </script>
    <script>
        $("#cancelImage").click(function () {
            $('#image').val('');
            $('#output').attr("src", "https://via.placeholder.com/150");
        });
        $("#cancelVideo").click(function () {
            $('#video').val('');
            $("#videoPreview").attr("src", "videos/Funny Cats.mp4");
        });
        $("#cancelLink").click(function () {
            $('#link').val('');
        });
        $("#linkClose").click(function () {
            $('#link').val('');
            $('#myModalLink').modal('hide');
        });
        $("#videoClose").click(function () {
            $('#video').val('');
            $('#myModalVideo').modal('hide');
            $("video").attr("src", "videos/Funny Cats.mp4");
        });
        $("#imageClose").click(function () {
            $('#image').val('');
            $('#myModalImage').modal('hide');
            $('#output').attr("src", "https://via.placeholder.com/150");
        });
    </script>
    <script type="text/javascript">
        $('#content').on('change', function () {
            // Change occurred so count chars...
            var comment = $.trim($("#content").val());
            $("#content_image").text(comment);
            $("#content_video").text(comment);
            $("#content_link").text(comment);
        });
    </script>
</body>

</html>