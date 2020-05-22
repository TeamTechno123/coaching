<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('User_Model');
    date_default_timezone_set('Asia/Kolkata');
    // $this->load->model('Transaction_Model');
  }

  public function logout(){
    $this->session->sess_destroy();
    header('location:'.base_url().'User');
  }

/**************************      Login      ********************************/
  public function index(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');
      if ($this->form_validation->run() == FALSE) {
      	$this->load->view('User/login');
      } else{
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $login = $this->User_Model->check_login($email, $password);
        // print_r($login);
        if($login == null){
          $this->session->set_flashdata('msg','login_error');
          header('location:'.base_url().'User');
        } else{
          // echo 'null not';
          $this->session->set_userdata('crm_user_id', $login[0]['user_id']);
          $this->session->set_userdata('crm_company_id', $login[0]['company_id']);
          $this->session->set_userdata('crm_role_id', $login[0]['role_id']);
          $this->session->set_userdata('branch_id', $login[0]['branch_id']);
          header('location:'.base_url().'User/dashboard');
        }
      }
    }
    else{
      header('location:'.base_url().'User/dashboard');
    }
  }

/**************************      Dashboard      ********************************/
  public function dashboard(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('User/dashboard');
    $this->load->view('Include/footer');
  }

/**************************      Company Information      ********************************/

  // Company List...
  public function company_information_list(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }

    $data['company_list'] = $this->User_Model->get_list($crm_company_id,'company_id','ASC','company');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/company_information_list', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit Company...
  public function edit_company($company_id){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('company_name', 'company_name', 'trim|required');
    $this->form_validation->set_rules('company_address', 'company_address', 'trim|required');

    if ($this->form_validation->run() != FALSE) {
      $up_data = array(
        'company_name' => $this->input->post('company_name'),
        'company_address' => $this->input->post('company_address'),
        'country_id' => $this->input->post('country_id'),
        'state_id' => $this->input->post('state_id'),
        'company_statecode' => $this->input->post('company_statecode'),
        'company_mob1' => $this->input->post('company_mob1'),
        'company_mob2' => $this->input->post('company_mob2'),
        'company_email' => $this->input->post('company_email'),
        'company_website' => $this->input->post('company_website'),
        'company_pan_no' => $this->input->post('company_pan_no'),
        'company_gst_no' => $this->input->post('company_gst_no'),
        'company_cin_no' => $this->input->post('company_cin_no'),
        'company_iec_no' => $this->input->post('company_iec_no'),
      );
      $this->User_Model->update_info('company_id', $company_id, 'company', $up_data);
      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'User/company_information_list');
    }
    $company_info = $this->User_Model->get_info('company_id', $company_id, 'company');
    $data['country_list'] = $this->User_Model->get_list2('','ASC','country');
    $data['state_list'] = $this->User_Model->get_list2('','ASC','state');
    $data['district_list'] = $this->User_Model->get_list2('','ASC','district');
    if($company_info){
      foreach($company_info as $info){
        $data['update'] = 'update';
        $data['company_id'] = $info->company_id;
        $data['company_name'] = $info->company_name;
        $data['company_address'] = $info->company_address;
        $data['country_id'] = $info->country_id;
        $data['state_id'] = $info->state_id;
        $data['company_statecode'] = $info->company_statecode;
        $data['company_mob1'] = $info->company_mob1;
        $data['company_mob2'] = $info->company_mob2;
        $data['company_email'] = $info->company_email;
        $data['company_website'] = $info->company_website;
        $data['company_pan_no'] = $info->company_pan_no;
        $data['company_gst_no'] = $info->company_gst_no;
        $data['company_cin_no'] = $info->company_cin_no;
        $data['company_iec_no'] = $info->company_iec_no;
      }
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/company_information', $data);
      $this->load->view('Include/footer', $data);
    }
  }

/*******************************  Branch Information  ****************************/

  // Unit List...
  public function branch_information_list(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $data['branch_list'] = $this->User_Model->get_list($crm_company_id,'branch_name','ASC','branch');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/branch_information_list',$data);
    $this->load->view('Include/footer',$data);
  }

  //Add Unit
  public function branch_information(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $data['company_list'] = $this->User_Model->get_list2('','ASC','company');
    $data['country_list'] = $this->User_Model->get_list2('','ASC','country');
    $data['state_list'] = $this->User_Model->get_list2('','ASC','state');
    $data['district_list'] = $this->User_Model->get_list2('','ASC','district');
    $this->form_validation->set_rules('branch_name', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $save_data = array(
        'company_id' => $crm_company_id,
        'branch_name' => $this->input->post('branch_name'),
        'branch_address' => $this->input->post('branch_address'),
        'country_id' => $this->input->post('country_id'),
        'state_id' => $this->input->post('state_id'),
        'branch_statecode' => $this->input->post('branch_statecode'),
        'branch_mob1' => $this->input->post('branch_mob1'),
        'branch_mob2' => $this->input->post('branch_mob2'),
        'branch_email' => $this->input->post('branch_email'),
        'branch_website' => $this->input->post('branch_website'),
        'branch_pan_no' => $this->input->post('branch_pan_no'),
        'branch_gst_no' => $this->input->post('branch_gst_no'),
        'branch_cin_no' => $this->input->post('branch_cin_no'),
        'branch_iec_no' => $this->input->post('branch_iec_no'),
        'branch_bank' => $this->input->post('branch_bank'),
        'branch_bank_branch' => $this->input->post('branch_bank_branch'),
        'branch_bank_acc_no' => $this->input->post('branch_bank_acc_no'),
        'branch_bank_ifsc' => $this->input->post('branch_bank_ifsc'),
      );
      $this->User_Model->save_data('branch', $save_data);
      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'User/branch_information_list');
    }
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/branch_information',$data);
    $this->load->view('Include/footer',$data);
  }

  // Edit Unit...
  public function edit_branch($branch_id){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_branch_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('branch_name', 'branch_name', 'trim|required');
    $this->form_validation->set_rules('branch_address', 'branch_address', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $up_data = array(
        'company_id' => $this->input->post('company_id'),
        'branch_name' => $this->input->post('branch_name'),
        'branch_address' => $this->input->post('branch_address'),
        'country_id' => $this->input->post('country_id'),
        'state_id' => $this->input->post('state_id'),
        'branch_statecode' => $this->input->post('branch_statecode'),
        'branch_mob1' => $this->input->post('branch_mob1'),
        'branch_mob2' => $this->input->post('branch_mob2'),
        'branch_email' => $this->input->post('branch_email'),
        'branch_website' => $this->input->post('branch_website'),
        'branch_pan_no' => $this->input->post('branch_pan_no'),
        'branch_gst_no' => $this->input->post('branch_gst_no'),
        'branch_cin_no' => $this->input->post('branch_cin_no'),
        'branch_iec_no' => $this->input->post('branch_iec_no'),
        'branch_bank' => $this->input->post('branch_bank'),
        'branch_bank_branch' => $this->input->post('branch_bank_branch'),
        'branch_bank_acc_no' => $this->input->post('branch_bank_acc_no'),
        'branch_bank_ifsc' => $this->input->post('branch_bank_ifsc'),
      );
      $this->User_Model->update_info('branch_id', $branch_id, 'branch', $up_data);
      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'User/branch_information_list');
    }
    $branch_info = $this->User_Model->get_info('branch_id', $branch_id, 'branch');
    $data['company_list'] = $this->User_Model->get_list2('','ASC','company');
    $data['country_list'] = $this->User_Model->get_list2('','ASC','country');
    $data['state_list'] = $this->User_Model->get_list2('','ASC','state');
    $data['district_list'] = $this->User_Model->get_list2('','ASC','district');
    if($branch_info){
      foreach($branch_info as $info){
        $data['update'] = 'update';
        $data['branch_id'] = $info->branch_id;
        $data['company_id'] = $info->company_id;
        $data['branch_name'] = $info->branch_name;
        $data['branch_address'] = $info->branch_address;
        $data['country_id'] = $info->country_id;
        $data['state_id'] = $info->state_id;
        $data['branch_statecode'] = $info->branch_statecode;
        $data['branch_mob1'] = $info->branch_mob1;
        $data['branch_mob2'] = $info->branch_mob2;
        $data['branch_email'] = $info->branch_email;
        $data['branch_website'] = $info->branch_website;
        $data['branch_pan_no'] = $info->branch_pan_no;
        $data['branch_gst_no'] = $info->branch_gst_no;
        $data['branch_cin_no'] = $info->branch_cin_no;
        $data['branch_iec_no'] = $info->branch_iec_no;
        $data['branch_bank'] = $info->branch_bank;
        $data['branch_bank_branch'] = $info->branch_bank_branch;
        $data['branch_bank_acc_no'] = $info->branch_bank_acc_no;
        $data['branch_bank_ifsc'] = $info->branch_bank_ifsc;
      }

      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/branch_information', $data);
      $this->load->view('Include/footer', $data);
    }
  }

  // Delete Unit....
  public function delete_branch($branch_information_id){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $this->User_Model->delete_info('branch_id', $branch_information_id, 'branch');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'User/branch_information_list');
  }

/********************************************* Service Information ******************************************/

  public function service_information_list(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $data['service_list'] = $this->User_Model->get_list($crm_company_id,'service_id','ASC','service');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/service_information_list',$data);
    $this->load->view('Include/footer',$data);
  }

  //Add Service Information
  public function service_information(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('service_name', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $service_stock_req = $_POST['service_stock_req'];
      if(!isset($service_stock_req)){ $service_stock_req = 0; }
      $service_status = $_POST['service_status'];
      if(!isset($service_status)){ $service_status = 1; }

      $save_data = $_POST;
      $save_data['company_id'] = $crm_company_id;
      $save_data['service_stock_req'] = $service_stock_req;
      $save_data['service_status'] = $service_status;
      $save_data['service_addedby'] = $crm_user_id;
      $save_data['service_date'] = date('d-m-Y');
      $save_data['service_time'] = date('h:i:s A');

      $this->User_Model->save_data('service', $save_data);
      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'User/service_information_list');
    }

    $data['gst_list'] = $this->User_Model->get_list2('gst_rate','ASC','gst');
    $data['unit_list'] = $this->User_Model->get_list2('unit_name','ASC','unit');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/service_information',$data);
    $this->load->view('Include/footer',$data);
  }

  // Edit Service Information...
  public function edit_service($service_id){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_service_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('service_name', 'service_name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $service_stock_req = $_POST['service_stock_req'];
      if(!isset($service_stock_req)){ $service_stock_req = 0; }
      $service_status = $_POST['service_status'];
      if(!isset($service_status)){ $service_status = 1; }

      $update_data = $_POST;
      $update_data['service_stock_req'] = $service_stock_req;
      $update_data['service_status'] = $service_status;
      $update_data['service_addedby'] = $crm_user_id;
      $update_data['service_date'] = date('d-m-Y');
      $update_data['service_time'] = date('h:i:s A');
      $this->User_Model->update_info('service_id', $service_id, 'service', $update_data);
      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'User/service_information_list');
    }
    $service_info = $this->User_Model->get_info('service_id', $service_id, 'service');
    $data['gst_list'] = $this->User_Model->get_list2('gst_rate','ASC','gst');
    $data['unit_list'] = $this->User_Model->get_list2('unit_name','ASC','unit');
    if(!$service_info){ header('location:'.base_url().'User/service_information_list'); }

    foreach($service_info as $info){
      $data['update'] = 'update';
      $data['service_type'] = $info->service_type;
      $data['service_name'] = $info->service_name;
      $data['service_short_name'] = $info->service_short_name;
      $data['service_hsn_code'] = $info->service_hsn_code;
      $data['gst_rate'] = $info->gst_rate;
      $data['service_unit'] = $info->service_unit;
      $data['service_mrp'] = $info->service_mrp;
      $data['service_rate'] = $info->service_rate;
      $data['service_min_rate'] = $info->service_min_rate;
      $data['service_max_rate'] = $info->service_max_rate;
      $data['service_stock_req'] = $info->service_stock_req;
      $data['service_opening_stock'] = $info->service_opening_stock;
      $data['service_opening_stock_val'] = $info->service_opening_stock_val;
      $data['service_alert_days'] = $info->service_alert_days;
      $data['service_renewal_per'] = $info->service_renewal_per;
      $data['service_status'] = $info->service_status;
    }

    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/service_information', $data);
    $this->load->view('Include/footer', $data);
  }

  // Delete Service Information....
  public function delete_service($service_id){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $this->User_Model->delete_info('service_id', $service_id, 'service');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'User/service_information_list');
  }

/*******************************    User Information      ****************************/

  // User List....
  public function user_list(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $data['user_list'] = $this->User_Model->user_list($crm_company_id);
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/user_list',$data);
    $this->load->view('Include/footer',$data);
  }

  // Add New User....
  public function add_user(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('user_name', 'First Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $user_status = $this->input->post('user_status');
      if(!isset($user_status)){ $user_status = '1'; }
      $save_data = $_POST;
      $save_data['user_status'] = $user_status;
      $save_data['company_id'] = $crm_company_id;
      $save_data['user_addedby'] = $crm_user_id;
      $save_data['user_date'] = date('d-m-Y h:i:s A');
      $user_id = $this->User_Model->save_data('user', $save_data);

      if(isset($_FILES['user_file_name']['name'])){
        $this->load->library('upload');
        $files = $_FILES;
        $cpt = count($_FILES['user_file_name']['name']);
        for($i=0; $i<$cpt; $i++)
        {
          $j = $i+1;
          $time = time();
          $image_name = 'user_'.$user_id.'_'.$j.'_'.$time;
            $_FILES['user_file_name']['name']= $files['user_file_name']['name'][$i];
            $_FILES['user_file_name']['type']= $files['user_file_name']['type'][$i];
            $_FILES['user_file_name']['tmp_name']= $files['user_file_name']['tmp_name'][$i];
            $_FILES['user_file_name']['error']= $files['user_file_name']['error'][$i];
            $_FILES['user_file_name']['size']= $files['user_file_name']['size'][$i];
            $config['upload_path'] = 'assets/images/user/';
            $config['allowed_types'] = 'gif|jpg|png|pdf|docx|ppt';
            $config['file_name'] = $image_name;
            $config['overwrite']     = FALSE;
            $filename = $files['user_file_name']['name'][$i];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $this->upload->initialize($config);
            if($this->upload->do_upload('user_file_name')){
              $file_data['user_id'] = $user_id;
              $file_data['user_file_name'] = $image_name.'.'.$ext;
              $this->User_Model->save_data('user_file', $file_data);
            }
            else{
              $error = $this->upload->display_errors();
              $this->session->set_flashdata('status',$this->upload->display_errors());
            }
        }
      }


      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'User/user_list');
    }
    $data['group_list'] = $this->User_Model->get_list_by_id('company_id',$crm_company_id,'','','group_name','ASC','group');
    $data['role_list'] = $this->User_Model->get_list_by_id('','','','','role_name','ASC','role');
    $data['branch_list'] = $this->User_Model->get_list_by_id('company_id',$crm_company_id,'','','branch_name','ASC','branch');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/user', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit User....
  public function edit_user($user_id){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('user_name', 'First Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $user_status = $this->input->post('user_status');
      if(!isset($user_status)){ $user_status = '1'; }
      $update_data = $_POST;
      unset($update_data['old_img']);
      $update_data['user_status'] = $user_status;
      $update_data['company_id'] = $crm_company_id;
      $update_data['user_addedby'] = $crm_user_id;
      $update_data['user_date'] = date('d-m-Y h:i:s A');
      $this->User_Model->update_info('user_id', $user_id, 'user', $update_data);

      if(isset($_FILES['user_file_name']['name'])){
        $this->load->library('upload');
        $files = $_FILES;
        $cpt = count($_FILES['user_file_name']['name']);
        for($i=0; $i<$cpt; $i++)
        {
          $j = $i+1;
          $time = time();
          $image_name = 'user_'.$user_id.'_'.$j.'_'.$time;
            $_FILES['user_file_name']['name']= $files['user_file_name']['name'][$i];
            $_FILES['user_file_name']['type']= $files['user_file_name']['type'][$i];
            $_FILES['user_file_name']['tmp_name']= $files['user_file_name']['tmp_name'][$i];
            $_FILES['user_file_name']['error']= $files['user_file_name']['error'][$i];
            $_FILES['user_file_name']['size']= $files['user_file_name']['size'][$i];
            $config['upload_path'] = 'assets/images/user/';
            $config['allowed_types'] = 'gif|jpg|png|pdf|docx|ppt';
            $config['file_name'] = $image_name;
            $config['overwrite']     = FALSE;
            $filename = $files['user_file_name']['name'][$i];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $this->upload->initialize($config);
            if($this->upload->do_upload('user_file_name')){
              $file_data['user_id'] = $user_id;
              $file_data['user_file_name'] = $image_name.'.'.$ext;
              $this->User_Model->save_data('user_file', $file_data);
            }
            else{
              $error = $this->upload->display_errors();
              $this->session->set_flashdata('status',$this->upload->display_errors());
            }
        }
      }

      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'User/user_list');
    }

    $user_info = $this->User_Model->get_info_arr('user_id', $user_id, 'user');
    if($user_info == ''){ header('location:'.base_url().'User/user_list'); }
    $data['update'] = 'update';
    $data['user_info'] = $user_info[0];
    $data['group_list'] = $this->User_Model->get_list_by_id('company_id',$crm_company_id,'','','group_name','ASC','group');
    $data['role_list'] = $this->User_Model->get_list_by_id('','','','','role_name','ASC','role');
    $data['branch_list'] = $this->User_Model->get_list_by_id('company_id',$crm_company_id,'','','branch_name','ASC','branch');
    $data['user_file_list'] = $this->User_Model->get_list_by_id('user_id',$user_id,'','','user_file_id','ASC','user_file');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/user',$data);
    $this->load->view('Include/footer',$data);
  }

  // Delete User File...
  public function delete_user_file(){
    $user_file_id = $_POST['user_file_id'];
    $user_file_name = $_POST['user_file_name'];
    if($user_file_name){ unlink("assets/images/user/".$user_file_name); }
    $this->User_Model->delete_info('user_file_id', $user_file_id, 'user_file');
  }

  // Delete User....
  public function delete_user($user_id){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $user_info = $this->User_Model->get_info_arr_fields('user_image','user_id', $user_id, 'user');
    if($user_info[0]['user_image']){ unlink("assets/images/user/".$user_info[0]['user_image']); }
    $this->User_Model->delete_info('user_id', $user_id, 'user');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'User/user_list');
  }

/*******************************  Unit Information  ****************************/

  // Unit List...
  public function unit_list(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $data['unit_list'] = $this->User_Model->get_list($crm_company_id,'unit_name','ASC','unit');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/unit_list',$data);
    $this->load->view('Include/footer',$data);
  }

  //Add Unit
  public function unit(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('unit_name', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $save_data['unit_name'] = $this->input->post('unit_name');
      $save_data['company_id'] = $crm_company_id;
      $save_data['unit_addedby'] = $crm_user_id;
      $this->User_Model->save_data('unit', $save_data);
      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'User/unit_list');
    }
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('User/unit');
    $this->load->view('Include/footer');
  }

  // Edit Unit...
  public function edit_unit($unit_id){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('unit_name', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $update_data['unit_name'] = $this->input->post('unit_name');
      $this->User_Model->update_info('unit_id', $unit_id, 'unit', $update_data);
      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'User/unit_list');
    }
    $unit_info = $this->User_Model->get_info_arr('unit_id',$unit_id,'unit');
    if(!$unit_info){ header('location:'.base_url().'User/unit_list'); }
    $data['update'] = 'update';
    $data['unit_name'] = $unit_info[0]['unit_name'];

    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/unit', $data);
    $this->load->view('Include/footer', $data);
  }

  // Delete Unit....
  public function delete_unit($unit_id){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $this->User_Model->delete_info('unit_id', $unit_id, 'unit');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'User/unit_list');
  }


/********************************************** Issue Information  ***********************************/

  // Issue List...
  public function issue_information_list(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $data['issue_list'] = $this->User_Model->get_list_by_id('company_id',$crm_company_id,'','','issue_id','DESC','issue');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/issue_information_list',$data);
    $this->load->view('Include/footer',$data);
  }

  //Add Issue
  public function issue_information(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('issue_name', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $issue_status = $_POST['issue_status'];
      if(!isset($issue_status)){ $issue_status = 1; }
      $save_data = $_POST;
      $save_data['company_id'] = $crm_company_id;
      $save_data['issue_status'] = $issue_status;
      $save_data['issue_addedby'] = $crm_user_id;
      $save_data['issue_date'] = date('d-m-Y');
      $save_data['issue_time'] = date('h:i:s A');
      $issue_id = $this->User_Model->save_data('issue', $save_data);

      if(isset($_FILES['issue_image']['name'])){
        $time = time();
        $image_name = 'issue_'.$issue_id.'_'.$time;
        $config['upload_path'] = 'assets/images/issue/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = $image_name;
        $filename = $_FILES['issue_image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $this->upload->initialize($config); // if upload library autoloaded
        if ($this->upload->do_upload('issue_image')){
            $up_image['issue_image'] = $image_name.'.'.$ext;
            $this->User_Model->update_info('issue_id', $issue_id, 'issue', $up_image);
        }
        else{
            $error = $this->upload->display_errors();
        }
      }


      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'User/issue_information_list');
    }
    $data['service_list'] = $this->User_Model->get_list_by_id('company_id',$crm_company_id,'service_status','1','service_name','ASC','service');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/issue_information', $data);
    $this->load->view('Include/footer', $data);
  }

  //Edit Issue
  public function edit_issue($issue_id){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('issue_name', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $issue_status = $_POST['issue_status'];
      if(!isset($issue_status)){ $issue_status = 1; }
      $update_data = $_POST;
      unset($update_data['old_img']);
      $update_data['company_id'] = $crm_company_id;
      $update_data['issue_status'] = $issue_status;
      $update_data['issue_addedby'] = $crm_user_id;
      $update_data['issue_date'] = date('d-m-Y');
      $update_data['issue_time'] = date('h:i:s A');
      $this->User_Model->update_info('issue_id', $issue_id, 'issue', $update_data);

      if(isset($_FILES['issue_image']['name'])){
        $time = time();
        $image_name = 'issue_'.$issue_id.'_'.$time;
        $config['upload_path'] = 'assets/images/issue/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = $image_name;
        $filename = $_FILES['issue_image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $this->upload->initialize($config); // if upload library autoloaded
        if ($this->upload->do_upload('issue_image')){
            $up_image['issue_image'] = $image_name.'.'.$ext;
            $this->User_Model->update_info('issue_id', $issue_id, 'issue', $up_image);
            $old_img = $_POST['old_img'];
            if($old_img){ unlink("assets/images/issue/".$old_img); }
        }
        else{
            $error = $this->upload->display_errors();
        }
      }

      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'User/issue_information_list');
    }
    $data['service_list'] = $this->User_Model->get_list_by_id('company_id',$crm_company_id,'service_status','1','service_name','ASC','service');

    $issue_info = $this->User_Model->get_info_arr('issue_id', $issue_id, 'issue');
    if(!$issue_info){ header('location:'.base_url().'User/issue_information_list'); }
    $data['issue_info'] = $issue_info[0];
    $data['update'] = 'Update';

    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/issue_information', $data);
    $this->load->view('Include/footer', $data);
  }

  // Delete Issue....
  public function delete_issue($issue_id){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $issue_info = $this->User_Model->get_info_arr_fields('issue_image','issue_id', $issue_id, 'issue');
    if($issue_info[0]['issue_image']){ unlink("assets/images/issue/".$issue_info[0]['issue_image']); }
    $this->User_Model->delete_info('issue_id', $issue_id, 'issue');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'User/issue_information_list');
  }





/********************************************** Service Contract *************************************/

  // Service Contract List...
  public function service_contract_list(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $data['service_contract_list'] = $this->User_Model->get_list_by_id('company_id',$crm_company_id,'','','ser_cont_id','DESC','service_contract');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/service_contract_list',$data);
    $this->load->view('Include/footer',$data);
  }

  //Add/Save Service Contract
  public function service_contract(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('ser_cont_name', 'First Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $save_data = $_POST;
      $save_data['company_id'] = $crm_company_id;
      $save_data['ser_cont_addedby'] = $crm_user_id;
      $save_data['ser_cont_date'] = date('d-m-Y');
      $save_data['ser_cont_time'] = date('h:i:s A');
      $this->User_Model->save_data('service_contract', $save_data);

      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'User/service_contract_list');
    }

    $data['contract_type_list'] = $this->User_Model->get_list_by_id('contract_type_status',1,'','','contract_type_id','ASC','contract_type');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/service_contract', $data);
    $this->load->view('Include/footer', $data);
  }

  //Edit/Update Service Contract
  public function edit_service_contract($ser_cont_id){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('ser_cont_name', 'First Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $update_data = $_POST;
      $update_data['ser_cont_addedby'] = $crm_user_id;
      $update_data['ser_cont_date'] = date('d-m-Y');
      $update_data['ser_cont_time'] = date('h:i:s A');
      $this->User_Model->update_info('ser_cont_id', $ser_cont_id, 'service_contract', $update_data);

      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'User/service_contract_list');
    }

    $data['contract_type_list'] = $this->User_Model->get_list_by_id('contract_type_status',1,'','','contract_type_id','ASC','contract_type');
    $ser_cont_info = $this->User_Model->get_info_arr('ser_cont_id',$ser_cont_id,'service_contract');
    if(!$ser_cont_info){ header('location:'.base_url().'User/service_contract_list'); }
    $data['update'] = 'update';
    $data['ser_cont_info'] = $ser_cont_info[0];
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/service_contract', $data);
    $this->load->view('Include/footer', $data);
  }

  // Delete Party....
  public function delete_service_contract($ser_cont_id){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $this->User_Model->delete_info('ser_cont_id', $ser_cont_id, 'service_contract');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'User/service_contract_list');
  }

/************************************************* Party *******************************************************/

  // Party List...
  public function party_information_list(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $data['party_list'] = $this->User_Model->get_list($crm_company_id,'party_id','DESC','party');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/party_information_list',$data);
    $this->load->view('Include/footer',$data);
  }

  //Add Party
  public function party_information(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    $crm_branch_id = $this->session->userdata('crm_branch_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('party_name', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
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
      header('location:'.base_url().'User/party_information_list');
    }
    $data['party_type_list'] = $this->User_Model->get_list2('party_type_id','ASC','party_type');
    $data['country_list'] = $this->User_Model->get_list2('country_name','ASC','country');
    $data['state_list'] = $this->User_Model->get_list2('','ASC','state');
    $data['district_list'] = $this->User_Model->get_list2('district_name','ASC','district');

    if($crm_role_id == 1){
      $data['branch_list'] = $this->User_Model->get_list2('branch_id','ASC','branch');
    } else{
      $data['branch_list'] = $this->User_Model->get_branch_list($crm_branch_id);
    }

    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/party_information', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit Party...
  public function edit_party($party_id){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('party_name', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $party_status = $_POST['party_status'];
      if(!isset($party_status)){ $party_status = 1; }

      $update_data = $_POST;
      $update_data['party_status'] = $party_status;
      $update_data['party_addedby'] = $crm_user_id;
      $update_data['party_date'] = date('d-m-Y');
      $update_data['party_time'] = date('h:i:s A');

      $this->User_Model->update_info('party_id', $party_id, 'party', $update_data);
      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'User/party_information_list');
    }

    $data['party_type_list'] = $this->User_Model->get_list2('party_type_id','ASC','party_type');
    $data['country_list'] = $this->User_Model->get_list2('country_name','ASC','country');
    $data['state_list'] = $this->User_Model->get_list2('','ASC','state');
    $data['district_list'] = $this->User_Model->get_list2('district_name','ASC','district');
    $data['branch_list'] = $this->User_Model->get_list2('branch_id','ASC','branch');

    $party_info = $this->User_Model->get_info_arr('party_id', $party_id, 'party');
    if(!$party_info){ header('location:'.base_url().'User/party_information_list'); }
    $data['party_info'] = $party_info[0];

    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/party_information', $data);
    $this->load->view('Include/footer', $data);
  }

  // Delete Party....
  public function delete_party($party_id){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $this->User_Model->delete_info('party_id', $party_id, 'party');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'User/party_information_list');
  }



/*******************************  Group Information  ****************************/

  // Unit List...
  public function group_list(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $data['group_list'] = $this->User_Model->get_list($crm_company_id,'group_id','ASC','group');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/group_list',$data);
    $this->load->view('Include/footer',$data);
  }

  //Add Unit
  public function group(){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('group_name', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $save_data['group_name'] = $this->input->post('group_name');
      $save_data['company_id'] = $crm_company_id;
      $save_data['group_addedby'] = $crm_user_id;
      $this->User_Model->save_data('group', $save_data);
      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'User/group_list');
    }
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('User/group');
    $this->load->view('Include/footer');
  }

  // Edit Unit...
  public function edit_group($group_id){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('group_name', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $update_data['group_name'] = $this->input->post('group_name');
      $this->User_Model->update_info('group_id', $group_id, 'group', $update_data);
      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'User/group_list');
    }
    $group_info = $this->User_Model->get_info_arr('group_id',$group_id,'group');
    if(!$group_info){ header('location:'.base_url().'User/group_list'); }
    $data['update'] = 'update';
    $data['group_name'] = $group_info[0]['group_name'];

    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/group', $data);
    $this->load->view('Include/footer', $data);
  }

  // Delete Unit....
  public function delete_group($group_id){
    $crm_user_id = $this->session->userdata('crm_user_id');
    $crm_company_id = $this->session->userdata('crm_company_id');
    $crm_role_id = $this->session->userdata('crm_role_id');
    if($crm_user_id == '' && $crm_company_id == ''){ header('location:'.base_url().'User'); }
    $this->User_Model->delete_info('group_id', $group_id, 'group');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'User/group_list');
  }


/*******************************  Check Duplication  ****************************/
  public function check_duplication(){
    $column_name = $this->input->post('column_name');
    $column_val = $this->input->post('column_val');
    $table_name = $this->input->post('table_name');
    $company_id = '';
    $cnt = $this->User_Model->check_dupli_num($company_id,$column_val,$column_name,$table_name);
    echo $cnt;
  }

  public function get_state_by_country(){
    $country_id = $this->input->post('country_id');
    $state_list = $this->User_Model->get_list_by_id('country_id',$country_id,'','','state_name','ASC','state');
    echo "<option value='' selected >Select State.</option>";
    foreach ($state_list as $list) {
      echo "<option value='".$list->state_id."'> ".$list->state_name." </option>";
    }
  }



}
?>
