<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'third_party/tcpdf/tcpdf.php');

class Pages extends CI_Controller
{
//-----------------------------First

    public function __construct() {
        parent:: __construct();
        $this->load->helper('url');
        //$this->load->model('authors_model');
        $this->load->library("pagination");
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Manila');
        // Load the EmailConfig library
        $this->load->library('EmailConfig');
        $this->load->library('email');
    }
    
    
//-----------------Careers--------------------------   

    function validate_captcha() {
        $captcha = $this->input->post('g-recaptcha-response');
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lfsr1AcAAAAAEx_ucaNHBcTLEQ0RmPvDbIGVV7Y=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
        if ($response . 'success' == false) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    public function careers() {
        
        $page = 'job';

        //print_r($data);
        if(!file_exists(APPPATH.'views/pages/hr/job/' .$page.'.php')){
            show_404();
        }else{
            $this->load->view('pages/hr/job/'.$page);   
        }
    }

    public function education_eligibility($param) {
        
        $page = 'form2';

        //get applicant info
        $applicant_info = $this->Posts_model->get_applicant_info1($param);

        if (empty($applicant_info)) {
            // No rows found
            show_404();
        } else {
            // Rows found
            $this->session->set_flashdata('success','success');
            
            //print_r($applicant_info);

            $data['hash'] = $param;
            $data['applicant'] = $applicant_info;
            //print_r($data);
            if(!file_exists(APPPATH.'views/pages/hr/job/' .$page.'.php')){
                show_404();
            }else{
                $this->load->view('pages/hr/job/'.$page, $data);   
            }
        }
        
    }

    public function work_experience($param) {
        
        $page = 'form3';

        //get applicant info
        $applicant_info = $this->Posts_model->get_applicant_info1($param);

        if (empty($applicant_info)) {
            // No rows found
            show_404();
        } else {
            // Rows found
            $this->session->set_flashdata('success','success');
            
            //print_r($applicant_info);

            $data['hash'] = $param;
            $data['applicant'] = $applicant_info;
            print_r($data);
            if(!file_exists(APPPATH.'views/pages/hr/job/' .$page.'.php')){
                show_404();
            }else{
                $this->load->view('pages/hr/job/'.$page, $data);   
            }
        }
        
    }
    
    public function save_forme1(){

        $this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_validate_captcha');
        
        if ($this->form_validation->run() == FALSE){

            $result = array(
                'status' => 'False',
                'message' => 'Please <strong>confirm</strong> that you are not a robot.'
            );
            echo json_encode($result);

        }else{

            date_default_timezone_set('Asia/Manila');

            // Set preference
            $year = date('Y');   // Get current year
            $month = date('m');  // Get current month

            // Get user data (example: from form input or database)
            $lastname = $this->input->post('lastname'); // Or fetch from the database
            $firstname = $this->input->post('firstname'); // Or fetch from the database
            $middlename = $this->input->post('middlename'); // Or fetch from the database
            $pos_id = $this->input->post('pos_id');

            //get the lastID
            $lastID = $this->Posts_model->get_app_lastID();

            // Clean the user input (remove spaces and special characters)
            $lastname = preg_replace('/\s+/', '_', $lastname);
            $firstname = preg_replace('/\s+/', '_', $firstname);
            $middlename = preg_replace('/\s+/', '_', $middlename);
            $pos_id = preg_replace('/\s+/', '_', $pos_id);

            // Create the new file name
            $new_file_name = strtolower($lastname . '_' . $firstname . '_' . $middlename .'_intent_'. $pos_id . '_'. $lastID .'.pdf');

            $config['upload_path'] = APPPATH. 'uploads/ApplicantDocx/' . $year . '/' . $month;
            $config['allowed_types'] = 'pdf';
            $config['max_size']    = '2000';    // max_size in kb
            $config['file_name'] = $new_file_name;
              
            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0755, true);  // Create the directory if it doesn't exist
            }

            
            //Load upload library
            $this->load->library('upload', $config);   
            
            $this->upload->initialize($config);

            $uploadData = $this->upload->data();
            $intent = $uploadData['file_name'];

            // File upload
            if($this->upload->do_upload('intent_file')){
                
                //---------------Intent
                $uploadData = $this->upload->data();
                $pdf_path = $uploadData['full_path'];

                $intent = 'encrypted_'.$uploadData['file_name'];
            
                // Debugging: Output the file path
                error_log('File path: ' . $pdf_path);

                // Encrypt the PDF and save it as a new file
                // $this->encrypt_pdf($pdf_path, 'ICTUTESDAR2');

                // // Debugging: Check if the file exists before deletion
                // if (file_exists($pdf_path)) {
                //     error_log('File exists: ' . $pdf_path); // Log that the file exists
                //     unlink($pdf_path); // Remove the original file using the full path
                //     error_log('File deleted: ' . $pdf_path); // Log that the file was deleted
                // } else {
                //     error_log('File does not exist: ' . $pdf_path); // Log if file does not exist
                // }
                // //---------------Intent

                $status = $this->Posts_model->save_forme1($intent);
                
                if($status['status'] == 'True'){
                    
                    //------Applicant information
                    $email = $status['app_email'];
                    $pos_id = $status['app_pos_id'];
                    $reference = $status['app_hash'];
                    $hash = $status['app_hash1'];

                    //------Applicant information
                    //---------------send next step via email notification
                    $result = $this->send_email($email, $pos_id, $reference, $hash);
                    //---------------send next step via email notification

                    if($result['status'] == 'True'){
                        $result = array(
                            'status' => $status['status'],
                            'message' => $status['message']
                        );
                        echo json_encode($result);
                        exit;
                    }else{
                        $result = array(
                            'status' => $result['status'],
                            'message' => $result['message']
                        );
                        echo json_encode($result);
                        exit;
                    }
                }else{
                    $result = array(
                        'status' => $status['status'],
                        'message' => $status['message']
                    );
                }

                echo json_encode($result);
                exit;

            }else{
                $result = array(
                    'status' => 'False',
                    'message' => $this->upload->display_errors()
                );
                echo json_encode($result);
            }
        }
    }

    function educational_file(){
        // Set preference
        
        date_default_timezone_set('Asia/Manila');

        $year = date('Y');   // Get current year
        $month = date('m');  // Get current month

        //Get applicant info
        $applicant_info = $this->Posts_model->get_applicant_info();

        // Get user data (example: from form input or database)
        $lastname = $applicant_info['app_lastname']; // Or fetch from the database
        $firstname = $applicant_info['app_firstname']; // Or fetch from the database
        $middlename = $applicant_info['app_middlename']; // Or fetch from the database
        $pos_id = $applicant_info['app_vac_id'];

        // Clean the user input (remove spaces and special characters)
        $lastname = preg_replace('/\s+/', '_', $lastname);
        $firstname = preg_replace('/\s+/', '_', $firstname);
        $middlename = preg_replace('/\s+/', '_', $middlename);
        $pos_id = preg_replace('/\s+/', '_', $pos_id);

        // Create the new file name
        $new_file_name = strtolower($lastname . '_' . $firstname . '_' . $middlename . '_' . $pos_id . '_education' .'.pdf');

        $config['upload_path'] = 'uploads/ApplicantDocx/' . $year . '/' . $month;
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $new_file_name;
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('education_file')){  
            $uploadData1 = $this->upload->data();
            $pdf_path1 = $uploadData1['full_path'];

            $educational_file = 'encrypted_'.$uploadData1['file_name'];

            // Debugging: Output the file path
            error_log('File path: ' . $pdf_path1);

            // Encrypt the PDF and save it as a new file
            //$this->encrypt_pdf($pdf_path1, 'TESDAR2HR');

            // Debugging: Check if the file exists before deletion
            if (file_exists($pdf_path1)) {
                error_log('File exists: ' . $pdf_path1); // Log that the file exists
                unlink($pdf_path1); // Remove the original file using the full path
                error_log('File deleted: ' . $pdf_path1); // Log that the file was deleted
            } else {
                error_log('File does not exist: ' . $pdf_path1); // Log if file does not exist
            }

            $result = array(
                'status' => 'True',
                'filename' => $educational_file
            );
            return $result;
        }else{

            $result = array(
                'status' => 'False',
                'message' => "Educational Attainment Docs: ".$this->upload->display_errors()
            );

            return $result;
        }
    }

    public function save_forme2(){

        $this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_validate_captcha');
        
        if ($this->form_validation->run() == FALSE){

            $result = array(
                'status' => 'False',
                'message' => 'Please <strong>confirm</strong> that you are not a robot.'
            );
            echo json_encode($result);

        }else{

            //check education file // for upload
            if(!empty($_FILES['education_file']['name'])){
                $resultx = $this->educational_file();
                if($resultx['status'] == 'True'){
                    $educational_file = $resultx['filename'];
                }else{
                    $result = array(
                        'status' => 'False',
                        'message' => $resultx['message']
                    );
                    echo json_encode($result);
                    exit;
                }
            }else{
                $educational_file = null;
            }

            //check eligibility file // for upload
            if(!empty($_FILES['eligibility_file']['name'])){
                $resultx = $this->eligibility_file();
                if($resultx['status'] == 'True'){
                    $eligibility_file = $resultx['filename'];
                }else{
                    $result = array(
                        'status' => 'False',
                        'message' => $resultx['message']
                    );
                    echo json_encode($result);
                    exit;
                }
            }else{
                $eligibility_file = null;
            }

            //check national_certificate_file // for upload
            if(!empty($_FILES['national_certificate_file']['name'])){
                $resultx = $this->national_certificate_file();
                if($resultx['status'] == 'True'){
                    $national_certificate_file = $resultx['filename'];
                }else{
                    $result = array(
                        'status' => 'False',
                        'message' => $resultx['message']
                    );
                    echo json_encode($result);
                    exit;
                }
            }else{
                $national_certificate_file = null;
            }

            //check national_certificate_file // for upload
            if(!empty($_FILES['nttc_file']['name'])){
                $resultx = $this->nttc_file();
                if($resultx['status'] == 'True'){
                    $nttc_file = $resultx['filename'];
                }else{
                    $result = array(
                        'status' => 'False',
                        'message' => $resultx['message']
                    );
                    echo json_encode($result);
                    exit;
                }
            }else{
                $nttc_file = null;
            }

            $status = $this->Posts_model->save_forme2($educational_file, $eligibility_file, $national_certificate_file, $nttc_file);

            if($status['status'] == 'True'){
                $result = array(
                    'status' => 'True',
                    'message' => 'Your Educational Background and Eligibility Information has been successfully saved. Please return to your email and proceed to <b>Step 2: Work Experience. </b>'
                );
                echo json_encode($result);
                exit;

            }else{
                $result = array(
                    'status' => 'False',
                    'message' => 'Server error. Please try again.'
                );
                echo json_encode($result);
                exit;
            }
        }
    }

    function eligibility_file(){
        date_default_timezone_set('Asia/Manila');

        // Set preference
        $year = date('Y');   // Get current year
        $month = date('m');  // Get current month

        //Get applicant info
        $applicant_info = $this->Posts_model->get_applicant_info();

        // Get user data (example: from form input or database)
        $lastname = $applicant_info['app_lastname']; // Or fetch from the database
        $firstname = $applicant_info['app_firstname']; // Or fetch from the database
        $middlename = $applicant_info['app_middlename']; // Or fetch from the database
        $pos_id = $applicant_info['app_vac_id'];

        // Clean the user input (remove spaces and special characters)
        $lastname = preg_replace('/\s+/', '_', $lastname);
        $firstname = preg_replace('/\s+/', '_', $firstname);
        $middlename = preg_replace('/\s+/', '_', $middlename);
        $pos_id = preg_replace('/\s+/', '_', $pos_id);

        // Create the new file name
        $new_file_name = strtolower($lastname . '_' . $firstname . '_' . $middlename .'_eligibility_'. $pos_id .'.pdf');

        $config['upload_path'] = 'uploads/ApplicantDocx/' . $year . '/' . $month;
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $new_file_name;
          
        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0755, true);  // Create the directory if it doesn't exist
        }
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('eligibility_file')){  
           
            $uploadData = $this->upload->data();
            $pdf_path = $uploadData['full_path'];

            $eligibility_file = 'encrypted_'.$uploadData['file_name'];
        
            // Debugging: Output the file path
            error_log('File path: ' . $pdf_path);

            // Encrypt the PDF and save it as a new file
            // $this->encrypt_pdf($pdf_path, 'ICTUTESDAR2');

            // Debugging: Check if the file exists before deletion
            if (file_exists($pdf_path)) {
                error_log('File exists: ' . $pdf_path); // Log that the file exists
                unlink($pdf_path); // Remove the original file using the full path
                error_log('File deleted: ' . $pdf_path); // Log that the file was deleted
            } else {
                error_log('File does not exist: ' . $pdf_path); // Log if file does not exist
            }

            $result = array(
                'status' => 'True',
                'filename' => $eligibility_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'message' => "Eligibility Docs: ".$this->upload->display_errors()
            );

            return $result;
        }
    }

    function national_certificate_file(){
        date_default_timezone_set('Asia/Manila');

        // Set preference
        $year = date('Y');   // Get current year
        $month = date('m');  // Get current month

        //Get applicant info
        $applicant_info = $this->Posts_model->get_applicant_info();

        // Get user data (example: from form input or database)
        $lastname = $applicant_info['app_lastname']; // Or fetch from the database
        $firstname = $applicant_info['app_firstname']; // Or fetch from the database
        $middlename = $applicant_info['app_middlename']; // Or fetch from the database
        $pos_id = $applicant_info['app_vac_id'];

        // Clean the user input (remove spaces and special characters)
        $lastname = preg_replace('/\s+/', '_', $lastname);
        $firstname = preg_replace('/\s+/', '_', $firstname);
        $middlename = preg_replace('/\s+/', '_', $middlename);
        $pos_id = preg_replace('/\s+/', '_', $pos_id);

        // Create the new file name
        $new_file_name = strtolower($lastname . '_' . $firstname . '_' . $middlename .'_nc_'. $pos_id .'.pdf');

        $config['upload_path'] = 'uploads/ApplicantDocx/' . $year . '/' . $month;
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $new_file_name;
          
        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0755, true);  // Create the directory if it doesn't exist
        }
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('national_certificate_file')){  

            $uploadData = $this->upload->data();
            $pdf_path = $uploadData['full_path'];

            $national_certificate_file = 'encrypted_'.$uploadData['file_name'];
        
            // Debugging: Output the file path
            error_log('File path: ' . $pdf_path);

            // Encrypt the PDF and save it as a new file
            //$this->encrypt_pdf($pdf_path, 'ICTUTESDAR2');

            // Debugging: Check if the file exists before deletion
            if (file_exists($pdf_path)) {
                error_log('File exists: ' . $pdf_path); // Log that the file exists
                unlink($pdf_path); // Remove the original file using the full path
                error_log('File deleted: ' . $pdf_path); // Log that the file was deleted
            } else {
                error_log('File does not exist: ' . $pdf_path); // Log if file does not exist
            }

            $result = array(
                'status' => 'True',
                'filename' => $national_certificate_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'message' => "National Certificate Docs: ".$this->upload->display_errors()
            );

            return $result;
        }
    }

    function nttc_file(){
        date_default_timezone_set('Asia/Manila');

        // Set preference
        $year = date('Y');   // Get current year
        $month = date('m');  // Get current month

        //Get applicant info
        $applicant_info = $this->Posts_model->get_applicant_info();

        // Get user data (example: from form input or database)
        $lastname = $applicant_info['app_lastname']; // Or fetch from the database
        $firstname = $applicant_info['app_firstname']; // Or fetch from the database
        $middlename = $applicant_info['app_middlename']; // Or fetch from the database
        $pos_id = $applicant_info['app_vac_id'];

        // Clean the user input (remove spaces and special characters)
        $lastname = preg_replace('/\s+/', '_', $lastname);
        $firstname = preg_replace('/\s+/', '_', $firstname);
        $middlename = preg_replace('/\s+/', '_', $middlename);
        $pos_id = preg_replace('/\s+/', '_', $pos_id);

        // Create the new file name
        $new_file_name = strtolower($lastname . '_' . $firstname . '_' . $middlename .'_nttc_'. $pos_id .'.pdf');

        $config['upload_path'] = 'uploads/ApplicantDocx/' . $year . '/' . $month;
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $new_file_name;
          
        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0755, true);  // Create the directory if it doesn't exist
        }
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('nttc_file')){  

            $uploadData = $this->upload->data();
            $pdf_path = $uploadData['full_path'];

            $nttc_file = 'encrypted_'.$uploadData['file_name'];
        
            // Debugging: Output the file path
            error_log('File path: ' . $pdf_path);

            // Encrypt the PDF and save it as a new file
            //$this->encrypt_pdf($pdf_path, 'ICTUTESDAR2');

            // Debugging: Check if the file exists before deletion
            if (file_exists($pdf_path)) {
                error_log('File exists: ' . $pdf_path); // Log that the file exists
                unlink($pdf_path); // Remove the original file using the full path
                error_log('File deleted: ' . $pdf_path); // Log that the file was deleted
            } else {
                error_log('File does not exist: ' . $pdf_path); // Log if file does not exist
            }

            $result = array(
                'status' => 'True',
                'filename' => $nttc_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'message' => "NTTC Docs: ".$this->upload->display_errors()
            );

            return $result;
        }
    }

    public function save_forme3(){
        $this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_validate_captcha');
        
        if ($this->form_validation->run() == FALSE){

            $result = array(
                'status' => 'False',
                'message' => 'Please <strong>confirm</strong> that you are not a robot.'
            );
            echo json_encode($result);

        }else{
         
             //Check Certificate of Employment
            if(!empty($_FILES['coe_file']['name'])){
                $resultx = $this->coe_file();
                if($resultx['status'] == 'True'){
                    $coe_file = $resultx['filename'];
                }else{
                    $result = array(
                        'status' => 'False',
                        'message' => $resultx['message']
                    );
                    echo json_encode($result);
                    exit;
                }
            }else{
                $coe_file = null;
            }

            //Check Service Record (if applicable)
            if(!empty($_FILES['sr_file']['name'])){
                $resultx = $this->sr_file();
                if($resultx['status'] == 'True'){
                    $sr_file = $resultx['filename'];
                }else{
                    $result = array(
                        'status' => 'False',
                        'message' => $resultx['message']
                    );
                    echo json_encode($result);
                    exit;
                }
            }else{
                $sr_file = null;
            }

            //Check Copy of Previous Appointment (if applicable)
            if(!empty($_FILES['cpa_file']['name'])){
                $resultx = $this->cpa_file();
                if($resultx['status'] == 'True'){
                    $cpa_file = $resultx['filename'];
                }else{
                    $result = array(
                        'status' => 'False',
                        'message' => $resultx['message']
                    );
                    echo json_encode($result);
                    exit;
                }
            }else{
                $cpa_file = null;
            }

            //Check Performance rating in the present position for last two (2) rating period certified by HRMO (if applicable)
            if(!empty($_FILES['ipcr_file']['name'])){
                $resultx = $this->ipcr_file();
                if($resultx['status'] == 'True'){
                    $ipcr_file = $resultx['filename'];
                }else{
                    $result = array(
                        'status' => 'False',
                        'message' => $resultx['message']
                    );
                    echo json_encode($result);
                    exit;
                }
            }else{
                $ipcr_file = null;
            }

            $status = $this->Posts_model->save_forme3($ipcr_file, $cpa_file, $sr_file, $coe_file);

            if($status['status'] == 'True'){
                $result = array(
                    'status' => 'True',
                    'message' => 'Your Work Experience Information has been successfully saved. Please return to your email and proceed to <b>Step 3: Relevant Training. </b>'
                );

            }else{
                $result = array(
                    'status' => 'False',
                    'message' => 'Server error. Please try again.'
                );
            }
            echo json_encode($result);
        }
    }

    function coe_file(){
        // Set preference
        
        date_default_timezone_set('Asia/Manila');

        $year = date('Y');   // Get current year
        $month = date('m');  // Get current month

        //Get applicant info
        $applicant_info = $this->Posts_model->get_applicant_info();

        // Get user data (example: from form input or database)
        $lastname = $applicant_info['app_lastname']; // Or fetch from the database
        $firstname = $applicant_info['app_firstname']; // Or fetch from the database
        $middlename = $applicant_info['app_middlename']; // Or fetch from the database
        $pos_id = $applicant_info['app_vac_id'];

        // Clean the user input (remove spaces and special characters)
        $lastname = preg_replace('/\s+/', '_', $lastname);
        $firstname = preg_replace('/\s+/', '_', $firstname);
        $middlename = preg_replace('/\s+/', '_', $middlename);
        $pos_id = preg_replace('/\s+/', '_', $pos_id);

        // Create the new file name
        $new_file_name = strtolower($lastname . '_' . $firstname . '_' . $middlename . '_' . $pos_id . '_coe' .'.pdf');

        $config['upload_path'] = 'uploads/ApplicantDocx/' . $year . '/' . $month;
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $new_file_name;

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0755, true);  // Create the directory if it doesn't exist
        }
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('coe_file')){  

            $uploadData1 = $this->upload->data();
            $pdf_path1 = $uploadData1['full_path'];

            $coe_file = 'encrypted_'.$uploadData1['file_name'];

            // Debugging: Output the file path
            error_log('File path: ' . $pdf_path1);

            // Encrypt the PDF and save it as a new file
            //$this->encrypt_pdf($pdf_path1, 'TESDAR2HR');

            // Debugging: Check if the file exists before deletion
            if (file_exists($pdf_path1)) {
                error_log('File exists: ' . $pdf_path1); // Log that the file exists
                unlink($pdf_path1); // Remove the original file using the full path
                error_log('File deleted: ' . $pdf_path1); // Log that the file was deleted
            } else {
                error_log('File does not exist: ' . $pdf_path1); // Log if file does not exist
            }

            $result = array(
                'status' => 'True',
                'filename' => $coe_file
            );

            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'message' => "Certificate of Employment Docs: ".$this->upload->display_errors()
            );

            return $result;
        }
    }

    function sr_file(){
        // Set preference

        date_default_timezone_set('Asia/Manila');

        $year = date('Y');   // Get current year
        $month = date('m');  // Get current month

        //Get applicant info
        $applicant_info = $this->Posts_model->get_applicant_info();

        // Get user data (example: from form input or database)
        $lastname = $applicant_info['app_lastname']; // Or fetch from the database
        $firstname = $applicant_info['app_firstname']; // Or fetch from the database
        $middlename = $applicant_info['app_middlename']; // Or fetch from the database
        $pos_id = $applicant_info['app_vac_id'];

        // Clean the user input (remove spaces and special characters)
        $lastname = preg_replace('/\s+/', '_', $lastname);
        $firstname = preg_replace('/\s+/', '_', $firstname);
        $middlename = preg_replace('/\s+/', '_', $middlename);
        $pos_id = preg_replace('/\s+/', '_', $pos_id);

        // Create the new file name
        $new_file_name = strtolower($lastname . '_' . $firstname . '_' . $middlename . '_' . $pos_id . '_service' .'.pdf');

        $config['upload_path'] = 'uploads/ApplicantDocx/' . $year . '/' . $month;
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $new_file_name;

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0755, true);  // Create the directory if it doesn't exist
        }
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('sr_file')){  
            $uploadData1 = $this->upload->data();
            $pdf_path1 = $uploadData1['full_path'];

            $sr_file = 'encrypted_'.$uploadData1['file_name'];

            // Debugging: Output the file path
            error_log('File path: ' . $pdf_path1);

            // Encrypt the PDF and save it as a new file
            //$this->encrypt_pdf($pdf_path1, 'TESDAR2HR');

            // Debugging: Check if the file exists before deletion
            if (file_exists($pdf_path1)) {
                error_log('File exists: ' . $pdf_path1); // Log that the file exists
                unlink($pdf_path1); // Remove the original file using the full path
                error_log('File deleted: ' . $pdf_path1); // Log that the file was deleted
            } else {
                error_log('File does not exist: ' . $pdf_path1); // Log if file does not exist
            }

            $result = array(
                'status' => 'True',
                'filename' => $sr_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'message' => "Service Record Docs: ".$this->upload->display_errors()
            );

            return $result;
        }
    }

    function cpa_file(){
        // Set preference
        
        date_default_timezone_set('Asia/Manila');

        $year = date('Y');   // Get current year
        $month = date('m');  // Get current month

        //Get applicant info
        $applicant_info = $this->Posts_model->get_applicant_info();

        // Get user data (example: from form input or database)
        $lastname = $applicant_info['app_lastname']; // Or fetch from the database
        $firstname = $applicant_info['app_firstname']; // Or fetch from the database
        $middlename = $applicant_info['app_middlename']; // Or fetch from the database
        $pos_id = $applicant_info['app_vac_id'];

        // Clean the user input (remove spaces and special characters)
        $lastname = preg_replace('/\s+/', '_', $lastname);
        $firstname = preg_replace('/\s+/', '_', $firstname);
        $middlename = preg_replace('/\s+/', '_', $middlename);
        $pos_id = preg_replace('/\s+/', '_', $pos_id);

        // Create the new file name
        $new_file_name = strtolower($lastname . '_' . $firstname . '_' . $middlename . '_' . $pos_id . '_appointment' .'.pdf');

        $config['upload_path'] = 'uploads/ApplicantDocx/' . $year . '/' . $month;
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $new_file_name;

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0755, true);  // Create the directory if it doesn't exist
        }
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('cpa_file')){  
            $uploadData1 = $this->upload->data();
            $pdf_path1 = $uploadData1['full_path'];

            $cpa_file = 'encrypted_'.$uploadData1['file_name'];

            // Debugging: Output the file path
            error_log('File path: ' . $pdf_path1);

            // Encrypt the PDF and save it as a new file
            //$this->encrypt_pdf($pdf_path1, 'TESDAR2HR');

            // Debugging: Check if the file exists before deletion
            if (file_exists($pdf_path1)) {
                error_log('File exists: ' . $pdf_path1); // Log that the file exists
                unlink($pdf_path1); // Remove the original file using the full path
                error_log('File deleted: ' . $pdf_path1); // Log that the file was deleted
            } else {
                error_log('File does not exist: ' . $pdf_path1); // Log if file does not exist
            }

            $result = array(
                'status' => 'True',
                'filename' => $cpa_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'message' => "Copy of Previous Appointment Docs: ".$this->upload->display_errors()
            );

            return $result;
        }
    }

    function ipcr_file(){
        // Set preference

        date_default_timezone_set('Asia/Manila');
        
        $year = date('Y');   // Get current year
        $month = date('m');  // Get current month

        //Get applicant info
        $applicant_info = $this->Posts_model->get_applicant_info();

        // Get user data (example: from form input or database)
        $lastname = $applicant_info['app_lastname']; // Or fetch from the database
        $firstname = $applicant_info['app_firstname']; // Or fetch from the database
        $middlename = $applicant_info['app_middlename']; // Or fetch from the database
        $pos_id = $applicant_info['app_vac_id'];

        // Clean the user input (remove spaces and special characters)
        $lastname = preg_replace('/\s+/', '_', $lastname);
        $firstname = preg_replace('/\s+/', '_', $firstname);
        $middlename = preg_replace('/\s+/', '_', $middlename);
        $pos_id = preg_replace('/\s+/', '_', $pos_id);

        // Create the new file name
        $new_file_name = strtolower($lastname . '_' . $firstname . '_' . $middlename . '_' . $pos_id . '_ipcr' .'.pdf');

        $config['upload_path'] = 'uploads/ApplicantDocx/' . $year . '/' . $month;
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $new_file_name;

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0755, true);  // Create the directory if it doesn't exist
        }
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('ipcr_file')){  
            
            $uploadData1 = $this->upload->data();
            $pdf_path1 = $uploadData1['full_path'];

            $ipcr_file = 'encrypted_'.$uploadData1['file_name'];

            // Debugging: Output the file path
            error_log('File path: ' . $pdf_path1);

            // Encrypt the PDF and save it as a new file
            //$this->encrypt_pdf($pdf_path1, 'TESDAR2HR');

            // Debugging: Check if the file exists before deletion
            if (file_exists($pdf_path1)) {
                error_log('File exists: ' . $pdf_path1); // Log that the file exists
                unlink($pdf_path1); // Remove the original file using the full path
                error_log('File deleted: ' . $pdf_path1); // Log that the file was deleted
            } else {
                error_log('File does not exist: ' . $pdf_path1); // Log if file does not exist
            }

            $result = array(
                'status' => 'True',
                'filename' => $ipcr_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'message' => "Performance rating Docs: ".$this->upload->display_errors()
            );

            return $result;
        }
    }

    public function save_forme4(){

        //Check Certificate of Employment
        if(!empty($_FILES['training_file']['name'])){
            $resultx = $this->training_file();
            if($resultx['status'] == 'True'){
                $training_file = $resultx['filename'];
            }else{
                $result = array(
                    'status' => 'False',
                    'error' => $resultx['error']
                );
                echo json_encode($result);
                exit;
            }
        }else{
            $training_file = null;
        }

        $status = $this->Posts_model->save_forme4($training_file);

        if($status['status'] == 'True'){
            $result = array(
                'status' => 'True',
            );

        }else{
            $result = array(
                'status' => 'False',
                'error' => 'Server Error'
            );
        }
        echo json_encode($result);

    }

    function training_file(){
        // Set preference
        
        date_default_timezone_set('Asia/Manila');

        $year = date('Y');   // Get current year
        $month = date('m');  // Get current month

        $config['upload_path'] = 'uploads/ApplicantDocx/' . $year . '/' . $month;
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $_FILES['training_file']['name'];
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('training_file')){  
            $uploadData = $this->upload->data();
            $training_file = $uploadData['file_name'];

            $result = array(
                'status' => 'True',
                'filename' => $training_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'error' => "Training File Docs: ".$this->upload->display_errors()
            );

            return $result;
        }
    }

    public function save_forme5(){

        $status = $this->Posts_model->save_forme5();

        if($status['status'] == 'True'){
            $result = array(
                'status' => 'True',
            );

        }else{
            $result = array(
                'status' => 'False',
                'error' => 'Server Error'
            );
        }
        echo json_encode($result);

    }

    public function save_forme6(){

        //Check PDS
        if(!empty($_FILES['pds_file']['name'])){
            $resultx = $this->pds_file();
            if($resultx['status'] == 'True'){
                $pds_file = $resultx['filename'];
            }else{
                $result = array(
                    'status' => 'False',
                    'error' => $resultx['error']
                );
                echo json_encode($result);
                exit;
            }
        }else{
            $pds_file = null;
        }

        //Check WES
        if(!empty($_FILES['wes_file']['name'])){
            $resultx = $this->wes_file();
            if($resultx['status'] == 'True'){
                $wes_file = $resultx['filename'];
            }else{
                $result = array(
                    'status' => 'False',
                    'error' => $resultx['error']
                );
                echo json_encode($result);
                exit;
            }
        }else{
            $wes_file = null;
        }


        $status = $this->Posts_model->save_forme6($pds_file, $wes_file);

        if($status['status'] == 'True'){
            $result = array(
                'status' => 'True',
            );

        }else{
            $result = array(
                'status' => 'False',
                'error' => 'Server Error'
            );
        }
        echo json_encode($result);

    }

    function pds_file(){
        
        // Set preference

        date_default_timezone_set('Asia/Manila');

        $year = date('Y');   // Get current year
        $month = date('m');  // Get current month

        $config['upload_path'] = 'uploads/ApplicantDocx/' . $year . '/' . $month;
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $_FILES['pds_file']['name'];
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('pds_file')){  
            $uploadData = $this->upload->data();
            $pds_file = $uploadData['file_name'];

            $result = array(
                'status' => 'True',
                'filename' => $pds_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'error' => "PDS Docs: ".$this->upload->display_errors()
            );

            return $result;
        }
    }

    function wes_file(){
        // Set preference

        date_default_timezone_set('Asia/Manila');

        $year = date('Y');   // Get current year
        $month = date('m');  // Get current month

        $config['upload_path'] = 'uploads/ApplicantDocx/' . $year . '/' . $month;
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $_FILES['wes_file']['name'];
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('wes_file')){  
            $uploadData = $this->upload->data();
            $wes_file = $uploadData['file_name'];

            $result = array(
                'status' => 'True',
                'filename' => $wes_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'error' => "WES Docs: ".$this->upload->display_errors()
            );

            return $result;
        }
    }

    public function save_forme7(){

        $status = $this->Posts_model->save_forme7();

        if($status['status'] == 'True'){
            $result = array(
                'status' => 'True',
            );

        }else{
            $result = array(
                'status' => 'False',
                'error' => 'Server Error'
            );
        }
        echo json_encode($result);

    }

    public function save_forme8(){

        //Check ARP File
        if(!empty($_FILES['arp_file']['name'])){
            $resultx = $this->arp_file();
            if($resultx['status'] == 'True'){
                $arp_file = $resultx['filename'];
            }else{
                $result = array(
                    'status' => 'False',
                    'error' => $resultx['error']
                );
                echo json_encode($result);
                exit;
            }
        }else{
            $arp_file = null;
        }
      
        $status = $this->Posts_model->save_forme8($arp_file);

        if($status['status'] == 'True'){
            $result = array(
                'status' => 'True',
            );

        }else{
            $result = array(
                'status' => 'False',
                'error' => 'Server Error'
            );
        }
        echo json_encode($result);

    }

    function arp_file(){
        
        date_default_timezone_set('Asia/Manila');

        // Set preference
        $year = date('Y');   // Get current year
        $month = date('m');  // Get current month

        $config['upload_path'] = 'uploads/ApplicantDocx/' . $year . '/' . $month;
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $_FILES['arp_file']['name'];
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('arp_file')){  
            $uploadData = $this->upload->data();
            $arp_file = $uploadData['file_name'];

            $result = array(
                'status' => 'True',
                'filename' => $arp_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'error' => $this->upload->display_errors()
            );

            return $result;
        }
    }

    public function save_forme9(){

        //Check Expert File
        if(!empty($_FILES['expertise_file']['name'])){
            $resultx = $this->expertise_file();
            if($resultx['status'] == 'True'){
                $expertise_file = $resultx['filename'];
            }else{
                $result = array(
                    'status' => 'False',
                    'error' => $resultx['error']
                );
                echo json_encode($result);
                exit;
            }
        }else{
            $expertise_file = null;
        }
      
        $status = $this->Posts_model->save_forme9($expertise_file);

        if($status['status'] == 'True'){
            $result = array(
                'status' => 'True',
            );

        }else{
            $result = array(
                'status' => 'False',
                'error' => 'Server Error'
            );
        }
        echo json_encode($result);

    }

    function expertise_file(){

        date_default_timezone_set('Asia/Manila');

        // Set preference
        $year = date('Y');   // Get current year
        $month = date('m');  // Get current month

        $config['upload_path'] = 'uploads/ApplicantDocx/' . $year . '/' . $month;
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $_FILES['expertise_file']['name'];
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('expertise_file')){  
            $uploadData = $this->upload->data();
            $expertise_file = $uploadData['file_name'];

            $result = array(
                'status' => 'True',
                'filename' => $expertise_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'error' => $this->upload->display_errors()
            );

            return $result;
        }
    }

    public function save_forme10(){

        //Check Expert File
        if(!empty($_FILES['cmt_file']['name'])){
            $resultx = $this->cmt_file();
            if($resultx['status'] == 'True'){
                $cmt_file = $resultx['filename'];
            }else{
                $result = array(
                    'status' => 'False',
                    'error' => $resultx['error']
                );
                echo json_encode($result);
                exit;
            }
        }else{
            $cmt_file = null;
        }
      
        $status = $this->Posts_model->save_forme10($cmt_file);

        if($status['status'] == 'True'){
            $result = array(
                'status' => 'True',
            );

        }else{
            $result = array(
                'status' => 'False',
                'error' => 'Server Error'
            );
        }
        echo json_encode($result);

    }

    function cmt_file(){

        date_default_timezone_set('Asia/Manila');

        // Set preference
        $year = date('Y');   // Get current year
        $month = date('m');  // Get current month

        $config['upload_path'] = 'uploads/ApplicantDocx/' . $year . '/' . $month;
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $_FILES['cmt_file']['name'];
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('cmt_file')){  
            $uploadData = $this->upload->data();
            $cmt_file = $uploadData['file_name'];

            $result = array(
                'status' => 'True',
                'filename' => $cmt_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'error' => $this->upload->display_errors()
            );

            return $result;
        }
    }

    public function view_applicants($param) {
        $page = 'applicants';
        
        if(!file_exists(APPPATH.'views/pages/hr/' .$page.'.php') || $this->session->usr_fasd == null){
            show_404();
        }else{
            $data['vac_id'] = $param;
            $notification['menu'] = 'Pantilla Positions';
            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
            }

            //get personal information
            $notification['notification_personal_information'] = $this->Posts_model->get_notifications_personal_information();
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/hr/'.$page, $data);
            $this->load->view('templates/admin-footer-template');
        }
    }

    public function get_applicants($param){
        //get the open data
        if($this->session->logged_in){
            $data = $this->Posts_model->get_applicants($param);
            echo json_encode($data);
        }
    }

       public function search_form_applicant(){
        $data = $this->Posts_model->search_form_applicant();
        if($data){
            echo json_encode($data);
        }else{
            $data = array(
                'status' => 'False');
            echo json_encode($data);
        }
      
    }

    public function get_vacant_position_open(){
        //get the open data
        $data = $this->Posts_model->get_vacant_position_open();

        //set timezone
        date_default_timezone_set('Asia/Manila');
        $today = date("m/d/Y");
        
        
        if($data){
            foreach($data as $row){
                // get no of applicants

                $number_of_applicants = $this->Posts_model->number_of_applicants($row['pos_id']);

                $deadine = date("m/d/Y", strtotime($row['vac_deadline']));
                $posted = date("m/d/Y", strtotime($row['vac_date_posted']));
                $array[] = array(
                    'pos_id' => $row['pos_id'],
                    'pos_usr_id' => $row['pos_usr_id'],
                    'pos_ous_id' => $row['pos_ous_id'],
                    'ous_desc' => $row['ous_desc'],
                    'pos_desc' => $row['pos_desc'],
                    'pos_sg' => $row['pos_sg'],
                    'pos_salary' => $row['pos_salary'],
                    'pos_plantilla_no' => $row['pos_plantilla_no'],
                    'vac_id' => $row['vac_id'],
                    'pos_status' => $row['pos_status'],
                    'pos_education' => $row['pos_education'],
                    'pos_training' => $row['pos_training'],
                    'pos_experience' => $row['pos_experience'],
                    'pos_eligibility' => $row['pos_eligibility'],
                    'pos_competency' => $row['pos_competency'],  
                    'pos_ptc_position' => $row['pos_ptc_position'],  
                    'vac_date_posted' => $posted,  
                    'vac_deadline' => $deadine,  
                    'vac_job_opening_file' => $row['vac_job_opening_file'],  
                    'vac_vice_usr_id' => $row['vac_vice_usr_id'],   
                    'vac_nanture' => $row['vac_nanture'],
                    'vac_type' => $row['vac_type'],
                    'vac_evaluation_of_document' => $row['vac_evaluation_of_document'],
                    'vac_initial_deliberation' => $row['vac_initial_deliberation'],
                    'vac_cbwe' => $row['vac_cbwe'],
                    'vac_bei' => $row['vac_bei'],
                    'vac_status' => $row['vac_status'],
                    'server_time' => $today,
                    'number_of_applicants' => $number_of_applicants
                );
            }  
        }
        echo json_encode($array);
    }

//-----------------Careers--------------------------

    // // Function to encrypt the PDF using FPDI and TCPDF
    // private function encrypt_pdf($file_path, $password) {
    //     // Load TCPDF and FPDI
    //     require_once(APPPATH.'third_party/tcpdf/tcpdf.php');
    //     require_once(APPPATH.'third_party/fpdi/autoload.php');
    
    //     // Create a new FPDI object
    //     $pdf = new \setasign\Fpdi\Tcpdf\Fpdi();
    
    //     // Import the existing PDF
    //     $pageCount = $pdf->setSourceFile($file_path);
    
    //     // Loop through each page of the original PDF and add it to the new document
    //     for ($i = 1; $i <= $pageCount; $i++) {
    //         $pdf->AddPage();
    //         $tplId = $pdf->importPage($i);
    //         $pdf->useTemplate($tplId);
    //     }
    
    //     // Set protection on the PDF with the password
    //     $pdf->SetProtection(array('print', 'copy'), $password, null, 0, null);
    
    //     // Get current year and month
    //     $year = date('Y');
    //     $month = date('m');
    
    //     // Define the directory path
    //     $dir_path = FCPATH . 'uploads/ApplicantDocx/' . $year . '/' . $month . '/';
    
    //     // Check if directory exists, if not create it
    //     if (!is_dir($dir_path)) {
    //         mkdir($dir_path, 0755, true); // Create directories recursively with proper permissions
    //     }
    
    //     // Define the full path for the new encrypted PDF file
    //     $encrypted_pdf_path = $dir_path . 'encrypted_' . basename($file_path);
    
    //     // Save the encrypted PDF to the directory
    //     if ($pdf->Output($encrypted_pdf_path, 'F')) {
    //         return true; // Encryption successful
    //     } else {
    //         return false; // Encryption failed
    //     }
    // }

    //-------------Email
    public function send_email($email, $pos_id, $reference, $hash) {
        
        // Get Position Information
        $result = $this->Posts_model->get_vacant_position($pos_id);

        // Get Gmail SMTP config
        $config = $this->emailconfig->get_gmail_smtp_config();
        $hash1 = $hash;
         // Load PHPMailer library
        $this->load->library('phpmailer_lib');

        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
         
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $config['smtp_user'];//working
        $mail->Password = $config['smtp_pass'];//working
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
            
        $mail->setFrom('region2.ictu@tesda.gov.ph', 'TDiS | Notification');
         
         // Add a recipient
         $mail->addAddress($email);
         
         // Add cc or bcc 
        // $mail->addCC('cc@example.com');
         //$mail->addBCC('bcc@example.com');
         
         // Email subject
         $mail->Subject =  'Next Steps for Your Application for the Position of '. $result['pos_desc'];
         
         // Set email format to HTML
         $mail->isHTML(true);
         
         // Email body content
         $mailContent = "
                       <!DOCTYPE html>
                        <html lang='en'>
                        <head>
                            <meta charset='UTF-8'>
                            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                            <title>Next Steps for Your Application</title>
                            <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap' rel='stylesheet'>
                            <style>
                                body {
                                    font-family: 'Poppins', sans-serif;
                                    line-height: 1.6;
                                    color: #333;
                                    margin: 0;
                                    padding: 0;
                                }
                                .container {
                                    max-width: 600px;
                                    margin: 20px auto;
                                    padding: 20px;
                                    background-color: #f9f9f9;
                                    border: 1px solid #ddd;
                                    border-radius: 8px;
                                }
                                .logo {
                                    text-align: center;
                                    margin-bottom: 20px;
                                }
                                .logo img {
                                    max-width: 150px;
                                }
                                h1 {
                                    color: #0056b3;
                                    text-align: center;
                                }
                                a {
                                    color: #0056b3;
                                    text-decoration: none;
                                }
                                a:hover {
                                    text-decoration: underline;
                                }
                                .step {
                                    margin-bottom: 15px;
                                }
                                /* Card styles for steps */
                                .step {
                                    background-color: #fff;
                                    border: 1px solid #ddd;
                                    border-radius: 8px;
                                    padding: 15px;
                                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                                }
                                .step strong {
                                    display: block;
                                    font-size: 1.1rem;
                                    color: #0056b3;
                                    margin-bottom: 10px;
                                }
                                .contact {
                                    margin-top: 20px;
                                    padding-top: 20px;
                                    border-top: 1px solid #ddd;
                                }
                                .disclaimer {
                                    margin-top: 30px;
                                    font-size: 0.85em;
                                    color: #555;
                                    border-top: 1px solid #ddd;
                                    padding-top: 15px;
                                }
                            </style>
                        </head>
                        <body>
                            <div class='container'>
                                <div class='logo'>
                                    <img src='[INSERT_LOGO_URL]' alt='System Logo'>
                                </div>
                                <h1>Complete Your Application by Following These Steps</h1>
                                <p>Dear Applicant,</p>
                                <p>Your application reference number is: <strong>".$reference."</strong>.</p>
                                <p>Please follow the instructions below to complete your application for the position of <strong>".$result['pos_desc']."</strong>.</p>
                                <small>To avoid disqualification, please ensure to upload authenticated documents.</small>

                                
                                <div class='step'>
                                    <strong>1. Education and Eligibility:</strong>
                                    <p>Upload and complete the <a href='".base_url().'education_eligibility/'.$hash1."' target='_blank'><b>Education and Eligibility Form</b></a>.</p>
                                </div>
                                
                                <div class='step'>
                                    <strong>2. Work Experience:</strong>
                                    <p>Upload and complete the <a href='".base_url().'work_experience/'.$hash1."' target='_blank'><b>Work Experience Form</b></a>.</p>
                                </div>
                                
                                <div class='step'>
                                    <strong>3. Relevant Training:</strong>
                                    <p>Upload and complete the <a href='".base_url().'relevant_training/'.$hash1."' target='_blank'><b>Relevant Training Form</b></a>.</p>
                                </div>
                                
                                <div class='step'>
                                    <strong>4. Special Acts Form:</strong>
                                    <p>Fill out the form as required through this <a href='".base_url().'special_acts_form/'.$hash1."' target='_blank'><b>Link</b></a></p>
                                    <ul>
                                        <li>Indigenous People's Act (RA 8371)</li>
                                        <li>Magna Carta for Disabled Persons (RA 7277)</li>
                                        <li>Solo Parents Welfare Act of 2000 (RA 8972)</li>
                                    </ul>
                                </div>
                                
                                <div class='step'>
                                    <strong>5. Personal Data and Work Experience Sheets:</strong>
                                    <p>Upload your <a href='".base_url().'pds_wes/'.$hash1."' target='_blank'><b>Personal Data Sheet and Work Experience Sheet</b></a>.</p>
                                </div>
                                
                                <div class='step'>
                                    <strong>6. References:</strong>
                                    <p>Complete the <a href='".base_url().'references/'.$hash1."' target='_blank'><b>References Form</b></a>.</p>
                                </div>
                                
                                <div class='step'>
                                    <strong>7. Awards Related to Performance:</strong>
                                    <p>Upload and complete the <a href='".base_url().'awards_related_to_performance/'.$hash1."' target='_blank'><b>Awards Related to Performance Form</b></a>.</p>
                                </div>
                                
                                <div class='step'>
                                    <strong>8. Expert Services:</strong>
                                    <p>Upload and complete the form for <a href='".base_url().'expert_services/'.$hash1."' target='_blank'><b>Expert Services in Active Participation in Professional/Technical Activities</b></a>.</p>
                                </div>
                                
                                <div class='step'>
                                    <strong>9. Committees/TWGs Participation:</strong>
                                    <p>Upload and complete the form for <a href='".base_url().'committees/'.$hash1."' target='_blank'><b>Participation in Committees/Technical Working Groups (TWGs)</b></a>.</p>
                                </div>
                                
                                <p>Best regards,</p>
                                <p><strong>TESDA Region II (Cagayan Valley) ICT Unit</strong></p>

                                <div class='contact'>
                                    <p><strong>Need Assistance?</strong></p>
                                    <p>If you encounter any issues or have questions, please contact our Technical Support Team:</p>
                                    <p>Email: <a href='mailto:region2_ictu@tesda.gov.ph'>region2_ictu@tesda.gov.ph</a></p>
                                    <p>Phone: (078) 846-1618</p>
                                </div>

                                <div class='disclaimer'>
                                    <p><strong>Email Disclaimer:</strong></p>
                                    <p align='justify'>This message is intended only for the use of the person to whom it is expressly addressed and may contain information that is confidential and legally privileged. If you are not the intended recipient, you are hereby notified that any use, reliance on, reference to, review, disclosure, or copying of the message and the information it contains for any purpose is strictly prohibited. If you have received this communication in error, please contact the sender immediately and delete this message from all computers. TESDA accepts no liability for any damage caused by any virus transmitted by this e-mail. Opinions obtained in this e-mail or any of its attachments do not necessarily reflect the opinion of TESDA.</p>
                                </div>
                            </div>
                        </body>
                        </html>
                        ";
         $mail->Body = $mailContent;
         
         // Send email
         if(!$mail->send()){
            
            $result = array(
                'status' => 'False',
                'message' => 'Mailer Error: Unable to send the email notification. Please contact the System Administrator at admin@example.com for assistance.'
            );
            return $result;
            exit;
         }else{
            $result = array(
                'status' => 'True'
            );
            return $result;
            exit;
         }
    }
    //-------------Email
    
//-----------------------------Last
}