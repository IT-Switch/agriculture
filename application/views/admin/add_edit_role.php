<form class="form-horizontal" name="add_edit_subcategory" id="add_edit_form" action="" method="post" >
  <div class="box span12">
    <div class="box-header well" data-original-title>
      <h2><i class="icon-edit"></i>
        <?php if(isset($role_data)){echo 'Edit User Role'; }else{echo 'Add User Role'; }?>
      </h2>
    </div>
    <div class="box-content">
      <fieldset>
      <div class="control-group <?php if(form_error('role_name')){echo 'error';}?>">
        <label class="control-label" for="cat_name">Role Title<span class="form-required" title="This field is required.">*</span></label>
        <div class="controls">
          <input type="text" class="span6 typeahead required" name="role_name" id="role_name"  data-provide="typeahead" data-items="4" value="<?php if(isset($role_data)){echo $role_data->role_name; }?>">
          <span class="help-inline"> <?php echo form_error('role_name');?></span> </div>
      </div>
      <div class="form-actions"> <span id="loader"></span>
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="reset" class="btn">Reset</button>
      </div>
      </fieldset>
    </div>
  </div>
</form>
