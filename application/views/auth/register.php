<div class="swal" data-swal="<?= $this->session->flashdata('notif'); ?>"></div>
<div class="swal-error" data-swalerror="<?= $this->session->flashdata('error'); ?>"></div>
<!-- <div class="register-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Register a new membership</p>

            <form action="<?= base_url(); ?>auth/register" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control <?= form_error('username') ? 'is-invalid' : ''; ?>" name="username" placeholder="Username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        <?= form_error('username'); ?>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" name="fullname" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        <?= form_error('fullname'); ?>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        <?= form_error('password'); ?>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Retype password" name="pass_confirm">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        <?= form_error('pass_confirm'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                            <label for="agreeTerms">
                                I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div>
                  
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                 ]
                </div>
            </form>

            <a href="login.html" class="text-center">I already have a membership</a>
        </div>

    </div>
</div> -->
<div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                    <div class="d-flex justify-content-center py-4">
                        <a href="index.html" class="logo d-flex align-items-center w-auto">
                            <img src="<?= base_url('assets/img/Asset 14.png') ?>" alt="">
                            <span class="d-none d-lg-block">SIMPEL</span>
                        </a>
                    </div><!-- End Logo -->

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                <p class="text-center small">Enter your personal details to create account</p>
                            </div>

                            <form class="row g-3 needs-validation" method="POST" action="<?= base_url(); ?>auth/register">
                                <div class="col-12">
                                    <label for="yourName" class="form-label">FullName</label>
                                    <input type="text" name="fullname" placeholder="Fullname" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" id="yourName" required>
                                    <div class="invalid-feedback"> <?= form_error('fullname'); ?></div>
                                </div>

                                <div class="col-12">
                                    <label for="yourEmail" class="form-label">Username</label>
                                    <input type="text" class="form-control <?= form_error('username') ? 'is-invalid' : ''; ?>" name="username" placeholder="Username" id="username" required>
                                    <div class="invalid-feedback"> <?= form_error('username'); ?></div>
                                </div>

                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Password</label>
                                    <div class="input-group has-validation">
                                        <input type="password" placeholder="Password" name="password" class="form-control" id="yourPassword" required>
                                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-eye" id="eye-icon"></i></span>
                                        <div class="invalid-feedback"> <?= form_error('password'); ?></div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Retype Password</label>
                                    <div class="input-group has-validation">
                                        <input type="password" placeholder="Retype password" name="pass_confirm" class="form-control" id="yourPasswordd" required>
                                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-eye" id="eye-iconn"></i></span>
                                        <div class="invalid-feedback"><?= form_error('pass_confirm'); ?></div>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                </div>
                                <div class="col-12">
                                    <p class="small mb-0">Already have an account? <a href="<?= base_url('auth') ?>">Log in</a></p>
                                </div>
                            </form>

                        </div>
                    </div>



                </div>
            </div>
        </div>

    </section>

</div>

<script src="<?= base_url(); ?>assets/vendor/jquery/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $("#eye-icon").click(function() {
            if ($("#yourPassword").prop('type') === 'password') {
                $("#yourPassword").prop('type', 'text');
                $("#eye-icon").removeClass('bi-eye').addClass('bi-eye-slash');
            } else {
                $("#yourPassword").prop('type', 'password');
                $("#eye-icon").removeClass('bi-eye-slash').addClass('bi-eye');
            }
        })
    })
    $(document).ready(function() {
        $("#eye-iconn").click(function() {
            if ($("#yourPasswordd").prop('type') === 'password') {
                $("#yourPasswordd").prop('type', 'text');
                $("#eye-icon").removeClass('bi-eye').addClass('bi-eye-slash');
            } else {
                $("#yourPasswordd").prop('type', 'password');
                $("#eye-iconn").removeClass('bi-eye-slash').addClass('bi-eye');
            }
        })
    })
</script>