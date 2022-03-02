<?php

// dont add a trailing / at the end
define('HTTP_SERVER', 'http://localhost');
// add slash / at the end
define('SITE_DIR', '/german-webroot/');

// database prefix if you use
define('DB_PREFIX', 'gc_');

define('DB_DRIVER', 'sqlite');
//define('DB_DRIVER', 'mysql');
define('DB_HOST', 'localhost');
define('DB_HOST_USERNAME', 'root');
define('DB_HOST_PASSWORD', '');
//define('DB_DATABASE', 'german_castles');
define('DB_DATABASE', $_SERVER['DOCUMENT_ROOT']."/../database/german_castles.db");

define('SITE_NAME', 'German Castles');

// define database tables
define('TABLE_USERS', DB_PREFIX.'users');
define('TABLE_COUNTIES', DB_PREFIX.'counties');
define('TABLE_CASTLES', DB_PREFIX.'webroot');
define('TABLE_CASTLE_FOTOS', DB_PREFIX.'castle_fotos');
define('TABLE_CASTLE_MAGAZIN', DB_PREFIX.'castle_magazin');
define('TABLE_RATING_FOTOS', DB_PREFIX.'rating_fotos');
define('TABLE_RATING_CASTLES', DB_PREFIX.'rating_castles');
define('TABLE_PAGES', DB_PREFIX.'pages');
define('TABLE_TAGLINE', DB_PREFIX.'tagline');

// define folder paths
define('LIBS', $_SERVER['DOCUMENT_ROOT'].'\castles\libs');
?>