<?php
class User_manager extends CI_Model
{
	function getUserByUsernameAndPassword($username,$password)
	{
		$this->db->trans_start();
		$query = $this->db->query($this->qc->queryGetUserByUsernamePassword, array($username,md5($password)));
		if($query->num_rows() > 0)
		{
			$result = $query->result();
			$this->db->trans_complete();
			return $result[0];
		}
		$this->db->trans_complete();
	}

	function getUserRole($user_id)
	{
		$this->db->trans_start();
		$query = $this->db->query($this->qc->queryGetUserRole,array($user_id));
		if($query->num_rows() > 0)
		{
			$result = $query->row();
			$this->db->trans_complete();
			return $result;
		}
		$this->db->trans_complete();
	}

	function getUserTask($user_id)
	{
		$this->db->trans_start();
		$query = $this->db->query($this->qc->queryGetUserTask,array($user_id));
		if($query->num_rows() > 0)
		{
			$result = $query->row();
			$this->db->trans_complete();
			return $result;
		}
		$this->db->trans_complete();
	}

	function getAllUserRecord($type,$offset='',$perPage='') // $type = C For COUNT and R for Records
	{
		$sql = ($type=='C') ? $this->qc->queryGetUserCount : $this->qc->queryGetAllUserRecord;
		$this->db->trans_start();
		$query = $this->db->query($sql, array($offset,$perPage));
		$result='';
		if($query->num_rows() > 0)
		{
			if($type=='C')
			{
				$result = $query->row();
				$result = $result->total_record;
			}
			else
			{
				$result = $query->result();
			}
		}
		$this->db->trans_complete();
		return $result;
	}
	
	function getAllTaskWithRoleTaskByRoleId($role_id)
	{
		$this->db->trans_start();
		$query = $this->db->query($this->qc->queryGetAllTaskWithRoleTaskByRoleId,array($role_id));
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
