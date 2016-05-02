<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>User Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
<meta name="author" content="Muhammad Usman">
<!-- The styles -->
<link id="bs-css" href="<?php echo base_url();?>css/admin/bootstrap-cerulean.css" rel="stylesheet">
<style type="text/css">
body {
	padding-bottom: 40px;
}
.sidebar-nav {
	padding: 9px 0;
}
</style>
<link href="<?php echo base_url();?>css/admin/bootstrap-responsive.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/admin/charisma-app.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/admin/jquery-ui-1.8.21.custom.css" rel="stylesheet">
<link href='<?php echo base_url();?>css/admin/fullcalendar.css' rel='stylesheet'>
<link href='<?php echo base_url();?>css/admin/fullcalendar.print.css' rel='stylesheet'  media='print'>
<link href='<?php echo base_url();?>css/admin/chosen.css' rel='stylesheet'>
<link href='<?php echo base_url();?>css/admin/uniform.default.css' rel='stylesheet'>
<link href='<?php echo base_url();?>css/admin/colorbox.css' rel='stylesheet'>
<link href='<?php echo base_url();?>css/admin/jquery.cleditor.css' rel='stylesheet'>
<link href='<?php echo base_url();?>css/admin/jquery.noty.css' rel='stylesheet'>
<link href='<?php echo base_url();?>css/admin/noty_theme_default.css' rel='stylesheet'>
<link href='<?php echo base_url();?>css/admin/elfinder.min.css' rel='stylesheet'>
<link href='<?php echo base_url();?>css/admin/elfinder.theme.css' rel='stylesheet'>
<link href='<?php echo base_url();?>css/admin/jquery.iphone.toggle.css' rel='stylesheet'>
<link href='<?php echo base_url();?>css/admin/opa-icons.css' rel='stylesheet'>
<link href='<?php echo base_url();?>css/admin/uploadify.css' rel='stylesheet'>
<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
<!-- The fav icon -->
<link rel="shortcut icon" href="img/favicon.ico">
</head>
<body>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="row-fluid">
      <div class="span12 center login-header">
        <h2>Welcome</h2>
      </div>
      <!--/span-->
    </div>
    <!--/row-->
    <div class="row-fluid">
      <div class="well span5 center login-box">
        <div class="alert alert-info"> Please login with your Username and Password.</div>
        <?php
		$validation_errors = validation_errors();
        if((isset($validation_errors) && $validation_errors!='') || $this->session->flashdata('error')!='')
		
		{?>
        <div class="alert alert-error">
          <!--<button class="close" data-dismiss="alert" type="button">×</button>-->
          <?php if($this->session->flashdata('error')!=''){echo '<p>'.$this->session->flashdata('error').'</p>';} echo validation_errors();?>
        </div>
        <?php
		}
        if(($this->session->flashdata('success')!=''))
		{
		?>
        <div class="alert alert-success"><?php echo $this->session->flashdata('success');?> </div>
        <?php
		}
		?>
        <?php $this->load->view('admin/'.$content_view);?>
      </div>
      <!--/span-->
    </div>
    <!--/row-->
  </div>
  <!--/fluid-row-->
</div>
<!--/.fluid-container-->
<!-- external javascript
	================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- jQuery -->
<script src="<?php echo base_url();?><?php echo base_url();?>js/admin/jquery-1.7.2.min.js"></script>
<!-- jQuery UI -->
<script src="<?php echo base_url();?>js/admin/jquery-ui-1.8.21.custom.min.js"></script>
<!-- transition / effect library -->
<script src="<?php echo base_url();?>js/admin/bootstrap-transition.js"></script>
<!-- alert enhancer library -->
<script src="<?php echo base_url();?>js/admin/bootstrap-alert.js"></script>
<!-- modal / dialog library -->
<script src="<?php echo base_url();?>js/admin/bootstrap-modal.js"></script>
<!-- custom dropdown library -->
<script src="<?php echo base_url();?>js/admin/bootstrap-dropdown.js"></script>
<!-- scrolspy library -->
<script src="<?php echo base_url();?>js/admin/bootstrap-scrollspy.js"></script>
<!-- library for creating tabs -->
<script src="<?php echo base_url();?>js/admin/bootstrap-tab.js"></script>
<!-- library for advanced tooltip -->
<script src="<?php echo base_url();?>js/admin/bootstrap-tooltip.js"></script>
<!-- popover effect library -->
<script src="<?php echo base_url();?>js/admin/bootstrap-popover.js"></script>
<!-- button enhancer library -->
<script src="<?php echo base_url();?>js/admin/bootstrap-button.js"></script>
<!-- accordion library (optional, not used in demo) -->
<script src="<?php echo base_url();?>js/admin/bootstrap-collapse.js"></script>
<!-- carousel slideshow library (optional, not used in demo) -->
<script src="<?php echo base_url();?>js/admin/bootstrap-carousel.js"></script>
<!-- autocomplete library -->
<script src="<?php echo base_url();?>js/admin/bootstrap-typeahead.js"></script>
<!-- tour library -->
<script src="<?php echo base_url();?>js/admin/bootstrap-tour.js"></script>
<!-- library for cookie management -->
<script src="<?php echo base_url();?>js/admin/jquery.cookie.js"></script>
<!-- calander plugin -->
<script src='<?php echo base_url();?>js/admin/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='<?php echo base_url();?>js/admin/jquery.dataTables.min.js'></script>
<!-- chart libraries start -->
<script src="<?php echo base_url();?>js/admin/excanvas.js"></script>
<script src="<?php echo base_url();?>js/admin/jquery.flot.min.js"></script>
<script src="<?php echo base_url();?>js/admin/jquery.flot.pie.min.js"></script>
<script src="<?php echo base_url();?>js/admin/jquery.flot.stack.js"></script>
<script src="<?php echo base_url();?>js/admin/jquery.flot.resize.min.js"></script>
<!-- chart libraries end -->
<!-- select or dropdown enhancer -->
<script src="<?php echo base_url();?>js/admin/jquery.chosen.min.js"></script>
<!-- checkbox, radio, and file input styler -->
<script src="<?php echo base_url();?>js/admin/jquery.uniform.min.js"></script>
<!-- plugin for gallery image view -->
<script src="<?php echo base_url();?>js/admin/jquery.colorbox.min.js"></script>
<!-- rich text editor library -->
<script src="<?php echo base_url();?>js/admin/jquery.cleditor.min.js"></script>
<!-- notification plugin -->
<script src="<?php echo base_url();?>js/admin/jquery.noty.js"></script>
<!-- file manager library -->
<script src="<?php echo base_url();?>js/admin/jquery.elfinder.min.js"></script>
<!-- star rating plugin -->
<script src="<?php echo base_url();?>js/admin/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="<?php echo base_url();?>js/admin/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="<?php echo base_url();?>js/admin/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="<?php echo base_url();?>js/admin/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="<?php echo base_url();?>js/admin/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="<?php echo base_url();?>js/admin/charisma.js"></script>
</body>
</html>
