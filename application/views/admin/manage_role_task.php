<form class="form-horizontal" name="add_edit_subcategory" id="add_edit_form" action="" method="post" >
  <div class="box span12">
    <div class="box-header well" data-original-title>
      <h2><i class="icon-edit"></i> Manage Task For <?php echo $role_data->role_name;?></h2>
    </div>
    <div class="box-content">
      <fieldset>
      <div class="control-group <?php if(form_error('role_name')){echo 'error';}?>">
        <label class="control-label" for="cat_name">Role Task<span class="form-required" title="This field is required.">*</span></label>
        <div class="controls">
          <select id="role_task" data-rel="" class="copyselectfield_language required" name="role_task[]" multiple="multiple" style="height:100px;width:200px">
              <option value="">Select</option>
              <?php 
				if($role_task_data)
				foreach($role_task_data as $val)
				{
				?>
                	<option value="<?php echo $val->task_id;?>" <?php if($val->role_id!=''){echo 'selected="selected"';}?> ><?php echo $val->task_name;?></option>
				<?php
				}
				?>
            </select>
          <span class="help-inline" for="cat_name" generated="true"> <?php echo form_error('role_name');?></span> </div>
      </div>
      <div class="form-actions"> <span id="loader"></span>
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="reset" class="btn">Reset</button>
      </div>
      </fieldset>
    </div>
  </div>
</form>
