
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller{
  public function __construct(){
    parent::__construct();
    date_default_timezone_set('Asia/Kolkata');
  }

/********************************** Batch *************************************/

  // Save Batch....
  public function batch_information(){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('batch_name', 'Batch Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $batch_status = $this->input->post('batch_status');
      if(!isset($batch_status)){ $batch_status = '1'; }
      $save_data = $_POST;
      $save_data['batch_status'] = $batch_status;
      $save_data['company_id'] = $coach_company_id;
      $save_data['batch_addedby'] = $coach_user_id;
      $save_data['batch_date'] = date('d-m-Y');
      $save_data['batch_time'] = date('h:i:s A');
      $batch_id = $this->Master_Model->save_data('batch', $save_data);

      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Master/batch_information');
    }

    $data['batch_list'] = $this->Master_Model->get_list_by_id3($coach_company_id,'','','','','','','batch_id','DESC','batch');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Master/batch_information', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit/Update Batch...
  public function edit_batch($batch_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('batch_name', 'First Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $batch_status = $this->input->post('batch_status');
      if(!isset($batch_status)){ $batch_status = '1'; }
      $update_data = $_POST;
      $update_data['batch_status'] = $batch_status;
      $update_data['batch_addedby'] = $coach_user_id;
      $update_data['batch_date'] = date('d-m-Y');
      $update_data['batch_time'] = date('h:i:s A');
      $this->Master_Model->update_info('batch_id', $batch_id, 'batch', $update_data);

      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Master/batch_information');
    }

    $batch_info = $this->Master_Model->get_info_arr('batch_id',$batch_id,'batch');
    if(!$batch_info){ header('location:'.base_url().'Master/batch_information'); }
    $data['update'] = 'update';
    $data['update_batch'] = 'update';
    $data['batch_info'] = $batch_info[0];
    $data['act_link'] = base_url().'Master/edit_batch/'.$batch_id;

    $data['batch_list'] = $this->Master_Model->get_list_by_id3($coach_company_id,'','','','','','','batch_id','DESC','batch');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Master/batch_information', $data);
    $this->load->view('Include/footer', $data);
  }

  //Delete Batch...
  public function delete_batch($batch_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }
    $this->Master_Model->delete_info('batch_id', $batch_id, 'batch');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/batch_information');
  }

/****************************** Medium *******************************/

  // Add Medium...
  public function medium_information(){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('medium_name', 'Batch Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $medium_status = $this->input->post('medium_status');
      if(!isset($medium_status)){ $medium_status = '1'; }
      $save_data = $_POST;
      $save_data['medium_status'] = $medium_status;
      $save_data['company_id'] = $coach_company_id;
      $save_data['medium_addedby'] = $coach_user_id;
      $save_data['medium_date'] = date('d-m-Y');
      $save_data['medium_time'] = date('h:i:s A');
      $medium_id = $this->Master_Model->save_data('medium', $save_data);

      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Master/medium_information');
    }

    $data['medium_list'] = $this->Master_Model->get_list_by_id3($coach_company_id,'','','','','','','medium_id','DESC','medium');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Master/medium_information', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit/Update Batch...
  public function edit_medium($medium_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('medium_name', 'First Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $medium_status = $this->input->post('medium_status');
      if(!isset($medium_status)){ $medium_status = '1'; }
      $update_data = $_POST;
      $update_data['medium_status'] = $medium_status;
      $update_data['medium_addedby'] = $coach_user_id;
      $update_data['medium_date'] = date('d-m-Y');
      $update_data['medium_time'] = date('h:i:s A');
      $this->Master_Model->update_info('medium_id', $medium_id, 'medium', $update_data);

      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Master/medium_information');
    }

    $medium_info = $this->Master_Model->get_info_arr('medium_id',$medium_id,'medium');
    if(!$medium_info){ header('location:'.base_url().'Master/medium_information'); }
    $data['update'] = 'update';
    $data['update_medium'] = 'update';
    $data['medium_info'] = $medium_info[0];
    $data['act_link'] = base_url().'Master/edit_medium/'.$medium_id;

    $data['medium_list'] = $this->Master_Model->get_list_by_id3($coach_company_id,'','','','','','','medium_id','DESC','medium');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Master/medium_information', $data);
    $this->load->view('Include/footer', $data);
  }

  //Delete Batch...
  public function delete_medium($medium_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }
    $this->Master_Model->delete_info('medium_id', $medium_id, 'medium');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/medium_information');
  }


/*************************************** Class ****************************/

  // Save Class...
  public function class_information(){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('class_name', 'Batch Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $class_status = $this->input->post('class_status');
      if(!isset($class_status)){ $class_status = '1'; }
      $save_data = $_POST;
      $save_data['class_status'] = $class_status;
      $save_data['company_id'] = $coach_company_id;
      $save_data['class_addedby'] = $coach_user_id;
      $save_data['class_date'] = date('d-m-Y');
      $save_data['class_time'] = date('h:i:s A');
      $class_id = $this->Master_Model->save_data('class', $save_data);

      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Master/class_information');
    }
    $data['medium_list'] = $this->Master_Model->get_list_by_id3($coach_company_id,'medium_status','1','','','','','medium_id','ASC','medium');
    $data['class_list'] = $this->Master_Model->get_list_by_id3($coach_company_id,'','','','','','','class_id','DESC','class');

    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Master/class_information', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit/Update Class...
  public function edit_class($class_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('class_name', 'Batch Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $class_status = $this->input->post('class_status');
      if(!isset($class_status)){ $class_status = '1'; }
      $update_data = $_POST;
      $update_data['class_status'] = $class_status;
      $update_data['class_addedby'] = $coach_user_id;
      $update_data['class_date'] = date('d-m-Y');
      $update_data['class_time'] = date('h:i:s A');
      $this->Master_Model->update_info('class_id', $class_id, 'class', $update_data);

      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Master/class_information');
    }

    $class_info = $this->Master_Model->get_info_arr('class_id',$class_id,'class');
    if(!$class_info){ header('location:'.base_url().'Master/class_information'); }
    $data['update'] = 'update';
    $data['update_class'] = 'update';
    $data['class_info'] = $class_info[0];
    $data['act_link'] = base_url().'Master/edit_class/'.$class_id;

    $data['medium_list'] = $this->Master_Model->get_list_by_id3($coach_company_id,'medium_status','1','','','','','medium_id','ASC','medium');
    $data['class_list'] = $this->Master_Model->get_list_by_id3($coach_company_id,'','','','','','','class_id','DESC','class');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Master/class_information', $data);
    $this->load->view('Include/footer', $data);
  }

  //Delete Class...
  public function delete_class($class_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }
    $this->Master_Model->delete_info('class_id', $class_id, 'class');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/class_information');
  }

/************************************* Receipt *********************************/
  public function receipt_information(){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Master/receipt_information');
    $this->load->view('Include/footer');
  }

  // Edit/Update Education Level...
  public function edit_receipt_information($receipt_information_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Master/receipt_information');
    $this->load->view('Include/footer');
  }

  //Delete Education Level...
  public function delete_receipt_information($receipt_information_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }
    $this->Master_Model->delete_info('receipt_information_id', $receipt_information_id, 'receipt_information');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/receipt_information');
  }


  public function student_information(){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Master/student_information');
    $this->load->view('Include/footer');
  }

  // Edit/Update Education Level...
  public function edit_student_information($student_information_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Master/student_information');
    $this->load->view('Include/footer');
  }

  //Delete Education Level...
  public function delete_student_information($student_information_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }
    $this->Master_Model->delete_info('student_information_id', $student_information_id, 'student_information');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/student_information');
  }

  public function subject_information(){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Master/subject_information');
    $this->load->view('Include/footer');
  }

  // Edit/Update Education Level...
  public function edit_subject_information($subject_information_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Master/subject_information');
    $this->load->view('Include/footer');
  }

  //Delete Education Level...
  public function delete_subject_information($subject_information_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }
    $this->Master_Model->delete_info('subject_information_id', $subject_information_id, 'subject_information');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/subject_information');
  }



  public function student_report(){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Master/student_report');
    $this->load->view('Include/footer');
  }

  // Edit/Update Education Level...
  public function edit_student_report($student_report_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Master/student_report');
    $this->load->view('Include/footer');
  }

  //Delete Education Level...
  public function delete_student_report($student_report_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }
    $this->Master_Model->delete_info('student_report_id', $student_report_id, 'student_report');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/student_report');
  }


  public function topic_content(){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Master/topic_content');
    $this->load->view('Include/footer');
  }

  // Edit/Update Education Level...
  public function edit_topic_content($topic_content_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Master/topic_content');
    $this->load->view('Include/footer');
  }

  //Delete Education Level...
  public function delete_topic_content($topic_content_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }
    $this->Master_Model->delete_info('topic_content_id', $topic_content_id, 'topic_content');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/topic_content');
  }

  public function topic_information(){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Master/topic_information');
    $this->load->view('Include/footer');
  }

  // Edit/Update Education Level...
  public function edit_topic_information($topic_information_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Master/topic_information');
    $this->load->view('Include/footer');
  }

  //Delete Education Level...
  public function delete_topic_information($topic_information_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }
    $this->Master_Model->delete_info('topic_information_id', $topic_information_id, 'topic_information');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/topic_information');
  }

/*******************************  Check Duplication  ****************************/
  public function check_duplication(){
    $column_name = $this->input->post('column_name');
    $column_val = $this->input->post('column_val');
    $table_name = $this->input->post('table_name');
    $company_id = '';
    $cnt = $this->Master_Model->check_duplication($company_id,$column_val,$column_name,$table_name);
    echo $cnt;
  }



}
?>
