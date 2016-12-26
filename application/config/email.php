<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
/**
 * Email Configuration
 */
$config['protocol']				= "smtp";
$config['allowed_types'] 	= "gif|jpg|jpeg|png|txt|php|pdf";
$config['smtp_host']			= "ssl://smtp.googlemail.com";
$config['smtp_user']			= "kresnaprismtest@gmail.com";
$config['smtp_pass']			= "kresnaprismtest123"; 
$config['smtp_port']			= 465;

$config['charset']				= "utf-8";
$config['mailtype']				= "html"; 
$config['crlf'] 					= "\r\n"; 
$config['newline'] 				= "\r\n"; 

/* End of file email.php */ 
/* Location: ./system/application/config/email.php */
