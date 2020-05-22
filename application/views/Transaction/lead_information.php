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
            <h1>Lead Information</h1>
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
                <h3 class="card-title">Add Lead Information</h3>
              </div>
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post" autocomplete="off">
                <div class="card-body row">
                  <div class="form-group col-md-12 select_sm">
                    <label>Select Branch</label>
                    <select class="form-control select2" name="branch_id" id="branch_id" data-placeholder="Select Branch" required>
                      <option value="">Select Branch</option>
                      <?php if(isset($branch_list)){ foreach ($branch_list as $list) { ?>
                      <option value="<?php echo $list->branch_id; ?>" <?php if(isset($lead_info) && $lead_info['branch_id'] == $list->branch_id){ echo 'selected'; } ?>><?php echo $list->branch_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label>Lead No.</label>
                    <input type="number" class="form-control form-control-sm " name="lead_no" id="lead_no" value="<?php if(isset($lead_info)){ echo $lead_info['lead_no']; } elseif(isset($lead_no)){ echo $lead_no; } ?>" placeholder="Lead Number" required readonly>
                  </div>
                  <div class="form-group col-md-3">
                    <label>Lead Date</label>
                    <input type="text" class="form-control form-control-sm " name="lead_date" value="<?php if(isset($lead_info)){ echo $lead_info['lead_date']; } else{ echo date('d-m-Y'); } ?>" id="date5" data-target="#date5" data-toggle="datetimepicker" placeholder="Lead Date" required >
                  </div>
                  <div class="form-group col-md-7">
                    <label>Lead Name</label>
                    <input type="text" class="form-control form-control-sm " name="lead_name" id="lead_name" value="<?php if(isset($lead_info)){ echo $lead_info['lead_name']; } ?>" placeholder="Lead Name" required >
                  </div>

                  <div class="form-group col-md-10 select_sm">
                    <label>Select Party Name</label>
                    <select class="form-control select2" name="party_id" id="party_id" data-placeholder="Select Party Name" required>
                      <option value="">Select Party Name</option>
                      <?php if(isset($party_list)){ foreach ($party_list as $list) { ?>
                      <option value="<?php echo $list->party_id; ?>" <?php if(isset($lead_info) && $lead_info['party_id'] == $list->party_id){ echo 'selected'; } ?>><?php echo $list->party_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <button type="button" id="btn_add_party" class="btn btn-sm btn-primary mt-4" data-toggle="modal" data-target="#modal_add_party">Add Party</button>
                  </div>
                  <div class="col-md-12">
                    <hr>
                  </div>

                  <div class="form-group col-md-6 text-left">
                    <label>Add Product / Service</label>
                  </div>
                  <div class="form-group col-md-6 text-right">
                    <button type="button" id="add_row" class="btn btn-sm btn-primary">Add Row</button>
                  </div>
                  <div class="form-group col-md-12">
                    <table id="myTable" class="table table-bordered tbl_list">
                      <thead>
                      <tr>
                        <th>Select Product / Service</th>
                        <th class="wt_150">Enter Qty</th>
                        <th>Approx Value</th>
                        <th class="wt_50"></th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php if(isset($lead_child_list)){ $i = 0;
                          foreach ($lead_child_list as $lead_child_list1) {
                        ?>
                          <input type="hidden" name="input[<?php echo $i; ?>][lead_child_id]" value="<?php echo $lead_child_list1->lead_child_id; ?>">
                          <tr>
                            <td>
                              <select class="form-control form-control-sm" name="input[<?php echo $i; ?>][service_id]" data-placeholder="Select Product / Service" required>
                                <option value="">Select Product / Service</option>
                                <?php if(isset($service_list)){ foreach ($service_list as $list) { ?>
                                <option value="<?php echo $list->service_id; ?>" <?php if($lead_child_list1->service_id == $list->service_id){ echo 'selected'; } ?> ><?php echo $list->service_name; ?></option>
                                <?php } } ?>
                              </select>
                            </td>
                            <td class="wt_150">
                              <input type="number" class="form-control form-control-sm" name="input[<?php echo $i; ?>][lead_child_ser_qty]" value="<?php echo $lead_child_list1->lead_child_ser_qty; ?>" placeholder="Enter Qty" required>
                            </td>
                            <td class="wt_150">
                              <input type="text" class="form-control form-control-sm" name="input[<?php echo $i; ?>][lead_child_approx_val]" value="<?php echo $lead_child_list1->lead_child_approx_val; ?>" placeholder="Approx Value" required>
                            </td>
                            <td class="wt_50"><?php if($i > 0){ ?><a class="rem_row"><i class="fa fa-trash text-danger"></i></a><?php } ?></td>
                          </tr>
                        <?php $i++;  } } else{ ?>
                          <tr>
                            <td>
                              <select class="form-control form-control-sm" name="input[0][service_id]" data-placeholder="Select Product / Service" required>
                                <option value="">Select Product / Service</option>
                                <?php if(isset($service_list)){ foreach ($service_list as $list) { ?>
                                <option value="<?php echo $list->service_id; ?>" ><?php echo $list->service_name; ?></option>
                                <?php } } ?>
                              </select>
                            </td>
                            <td class="wt_150">
                              <input type="number" class="form-control form-control-sm" name="input[0][lead_child_ser_qty]" placeholder="Enter Qty" required>
                            </td>
                            <td class="wt_150">
                              <input type="text" class="form-control form-control-sm" name="input[0][lead_child_approx_val]" placeholder="Approx Value" required>
                            </td>
                            <td class="wt_50"></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-md-12">
                    <hr>
                  </div>

                  <div class="form-group col-md-12">
                    <label>Enter Additional Details</label>
                    <textarea class="form-control" name="lead_details" id="lead_details" rows="3" cols="100" placeholder="Enter Additional Details" required><?php if(isset($lead_info)){ echo $lead_info['lead_details']; } ?></textarea>
                  </div>
                  <div class="form-group col-md-6 select_sm">
                    <label>Select Lead Source</label>
                    <select class="form-control select2" name="lead_source_id" id="lead_source_id" data-placeholder="Select Lead Source" required>
                      <option value="">Select Lead Source</option>
                      <?php if(isset($lead_source_list)){ foreach ($lead_source_list as $list) { ?>
                      <option value="<?php echo $list->lead_source_id; ?>" <?php if(isset($lead_info) && $lead_info['lead_source_id'] == $list->lead_source_id){ echo 'selected'; } ?>><?php echo $list->lead_source_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6 select_sm">
                    <label>Select Sales Stage</label>
                    <select class="form-control select2" name="sales_stage_id" id="sales_stage_id" data-placeholder="Select Sales Stage" required>
                      <option value="">Select Sales Stage</option>
                      <?php if(isset($sales_stage_list)){ foreach ($sales_stage_list as $list) { ?>
                      <option value="<?php echo $list->sales_stage_id; ?>" <?php if(isset($lead_info) && $lead_info['sales_stage_id'] == $list->sales_stage_id){ echo 'selected'; } ?>><?php echo $list->sales_stage_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4 select_sm">
                    <label>Select Probability</label>
                    <select class="form-control select2" name="lead_probability" id="lead_probability" data-placeholder="Select Probability" >
                      <option value="">Select Probability</option>
                      <?php if(isset($lead_probability_list)){ foreach ($lead_probability_list as $list) { ?>
                      <option value="<?php echo $list->lead_probability_id; ?>" <?php if(isset($lead_info) && $lead_info['lead_probability'] == $list->lead_probability_id){ echo 'selected'; } ?>><?php echo $list->lead_probability_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>

                  <div class="form-group col-md-4">
                    <label>Expected Closed Date</label>
                    <input type="text" class="form-control form-control-sm" name="lead_exp_close_date" value="<?php if(isset($lead_info)){ echo $lead_info['lead_exp_close_date']; } ?>"  id="date3" data-target="#date3" data-toggle="datetimepicker" placeholder="Expected Closed Date">
                  </div>
                  <!-- <div class="form-group col-md-4 select_sm">
                    <label>Select Lead Status </label>
                    <select class="form-control select2" name="lead_status" id="lead_status" data-placeholder="Select Lead Status " required>
                      <option value="">Select Lead Status </option>
                      <?php if(isset($lead_status_list)){ foreach ($lead_status_list as $list) { ?>
                      <option value="<?php echo $list->lead_status_id; ?>" <?php if(isset($lead_info) && $lead_info['lead_status'] == $list->lead_status_id){ echo 'selected'; } ?>><?php echo $list->lead_status_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div> -->
                  <div class="form-group col-md-4 select_sm">
                    <label>Assign To</label>
                    <select class="form-control select2" name="lead_ass_to" id="lead_ass_to" data-placeholder="Assign To" >
                      <option value="">Assign To</option>
                      <?php if(isset($user_list)){ foreach ($user_list as $list) { ?>
                      <option value="<?php echo $list->user_id; ?>" <?php if(isset($lead_info) && $lead_info['lead_ass_to'] == $list->user_id){ echo 'selected'; } ?>><?php echo $list->user_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Appointment Date</label>
                    <input type="text" class="form-control form-control-sm" name="lead_appo_date" value="<?php if(isset($lead_info)){ echo $lead_info['lead_appo_date']; } ?>" id="date4" data-target="#date4" data-toggle="datetimepicker" placeholder="Appointment Date" >
                  </div>
                  <div class="form-group col-md-4">
                    <label>Appointment Time</label>
                    <input type="text" class="form-control form-control-sm" name="lead_appo_time" value="<?php if(isset($lead_info)){ echo $lead_info['lead_appo_time']; } ?>" id="time1" data-target="#time1" data-toggle="datetimepicker" placeholder="Appointment Time" >
                  </div>
                  <div class="form-group col-md-4 select_sm">
                    <label>Remind Me After </label>
                    <select class="form-control select2" name="lead_remind" id="lead_remind" data-placeholder="Remind Me After" >
                      <option value="" selected>Remind Me After </option>
                      <option value="5" <?php if(isset($lead_info) && $lead_info['lead_remind'] =='5'){ echo 'selected'; } ?>>5 Days</option>
                      <option value="10" <?php if(isset($lead_info) && $lead_info['lead_remind'] =='10'){ echo 'selected'; } ?>>10 Days</option>
                      <option value="15" <?php if(isset($lead_info) && $lead_info['lead_remind'] =='15'){ echo 'selected'; } ?>>15 Days</option>
                      <option value="20" <?php if(isset($lead_info) && $lead_info['lead_remind'] =='20'){ echo 'selected'; } ?>>20 Days</option>
                      <option value="25" <?php if(isset($lead_info) && $lead_info['lead_remind'] =='25'){ echo 'selected'; } ?>>25 Days</option>
                      <option value="30" <?php if(isset($lead_info) && $lead_info['lead_remind'] =='30'){ echo 'selected'; } ?>>30 Days</option>
                    </select>
                  </div>
                </div>

                <div class="card-footer row">
                  <div class="col-md-12 text-right">
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

  <!-- modal -->
  <div class="modal fade bd-example-modal-lg" id="modal_add_party" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Party</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="" action="<?php echo base_url(); ?>Transaction/save_party" method="post" autocomplete="off">
          <div class="modal-body">
            <div class="row">
              <div class="form-group col-md-3 select_sm">
                <label>Select Party Type</label>
                <select class="form-control select2" name="party_type" id="party_type" data-placeholder="Select Party Type" required>
                  <option value="">Select Party Type</option>
                  <option value="1" selected>Customer</option>
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
                <input type="email" class="form-control form-control-sm" name="party_email" id="party_email" value="<?php if(isset($party_info)){ echo $party_info['party_email']; } ?>" placeholder="Email" required>
              </div>
              <div class="form-group col-md-6">
                <label>Contact Person Name</label>
                <input type="text" class="form-control form-control-sm" name="party_con_person" id="party_con_person" value="<?php if(isset($party_info)){ echo $party_info['party_con_person']; } ?>" placeholder="Contact Person Name">
              </div>
              <div class="form-group col-md-6">
                <label>PAN No.</label>
                <input type="text" class="form-control form-control-sm" name="party_pan_no" id="party_pan_no" value="<?php if(isset($party_info)){ echo $party_info['party_pan_no']; } ?>" placeholder="PAN No." required>
              </div>
              <div class="form-group col-md-6">
                <label>GST No.</label>
                <input type="text" class="form-control form-control-sm" name="party_gst_no" id="party_gst_no" value="<?php if(isset($party_info)){ echo $party_info['party_gst_no']; } ?>" placeholder="GST No.">
              </div>
              <div class="form-group col-md-6">
                <label>Date Of Birth</label>
                <input type="text" class="form-control form-control-sm" name="party_dob" value="<?php if(isset($party_info)){ echo $party_info['party_dob']; } ?>" id="date1" data-target="#date1" data-toggle="datetimepicker" placeholder="Date Of Birth" required>
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
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Party</button>
          </div>
        </form>
      </div>
    </div>
  </div>



  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
  <script type="text/javascript">
    <?php if($this->session->flashdata('save_success')){ ?>
      $(document).ready(function(){
        toastr.success('Party Saved successfully');
      });
    <?php } ?>
  </script>

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
          toastr.error(party_mobile1+' Mobile Number Exist.');
        }
      }
    });
  });


  $('#party_id').on('change',function(){
    var party_id = $('#party_id').find("option:selected").val();
    // alert(party_id);
    $.ajax({
      url:'<?php echo base_url(); ?>Transaction/get_party_details',
      type: 'POST',
      data: {"party_id":party_id},
      context: this,
      success: function(result){
      	// If json_encode responce..
      	var data = JSON.parse(result);
        $('#party_name').val(data['party_name']);
        $('#party_address').val(data['party_address']);
        $('#country_id').val(data['country_id']);
        $('#state_id').val(data['state_id']);
        $('#district_id').val(data['district_id']);
        $('#party_mobile1').val(data['party_mobile1']);
        $('#party_mobile2').val(data['party_mobile2']);
        $('#party_email').val(data['party_email']);
        $('#party_con_person').val(data['party_con_person']);
        $('#party_pan_no').val(data['party_pan_no']);
        $('#party_gst_no').val(data['party_gst_no']);
        $('#date1').val(data['party_dob']);
        $('#date2').val(data['party_anniversary']);
        $('#party_bank').val(data['party_bank']);
        $('#party_account_no').val(data['party_account_no']);
        $('#party_ifsc_code').val(data['party_ifsc_code']);
        $('#party_credit_limit').val(data['party_credit_limit']);
        $('#party_bill_limit').val(data['party_bill_limit']);
        $('#party_pay_terms').val(data['party_pay_terms']);
      }
    });


  });

</script>

<script type="text/javascript">
  // Add Row...
  <?php if(isset($update)){ ?>
  var i = <?php echo $i-1; ?>;
  <?php } else { ?>
  var i = 0;
  <?php } ?>

  $('#add_row').click(function(){
    i++;
    var row = ''+
    '<tr>'+
      '<td>'+
        '<select class="form-control form-control-sm" name="input['+i+'][service_id]" data-placeholder="Select Product / Service" required>'+
          '<option value="">Select Product / Service</option>'+
          '<?php if(isset($service_list)){ foreach ($service_list as $list) { ?>'+
          '<option value="<?php echo $list->service_id; ?>" ><?php echo $list->service_name; ?></option>'+
          '<?php } } ?>'+
        '</select>'+
      '</td>'+
      '<td class="wt_150">'+
        '<input type="number" class="form-control form-control-sm" name="input['+i+'][lead_child_ser_qty]" placeholder="Enter Qty" required>'+
      '</td>'+
      '<td class="wt_150">'+
        '<input type="text" class="form-control form-control-sm" name="input['+i+'][lead_child_approx_val]" placeholder="Approx Value" required>'+
      '</td>'+
      '<td class="wt_50"><a class="rem_row"><i class="fa fa-trash text-danger"></i></a></td>'+
    '</tr>';
    $('#myTable').append(row);
  });

  $('#myTable').on('click', '.rem_row', function () {
    $(this).closest('tr').remove();
  });

</script>
</body>
</html>
