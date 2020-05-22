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
            <h1>Task Information</h1>
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
                <h3 class="card-title">Add Task Information</h3>
              </div>
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post" autocomplete="off">
                <div class="card-body row">
                  <div class="form-group col-md-12 select_sm">
                    <label>Select Branch</label>
                    <select class="form-control select2" name="branch_id" id="branch_id" data-placeholder="Select Branch" required>
                      <option value="">Select Branch</option>
                      <?php if(isset($branch_list)){ foreach ($branch_list as $list) { ?>
                      <option value="<?php echo $list->branch_id; ?>" <?php if(isset($task_info) && $task_info['branch_id'] == $list->branch_id){ echo 'selected'; } ?>><?php echo $list->branch_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Enter Task Name</label>
                    <input type="text" class="form-control form-control-sm" name="task_name" id="task_name" value="<?php if(isset($task_info)){ echo $task_info['task_name']; } ?>" placeholder="Enter Task Name" required>
                  </div>
                  <div class="form-group col-md-6 select_sm">
                    <label>Related Contract</label>
                    <select class="form-control select2" name="pro_cont_id" id="pro_cont_id" data-placeholder="Related Contract" >
                      <option value="">Related Contract</option>
                      <?php if(isset($pro_cont_list)){ foreach ($pro_cont_list as $list) { ?>
                      <option value="<?php echo $list->pro_cont_id; ?>" <?php if(isset($task_info) && $task_info['pro_cont_id'] == $list->pro_cont_id){ echo 'selected'; } ?>><?php echo $list->pro_cont_no.' - '.$list->pro_cont_title; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6 select_sm">
                    <label>Assign To</label>
                    <select class="form-control select2" name="task_assidn_to" id="task_assidn_to" data-placeholder="Assign To" required>
                      <option value="">Assign To</option>
                      <?php if(isset($user_list)){ foreach ($user_list as $list) { ?>
                      <option value="<?php echo $list->user_id; ?>" <?php if(isset($task_info) && $task_info['task_assidn_to'] == $list->user_id){ echo 'selected'; } ?>><?php echo $list->user_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Enter Estimate Time</label>
                    <input type="text" class="form-control form-control-sm" name="task_est_time" id="task_est_time" value="<?php if(isset($task_info)){ echo $task_info['task_est_time']; } ?>" placeholder="Enter Estimate Time" required >
                  </div>
                  <div class="form-group col-md-6">
                    <label>Enter Due Date & Time</label>
                    <input type="text" class="form-control form-control-sm" name="task_due_date_time" value="<?php if(isset($task_info)){ echo $task_info['task_due_date_time']; } ?>" id="datetime1" data-target="#datetime1" data-toggle="datetimepicker" placeholder="Enter Due Date & Time" required >
                  </div>
                  <div class="form-group col-md-6 select_sm">
                    <label>Select Stage</label>
                    <select class="form-control select2" name="task_stage_id" id="task_stage_id" data-placeholder="Select Stage" required >
                      <option value="">Select Stage</option>
                      <?php if(isset($task_stage_list)){ foreach ($task_stage_list as $list) { ?>
                      <option value="<?php echo $list->task_stage_id; ?>" <?php if(isset($task_info) && $task_info['task_stage_id'] == $list->task_stage_id){ echo 'selected'; } ?>><?php echo $list->task_stage_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6 select_sm">
                    <label>Select Priority</label>
                    <select class="form-control select2" name="task_priority_id" id="task_priority_id" data-placeholder="Select Priority" required >
                      <option value="">Select Priority</option>
                      <?php if(isset($task_priority_list)){ foreach ($task_priority_list as $list) { ?>
                      <option value="<?php echo $list->task_priority_id; ?>" <?php if(isset($task_info) && $task_info['task_priority_id'] == $list->task_priority_id){ echo 'selected'; } ?>><?php echo $list->task_priority_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6 select_sm">
                    <label>Select Task Type</label>
                    <select class="form-control select2" name="task_type_id" id="task_type_id" data-placeholder="Select Task Type" required >
                      <option value="">Select Task Type</option>
                      <?php if(isset($task_type_list)){ foreach ($task_type_list as $list) { ?>
                      <option value="<?php echo $list->task_type_id; ?>" <?php if(isset($task_info) && $task_info['task_type_id'] == $list->task_type_id){ echo 'selected'; } ?>><?php echo $list->task_type_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Estimated Budget</label>
                    <input type="Number" class="form-control form-control-sm" name="task_est_budget" id="task_est_budget" value="<?php if(isset($task_info)){ echo $task_info['task_est_budget']; } ?>" placeholder="Estimated Budget" >
                  </div>
                  <div class="form-group col-md-6 select_sm">
                    <label>Select Status Of Task</label>
                    <select class="form-control select2" name="task_status_id" id="task_status_id" data-placeholder="Select Status Of Task" required >
                      <option value="">Select Status Of Task</option>
                      <?php if(isset($task_status_list)){ foreach ($task_status_list as $list) { ?>
                      <option value="<?php echo $list->task_status_id; ?>" <?php if(isset($task_info) && $task_info['task_status_id'] == $list->task_status_id){ echo 'selected'; } ?>><?php echo $list->task_status_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Task Completion Date & Time</label>
                    <input type="text" class="form-control form-control-sm" name="task_compl_date_time" value="<?php if(isset($task_info)){ echo $task_info['task_compl_date_time']; } ?>"  id="datetime2" data-target="#datetime2" data-toggle="datetimepicker" placeholder="Task Completion Date & Time" >
                  </div>
                  <div class="form-group col-md-6">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" name="task_status" id="task_status" value="0" <?php if(isset($task_info) && $task_info['task_status'] == '0'){ echo 'checked'; } ?>>
                      <label for="task_status" class="custom-control-label">Disable This</label>
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
