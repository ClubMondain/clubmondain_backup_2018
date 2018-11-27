<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


//THIS IS MY CONSTANTS
define('SITE_NAME','Club Mondain');
define('PREFIX','cmd_');

//////////////////////////////////TABLE NAME///////////////////////////////////////////////
define('USER',PREFIX.'user');
define('USER_DETAILS',PREFIX.'user_details');
define('ADDRESS',PREFIX.'address');
define('CITY',PREFIX.'city');
define('CATEGORY',PREFIX.'category');
//define('CATEGORY_TYPE',PREFIX.'category_type');
define('EVENT',PREFIX.'event');
define('EVENT_IMAGE',PREFIX.'event_image');
define('BUSINESS',PREFIX.'business');
define('OPENING_HOUR',PREFIX.'opening_hour');
define('BLOG_NEWS',PREFIX.'blog_news');
define('MEMBERSHIP',PREFIX.'membership');
define('TRAINER_CLASS',PREFIX.'trainer_class');
define('COUNTRY',PREFIX.'country');
define('TIMEZONE',PREFIX.'timezone');
define('MEET_UP',PREFIX.'meet_up');
/*SETTING && CONTENT TABLE FOR VIEW*/
define('CONTENT',PREFIX.'content');
define('FRONTEND_SETTING',PREFIX.'frontend_settings');/*META KEY VALUE TABLE*/
define('SETTING',PREFIX.'settings');
/*Product Table*/
define('PRODUCT',PREFIX.'product');
define('PRODUCT_REVIEW',PREFIX.'product_review');
/*PIVOT TABLE*/
define('PIVOT_CATEGORY',PREFIX.'pivot_categories');
define('PIVOT_FEB_CITY',PREFIX.'pivot_favourite_city');
define('PIVOT_INTEREST_CATEGORY',PREFIX.'pivot_user_interest_category');
define('PIVOT_FEB_EVENT',PREFIX.'pivot_favourite_event');
define('PIVOT_FEB_STORE',PREFIX.'pivot_favourite_store');
define('PIVOT_JOIN_EVENT',PREFIX.'pivot_joining_event');
define('PIVOT_JOIN_CLASS',PREFIX.'pivot_joining_class');
define('MEET_UP_COMMENTS',PREFIX.'meet_up_comments');
define('STORE_FEEDBACK',PREFIX.'store_feedback');
define('FIELD_PERMISION',PREFIX.'field_permision');
/*Pivot Product Table*/
define('PRODUCT_IMAGES',PREFIX.'pivot_product_images');
define('PRODUCT_CAT_SUBCAT',PREFIX.'pivot_product_category_subcategory');
/* View Table*/
define('VIEW_EVENT',PREFIX.'view_event_details');
define('VIEW_BUSINESS',PREFIX.'view_business_details');
define('VIEW_BLOG_NEWS',PREFIX.'view_blog_news_details');
define('VIEW_TRAINER_CLASS',PREFIX.'view_trainer_class_details');


/////////ADD BY SUBHASIS START////////////////
define('INVITE_SPACE',PREFIX.'invitespace');
define('ENERGISER',PREFIX.'energiser');
define('ERERGISER_CSV',PREFIX.'energiser_csv');
define('ERERGISER_CODE_ANALIZER',PREFIX.'energiser_code_analyzer');
define('JOIN_US_ENERGIZER',PREFIX.'joining_us_energizer');
/////////ADD BY SUBHASIS END////////////////