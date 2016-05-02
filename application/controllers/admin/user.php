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
	
	function manageRole($key)
	{
		$this->cmm->decodeKey($key);
		$vars['role_record']=$this->cmm->getAllRecordsFromAnyTable('role',array('role_id >'=>1));
		$vars['content_view']='manage_user_role';
		$this->load->view('admin/inner_template',$vars);
	}
	
	function addRole($key)
	{
		$this->cmm->decodeKey($key);
		if($this->input->post())
		{
			$this->form_validation->set_rules('role_name', 'Role Title','trim|required');
			if($this->form_validation->run())
			{
				$role_arr = array('role_name'=>$this->input->post('role_name'));
				$this->cmm->insertRowToAnyTable('role',$role_arr);
				$this->session->set_flashdata('success_message','Role added successfully.');
				redirect($this->admin_url.'/user/manageRole/'.$this->cmm->encodeKey());
			}
		}
		$vars['content_view']='add_edit_role';
		$this->load->view('admin/inner_template',$vars);
	}
	
	function editRole($role_id,$key)
	{
		$this->cmm->decodeKey($key);
		if($this->input->post())
		{
			$this->form_validation->set_rules('role_name', 'Role Title','trim|required');
			if($this->form_validation->run())
			{
				$role_arr = array('role_name'=>$this->input->post('role_name'));
				$this->cmm->updateRowOfAnyTable('role',$role_arr,array('role_id'=>$role_id));
				$this->session->set_flashdata('success_message','Role updated successfully.');
				redirect($this->admin_url.'/user/manageRole/'.$this->cmm->encodeKey());
			}
		}
		$vars['role_data']=$this->cmm->getRowFromAnyTable('role',array('role_id'=>$role_id));
		$vars['content_view']='add_edit_role';
		$this->load->view('admin/inner_template',$vars);
	}
	
	function manageRoleTask($role_id,$key)
	{
		$this->cmm->decodeKey($key);
		if($this->input->post())
		{
			$this->cmm->deteleData('role_task',array('role_id'=>$role_id));
			$role_task = $this->input->post('role_task');
			if(count($role_task)>0)
			{
				foreach($role_task as $val)
				{
					$this->cmm->insertRowToAnyTable('role_task',array('role_id'=>$role_id,'task_id'=>$val));
				}
			}
			$this->session->set_flashdata('success_message','Role Task updated successfully.');
			redirect($this->admin_url.'/user/manageRole/'.$this->cmm->encodeKey());
		}
		$vars['role_data']=$this->cmm->getRowFromAnyTable('role',array('role_id'=>$role_id));
		$vars['role_task_data'] = $this->um->getAllTaskWithRoleTaskByRoleId($role_id);
		$vars['content_view']='manage_role_task';
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

	function addUser($key)
	{		
		$this->cmm->decodeKey($key);
		if($this->input->post())
		{
			$this->form_validation->set_rules('first_name', 'First Name','trim|required');
			$this->form_validation->set_rules('last_name', 'Last Name','trim|required');
			$this->form_validation->set_rules('email', 'Email','trim|required|valid_email');
			$this->form_validation->set_rules('user_name', 'User Name','trim|required');
			$this->form_validation->set_rules('password', 'Password','trim|required');
			$this->form_validation->set_rules('cpassword', 'Confirm Password','trim|required|matches[password]');
			$this->form_validation->set_rules('role_id[]', 'User Role','trim|required');
			$this->form_validation->set_error_delimiters('<span class="help-inline">','</span>');
			if($this->form_validation->run())
			{
				$user_arr = array('first_name'=>$this->input->post('first_name'),'last_name'=>$this->input->post('last_name'),'email'=>$this->input->post('email'),'user_name'=>$this->input->post('user_name'),'password'=>md5($this->input->post('password')),'status'=>$this->input->post('status'));
				$user_id = $this->cmm->insertRowToAnyTable('user',$user_arr);
				$user_role = $this->input->post('role_id');
				if(count($user_role)>0)
				{
					foreach($user_role as $val)
					{
						$this->cmm->insertRowToAnyTable('user_role',array('role_id'=>$val,'user_id'=>$user_id));
					}
				}
				$this->session->set_flashdata('success_message','User added successfully.');
				redirect($this->admin_url.'/user/manageUser/'.$this->cmm->encodeKey());
			}
		}
		$vars['content_view']='add_edit_user';
		$minUserRole = min($this->cmm->getUserRole());
		$vars['role_data']=$this->cmm->getAllRecordsFromAnyTable('role',array('role_id >'=>$minUserRole));
		$this->load->view('admin/inner_template',$vars);
	}
	

}
