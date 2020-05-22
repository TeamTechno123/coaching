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
            <h1>Project Contract Information</h1>
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
                <h3 class="card-title">Add Contract Information</h3>
              </div>
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post" enctype="multipart/form-data">
                <div class="card-body row">
                  <div class="form-group col-md-12 select_sm">
                    <label>Select Branch</label>
                    <select class="form-control select2" name="branch_id" id="branch_id" data-placeholder="Select Branch" required>
                      <option value="">Select Branch</option>
                      <?php if(isset($branch_list)){ foreach ($branch_list as $list) { ?>
                      <option value="<?php echo $list->branch_id; ?>" <?php if(isset($pro_cont_info) && $pro_cont_info['branch_id'] == $list->branch_id){ echo 'selected'; } ?>><?php echo $list->branch_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6 select_sm">
                    <label>Select Type </label>
                    <select class="form-control select2" name="project_service_type" id="project_service_type" data-placeholder="Select Type" required>
                      <option value="">Select Type</option>
                      <option value="Service" <?php if(isset($pro_cont_info) && $pro_cont_info['project_service_type'] == 'Service' ){ echo 'selected'; } ?>>Service</option>
                      <option value="Product" <?php if(isset($pro_cont_info) && $pro_cont_info['project_service_type'] == 'Product' ){ echo 'selected'; } ?>>Product</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6 select_sm">
                    <label>Select Type Of Contract</label>
                    <select class="form-control select2" name="contract_type_id" id="contract_type_id" data-placeholder="Select Type Of Contract" required>
                      <option value="">Select Type Of Contract</option>
                      <?php if(isset($contract_type_list)){ foreach ($contract_type_list as $list) { ?>
                      <option value="<?php echo $list->contract_type_id; ?>" <?php if(isset($pro_cont_info) && $pro_cont_info['contract_type_id'] == $list->contract_type_id){ echo 'selected'; } ?>><?php echo $list->contract_type_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6 select_sm">
                    <label>Select Party</label>
                    <select class="form-control select2" name="party_id" id="party_id" data-placeholder="Select Party" required>
                      <option value="">Select Party</option>
                      <?php if(isset($party_list)){ foreach ($party_list as $list) { ?>
                      <option value="<?php echo $list->party_id; ?>" <?php if(isset($pro_cont_info) && $pro_cont_info['party_id'] == $list->party_id){ echo 'selected'; } ?>><?php echo $list->party_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6 select_sm">
                    <label>Select Lead</label>
                    <select class="form-control select2" name="lead_id" id="lead_id" data-placeholder="Select Lead" >
                      <option value="">Select Lead</option>
                      <?php if(isset($lead_list)){ foreach ($lead_list as $list) { ?>
                      <option value="<?php echo $list->lead_id; ?>" <?php if(isset($pro_cont_info) && $pro_cont_info['lead_id'] == $list->lead_id){ echo 'selected'; } ?>><?php echo $list->lead_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Contract No.</label>
                    <input type="text" class="form-control form-control-sm" name="pro_cont_no" id="pro_cont_no" value="<?php if(isset($pro_cont_info)){ echo $pro_cont_info['pro_cont_no']; } elseif(isset($pro_cont_no)){ echo $pro_cont_no; } ?>" placeholder="Contract No." required readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Contract Date</label>
                    <input type="text" class="form-control form-control-sm" name="pro_cont_date" value="<?php if(isset($pro_cont_info)){ echo $pro_cont_info['pro_cont_date']; } ?>" id="date1" data-target="#date1" data-toggle="datetimepicker" placeholder="Contract Date" required>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Title Of Project Contract</label>
                    <input type="text" class="form-control form-control-sm" name="pro_cont_title" id="pro_cont_title" value="<?php if(isset($pro_cont_info)){ echo $pro_cont_info['pro_cont_title']; } ?>" placeholder="Title Of Project Contract" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Start Date</label>
                    <input type="text" class="form-control form-control-sm" name="pro_cont_s_date" value="<?php if(isset($pro_cont_info)){ echo $pro_cont_info['pro_cont_s_date']; } ?>" id="date2" data-target="#date2" data-toggle="datetimepicker" placeholder="Start Date" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label>End Date</label>
                    <input type="text" class="form-control form-control-sm" name="pro_cont_e_date" value="<?php if(isset($pro_cont_info)){ echo $pro_cont_info['pro_cont_e_date']; } ?>" id="date3" data-target="#date3" data-toggle="datetimepicker" placeholder="End Date" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Actual End Date</label>
                    <input type="text" class="form-control form-control-sm" name="pro_cont_act_e_date" value="<?php if(isset($pro_cont_info)){ echo $pro_cont_info['pro_cont_act_e_date']; } ?>" id="date4" data-target="#date4" data-toggle="datetimepicker" placeholder="Actual End Date" >
                  </div>
                  <div class="form-group col-md-4">
                    <label>Target Budget</label>
                    <input type="text" class="form-control form-control-sm" name="pro_cont_targ_bud" id="pro_cont_targ_bud" value="<?php if(isset($pro_cont_info)){ echo $pro_cont_info['pro_cont_targ_bud']; } ?>" placeholder="Target Budget" required>
                  </div>
                  <div class="form-group col-md-8 select_sm">
                    <label>Assign To </label>
                      <select class="select2 select2-hidden-accessible" id="pro_cont_ass_to" multiple="" data-placeholder="Select Branch Name" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                        <?php if(isset($user_list)){ foreach ($user_list as $list) { ?>
                        <option value="<?php echo $list->user_id; ?>"
                          <?php if(isset($pro_cont_info)){
                            $str_arr = explode (",", $pro_cont_info['pro_cont_ass_to']);
                            foreach ($str_arr as $pro_cont_ass_to) {
                              if($pro_cont_ass_to == $list->user_id){ echo 'selected'; }
                            }
                          } ?>
                          ><?php echo $list->user_name; ?></option>
                        <?php } } ?>
                      </select>
                      <input type="hidden" name="pro_cont_ass_to" id="pro_cont_ass_to2" value="<?php if(isset($pro_cont_info)){ echo $pro_cont_info['pro_cont_ass_to']; } ?>">
                    </select>
                  </div>
                  <div class="form-group col-md-3 select_sm">
                    <label>Select Status </label>
                    <select class="form-control select2" name="pro_cont_status_id" id="pro_cont_status_id" data-placeholder="Select Status " required>
                      <option value="">Select Status </option>
                      <?php if(isset($pro_cont_status_list)){ foreach ($pro_cont_status_list as $list) { ?>
                      <option value="<?php echo $list->pro_cont_status_id; ?>" <?php if(isset($pro_cont_info) && $pro_cont_info['pro_cont_status_id'] == $list->pro_cont_status_id){ echo 'selected'; } ?>><?php echo $list->pro_cont_status_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-3 select_sm">
                    <label>Select Progress</label>
                    <select class="form-control select2" name="pro_cont_progress" id="pro_cont_progress" data-placeholder="Select Progress">
                      <option value="">Select Progress</option>
                      <?php for ($i=1; $i <= 10 ; $i++) {
                        $pro_cnt = 10 * $i ; ?>
                        <option value="<?php echo $pro_cnt; ?>" <?php if(isset($pro_cont_info) && $pro_cont_info['pro_cont_progress'] == $pro_cnt){ echo 'selected'; } ?>><?php echo $pro_cnt; ?>%</option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-3 select_sm">
                    <label>Select Priority </label>
                    <select class="form-control select2" name="pro_cont_priority" id="pro_cont_priority" data-placeholder="Select Priority " required>
                      <option value="">Select Priority </option>
                      <option <?php if(isset($pro_cont_info) && $pro_cont_info['pro_cont_priority'] == 'Urgent'){ echo 'selected'; } ?>>Urgent</option>
                      <option <?php if(isset($pro_cont_info) && $pro_cont_info['pro_cont_priority'] == 'High'){ echo 'selected'; } ?>>High</option>
                      <option <?php if(isset($pro_cont_info) && $pro_cont_info['pro_cont_priority'] == 'Medium'){ echo 'selected'; } ?>>Medium</option>
                      <option <?php if(isset($pro_cont_info) && $pro_cont_info['pro_cont_priority'] == 'Low'){ echo 'selected'; } ?>>Low</option>
                    </select>
                  </div>
                  <div class="form-group col-md-3 select_sm">
                    <label>Renewal After </label>
                    <select class="form-control select2" name="pro_cont_renewal" id="pro_cont_renewal" data-placeholder="Renewal After " required>
                      <option value="">Renewal After </option>
                      <option value="3" <?php if(isset($pro_cont_info) && $pro_cont_info['pro_cont_renewal'] == '3'){ echo 'selected'; } ?>>3 Month</option>
                      <option value="6" <?php if(isset($pro_cont_info) && $pro_cont_info['pro_cont_renewal'] == '6'){ echo 'selected'; } ?>>6 Month</option>
                      <option value="12" <?php if(isset($pro_cont_info) && $pro_cont_info['pro_cont_renewal'] == '12'){ echo 'selected'; } ?>>12 Month</option>
                      <option value="24" <?php if(isset($pro_cont_info) && $pro_cont_info['pro_cont_renewal'] == '24'){ echo 'selected'; } ?>>24 Month</option>
                    </select>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Enter Description Details</label>
                    <textarea class="form-control" name="pro_cont_desc" id="pro_cont_desc" rows="3" cols="100" placeholder="Enter Description Details" required><?php if(isset($pro_cont_info)){ echo $pro_cont_info['pro_cont_desc']; } ?></textarea>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Enter Contract Terms</label>
                    <textarea class="form-control" name="pro_cont_terms" id="pro_cont_terms" rows="3" cols="100" placeholder="Enter Contract Terms" required><?php if(isset($pro_cont_info)){ echo $pro_cont_info['pro_cont_terms']; } ?></textarea>
                  </div>
                  <div class="form-group col-md-12">
                    <hr>
                    <div id="lead_child_list">
                    </div>
                  </div>

                  <div class="form-group col-md-6 text-left">
                    <label>Add Product / Service</label>
                  </div>
                  <div class="form-group col-md-6 text-right">
                    <button type="button" id="add_row" class="btn btn-sm btn-primary">Add Row</button>
                  </div>
                  <div class="form-group col-md-12">
                    <table id="myTable" class="table table-bordered tbl_list">
                      <thead>
                        <tr>
                          <th>Select Product / Service</th>
                          <th class="wt_150">Enter Qty</th>
                          <th>Approx Value</th>
                          <th class="wt_50"></th>
                        </tr>
                      </thead>
                      <tbody id="tbl_services_body">
                        <?php if(isset($pro_child_list)){ $i = 0;
                          foreach ($pro_child_list as $pro_child_list1) {
                        ?>
                          <input type="hidden" name="input[<?php echo $i; ?>][pro_child_id]" value="<?php echo $pro_child_list1->pro_child_id; ?>">
                          <tr>
                            <td>
                              <select class="form-control form-control-sm" name="input[<?php echo $i; ?>][service_id]" data-placeholder="Select Product / Service" required>
                                <option value="">Select Product / Service</option>
                                <?php if(isset($service_list)){ foreach ($service_list as $list) { ?>
                                <option value="<?php echo $list->service_id; ?>" <?php if($pro_child_list1->service_id == $list->service_id){ echo 'selected'; } ?> ><?php echo $list->service_name; ?></option>
                                <?php } } ?>
                              </select>
                            </td>
                            <td class="wt_150">
                              <input type="number" class="form-control form-control-sm" name="input[<?php echo $i; ?>][pro_child_ser_qty]" value="<?php echo $pro_child_list1->pro_child_ser_qty; ?>" placeholder="Enter Qty" required>
                            </td>
                            <td class="wt_150">
                              <input type="text" class="form-control form-control-sm" name="input[<?php echo $i; ?>][pro_child_approx_val]" value="<?php echo $pro_child_list1->pro_child_approx_val; ?>" placeholder="Approx Value" >
                            </td>
                            <td class="wt_50"><?php if($i > 0){ ?><a class="rem_row"><i class="fa fa-trash text-danger"></i></a><?php } ?></td>
                          </tr>
                        <?php $i++;  } } else{ ?>
                          <tr>
                            <td>
                              <select class="form-control form-control-sm" name="input[0][service_id]" data-placeholder="Select Product / Service" required>
                                <option value="">Select Product / Service</option>
                                <?php if(isset($service_list)){ foreach ($service_list as $list) { ?>
                                <option value="<?php echo $list->service_id; ?>" ><?php echo $list->service_name; ?></option>
                                <?php } } ?>
                              </select>
                            </td>
                            <td class="wt_150">
                              <input type="number" class="form-control form-control-sm" name="input[0][pro_child_ser_qty]" placeholder="Enter Qty" required>
                            </td>
                            <td class="wt_150">
                              <input type="text" class="form-control form-control-sm" name="input[0][pro_child_approx_val]" placeholder="Approx Value" >
                            </td>
                            <td class="wt_50"></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>

                  <div class="col-md-12">
                    <hr>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Project Contract File</label>
                  </div>
                  <div class="form-group col-md-6 text-right">
                    <button type="button" id="btn_add_image" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_add_party">Add File</button>
                  </div>
                  <div class="form-group col-md-12">
                    <table id="myTable2" class="table table-bordered tbl_list">
                      <thead>
                      <tr>
                        <th>Select File / Image</th>
                        <th class="wt_50"></th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php if(isset($pro_cont_file_list)){
                          foreach ($pro_cont_file_list as $pro_cont_file_list1) {
                        ?>
                            <td class="">
                              <a target="_blank" href="<?php echo base_url(); ?>assets/images/project_contract/<?php echo $pro_cont_file_list1->pro_cont_file_name;  ?>"><?php echo $pro_cont_file_list1->pro_cont_file_name;  ?></a>
                            </td>
                            <td class="wt_50"><a pro_cont_file_id="<?php echo $pro_cont_file_list1->pro_cont_file_id; ?>" pro_cont_file_name="<?php echo $pro_cont_file_list1->pro_cont_file_name; ?>" class="rem_img"><i class="fa fa-trash text-danger"></i></td>
                          </tr>
                        <?php  } } else{ ?>
                          <tr>
                            <td class="">
                              <input type="file" class="form-control form-control-sm" name="pro_cont_file_name[]" required>
                            </td>
                            <td class="wt_50"></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="card-footer row">
                  <div class="form-group col-md-6">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" name="pro_cont_status2" id="pro_cont_status2" value="1">
                      <label for="pro_cont_status2" class="custom-control-label">Disable This </label>
                    </div>
                  </div>
                  <div class="col-md-6 text-right">
                    <?php if(isset($update)){ ?>
                      <button id="btn_update" type="submit" class="btn btn-primary">Update </button>
                    <?php } else{ ?>
                      <button id="btn_save" type="submit" class="btn btn-success px-4">Save</button>
                    <?php } ?>
                    <a href="<?php echo base_url() ?>User/contract_information_list" class="btn btn-default ml-4">Cancel</a>
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
          '<input type="file" class="form-control form-control-sm" name="pro_cont_file_name[]"  placeholder="Approx Value" required>'+
        '</td>'+
        '<td class="wt_50"><a class="rem_row"><i class="fa fa-trash text-danger"></i></a></td>'+
      '</tr>';
      $('#myTable2').append(row);
    });

    $('#myTable2').on('click', '.rem_row', function () {
      $(this).closest('tr').remove();
    });

    $('#myTable2').on('click', '.rem_img', function () {
      var pro_cont_file_id = $(this).attr('pro_cont_file_id');
      var pro_cont_file_name = $(this).attr('pro_cont_file_name');
      $.ajax({
        url:'<?php echo base_url(); ?>Transaction/delete_pro_cont_file',
        type: 'POST',
        data: {"pro_cont_file_id":pro_cont_file_id,
               "pro_cont_file_name":pro_cont_file_name},
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


  $('#party_id').on('change',function(){
    var party_id = $('#party_id').find("option:selected").val();
    // alert(party_id);
    $.ajax({
      url:'<?php echo base_url(); ?>Transaction/get_leads_by_party',
      type: 'POST',
      data: {"party_id":party_id},
      context: this,
      success: function(result){
        $('#lead_id').html(result);
      }
    });
  });

  $('#lead_id').on('change',function(){
    var lead_id = $('#lead_id').find("option:selected").val();
    // alert(lead_id);
    $.ajax({
      url:'<?php echo base_url(); ?>Transaction/get_services_of_lead',
      type: 'POST',
      data: {"lead_id":lead_id},
      context: this,
      success: function(result){

        $('#lead_child_list').html(result);
      }
    });
  });

  $('#pro_cont_ass_to').on('change',function(){
    var pro_cont_ass_to = $(this).val();
    $('#pro_cont_ass_to2').val(pro_cont_ass_to);
  });
</script>

<script type="text/javascript">
  // Add Row...
  <?php if(isset($update)){ ?>
  var i = <?php echo $i-1; ?>;
  <?php } else { ?>
  var i = 0;
  <?php } ?>

  $('#add_row').click(function(){
    i++;
    var row = ''+
    '<tr>'+
      '<td>'+
        '<select class="form-control form-control-sm" name="input['+i+'][service_id]" data-placeholder="Select Product / Service" required>'+
          '<option value="">Select Product / Service</option>'+
          '<?php if(isset($service_list)){ foreach ($service_list as $list) { ?>'+
          '<option value="<?php echo $list->service_id; ?>" ><?php echo $list->service_name; ?></option>'+
          '<?php } } ?>'+
        '</select>'+
      '</td>'+
      '<td class="wt_150">'+
        '<input type="number" class="form-control form-control-sm" name="input['+i+'][pro_child_ser_qty]" placeholder="Enter Qty" required>'+
      '</td>'+
      '<td class="wt_150">'+
        '<input type="text" class="form-control form-control-sm" name="input['+i+'][pro_child_approx_val]" placeholder="Approx Value" >'+
      '</td>'+
      '<td class="wt_50"><a class="rem_row"><i class="fa fa-trash text-danger"></i></a></td>'+
    '</tr>';
    $('#myTable').append(row);
  });

  $('#myTable').on('click', '.rem_row', function () {
    $(this).closest('tr').remove();
  });

</script>

</body>
</html>
