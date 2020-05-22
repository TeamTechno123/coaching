<!DOCTYPE html>
<html>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header pt-0 pb-2">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-left mt-2">
            <h4>Receipt</h4>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card collapsed-card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Add New Receipt</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-sm btn-primary" data-card-widget="collapse">Add New</button>
                </div>
              </div>
              <!--  -->
                <div class="card-body p-0" style="display: none;">
                  <form class="input_form m-0" id="form_action" role="form" action="" method="post">
                    <div class="row px-3">
                      <div class="form-group col-md-6 select_sm">
                        <label>Receipt No.</label>
                        <input type="text" class="form-control form-control-sm" name="receipt_no" id="receipt_no"  placeholder="Receipt No." readonly >
                      </div>

                      <div class="form-group col-md-6 select_sm">
                        <label>Receipt Date</label>
                        <input type="text" class="form-control form-control-sm" name="receipt_date" id="receipt_date"  placeholder="Receipt Date" Required >
                      </div>


                      <div class="form-group col-md-6 select_sm">
                        <label>Select Academic Year</label>
                        <select class="form-control select2" name="academic_year" id="academic_year" data-placeholder="Select Academic Year">
                          <option value="">Select Academic Year</option>
                        </select>
                      </div>

                      <div class="form-group col-md-6 select_sm">
                        <label>Select medium Name</label>
                        <select class="form-control select2" name="medium_name" id="medium_name" data-placeholder="Select medium Name">
                          <option value="">Select medium Name</option>
                        </select>
                      </div>

                      <div class="form-group col-md-6 select_sm">
                        <label>Select Standard Name</label>
                        <select class="form-control select2" name="standard_name" id="standard_name" data-placeholder="Select Standard Name">
                          <option value="">Select Standard Name</option>
                        </select>
                      </div>

                      <div class="form-group col-md-6 select_sm">
                        <label>Select Batch Name</label>
                        <select class="form-control select2" name="batch_name" id="batch_name" data-placeholder="Select Batch Name">
                          <option value="">Select Batch Name</option>
                        </select>
                      </div>

                      <div class="form-group col-md-12 select_sm">
                        <label>Select Student Name</label>
                        <select class="form-control select2" name="student_name" id="student_name" data-placeholder="Select Student Name">
                          <option value="">Select Student Name</option>
                        </select>
                      </div>

                      <div class="form-group col-md-6 select_sm">
                        <label>Total Balance Fees</label>
                        <input type="text" class="form-control form-control-sm" name="balance_fee" id="balance_fee"  placeholder="Total Balance Fees" readonly >
                      </div>

                      <div class="form-group col-md-6 select_sm">
                        <label>Enter Received Fees</label>
                        <input type="text" class="form-control form-control-sm" name="received_fee" id="received_fee"  placeholder="Enter Received Fees" Required >
                      </div>


                    </div>
                    <div class="card-footer clearfix" style="display: block;">
                      <button class="btn btn-sm btn-primary float-right px-3">Save</button>
                    </div>
                  </form>
                </div>
            </div>
          </div>


          <div class="col-md-12">
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">List All Receipt</h3>
              </div>
              <div class="card-body p-2">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="wt_50">Action</th>
                    <th>Receipt No.</th>
                    <th>Date</th>
                    <th>Student Name</th>
                    <th>Acadamic Year </th>
                    <th>Class </th>
                    <th>Batch</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-default"><i class="fa fa-edit text-primary"></i></button>
                          <button type="button" class="btn btn-sm btn-default" onclick="return confirm('Delete this Party');"><i class="fa fa-trash text-danger"></i></button>
                        </div>
                      </td>
                      <td>asd</td>
                      <td>asd</td>
                      <td>asd</td>
                      <td>asd</td>
                      <td>asd</td>
                      <td>asd</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
  </div>

</body>
</html>
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
