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
                    <?php if ($this->session->flashdata('msg')) { ?>
                        <div class="alert alert-<?= $this->session->flashdata('type') ?> alert-dismissible fade show" role="alert">
                            <?php
                            if (is_array($this->session->flashdata('msg'))) {
                                foreach ($this->session->flashdata('msg') as $msg_item) {
                                    echo $msg_item;
                                }
                            } else {
                                echo $this->session->flashdata('msg');
                            }
                            ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-lg-10 mt-5 mt-lg-0">

                    <?php echo form_open_multipart('upload-image/post', ['class' => 'php-email-form']); ?>
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <div class="custom-file">
                                <input type="file" name="image[]" class="custom-file-input" id="customFile" multiple>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>

                    <div class=""><button type="submit">Submit</button></div>
                    </form>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->
</main>