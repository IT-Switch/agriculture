<?php
class Queryconstant
{
	/************************           USER            *************************/
	public $queryGetUserByUsernamePassword= "SELECT u.* 
			FROM user u
			WHERE u.user_name = ? AND u.password = ? AND u.status = '1' ";
	 
	public $queryGetUserRole = "SELECT GROUP_CONCAT(r.role_id) as user_codes
			FROM `user_role` ur
			INNER JOIN `role` r ON r.role_id=ur.role_id
			WHERE ur.`user_id` =?
			GROUP BY ur.`user_id`";

	public $queryGetUserTask = "SELECT GROUP_CONCAT(t.task_name) as user_tasks
			FROM `user_role` ur
			INNER JOIN role_task rt ON rt.role_id = ur.role_id
			INNER JOIN `task` t ON t.task_id = rt.task_id
			WHERE ur.`user_id` =?
			GROUP BY ur.`user_id`";

	public $queryGetUserCount = "SELECT count(u.user_id) as total_record FROM `user` u";

	public $queryGetAllUserRecord = "SELECT u.* FROM `user` u LIMIT ?, ?";

	public $queryGetAllTaskWithRoleTaskByRoleId = "SELECT t. * , rt.role_id
													FROM `task` t
													LEFT JOIN `role_task` rt ON (rt.task_id = t.task_id
													AND rt.role_id =?)";
}?>