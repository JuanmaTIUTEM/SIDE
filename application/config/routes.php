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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'clogin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['declaracion'] = 'calumnos/declaracion';
$route['otrObl'] = 'calumnos/otrObl';

$route['log_in'] = 'clogin';
$route['log_out'] = 'clogin/logout';
$route['dashboard'] = 'dashboard';
$route['dashboardAlumno'] = 'dashboard/dashAlumnos';




$route['findUser'] = 'AllUsers/findUser';
$route['userTypes'] = 'AllUsers/userTypes';
$route['careers'] = 'AllUsers/careers';
$route['groups'] = 'AllUsers/groups';
$route['createUser'] = 'AllUsers/createUser';
$route['changeUserStatus'] = 'AllUsers/changeStatus';
$route['changeGroupStatus'] = 'CGroups/changeStatus';
$route['allStudents'] = 'AllUsers/allStudents';
$route['fillStudents'] = 'AllUsers/fillStudents';



$route['allGroups'] = 'CGroups';
$route['fillGroups'] = 'CGroups/fillGroups';

$route['addGroup'] = 'CGroups/addGroup';
$route['getcareers'] = 'Allusers/careers';
$route['findGroup'] = 'CGroups/findGroup';

$route['rfcList'] = 'CAsignarRFC';
$route['newAssign'] = 'CAsignarRFC/newAssign';
$route['changeStatusR'] = 'CAsignarRFC/changeStatusR';

$route['activities'] = 'CActivities';
$route['getRFCs'] = 'CAsignarRFC/getRFCs';
$route['newAct'] = 'CActivities/newAct';


#SIMULADOR

$route['simulador'] = 'CSimulador';
$route['loginSim'] = 'CSimulador/log_in';
$route['declara_1'] = 'CSimulador/declara1';
$route['administracion'] = 'CSimulador/administracion';

$route['isr_1'] = 'CSimulador/isr_1';
$route['iva_2'] = 'CSimulador/iva_2';
$route['isr1'] = 'CSimulador/isr1';
$route['findTypeDec'] = 'CSimulador/getTypesStatements';
$route['getDeclaracion'] = 'CSimulador/getDeclaracion';

$route['res_isr_1'] = 'CResultados/isr_1';
$route['res_iva_1'] = 'CResultados/iva_1';
$route['complete'] = 'CResultados/all';
$route['pdf_isr_1'] = 'CResultados/pdf_isr_1';