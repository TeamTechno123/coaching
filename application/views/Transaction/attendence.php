<!DOCTYPE html>
<html>
<?php
  $page = "company_information";
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center mt-2">
            <h1>Attendance Information</h1>
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
                <h3 class="card-title">Attendance Information</h3>
              </div>
              <form class="input_form" action="" method="post" enctype="multipart/form-data" autocomplete="off">

                <div class="card-body row">
                  <div class="form-group col-md-12 select_sm">
                    <label>Select Branch</label>
                    <select class="form-control select2" name="branch_id" id="branch_id" data-placeholder="Select Branch" required>
                      <option value="">Select Branch</option>
                      <?php if(isset($branch_list)){ foreach ($branch_list as $list) { ?>
                      <option value="<?php echo $list->branch_id; ?>" <?php if(isset($attendance_info) && $attendance_info['branch_id'] == $list->branch_id){ echo 'selected'; } ?>><?php echo $list->branch_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Date</label>
                    <input type="text" class="form-control form-control-sm" name="attendance_date" value="<?php if(isset($attendance_info)){ echo $attendance_info['attendance_date']; } ?>" id="date1" data-target="#date1" data-toggle="datetimepicker" placeholder="Date" required>
                  </div>
                  <div class="form-group col-md-12 select_sm">
                    <label>Slect Employee</label>
                    <select class="form-control select2" name="user_id" id="user_id" data-placeholder="Slect Employee" >
                      <option value="">Slect Employee</option>
                      <?php if(isset($user_list)){ foreach ($user_list as $list) { ?>
                      <option value="<?php echo $list->user_id; ?>" <?php if(isset($attendance_info) && $attendance_info['user_id'] == $list->user_id){ echo 'selected'; } ?>><?php echo $list->user_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Office In Time</label>
                    <!-- <input type="text" id="endTime" class="form-control" > -->
                    <input type="text" class="form-control form-control-sm" name="attendance_in_time" value="<?php if(isset($attendance_info)){ echo $attendance_info['attendance_in_time']; } ?>" id="time1" data-target="#time1" data-toggle="datetimepicker" placeholder="Office In Time" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Lunch Time From</label>
                    <input type="text" class="form-control form-control-sm" name="attendance_lunch_from" value="<?php if(isset($attendance_info)){ echo $attendance_info['attendance_lunch_from']; } ?>" id="time2" data-target="#time2" data-toggle="datetimepicker" placeholder="Lunch Time From" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Lunch Time To</label>
                    <input type="text" class="form-control form-control-sm" name="attendance_lunch_to" value="<?php if(isset($attendance_info)){ echo $attendance_info['attendance_lunch_to']; } ?>" id="time3" data-target="#time3" data-toggle="datetimepicker" placeholder="Lunch Time To" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Tea Time From </label>
                    <input type="text" class="form-control form-control-sm" name="attendance_tea_from" value="<?php if(isset($attendance_info)){ echo $attendance_info['attendance_tea_from']; } ?>" id="time4" data-target="#time4" data-toggle="datetimepicker" placeholder="Tea Time From " required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Tea Time To</label>
                    <input type="text" class="form-control form-control-sm" name="attendance_tea_to" value="<?php if(isset($attendance_info)){ echo $attendance_info['attendance_tea_to']; } ?>" id="time5" data-target="#time5" data-toggle="datetimepicker" placeholder="Tea Time To" required>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Office Out Time</label>
                    <input type="text" class="form-control form-control-sm" name="attendance_out_time" value="<?php if(isset($attendance_info)){ echo $attendance_info['attendance_out_time']; } ?>" id="time6" data-target="#time6" data-toggle="datetimepicker" placeholder="Office Out Time" required>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Total Houres Worked Today</label>
                    <input type="text" class="form-control form-control-sm" name="attendance_tot_hours" id="attendance_tot_hours" value="<?php if(isset($attendance_info)){ echo $attendance_info['attendance_tot_hours']; } ?>" placeholder="Total Houres Worked Today" required>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-right">
                  <?php if(isset($update)){ ?>
                    <button type="submit" class="btn btn-primary">Update </button>
                  <?php }else{ ?>
                    <button type="submit" class="btn btn-success">Save </button>
                  <?php } ?>
                  <a href="<?php echo base_url(); ?>/User/attendence_list" class="btn btn-default ml-4">Cancel</a>
                </div>
              </form>
            </div>
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>

</body>
</html>
<script>

    $(function(){
   //    $('input[id$="endTime"]').inputmask("hh:mm", {
   //      placeholder: "HH:MM",
   //      insertMode: false,
   //      showMaskOnHover: false,
   //      hourFormat: 12
   //    }
   //
   // );

      $("#endTime").inputmask(
        "hh:mm", {
        placeholder: "HH:MM",
        insertMode: false,
        showMaskOnHover: false,
        hourFormat: 12
      }
      );


    });
  </script>
  <script>
  $(function () {
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask3').inputmask('yyyy/mm/dd', { 'placeholder': 'yyyy/mm/dd' })
    //Money Euro
    $('[data-mask]').inputmask()


  })
</script>
