<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <!-- <div class="container">
            <h2>Contact Us</h2>
            <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
        </div> -->
    </div>
    <!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="row mt-5">
                <div class="col-lg-12 mt-5 mt-lg-0">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover">
                                <div class='mb-3 text-right'>
                                    <a href="<?= base_url('upload-xlsx') ?>" class="btn btn-warning">Upload Xlsx</a>
                                </div>
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($xls_list) {
                                        $count = 1;
                                        foreach ($xls_list as $item) { ?>
                                            <tr>
                                                <?php $vendor = $this->User_Model->get_user($item->vendor_id); ?>
                                                <th scope="row"><?= $count ?></th>
                                                <td><?= $item->file_name ?></td>
                                                <td><?= $vendor->username ?></td>
                                                <td><?= date('d-m-Y h:i', strtotime($item->created_at)) ?></td>
                                            </tr>
                                        <?php $count++;
                                        }
                                    } else { ?>
                                        <tr>
                                            <td colspan="4" style="text-align: center;">No Records Found</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php if ($xls_list) { ?>
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