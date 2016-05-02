<form class="form-horizontal" name="add_edit_subcategory" id="add_edit_form" action="" method="post" >
  <div class="box span12">
    <div class="box-header well" data-original-title>
      <h2><i class="icon-edit"></i>
        <?php if(isset($user_data)){echo 'Edit User'; }else{echo 'Add User'; }?>
      </h2>
    </div>
    <div class="box-content">
      <fieldset>
      <div class="control-group <?php if(form_error('first_name')){echo 'error';}?>">
        <label class="control-label" for="name">First Name<span class="form-required" title="This field is required.">*</span></label>
        <div class="controls">
          <input type="text" class="span6 typeahead" id="first_name" name="first_name"  data-provide="typeahead" data-items="4" value="<?php if(isset($_POST['first_name']))echo $_POST['first_name'];?>">
          <?php echo form_error('first_name');?> </div>
      </div>
      <div class="control-group <?php if(form_error('last_name')){echo 'error';}?>">
        <label class="control-label" for="name">Last Name<span class="form-required" title="This field is required.">*</span></label>
        <div class="controls">
          <input type="text" class="span6 typeahead" id="last_name" name="last_name"  data-provide="typeahead" data-items="4" value="<?php if(isset($_POST['last_name']))echo $_POST['last_name'];?>">
          <?php echo form_error('last_name');?> </div>
      </div>
      <div class="control-group <?php if(form_error('email')){echo 'error';}?>">
        <label class="control-label" for="mail">E-mail address<span class="form-required" title="This field is required.">*</span></label>
        <div class="controls">
          <input type="text" class="span6 typeahead" id="email" name="email"  data-provide="typeahead" data-items="4" value="<?php if(isset($_POST['email']))echo $_POST['email'];?>">
          <?php echo form_error('email');?> </div>
      </div>
      <div class="control-group <?php if(form_error('user_name')){echo 'error';}?>">
        <label class="control-label" for="name">Username<span class="form-required" title="This field is required.">*</span></label>
        <div class="controls">
          <input type="text" class="span6 typeahead" id="user_name" name="user_name"  data-provide="typeahead" data-items="4" value="<?php if(isset($_POST['user_name']))echo $_POST['user_name'];?>">
          <?php echo form_error('user_name');?> </div>
      </div>
      <div class="control-group <?php if(form_error('password')){echo 'error';}?>">
        <label class="control-label" for="pass">Password<span class="form-required" title="This field is required.">*</span></label>
        <div class="controls">
          <input type="password" class="span6 typeahead" id="password" name="password"  data-provide="typeahead" data-items="4" value="">
          <?php echo form_error('password');?> </div>
      </div>
      <div class="control-group <?php if(form_error('cpassword')){echo 'error';}?>">
        <label class="control-label" for="cpass">Confirm password<span class="form-required" title="This field is required.">*</span></label>
        <div class="controls">
          <input type="password" class="span6 typeahead" id="cpassword" name="cpassword" data-provide="typeahead" data-items="4" value="">
          <?php echo form_error('cpassword');?> </div>
      </div>
      <div class="control-group <?php if(form_error('role_id[]')){echo 'error';}?>">
        <label class="control-label" for="cat_name">User Role<span class="form-required" title="This field is required.">*</span></label>
        <div class="controls">
          <select id="role_id" data-rel="" class="copyselectfield_language required" name="role_id[]" multiple="multiple" style="height:100px;width:200px">
            <?php 
				if($role_data)
				foreach($role_data as $val)
				{
				?>
            <option value="<?php echo $val->role_id;?>" <?php if(in_array($val->role_id,$_POST['role_id'])){echo 'selected="selected"';}?> ><?php echo $val->role_name;?></option>
            <?php
				}
				?>
          </select>
          <?php echo form_error('role_id[]');?> <span class="help-inline" for="cat_name" generated="true"> <?php echo form_error('role_name');?></span> </div>
      </div>
      <div class="control-group">
        <label class="control-label">Status</label>
        <div class="controls">
          <label class="radio">
          <input type="radio" name="status" id="status1" value="1" checked="checked">
          Active </label>
          <div style="clear:both"></div>
          <label class="radio">
          <input type="radio" name="status" id="status2" value="0" <?php if(isset($_POST['status']) &&  $_POST['status']=='0'){echo 'checked="checked"';}?>>
          Blocked </label>
        </div>
      </div>
      <div class="form-actions">
        <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
        <button type="reset" class="btn">Cancel</button>
      </div>
      </fieldset>
    </div>
  </div>
</form>
