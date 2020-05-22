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
            <h1>Service Contract Information</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-10 offset-md-1">
            <!-- general form elements -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Add Contract Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post">
                <div class="card-body row">
                  <div class="form-group col-md-12 select_sm">
                    <label>Select Type Of Contract</label>
                    <select class="form-control select2" name="contract_type_id" id="contract_type_id" data-placeholder="Select Type Of Contract" required>
                      <option value="">Select Type Of Contract</option>
                      <?php if(isset($contract_type_list)){ foreach ($contract_type_list as $list) { ?>
                      <option value="<?php echo $list->contract_type_id; ?>" <?php if(isset($ser_cont_info) && $ser_cont_info['contract_type_id'] == $list->contract_type_id){ echo 'selected'; } ?>><?php echo $list->contract_type_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>

                  <div class="form-group col-md-12">
                    <label>Enter Service / Project Contract Name</label>
                    <input type="text" class="form-control form-control-sm" name="ser_cont_name" id="ser_cont_name" value="<?php if(isset($ser_cont_info)){ echo $ser_cont_info['ser_cont_name']; } ?>" placeholder="Enter Service / Project Contract Name" required>
                  </div>

                  <div class="form-group col-md-6 select_sm">
                    <label>Service Calls Per Contract </label>
                    <select class="form-control select2" name="ser_cont_calls" id="ser_cont_calls" data-placeholder="Service Calls Per Contract " required>
                      <option value="">Service Calls Per Contract </option>
                      <option <?php if(isset($ser_cont_info) && $ser_cont_info['ser_cont_calls'] == 1){ echo 'selected'; } ?>>1</option>
                      <option <?php if(isset($ser_cont_info) && $ser_cont_info['ser_cont_calls'] == 2){ echo 'selected'; } ?>>2</option>
                      <option <?php if(isset($ser_cont_info) && $ser_cont_info['ser_cont_calls'] == 3){ echo 'selected'; } ?>>3</option>
                      <option <?php if(isset($ser_cont_info) && $ser_cont_info['ser_cont_calls'] == 4){ echo 'selected'; } ?>>4</option>
                      <option <?php if(isset($ser_cont_info) && $ser_cont_info['ser_cont_calls'] == 5){ echo 'selected'; } ?>>5</option>
                    </select>
                  </div>

                  <div class="form-group col-md-6 select_sm">
                    <label>Charges Per Additional Call Request </label>
                    <select class="form-control select2" name="ser_cont_charge" id="ser_cont_charge" data-placeholder="Charges Per Additional Call Request " required>
                      <option value="">Charges Per Additional Call Request </option>
                      <option <?php if(isset($ser_cont_info) && $ser_cont_info['ser_cont_charge'] == 500){ echo 'selected'; } ?>>500</option>
                      <option <?php if(isset($ser_cont_info) && $ser_cont_info['ser_cont_charge'] == 700){ echo 'selected'; } ?>>700</option>
                      <option <?php if(isset($ser_cont_info) && $ser_cont_info['ser_cont_charge'] == 1000){ echo 'selected'; } ?>>1000</option>
                      <option <?php if(isset($ser_cont_info) && $ser_cont_info['ser_cont_charge'] == 1500){ echo 'selected'; } ?>>1500</option>
                      <option <?php if(isset($ser_cont_info) && $ser_cont_info['ser_cont_charge'] == 2000){ echo 'selected'; } ?>>2000</option>
                    </select>
                  </div>


                  <div class="form-group col-md-6 select_sm">
                    <label>Is Travelling Included</label>
                    <select class="form-control select2" name="ser_cont_travel" id="ser_cont_travel" data-placeholder="Is Travelling Included" required>
                      <option value="">Is Travelling Included</option>
                      <option <?php if(isset($ser_cont_info) && $ser_cont_info['ser_cont_travel'] == 'Yes'){ echo 'selected'; } ?>>Yes</option>
                      <option <?php if(isset($ser_cont_info) && $ser_cont_info['ser_cont_travel'] == 'No'){ echo 'selected'; } ?>>No</option>
                    </select>
                  </div>

                  <div class="form-group col-md-6 select_sm">
                    <label>Is Custumization Included </label>
                    <select class="form-control select2" name="ser_cont_custumize" id="ser_cont_custumize" data-placeholder="Is Custumization Included " required>
                      <option value="">Is Custumization Included </option>
                      <option <?php if(isset($ser_cont_info) && $ser_cont_info['ser_cont_custumize'] == 'Yes'){ echo 'selected'; } ?>>Yes</option>
                      <option <?php if(isset($ser_cont_info) && $ser_cont_info['ser_cont_custumize'] == 'No'){ echo 'selected'; } ?>>No</option>
                    </select>
                  </div>

                </div>
                <div class="card-footer row">

                  <div class="col-md-12 text-center">
                    <?php if(isset($update)){ ?>
                      <button id="btn_update" type="submit" class="btn btn-primary">Update </button>
                    <?php } else{ ?>
                      <button id="btn_save" type="submit" class="btn btn-success px-4">Save</button>
                    <?php } ?>
                    <a href="<?php echo base_url() ?>User/contract_information_list" class="btn btn-default ml-4">Cancel</a>
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
