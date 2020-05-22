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
            <h4>Student</h4>
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
                <h3 class="card-title">Add New Student</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-sm btn-primary" data-card-widget="collapse">Add New</button>
                </div>
              </div>
              <!--  -->
                <div class="card-body p-0" style="display: none;">
                  <form class="input_form m-0" id="form_action" role="form" action="" method="post">
                    <div class="row px-3">





                      <div class="form-group col-md-6 select_sm">
                        <label>Student No.</label>
                        <input type="text" class="form-control form-control-sm" name="receipt_no" id="receipt_no"  placeholder="Student No." readonly >
                      </div>

                      <div class="form-group col-md-6 select_sm">
                        <label>Date</label>
                        <input type="text" class="form-control form-control-sm" name="date" id="date"  placeholder="Date" Required >
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

                      <div class="form-group col-md-6 select_sm">
                        <label>Student Name</label>
                        <input type="text" class="form-control form-control-sm" name="student_name" id="student_name"  placeholder="Student Name" required >
                      </div>

                      <div class="form-group col-md-6 select_sm">
                        <label>Mobile No.</label>
                        <input type="text" class="form-control form-control-sm" name="mobile" id="mobile"  placeholder="Mobile No." required >
                      </div>

                      <div class="form-group col-md-12 select_sm">
                        <label>Address</label>
                        <textarea class="form-control form-control-sm" name="name" rows="3" cols="80"></textarea>
                      </div>



                      <div class="form-group col-md-6 select_sm">
                        <label>Enter Total Fees</label>
                        <input type="text" class="form-control form-control-sm" name="total_fees" id="total_fees"  placeholder="Enter Total Fees" required >
                      </div>

                      <div class="form-group col-md-6 select_sm">
                        <label>Advance Amount</label>
                        <input type="text" class="form-control form-control-sm" name="advance_amount" id="advance_amount"  placeholder="Advance Amount" Required >
                      </div>

                      <div class="col-md-6">
                        <div class="form-group ">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">Disable This</label>
                          </div>
                        </div>
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
                <h3 class="card-title">List All Student</h3>
              </div>
              <div class="card-body p-2">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="wt_50">Action</th>
                    <th>Student Name</th>
                    <th>Mobile No.</th>
                    <th>Standard</th>
                    <th>Batch</th>
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
