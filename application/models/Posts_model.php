<?php

class Posts_model extends CI_Model{

    public function __construct(){

        $this->load->database();
        $this->load->helper("security");

        // Set table name
        $this->table = 'tbl_log';
        // Set orderable column fields
        $this->column_order = array(null, null, null, null, null, null, null, null);
        // Set searchable column fields
        //$this->column_search = array('usr_name', 'log_usr_ip', '');
        // Set default order
        $this->order = array('log_timestamp' => 'desc');

    }

    
    public function get_vacant_position_open(){
        $this->db->select('*');
        $this->db->from('tbl_hr_position');
        $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_hr_position.pos_ous_id');
        $this->db->join('tbl_hr_vacant','tbl_hr_vacant.vac_id = tbl_hr_position.vac_id');
        $this->db->where('tbl_hr_position.pos_status', 'Open');
        $this->db->order_by('tbl_hr_vacant.vac_deadline', 'Desc');
        $this->db->order_by('tbl_ous.ous_arrangement', 'Asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_vacant_position($pos_id){
        $this->db->select('*');
        $this->db->from('tbl_hr_position');
        $this->db->where('tbl_hr_position.pos_id', $pos_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function search_form_applicant(){
        $this->db->select('
            tbl_hr_applicant.app_id,
            tbl_hr_applicant.app_lastname,
            tbl_hr_applicant.app_hash,
            tbl_hr_position.pos_desc,
            tbl_hr_applicant_evaluation.eval_id,
            tbl_hr_applicant_evaluation.eval_result
        ');
        $this->db->from('tbl_hr_applicant');
        $this->db->join('tbl_hr_position', 'tbl_hr_position.pos_id = tbl_hr_applicant.app_vac_id');
        $this->db->join('tbl_hr_applicant_evaluation', 'tbl_hr_applicant_evaluation.app_id = tbl_hr_applicant.app_id', 'left');
        $this->db->where('tbl_hr_applicant.app_hash', $this->security->xss_clean($this->input->post('search_form_applicant')));
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_applicant_info(){
        $this->db->select('*');
        $this->db->from('tbl_hr_applicant');
        $this->db->where('tbl_hr_applicant.app_hash1', $this->input->post('form_app_id'));
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_applicant_info1($param){
        $this->db->select('*');
        $this->db->from('tbl_hr_applicant');
        $this->db->join('tbl_hr_position','tbl_hr_position.pos_id = tbl_hr_applicant.app_vac_id');
        $this->db->join('tbl_hr_applicant_documents','tbl_hr_applicant_documents.app_id = tbl_hr_applicant.app_id');
        $this->db->join('tbl_hr_vacant','tbl_hr_vacant.vac_id = tbl_hr_position.vac_id');
        //$this->db->join('tbl_hr_applicant_documents','tbl_hr_applicant_documents.app_id = tbl_hr_applicant.app_vac_id');
        $this->db->where('tbl_hr_applicant.app_hash1', $param);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_app_lastID(){
        //get the lastID
        $this->db->select_max('app_id'); // Replace 'id' with the name of your primary key column
        $this->db->from('tbl_hr_applicant');
        $query = $this->db->get();
        $result = $query->row();
        $new_id = $result->app_id + 1;
        //get the lastID
        return $new_id;
    }

    public function save_forme1($intent){
        // Set preference
        $year = date('Y');   // Get current year
        $month = date('m');  // Get current month

        //check duplicate
        $this->db->select('*');
        $this->db->from('tbl_hr_applicant');
        $this->db->join('tbl_hr_position','tbl_hr_position.pos_id = tbl_hr_applicant.app_vac_id');
        $this->db->join('tbl_hr_vacant','tbl_hr_vacant.vac_id = tbl_hr_position.vac_id');
        $this->db->where('tbl_hr_applicant.app_vac_id', $this->input->post('pos_id'));
        $this->db->where('tbl_hr_applicant.app_lastname', $this->input->post('lastname'));
        $this->db->where('tbl_hr_applicant.app_firstname', $this->input->post('firstname'));
        $this->db->where('tbl_hr_applicant.app_middlename', $this->input->post('middlename'));
        $this->db->where('tbl_hr_applicant.app_birthdate', $this->input->post('birthdate'));
        $this->db->where('tbl_hr_applicant.app_timestamp >= tbl_hr_vacant.vac_date_posted');
        $this->db->where('tbl_hr_applicant.app_timestamp <= DATE_ADD(tbl_hr_vacant.vac_deadline,INTERVAL 1 DAY)');

        //$this->db->where('app_vac_id', $param);    
        $query = $this->db->get();  
        //get applicant details
       

        if($query->num_rows() == 0) {
            // Send email for update or perform any action

            //get the lastID
            $lastID = $this->get_app_lastID();

            $hash = substr(md5($this->input->post('pos_id',true)),0 ,6)."-".substr(md5($this->input->post('lastname',true)),0 ,3)."-".substr(md5($this->input->post('firstname',true)),0 ,6)."-". $this->generateRandomString().$lastID;
            $hash1 = hash('sha256', $hash);
            
            $data = array(
                'app_vac_id'  => $this->input->post('pos_id'),
                'app_lastname'  => $this->input->post('lastname'),
                'app_firstname'  => $this->input->post('firstname'),
                'app_middlename'  => $this->input->post('middlename'),
                'app_suffix'  => $this->input->post('suffix'),
                'app_birthdate'  => $this->input->post('birthdate'),
                'app_age'  => $this->input->post('age'),
                'app_address'  => $this->input->post('address'),
                'app_contacts'  => $this->input->post('contactno'),
                'app_email'  => $this->input->post('email'),
                'app_nationality'  => $this->input->post('nationality'),
                'app_civil_status'  => $this->input->post('status'),
                'app_gender'  => $this->input->post('gender'),
                'app_educational'  => $this->input->post('education'),
                'app_course'  => $this->input->post('course'),
                'app_hash'  => $hash,
                'app_hash1'  => $hash1,
                'app_timestamp'  => date('Y-m-d H:i:s')
            );

            //clean the data before saving
            $data = $this->security->xss_clean($data);
            
            //check if saved successully
            $result = $this->db->insert('tbl_hr_applicant', $data);

            if($result){

                //get applicant ID
                $applicant_id = $this->db->insert_id();

                //save documents
                $data1 = array(
                    'app_id'  => $applicant_id,
                    'app_intent'  => $year . '/' . $month . '/' . $intent, // update check
                );

                $result1 = $this->db->insert('tbl_hr_applicant_documents', $data1);

                if($result1){
                    $return = array(
                        'status' => 'True',
                        'app_id' => $applicant_id,
                        'app_hash' => $hash,
                        'app_hash1' => $hash1,
                        'app_email'  => $this->input->post('email'),
                        'app_pos_id'  => $this->input->post('pos_id'),
                        'message' => 'Your application has been successfully submitted. Please check your email for the next steps. If you do not receive the email, kindly check your spam folder. For support, please contact us at region2.ictu@tesda.gov.ph or call 078 846-1618.'
                    );
                    return $return;
                    exit;
                }else{ 
                    //Check Error
                    $error = $this->db->error();
                    $return = array(
                        'status' => 'False',
                        'app_hash' => $hash,
                        'message' => 'Document/s: ' . $error['message'],
                        'app_id' => $applicant_id
                    ); 
                    return $return;
                    exit;
                }
            }else{
                //Check Error
                $error = $this->db->error();
                $return = array(
                    'status' => 'False',  // or use 'true', depending on the actual logic needed
                    'message' => $error['message']
                ); 
                return $return;
                exit;   
            }
            

        }else {
            $row = $query->row();  // Get the first row of the result as an object
            $email = $row->app_email;  // Access the 'app_email' field
            $return = array(
                'status' => 'False',
                'message' =>  "You already have an existing record for the position you are applying for. Check your email for additional instructions. If you do not receive the email, kindly check your spam folder. For support, please contact us at region2.ictu@tesda.gov.ph or call 078 846-1618. ",
                'app_email' => $email
            );
            return $return;
            exit;
        }

       
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function save_forme2($educational_file, $eligibility_file, $national_certificate_file, $nttc_file){

        $applicant_info = $this->get_applicant_info();

        $year = date('Y');   // Get current year
        $month = date('m');  // Get current month
        
        //-- Eligibility
        $array_eligibility = $this->input->post('eligibility');
        $result_eligibility = '';

        if (is_array($array_eligibility)) {

            foreach ($array_eligibility as $row) {

                if (trim($row) !== '') {
                    $result_eligibility .= ';' . $row;
                }

            }
        }

        if ($result_eligibility === '') {
            $result_eligibility = $applicant_info['app_eligibility'];
        }
        //-- Eligibility

        //-- NC
        $array_nc = $this->input->post('nc');
        $result_nc = '';

        if (is_array($array_nc)) {
            foreach ($array_nc as $row) {
                if (trim($row) !== '') {
                    $result_nc .= ';' . $row;
                }
            }
        }

        if ($result_nc === '') {
            $result_nc = $applicant_info['app_nc'];
        }
        //-- NC

        //-- NTTC
        $array_nttc = $this->input->post('nttc');
        $result_nttc = '';

        if (is_array($array_nttc)) {

            foreach ($array_nttc as $row) {

                if (trim($row) !== '') {
                    $result_nttc .= ';' . $row;
                }

            }
        }

        if ($result_nttc === '') {
            $result_nttc = $applicant_info['app_nttc'];
        }
        //-- NTTC

        // Data
        $data = array();

        if (!empty($array_eligibility)) {
            $data['app_eligibility'] = $result_eligibility;
        }

        if (!empty($array_nc)) {
            $data['app_nc'] = $result_nc;
        }

        if (!empty($array_nttc)) {
            $data['app_nttc'] = $result_nttc;
        }

        //clean
        $data = $this->security->xss_clean($data);
        if($this->security->xss_clean($data)){  
            //applicant info
            $this->db->where('app_id', $applicant_info['app_id']);
            $result = $this->db->update('tbl_hr_applicant', $data);  

            // Applicant docs
            $data1 = array(
                'app_educational_doc' => !empty($educational_file)
                    ? $educational_file
                    : null,

                'app_eligibility_doc' => !empty($eligibility_file)
                    ? $eligibility_file
                    : null,

                'app_nc_doc' => !empty($national_certificate_file)
                    ? $national_certificate_file
                    : null,

                'app_nttc_doc' => !empty($nttc_file)
                    ? $nttc_file
                    : null
            );

            $this->db->where('app_id', $applicant_info['app_id']);
            $this->db->update('tbl_hr_applicant_documents', $data1); 

            if($result){
                $return = array(
                    'status' => 'True'
                );
            }else{ 
                $return = array(
                    'status' => 'False'
                ); 
            }
            return $return;
        }

    }

    public function number_of_applicants($param){
        
        $this->db->select('*');
        $this->db->from('tbl_hr_applicant');
        $this->db->join('tbl_hr_applicant_documents','tbl_hr_applicant_documents.app_id = tbl_hr_applicant.app_id');
        $this->db->join('tbl_hr_position','tbl_hr_position.pos_id = tbl_hr_applicant.app_vac_id');
        $this->db->join('tbl_hr_vacant','tbl_hr_vacant.vac_id = tbl_hr_position.vac_id');
        //$this->db->join('tbl_ous','tbl_ous.ous_id = tbl_hr_position.pos_ous_id');
        $this->db->where('tbl_hr_applicant.app_vac_id', $param);
        $this->db->where('tbl_hr_applicant.app_timestamp >= tbl_hr_vacant.vac_date_posted');
        $this->db->where('tbl_hr_applicant.app_timestamp <= DATE_ADD(tbl_hr_vacant.vac_deadline,INTERVAL 1 DAY)');

        //$this->db->where('app_vac_id', $param);    
        $query = $this->db->get();
        if($query){
            return $query->num_rows();
        } 
    }

    public function save_forme3($ipcr_file, $cpa_file, $sr_file, $coe_file){

        $applicant_info = $this->get_applicant_info();

        $year = date('Y');   // Get current year
        $month = date('m');  // Get current month

        // Relevant work experience
        $array_work_experience = $this->input->post('relevant_experience');
        $result_work_experience = '';

        if (is_array($array_work_experience)) {

            foreach ($array_work_experience as $row) {

                if (trim($row) !== '') {
                    $result_work_experience .= ';' . $row;
                }

            }
        }

        if ($result_work_experience === '') {
            $result_work_experience = $applicant_info['app_relevant_experience'];
        }


        // Relevant work experience years
        $array_work_experience_years = $this->input->post('relevant_experience_years');
        $result_work_experience_years = '';

        if (is_array($array_work_experience_years)) {

            foreach ($array_work_experience_years as $row) {

                if (trim($row) !== '') {
                    $result_work_experience_years .= ';' . $row;
                }

            }
        }

        if ($result_work_experience_years === '') {
            $result_work_experience_years = $applicant_info['app_relevant_years'];
        }

        // Check date & years of service in TESDA
        $tesda_service = $this->input->post('tesda_service');

        if (trim($tesda_service) === '') {
            $tesda_service = $applicant_info['app_tesda_years'];
        }

        // Date of TESDA service
        $date_tesda_service = $this->input->post('date_tesda_service');

        if (trim($date_tesda_service) === '') {
            $date_tesda_service = $applicant_info['app_date_tesda'];
        }

        // Data
        $data = array(
            'app_present_position' => !empty($this->input->post('present_position'))
                ? $this->input->post('present_position')
                : $applicant_info['app_present_position'],
            'app_present_office' => !empty($this->input->post('present_office'))
                ? $this->input->post('present_office')
                : $applicant_info['app_present_office'],
            'app_years' => !empty($this->input->post('no_years'))
                ? $this->input->post('no_years')
                : $applicant_info['app_years'],
            'app_relevant_experience' => $result_work_experience,
            'app_relevant_years' => $result_work_experience_years,
            'app_tesda_years' => $tesda_service,
            'app_date_tesda' => $date_tesda_service
        );

        //clean
        $data = $this->security->xss_clean($data);
        if($this->security->xss_clean($data)){  
            //applicant info
            $this->db->where('app_id', $applicant_info['app_id']);
            $result = $this->db->update('tbl_hr_applicant', $data);  

            // Applicant docs
            $data1 = array(
                'app_coe_doc' => !empty($coe_file)
                    ? $coe_file
                    : null,

                'app_sr' => !empty($sr_file)
                    ? $sr_file
                    : null,

                'app_appointment' => !empty($cpa_file)
                    ? $cpa_file
                    : null,

                'app_ipcr' => !empty($ipcr_file)
                    ? $ipcr_file
                    : null
            );

            $this->db->where('app_id', $applicant_info['app_id']);
            $this->db->update('tbl_hr_applicant_documents', $data1); 

            if($result){
                $return = array(
                    'status' => 'True'
                );
            }else{ 
                $return = array(
                    'status' => 'False'
                ); 
            }
            return $return;
        }

    }

    public function save_forme4($training_file){

        $applicant_info = $this->get_applicant_info();

        $year = date('Y');   // Get current year
        $month = date('m');  // Get current month

        // Relevant Training
        $array_relevant_training = $this->input->post('relevant_training');
        $result_relevant_training = '';

        if (is_array($array_relevant_training)) {
            foreach ($array_relevant_training as $row) {
                if (trim($row) !== '') {
                    $result_relevant_training .= ';' . $row;
                }
            }
        }

        if ($result_relevant_training === '') {
            $result_relevant_training = $applicant_info['app_training'];
        }

        // Relevant Training Hours
        $array_relevant_training_hours = $this->input->post('relevant_training_hours');
        $result_relevant_training_hours = '';
        if (is_array($array_relevant_training_hours)) {
            foreach ($array_relevant_training_hours as $row) {

                if (trim($row) !== '') {
                    $result_relevant_training_hours .= ';' . $row;
                }
            }
        }

        if ($result_relevant_training_hours === '') {
            $result_relevant_training_hours = $applicant_info['app_training_hours'];
        }

        // Data
        $data = array(
            'app_training' => $result_relevant_training,
            'app_training_hours' => $result_relevant_training_hours
        );

        //clean
        $data = $this->security->xss_clean($data);
        if($this->security->xss_clean($data)){  

            //applicant info
            $this->db->where('app_id', $applicant_info['app_id']);
            $result = $this->db->update('tbl_hr_applicant', $data);  

            //applicant docs
            $data1 = array(
                'app_training_doc' => !empty($training_file)
                    ? $training_file
                    : null

            );

            $this->db->where('app_id', $applicant_info['app_id']);
            $this->db->update('tbl_hr_applicant_documents', $data1); 

            if($result){
                $return = array(
                    'status' => 'True'
                );
            }else{ 
                $return = array(
                    'status' => 'False'
                ); 
            }
            return $return;
        }
    }

    public function save_forme5(){

        $applicant_info = $this->get_applicant_info();

        // RA8371
        $array_RA8371 = $this->input->post('ra8371');
        $result_RA8371 = '';

        if (is_array($array_RA8371)) {
            foreach ($array_RA8371 as $row) {
                if (trim($row) !== '') {
                    $result_RA8371 .= ';' . $row;
                }
            }
        }

        if ($result_RA8371 === '') {
            $result_RA8371 = $applicant_info['app_ra8371'];
        }


        // RA7277
        $array_RA727 = $this->input->post('ra727');
        $result_RA727 = '';

        if (is_array($array_RA727)) {
            foreach ($array_RA727 as $row) {
                if (trim($row) !== '') {
                    $result_RA727 .= ';' . $row;
                }
            }
        }

        if ($result_RA727 === '') {
            $result_RA727 = $applicant_info['app_ra7277'];
        }


        // RA8972
        $array_RA8972 = $this->input->post('ra8972');
        $result_RA8972 = '';
        if (is_array($array_RA8972)) {
            foreach ($array_RA8972 as $row) {
                if (trim($row) !== '') {
                    $result_RA8972 .= ';' . $row;
                }
            }
        }

        if ($result_RA8972 === '') {
            $result_RA8972 = $applicant_info['app_ra8972'];
        }


        // Data
        $data = array(
            'app_ra8371' => $result_RA8371,
            'app_ra7277' => $result_RA727,
            'app_ra8972' => $result_RA8972
        );

        //clean
        $data = $this->security->xss_clean($data);
        if($this->security->xss_clean($data)){  
            //applicant info
            $this->db->where('app_id', $applicant_info['app_id']);
            $result = $this->db->update('tbl_hr_applicant', $data);  

            if($result){
                $return = array(
                    'status' => 'True'
                );
            }else{ 
                $return = array(
                    'status' => 'False'
                ); 
            }
            return $return;
        }
    }

    public function save_forme6($pds_file, $wes_file){

        $year = date('Y');   // Get current year
        $month = date('m');  // Get current month 

        //applicant docs
        $data1 = array(
            'app_pds'  => $year . '/' . $month . '/' . $pds_file,
            'app_wes'  => $year . '/' . $month . '/' . $wes_file
        );

        $this->db->where('app_id', $this->input->post('forme6_app_id'));
        $result = $this->db->update('tbl_hr_applicant_documents', $data1); 

        if($result){
            $return = array(
                'status' => 'True'
            );
        }else{ 
            $return = array(
                'status' => 'False'
            ); 
        }
        return $return;
    }

    public function save_forme7(){

        //immediate_supervisor
        $array_immediate_supervisor = $this->input->post('immediate_supervisor');
        $result_immediate_supervisor = '';

        foreach($array_immediate_supervisor as $row){
            $result_immediate_supervisor = $result_immediate_supervisor.';'.$row;
        }

        //peer
        $array_peer = $this->input->post('peer');
        $result_peer = '';

        foreach($array_peer as $row){
            $result_peer = $result_peer.';'.$row;
        }

        //client
        $array_client = $this->input->post('client');
        $result_client = '';

        foreach($array_client as $row){
            $result_client = $result_client.';'.$row;
        }
         
         
        $data = array(
            'app_supervisor' => $result_immediate_supervisor,
            'app_peer' => $result_peer,
            'app_client' => $result_client  
        );

        //clean
        $data = $this->security->xss_clean($data);
        if($this->security->xss_clean($data)){  
            //applicant info
            $this->db->where('app_id', $this->input->post('forme7_app_id'));
            $result = $this->db->update('tbl_hr_applicant', $data);  

            if($result){
                $return = array(
                    'status' => 'True'
                );
            }else{ 
                $return = array(
                    'status' => 'False'
                ); 
            }
            return $return;
        }

    }

    public function save_forme8($arp_file){
    
        $year = date('Y');   // Get current year
        $month = date('m');  // Get current month 

        $data = array(
            'app_performance_international' => $this->input->post('international_arp'),
            'app_performance_national' => $this->input->post('national_arp'),
            'app_performance_regional' => $this->input->post('regional_arp'),
            'app_performance_provincial' => $this->input->post('provincial_arp')
        );

        //clean
        $data = $this->security->xss_clean($data);
        if($this->security->xss_clean($data)){  
            //applicant info
            $this->db->where('app_id', $this->input->post('forme8_app_id'));
            $result = $this->db->update('tbl_hr_applicant', $data);  

            //applicant docs
            $data1 = array(
                'app_performance'  => $year . '/' . $month . '/' . $arp_file
            );

            $this->db->where('app_id', $this->input->post('forme8_app_id'));
            $this->db->update('tbl_hr_applicant_documents', $data1); 

            if($result){
                $return = array(
                    'status' => 'True'
                );
            }else{ 
                $return = array(
                    'status' => 'False'
                ); 
            }
            return $return;
        }

    }

    public function save_forme9($expertise_file){
        $year = date('Y');   // Get current year
        $month = date('m');  // Get current month 

        $data = array(
            'app_expert_international' => $this->input->post('international_expertise'),
            'app_expertise_national' => $this->input->post('national_expertise'),
            'app_expertise_regional' => $this->input->post('regional_expertise'),
            'app_expertise_provincial' => $this->input->post('provincial_expertise')
        );

        //clean
        $data = $this->security->xss_clean($data);
        if($this->security->xss_clean($data)){  
            //applicant info
            $this->db->where('app_id', $this->input->post('forme9_app_id'));
            $result = $this->db->update('tbl_hr_applicant', $data);  

            //applicant docs
            $data1 = array(
                'app_service'  => $year . '/' . $month . '/' . $expertise_file
            );

            $this->db->where('app_id', $this->input->post('forme9_app_id'));
            $this->db->update('tbl_hr_applicant_documents', $data1); 

            if($result){
                $return = array(
                    'status' => 'True'
                );
            }else{ 
                $return = array(
                    'status' => 'False'
                ); 
            }
            return $return;
        }

    }

    public function save_forme10($cmt_file){
        
        $year = date('Y');   // Get current year
        $month = date('m');  // Get current month 

        $data = array(
            'app_committee_chair' => $this->input->post('cmt_chair'),
            'app_committee_vchair' => $this->input->post('cmt_vcchair'),
            'app_committee_member' => $this->input->post('cmt_member'),
            'app_committee_sec' => $this->input->post('cmt_secretariat')
        );

        //clean
        $data = $this->security->xss_clean($data);
        if($this->security->xss_clean($data)){  
            //applicant info
            $this->db->where('app_id', $this->input->post('forme10_app_id'));
            $result = $this->db->update('tbl_hr_applicant', $data);  

            //applicant docs
            $data1 = array(
                'app_committee'  => $year . '/' . $month . '/' . $cmt_file
            );

            $this->db->where('app_id', $this->input->post('forme10_app_id'));
            $this->db->update('tbl_hr_applicant_documents', $data1); 

            if($result){
                $return = array(
                    'status' => 'True'
                );
            }else{ 
                $return = array(
                    'status' => 'False'
                ); 
            }
            return $return;
        }
    }

}// ---------------------- Last