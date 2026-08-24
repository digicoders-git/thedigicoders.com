<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route["QuickLinks"] = "Home/QuickLinks";
$route["register"] = "Home/Registration";
$route['city/(:any)'] = 'Home/city_pages/$1';
$route['sitemap.xml'] = 'Home/sitemap_xml';

// Clean lowercase hyphenated routes
$route['python-training-in-lucknow-in-digicoders'] = 'Home/Python_training_in_lucknow_in_digicoders';
$route['java-training-in-lucknow-in-digicoders'] = 'Home/Java_training_in_lucknow_in_digicoders';
$route['android-training-in-lucknow-in-digicoders'] = 'Home/Android_training_in_lucknow_in_digicoders';
$route['mern-stack-training-in-lucknow-in-digicoders'] = 'Home/Mern_Stack_training_in_lucknow_in_digicoders';
$route['net-training-in-lucknow-in-digicoders'] = 'Home/Net_training_in_lucknow_in_digicoders';
$route['digital-marketing-training-in-lucknow-in-digicoders'] = 'Home/Digital_marketing_training_in_lucknow_in_digicoders';
$route['summertraining'] = 'Home/SummerTraining';
$route['internshiptraining'] = 'Home/InternshipTraining';
$route['placement'] = 'Home/placement';
$route['registration'] = 'Home/Registration';
$route['about'] = 'Home/About';
$route['contact'] = 'Home/Contact';
$route['reviews'] = 'Home/Reviews';
$route['faqs'] = 'Home/Faqs';
$route['verify-certificate'] = 'Home/VerifyCertificate';
$route['final-year-project'] = 'Home/FinalYearProject';
$route['our-expert'] = 'Home/OurExpert';
$route['team-digicoders'] = 'Home/Team_DigiCoders';
$route['appreciation'] = 'Home/Appreciation';
$route['mou'] = 'Home/MOU';
$route['achievements'] = 'Home/Achievement';
$route['vocational-training'] = 'Home/VocationalTraining';
$route['summer-training'] = 'Home/SummerTraining';
$route['winter-training'] = 'Home/WinterTraining';
$route['industrial-training'] = 'Home/IndustrialTraining';
$route['apprenticeship-training'] = 'Home/ApprenticeshipTraining';
$route['internship-training'] = 'Home/InternshipTraining';
$route['project-training'] = 'Home/ProjectTraining';
$route['workshop'] = 'Home/Workshop';
$route['event'] = 'Home/Event';
$route['blogs'] = 'Home/Blog';
$route['blog'] = 'Home/Blog';
$route['blog-details/(:any)'] = 'Home/blogdetails/$1';
$route['verify-student'] = 'Home/VerifyStudent';
$route['quick-links'] = 'Home/QuickLinks';
$route['gallery'] = 'Home/Gallery';
$route['gallery/(:any)'] = 'Home/Gallery/$1';
$route['courses/(:any)'] = 'Home/course/$1';
$route['privacy-policy'] = 'Home/PrivacyPolicy';
$route['terms-condition'] = 'Home/term_condition';
$route['refund-policy'] = 'Home/refund_policy';
$route['return-policy'] = 'Home/ReturnPolicy';
$route['shipping-policy'] = 'Home/ShippingPolicy';

// Branch routes
$route['lucknow-head-office'] = 'Home/LucknowBranch';
$route['kanpur-branch'] = 'Home/KanpurBranch';
$route['gorakhpur-branch'] = 'Home/GorakhpurBranch';
// Clean Blog API Endpoint
$route['api/blogs'] = 'Apis/V1/GetAllBlogs';
// Clean Placement API Endpoint
$route['api/placements'] = 'Apis/V1/GetAllPlacements';

$route['(:any)'] = 'Home/coursepage/$1';

