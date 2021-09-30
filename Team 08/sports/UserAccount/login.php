<?php include("include/head.php") ?>


<body>

    </div>

    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-6 col-xl-7 col-lg-7 col-md-9 col-sm-11">
                    <div>

                        <?php display_message();
                        ?>

                        <?php validate_user_login();
                        ?>

                    </div>
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <div class="d-flex justify-content-between">

                                <div style="color: green; font-size: 23px;">
                                    Log In
                                </div>

                                <div>

                                    <a href="register.php" style="color: grey; font-size: 18px; text-decoration: none;">Register</a>
                                </div>
                            </div>
                            <br>
                            <form method="POST" class="needs-validation" novalidate="" autocomplete="off">

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="email">Email</label>
                                    <input type="text" name="email" id="email" tabindex="1" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Email is invalid
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="password">Password</label>
                                    <input type="password" name="password" id="login-
										password" tabindex="2" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>




                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <div class="form-check" style="color: grey; ">
                                        <input type="checkbox" name="remember" id="remember" class="form-check-input" tabindex="3">
                                        <label for="remember" class="form-check-label">Remember Me</label>
                                    </div>
                                    <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="btn btn-success" value=" Log In" style="font-size: 23px;">

                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</body>