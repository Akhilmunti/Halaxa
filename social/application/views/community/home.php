<!DOCTYPE html>
<html lang="en">
    <!-- Header -->
    <?php $this->load->view('community/partials/header'); ?>

    <body>
        <!-- Main -->
        <div class="main">
            <!-- Navbar -->
            <?php $this->load->view('community/partials/navbar'); ?>

            <div class="wrapper">
                <!-- Sidebar -->
                <?php $this->load->view('community/partials/sidebar'); ?>

                <div id="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <?php //$this->load->view('community/partials/alerts'); ?>
                            </div>
                            <div class="col-md-8">
                                <div class="post-card-bottom p-3 scrolling-div-y">
                                    <div class="">
                                        <ul class="list-unstyled">
                                            <?php
                                            foreach ($topics as $key => $topic) {
                                                $posts = $this->cp_model->getAllParentByTopicKey($topic['ct_key']);
                                                if (!empty($posts)) {
                                                    $postsCount = count($posts);
                                                } else {
                                                    $postsCount = "0";
                                                }

                                                $val = $posts[0];
                                                $mWhoPosted = $val['cp_posted_id'];
                                                if ($mWhoPosted == 0) {
                                                    $mName = $val['ct_partner_type'] . " Admin";
                                                    $mDate = $val['cp_date_added'];
                                                    $mPostKey = $val['cp_key'];
                                                } else {
                                                    $mGetUser = $this->users_model->get_user_by_id($mWhoPosted);
                                                    $mName = $mGetUser->Name;
                                                    $mDate = $val['cp_date_added'];
                                                }
                                                ?>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-1 mt-3">
                                                            <img class="img-fluid" src="<?php echo base_url('assets/halaxa_partner/images/profile-icon.png'); ?>" />
                                                        </div>
                                                        <div class="col-md-11">
                                                            <a class="topic-name" href="<?php echo base_url('communities/actionCommunityPost/' . $topic['ct_key'] . "/" . $topic['ct_partner_key']); ?>"><?php echo $topic['ct_topic']; ?></a> <span class="topic-last-light ml-2">(<?php echo $postsCount; ?> Posts)</span>
                                                            <div class="clearfix"></div>
                                                            <span class="topic-last-light">Last response by</span>
                                                            <span class="topic-last-dark"><?php echo $mName; ?></span>
                                                            <span class="topic-last-light">at <?php echo $mDate; ?> </span>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="post-card-bottom p-3">
                                    <h6 class="partner-name">
                                        <?php echo $partner['Groupname']; ?>
                                    </h6>
                                    <p>
                                        <?php echo $partner['group_description']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Main -->

        <!-- jQuery  -->
        <?php $this->load->view('community/partials/scripts'); ?>

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