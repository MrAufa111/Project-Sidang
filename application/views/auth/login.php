<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="swal" data-swal="<?= $this->session->flashdata('notif'); ?>"></div>
<div class="swal-error" data-swalerror="<?= $this->session->flashdata('error'); ?>"></div>
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="<?= base_url("auth"); ?>" class="h1"><b>Login</b></a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <div class="swal" data-swal="<?= $this->session->flashdata('notif'); ?>"></div>
            <div class="swal-error" data-swalerror="<?= $this->session->flashdata('error'); ?>"></div>
            <form action="<?= base_url('auth'); ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" name="username" class="form-control <?= form_error('username') ? 'is-invalid' : ''; ?>" placeholder="Username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        <?= form_error('username'); ?>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control <?= form_error('username') ? 'is-invalid' : ''; ?>" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        <?= form_error('username'); ?>
                    </div>
                </div>
                <div class="">
                    <div class="g-recaptcha" data-sitekey="6LfDqDwoAAAAAMlOQrdYi8EJzyIHQJrjBQO91RUH"></div>
                </div>
                <div class="justify-content-end align-items-end d-flex mt-2">
                    <button class="btn btn-primary">Login</button>
                </div>
            </form>

            <!-- /.social-auth-links -->
            <hr>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box --