<form class="form-horizontal" action="" method="post">
  <fieldset>
  <div class="input-prepend" title="Username" data-rel="tooltip"> <span class="add-on"><i class="icon-user"></i></span>
    <input autofocus class="input-large span10" name="username" id="username" type="text" value="" />
  </div>
  <div class="clearfix"></div>
  <div class="input-prepend" title="Password" data-rel="tooltip"> <span class="add-on"><i class="icon-lock"></i></span>
    <input class="input-large span10" name="password" id="password" type="password" value="" />
	<input name="login_btn" type="hidden" value="login_btn" />
  </div>
  <div class="clearfix"></div>
  <p class="center span5">
    <button type="submit" class="btn btn-primary">Login</button>
  </p>
  </fieldset>
</form>
<?php /*?><div class="input-prepend" style="text-align:right;"> <a href="<?php echo site_url().$routing_val;?>/forgotpassword">Forgot Password</a> </div><?php */?>