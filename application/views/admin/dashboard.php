<div class="box span12">
  <div class="box-header well" data-original-title>
    <h2><i class="icon-user"></i> Dashboard</h2>
  </div>
  <div class="box-content">
    <div class="row-fluid">
	<?php 
	$userInfo = $this->cmm->getUserSession();
	echo 'Welcome '.$userInfo->first_name.' '.$userInfo->last_name;
	?>
    </div>
  </div>
</div>
