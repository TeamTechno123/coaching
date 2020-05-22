<!DOCTYPE html>
<html>
<style media="screen">
  .dataTables_length{
    display: none !important;
  }
  .dataTables_filter{
    display: none !important;
  }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header pt-0 pb-2">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-left mt-2">
            <h4>Student Report</h4>
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
                <h3 class="card-title">Filter</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-sm btn-primary" data-card-widget="collapse">Hide / Show </button>
                </div>
              </div>
              <!--  -->
                <div class="card-body p-0" style="display: none;">
                  <form class="input_form m-0" id="form_action" role="form" action="" method="post">
                    <div class="row px-3">
                      <div class="col-md-10">
                        <div class="row">
                          <div class="form-group col-md-3 select_sm">
                            <label>Select Acadamic Year</label>
                            <select class="form-control select2" name="acadamic_year" id="acadamic_year" data-placeholder=" Select Acadamic Year">
                              <option value=""> Select Acadamic Year</option>
                            </select>
                          </div>

                          <div class="form-group col-md-3 select_sm">
                            <label>Select Medium</label>
                            <select class="form-control select2" name="medium" id="medium" data-placeholder=" Select Medium">
                              <option value=""> Select Medium</option>
                            </select>
                          </div>


                          <div class="form-group col-md-3 select_sm">
                            <label>Select Standard</label>
                            <select class="form-control select2" name="standard" id="standard" data-placeholder=" Select Standard">
                              <option value=""> Select Standard</option>
                            </select>
                          </div>

                          <div class="form-group col-md-3 select_sm">
                            <label>Select Batch</label>
                            <select class="form-control select2" name="Batch" id="Batch" data-placeholder=" Select Batch">
                              <option value=""> Select Batch</option>
                            </select>
                          </div>

                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group col-md-2 text-right mt-4">
                          <button id="btn_save" type="submit" class="btn btn-sm btn-primary px-4">Get</button>
                        </div>
                      </div>

                      </div>

                  </form>
                </div>
            </div>
          </div>

          <div class="col-md-12">

            <!-- Education Level -->
            <div class="row">

              <div class="col-md-12">
                <div class="card card-default">
                  <div class="card-header">
                    <h5 class="card-title f-16">List All Student Report</h5>
                  </div>
                  <div class="card-body pt-0">

                    <div class="row mt-3">
                      <div class="col-md-3">
                        <p>Acadamic Year :2020-21</p>
                      </div>
                      <div class="col-md-3">
                        <p>Medium name : English</p>
                      </div>
                      <div class="col-md-3">
                        <p>Standard Name : 10th</p>
                      </div>
                      <div class="col-md-3">
                          <p>Batch Name : Morning </p>
                      </div>
                    </div>

                    <table id="example2" class="table table-striped">
                      <thead>
                      <tr>
                        <th style="display:none;">#</th>
                        <th>Student Name</th>
                        <th>Mobile No.</th>
                        <th>Total Fees</th>
                        <th>Advance Fees</th>
                        <th>Total Received Fees</th>
                        <th>Balance Fees </th>
                        <th>Status</th>
                        <th class="wt_50">Action</th>
                      </tr>
                      </thead>
                      <tbody>

                          <tr>
                            <td style="display:none;"></td>
                            <td>asdf</td>
                            <td>asdf</td>
                            <td>asdf</td>
                            <td>asdf</td>
                            <td>asdf</td>
                            <td>asdf</td>
                            <td>asdf</td>
                            <td>
                              <div class="btn-group">
                                <a href="<?php echo base_url(); ?>Master/edit_education_level/" class="btn btn-sm btn-default"><i class="fa fa-edit text-primary"></i></a>
                                <a href="<?php echo base_url(); ?>Master/delete_education_level/" class="btn btn-sm btn-default" onclick="return confirm('Delete this Education Level');" ><i class="fa fa-trash text-danger"></i></a>
                              </div>
                            </td>
                          </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- // Education Level -->



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
