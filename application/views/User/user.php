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
            <h1>User Information</h1>
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
                <h3 class="card-title">Add User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="form_action" role="form" action="" method="post" enctype="multipart/form-data">
                <div class="card-body row">

                  <div class="form-group col-md-6 select_sm">
                    <label>Select Group Name</label>
                    <select class="form-control select2" name="group_id" id="group_id" data-placeholder="Select Group Name" required>
                      <option value="">Select Group Name</option>
                      <?php if(isset($group_list)){ foreach ($group_list as $list) { ?>
                      <option value="<?php echo $list->group_id; ?>" <?php if(isset($user_info) && $user_info['group_id'] == $list->group_id){ echo 'selected'; } ?>><?php echo $list->group_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6 select_sm">
                    <label>Select Role Name</label>
                    <select class="form-control select2" name="role_id" id="role_id" data-placeholder="Select Role Name" required>
                      <option value="">Select Role Name</option>
                      <?php if(isset($role_list)){ foreach ($role_list as $list) { ?>
                      <option value="<?php echo $list->role_id; ?>" <?php if(isset($user_info) && $user_info['role_id'] == $list->role_id){ echo 'selected'; } ?>><?php echo $list->role_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <?php
                   ?>
                  <div class="form-group col-md-12 select_sm" data-select2-id="48">
                    <label>Select Branch Name*</label>
                    <select class="select2 select2-hidden-accessible" id="branch_id" multiple="" data-placeholder="Select Branch Name" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                      <?php if(isset($branch_list)){ foreach ($branch_list as $list) { ?>
                      <option value="<?php echo $list->branch_id; ?>"
                        <?php if(isset($user_info)){
                          $str_arr = explode (",", $user_info['branch_id']);
                          foreach ($str_arr as $branch_id) {
                            if($branch_id == $list->branch_id){ echo 'selected'; }
                          }
                        } ?>
                        ><?php echo $list->branch_name; ?></option>
                      <?php } } ?>
                    </select>
                    <input type="hidden" name="branch_id" id="branch_id2" value="<?php if(isset($user_info)){ echo $user_info['branch_id']; } ?>">
                  </div>
                  <div class="form-group col-md-12">
                    <label>Enter Name Of Employee</label>
                    <input type="text" class="form-control" name="user_name" id="user_name" value="<?php if(isset($user_info)){ echo $user_info['user_name']; } ?>" placeholder="Enter Name of Employee" required>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Enter Address</label>
                    <textarea class="form-control form-control-sm" name="user_city" id="user_city" rows="3" cols="95"><?php if(isset($user_info)){ echo $user_info['user_city']; } ?></textarea>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Mobile No. 1</label>
                    <input type="number" class="form-control form-control-sm" name="user_mobile" id="user_mobile" value="<?php if(isset($user_info)){ echo $user_info['user_mobile']; } ?>" placeholder="Mobile No. 1" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Mobile No. 2 </label>
                    <input type="number" class="form-control form-control-sm" name="user_mobile2" id="user_mobile2" value="<?php if(isset($user_info)){ echo $user_info['user_mobile2']; } ?>" placeholder="Mobile No. 2">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Email Id</label>
                    <input type="email" class="form-control form-control-sm" name="user_email" id="user_email" value="<?php if(isset($user_info)){ echo $user_info['user_email']; } ?>" placeholder="Email" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Website</label>
                    <input type="text" class="form-control form-control-sm" name="user_website" id="user_website" value="<?php if(isset($user_info)){ echo $user_info['user_website']; } ?>" placeholder="Website">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Date Of Birth</label>
                    <input type="text" class="form-control form-control-sm" name="user_dob" value="<?php if(isset($user_info)){ echo $user_info['user_dob']; } ?>" id="date1" data-target="#date1" data-toggle="datetimepicker" placeholder="Date Of Birth">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Anniversary On</label>
                    <input type="text" class="form-control form-control-sm" name="user_anniversary" value="<?php if(isset($user_info)){ echo $user_info['user_anniversary']; } ?>" id="date2" data-target="#date2" data-toggle="datetimepicker" placeholder="Anniversary On">
                  </div>
                  <div class="form-group col-md-6">
                    <label>PAN No.</label>
                    <input type="text" class="form-control form-control-sm" name="user_pan" id="user_pan" value="<?php if(isset($user_info)){ echo $user_info['user_pan']; } ?>" placeholder="PAN No." >
                  </div>
                  <div class="form-group col-md-6">
                    <label>Adhar No.</label>
                    <input type="text" class="form-control form-control-sm" name="user_adhar" id="user_adhar" value="<?php if(isset($user_info)){ echo $user_info['user_adhar']; } ?>" placeholder="Adhar No.">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Bank Name</label>
                    <input type="text" class="form-control form-control-sm" name="user_bank" id="user_bank" value="<?php if(isset($user_info)){ echo $user_info['user_bank']; } ?>" placeholder="Bank Name">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Account No.</label>
                    <input type="text" class="form-control form-control-sm" name="user_acc_no" id="user_acc_no" value="<?php if(isset($user_info)){ echo $user_info['user_acc_no']; } ?>" placeholder="Account No.">
                  </div>
                  <div class="form-group col-md-4">
                    <label>IFSC Code</label>
                    <input type="text" class="form-control form-control-sm" name="user_bank_ifsc" id="user_bank_ifsc" value="<?php if(isset($user_info)){ echo $user_info['user_bank_ifsc']; } ?>" placeholder="IFSC Code">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Employment Start Date</label>
                    <input type="text" class="form-control form-control-sm" name="user_start_date" id="user_start_date" value="<?php if(isset($user_info)){ echo $user_info['user_start_date']; } ?>" placeholder="Employment Start Date" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Employment End Date</label>
                    <input type="text" class="form-control form-control-sm" name="user_end_date" id="user_end_date" value="<?php if(isset($user_info)){ echo $user_info['user_end_date']; } ?>" placeholder="Employment End Date">
                  </div>
                  <div class="form-group col-md-12">
                    <hr>
                  </div>
                  <div class="form-group col-md-6">
                    <label>User File</label>
                  </div>
                  <div class="form-group col-md-6 text-right">
                    <button type="button" id="btn_add_image" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_add_party">Add File</button>
                  </div>
                  <div class="form-group col-md-12">
                    <table id="myTable" class="table table-bordered tbl_list">
                      <thead>
                      <tr>
                        <th>Select File / Image</th>
                        <th class="wt_50"></th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php if(isset($user_file_list)){ $i = 0;
                          foreach ($user_file_list as $user_file_list1) {
                        ?>
                            <td class="">
                              <a target="_blank" href="<?php echo base_url(); ?>assets/images/user/<?php echo $user_file_list1->user_file_name;  ?>"><?php echo $user_file_list1->user_file_name;  ?></a>
                            </td>
                            <td class="wt_50"><a user_file_id="<?php echo $user_file_list1->user_file_id; ?>" user_file_name="<?php echo $user_file_list1->user_file_name; ?>" class="rem_img"><i class="fa fa-trash text-danger"></i></td>
                          </tr>
                        <?php $i++;  } } else{ ?>
                          <tr>
                            <td class="">
                              <input type="file" class="form-control form-control-sm" name="user_file_name[]"  placeholder="Approx Value" required>
                            </td>
                            <td class="wt_50"></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer row">
                  <div class="col-md-6">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" name="user_status" id="user_status" value="0">
                      <label for="composition_scheme" class="custom-control-label">Disable This User</label>
                    </div>
                  </div>
                  <div class="col-md-6 text-right">
                    <?php if(isset($update)){ ?>
                      <button id="btn_update" type="submit" class="btn btn-primary">Update </button>
                    <?php } else{ ?>
                      <button id="btn_save" type="submit" class="btn btn-success px-4">Save</button>
                    <?php } ?>
                    <a href="<?php echo base_url() ?>User/dashboard" class="btn btn-default ml-4">Cancel</a>
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
    // Add Row...


    $('#btn_add_image').click(function(){
      var row = ''+
      '<tr>'+
        '<td class="">'+
          '<input type="file" class="form-control form-control-sm" name="user_file_name[]"  placeholder="Approx Value" required>'+
        '</td>'+
        '<td class="wt_50"><a class="rem_row"><i class="fa fa-trash text-danger"></i></a></td>'+
      '</tr>';
      $('#myTable').append(row);
    });

    $('#myTable').on('click', '.rem_row', function () {
      $(this).closest('tr').remove();
    });

    $('#myTable').on('click', '.rem_img', function () {
      var user_file_id = $(this).attr('user_file_id');
      var user_file_name = $(this).attr('user_file_name');
      $.ajax({
        url:'<?php echo base_url(); ?>User/delete_user_file',
        type: 'POST',
        data: {"user_file_id":user_file_id,
               "user_file_name":user_file_name},
        context: this,
        success: function(result){
          $(this).closest('tr').remove();
          toastr.error('Deleted successfully');
        }
      });
      // $(this).closest('tr').remove();
    });

  </script>

<script type="text/javascript">
// Check Mobile Duplication..
  var user_mobile1 = $('#user_mobile').val();
  $('#user_mobile').on('change',function(){
    var user_mobile = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/check_duplication',
      type: 'POST',
      data: {"column_name":"user_mobile",
             "column_val":user_mobile,
             "table_name":"user"},
      context: this,
      success: function(result){
        if(result > 0){
          $('#user_mobile').val(user_mobile1);
          toastr.error(user_mobile+' Mobile No Exist.');
        }
      }
    });
  });

// Check Email Duplication..
  var user_email1 = $('#mobile').val();
  $('#user_email').on('change',function(){
    var user_email = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/check_duplication',
      type: 'POST',
      data: {"column_name":"user_email",
             "column_val":user_email,
             "table_name":"user"},
      context: this,
      success: function(result){
        if(result > 0){
          $('#user_email').val(user_email1);
          toastr.error(user_email+' Email Id Exist.');
        }
      }
    });
  });

  $('#branch_id').on('change',function(){
    var branch_id = $(this).val();
    $('#branch_id2').val(branch_id);
  });
</script>



</body>
</html>
