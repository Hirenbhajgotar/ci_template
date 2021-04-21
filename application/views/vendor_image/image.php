<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2><?= $title ?></h2>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="row mt-5">
                <div class="col-lg-12 mt-5 mt-lg-0">
                    <?php $this->view('component/flash_msg'); ?>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover">
                                <div class='mb-3 text-right'>
                                    <a href="<?= base_url('upload-image') ?>" class="btn btn-warning">Upload Image</a>
                                </div>
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col" style="width: 12vw;">Image</th>
                                        <th scope="col " style="text-align: center;">Date</th>
                                        <th scope="col" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($images) {
                                        $count = isset($_GET['per_page']) && $_GET['per_page'] ? $_GET['per_page'] : 0;
                                        foreach ($images as $item) {
                                            $count++; ?>
                                            <tr>
                                                <th scope="row"><?= $count ?></th>
                                                <td>
                                                    <?php
                                                    if ($item->main_image && file_exists(VENDOR_IMAGE . $this->session->vendor_username . '/' . $item->main_image)) { ?>
                                                        <img src="<?= base_url(VENDOR_IMAGE . $this->session->vendor_username . '/' . $item->thumb_image) ?>" alt="">
                                                        <!-- <img src="<?= base_url('assets/frontend/img/general/404 Error-rafiki.svg') ?>" alt=""> -->
                                                    <?php } else { ?>
                                                        <img src="<?= base_url('assets/frontend/img/general/404 Error-rafiki.svg') ?>" alt="">
                                                    <?php }
                                                    ?>
                                                </td>
                                                <td style="text-align: center;"><?= date('d-m-Y h:i', strtotime($item->created_at)) ?></td>
                                                <td style="text-align: center;">
                                                    <!-- <button type="button" class="btn btn-warning btn-sm"><i class="ri-pencil-line"></i></button> -->
                                                    <button type="button" onclick="deleteImage(<?= $item->id ?>)" class="btn btn-danger btn-sm"><i class="ri-delete-bin-6-line"></i></button>
                                                    <a href="<?= base_url('edit-image/'. $item->id) ?>" class="btn btn-warning btn-sm"><i class="ri-pencil-line"></i></i></a>
                                                </td>
                                            </tr>
                                        <?php

                                        }
                                    } else { ?>
                                        <tr>
                                            <td colspan="4" style="text-align: center;">Record Not Found</td>
                                        </tr>
                                    <?php }
                                    ?>

                                </tbody>

                            </table>
                            <?php if ($images) { ?>
                                <nav>
                                    <?php echo $this->pagination->create_links(); ?>
                                </nav>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<script>
    function deleteImage(id) {
        if (confirm("Are you sure to delete this item?")) {
            window.location.href = "<?= base_url('delete-image/') ?>" + id
        }
    }
</script>