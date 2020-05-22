<!DOCTYPE html>
<html>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center mt-2">
            <h1>Issue Information</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8 offset-md-2">
            <!-- general form elements -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Add Issue Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post" enctype="multipart/form-data">
                <div class="card-body row">
                  <div class="form-group col-md-6 select_sm">
                    <label>Select Type</label>
                    <select class="form-control select2" name="issue_service_type" id="issue_service_type" data-placeholder="Select Type" required>
                      <option value="">Select Type</option>
                      <option value="Service" <?php if(isset($issue_info) && $issue_info['issue_service_type'] == 'Service' ){ echo 'selected'; } ?>>Service</option>
                      <option value="Product" <?php if(isset($issue_info) && $issue_info['issue_service_type'] == 'Product' ){ echo 'selected'; } ?>>Product</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6 select_sm">
                    <label>Select Service / Product Name</label>
                    <select class="form-control select2" name="service_id" id="service_id" data-placeholder="Select Service / Product Name" required>
                      <option value="">Select Service / Product Name</option>
                      <?php if(isset($service_list)){ foreach ($service_list as $list) { ?>
                      <option value="<?php echo $list->service_id; ?>" <?php if(isset($issue_info) && $issue_info['service_id'] == $list->service_id){ echo 'selected'; } ?>><?php echo $list->service_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Enter Issue Name</label>
                    <input type="text" class="form-control form-control-sm" name="issue_name" id="issue_name" value="<?php if(isset($issue_info)){ echo $issue_info['issue_name']; } ?>" placeholder="Enter Issue Name" required>
                  </div>

                  <div class="form-group col-md-12">
                    <label>Enter Solution Details</label>
                    <textarea class="form-control form-control-sm" name="issue_sol_det" id="issue_sol_det" rows="3" cols="100" placeholder="Enter Solution Details"><?php if(isset($issue_info)){ echo $issue_info['issue_sol_det']; } ?></textarea>
                  </div>

                  <div class="form-group col-md-6">
                    <label>Upload Photo</label>
                    <input type="file" name="issue_image" placeholder="Upload Photo" >
                  </div>
                  <div class="form-group col-md-6">
                    <?php if(isset($issue_info) && $issue_info['issue_image']){ ?>
                      <img width="300px" src="<?php echo base_url(); ?>assets/images/issue/<?php echo $issue_info['issue_image']; ?>" alt="">
                      <input type="hidden" name="old_img" value="<?php echo $issue_info['issue_image']; ?>">
                    <?php } ?>
                  </div>
                </div>
                <div class="card-footer row">
                  <div class="col-md-6">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" name="issue_status" id="issue_status" value="0" <?php if(isset($issue_info) && $issue_info['issue_status'] == '0' ){ echo 'checked'; } ?>>
                      <label for="issue_status" class="custom-control-label">Disable This</label>
                    </div>
                  </div>
                  <div class="col-md-6 text-right">
                    <?php if(isset($update)){ ?>
                      <button id="btn_update" type="submit" class="btn btn-primary">Update </button>
                    <?php } else{ ?>
                      <button id="btn_save" type="submit" class="btn btn-success px-4">Save</button>
                    <?php } ?>
                    <a href="<?php echo base_url() ?>User/issue_information_list" class="btn btn-default ml-4">Cancel</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>

<script type="text/javascript">
// Check Mobile Duplication..
  var issue_name1 = $('#issue_name').val();
  $('#issue_name').on('change',function(){
    var issue_name = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/check_duplication',
      type: 'POST',
      data: {"column_name":"issue_name",
             "column_val":issue_name,
             "table_name":"item_account"},
      context: this,
      success: function(result){
        if(result > 0){
          $('#issue_name').val(issue_name1);
          toastr.error(issue_name+' Account Name Exist.');
        }
      }
    });
  });
</script>
</body>
</html>
