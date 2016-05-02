<?php
class LanguageLoader
{
    function initialize() {
        $ci =& get_instance();
        $ci->load->helper('language');
		$site_lang = $ci->session->userdata('site_langauge');
        if ($site_lang) {
            $ci->lang->load('message',$ci->session->userdata('site_langauge'));
			$ci->lang->load('form_validation', $ci->session->userdata('site_langauge')); 
        } else {
            $ci->lang->load('message','english');
			$ci->lang->load('form_validation', 'english'); 
        }
    }
}