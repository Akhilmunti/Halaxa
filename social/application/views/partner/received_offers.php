<!DOCTYPE html>
<html lang="en">
    <!-- Header -->
    <?php $this->load->view('partner/halaxa/header'); ?>

    <body>
        <!-- Main -->
        <div class="main">
            <!-- Navbar -->
            <?php $this->load->view('partner/halaxa/navbar'); ?>

            <div class="wrapper">
                <!-- Sidebar -->
                <?php $this->load->view('partner/halaxa/sidebar'); ?>

                <div id="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <?php $this->load->view('partner/halaxa/alerts'); ?>
                            </div>
                            <div class="col-md-12">
                                <div class="theme-card mb-3">
                                    <div class="row pr-3 pl-2">
                                        <div class="col-md-12">
                                            <div class="post-card p-2">
                                                <span class="com-name">Received Offers</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row pt-3 pb-3">
                                            <div class="col-md-2">
                                                <img width="15" class="text-vertical" src='<?php echo base_url('assets/halaxa_partner/images/filter-icon.png'); ?>'>
                                                <p class="text-danger text-vertical"><b>Search : </b></p>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <input type="text" class="fontAwesome form-control" name="emailAddress" placeholder="&#xf002;  Keyword" value="">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a style="padding: 6px" href="#" class="btn btn-danger btn-block">Submit</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-filter" style="background-color: #ffffff">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Circle Name</th>
                                                    <th>Intern Name</th>
                                                    <th>Location</th>
                                                    <th>Status</th>
                                                    <th>Period From</th>
                                                    <th>Period To</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <?php 
                                            //echo '<pre>';
                                            //print_r($scheduledMembers);
                                            ?>
                                            <tbody>
                                                <?php 
                                                $counter = 1;
                                                foreach($scheduledMembers as $members){ ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $counter++;?>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="table-circle"><?php echo $members['Schedule_name']?></a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="table-circle"><?php echo $members['Intern_Name']?></a>
                                                    </td>
                                                    <td>
                                                        <span class="table-type"><?php echo $members['Country'].", ".$members['City']?></span>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                        $today = date("Y-m-d");
                                                        $date = $members['Periodfrom'];
                                                        if ($date < $today && $members['Flag'] == 0) { ?>
                                                            <span class="table-status">
                                                                Expired
                                                            </span>
                                                        <?php } else if($members['Flag'] == 0){ ?>
                                                            <span class="table-status">
                                                                Pending
                                                            </span>
                                                        <?php }else if($members['Flag'] == 1){ ?>
                                                            <span class="table-status">
                                                                Accepted
                                                            </span>
                                                       <?php }else if($members['Flag'] == -1){ ?>
                                                            <span class="table-status">
                                                                Rejected
                                                            </span>
                                                       <?php }?>
                                                    </td>
                                                    <td>
                                                        <span class="table-type">
                                                            <?php 
                                                                $date = date_create($members['Periodfrom']);
                                                                echo date_format($date,"d M Y");?>
                                                            </span>
                                                    </td>
                                                    <td>
                                                        <span class="table-type">
                                                            <?php 
                                                                $date = date_create($members['Periodto']);
                                                                echo date_format($date,"d M Y");?></span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="ml-3">
                                                            <img height="20" src="<?php echo base_url('assets/halaxa_partner/images/user-sig.png'); ?>" />
                                                        </a>
                                                        <a href="<?php echo base_url('partner/receivedoffers/reject/'.$members['S_Id']); ?>" class="ml-3 table-dropdown">
                                                            <img height="12" src="<?php echo base_url('assets/halaxa_partner/images/cross.png'); ?>" />
                                                        </a>
                                                        <a href="<?php echo base_url('partner/receivedoffers/accept/'.$members['S_Id']); ?>" class="ml-3 table-dropdown">
                                                            <img height="12" src="<?php echo base_url('assets/halaxa_partner/images/tick.png'); ?>" />
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php }
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
        </div>

        <!-- End Main -->

        <!-- jQuery  -->
        <?php $this->load->view('partner/halaxa/scripts'); ?>

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