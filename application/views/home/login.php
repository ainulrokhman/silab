<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">LABORATORIUM!</h1>
                                </div>
                                <?= $this->session->flashdata('pesan'); ?>
                                <form method="post" action="" class="user">
                                    <div class="form-group">
                                        <input type="text" name="user" class="form-control form-control-user" placeholder="Username">
                                        <?php echo form_error('user', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                                        <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="">Lupa password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('registrasi'); ?>">Sign Up?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>