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
            <h4>Topic Report</h4>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Filter</h3>
                <!-- <div class="card-tools">
                  <button type="button" class="btn btn-sm btn-primary" data-card-widget="collapse">Hide / Show </button>
                </div> -->
              </div>
              <!--  -->
                <div class="card-body p-0">
                  <form class="input_form m-0" id="form_action" role="form" action="" method="post">
                    <div class="row p-4">
                      <div class="col-md-10">
                        <div class="row">
                          <div class="form-group col-md-3 select_sm">
                            <label>Select Section</label>
                            <select class="form-control select2" name="section_id" id="section_id" data-placeholder="Select Section">
                              <option value="">Select Section</option>
                              <?php foreach ($section_list as $section_list1) { ?>
                                <option value="<?php echo $section_list1->section_id; ?>" <?php if(isset($subject_info) && $subject_info['section_id'] == $section_list1->section_id){ echo 'selected'; } ?>><?php echo $section_list1->section_name; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="form-group col-md-3 select_sm">
                            <label>Select Medium</label>
                            <select class="form-control select2" name="medium_id" id="medium_id" data-placeholder="Select Medium">
                              <option value="">Select Medium</option>
                              <?php foreach ($medium_list as $medium_list1) { ?>
                                <option value="<?php echo $medium_list1->medium_id; ?>" <?php if(isset($student_info) && $student_info['medium_id'] == $medium_list1->medium_id){ echo 'selected'; } ?>><?php echo $medium_list1->medium_name; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="form-group col-md-3 select_sm">
                            <label>Select Standard</label>
                            <select class="form-control select2" name="class_id" id="class_id" data-placeholder="Select Standard">
                              <option value="">Select Standard</option>
                              <!-- <?php if(isset($class_list)){
                                 foreach ($class_list as $class_list1) { ?>
                                <option value="<?php echo $class_list1->class_id; ?>" <?php if(isset($student_info) && $student_info['class_id'] == $class_list1->class_id){ echo 'selected'; } ?>><?php echo $class_list1->class_name; ?></option>
                              <?php } } ?> -->
                            </select>
                          </div>
                          <div class="form-group col-md-3 select_sm">
                            <label>Select Subject</label>
                            <select class="form-control select2" name="batch_id" id="batch_id" data-placeholder="Select Subject">
                              <option value="">Select Subject</option>
                              <?php foreach ($batch_list as $batch_list1) { ?>
                                <option value="<?php echo $batch_list1->batch_id; ?>" <?php if(isset($student_info) && $student_info['batch_id'] == $batch_list1->batch_id){ echo 'selected'; } ?>><?php echo $batch_list1->batch_name; ?></option>
                              <?php } ?>
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
                    <h5 class="card-title f-16">List Topic Report</h5>
                  </div>
                  <div class="card-body pt-0">

                    <table id="example2" class="table table-striped">
                      <thead>
                        <tr>
                          <th class="d-none">#</th>
                          <th class="wt_50">Action</th>
                          <th>Topic Name</th>
                          <th>Medium</th>
                          <th>Class</th>
                          <th>Section</th>
                          <th>Batch</th>
                          <th class="wt_50">Content</th>
                          <!-- <th class="wt_50">Download Content</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=0; foreach ($topic_list as $list) { $i++;
                          $medium_details = $this->Master_Model->get_info_arr_fields('medium_name','medium_id', $list->medium_id, 'medium');
                          // $class_details = $this->Master_Model->get_info_arr_fields('class_name','class_id', $list->class_id, 'class');
                          $section_details = $this->Master_Model->get_info_arr_fields('section_name','section_id', $list->section_id, 'section');
                          $batch_details = $this->Master_Model->get_info_arr_fields('batch_name','batch_id', $list->batch_id, 'batch');


                            $str_arr = explode (",", $list->class_id);
                            $class_name = '';
                            foreach ($str_arr as $class_id) {
                              $class_details = $this->Master_Model->get_info_arr_fields('class_name','class_id', $class_id, 'class');
                              if($class_details){
                                $class_name .= $class_details[0]['class_name'].', ';
                              }
                            }


                        ?>
                        <tr>
                          <td class="d-none"><?php echo $i; ?></td>
                          <td class="text-center">
                            <div class="btn-group">
                              <a href="<?php echo base_url() ?>Master/edit_topic/<?php echo $list->topic_id; ?>" type="button" class="btn btn-sm btn-default"><i class="fa fa-edit text-primary"></i></a>
                              <a href="<?php echo base_url() ?>Master/delete_topic/<?php echo $list->topic_id; ?>" type="button" class="btn btn-sm btn-default" onclick="return confirm('Delete this Subject');"><i class="fa fa-trash text-danger"></i></a>
                            </div>
                          </td>
                          <td><?php echo $list->topic_name; ?></td>
                          <td><?php if($medium_details){ echo $medium_details[0]['medium_name']; } ?></td>
                          <td><?php echo $class_name; ?></td>
                          <td><?php if($section_details){ echo $section_details[0]['section_name']; } ?></td>
                          <td><?php if($batch_details){ echo $batch_details[0]['batch_name']; } ?></td>
                          <td><a href="<?php echo base_url() ?>Master/topic_content/<?php echo $list->topic_id; ?>" type="button" class="btn btn-sm btn-info">Add</td>
                          <!-- <td><a href="<?php echo base_url() ?>Master/download_content/<?php echo $list->topic_id; ?>" type="button" class="btn btn-sm btn-info">Add</td> -->
                        </tr>
                      <?php } ?>
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

<script type="text/javascript">
  $("#medium_id").on("change", function(){
    var medium_id =  $('#medium_id').find("option:selected").val();
    $.ajax({
      url:'<?php echo base_url(); ?>Transaction/get_class_by_medium',
      type: 'POST',
      data: {"medium_id":medium_id},
      context: this,
      success: function(result){
        $('#class_id').html(result);
      }
    });
  });
</script>
