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
            <h4>Topic Content Information</h4>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-12">

            <!-- Education Level -->
            <div class="row">
              <div class="col-md-12">
                <div class="card card-default">
                  <div class="card-header">
                    <h5 class="card-title f-16"> Add New Topic Content</h5>
                  </div>
                  <form class="m-0 input_form" id="form_action" role="form" action="" method="post">
                    <div class="card-body row">
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
                        <label>Select Section Name</label>
                        <select class="form-control select2" name="section_name" id="section_name" data-placeholder="Select Section Name">
                          <option value="">Select Section Name</option>
                        </select>
                      </div>

                      <div class="form-group col-md-6 select_sm">
                        <label>Select Subject Name</label>
                        <select class="form-control select2" name="subject_name" id="subject_name" data-placeholder="Select Subject Name">
                          <option value="">Select Subject Name</option>
                        </select>
                      </div>

                      <div class="form-group col-md-6 select_sm">
                        <label>Select Topic Name</label>
                        <select class="form-control select2" name="topic_name" id="topic_name" data-placeholder="Select Topic Name">
                          <option value="">Select Topic Name</option>
                        </select>
                      </div>

                      <div class="form-group col-md-12 text-right">
                      <button type="button" id="add_row" class="btn btn-sm btn-primary">Add Row</button>
                    </div>
                    <div class="form-group col-md-12">
                      <table id="myTable" class="table table-bordered tbl_list">
                        <thead>
                        <tr>
                          <th>Name Of Document </th>
                          <th >Browse File</th>
                          <th class="wt_50"></th>
                        </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="">
                              <input type="text" class="form-control form-control-sm" name="document_name" id="document_name" value="" placeholder="Name Of Document " required>
                            </td>
                            <td class="">
                              <input type="file" class="form-control form-control-sm" name="topic_file" id="topic_file" value="" placeholder="Browse File" required>
                            </td>
                            <td class="wt_50"></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                      <div class="form-group col-md-12 text-right m-0">
                          <button id="btn_save" type="submit" class="btn btn-sm btn-primary px-4">Update</button>
                          <button id="btn_save" type="submit" class="btn btn-sm btn-success px-4">Save</button>
                      </div>
                    </div>
                  </form>
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

<script type="text/javascript">
  // Add Row...
  <?php if(isset($update)){ ?>
  var i = <?php echo $i-1; ?>
  <?php } else { ?>
  var i = 1;
  <?php } ?>

  $('#add_row').click(function(){
    i++;
    var row = ''+
    '<tr>'+
    '<td class="">'+
      '<input type="text" class="form-control form-control-sm" name="document_name" id="document_name" value="" placeholder="Name Of Document" required>'+
    '</td>'+
      '<td class="">'+
        '<input type="file" class="form-control form-control-sm" name="file_name" id="file_name" value="" placeholder="Browse File" required>'+
      '</td>'+
      '<td class="wt_50"><a class="rem_row"><i class="fa fa-trash text-danger"></i></a></td>'+
    '</tr>';
    $('#myTable').append(row);
  });

  $('#myTable').on('click', '.rem_row', function () {
   $(this).closest('tr').remove();
 });
  </script>
