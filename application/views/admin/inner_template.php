<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Agriculture Administrator</title>
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
<link href='<?php echo base_url();?>css/admin/my_style_common.css' rel='stylesheet'>
<!--jquery validation-->
<link href="<?php echo base_url();?>css/admin/validation.css" rel="stylesheet" type="text/css" media="screen" >
<!--jquery validation-->
<script src="<?php echo base_url();?>js/admin/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
$(function(){
	$('#toggle-all').click(function(){
		var status = $(this).attr('checked');
		var classname = "checked";
		$('.rowcheckbox').each( function() {
			if(!status){ status = false;classname = "";}
			$(this).attr("checked",status);
			$(this).parent().removeClass("checked").addClass(classname);
		});
	});
});
</script>
<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
<!-- The fav icon -->
<link rel="shortcut icon" href="img/favicon.ico">
</head>
<body>
<?php
$userInfo = $this->cmm->getUserSession();
$userTask = $this->cmm->getUserTask();
?>
<!-- topbar starts -->
<div class="navbar">
  <div class="navbar-inner">
    <div class="container-fluid"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="<?php echo site_url();?>" target="_blank"><span>Agriculture</span></a>
      <div class="btn-group pull-right" > <a class="btn dropdown-toggle" data-toggle="dropdown" href="#"> <i class="icon-user"></i><span class="hidden-phone"> <?php echo $userInfo->first_name.' '.$userInfo->last_name;?></span> <span class="caret"></span> </a>
        <ul class="dropdown-menu">
          <?php /*?><li><a href="<?php echo site_url().$routing_val.'/myaccount/'.$this->session->userdata('logedinUser')->user_id;?>">My Account</a></li>
          <li class="divider"></li><?php */?>
          <li><a href="<?php echo $this->admin_url.'/user/logoutUser';?>">Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- topbar ends -->
<div class="container-fluid">
<div class="row-fluid">
<div class="span2 main-menu-span">
  <div class="well nav-collapse sidebar-nav">
    <ul class="nav nav-tabs nav-stacked main-menu">
      <?php
		  if(in_array('Manage User Role',$userTask))
		  {
		  ?>
      <li><a class="ajax-link" href="<?php echo $this->admin_url.'/user/manageRole/'.$this->cmm->encodeKey();?>"><span class="hidden-tablet">Manage User Role</span></a></li>
      <?php
		  }

		  if(in_array('Manage User',$userTask))
		  {
		  ?>
      <li><a class="ajax-link" href="<?php echo $this->admin_url.'/user/manageUser/'.$this->cmm->encodeKey();?>"><span class="hidden-tablet">Manage User</span></a></li>
      <?php
		  }
		  if(in_array('Manage Buyer',$userTask))
		  {
		  ?>
      <li><a class="ajax-link" href="#"><span class="hidden-tablet">Manage Buyer</span></a></li>
      <?php
		  }
		  if(in_array('Manage Seller',$userTask))
		  {
		  ?>
      <li><a class="ajax-link" href="#"><span class="hidden-tablet">Manage Seller</span></a></li>
      <?php
		  }
		  ?>
      <li><a class="ajax-link" href="<?php echo $this->admin_url.'/user/logoutUser';?>"><span class="hidden-tablet">Logout</span></a></li>
    </ul>
  </div>
</div>
<div id="content" class="span10">
  <div id="error_success"></div>
  <?php
$errors_message = $this->session->flashdata('errors_message');
if((isset($errors_message) && $errors_message!=''))
{?>
  <div class="alert alert-error"><?php echo $errors_message;?> </div>
  <?php
}

$success_message = $this->session->flashdata('success_message');
if((isset($success_message) && $success_message!=''))
{
?>
  <div class="alert alert-success"><?php echo $success_message;?> </div>
  <?php
}
?>
  <div class="row-fluid sortable">
    <?php 
	$this->load->view('admin/'.$content_view); ?>
  </div>
  <!--/fluid-row-->
  <hr>
  <footer>
    <!--<p class="pull-left">&copy; <a href="http://mytestcompany.com" target="_blank">Mytestcompany</a> 2013</p>
  <p class="pull-right">Powered by: <a href="http://mytestcompany.com">Mytestcompany</a></p>-->
  </footer>
</div>
<!--/.fluid-container-->
<!-- external javascript
	================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- jQuery -->
<script type="text/javascript">var base_url = '<?php echo base_url();?>';</script>
<!--<script src="<?php echo base_url();?>js/admin/jquery-1.7.2.min.js"></script>-->
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
<!-- ajax ajaxfileupload submit-->
<script src="<?php echo base_url();?>js/admin/ajaxfileupload.js"></script>
<!-- application script for Charisma demo -->
<script src="<?php echo base_url();?>js/admin/charisma.js"></script>
<!--Jquery Validation-->
<script type="text/javascript" src="<?php echo base_url();?>js/admin/jquery.validate.min.js"></script>
<!--Jquery Validation-->
<script type="text/javascript">
$(document).ready(function(){
	
	var ajaxBusy = false;
	$(document).ajaxStart( function() { 
        ajaxBusy = true;
		$('#loader').html('<img src="<?php echo base_url();?>img/ajax-loaders/ajax-loader-3.gif">');
    }).ajaxStop( function() {
        ajaxBusy = false;
		$('#loader').html('');
    });

	$('.copytextfield_language').live('change',function(){
			  fieldid = $(this).attr('id');
			  $.ajax({
				type: "POST",
				data:'word='+$(this).val(),
				url: "<?php echo site_url().$routing_val;?>/translateword/",
				success: function (data) {
				  var new_val = data.split('##');
				  $('#'+fieldid+'_fr').val(new_val[1]);
				}
			  });
		});
		$('.copyselectfield_language').live('change',function(){
			  fieldid = $(this).attr('id');
			  $('#'+fieldid+'_fr').val($(this).val().trim());
	});
		
	$("#add_edit_form").validate({
			rules: {},
			errorClass: 'help-inline',
			errorElement: 'span',
			highlight: function(element, errorClass, validClass) {
				$(element).parents('.control-group').removeClass('success').addClass('error');
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).parents('.control-group').removeClass('error').addClass('success');
			},
			messages: {},
			submitHandler: function(form) {
				 if(ajaxBusy)
				   {
					 return false;  
				   }
				   else
				   {
					 form.submit();
				   }
				}
	});
});
</script>
</body>
</html>
