<?php 
/**
 * P.One PHP Framework
 * Very simple PHP framework
 *
 * PHP version 7.2.0
 *
 * @category Configuration
 * @package  P.One-PHP-Framework
 * @author   Felipe Rodrigues <fessrodrigues@outlook.com>
 * @license  MIT 
 * @version  GIT: 0.1.0
 * @link     http://example.domain
 */

/**
 * Execution environment
 */
define('ENVIRONMENT', 'dev');
define('ROOT', dirname(__FILE__));

/**
 * General settings
 */
require_once 'Core/config/config.php';

/**
 * Register Auto Load
 */
require_once 'vendor/autoload.php';

/**
 * Router
 */
$request_uri = (isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/');

use App\Router;

$route = new Router($request_uri);
$route->dispatch();