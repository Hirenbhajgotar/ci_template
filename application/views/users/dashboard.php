<style>
    .shadow,
    .card-profile-image img {
        box-shadow: 0 0 2rem 0 rgba(136, 152, 170, .15) !important;
    }

    .card-profile-image {
        position: relative;
    }

    .card-profile-image img {
        position: absolute;
        left: 50%;
        max-width: 180px;
        transition: all .15s ease;
        transform: translate(-50%, -30%);
        border-radius: .375rem;
    }

    .card-profile-image img:hover {
        transform: translate(-50%, -33%);
    }

    .card-profile-stats {
        padding: 1rem 0;
    }

    .card-profile-stats>div {
        margin-right: 1rem;
        padding: .875rem;
        text-align: center;
    }

    .card-profile-stats>div:last-child {
        margin-right: 0;
    }

    .card-profile-stats>div .heading {
        font-size: 1.1rem;
        font-weight: bold;
        display: block;
    }

    .card-profile-stats>div .description {
        font-size: .875rem;
        color: #adb5bd;
    }

    .heading {
        font-size: .95rem;
        font-weight: 600;
        letter-spacing: .025em;
        text-transform: uppercase;
    }

    .card-profile-stats>div .heading {
        font-size: 1.1rem;
        font-weight: bold;
        display: block;
    }

    .card-profile-stats>div .description {
        font-size: .875rem;
        color: #adb5bd;
    }

    .description {
        font-size: .875rem;
    }

    .main-content .navbar-top {
        position: absolute;
        z-index: 1;
        top: 0;
        left: 0;
        width: 100%;
        padding-right: 0 !important;
        padding-left: 0 !important;
        background-color: transparent;
    }

    @media (min-width: 768px) {
        .main-content .container-fluid {
            padding-right: 39px !important;
            padding-left: 39px !important;
        }
    }

    .focused .input-group-alternative {
        box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08) !important;
    }

    .focused .input-group {
        box-shadow: none;
    }

    .focused .input-group-text {
        color: #8898aa;
        border-color: rgba(50, 151, 211, .25);
        background-color: #fff;
    }

    .focused .form-control {
        border-color: rgba(50, 151, 211, .25);
    }

    .form-control-alternative {
        transition: box-shadow .15s ease;
        border: 0;
        box-shadow: 0 1px 3px rgba(50, 50, 93, .15), 0 1px 0 rgba(0, 0, 0, .02);
    }

    .form-control-alternative:focus {
        box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
    }

    .heading-small {
        font-size: .75rem;
        padding-top: .25rem;
        padding-bottom: .25rem;
        letter-spacing: .04em;
        text-transform: uppercase;
    }

    .form-control-label {
        font-size: .875rem;
        font-weight: 600;
        color: #525f7f;
    }
</style>
<div class="main-content" style="margin-top:160px">
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2_ mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="<?= base_url('users/dashboard') ?>">
                                    <div class="mt-2" x-show="! photoPreview">
                                        <img src="<?= base_url('assets/frontend/img/general/undraw_profile.svg') ?>" style="width: 115px;" alt="" class="rounded-circle rounded-full h-20 w-20 object-cover">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <!-- <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                            <a href="#" class="btn btn-sm btn-default float-right">Message</a>
                        </div> -->
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    <!-- <div>
                                        <span class="heading">22</span>
                                        <span class="description">Friends</span>
                                    </div>
                                    <div>
                                        <span class="heading">10</span>
                                        <span class="description">Photos</span>
                                    </div>
                                    <div>
                                        <span class="heading">89</span>
                                        <span class="description">Comments</span>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h2><?= $this->session->username ?></h2>

                            <div class=' font-weight-300' style="margin-top: 20px;">
                                195, Abdul Sattar Bldg, Opp Grant Rly Station, Grant Road, Mumbai, Maharashtra.
                            </div>
                            <!-- <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>Bucharest, Romania
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>University of Computer Science
                            </div> -->
                            <hr class="my-4">
                            Welcome to <?= APP_NAME ?>, your number one source for all things [product, ie: shoes, bags, dog treats]. We're dedicated to giving you the very best of [product], with a focus on [three characteristics, ie: dependability, customer service and uniqueness.]
                            Founded in [year] by [founder's name], [store name] has come a long way from its beginnings in a [starting location, ie: home office, toolshed, Houston, TX.]. When [store founder] first started out, his/her passion for [passion of founder, ie: helping other parents be more eco-friendly, providing the best equipment for his fellow musicians] drove him to [action, ie: do intense research, quit her day job], and gave him the impetus to turn hard work and inspiration into to a booming online store. We now serve customers all over [place, ie: the US, the world, the Austin area], and are thrilled to be a part of the [adjective, ie: quirky, eco-friendly, fair trade] wing of the [industry type, ie: fashion, baked goods, watches] industry.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="contact">
                    <?php echo form_open_multipart('', ['class' => 'php-email-form', 'style' => 'box-shadow: none']); ?>
                    <input type="hidden" name="role" value="-1">
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input id="name" type="text" class="form-control" value="<?= isset($user->name) && $user->name ? $user->name : '' ?>" name="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required autocomplete="name" autofocus>

                        <div class="validate"></div>
                    </div>
                    <div class="form-group">
                        <label for="name">username *</label>
                        <input id="username" type="text" class="form-control " value="<?= isset($user->username) && $user->username ? $user->username : '' ?>" name="username" placeholder="Your Username" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required autocomplete="username" autofocus>

                        <div class="validate"></div>
                    </div>
                    <div class="form-group">
                        <label for="name">Email *</label>
                        <input id="email" type="email" class="form-control" value="<?= isset($user->email) && $user->email ? $user->email : '' ?>" name="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" required autocomplete="email">
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
                        <input id="zipcode" type="text" class="form-control " value="<?= isset($user->zipcode) && $user->zipcode ? $user->zipcode : '' ?>" name="zipcode" placeholder="Your Zipcode" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required autocomplete="zipcode" autofocus>

                        <div class="validate"></div>
                    </div>
                    <div><button type="submit">Register</button></div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>