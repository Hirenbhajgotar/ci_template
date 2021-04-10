   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/switchery/dist/switchery.min.css">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/assets/pages/advance-elements/css/bootstrap-datetimepicker.css">
   <!-- Date-range picker css  -->
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/bootstrap-daterangepicker/daterangepicker.css" />
   <!-- Date-Dropper css -->
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datedropper/datedropper.min.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/switchery/dist/switchery.min.css" />


   <div class="page-header">
       <div class="page-header-title">
           <h4>Users</h4>
       </div>
       <div class="page-header-breadcrumb">
           <ul class="breadcrumb-title">
               <li class="breadcrumb-item">
                   <a href="index-2.html">
                       <i class="icofont icofont-home"></i>
                   </a>
               </li>
               <li class="breadcrumb-item"><a href="#!">Users</a>
               </li>
               <li class="breadcrumb-item"><a href="#!">Add Users</a>
               </li>
           </ul>
       </div>
   </div>
   <!-- Page header end -->
   <!-- Page body start -->
   <div class="page-body">
       <div class="row">
           <div class="col-sm-12">
               <!-- Basic Form Inputs card start -->
               <div class="card">
                   <div class="card-header">
                       <h5>Add User</h5>
                       <div class="card-header-right">
                           <i class="icofont icofont-rounded-down"></i>
                           <i class="icofont icofont-refresh"></i>
                           <i class="icofont icofont-close-circled"></i>
                       </div>
                   </div>
                   <div class="card-block">
                       <div class="col-sm-8">
                           <div class="validation_errors_alert">

                           </div>
                       </div>
                       <div class="col-sm-12">
                           <table class="table">
                               <thead>
                                   <tr>
                                       <th scope="col">Users</th>
                                       <th scope="col" style="text-align: left;">Create</th>
                                       <th scope="col">View</th>
                                       <th scope="col">Update</th>
                                       <th scope="col">Delete</th>
                                       <th scope="col">action</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   <?php foreach ($permisions as $permision) { ?>
                                       <tr>
                                           <?php echo form_open_multipart('administrator/update-permision/'. $permision->id); ?>
                                           <th scope="row">

                                               <?php $admin_name = $this->Administrator_Model->get_user_role_name($permision->admin_type); ?>
                                               <?= $admin_name->name ?>
                                           </th>
                                           <td>
                                               <div class="form-check form-check-inline">
                                                   <input class="form-check-input" type="checkbox" <?= $permision->creat == 1 ? 'checked' : '' ?> name="creat" id="inlineCheckbox1">
                                                   <!-- <label class="form-check-label" for="inlineCheckbox1">1</label> -->
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-check form-check-inline">
                                                   <input class="form-check-input" type="checkbox" <?= $permision->view == 1 ? 'checked' : '' ?> name="view" id="inlineCheckbox1">
                                                   <!-- <label class="form-check-label" for="inlineCheckbox1">1</label> -->
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-check form-check-inline">
                                                   <input class="form-check-input" type="checkbox" <?= $permision->edit == 1 ? 'checked' : '' ?> name="edit" id="inlineCheckbox1">
                                                   <!-- <label class="form-check-label" for="inlineCheckbox1">1</label> -->
                                               </div>
                                           </td>
                                           <td>
                                               <div class="form-check form-check-inline">
                                                   <input class="form-check-input" type="checkbox" <?= $permision->remove == 1 ? 'checked' : '' ?> name="remove" id="inlineCheckbox1">
                                                   <!-- <label class="form-check-label" for="inlineCheckbox1">1</label> -->
                                               </div>
                                           </td>
                                           <td>
                                               <button type="submit" class="btn btn-success btn-sm">Update</button>
                                           </td>
                                           </form>
                                       </tr>
                                   <?php } ?>
                               </tbody>
                           </table>
                       </div>

                   </div>
               </div>
           </div>
           <!-- Basic Form Inputs card end -->


           <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/switchery/dist/switchery.min.js"></script>
           <!-- Custom js -->
           <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/pages/advance-elements/swithces.js"></script>
           <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/pages/advance-elements/moment-with-locales.min.js"></script>
           <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
           <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/assets/pages/advance-elements/bootstrap-datetimepicker.min.js"></script>
           <!-- Date-range picker js -->
           <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
           <!-- Date-dropper js -->
           <script type="text/javascript" src="<?php echo base_url(); ?>admintemplate/bower_components/datedropper/datedropper.min.js"></script>


           <!-- ck editor -->
           <script src="<?php echo base_url(); ?>admintemplate/bower_components/ckeditor/ckeditor.js"></script>
           <!-- echart js -->

           <script src="<?php echo base_url(); ?>admintemplate/assets/pages/user-profile.js"></script>