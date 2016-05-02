<div class="box span12">
  <div class="box-header well" data-original-title>
    <h2><i class="icon-user"></i> Manage User</h2>
	<span class="add_new_btn"><a class="btn btn-small btn-primary" href="<?php echo $this->admin_url.'/user/addUser/'.$this->cmm->encodeKey()?>">Add New User</a></span>
  </div>
  <div class="box-content">
    <div class="row-fluid">
      <div class="row-fluid">
        <?php
      if($user_record!='')
	  {
	  ?>
        <table class="table table-striped table-bordered bootstrap-datatable">
          <thead>
            <tr>
              <th>S.No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
			$i = '1';
            foreach($user_record as $key=>$val)
			{
			?>
            <tr>
              <td><?php echo $i;?></td>
              <td><?php echo $val->first_name.' '.$val->last_name;?></td>
              <td><?php echo $val->email;?></td>
              <td class="center"><?php
			if($val->status=='1')
			{ 
			?>
                <a href="#" title="Status"> <span class="label label-success">Active</span> </a>
                <?php
			}
			else
			{
			?>
                <a href="#" title="Status"> <span class="label">Inactive</span> </a>
                <?php
			}
						?></td>
              <td class="center"><a class="btn btn-info" href="#"> <i class="icon-edit icon-white"></i> Edit </a> <a class="btn btn-danger" href="#"> <i class="icon-trash icon-white"></i> Delete </a></td>
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
