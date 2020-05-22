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
            <h1>Service Information</h1>
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
                <h3 class="card-title">Add Service Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post">
                <div class="card-body row">
                  <div class="form-group col-md-12 select_sm">
                    <label>Select Type</label>
                    <select class="form-control select2" name="service_type" id="service_type" data-placeholder="Select Type" required>
                      <option value="">Select Type</option>
                      <option value="Service" <?php if(isset($service_type) && $service_type == 'Service' ){ echo 'selected'; } ?>>Service</option>
                      <option value="Product" <?php if(isset($service_type) && $service_type == 'Product' ){ echo 'selected'; } ?>>Product</option>
                    </select>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Enter Service / Product Name</label>
                    <input type="text" class="form-control form-control-sm" name="service_name" id="service_name" value="<?php if(isset($service_name)){ echo $service_name; } ?>" placeholder="Enter Service / Product Name" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Enter Short Name</label>
                    <input type="text" class="form-control form-control-sm" name="service_short_name" id="service_short_name" value="<?php if(isset($service_short_name)){ echo $service_short_name; } ?>" placeholder="Enter Short Name" required>
                  </div>

                  <div class="form-group col-md-6">
                    <label>Enter HSN Code</label>
                    <input type="text" class="form-control form-control-sm" name="service_hsn_code" id="service_hsn_code" value="<?php if(isset($service_hsn_code)){ echo $service_hsn_code; } ?>" placeholder="Enter HSN Code" required>
                  </div>

                  <div class="form-group col-md-6 select_sm">
                    <label>Select GST %</label>
                    <select class="form-control select2" name="gst_rate" id="gst_rate" data-placeholder="Select GST %" required>
                      <option value="">Select GST %</option>
                      <?php if(isset($gst_list)){ foreach ($gst_list as $list) { ?>
                      <option value="<?php echo $list->gst_rate; ?>" <?php if(isset($gst_rate) && $gst_rate == $list->gst_rate){ echo 'selected'; } ?>><?php echo $list->gst_title; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6 select_sm">
                    <label>Select Unit</label>
                    <select class="form-control select2" name="service_unit" id="service_unit" data-placeholder="Select Unit" required>
                      <option value="">Select Unit</option>
                      <?php if(isset($unit_list)){ foreach ($unit_list as $list) { ?>
                      <option value="<?php echo $list->unit_name; ?>" <?php if(isset($service_unit) && $service_unit == $list->unit_name){ echo 'selected'; } ?>><?php echo $list->unit_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label>MRP</label>
                    <input type="number" class="form-control form-control-sm" name="service_mrp" id="service_mrp" value="<?php if(isset($service_mrp)){ echo $service_mrp; } ?>" placeholder="MRP" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Sale Rate</label>
                    <input type="number" class="form-control form-control-sm" name="service_rate" id="service_rate" value="<?php if(isset($service_rate)){ echo $service_rate; } ?>" placeholder="Sale Rate" required>
                  </div>

                  <div class="form-group col-md-6">
                    <label>Min Rate</label>
                    <input type="number" class="form-control form-control-sm" name="service_min_rate" id="service_min_rate" value="<?php if(isset($service_min_rate)){ echo $service_min_rate; } ?>" placeholder="Min Rate" required>
                  </div>

                  <div class="form-group col-md-6">
                    <label>Max Rate</label>
                    <input type="number" class="form-control form-control-sm" name="service_max_rate" id="service_max_rate" value="<?php if(isset($service_max_rate)){ echo $service_max_rate; } ?>" placeholder="Max Rate" required>
                  </div>

                  <div class="form-group col-md-6">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" name="service_stock_req" id="service_stock_req" value="1" <?php if(isset($service_stock_req) && $service_stock_req ==1){ echo 'checked'; } ?>>
                      <label for="service_stock_req" class="custom-control-label">Does This Item requires Stock </label>
                    </div>
                  </div>
                  <div class="col-md-6"></div>

                  <div class="form-group col-md-6">
                    <label>Opening Stock</label>
                    <input type="number" class="form-control form-control-sm" name="service_opening_stock" id="service_opening_stock" value="<?php if(isset($service_opening_stock)){ echo $service_opening_stock; } ?>" placeholder="Opening Stock" readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Opening Stock Valuation</label>
                    <input type="number" class="form-control form-control-sm" name="service_opening_stock_val" id="service_opening_stock_val" value="<?php if(isset($service_opening_stock_val)){ echo $service_opening_stock_val; } ?>" placeholder="Opening Stock Valuation" readonly>
                  </div>

                  <div class="form-group col-md-6 select_sm">
                    <label>Service Alert Every </label>
                    <select class="form-control select2" name="service_alert_days" id="service_alert_days" data-placeholder="Service Alert Every " required>
                      <option value="">Service Alert Every </option>
                      <option value="15" <?php if(isset($service_alert_days) && $service_alert_days == '15' ){ echo 'selected'; } ?>>15 Days</option>
                      <option value="30" <?php if(isset($service_alert_days) && $service_alert_days == '30' ){ echo 'selected'; } ?>>30 Days</option>
                      <option value="60" <?php if(isset($service_alert_days) && $service_alert_days == '60' ){ echo 'selected'; } ?>>60 Days</option>
                      <option value="90" <?php if(isset($service_alert_days) && $service_alert_days == '90' ){ echo 'selected'; } ?>>90 Days</option>
                    </select>
                  </div>

                  <div class="form-group col-md-6 select_sm">
                    <label>Renewal Period </label>
                    <select class="form-control select2" name="service_renewal_per" id="service_renewal_per" data-placeholder="Renewal Period " required>
                      <option value="">Renewal Period </option>
                      <option value="3" <?php if(isset($service_renewal_per) && $service_renewal_per == '3' ){ echo 'selected'; } ?>>3 Months</option>
                      <option value="6" <?php if(isset($service_renewal_per) && $service_renewal_per == '6' ){ echo 'selected'; } ?>>6 Months</option>
                      <option value="12" <?php if(isset($service_renewal_per) && $service_renewal_per == '12' ){ echo 'selected'; } ?>>12 Months</option>
                      <option value="24" <?php if(isset($service_renewal_per) && $service_renewal_per == '24' ){ echo 'selected'; } ?>>24 Months</option>
                    </select>
                  </div>

                  <div class="form-group col-md-6">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" name="service_status" id="service_status" value="0" <?php if(isset($service_status) && $service_status == 0){ echo 'checked'; } ?>>
                      <label for="service_status" class="custom-control-label">Disable This </label>
                    </div>
                  </div>
                </div>
                <div class="card-footer row">

                  <div class="col-md-12 text-center">
                    <?php if(isset($update)){ ?>
                      <button id="btn_update" type="submit" class="btn btn-primary">Update </button>
                    <?php } else{ ?>
                      <button id="btn_save" type="submit" class="btn btn-success px-4">Save</button>
                    <?php } ?>
                    <a href="<?php echo base_url() ?>User/task_information_list" class="btn btn-default ml-4">Cancel</a>
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
  $('#service_stock_req').on('change',function(){
    if(this.checked) {
      $('#service_opening_stock').prop('readonly', false);
      $('#service_opening_stock_val').prop('readonly', false);
    } else{
      $('#service_opening_stock').prop('readonly', true);
      $('#service_opening_stock_val').prop('readonly', true);
    }

  });
</script>
</body>
</html>
