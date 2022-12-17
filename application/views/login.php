<!-- <!doctype html>-->
<!--<html lang="en">-->
<!--    <head>-->
<!--        <meta charset="utf-8" />-->
<!--        <title>Hexzy - Responsive Admin Dashboard Template</title>-->
<!--        <meta name="viewport" content="width=device-width, initial-scale=1.0" />-->
<!--        <meta content="Admin Dashboard" name="description" />-->
<!--        <meta content="ThemeDesign" name="author" />-->
<!--        <meta http-equiv="X-UA-Compatible" content="IE=edge" />-->

<!--        <link rel="shortcut icon" href="assets/images/logo-smk.jpg">-->

<!--        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">-->
<!--        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">-->
<!--        <link href="assets/css/style.css" rel="stylesheet" type="text/css">-->

<!--    </head> -->-->


<body>

    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="card card-pages">
            <div class="card-body">
                <div class="text-center m-t-0 m-b-15">
                    <img src="<?php echo base_url(); ?>assets/images/Logo-smk.jpg" alt="" height="100">
                </div>
                <h4 class="text-muted text-center m-t-0"><b>Sign In</b></h4>

                <form class="form-horizontal m-t-20" action="Auth/index" method="post">
                    <?php if ($this->session->flashdata('error')) {
                        echo $this->session->flashdata('error');
                    } ?>
                    <div class="form-group">
                        <div class="col-12">
                            <input class="form-control" type="text" required="" placeholder="Username" name="username" value="<?php echo set_value('username'); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <input class="form-control" type="password" required="" placeholder="Password" name="password">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup">
                                    Remember me
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center m-t-40">
                        <div class="col-12">
                            <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>



    <!-- jQuery  -->
    <!-- <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/modernizr.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html> -->