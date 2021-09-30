<?php include("include/head.php") ?>


<body>

    <section class="h-100">


        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">

                <div class="col-xxl-6 col-xl-7 col-lg-7 col-md-9 col-sm-11">
                    <div>
                        <?php validate_user_registration(); ?>
                    </div>
                    <div class="card shadow-lg">

                        <div class="card-body p-5">

                            <div class="d-flex justify-content-between">



                                <div>
                                    <a href="login.php" style="color: grey; font-size: 18px; text-decoration: none;">Log In</a>
                                </div>
                                <div style="color: green; font-size: 23px;">
                                    Register
                                </div>
                            </div>
                            <br>
                            <form method="POST" class="needs-validation" novalidate="" autocomplete="off">
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="first_name">First Name</label>
                                    <input type="text" name="first_name" id="first_name" tabindex="1" class="form-control" value="" required>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="last_name">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" tabindex="1" class="form-control" value="" required>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="username">User Name</label>
                                    <input type="text" name="username" id="username" tabindex="1" class="form-control" value="" required>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="email">Email</label>
                                    <input type="email" name="email" id="email" tabindex="1" class="form-control"  required = "required">
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="password">Password</label>
                                    <input type="password" name="password" id="password" tabindex="2" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="confirm_password">Confirm Password</label>
                                    <input type="password" name="confirm_password" id="confirm-password" tabindex="2" class="form-control" required>
                                </div>

                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="btn btn-success" value="Register Now" style="font-size: 23px;">

                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</body>