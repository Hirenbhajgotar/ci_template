<section id="contact" class="contact" style="margin-top: 73px">
    <div class="container">
        <div class="row mt-5 justify-content-center" data-aos="fade-up">
            <div class="text-center">
                <h3><span style="color: #ff5134">Sign In</span><span> <?php echo APP_NAME ?></span> </h3>
            </div>
        </div>
        <div class="row mt-5 justify-content-center" data-aos="fade-up">
            <div class="col-lg-4">
                <!-- <img src="{{ asset('asset/frontend/img/general/undraw_access_account_99n5.svg') }} " class="img-fluid" alt=""> -->
                <img src="<?= base_url() ?>assets/frontend/img/general/Login-cuate.svg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6">
                <?php echo validation_errors(); ?>
                <?php echo form_open('users/login', ['class' => 'php-email-form']); ?>
                <div class="form-group">
                    <label for="username">Username *</label>
                    <input id="username" type="text" class="form-control" name="username" placeholder="Your Username" data-rule="minlen:4" required autocomplete="email" autofocus>
                    <?= form_error('username') ?>
                </div>
                <div class="form-group">
                    <label for="name">Password *</label>
                    <input id="password" type="password" class="form-control " name="password" required autocomplete="new-password" placeholder="Your Password" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject">
                    <?= form_error('password') ?>
                </div>


                <div><button type="submit">Sign In</button></div>
                <?php echo form_close() ?>
            </div>

        </div>

    </div>
</section><!-- End Contact Section -->