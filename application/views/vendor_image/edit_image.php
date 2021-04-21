<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2><?= $title ?></h2>
        </div>
    </div><!-- End Breadcrumbs -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact" style="height: 65vh;">
        <div class="container" data-aos="fade-up">
            <div class="row mt-5">
                <div class="col-md-12">
                    <?php $this->view('component/flash_msg'); ?>
                </div>
                <div class="col-lg-10 mt-5 mt-lg-0">

                    <?php echo form_open_multipart('update-image/' . $vendor_image->id, ['class' => 'php-email-form']); ?>
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <img src="<?= base_url(VENDOR_IMAGE . $this->session->vendor_username . '/' . $vendor_image->thumb_image) ?>" class="img-responsive" alt="">
                        </div>
                    </div>

                    <div class=""><button type="submit">Submit</button></div>
                    </form>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->
</main>