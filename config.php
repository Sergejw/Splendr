<?php


//set timezone
date_default_timezone_set('Europe/Berlin');


//site address
define('ENVIRONMENT', 'development');

define('DIR','http://sergej.devsylum.de/splendr/');

define('DOCROOT', dirname(__FILE__));



// Credentials for the local server

define('DB_TYPE','mysql');

define('DB_HOST','localhost');

define('DB_NAME','');

define('DB_USER','');

define('DB_PASS','');



// Credentials for the HTW server

// define('DB_HOST','db.f4.htw-berlin.de');

// define('DB_NAME','_beierm__products');

// define('DB_USER','beierm');

// define('DB_PASS','bummelletzter');


//set prefix for sessions
define('SESSION_PREFIX','splendr_');


//optionall create a constant for the name of the site
define('SITETITLE','Splendr');