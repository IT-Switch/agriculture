$(document).ready(function(){
	
	var ajaxBusy = false;
	$(document).ajaxStart( function() { 
        ajaxBusy = true;
    }).ajaxStop( function() {
        ajaxBusy = false;
    });

	//Default Action
	//$(".tab_content").hide(); //Hide all content
	if(typeof tab_set == "undefined")
	{
		$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	}
	//$(".tab_content:first").show(); //Show first tab content
	
	//On Click Event
	$("ul.tabs li").click(function() {
		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content
		var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active content
		return false;
	});

	
	
	if(!window.sidebar)
	{
		$("a.bookmark").click(function(e){
		e.preventDefault(); // this will prevent the anchor tag from going the user off to the link
		var bookmarkUrl = this.href;
		var bookmarkTitle = this.title;
		if (navigator.userAgent.toLowerCase().indexOf('chrome') > -1) { 
				alert("This function is not available in Google Chrome. Click the star symbol at the end of the address-bar or hit Ctrl-D (Command+D for Macs) to create a bookmark.");      
		}else if (window.sidebar) { // For Mozilla Firefox Bookmark
			//window.sidebar.addPanel(bookmarkTitle, bookmarkUrl,"");
		} else if( window.external || document.all) { // For IE Favorite
			window.external.AddFavorite( bookmarkUrl, bookmarkTitle);          
		} else if(window.opera) { // For Opera Browsers
			$("a.bookmark").attr("href",bookmarkUrl);
			$("a.bookmark").attr("title",bookmarkTitle);
			$("a.bookmark").attr("rel","sidebar");
		} else { // for other browsers which does not support
			 alert('Your browser does not support this bookmark action');
			 return false;
		}
  	});
	}
	
	$('.change_langauge').bind('click touch',function(){
		if($(this).attr('data-lang')!=site_langauge)
		{
			request_url = window.location.href;
			request_url = request_url.replace(site_langauge, $(this).attr('data-lang'));
			window.location.replace(request_url);
		}
	});

	$('.bxslider').bxSlider({
		  minSlides: 2,
		  maxSlides:3,
		  slideWidth: 177,
		  slideMargin: 20,
		  controls: true,
		  pager:false,
		  auto: true,
		  /*nextText: 'Onward ',
		  prevText: '<img src="http://192.168.88.113/test/images/no_img_small.png"/>',
		  nextSelector: '#slider-next',
		  prevSelector: '#slider-prev',*/
	});
	
	$('.bxslider1').bxSlider({
	  minSlides: 2,
	  maxSlides:4,
	  slideWidth: 154,
	  slideMargin:11,
	  controls: true,
	  pager:false,
	  auto: true,
	});
	
	$('.bxslider2').bxSlider({
	  minSlides: 2,
	  maxSlides:4,
	  slideWidth: 75,
	  slideMargin:10,
	  controls: true,
	  pager:false,
	});
	
	$('.bxslider3').bxSlider({
		minSlides: 2,
		maxSlides:6,
		slideWidth: 150,
		slideMargin: 15,
		controls: true,
		pager:false
  });
	
	$('.bxslider4').bxSlider({
		minSlides:3,
		maxSlides:3,
		slideWidth:80,
		slideMargin:5,
		controls: true,
		pager:false
  });
						   
	$("#loginfrm").validate({
			rules: {},
			messages: {},
			errorPlacement: function(error, element) {
            	//element.val(error.text());
        	}
	});
	
	$(".savead").live('click',function(){
		var adval = $(this).attr('data-adval').split('##');							   
		$this =$(this);//alert();
		$.ajax({
			type: "POST",
			url: site_url+default_rounting_val+"/save_unsave_ad",
			data: 'mode='+adval[0]+'&adid='+adval[1],
			success: function (data) {
				if(data.trim()=='NOT-LOGIN')
				{
					$destination = window.location.href.replace(site_url,'');//alert($destination);
					window.location.replace(site_url+signin_rounting_val+'?destination='+$destination);
				}
				else
				{
					$this.closest('span').html(data);
				}
			}
		});
	});
	
	$(".state").live('change',function(){
		$this = $(this);
		$.ajax({
			type: "POST",
			url: site_url+default_rounting_val+"/fetchCity",
			data: 'stateid='+$(this).val()+'&cityid='+$this.attr('data-townid'),
			success: function (data) {
				$("#town"+$this.attr('data-form')).html(data);
			}
		});
	});
	
	$(".category").live('change',function(){
		$this = $(this);								  
		var catid = $(this).val().split('##');//alert(catid);
		$.ajax({
			type: "POST",
			url: site_url+default_rounting_val+"/fetchProperty_type",
			data: 'catid='+$this.val(),
			success: function (data) {
				$("#property_type"+$this.attr('data-form')).html(data);
			}
		});
		
		if(catid[0]=='11')
		{
			$('#bedrooms1').attr('disabled',false);
		}
		else if(catid[0]=='8')
		{
			$('#bedrooms2').attr('disabled',false);
		}
		else
		{	
			$('#bedrooms'+$this.attr('data-form')).prop('selectedIndex',0).attr('disabled',true);
		}
	});

	$('.copytextfield_language').live('change',function(){
		if($('#autotranslate').is(":checked"))
		{
		  fieldid = $(this).attr('id');
		  $.ajax({
			type: "POST",
			data:'word='+$(this).val(),
			url: site_url+cpanel_rounting_val+"/translateword/",
			success: function (data) {
			  var new_val = data.split('##');
			  $('#'+fieldid+'_fr').val(new_val[1]);
			}
		  });
		}
	});

	if(disable_fancy=='')
	{
		$(".login_popup").fancybox({
		'width'				: 500,
		'height'			: 375,
		'autoDimensions'   	: false,
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'type'				: 'iframe'
		});	
		
		
		$(".signup_popup").fancybox({
		'width'				: 500,
		'height'			: 550,
		'autoDimensions'   	: false,
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'type'				: 'iframe'
		});	
	
	}
	
	$('.datepicker').datepicker({
			beforeShow : function(){
				$( this ).datepicker('option','minDate', 0 );
				
			}
		});


	$("#featured").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 10000, true);

	$('#announce-ticker').vTicker({ 
		speed: 500,
		pause: 3000,
		animation: '',
		mousePause: false,
		showItems: 5
	});
	
	/*var ci = 0;
	$('.show_hide').click(function(event){
        event.stopPropagation();
		if(ci==0){$('.login_main1').fadeIn(400);ci= 1;}else{$('.login_main1').fadeOut(400);ci= 0;}
		//if(ci==0){$('.login_main').slideDown(400);ci= 1;}else{$('.login_main').slideUp(400);ci= 0;}
    });
	
	$(document).click( function(){
		$('.login_main1').slideUp(400);ci= 0;
    });*/

	right_banner_rotate();
});

$(function() {
	$('#main-menu').smartmenus({
		subMenusSubOffsetX: 1,
		subMenusSubOffsetY: -8
	});
});


$(window).load(function(){
	//setTimeout("$('.other_tab').css('visibility','visible').css('height','auto').hide()",1000);
});

var right_banner_count=1;
var right_banner_count1=1;
var right_banner_count2=1;
function right_banner_rotate()
{
	$('.right_banner').hide();
	$('#right_banner'+right_banner_count).fadeIn(1000);
	right_banner_count = (right_banner_count==5) ? 1 : right_banner_count+1 ; 

	$('.right_banner1').hide();
	$('#right_banner1'+right_banner_count1).fadeIn(1000);
	right_banner_count1 = (right_banner_count1==5) ? 1 : right_banner_count1+1 ; 

	$('.right_banner2').hide();
	$('#right_banner2'+right_banner_count2).fadeIn(1000);
	right_banner_count2 = (right_banner_count2==5) ? 1 : right_banner_count2+1 ; 

	setTimeout('right_banner_rotate()',5000);
}

function show_error_success(text,type)
{
	$('#error_success').html('<div class="alert alert-'+type+'">'+text+'</div>').show();
	$('html,body').animate({
   		scrollTop: $('#error_success').offset().top - 10,
	},1000);

}

function fbShare(url, title, descr, image, winWidth, winHeight) {

	var winTop = (screen.height / 2) - (winHeight / 2);

	var winLeft = (screen.width / 2) - (winWidth / 2);

	window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);

}
