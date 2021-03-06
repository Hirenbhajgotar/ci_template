     <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/css/buttons.dataTables.min.css">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/ekko-lightbox/dist/ekko-lightbox.css">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/lightbox2/dist/css/lightbox.css">

     <script type="text/javascript">
         $(document).ready(function() {
             $(".delete").click(function(e) {
                 alert('as');
                 $this = $(this);
                 e.preventDefault();
                 var url = $(this).attr("href");
                 $.get(url, function(r) {
                     if (r.success) {
                         $this.closest("tr").remove();
                     }
                 })
             });
         });
         $(document).ready(function() {
             $(".enable").click(function(e) {
                 alert('as');
                 $this = $(this);
                 e.preventDefault();
                 var url = $(this).attr("href");
                 $.get(url, function(r) {
                     if (r.success) {
                         $this.closest("tr").remove();
                     }
                 })
             });
         });
         $(document).ready(function() {
             $(".desable").click(function(e) {
                 alert('as');
                 $this = $(this);
                 e.preventDefault();
                 var url = $(this).attr("href");
                 $.get(url, function(r) {
                     if (r.success) {
                         $this.closest("tr").remove();
                     }
                 })
             });
         });
     </script>



     <div class="page-header">
         <div class="page-header-title">
             <h4>List FAQ Category</h4>
         </div>
         <div class="page-header-breadcrumb">
             <ul class="breadcrumb-title">
                 <li class="breadcrumb-item">
                     <a href="index-2.html">
                         <i class="icofont icofont-home"></i>
                     </a>
                 </li>
                 <li class="breadcrumb-item"><a href="#!">FAQ</a>
                 </li>
                 <li class="breadcrumb-item"><a href="#!">List FAQ</a>
                 </li>
             </ul>
         </div>
     </div>

     <!-- Page-header end -->
     <!-- Page-body start -->
     <div class="page-body">
         <!-- DOM/Jquery table start -->

         <div class="card">
             <div class="card-block">
                 <div class="table-responsive dt-responsive">
                     <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                         <thead>
                             <tr>
                                 <th>Id</th>
                                 <th>Name</th>
                                 <th>status</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php foreach ($faq_categories as $post) : ?>
                                 <tr>
                                     <td><?php echo $post['id']; ?></td>
                                     <td><a href=""><?php echo $post['name']; ?></a></td>
                                     <td><?php if ($post['status'] == 1) {
                                                echo 'active';
                                            } else {
                                                echo 'Inactive';
                                            } ?></td>
                                     <td>
                                         <?php if ($post['status'] == 1) { ?>
                                             <a class="label label-inverse-primary enable" href='<?php echo base_url(); ?>administrator/enable/<?php echo $post['id']; ?>?table=<?php echo base64_encode('categories'); ?>'>Enabled</a>
                                         <?php } else { ?>
                                             <a class="label label-inverse-warning desable" href='<?php echo base_url(); ?>administrator/desable/<?php echo $post['id']; ?>?table=<?php echo base64_encode('categories'); ?>'>Desabled</a>
                                         <?php } ?>
                                         <?php if (isset($this->permision->creat) && $this->permision->edit == 1) { ?>
                                             <a class="label label-inverse-info" href='<?php echo base_url(); ?>administrator/faq-categories/update/<?php echo $post['id']; ?>'>Edit</a>
                                         <?php } ?>
                                         <?php if (isset($this->permision->creat) && $this->permision->remove == 1) { ?>
                                             <a class="label label-inverse-danger delete" href='<?php echo base_url(); ?>administrator/delete/<?php echo $post['id']; ?>?table=<?php echo base64_encode('categories'); ?>'>Delete</a>
                                         <?php } ?>

                                     </td>
                                 </tr>
                             <?php endforeach; ?>

                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
         <!-- DOM/Jquery table end -->
     </div>