<?php
/**
 * Basic bootstrapping goes here
 * Think of it like bootstrap.php in a laravel app
 * You shouldn't be adding anything else to this file
 * actions and filters belong in app/
 * global view helper functions belong in inc/.
 **/

/**
 *  Composer autoload.
 **/
$localAutoload = get_template_directory() . '/vendor/autoload.php';
if (file_exists($localAutoload)) {
    // if it exists, load it. otherwise we assume composer install has been done from the project root
    include_once $localAutoload;
}

/*
 * Load dotenv
 *
 **/
\Forme\loadDotenv();

/*
 * Load Whoops if dev
 *
 **/
\Forme\loadWhoops();

/**
 * Include routes.
 */
include_once __DIR__ . '/routes/routes.php';

/**
 * Load the theme.
 */
$theme = \Forme\getInstance('VendorName\\ReplaceMeTheme\\Main');
$theme->run();

/*
 * Start a session
 */
if (!session_id()) {
    session_start();
}

// Nothing else below here ⛔
