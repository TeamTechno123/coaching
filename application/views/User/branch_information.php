<!DOCTYPE html>
<html>
<?php
  $page = "branch_information";
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center mt-2">
            <h1>Branch Information</h1>
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
                <h3 class="card-title">Branch Information</h3>
              </div>
              <form class="input_form" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="card-body row">
                  <div class="form-group col-md-12 select_sm">
                    <label>Select Parent Company</label>
                    <select class="form-control select2" name="company_id" id="company_id" data-placeholder="Select Parent Company" required>
                      <option value="">Select Parent Company</option>
                      <?php if(isset($company_list)){ foreach ($company_list as $list) { ?>
                      <option value="<?php echo $list->company_id; ?>" <?php if(isset($company_id) && $company_id == $list->company_id){ echo 'selected'; } ?>><?php echo $list->company_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Enter Branch Name</label>
                    <input type="text" class="form-control form-control-sm" name="branch_name" id="branch_name" value="<?php if(isset($branch_name)){ echo $branch_name; } ?>" placeholder="Enter Branch Name" required>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Address</label>
                    <textarea class="form-control form-control-sm" rows="3" name="branch_address" id="branch_address" placeholder="Enter Branch Address" required><?php if(isset($branch_address)){ echo $branch_address; } ?></textarea>
                  </div>
                  <div class="form-group col-md-4 select_sm">
                    <label>Select Country</label>
                    <select class="form-control select2" name="country_id" id="country_id" data-placeholder="Select Country" required>
                      <option value="">Select Country</option>
                      <?php if(isset($country_list)){ foreach ($country_list as $list) { ?>
                      <option value="<?php echo $list->country_id; ?>" <?php if(isset($country_id) && $country_id == $list->country_id){ echo 'selected'; } ?>><?php echo $list->country_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4 select_sm">
                    <label>Select State</label>
                    <select class="form-control select2" name="state_id" id="state_id" data-placeholder="Select State" required>
                      <option value="">Select State</option>
                      <?php if(isset($state_list)){ foreach ($state_list as $list) { ?>
                      <option value="<?php echo $list->state_id; ?>" <?php if(isset($state_id) && $state_id == $list->state_id){ echo 'selected'; } ?>><?php echo $list->state_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Statecode</label>
                    <input type="number" class="form-control form-control-sm" name="branch_statecode" id="branch_statecode" value="<?php if(isset($branch_statecode)){ echo $branch_statecode; } ?>" placeholder="Statecode">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Mobile No. 1</label>
                    <input type="number" class="form-control form-control-sm" name="branch_mob1" id="branch_mob1" value="<?php if(isset($branch_mob1)){ echo $branch_mob1; } ?>" placeholder="Mobile No. 1" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Mobile No. 2 / Landline No.</label>
                    <input type="number" class="form-control form-control-sm" name="branch_mob2" id="branch_mob2" value="<?php if(isset($branch_mob2)){ echo $branch_mob2; } ?>" placeholder="Mobile No. 2">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Email Id</label>
                    <input type="email" class="form-control form-control-sm" name="branch_email" id="branch_email" value="<?php if(isset($branch_email)){ echo $branch_email; } ?>" placeholder="Email" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Website</label>
                    <input type="text" class="form-control form-control-sm" name="branch_website" id="branch_website" value="<?php if(isset($branch_website)){ echo $branch_website; } ?>" placeholder="Website">
                  </div>
                  <div class="form-group col-md-6">
                    <label>PAN No.</label>
                    <input type="text" class="form-control form-control-sm" name="branch_pan_no" id="branch_pan_no" value="<?php if(isset($branch_pan_no)){ echo $branch_pan_no; } ?>" placeholder="Pan No.">
                  </div>
                  <div class="form-group col-md-6">
                    <label>GST No.</label>
                    <input type="text" class="form-control form-control-sm" name="branch_gst_no" id="branch_gst_no" value="<?php if(isset($branch_gst_no)){ echo $branch_gst_no; } ?>" placeholder="GST No.">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Enter CIN No.</label>
                    <input type="text" class="form-control form-control-sm" name="branch_cin_no" id="branch_cin_no" value="<?php if(isset($branch_cin_no)){ echo $branch_cin_no; } ?>" placeholder="Enter CIN No.">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Enter IEC Code No.</label>
                    <input type="text" class="form-control form-control-sm" name="branch_iec_no" id="branch_iec_no" value="<?php if(isset($branch_iec_no)){ echo $branch_iec_no; } ?>" placeholder="Enter IEC Code No.">
                  </div>

                  <div class="form-group col-md-6">
                    <label>Bank Name</label>
                    <input type="text" class="form-control form-control-sm" name="branch_bank" id="branch_bank" value="<?php if(isset($branch_bank)){ echo $branch_bank; } ?>" placeholder="Pan No.">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Branch Name</label>
                    <input type="text" class="form-control form-control-sm" name="branch_bank_branch" id="branch_bank_branch" value="<?php if(isset($branch_bank_branch)){ echo $branch_bank_branch; } ?>" placeholder="GST No.">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Bank A/C Number</label>
                    <input type="text" class="form-control form-control-sm" name="branch_bank_acc_no" id="branch_bank_acc_no" value="<?php if(isset($branch_bank_acc_no)){ echo $branch_bank_acc_no; } ?>" placeholder="Enter CIN No.">
                  </div>
                  <div class="form-group col-md-6">
                    <label>IFSC Code</label>
                    <input type="text" class="form-control form-control-sm" name="branch_bank_ifsc" id="branch_bank_ifsc" value="<?php if(isset($branch_bank_ifsc)){ echo $branch_bank_ifsc; } ?>" placeholder="Enter IEC Code No.">
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <?php if(isset($update)){ ?>
                    <button type="submit" class="btn btn-primary">Update Branch</button>
                  <?php }else{ ?>
                    <button type="submit" class="btn btn-success">Create Branch</button>
                  <?php } ?>
                  <a href="<?php echo base_url(); ?>/User/branch_information_list" class="btn btn-default ml-4">Cancel</a>
                </div>
              </form>
            </div>
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>

</body>
</html>
