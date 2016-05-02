<div class="box span12">
  <div class="box-header well" data-original-title>
    <h2><i class="icon-user"></i> Manage User Role</h2>
	<span class="add_new_btn"><a class="btn btn-small btn-primary" href="<?php echo $this->admin_url.'/user/addRole/'.$this->cmm->encodeKey()?>">Add New Role</a></span>
  </div>
  <div class="box-content">
    <div class="row-fluid">
      <div class="row-fluid">
        <?php
      if($role_record!='')
	  {
	  ?>
        <table class="table table-striped table-bordered bootstrap-datatable">
          <thead>
            <tr>
              <th>S.No</th>
              <th>Role Name</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
			$i = '1';
            foreach($role_record as $key=>$val)
			{
			?>
            <tr>
              <td><?php echo $i;?></td>
              <td><?php echo $val->role_name;?></td>
              <td class="center"><a class="btn btn-info" href="<?php echo $this->admin_url.'/user/editRole/'.$val->role_id.'/'.$this->cmm->encodeKey()?>" title="Edit"> <i class="icon-edit icon-white"></i> Edit </a>
			  <a class="btn btn-success" href="<?php echo $this->admin_url.'/user/manageRoleTask/'.$val->role_id.'/'.$this->cmm->encodeKey()?>" title="Manage Role Task"> <i class="icon-edit icon-white"></i> Task </a> </td>
            </tr>
            <?php
			$i++;}
			?>
          </tbody>
        </table>
        <?php
	  }
	  else
	  {
		 echo 'No record found...'; 
	  }
	  ?>
      </div>
    </div>
  </div>
  <!--/span-->
</div>
