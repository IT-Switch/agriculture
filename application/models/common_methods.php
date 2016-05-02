<?php
class Common_methods extends CI_Model
{

	function setUserSession($data){
		$session_data=serialize($data);
		$_SESSION['user_sess_info']=$session_data;
		return true;
	}

	function getUserSession(){
		if(!empty($_SESSION['user_sess_info']))
		{
			return  unserialize($_SESSION['user_sess_info']);
		}
	}


	function setUserRole($data)
	{
		$role_data=@explode(',',$data->user_codes);
		$_SESSION['user_role']=serialize($role_data);
		return true;
	}

	function getUserRole()
	{
		if(@$_SESSION['user_role']!='')
		{
			return  unserialize($_SESSION['user_role']);
		}
	}


	function setUserTask($data)
	{
		$task_data=@explode(',',$data->user_tasks);
		$_SESSION['user_task']=serialize($task_data);
		return true;
	}

	function getUserTask()
	{
		if(@$_SESSION['user_task']!=''){
			return unserialize($_SESSION['user_task']);
		}
	}

	 
	function checkLoginSession(){
		$sessionData=$this->getUserSession();
		if(empty($sessionData) || $sessionData==''){
			redirect($this->admin_url.'/user/');
			die();
		}
	}

	function logoutUser(){
		session_destroy();
		redirect($this->admin_url.'/user/');
		die();
	}
	function encodeKey()
	{
		$userData=$this->getUserSession();
		return base64_encode(rand(100,1000).'#'.$userData->user_id."#".rand(100,1000));
	}
	 
	function decodeKey($key)
	{
		$userData=$this->getUserSession();
		$key=base64_decode($key);
		$key=explode("#",$key);
		if(($userData->user_id)==$key[1])
		{
			return true;
		}
		else
		{
			redirect($this->admin_url.'/user/dashboard');
		}
	}


	function updateRowOfAnyTable($tableName,$dataArray,$where)
	{
		$this->db->trans_start();
		$query = $this->db->query($this->db->update_string($tableName, $dataArray, $where));
		$this->db->trans_complete();
		return true;
	}

	function insertRowToAnyTable($tableName,$dataArray)
	{
		$this->db->trans_start();
		$this->db->insert($tableName,$dataArray);
		$insertedRowId = $this->db->insert_id();
		$this->db->trans_complete();
		return $insertedRowId;
	}

	function getRowFromAnyTable($tableName,$whereArray)
	{
		$this->db->trans_start();
		$this->db->where($whereArray);
		$query = $this->db->get($tableName);
		if($query->num_rows() > 0)
		{
			$row = $query->row();
			$this->db->trans_complete();
			return $row;
		}
		$this->db->trans_complete();
	}

    function deteleData($tableName,$where){
            if($tableName && $where){
                $this->db->delete($tableName,$where); 
                return true;
            }else{
                return false;
            }
        }
    
	function getAllRecordsFromAnyTable($tableName,$whereArray='')
	{
		$this->db->trans_start();
		if($whereArray)
		{
			$this->db->where($whereArray);
		}

		$query = $this->db->get($tableName);
		if($query->num_rows() > 0)
		{
			$result = $query->result();
			$this->db->trans_complete();
			return $result;
		}
		$this->db->trans_complete();
	}
}
?>