
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller{
  public function __construct(){
    parent::__construct();
    date_default_timezone_set('Asia/Kolkata');
  }

  public function batch_information(){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Master/batch_information');
    $this->load->view('Include/footer');
  }

  // Edit/Update Education Level...
  public function edit_batch_information($batch_information_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Master/batch_information');
    $this->load->view('Include/footer');
  }

  //Delete Education Level...
  public function delete_batch_information($batch_information_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }
    $this->User_Model->delete_info('batch_information_id', $batch_information_id, 'batch_information');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/batch_information');
  }


  public function medium_information(){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Master/medium_information');
    $this->load->view('Include/footer');
  }

  // Edit/Update Education Level...
  public function edit_medium_information($medium_information_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Master/medium_information');
    $this->load->view('Include/footer');
  }

  //Delete Education Level...
  public function delete_medium_information($medium_information_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }
    $this->User_Model->delete_info('medium_information_id', $medium_information_id, 'medium_information');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/medium_information');
  }

  public function class_information(){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Master/class_information');
    $this->load->view('Include/footer');
  }

  // Edit/Update Education Level...
  public function edit_class_information($class_information_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }

    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Master/class_information');
    $this->load->view('Include/footer');
  }

  //Delete Education Level...
  public function delete_class_information($class_information_id){
    $coach_user_id = $this->session->userdata('coach_user_id');
    $coach_company_id = $this->session->userdata('coach_company_id');
    $coach_role_id = $this->session->userdata('coach_role_id');
    if($coach_user_id == '' && $coach_company_id == ''){ header('location:'.base_url().'User'); }
    $this->User_Model->delete_info('class_information_id', $class_information_id, 'class_information');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/class_information');
  }


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
    $this->User_Model->delete_info('receipt_information_id', $receipt_information_id, 'receipt_information');
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
    $this->User_Model->delete_info('student_information_id', $student_information_id, 'student_information');
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
    $this->User_Model->delete_info('subject_information_id', $subject_information_id, 'subject_information');
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
    $this->User_Model->delete_info('student_report_id', $student_report_id, 'student_report');
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
    $this->User_Model->delete_info('topic_content_id', $topic_content_id, 'topic_content');
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
    $this->User_Model->delete_info('topic_information_id', $topic_information_id, 'topic_information');
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
