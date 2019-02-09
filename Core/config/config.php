<?php
/**
 * P.One PHP Framework
 * Very simple PHP framework
 *
 * PHP version 7.2.0
 *
 * @category Configuration
 * @package  Core/config
 * @author   Felipe Rodrigues <fessrodrigues@outlook.com>
 * @license  MIT 
 * @version  GIT: 0.1.0
 * @link     http://example.domain
 */

/**
 * URL
 * 
 * Define base url. 
 */
define('PROTOCOL', (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? 'https://' : 'http://');
define('BASE_URL', PROTOCOL . $_SERVER['HTTP_HOST'] . '/');

/**
 * Environment
 * 
 * All treatments for environment execution.
 */
if (strcasecmp(ENVIRONMENT, 'dev') == 0) {
    error_reporting(-1);

    ini_set('track_errors', 1);
    ini_set('display_errors', 1);
} elseif (strcmp(ENVIRONMENT, 'producao') == 0) {
    error_reporting(0);

    ini_set('display_errors', 0);
} else {
    header('HTTP/1.1 503 Service Unavailable.', true, 503);
    exit(1);
}

/**
 * Timezone
 * 
 * Set default timezone.
 */
date_default_timezone_set('America/Bahia');

/**
 * General
 */
define('DS', DIRECTORY_SEPARATOR);

/**
 * Directorys
 * Define path of directorys.
 */
define('APP', ROOT . DS . 'App' . DS);
define('CORE', ROOT . DS . 'Core' . DS);

define('CONTROLLERS', APP . 'Controllers' . DS);
define('MODELS', APP . 'Models' . DS);
define('VIEWS', APP . 'Views' . DS);

define('CONFIG', CORE . 'config' . DS);
define('LIBS', CORE . 'libs' . DS);

define('TEMPLATES', VIEWS . '_templates' . DS);