<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "user";
$route['scaffolding_trigger'] = "";
$lang = "(?:[a-zA-Z]{2}/)?";




$route['webadmin/(:any)'] = "admin/$1";

//$route[$lang.'administrator'] = "admin/login";

/*
$route[$lang.'frontend/(:any)'] = "front/$1";

$route[$lang.'hot-deals'] = "front/hot_deals/";
$route[$lang.'hot-deals/(:any)'] = "front/hot_deals/$1";
$route[$lang.'news'] = "front/news/";
$route[$lang.'news/(:any)'] = "front/news/$1";


$route[$lang.'view-all-post'] = "front/view_all_post/";
$route[$lang.'view-all-post/(:any)'] = "front/view_all_post/$1";
$route[$lang.'post-your-ad'] = "front/post_your_ad/";
$route[$lang.'post-your-ad/(:any)'] = "front/post_your_ad/$1";
$route[$lang.'preview-your-ad'] = "front/preview_your_ad/";
$route[$lang.'preview-your-ad/(:any)'] = "front/preview_your_ad/$1";
$route[$lang.'update-your-ad/(:any)'] = "front/update_your_ad/$1";
$route[$lang.'signin'] = "front/signin/";
$route[$lang.'forgotpassword'] = "front/forgotpassword/";
$route[$lang.'signup'] = "front/signup/";
$route[$lang.'logout'] = "front/logout/";
$route[$lang.'(:any)/thank-you'] = "front/thank_you/$1";

$route[$lang.'user/(:any)'] = "front/user/$1";


//$route[$lang.'properties/(:any)/(:any)'] = "front/properties/$1/$2";
//$route[$lang.'properties/(:any)'] = "front/properties/$1";
//$route[$lang.'page/(:any)'] = "front/page/$1";


$route[$lang.'(:any)'] = "front/common_function/$1";
$route[$lang.'(:any)/(:any)'] = "front/common_function/$1/$2";
$route[$lang.'(:any)/(:any)/(:any)'] = "front/common_function/$1/$2/$3";

*/


$route['404_override'] = '';
$route['(\w{2})/(.*)'] = '$2';
$route['(\w{2})'] = $route['default_controller']; 



/* End of file routes.php */
/* Location: ./application/config/routes.php */