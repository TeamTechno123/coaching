<!DOCTYPE html>
<html>
<style>
  td{ padding:2px 10px !important; }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-1">
            <h4>Task Information</h4>
          </div>
          <div class="col-sm-6 mt-1 text-right">
            <a href="<?php echo base_url(); ?>Transaction/task_information" class="btn btn-sm btn-primary">Add Task</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="wt_50">#</th>
                  <th>Task Name</th>
                  <th>Assign To</th>
                  <th>Priority</th>
                  <!-- <th>Party Name</th> -->
                  <th>Project Name</th>
                  <th class="wt_50">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 0;
                  foreach ($task_list as $list) {
                    $i++;
                    $user_info = $this->User_Model->get_info_arr_fields('user_name','user_id', $list->task_assidn_to, 'user');
                    $priority = $this->User_Model->get_info_arr_fields('task_priority_name','task_priority_id', $list->task_priority_id, 'task_priority');
                    $project = $this->User_Model->get_info_arr_fields('pro_cont_title','pro_cont_id ', $list->pro_cont_id , 'project_contract');
                  ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $list->task_name; ?></td>
                    <td><?php if($user_info){ echo $user_info[0]['user_name']; } ?></td>
                    <td><?php if($priority){ echo $priority[0]['task_priority_name']; } ?></td>
                    <td><?php if($project){ echo $project[0]['pro_cont_title']; } ?></td>
                    <td class="text-center">
                      <a href="<?php echo base_url(); ?>Transaction/edit_task/<?php echo $list->task_id; ?>"> <i class="fa fa-edit"></i> </a>
                      <a href="<?php echo base_url(); ?>Transaction/delete_task/<?php echo $list->task_id; ?>" onclick="return confirm('Delete this Task');" class="ml-2"> <i class="fa fa-trash text-danger"></i> </a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
  <script type="text/javascript">
    <?php if($this->session->flashdata('save_success')){ ?>
      $(document).ready(function(){
        toastr.success('Saved successfully');
      });
    <?php } ?>
    <?php if($this->session->flashdata('update_success')){ ?>
      $(document).ready(function(){
        toastr.info('Updated successfully');
      });
    <?php } ?>
    <?php if($this->session->flashdata('delete_success')){ ?>
      $(document).ready(function(){
        toastr.error('Deleted successfully');
      });
    <?php } ?>
  </script>
</body>
</html>
