<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('queryconstant');
		$this->qc=$this->queryconstant;
		$this->load->model('user_manager');
		$this->um=$this->user_manager;
		$this->load->model('common_methods');
		$this->cmm=$this->common_methods;
		$this->config->load('system');
		$this->admin_url = base_url($this->config->item('admin_url'));
		$this->load->library('paginator');
		session_start();
	}

	public function index()
	{
		$sessionData=$this->cmm->getUserSession();
		if(!empty($sessionData)){
			redirect($this->admin_url.'/user/dashboard');
			die();
		}
		else {
			if($this->input->post('login_btn')){
				if($this->_submit_validate()==TRUE){
					redirect($this->admin_url.'/user/dashboard');
					die();
				}
			}
			else if($this->input->post('forgot_btn')){
				if($this->validate_forgot_password()==TRUE){
					$vars['success_send']="Reset Password Link Sent On Your Email Id." ;
				}
			}
			$vars['content_view']='login';
			$this->load->view('admin/login_template',$vars);
		}
	}

	function _submit_validate()
	{
		$this->form_validation->set_rules('username', 'User Name','trim|required|callback_authenticate');
		$this->form_validation->set_rules('password', 'Password','trim|required');
		$this->form_validation->set_message('authenticate','Invalid login. Please try again.');
		return $this->form_validation->run();
	}

	function authenticate()
	{
		if($this->input->post('username')!='' && $this->input->post('password')!='')
		{
			$user_info=$this->um->getUserByUsernameAndPassword($this->input->post('username'),$this->input->post('password'));
			if($user_info)
			{
				$user_role = $this->um->getUserRole($user_info->user_id);
				$user_task = $this->um->getUserTask($user_info->user_id);
				
				$this->cmm->setUserSession($user_info);
				$this->cmm->setUserRole($user_role);
				$this->cmm->setUserTask($user_task);
			}
			else
			{
				return false;
			}
		}
	}

	function logoutUser()
	{
		$this->cmm->logoutUser();
	}

	function dashboard()
	{
		$this->cmm->checkLoginSession();
		$vars['content_view']='dashboard';
		$this->load->view('admin/inner_template',$vars);
	}
	
	function manageUser($key)
	{
		$this->cmm->decodeKey($key);

		/*==PAGINATION CODE==*/
		$perPage = 10; 
		$curPage=$this->input->post('page') ? $this->input->post('page') : @$postValues['page'];
		$curPage=$curPage ? $curPage : 1;
		$offset = ($curPage*$perPage)-$perPage;
		$totalRows=$this->um->getAllUserRecord('C');
		$pages = new paginator($totalRows,$perPage, $curPage);
		$vars['pagination']=$pages;
		$vars['offset']=$offset;
		$vars['user_record']=$this->um->getAllUserRecord('R',$offset,$perPage);
		
		$vars['content_view']='manage_user';
		$this->load->view('admin/inner_template',$vars);
	}


}
