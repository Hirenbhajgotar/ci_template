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