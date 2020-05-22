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
            <h1>Party Information</h1>
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
                <h3 class="card-title">
                  <?php if(isset($party_info)){ echo 'Edit Party'; }
                  else{ echo 'Add Party'; } ?>
                </h3>
              </div>
              <form id="form_action" role="form" action="" method="post" autocomplete="off">
                <div class="card-body row">
                  <div class="form-group col-md-12 select_sm">
                    <label>Select Branch</label>
                    <select class="form-control select2" name="branch_id" id="branch_id" data-placeholder="Select Branch" required>
                      <option value="">Select Branch</option>
                      <?php if(isset($branch_list)){ foreach ($branch_list as $list) { ?>
                      <option value="<?php echo $list->branch_id; ?>" <?php if(isset($party_info) && $party_info['branch_id'] == $list->branch_id){ echo 'selected'; } ?>><?php echo $list->branch_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-3 select_sm">
                    <label>Select Party Type</label>
                    <select class="form-control select2" name="party_type" id="party_type" data-placeholder="Select Party Type" required>
                      <option value="">Select Party Type</option>
                      <?php if(isset($party_type_list)){ foreach ($party_type_list as $list) { ?>
                      <option value="<?php echo $list->party_type_name; ?>" <?php if(isset($party_info) && $party_info['party_type'] == $list->party_type_name){ echo 'selected'; } ?>><?php echo $list->party_type_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-9">
                    <label>Enter Name of Party</label>
                    <input type="text" class="form-control form-control-sm " name="party_name" id="party_name" value="<?php if(isset($party_info)){ echo $party_info['party_name']; } ?>" placeholder="Enter Name of Party" required>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Enter Address</label>
                    <textarea class="form-control form-control-sm" name="party_address" id="party_address" rows="3" cols="100" placeholder="Enter Address"><?php if(isset($party_info)){ echo $party_info['party_address']; } ?></textarea>
                  </div>
                  <div class="form-group col-md-4 select_sm">
                    <label>Select Country</label>
                    <select class="form-control select2" name="country_id" id="country_id" data-placeholder="Select Country" required>
                      <option value="">Select Country</option>
                      <?php if(isset($country_list)){ foreach ($country_list as $list) { ?>
                      <option value="<?php echo $list->country_id; ?>" <?php if(isset($party_info) && $party_info['country_id'] == $list->country_id){ echo 'selected'; } ?>><?php echo $list->country_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4 select_sm">
                    <label>Select State</label>
                    <select class="form-control select2" name="state_id" id="state_id" data-placeholder="Select State" required>
                      <option value="">Select State</option>
                      <?php if(isset($state_list)){ foreach ($state_list as $list) { ?>
                      <option value="<?php echo $list->state_id; ?>" <?php if(isset($party_info) && $party_info['state_id'] == $list->state_id){ echo 'selected'; } ?>><?php echo $list->state_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4 select_sm">
                    <label>Select City</label>
                    <select class="form-control select2" name="district_id" id="district_id" data-placeholder="Select City" required>
                      <option value="">Select City</option>
                      <?php if(isset($district_list)){ foreach ($district_list as $list) { ?>
                      <option value="<?php echo $list->district_id; ?>" <?php if(isset($party_info) && $party_info['district_id'] == $list->district_id){ echo 'selected'; } ?>><?php echo $list->district_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Mobile No. 1</label>
                    <input type="number" class="form-control form-control-sm" name="party_mobile1" id="party_mobile1" value="<?php if(isset($party_info)){ echo $party_info['party_mobile1']; } ?>" placeholder="Mobile No. 1" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Mobile No. 2 </label>
                    <input type="number" class="form-control form-control-sm" name="party_mobile2" id="party_mobile2" value="<?php if(isset($party_info)){ echo $party_info['party_mobile2']; } ?>" placeholder="Mobile No. 2">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Email Id</label>
                    <input type="email" class="form-control form-control-sm" name="party_email" id="party_email" value="<?php if(isset($party_info)){ echo $party_info['party_email']; } ?>" placeholder="Email" >
                  </div>
                  <div class="form-group col-md-6">
                    <label>Contact Person Name</label>
                    <input type="text" class="form-control form-control-sm" name="party_con_person" id="party_con_person" value="<?php if(isset($party_info)){ echo $party_info['party_con_person']; } ?>" placeholder="Contact Person Name">
                  </div>
                  <div class="form-group col-md-6">
                    <label>PAN No.</label>
                    <input type="text" class="form-control form-control-sm" name="party_pan_no" id="party_pan_no" value="<?php if(isset($party_info)){ echo $party_info['party_pan_no']; } ?>" placeholder="PAN No." >
                  </div>
                  <div class="form-group col-md-6">
                    <label>GST No.</label>
                    <input type="text" class="form-control form-control-sm" name="party_gst_no" id="party_gst_no" value="<?php if(isset($party_info)){ echo $party_info['party_gst_no']; } ?>" placeholder="GST No.">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Date Of Birth</label>
                    <input type="text" class="form-control form-control-sm" name="party_dob" value="<?php if(isset($party_info)){ echo $party_info['party_dob']; } ?>" id="date1" data-target="#date1" data-toggle="datetimepicker" placeholder="Date Of Birth" >
                  </div>
                  <div class="form-group col-md-6">
                    <label>Anniversary On</label>
                    <input type="text" class="form-control form-control-sm" name="party_anniversary" value="<?php if(isset($party_info)){ echo $party_info['party_anniversary']; } ?>" id="date2" data-target="#date2" data-toggle="datetimepicker" placeholder="Anniversary On">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Bank Name</label>
                    <input type="text" class="form-control form-control-sm" name="party_bank" id="party_bank" value="<?php if(isset($party_info)){ echo $party_info['party_bank']; } ?>" placeholder="Bank Name">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Account No.</label>
                    <input type="text" class="form-control form-control-sm" name="party_account_no" id="party_account_no" value="<?php if(isset($party_info)){ echo $party_info['party_account_no']; } ?>" placeholder="Account No.">
                  </div>
                  <div class="form-group col-md-4">
                    <label>IFSC Code</label>
                    <input type="text" class="form-control form-control-sm" name="party_ifsc_code" id="party_ifsc_code" value="<?php if(isset($party_info)){ echo $party_info['party_ifsc_code']; } ?>" placeholder="IFSC Code">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Credit Limit On </label>
                    <input type="number" class="form-control form-control-sm" name="party_credit_limit" id="party_credit_limit" value="<?php if(isset($party_info)){ echo $party_info['party_credit_limit']; } ?>" placeholder="Credit Limit On">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Bill Limit On </label>
                    <input type="number" class="form-control form-control-sm" name="party_bill_limit" id="party_bill_limit" value="<?php if(isset($party_info)){ echo $party_info['party_bill_limit']; } ?>" placeholder="Bill Limit On">
                  </div>
                  <div class="form-group col-md-4">
                    <label>pyment Terms </label>
                    <input type="text" class="form-control form-control-sm" name="party_pay_terms" id="party_pay_terms" value="<?php if(isset($party_info)){ echo $party_info['party_pay_terms']; } ?>" placeholder="pyment Terms">
                  </div>
                  <div class="form-group col-md-6">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" name="party_status" id="party_status" value="0" <?php if(isset($party_info) && $party_info['party_status'] == '0' ){ echo 'checked'; } ?>>
                      <label for="party_status" class="custom-control-label">Disable This Party</label>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer ">
                  <?php if(isset($party_info)){ ?>
                    <button id="btn_update" type="submit" class="btn btn-primary">Update </button>
                  <?php } else{ ?>
                    <button id="btn_save" type="submit" class="btn btn-success px-4">Save</button>
                  <?php } ?>
                  <a href="<?php echo base_url() ?>User/dashboard" class="btn btn-default ml-4">Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>

<script type="text/javascript">
// Check Mobile Duplication..
  var party_mobile11 = $('#party_mobile1').val();
  $('#party_mobile1').on('change',function(){
    var party_mobile1 = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/check_duplication',
      type: 'POST',
      data: {"column_name":"party_mobile1",
             "column_val":party_mobile1,
             "table_name":"party"},
      context: this,
      success: function(result){
        if(result > 0){
          $('#party_mobile1').val(party_mobile11);
          toastr.error(party_mobile1+' Mobile No Exist.');
        }
      }
    });
  });

// Check Email Duplication..
  var party_email1 = $('#mobile').val();
  $('#party_email').on('change',function(){
    var party_email = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/check_duplication',
      type: 'POST',
      data: {"column_name":"party_email",
             "column_val":party_email,
             "table_name":"party"},
      context: this,
      success: function(result){
        if(result > 0){
          $('#party_email').val(party_email1);
          toastr.error(party_email+' Email Id Exist.');
        }
      }
    });
  });
</script>



</body>
</html>
