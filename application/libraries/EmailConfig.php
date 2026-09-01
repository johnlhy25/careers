<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmailConfig {
    protected $CI;

    public function __construct() {
        // Get the CodeIgniter super object
        $this->CI =& get_instance();
        $this->CI->load->database();
    }

    public function get_gmail_smtp_config() {
        // Fetch Gmail SMTP credentials from the database
        $query = $this->CI->db->select('email, password')
                              ->from('smtp_settings')
                              ->where('is_active', 1)
                              ->get();

        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return [
                'smtp_user' => $row['email'],
                'smtp_pass' => $row['password'], 
            ];
        } else {
            return [];
        }
    }
}
