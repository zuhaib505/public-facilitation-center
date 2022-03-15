<div class="layout-login" style="height:100vh; background-repeat: no-repeat; background-size: cover;background-image: url('<?php echo $path ?>uploads/banners/<?php echo $login_image ?>');">
    <div class="layout-login__overlay"></div>
    <div class="layout-login__form bg-white" data-perfect-scrollbar>
        <div class="d-flex justify-content-center mt-2 mb-5 navbar-light">
            <div class="navbar-brand" style="min-width: 0">
                <img class="navbar-brand-icon" src="<?= $path; ?>uploads/logo/<?= $site_logo ?>" height="50" alt="Logo">
            </div>
        </div>

        <h4 class="m-0" style="text-align: center;">Welcome back!</h4>
        <p class="mb-5" style="text-align: center;">Login to access your account </p>

        <form method="POST" novalidate>
            <input type="hidden" name="login" id="login" value="posted" />

            <div class=""><?php echo showMsg(); ?></div>
            <div class="form-group">
                <label class="text-label" for="email">Email:</label>
                <div class="input-group input-group-merge">
                    <input id="email" name="email" type="text" required="" class="form-control form-control-prepended" placeholder="Enter email">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="far fa-user"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="text-label" for="password">Password:</label>
                <div class="input-group input-group-merge">
                    <input id="password" name="password" type="password" required="" class="form-control form-control-prepended" placeholder="Enter password">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-key"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" checked="" id="remember">
                    <label class="custom-control-label" for="remember">Remember me</label>
                </div>
            </div>
            <div class="form-group text-center">
                <button class="btn btn-primary mb-5" type="submit">Login</button><br>
                <a href="<?= $apath; ?>login?reset=1">Forgot password?</a>
                <!-- <br> Don't have an account? <a class="text-body text-underline" href="signup.html">Sign up!</a> -->
            </div>
        </form>
    </div>
</div>
<!--php
<div class="hold-transition login-page" style="background: url('<?php echo $path ?>uploads/banners/<?php echo $login_image ?>')  #d2d6de;

margin: 0px;

padding: 0px;

top: 0px;

bottom: 0px;

width: 100%;

position: absolute;

z-index: 999999;">



<div class="login-box">

    <div class="login-logo">
        <?php
        ?>
        <a href=""><img src="<?= $path; ?>uploads/logo/<?= $site_logo ?>" height="80" /></a>

    </div>

    <div class="login-box-body">

        <div class="col-md-12"><?php echo showMsg(); ?></div>

        <p class="login-box-msg">Login to continue</p>

        <form class="login-form" name="form1" id="fomr1" action="" method="post">

            <input type="hidden" name="login" id="login" value="posted" />

            <div class="form-group has-feedback">

                <input name="email" id="email" autocomplete="off" type="text" class="form-control" placeholder="email">

                <span class="glyphicon glyphicon-user form-control-feedback"></span>

            </div>

            <div class="form-group has-feedback">

                <input type="password" name="password" autocomplete="off" id="password" class="form-control" placeholder="Password">

                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

            </div>

            <div class="form-group has-feedback">

                <div class="row">

                    <div class="col-xs-6">

                        <div class="checkbox icheck">

                            <label>

                                <input type="checkbox" id="remember" style="margin-left: 0px;position: initial;"> &nbsp; Remember Me

                            </label>

                        </div>

                    </div>

                    <div class="col-xs-6">

                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>

                    </div>

                    <div class="col-xs-6 text-center" style="margin-top: 10px;">

                        <a href="<?= $apath; ?>login?reset=1" style="color:#c7c7c7;margin-top: 20px;">Reset Password</a>

                    </div>


                </div>

            </div>

        </form>

        <div class="clearfix"></div>

    </div>

</div>

<div class="clearfix"></div>

</div>
-->