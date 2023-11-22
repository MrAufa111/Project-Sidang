<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="swal" data-swal="<?= $this->session->flashdata('notif'); ?>"></div>
<div class="swal-error" data-swalerror="<?= $this->session->flashdata('error'); ?>"></div>

<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="<?= base_url() ?>" class="logo d-flex align-items-center w-auto">
                                <img src="<?= base_url() ?>assets/img/Asset 14.png" alt="">
                                <span class="d-none d-lg-block">SIMPEL</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                    <p class="text-center small">Enter your username & password to login</p>
                                </div>

                                <form class="row g-3 needs-validation" action="<?= base_url('auth'); ?>" method="post">

                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Username</label>
                                        <div class="input-group has-validation">
                                            <input type="text" name="username" class="form-control <?= form_error('username') ? 'is-invalid' : ''; ?>" placeholder="Username" id="yourUsername" required>
                                            <div class="invalid-feedback"><?= form_error('username'); ?></div>
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <div class="input-group has-validation">
                                            <input type="password" name="password" class="form-control <?= form_error('username') ? 'is-invalid' : ''; ?>" placeholder="Password" id="yourPassword" required>
                                            <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-eye" id="eye-icon"></i></span>
                                            <div class="invalid-feedback"><?= form_error('password'); ?></div>
                                        </div>
                                        <!-- <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="yourPassword" required>
                                        <div class="invalid-feedback">Please enter your password!</div> -->
                                    </div>
                                    <div class="col-12">
                                        <div class="g-recaptcha" data-sitekey="6LfDqDwoAAAAAMlOQrdYi8EJzyIHQJrjBQO91RUH" style="transform:scale(1.2);-webkit-transform:scale(1.22);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <button class="btn btn-primary w-100" type="submit">Login</button>
                                    </div>
                                    <div class="col-12">
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->

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
</script>