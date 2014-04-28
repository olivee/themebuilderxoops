<?php
	/*
	 * This script: 
	 * For PHP 5 >= 5.2.0 and suppoort PDO
	 * Takes the Ajax requests
	 * Save e-mail addresses in a CSV, MySql, Mailchimp, GetResponse, AWeber
	*/
	
	require_once('api_mailchimp/MCAPI.class.php');

	
	/* Options ************************************/
	
	/* MySql setting. To enable a setting, uncomment (remove the '#' at the start of the line)*/
	#define('DB_HOST', 'localhost');
	#define('DB_NAME', '');
	#define('DB_USER', ''); 
	#define('DB_PASS', '');
	#define('DB_TABLE_NAME', 's_subs');
	
	/* Mailchimp setting. To enable a setting, uncomment (remove the '#' at the start of the line)*/
	define('MC_APIKEY', '3cf046cb09a625d8cc25bc1fc2829e1c-us8'); //Your API key from here - http://admin.mailchimp.com/account/api
	define('MC_LISTID', '1bdbb6f051'); //List unique id from here - http://admin.mailchimp.com/lists/

	/* CSV file setting */
	define('FL_MAIL', '../../mails_00000.csv');
	
	/* File error log */
	define('ERROR_LOG', '../../error_log.txt');
	
	/* End Options ********************************/
	


	/* Install headers */
	header('Expires: 0');
	header('Cache-Control: no-cache, must-revalidate, post-check=0, pre-check=0');
	header('Pragma: no-cache');
	header('Content-Type: application/json; charset=utf-8');
	
	/* AJAX check */
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	   
		extract($_POST);

		try {
			// Validate and save emals		
			if(isset($subscribe) && validMail($subscribe)){
				saveFile($subscribe);
				//saveMySql($subscribe);
				saveMailChimp($subscribe);
			} else {
				throw new Exception("Email not valid",1);
			}
		} catch(Exception $e) {
			$code = $e->getCode();
		}
		
		echo $code?$code:0;

	} else {
		echo 'Only Ajax request';
	}
	
	function validMail($email)
	{
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			return true;
		} else {
			return false;
		}
	}
	
	function saveMySql($mailSubscribe)
	{
		/*if(defined('DB_HOST') && defined('DB_NAME') && defined('DB_USER') && defined('DB_PASS') && defined('DB_TABLE_NAME')){
			try {
				$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
			} catch(Exception $e) {
				errorLog("MySql",$e->getMessage());
			}
			
			$db->exec('CREATE TABLE IF NOT EXISTS '.DB_TABLE_NAME.' (email VARCHAR(255), time VARCHAR(255))');
			
			$query = $db->prepare('SELECT COUNT(*) AS count FROM '.DB_TABLE_NAME.' WHERE email = :email');  
			$query->execute(array(':email' => $mailSubscribe));
			$result = $query->fetch();
			
			if($result['count'] == 0){
				$query = $db->prepare('INSERT INTO '.DB_TABLE_NAME.' (email, time) VALUES (:email, :time)');  
				$query->execute(array('email' => $mailSubscribe, 'time' => date('Y-m-d H:i:s')));	
			} else {
				throw new Exception("Email exist",2);
			}
		}*/
		
		
		
		
	}
	
	function saveMailChimp($mailSubscribe)
	{
		if(defined('MC_APIKEY') && defined('MC_LISTID')){
			$api = new MCAPI(MC_APIKEY);
			if($api->listSubscribe(MC_LISTID, $mailSubscribe) !== true){
				if($api->errorCode == 214){
					throw new Exception("Email exist",2);
				} else {
					errorLog("MailChimp","[".$api->errorCode."] ".$api->errorMessage);
				}
			}
		}else{
		echo 'il faut definir le API KEY';
		}
	}
	
	function saveFile($mailSubscribe)
	{
		if(defined('FL_MAIL')){
			file_put_contents(FL_MAIL, date("m/d/Y H:i:s").";".$mailSubscribe.";\n", FILE_APPEND);
		}
	}
	
	function errorLog($name,$desc)
	{
		file_put_contents(ERROR_LOG, date("m.d.Y H:i:s")." (".$name.") ".$desc."\n", FILE_APPEND);
	}
	
	function getName($mail)
	{
		preg_match("/([a-zA-Z0-9._-]*)@[a-zA-Z0-9._-]*$/",$mail,$matches);
		return $matches[1];
	}

?>