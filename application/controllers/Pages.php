<?php

class Pages extends CI_Controller
{
//-----------------------------First

    public function __construct() {
        parent:: __construct();
        $this->load->helper('url');
        //$this->load->model('authors_model');
        $this->load->library("pagination");
        $this->load->library('form_validation');
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
    
    public function save_forme1(){

        $this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_validate_captcha');
        
        if ($this->form_validation->run() == FALSE){

            $result = array(
                'status' => 'False',
                'error' => 'Please <strong>confirm</strong> that you are not a robot.'
            );
            echo json_encode($result);

        }else{   
            // Set preference
            $config['upload_path'] ='uploads/ApplicantDocx';
            $config['allowed_types'] = 'pdf';
            $config['max_size']    = '2000';    // max_size in kb
            $config['file_name'] = $_FILES['intent_file']['name'];
                
            //Load upload library
            $this->load->library('upload', $config);   
            
            $this->upload->initialize($config);

            $uploadData = $this->upload->data();
            //$intent = $uploadData['file_name'];

            // File upload
            if($this->upload->do_upload('intent_file')){

                //check certificate of grades // for upload
                if(!empty($_FILES['education_file']['name'])){
                    
                    $uploadData = $this->upload->data();
                    $intent = $uploadData['file_name'];

                    $resultx = $this->educational_file();

                    if($resultx['status'] == 'True'){
                       $educational_file = $resultx['filename'];
                    }else{
                        $result = array(
                            'status' => 'False',
                            'error' => $resultx['error']
                        );
                        echo json_encode($result);
                        exit;
                    }

                }else{
                    $uploadData = $this->upload->data();
                    $intent = $uploadData['file_name'];
                    $educational_file = null;
                }

                $status = $this->Posts_model->save_forme1($intent, $educational_file);

                if($status['status'] == 'True'){
                    $result = array(
                        'status' => 'True',
                        'app_id' => $status['app_id'],
                        'app_hash' => $status['app_hash']
                    );

                }else{
                    $result = array(
                        'status' => 'False',
                        'error' => 'Server Error'
                    );
                }
                echo json_encode($result);

            }else{
                $result = array(
                    'status' => 'False',
                    'error' => "Intent Letter Docs: ".$this->upload->display_errors()
                );
                echo json_encode($result);
            }
        }
    }

    function educational_file(){
        // Set preference
        $config['upload_path'] ='uploads/ApplicantDocx';
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $_FILES['education_file']['name'];
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('education_file')){  
            $uploadData = $this->upload->data();
            $educational_file = $uploadData['file_name'];

            $result = array(
                'status' => 'True',
                'filename' => $educational_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'error' => "Educational Attainment Docs: ".$this->upload->display_errors()
            );

            return $result;
        }
    }

    public function save_forme2(){

        //check eligibility file // for upload
        if(!empty($_FILES['eligibility_file']['name'])){
            $resultx = $this->eligibility_file();
            if($resultx['status'] == 'True'){
                $eligibility_file = $resultx['filename'];
            }else{
                $result = array(
                    'status' => 'False',
                    'error' => $resultx['error']
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
                    'error' => $resultx['error']
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
                    'error' => $resultx['error']
                );
                echo json_encode($result);
                exit;
            }
        }else{
            $nttc_file = null;
        }

        $status = $this->Posts_model->save_forme2($eligibility_file, $national_certificate_file, $nttc_file);

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

    function eligibility_file(){
        // Set preference
        $config['upload_path'] ='uploads/ApplicantDocx';
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $_FILES['eligibility_file']['name'];
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('eligibility_file')){  
            $uploadData = $this->upload->data();
            $eligibility_file = $uploadData['file_name'];

            $result = array(
                'status' => 'True',
                'filename' => $eligibility_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'error' => "Eligibility Docs: ".$this->upload->display_errors()
            );

            return $result;
        }
    }

    function national_certificate_file(){
        // Set preference
        $config['upload_path'] ='uploads/ApplicantDocx';
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $_FILES['national_certificate_file']['name'];
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('national_certificate_file')){  
            $uploadData = $this->upload->data();
            $national_certificate_file = $uploadData['file_name'];

            $result = array(
                'status' => 'True',
                'filename' => $national_certificate_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'error' => "National Certificate Docs: ".$this->upload->display_errors()
            );

            return $result;
        }
    }

    function nttc_file(){
        // Set preference
        $config['upload_path'] ='uploads/ApplicantDocx';
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $_FILES['nttc_file']['name'];
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('nttc_file')){  
            $uploadData = $this->upload->data();
            $nttc_file = $uploadData['file_name'];

            $result = array(
                'status' => 'True',
                'filename' => $nttc_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'error' => "NTTC Docs: ".$this->upload->display_errors()
            );

            return $result;
        }
    }

    public function save_forme3(){

        //Check Certificate of Employment
        if(!empty($_FILES['coe_file']['name'])){
            $resultx = $this->coe_file();
            if($resultx['status'] == 'True'){
                $coe_file = $resultx['filename'];
            }else{
                $result = array(
                    'status' => 'False',
                    'error' => $resultx['error']
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
                    'error' => $resultx['error']
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
                    'error' => $resultx['error']
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
                    'error' => $resultx['error']
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
            );

        }else{
            $result = array(
                'status' => 'False',
                'error' => 'Server Error'
            );
        }
        echo json_encode($result);

    }

    function coe_file(){
        // Set preference
        $config['upload_path'] ='uploads/ApplicantDocx';
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $_FILES['coe_file']['name'];
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('coe_file')){  
            $uploadData = $this->upload->data();
            $coe_file = $uploadData['file_name'];

            $result = array(
                'status' => 'True',
                'filename' => $coe_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'error' => "Certificate of Employment Docs: ".$this->upload->display_errors()
            );

            return $result;
        }
    }

    function sr_file(){
        // Set preference
        $config['upload_path'] ='uploads/ApplicantDocx';
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $_FILES['sr_file']['name'];
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('sr_file')){  
            $uploadData = $this->upload->data();
            $sr_file = $uploadData['file_name'];

            $result = array(
                'status' => 'True',
                'filename' => $sr_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'error' => "Service Record Docs: ".$this->upload->display_errors()
            );

            return $result;
        }
    }

    function cpa_file(){
        // Set preference
        $config['upload_path'] ='uploads/ApplicantDocx';
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $_FILES['cpa_file']['name'];
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('cpa_file')){  
            $uploadData = $this->upload->data();
            $cpa_file = $uploadData['file_name'];

            $result = array(
                'status' => 'True',
                'filename' => $cpa_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'error' => "Copy of Previous Appointment Docs: ".$this->upload->display_errors()
            );

            return $result;
        }
    }

    function ipcr_file(){
        // Set preference
        $config['upload_path'] ='uploads/ApplicantDocx';
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $_FILES['ipcr_file']['name'];
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('ipcr_file')){  
            $uploadData = $this->upload->data();
            $ipcr_file = $uploadData['file_name'];

            $result = array(
                'status' => 'True',
                'filename' => $ipcr_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'error' => "Performance rating Docs: ".$this->upload->display_errors()
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
        $config['upload_path'] ='uploads/ApplicantDocx';
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
        $config['upload_path'] ='uploads/ApplicantDocx';
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
        $config['upload_path'] ='uploads/ApplicantDocx';
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
        // Set preference
        $config['upload_path'] ='uploads/ApplicantDocx';
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
        // Set preference
        $config['upload_path'] ='uploads/ApplicantDocx';
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
        // Set preference
        $config['upload_path'] ='uploads/ApplicantDocx';
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

//-----------------------------Last
}