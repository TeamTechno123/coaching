<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Coaching_API extends CI_Controller{
    public function __construct(){
      parent::__construct();
      date_default_timezone_set('Asia/Kolkata');
    }

    public function sign_in(){
      $mobile_no = $_REQUEST['mobile_no'];
      $password = $_REQUEST['password'];
      $imei_no = $_REQUEST['imei_no'];
      $device_id = $_REQUEST['device_id'];

      $student_info = $this->Master_Model->get_info_arr_fields3('*', '', 'student_mobile', $mobile_no, 'student_password', $password, 'student_status', '1', 'student');
      // Check Valid User...
      if($student_info){
        $student_imei_no = $student_info[0]['student_imei_no'];
        $student_device_id = $student_info[0]['student_device_id'];
        $student_id = $student_info[0]['student_id'];

        // Save IMEI & Device Id...
        if($student_device_id == '' || $student_imei_no == ''){
          $stud_up_data['student_imei_no'] = $imei_no;
          $stud_up_data['student_device_id'] = $device_id;
          $this->Master_Model->update_info('student_id', $student_id, 'student', $stud_up_data);
        }

        // Check Login..
        if($student_imei_no){
          $login = $this->Transaction_Model->check_login($mobile_no, $password, $imei_no);
        } else{
          $login = $this->Transaction_Model->check_login($mobile_no, $password, '');
        }

        if($login == null){
          $response["status"] = FALSE;
          $response["msg"] = "Invalid Device (IMEI)";
        } else{
          $response["status"] = TRUE;
          $response["msg"] = "Login Successfull";
          $response["student_id"] = $login[0]['student_id'];
          $response["medium_id"] = $login[0]['medium_id'];
          $response["class_id"] = $login[0]['class_id'];
          $response["batch_id"] = $login[0]['batch_id'];
          $response["academic_year_id"] = $login[0]['academic_year_id'];
          $response["company_id"] = $login[0]['company_id'];
        }
      } else{
        $response["status"] = FALSE;
        $response["msg"] = "Invalid Mobile No. or Password";
      }

      $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
      echo str_replace('\\/','/',$json_response);
    }

    // Section List....
    public function section_list(){
      $company_id = $_REQUEST['company_id'];
      $section_list = $this->Master_Model->get_list_by_id2($company_id,'section_status','1','','','section_id','ASC','section');
      $response["status"] = TRUE;
      $response["section_list"] = $section_list;
      $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
      echo str_replace('\\/','/',$json_response);
    }

    //Subject list
    public function subject_list(){
      $class_id = $_REQUEST['class_id'];
      $section_id = '';

      $subject_list = $this->Master_Model->get_list_by_id3('','class_id',$class_id,'section_id',$section_id,'','','subject_name','ASC','subject');

      $response["status"] = TRUE;
      $response["icon_path"] = base_url().'assets/uploads/master/';;
      $response["subject_list"] = $subject_list;
      $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
      echo str_replace('\\/','/',$json_response);
    }

    // Topic List...
    public function topic_list(){
      $medium_id = $_REQUEST['medium_id'];
      $class_id = $_REQUEST['class_id'];
      $batch_id = $_REQUEST['batch_id'];
      $section_id = $_REQUEST['section_id'];
      $subject_id = $_REQUEST['subject_id'];

      $topic_list = $this->Transaction_Model->get_topic_list($medium_id, $class_id, $batch_id, $section_id, $subject_id);

      $response["status"] = TRUE;
      $response["topic_list"] = $topic_list;
      $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
      echo str_replace('\\/','/',$json_response);
    }

    // Topic Video List...
    public function topic_video_list(){
      $academic_year_id = $_REQUEST['academic_year_id'];
      $topic_id = $_REQUEST['topic_id'];
      $hours = 36;
      $NewTime = mktime(date('H')-$hours,date('i'),date('s'),date('n'),date('j'),date('Y'));
      $new_date =  date('d-m-Y h:i A', $NewTime);

      $topic_video_list = $this->Transaction_Model->get_topic_video_list($academic_year_id, $topic_id, $new_date);

      $response["status"] = TRUE;
      $response["video_path"] = base_url().'assets/uploads/topic_content/';
      $response["topic_video_list"] = $topic_video_list;
      $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
      echo str_replace('\\/','/',$json_response);
    }

    // View Video...
    public function view_video(){
      $topic_content_id = $_REQUEST['topic_content_id'];
      $topic_content_details = $this->Master_Model->get_info_arr_fields('*','topic_content_id', $topic_content_id, 'topic_content');
      if(!$topic_content_details){
        $response["status"] = FALSE;
        $response["msg"] = 'Video Unavailable';
      } else{
        $response["status"] = TRUE;
        $response["video_path"] = base_url().'assets/uploads/topic_content/';
        $response["topic_content_details"] = $topic_content_details;
      }

      $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
      echo str_replace('\\/','/',$json_response);
    }

    // Topic Download List...
    public function download_content_list(){
      $company_id = $_REQUEST['company_id'];
      $academic_year_id = $_REQUEST['academic_year_id'];
      $medium_id = $_REQUEST['medium_id'];
      $class_id = $_REQUEST['class_id'];
      $batch_id = $_REQUEST['batch_id'];

      $download_content_list = $this->Transaction_Model->get_download_content_list($company_id, $academic_year_id, $medium_id, $class_id, $batch_id);

      // $download_content_list = $this->Master_Model->get_list_by_id3($company_id,'academic_year_id',$academic_year_id,'','','','','download_content_id','DESC','download_content');
      $response["status"] = TRUE;
      $response["file_path"] = base_url().'assets/uploads/download_content/';
      $response["download_content_list"] = $download_content_list;
      $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
      echo str_replace('\\/','/',$json_response);
    }



  }
?>
