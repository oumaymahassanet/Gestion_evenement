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
$route['default_controller'] = 'welcome/index';
//$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
//$route['translate_uri_dashes'] = FALSE;
$route['login'] = 'user';
$route['login/(:any)'] = 'user/$1';
$route['MyPanel'] = 'user/my_panel';
$route['MyPanel/creation-evenements'] = 'events/add_events';
$route['inscrire'] = 'Welcome/inscrire';
$route['Mes_favorites'] = 'Welcome/all_mes_favorites';
$route['Event/Titre/(:any)'] = 'Welcome/read_more/$1';
$route['Events/(:any)'] = 'Welcome/events/$1';
$route['Chercher_Events'] = 'Welcome/chercher';
$route['Oranizer_profile/(:any)'] = 'Welcome/profile';
$route['Profile'] = 'Welcome/profile_all_user';
$route['Contact'] = 'Welcome/contact';
$route['Top10'] = 'Welcome/top10';



$route['MyPanel/events/Reservation/(:any)'] = 'user/all_users_reservation/$1';

##################events##################################
$route['MyPanel/events/chercher_events'] = 'events/chercher_events';
$route['MyPanel/events/modif_events'] = 'events/modif_events';
$route['MyPanel/events/modif_events/(:any)'] = 'events/modif_events/$1';
$route['MyPanel/events/add_events'] = 'events/add_events';
$route['MyPanel/events/image/(:any)'] = 'Upload_Files/index/$1';
$route['MyPanel/events/(:any)'] = 'events/all_events/$1';
$route['MyPanel/events_banned/(:any)'] = 'events/all_events_banned/$1';
$route['MyPanel/events_non_valide/(:any)'] = 'events/all_events_non_valide/$1';
$route['MyPanel/events_banned'] = 'events/all_events_banned';
$route['MyPanel/events_non_valide'] = 'events/all_events_non_valide';
$route['MyPanel/events'] = 'events/all_events';
##########################################################

##################comments##################################
$route['MyPanel/comments/(:any)'] = 'comments/all_comments/$1';
$route['MyPanel/comments'] = 'comments/all_comments';
##########################################################


##################country##################################
$route['MyPanel/country/modif_country'] = 'country/modif_country';
$route['MyPanel/country/modif_country/(:any)'] = 'country/modif_country/$1';
$route['MyPanel/country/add_country'] = 'country/add_country';
$route['MyPanel/country/(:any)'] = 'country/all_country/$1';
$route['MyPanel/country'] = 'country/all_country';
##########################################################


##################city####################################
$route['MyPanel/city/modif_city'] = 'city/modif_city';
$route['MyPanel/city/modif_city/(:any)'] = 'city/modif_city/$1';
$route['MyPanel/city/add_city'] = 'city/add_city';
$route['MyPanel/city/(:any)'] = 'city/all_city/$1';
$route['MyPanel/city'] = 'city/all_city';
$route['MyPanel/cities/(:num)'] = 'city/getCitiesByCountry/$1';
$route['MyPanel/cities2/(:num)'] = 'city/getCitiesByCountry/$1';
##########################################################

##################type_events##################################
$route['MyPanel/type_events/image_events/(:any)'] = 'type_events/image_events/$1';
$route['MyPanel/type_events/supp_type_events'] = 'type_events/supp_type_events';
$route['MyPanel/type_events/modif_type_events'] = 'type_events/modif_type_events';
$route['MyPanel/type_events/modif_type_events/(:any)'] = 'type_events/modif_type_events/$1';
$route['MyPanel/type_events/add_type_events'] = 'type_events/add_type_events';
$route['MyPanel/type_events/image/(:any)'] = 'Upload_Files/index_type_events/$1';
$route['MyPanel/type_events/(:any)'] = 'type_events/all_type_events/$1';
$route['MyPanel/type_events'] = 'type_events/all_type_events';
##########################################################

##################users##################################
$route['MyPanel/users/chercher_users'] = 'user/chercher_users';
$route['MyPanel/users/modif_users'] = 'user/modif_users';
$route['MyPanel/users/modif_users/(:any)'] = 'user/modif_users/$1';
$route['MyPanel/users/add_users'] = 'user/add_users';
$route['MyPanel/users/image/(:any)'] = 'Upload_Files/index_user/$1';
$route['MyPanel/users/add_users_profile/(:any)'] = 'user/add_users_profile/$1';
$route['MyPanel/users/add_organizer/(:any)'] = 'user/add_organizer/$1';
$route['MyPanel/users/logout'] = 'user/logout';
$route['MyPanel/users/(:any)'] = 'user/all_users/$1';
$route['MyPanel/users_banned/(:any)'] = 'user/all_users_banned/$1';
$route['MyPanel/users_non_valide/(:any)'] = 'user/all_users_non_valide/$1';
$route['MyPanel/users_banned'] = 'user/all_users_banned';
$route['MyPanel/users_non_valide'] = 'user/all_users_non_valide';
$route['MyPanel/users'] = 'user/all_users';
##########################################################



$route['MyPanel/(:any)'] = 'my_panel_view/$1';
