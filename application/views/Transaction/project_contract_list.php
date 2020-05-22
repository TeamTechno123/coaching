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
            <h4>Project Contract Information</h4>
          </div>
          <div class="col-sm-6 mt-1 text-right">
              <a href="<?php echo base_url(); ?>Transaction/project_contract" class="btn btn-sm btn-primary">Add Contract</a>
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
                  <th>Type Of Contract</th>
                  <th>Contract Name</th>
                  <th>Date</th>
                  <th>Lead</th>
                  <th>Status</th>
                  <th class="wt_50">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 0;
                  foreach ($project_contract_list as $list) {
                    $i++;
                    $contract_type = $this->User_Model->get_info_arr_fields('contract_type_name','contract_type_id', $list->contract_type_id, 'contract_type');
                    $lead = $this->User_Model->get_info_arr_fields('lead_name','lead_id', $list->lead_id, 'lead');
                    $pro_cont_status = $this->User_Model->get_info_arr_fields('pro_cont_status_name','pro_cont_status_id', $list->pro_cont_status_id, 'pro_cont_status');
                  ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php if($contract_type){ echo $contract_type[0]['contract_type_name']; }  ?></td>
                    <td><?php echo $list->pro_cont_title; ?></td>
                    <td><?php echo $list->pro_cont_date; ?></td>
                    <td><?php if($lead){ echo $lead[0]['lead_name']; }  ?></td>
                    <td><?php if($pro_cont_status){ echo $pro_cont_status[0]['pro_cont_status_name']; }  ?></td>
                    <td class="text-center">
                      <a href="<?php echo base_url(); ?>Transaction/edit_project_contract/<?php echo $list->pro_cont_id; ?>"> <i class="fa fa-edit"></i> </a>
                      <a href="<?php echo base_url(); ?>Transaction/delete_project_contract/<?php echo $list->pro_cont_id; ?>" onclick="return confirm('Delete this Project Contract');" class="ml-2"> <i class="fa fa-trash text-danger"></i> </a>
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
