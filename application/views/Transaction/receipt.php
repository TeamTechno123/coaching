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
            <h1>Receipt Information</h1>
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
                <h3 class="card-title">Add Receipt Information</h3>
              </div>
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post">
                <div class="card-body row">
                  <div class="form-group col-md-12 select_sm">
                    <label>Select Branch</label>
                    <select class="form-control select2" name="branch_id" id="branch_id" data-placeholder="Select Branch" required>
                      <option value="">Select Branch</option>
                      <?php if(isset($branch_list)){ foreach ($branch_list as $list) { ?>
                      <option value="<?php echo $list->branch_id; ?>" <?php if(isset($receipt_info) && $receipt_info['branch_id'] == $list->branch_id){ echo 'selected'; } ?>><?php echo $list->branch_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Enter Receipt No.</label>
                    <input type="text" class="form-control form-control-sm" name="receipt_no" id="receipt_no" value="<?php if(isset($receipt_info)){ echo $receipt_info['receipt_no']; } elseif(isset($receipt_no)){ echo $receipt_no; } ?>" placeholder="Enter Receipt No." readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Enter Receipt Date</label>
                    <input type="text" class="form-control form-control-sm" name="receipt_add_date" value="<?php if(isset($receipt_info)){ echo $receipt_info['receipt_add_date']; } else{ echo date('d-m-Y'); } ?>" id="date1" data-target="#date1" data-toggle="datetimepicker" placeholder="Enter Ticket Date" required>
                  </div>
                  <div class="form-group col-md-12 select_sm">
                    <label>Select Party</label>
                    <select class="form-control select2" name="party_id" id="party_id" data-placeholder="Select Party" required>
                      <option value="">Select Party</option>
                      <?php if(isset($party_list)){ foreach ($party_list as $list) { ?>
                      <option value="<?php echo $list->party_id; ?>" <?php if(isset($receipt_info) && $receipt_info['party_id'] == $list->party_id){ echo 'selected'; } ?>><?php echo $list->party_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Amount</label>
                    <input type="number" class="form-control form-control-sm" name="receipt_amount" id="receipt_amount" value="<?php if(isset($receipt_info)){ echo $receipt_info['receipt_amount']; } ?>" placeholder="Enter Amount" required>
                  </div>
                  <div class="form-group col-md-6 select_sm">
                    <label>Payment Mode</label>
                    <select class="form-control select2" name="payment_mode_id" id="payment_mode_id" data-placeholder="Select Payment Mode" required>
                      <option value="">Select Payment Mode</option>
                      <?php if(isset($payment_mode_list)){ foreach ($payment_mode_list as $list) { ?>
                      <option value="<?php echo $list->payment_mode_id; ?>" <?php if(isset($receipt_info) && $receipt_info['payment_mode_id'] == $list->payment_mode_id){ echo 'selected'; } ?>><?php echo $list->payment_mode_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Payment Details</label>
                    <input type="text" class="form-control form-control-sm" name="receipt_pay_details" id="receipt_pay_details" value="<?php if(isset($receipt_info)){ echo $receipt_info['receipt_pay_details']; } ?>" placeholder="Payment Details eg. Check No, Transaction No. etc.">
                  </div>
                  <div class="form-group col-md-12">
                    <label>Narration</label>
                    <textarea class="form-control form-control-sm" name="receipt_narration" id="receipt_narration" rows="3"><?php if(isset($receipt_info)){ echo $receipt_info['receipt_narration']; } ?></textarea>
                  </div>
                </div>
                <div class="card-footer row">
                  <div class="col-md-12 text-right">
                    <?php if(isset($update)){ ?>
                      <button id="btn_update" type="submit" class="btn btn-primary">Update </button>
                    <?php } else{ ?>
                      <button id="btn_save" type="submit" class="btn btn-success px-4">Save</button>
                    <?php } ?>
                    <a href="<?php echo base_url() ?>User/receipt_information_list" class="btn btn-default ml-4">Cancel</a>
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
// get_pro_cont_by_party..
  // $('#party_id').on('change',function(){
  //   var party_id = $('#party_id').find("option:selected").val();
  //   $.ajax({
  //     url:'<?php echo base_url(); ?>Transaction/get_outstanding_by_party',
  //     type: 'POST',
  //     data: {"party_id":party_id},
  //     context: this,
  //     success: function(result){
  //     }
  //   });
  // });

</script>
</body>
</html>
