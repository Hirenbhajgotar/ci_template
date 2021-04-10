<section id="contact" class="contact" style="margin-top: 73px;">
    <div class="container">
        <div class="row mt-5 justify-content-center" data-aos="fade-up">
            <div class="text-center">
                <h3><span style="color: #ff5134">Sign Up </span> <span><?= APP_NAME ?></span> For Free </h3>
            </div>
        </div>
        <div class="row mt-5 justify-content-center" data-aos="fade-up">
            <div class="col-lg-6">
                <img src="<?= base_url() ?>assets/frontend/img/general/Add User-pana.svg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6">
                <?php echo validation_errors(); ?>
                <?php echo form_open_multipart('users/register', ['class' => 'php-email-form', 'style' => 'box-shadow: none']); ?>
                <input type="hidden" name="role" value="-1">
                <div class="form-group">
                    <label for="name">Name *</label>
                    <input id="name" type="text" class="form-control " name="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required autocomplete="name" autofocus>

                    <div class="validate"></div>
                </div>
                <div class="form-group">
                    <label for="name">username *</label>
                    <input id="username" type="text" class="form-control " name="username" placeholder="Your Username" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required autocomplete="username" autofocus>

                    <div class="validate"></div>
                </div>
                <div class="form-group">
                    <label for="name">Email *</label>
                    <input id="email" type="email" class="form-control" name="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" required autocomplete="email">
                    <div class="validate"></div>
                </div>

                <div class="form-group">
                    <label for="name">Password *</label>
                    <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="Your Password" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject">
                    <div class="validate"></div>
                </div>
                <div class="form-group">
                    <label for="password2">Confirm Password *</label>
                    <input id="password2" type="password" class="form-control " name="password2" required placeholder="Confirmm Your Password" data-rule="minlen:4" data-msg="Please Confirm your password">
                    <div class="validate"></div>
                </div>
                <div class="form-group">
                    <label for="zipcode">Zipcode</label>
                    <input id="zipcode" type="text" class="form-control " name="zipcode" placeholder="Your Zipcode" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required autocomplete="zipcode" autofocus>

                    <div class="validate"></div>
                </div>
                <div><button type="submit">Register</button></div>
                <?php echo form_close() ?>
            </div>

        </div>

    </div>
</section><!-- End Contact Section -->