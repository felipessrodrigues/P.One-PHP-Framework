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
 * Autoload
 *
 * @param class $class Class
 *
 * @return void
 */
function autoload($class)
{
    if (file_exists(CORE . $class . '.php')) {
        include_once CORE . $class . '.php';
    } else if (file_exists(APP . $class . '.php')) {
        include_once APP . $class . '.php';
    } else if (file_exists(CONTROLLERS . $class . '.php')) {
        include_once CONTROLLERS . $class . '.php';
    } else if (file_exists(MODELS . $class . '.php')) {
        include_once MODELS . $class . '.php';
    } else if (file_exists(VIEWS . $class . '.php')) {
        include_once VIEWS . $class . '.php';
    } else {
        throw new Exception('Class "' . $class . '" not found!');
    }
}

/**
 * Spl_autoload_register
 *
 * Automatic class registration.
 */
spl_autoload_register("autoload");
