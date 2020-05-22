<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('User_Model');
    $this->load->model('Transaction_Model');
    date_default_timezone_set('Asia/Kolkata');
  }

/******************************************* Task ************************************/

  // Task List...
  public function task_information_list(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $data['task_list'] = $this->User_Model->get_list($crm_company_id,'task_id','DESC','task');

    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Transaction/task_information_list',$data);
    $this->load->view('Include/footer',$data);
  }

  //Add Stock
  public function task_information(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('task_name', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $task_status = $_POST['task_status'];
      if(!isset($task_status)){ $task_status = 1; }

      $save_data = $_POST;
      $save_data['company_id'] = $crm_company_id;
      $save_data['task_status'] = $task_status;
      $save_data['task_addedby'] = $crm_user_id;
      $save_data['task_date'] = date('d-m-Y');
      $save_data['task_time'] = date('h:i:s A');

      $this->User_Model->save_data('task', $save_data);
      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Transaction/task_information_list');
    }

    $data['task_status_list'] = $this->User_Model->get_list_by_id('task_status_status',1,'','','task_status_id','ASC','task_status');
    $data['task_stage_list'] = $this->User_Model->get_list_by_id('task_stage_status',1,'','','task_stage_id','ASC','task_stage');
    $data['task_priority_list'] = $this->User_Model->get_list_by_id('task_priority_status',1,'','','task_priority_id','ASC','task_priority');
    $data['task_type_list'] = $this->User_Model->get_list_by_id('task_type_status',1,'','','task_type_id','ASC','task_type');
    $data['user_list'] = $this->User_Model->get_list_by_id('user_status',1,'is_admin','0','user_id','ASC','user');
    $data['pro_cont_list'] = $this->User_Model->get_list_by_id('pro_cont_status2',1,'','','pro_cont_id','DESC','project_contract');
    $data['branch_list'] = $this->User_Model->get_list2('branch_id','ASC','branch');

    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Transaction/task_information', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit/Update Task...
  public function edit_task($task_id){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('task_name', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $task_status = $_POST['task_status'];
      if(!isset($task_status)){ $task_status = 1; }

      $update_data = $_POST;
      $update_data['task_status'] = $task_status;
      $update_data['task_addedby'] = $crm_user_id;
      $update_data['task_date'] = date('d-m-Y');
      $update_data['task_time'] = date('h:i:s A');

      $this->User_Model->update_info('task_id', $task_id, 'task', $update_data);
      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Transaction/task_information_list');
    }

    $task_info = $this->User_Model->get_info_arr('task_id', $task_id, 'task');
    if(!$task_info){ header('location:'.base_url().'Transaction/task_information_list'); }
    $data['task_info'] = $task_info[0];
    $data['update'] = 'update';

    $data['task_status_list'] = $this->User_Model->get_list_by_id('task_status_status',1,'','','task_status_id','ASC','task_status');
    $data['task_stage_list'] = $this->User_Model->get_list_by_id('task_stage_status',1,'','','task_stage_id','ASC','task_stage');
    $data['task_priority_list'] = $this->User_Model->get_list_by_id('task_priority_status',1,'','','task_priority_id','ASC','task_priority');
    $data['task_type_list'] = $this->User_Model->get_list_by_id('task_type_status',1,'','','task_type_id','ASC','task_type');
    $data['user_list'] = $this->User_Model->get_list_by_id('user_status',1,'is_admin','0','user_id','ASC','user');
    $data['pro_cont_list'] = $this->User_Model->get_list_by_id('pro_cont_status2',1,'','','pro_cont_id','DESC','project_contract');
    $data['branch_list'] = $this->User_Model->get_list2('branch_id','ASC','branch');

    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Transaction/task_information', $data);
    $this->load->view('Include/footer', $data);
  }

  // Delete Task...
  public function delete_task($task_id){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $this->User_Model->delete_info('task_id', $task_id, 'task');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Transaction/task_information_list');
  }


/************************************************ Ticket Information *************************************/

  // Ticket Information List...
  public function ticket_information_list(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $data['ticket_list'] = $this->User_Model->get_list($crm_company_id,'ticket_id','DESC','ticket');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Transaction/ticket_information_list',$data);
    $this->load->view('Include/footer',$data);
  }

  //Add Ticket Information
  public function ticket_information(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('ticket_no', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $save_data = $_POST;
      $save_data['company_id'] = $crm_company_id;
      $save_data['ticket_addedby'] = $crm_user_id;
      $save_data['ticket_date2'] = date('d-m-Y');
      $save_data['ticket_time2'] = date('h:i:s A');
      $this->User_Model->save_data('ticket', $save_data);
      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Transaction/ticket_information_list');
    }
    $data['ticket_no'] = $this->User_Model->get_count_no($crm_company_id, 'ticket_no', 'ticket');
    $data['party_list'] = $this->User_Model->get_list_by_id('party_status',1,'','','party_id','ASC','party');
    $data['ticket_status_list'] = $this->User_Model->get_list_by_id('ticket_status_status',1,'','','ticket_status_id','ASC','ticket_status');
    $data['ticket_priority_list'] = $this->User_Model->get_list_by_id('ticket_priority_status',1,'','','ticket_priority_id','ASC','ticket_priority');
    $data['ticket_reporting_list'] = $this->User_Model->get_list_by_id('ticket_reporting_status',1,'','','ticket_reporting_id','ASC','ticket_reporting');
    $data['group_list'] = $this->User_Model->get_list_by_id('','','','','group_id','ASC','group');
    $data['user_list'] = $this->User_Model->get_list_by_id('user_status',1,'is_admin','0','user_id','ASC','user');
    $data['branch_list'] = $this->User_Model->get_list2('branch_id','ASC','branch');
    // $data['pro_cont_list'] = $this->User_Model->get_list_by_id('pro_cont_status2',1,'','','pro_cont_id','DESC','project_contract');

    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Transaction/ticket_information', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit / Update Ticket....
  public function edit_ticket($ticket_id){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('ticket_no', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $update_data = $_POST;
      $update_data['ticket_addedby'] = $crm_user_id;
      $update_data['ticket_date2'] = date('d-m-Y');
      $update_data['ticket_time2'] = date('h:i:s A');
      $this->User_Model->update_info('ticket_id', $ticket_id, 'ticket', $update_data);
      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Transaction/ticket_information_list');
    }

    $ticket_info = $this->User_Model->get_info_arr('ticket_id', $ticket_id, 'ticket');
    if(!$ticket_info){ header('location:'.base_url().'Transaction/ticket_information_list'); }
    $data['ticket_info'] = $ticket_info[0];
    $data['update'] = 'update';
    $party_id = $ticket_info[0]['party_id'];

    $data['party_list'] = $this->User_Model->get_list_by_id('party_status',1,'','','party_id','ASC','party');
    $data['ticket_status_list'] = $this->User_Model->get_list_by_id('ticket_status_status',1,'','','ticket_status_id','ASC','ticket_status');
    $data['ticket_priority_list'] = $this->User_Model->get_list_by_id('ticket_priority_status',1,'','','ticket_priority_id','ASC','ticket_priority');
    $data['ticket_reporting_list'] = $this->User_Model->get_list_by_id('ticket_reporting_status',1,'','','ticket_reporting_id','ASC','ticket_reporting');
    $data['group_list'] = $this->User_Model->get_list_by_id('','','','','group_id','ASC','group');
    $data['user_list'] = $this->User_Model->get_list_by_id('user_status',1,'is_admin','0','user_id','ASC','user');
    $data['pro_cont_list'] = $this->User_Model->get_list_by_id('pro_cont_status2',1,'party_id',$party_id,'pro_cont_id','DESC','project_contract');
    $data['branch_list'] = $this->User_Model->get_list2('branch_id','ASC','branch');

    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Transaction/ticket_information', $data);
    $this->load->view('Include/footer', $data);
  }

  // Delete Ticket...
  public function delete_ticket($ticket_id){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $this->User_Model->delete_info('ticket_id', $ticket_id, 'ticket');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Transaction/ticket_information_list');
  }

/********************************************** Lead Information ********************************************/

  // Issue List...
  public function lead_information_list(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $data['lead_list'] = $this->User_Model->get_list_by_id('company_id',$crm_company_id,'','','lead_id','DESC','lead');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Transaction/lead_information_list',$data);
    $this->load->view('Include/footer',$data);
  }

  //Add Stock
  public function lead_information(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('lead_no', 'Type', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $save_data = $_POST;
      unset($save_data['input']);
      $save_data['company_id'] = $crm_company_id;
      $save_data['lead_addedby'] = $crm_user_id;
      $save_data['lead_date2'] = date('d-m-Y');
      $save_data['lead_time2'] = date('h:i:s A');
      $lead_id = $this->User_Model->save_data('lead', $save_data);

      foreach($_POST['input'] as $multi_data){
        $multi_data['lead_id'] = $lead_id;
        $this->db->insert('lead_child', $multi_data);
      }

      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Transaction/lead_information_list');
    }

    $data['lead_no'] = $this->User_Model->get_count_no($crm_company_id, 'lead_no', 'lead');
    $data['party_type_list'] = $this->User_Model->get_list2('party_type_id','ASC','party_type');
    $data['country_list'] = $this->User_Model->get_list2('country_name','ASC','country');
    $data['state_list'] = $this->User_Model->get_list2('','ASC','state');
    $data['district_list'] = $this->User_Model->get_list2('district_name','ASC','district');
    $data['party_list'] = $this->User_Model->get_list_by_id('party_status',1,'','','party_id','ASC','party');
    $data['branch_list'] = $this->User_Model->get_list2('branch_id','ASC','branch');

    $data['lead_source_list'] = $this->User_Model->get_list_by_id('lead_source_status',1,'','','lead_source_id','ASC','lead_source');
    $data['sales_stage_list'] = $this->User_Model->get_list_by_id('sales_stage_status',1,'','','sales_stage_id','ASC','sales_stage');
    $data['lead_probability_list'] = $this->User_Model->get_list_by_id('lead_probability_status',1,'','','lead_probability_id','ASC','lead_probability');
    $data['lead_status_list'] = $this->User_Model->get_list_by_id('lead_status_status',1,'','','lead_status_id','ASC','lead_status');
    $data['user_list'] = $this->User_Model->get_list_by_id('user_status',1,'is_admin','0','user_id','ASC','user');
    $data['service_list'] = $this->User_Model->get_list_by_id('service_status',1,'','','service_id','ASC','service');

    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Transaction/lead_information', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit / Update Lead...
  public function edit_lead($lead_id){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('lead_no', 'Type', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $update_data = $_POST;
      unset($update_data['input']);
      $update_data['lead_addedby'] = $crm_user_id;
      $update_data['lead_date2'] = date('d-m-Y');
      $update_data['lead_time2'] = date('h:i:s A');

      $this->User_Model->update_info('lead_id', $lead_id, 'lead', $update_data);

      foreach($_POST['input'] as $multi_data){
        if(isset($multi_data['lead_child_id'])){
          $lead_child_id = $multi_data['lead_child_id'];
          if(!isset($multi_data['service_id'])){
            $this->User_Model->delete_info('lead_child_id', $lead_child_id, 'lead_child');
          }else{
            $this->User_Model->update_info('lead_child_id', $lead_child_id, 'lead_child', $multi_data);
          }
        }
        else{
          $multi_data['lead_id'] = $lead_id;
          $this->db->insert('lead_child', $multi_data);
        }
      }

      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Transaction/lead_information_list');
    }

    $lead_info = $this->User_Model->get_info_arr('lead_id', $lead_id, 'lead');
    if(!$lead_info){ header('location:'.base_url().'Transaction/lead_information_list'); }
    $data['lead_info'] = $lead_info[0];
    $data['update'] = 'update';

    $data['party_type_list'] = $this->User_Model->get_list2('party_type_id','ASC','party_type');
    $data['country_list'] = $this->User_Model->get_list2('country_name','ASC','country');
    $data['state_list'] = $this->User_Model->get_list2('','ASC','state');
    $data['district_list'] = $this->User_Model->get_list2('district_name','ASC','district');
    $data['branch_list'] = $this->User_Model->get_list2('branch_id','ASC','branch');

    $data['party_list'] = $this->User_Model->get_list_by_id('party_status',1,'','','party_id','ASC','party');
    $data['lead_source_list'] = $this->User_Model->get_list_by_id('lead_source_status',1,'','','lead_source_id','ASC','lead_source');
    $data['sales_stage_list'] = $this->User_Model->get_list_by_id('sales_stage_status',1,'','','sales_stage_id','ASC','sales_stage');
    $data['lead_probability_list'] = $this->User_Model->get_list_by_id('lead_probability_status',1,'','','lead_probability_id','ASC','lead_probability');
    $data['lead_status_list'] = $this->User_Model->get_list_by_id('lead_status_status',1,'','','lead_status_id','ASC','lead_status');
    $data['user_list'] = $this->User_Model->get_list_by_id('user_status',1,'is_admin','0','user_id','ASC','user');
    $data['service_list'] = $this->User_Model->get_list_by_id('service_status',1,'','','service_id','ASC','service');
    $data['lead_child_list'] = $this->User_Model->get_list_by_id('lead_id',$lead_id,'','','lead_child_id','ASC','lead_child');

    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Transaction/lead_information', $data);
    $this->load->view('Include/footer', $data);

  }

  // Delete Lead....
  public function delete_lead($lead_id){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $this->User_Model->delete_info('lead_id', $lead_id, 'lead');
    $this->User_Model->delete_info('lead_id', $lead_id, 'lead_child');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Transaction/lead_information_list');
  }

/****************************************************** Project Contract Information ***************************************/

  public function project_contract_list(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $data['project_contract_list'] = $this->User_Model->get_list_by_id('company_id',$crm_company_id,'','','pro_cont_id','DESC','project_contract');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Transaction/project_contract_list',$data);
    $this->load->view('Include/footer',$data);
  }

  //Add Stock
  public function project_contract(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('project_service_type', 'Type', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $save_data = $_POST;
      unset($save_data['input']);
      unset($update_data['pro_cont_file_name']);
      $save_data['company_id'] = $crm_company_id;
      $save_data['pro_cont_addedby'] = $crm_user_id;
      $save_data['pro_cont_date2'] = date('d-m-Y');
      $save_data['pro_cont_time'] = date('h:i:s A');
      $pro_cont_id = $this->User_Model->save_data('project_contract', $save_data);

      $lead_id = $_POST['lead_id'];
      $lead_up_data['lead_used'] = 1;
      $this->User_Model->update_info('lead_id', $lead_id, 'lead', $lead_up_data);

      foreach($_POST['input'] as $multi_data){
        $multi_data['pro_cont_id'] = $pro_cont_id;
        $this->db->insert('pro_child', $multi_data);
      }

      if(isset($_FILES['pro_cont_file_name']['name'])){
        $this->load->library('upload');
        $files = $_FILES;
        $cpt = count($_FILES['pro_cont_file_name']['name']);
        for($i=0; $i<$cpt; $i++)
        {
          $j = $i+1;
          $time = time();
          $image_name = 'pro_cont_'.$pro_cont_id.'_'.$j.'_'.$time;
            $_FILES['pro_cont_file_name']['name']= $files['pro_cont_file_name']['name'][$i];
            $_FILES['pro_cont_file_name']['type']= $files['pro_cont_file_name']['type'][$i];
            $_FILES['pro_cont_file_name']['tmp_name']= $files['pro_cont_file_name']['tmp_name'][$i];
            $_FILES['pro_cont_file_name']['error']= $files['pro_cont_file_name']['error'][$i];
            $_FILES['pro_cont_file_name']['size']= $files['pro_cont_file_name']['size'][$i];
            $config['upload_path'] = 'assets/images/project_contract/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|docx|ppt';
            $config['file_name'] = $image_name;
            $config['overwrite']     = FALSE;
            $filename = $files['pro_cont_file_name']['name'][$i];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $this->upload->initialize($config);
            if($this->upload->do_upload('pro_cont_file_name')){
              $file_data['pro_cont_id'] = $pro_cont_id;
              $file_data['pro_cont_file_name'] = $image_name.'.'.$ext;
              $this->User_Model->save_data('pro_cont_file', $file_data);
            }
            else{
              $error = $this->upload->display_errors();
              $this->session->set_flashdata('status',$this->upload->display_errors());
            }
        }
      }

      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Transaction/project_contract_list');
    }
    $data['pro_cont_no'] = $this->User_Model->get_count_no($crm_company_id, 'pro_cont_no', 'project_contract');
    $data['contract_type_list'] = $this->User_Model->get_list_by_id('contract_type_status',1,'','','contract_type_id','ASC','contract_type');
    $data['party_list'] = $this->User_Model->get_list_by_id('party_status',1,'','','party_name','ASC','party');
    $data['pro_cont_status_list'] = $this->User_Model->get_list_by_id('pro_cont_status_status',1,'','','pro_cont_status_id','ASC','pro_cont_status');
    // $data['lead_list'] = $this->User_Model->get_list_by_id('lead_status2',1,'','','lead_name','ASC','lead');
    $data['user_list'] = $this->User_Model->get_list_by_id('user_status',1,'is_admin','0','user_name','ASC','user');
    $data['service_list'] = $this->User_Model->get_list_by_id('service_status',1,'','','service_id','ASC','service');
    $data['branch_list'] = $this->User_Model->get_list2('branch_id','ASC','branch');

    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Transaction/project_contract', $data);
    $this->load->view('Include/footer', $data);
  }

  //Add Stock
  public function edit_project_contract($pro_cont_id){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('project_service_type', 'Type', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $update_data = $_POST;
      unset($update_data['input']);
      unset($update_data['pro_cont_file_name']);
      $update_data['pro_cont_addedby'] = $crm_user_id;
      $update_data['pro_cont_date2'] = date('d-m-Y');
      $update_data['pro_cont_time'] = date('h:i:s A');
      $this->User_Model->update_info('pro_cont_id', $pro_cont_id, 'project_contract', $update_data);

      $lead_id = $_POST['lead_id'];
      $lead_up_data['lead_used'] = 1;
      $this->User_Model->update_info('lead_id', $lead_id, 'lead', $lead_up_data);

      foreach($_POST['input'] as $multi_data){
        if(isset($multi_data['pro_child_id'])){
          $pro_child_id = $multi_data['pro_child_id'];
          if(!isset($multi_data['service_id'])){
            $this->User_Model->delete_info('pro_child_id', $pro_child_id, 'pro_child');
          }else{
            $this->User_Model->update_info('pro_child_id', $pro_child_id, 'pro_child', $multi_data);
          }
        }
        else{
          $multi_data['pro_cont_id'] = $pro_cont_id;
          $this->db->insert('pro_child', $multi_data);
        }
      }

      if(isset($_FILES['pro_cont_file_name']['name'])){
        // $this->load->library('upload');
        $files = $_FILES;
        $cpt = count($_FILES['pro_cont_file_name']['name']);
        for($i=0; $i<$cpt; $i++)
        {
          $j = $i+1;
          $time = time();
          $image_name = 'pro_cont_'.$pro_cont_id.'_'.$j.'_'.$time;
            $_FILES['pro_cont_file_name']['name']= $files['pro_cont_file_name']['name'][$i];
            $_FILES['pro_cont_file_name']['type']= $files['pro_cont_file_name']['type'][$i];
            $_FILES['pro_cont_file_name']['tmp_name']= $files['pro_cont_file_name']['tmp_name'][$i];
            $_FILES['pro_cont_file_name']['error']= $files['pro_cont_file_name']['error'][$i];
            $_FILES['pro_cont_file_name']['size']= $files['pro_cont_file_name']['size'][$i];
            $config['upload_path'] = 'assets/images/project_contract/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|docx|ppt';
            $config['file_name'] = $image_name;
            $config['overwrite']     = FALSE;
            $filename = $files['pro_cont_file_name']['name'][$i];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $this->upload->initialize($config);
            if($this->upload->do_upload('pro_cont_file_name')){
              $file_data['pro_cont_id'] = $pro_cont_id;
              $file_data['pro_cont_file_name'] = $image_name.'.'.$ext;
              $this->User_Model->save_data('pro_cont_file', $file_data);
            }
            else{
              $error = $this->upload->display_errors();
              $this->session->set_flashdata('status',$this->upload->display_errors());
            }
        }
      }

      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Transaction/project_contract_list');
    }

    $pro_cont_info = $this->User_Model->get_info_arr('pro_cont_id', $pro_cont_id, 'project_contract');
    if(!$pro_cont_info){ header('location:'.base_url().'Transaction/project_contract_list'); }
    $data['pro_cont_info'] = $pro_cont_info[0];
    $data['update'] = 'update';
    $party_id = $pro_cont_info[0]['party_id'];
    $data['contract_type_list'] = $this->User_Model->get_list_by_id('contract_type_status',1,'','','contract_type_id','ASC','contract_type');
    $data['party_list'] = $this->User_Model->get_list_by_id('party_status',1,'','','party_name','ASC','party');
    $data['pro_cont_status_list'] = $this->User_Model->get_list_by_id('pro_cont_status_status',1,'','','pro_cont_status_id','ASC','pro_cont_status');
    $data['lead_list'] = $this->User_Model->get_list_by_id('lead_status2',1,'party_id',$party_id,'lead_name','ASC','lead');
    $data['user_list'] = $this->User_Model->get_list_by_id('user_status',1,'is_admin','0','user_name','ASC','user');
    $data['service_list'] = $this->User_Model->get_list_by_id('service_status',1,'','','service_id','ASC','service');
    $data['pro_child_list'] = $this->User_Model->get_list_by_id('pro_cont_id',$pro_cont_id,'','','pro_child_id','ASC','pro_child');
    $data['pro_cont_file_list'] = $this->User_Model->get_list_by_id('pro_cont_id',$pro_cont_id,'','','pro_cont_file_id','ASC','pro_cont_file');
    $data['branch_list'] = $this->User_Model->get_list2('branch_id','ASC','branch');

    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Transaction/project_contract', $data);
    $this->load->view('Include/footer', $data);
  }

  // Delete Project Contract File...
  public function delete_pro_cont_file(){
    $pro_cont_file_id = $_POST['pro_cont_file_id'];
    $pro_cont_file_name = $_POST['pro_cont_file_name'];
    if($pro_cont_file_name){ unlink("assets/images/project_contract/".$pro_cont_file_name); }
    $this->User_Model->delete_info('pro_cont_file_id', $pro_cont_file_id, 'pro_cont_file');
  }

  // Delete Project Contract....
  public function delete_project_contract($pro_cont_id){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $this->User_Model->delete_info('pro_cont_id', $pro_cont_id, 'project_contract');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Transaction/project_contract_list');
  }

/********************************************* Attendence Information ***********************************/

  // Attendence List...
  public function attendence_list(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $data['attendence_list'] = $this->User_Model->get_list_by_id('company_id',$crm_company_id,'','','attendance_id','DESC','attendance');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Transaction/attendence_list',$data);
    $this->load->view('Include/footer',$data);
  }

  //Add Attendence...
  public function attendence(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('attendance_date', 'Type', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $save_data = $_POST;
      $save_data['company_id'] = $crm_company_id;
      $save_data['attendance_addedby'] = $crm_user_id;
      $save_data['attendance_date2'] = date('d-m-Y');
      $save_data['attendance_time2'] = date('h:i:s A');
      $this->User_Model->save_data('attendance', $save_data);

      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Transaction/attendence_list');
    }

    $data['user_list'] = $this->User_Model->get_list_by_id('user_status',1,'is_admin','0','user_name','ASC','user');
    $data['branch_list'] = $this->User_Model->get_list2('branch_id','ASC','branch');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Transaction/attendence', $data);
    $this->load->view('Include/footer', $data);
  }

/******************************************* Receipt *****************************************/
  // Receipt List
  public function receipt_list(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $data['receipt_list'] = $this->User_Model->get_list_by_id('company_id',$crm_company_id,'','','receipt_id','DESC','receipt');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Transaction/receipt_list',$data);
    $this->load->view('Include/footer',$data);
  }

  // Add / Save Receipt...
  public function receipt(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('party_id', 'Type', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $save_data = $_POST;
      $save_data['company_id'] = $crm_company_id;
      $save_data['receipt_addedby'] = $crm_user_id;
      $save_data['receipt_date'] = date('d-m-Y');
      $save_data['receipt_time'] = date('h:i:s A');
      $this->User_Model->save_data('receipt', $save_data);

      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Transaction/receipt_list');
    }
    $data['receipt_no'] = $this->User_Model->get_count_no($crm_company_id, 'receipt_no', 'receipt');
    $data['party_list'] = $this->User_Model->get_list_by_id('company_id',$crm_company_id,'','','party_name','ASC','party');
    $data['payment_mode_list'] = $this->User_Model->get_list_by_id('payment_mode_status',1,'','','payment_mode_id','ASC','payment_mode');
    $data['branch_list'] = $this->User_Model->get_list2('branch_id','ASC','branch');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Transaction/receipt', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit / Update Receipt...
  public function edit_receipt($receipt_id){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('party_id', 'Type', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $update_data = $_POST;
      $update_data['receipt_addedby'] = $crm_user_id;
      $update_data['receipt_date'] = date('d-m-Y');
      $update_data['receipt_time'] = date('h:i:s A');
      $this->User_Model->update_info('receipt_id', $receipt_id, 'receipt', $update_data);

      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Transaction/receipt_list');
    }

    $receipt_info = $this->User_Model->get_info_arr('receipt_id', $receipt_id, 'receipt');
    if(!$receipt_info){ header('location:'.base_url().'Transaction/receipt_list'); }
    $data['receipt_info'] = $receipt_info[0];
    $data['update'] = 'update';

    $data['party_list'] = $this->User_Model->get_list_by_id('company_id',$crm_company_id,'','','party_name','ASC','party');
    $data['payment_mode_list'] = $this->User_Model->get_list_by_id('payment_mode_status',1,'','','payment_mode_id','ASC','payment_mode');
    $data['branch_list'] = $this->User_Model->get_list2('branch_id','ASC','branch');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Transaction/receipt', $data);
    $this->load->view('Include/footer', $data);
  }

  public function delete_receipt($receipt_id){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $this->User_Model->delete_info('receipt_id', $receipt_id, 'receipt');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Transaction/receipt_list');
  }

/*******************************************************************************************************/

  public function save_party(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }

    $party_status = $_POST['party_status'];
    if(!isset($party_status)){ $party_status = 1; }

    $save_data = $_POST;
    $save_data['company_id'] = $crm_company_id;
    $save_data['party_status'] = $party_status;
    $save_data['party_addedby'] = $crm_user_id;
    $save_data['party_date'] = date('d-m-Y');
    $save_data['party_time'] = date('h:i:s A');

    $this->User_Model->save_data('party', $save_data);
    $this->session->set_flashdata('save_success','success');
    header('location:'.base_url().'Transaction/lead_information');
  }

  public function get_party_details(){
    $party_id = $this->input->post('party_id');
    $party_details = $this->User_Model->get_info_arr('party_id', $party_id, 'party');
    $party_details = $party_details[0];
    echo json_encode($party_details);
  }

  //get_pro_cont_by_party
  public function get_pro_cont_by_party(){
    $party_id = $this->input->post('party_id');
    $pro_cont_list = $this->User_Model->get_list_by_id('party_id',$party_id,'','','pro_cont_id','DESC','project_contract');
    echo "<option value='' selected >Select Contract No.</option>";
    foreach ($pro_cont_list as $list) {
      echo "<option value='".$list->pro_cont_id."'> ".$list->pro_cont_no." </option>";
    }
  }

  // get_pro_cont_details
  public function get_pro_cont_details(){
    $pro_cont_id = $this->input->post('pro_cont_id');
    $pro_cont_details = $this->User_Model->get_info_arr_fields2('*', 'pro_cont_id', $pro_cont_id, '', '', '', '', 'project_contract');
    $pro_cont_details = $pro_cont_details[0];
    echo json_encode($pro_cont_details);
  }

// Project Contract Ajax...
  //get_leads_by_party
  public function get_leads_by_party(){
    $party_id = $this->input->post('party_id');
    $lead_list = $this->User_Model->get_list_by_id3('lead_status2',1,'lead_used',0,'party_id',$party_id,'lead_name','ASC','lead');
    echo "<option value='' selected >Select Lead.</option>";
    foreach ($lead_list as $list) {
      echo "<option value='".$list->lead_id."'> ".$list->lead_no." - ".$list->lead_name." </option>";
    }
  }

  // get_services_of_lead
  public function get_services_of_lead(){
    $lead_id = $this->input->post('lead_id');
    $lead_child_list = $this->User_Model->get_list_by_id('lead_id',$lead_id,'','','lead_child_id','ASC','lead_child');
    $service_list = $this->User_Model->get_list_by_id('service_status',1,'','','service_id','ASC','service');

    echo '
    <label> Lead Product / Service List </label>
    <table class="w-100 table-bordered">
      <thead>
        <tr>
          <th class="p-1">Product / Service</th>
          <th class="p-1 wt_150">Qty</th>
          <th class="p-1">Approx Value</th>
        </tr>
      </thead>
      <tbody>';

    foreach ($lead_child_list as $lead_child_list1) {
      $service_info  = $this->User_Model->get_info_arr_fields('service_name','service_id', $lead_child_list1->service_id, 'service');
      echo '
        <tr>
          <td class="p-1 ">'.$service_info[0]['service_name'].'</td>
          <td class="p-1 wt_150">'.$lead_child_list1->lead_child_ser_qty.'</td>
          <td class="p-1 wt_150">'.$lead_child_list1->lead_child_approx_val.'</td>
        </tr>
      ';
    }
    echo '</tbody>
      </table>
      <hr>';

  }






}
