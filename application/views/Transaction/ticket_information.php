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
            <h1>Ticket Support Information</h1>
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
                <h3 class="card-title">Add Ticket Information</h3>
              </div>
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post">
                <div class="card-body row">
                  <div class="form-group col-md-12 select_sm">
                    <label>Select Branch</label>
                    <select class="form-control select2" name="branch_id" id="branch_id" data-placeholder="Select Branch" required>
                      <option value="">Select Branch</option>
                      <?php if(isset($branch_list)){ foreach ($branch_list as $list) { ?>
                      <option value="<?php echo $list->branch_id; ?>" <?php if(isset($ticket_info) && $ticket_info['branch_id'] == $list->branch_id){ echo 'selected'; } ?>><?php echo $list->branch_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Enter Ticket No.</label>
                    <input type="text" class="form-control form-control-sm" name="ticket_no" id="ticket_no" value="<?php if(isset($ticket_info)){ echo $ticket_info['ticket_no']; } elseif(isset($ticket_no)){ echo $ticket_no; } ?>" placeholder="Enter Ticket No." readonly>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Enter Ticket Date</label>
                    <input type="text" class="form-control form-control-sm" name="ticket_date" value="<?php if(isset($ticket_info)){ echo $ticket_info['ticket_date']; } ?>" id="date1" data-target="#date1" data-toggle="datetimepicker" placeholder="Enter Ticket Date" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Enter Ticket Time</label>
                    <input type="text" class="form-control form-control-sm" name="ticket_time" value="<?php if(isset($ticket_info)){ echo $ticket_info['ticket_time']; } ?>" id="time1" data-target="#time1" data-toggle="datetimepicker" placeholder="Enter Ticket Time" required>
                  </div>
                  <div class="form-group col-md-4 select_sm">
                    <label>Select Party</label>
                    <select class="form-control select2" name="party_id" id="party_id" data-placeholder="Select Party" required>
                      <option value="">Select Party</option>
                      <?php if(isset($party_list)){ foreach ($party_list as $list) { ?>
                      <option value="<?php echo $list->party_id; ?>" <?php if(isset($ticket_info) && $ticket_info['party_id'] == $list->party_id){ echo 'selected'; } ?>><?php echo $list->party_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4 select_sm">
                    <label>Select Contract No.</label>
                    <select class="form-control select2" name="pro_cont_id" id="pro_cont_id" data-placeholder="Select Contract No." required>
                      <option value="">Select Contract No.</option>
                      <?php if(isset($pro_cont_list)){ foreach ($pro_cont_list as $list) { ?>
                      <option value="<?php echo $list->pro_cont_id; ?>" <?php if(isset($ticket_info) && $ticket_info['pro_cont_id'] == $list->pro_cont_id){ echo 'selected'; } ?>><?php echo $list->pro_cont_no; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4 select_sm">
                    <label>Select Reporting Type</label>
                    <select class="form-control select2" name="ticket_reporting_type" id="ticket_reporting_type" data-placeholder="Select Reporting Type" required >
                      <option value="">Select Reporting Type</option>
                      <?php if(isset($ticket_reporting_list)){ foreach ($ticket_reporting_list as $list) { ?>
                      <option value="<?php echo $list->ticket_reporting_id; ?>" <?php if(isset($ticket_info) && $ticket_info['ticket_reporting_type'] == $list->ticket_reporting_id){ echo 'selected'; } ?>><?php echo $list->ticket_reporting_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Enter Contract Start Date</label>
                    <input type="text" class="form-control form-control-sm" name="ticket_cont_start_date" id="ticket_cont_start_date" value="<?php if(isset($ticket_info)){ echo $ticket_info['ticket_cont_start_date']; } ?>" placeholder="Enter Contract Start Date" readonly>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Enter Contract End Date</label>
                    <input type="text" class="form-control form-control-sm" name="ticket_cont_end_date" id="ticket_cont_end_date" value="<?php if(isset($ticket_info)){ echo $ticket_info['ticket_cont_end_date']; } ?>" placeholder="Enter Contract End Date" readonly>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Balance Service Calls</label>
                    <input type="text" class="form-control form-control-sm" name="ticket_bal_ser_calls" id="ticket_bal_ser_calls" value="<?php if(isset($ticket_info)){ echo $ticket_info['ticket_bal_ser_calls']; } ?>" placeholder="Balance Service Calls" readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label> Reporting Person Name</label>
                    <input type="text" class="form-control form-control-sm" name="ticket_rep_person" id="ticket_rep_person" value="<?php if(isset($ticket_info)){ echo $ticket_info['ticket_rep_person']; } ?>" placeholder="Reporting Person Name" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Reporting Person Contact No.</label>
                    <input type="text" class="form-control form-control-sm" name="ticket_rep_contact" id="ticket_rep_contact" value="<?php if(isset($ticket_info)){ echo $ticket_info['ticket_rep_contact']; } ?>" placeholder="Reporting Person Contact No." required>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Enter details</label>
                    <textarea name="ticket_details" id="ticket_details" rows="5" class="form-control" cols="90" required><?php if(isset($ticket_info)){ echo $ticket_info['ticket_details']; } ?></textarea>
                  </div>
                  <div class="form-group col-md-6 select_sm">
                    <label>Select Priority</label>
                    <select class="form-control select2" name="ticket_priority_id" id="ticket_priority_id" data-placeholder="Select Priority" required>
                      <option value="">Select Priority</option>
                      <?php if(isset($ticket_priority_list)){ foreach ($ticket_priority_list as $list) { ?>
                      <option value="<?php echo $list->ticket_priority_id; ?>" <?php if(isset($ticket_info) && $ticket_info['ticket_priority_id'] == $list->ticket_priority_id){ echo 'selected'; } ?>><?php echo $list->ticket_priority_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6 select_sm">
                    <label>Select Status</label>
                    <select class="form-control select2" name="ticket_status_id" id="ticket_status_id" data-placeholder="Select Status" required>
                      <option value="">Select Status</option>
                      <?php if(isset($ticket_status_list)){ foreach ($ticket_status_list as $list) { ?>
                      <option value="<?php echo $list->ticket_status_id; ?>" <?php if(isset($ticket_info) && $ticket_info['ticket_status_id'] == $list->ticket_status_id){ echo 'selected'; } ?>><?php echo $list->ticket_status_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6 select_sm">
                    <label>Assign Group</label>
                    <select class="form-control select2" name="group_id" id="group_id" data-placeholder="Assign Group" >
                      <option value="">Assign Group</option>
                      <?php if(isset($group_list)){ foreach ($group_list as $list) { ?>
                      <option value="<?php echo $list->group_id; ?>" <?php if(isset($ticket_info) && $ticket_info['group_id'] == $list->group_id){ echo 'selected'; } ?>><?php echo $list->group_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>

                  <div class="form-group col-md-6 select_sm">
                    <label>Assign Employee Name</label>
                    <select class="form-control select2" name="ticket_assign_emp" id="ticket_assign_emp" data-placeholder="Assign Employee Name" >
                      <option value="">Assign Employee Name</option>
                      <?php if(isset($user_list)){ foreach ($user_list as $list) { ?>
                      <option value="<?php echo $list->user_id; ?>" <?php if(isset($ticket_info) && $ticket_info['ticket_assign_emp'] == $list->user_id){ echo 'selected'; } ?>><?php echo $list->user_name; ?></option>
                      <?php } } ?>
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
                    <a href="<?php echo base_url() ?>User/ticket_information_list" class="btn btn-default ml-4">Cancel</a>
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
  $('#party_id').on('change',function(){
    var party_id = $('#party_id').find("option:selected").val();
    $.ajax({
      url:'<?php echo base_url(); ?>Transaction/get_pro_cont_by_party',
      type: 'POST',
      data: {"party_id":party_id},
      context: this,
      success: function(result){
        $('#pro_cont_id').html(result);
      }
    });
  });

//
  $('#pro_cont_id').on('change',function(){
    var pro_cont_id = $('#pro_cont_id').find("option:selected").val();
    $.ajax({
      url:'<?php echo base_url(); ?>Transaction/get_pro_cont_details',
      type: 'POST',
      data: {"pro_cont_id":pro_cont_id},
      context: this,
      success: function(result){
        var data = JSON.parse(result);
        $('#ticket_cont_start_date').val(data['pro_cont_s_date']);
        $('#ticket_cont_end_date').val(data['pro_cont_e_date']);
        // $('#').val(data['']);
        // $('#pro_cont_id').html(result);
      }
    });
  });


</script>
</body>
</html>
