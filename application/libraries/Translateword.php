<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Email Class
 *
 * Permits email to be sent using Mail, Sendmail, or SMTP.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/email.html
 */
class Translateword {


	///language from what we translate
	var $translate_from;


	////language in what we whant to translate
	var $translate_into;

	///debug the code
	var $debug;




	function __construct($from='',$to='')
	{
		$this->debug = 0;
		ini_set("display_errors",$this->debug);
		$this->translate_from = "en";
		$this->translate_into = "fr";
		//echo $this->translate_into;die;
	}


	function TranslateUrl($word){


		if(!$word){

			die("you need to adda a translate word");
		}
		///we need to encode the word that we want to translate

		$word = urlencode($word);

		$url = "http://translate.google.com/?sl=". $this->translate_from ."&tl=". $this->translate_into ."&js=n&prev=_t&hl=it&ie=UTF-8&eotf=1&text=". $word ."";


		return $url;

	}

	function get($word){
		
		$dom  = new DOMDocument();
		
		$html =  $this->curl_download($this->TranslateUrl($word));

		@$dom->loadHTML($html);

		$xpath = new DOMXPath($dom);
		
		$tags = $xpath->query('//*[@id="result_box"]');

		foreach ($tags as $tag) {
			
			$var = trim($tag->nodeValue);

			if(!$var){
				///we wil make an autoupdate sistem hear in the future
				die("Problem with Google translate Word");
			}else{

				return trim($var);

			}
		    
		  		
		}

	}

	/*
		function for downloading the gooogle page content for translating 
	*/

	function curl_download($Url){
	 
	    // is cURL installed yet?
	    if (!function_exists('curl_init')){
	       
	        if (function_exists('file_get_contents')){

	        	return file_get_contents($Url);

	        }else{

	        	die("Your server dosen't support curl or file get contents");

	        }

	    }
	 
	    // OK cool - then let's create a new cURL resource handle
	    $ch = curl_init();
	    // Now set some options (most are optional)
	    // Set URL to download
	    curl_setopt($ch, CURLOPT_URL, $Url);
	 
	    // Set a referer
	 
	    // User agent
	    curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
	 
	    // Include header in result? (0 = yes, 1 = no)
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	 
	    // Should cURL return or print out the data? (true = return, false = print)
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	 
	    // Timeout in seconds
	    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	 
	    // Download the given URL, and return output
	    $output = curl_exec($ch);
	 
	    // Close the cURL resource, and free system resources
	    curl_close($ch);
	 
	   // echo $output;die;
		return trim($output);
	}


}
// END CI_Email class

/* End of file Email.php */
/* Location: ./system/libraries/Email.php */
?>