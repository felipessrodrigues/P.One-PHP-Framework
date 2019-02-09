<?php
/**
 * P.One PHP Framework
 * Very simple PHP framework
 *
 * PHP version 7.2.0
 *
 * @category Application
 * @package  App
 * @author   Felipe Rodrigues <fessrodrigues@outlook.com>
 * @license  MIT 
 * @version  GIT: 0.1.0
 * @link     http://example.domain
 */
namespace App;

defined('ROOT') or
    die('This script is not directly accesible.');

/**
 * Class Router
 *
 * Responsable for routing request_uri
 *
 * @category Class
 * @package  App
 * @author   Felipe Rodrigues <fessrodrigues@outlook.com>
 * @license  MIT 
 * @version  Release: v0.1.0-alpha.0
 * @link     http://example.domain
 */
class Router
{
    /**
     * Controller
     *
     * @var string controller
     */
    private $_controller;

    /**
     * Action
     *
     * @var string action
     */
    private $_action;

    /**
     * Parameters
     *
     * @var array params
     */
    private $_params = array();

    /**
     * Constructor
     *
     * @param string $request_uri 
     *
     * @return void
     */
    public function __construct(string $request_uri)
    {
        Router::_setDefault();

        $url = filter_var($request_uri, FILTER_SANITIZE_URL);
        $url = strtolower($url);

        $path = explode('/', $url);
        
        if (count($path) >= 3) {
            // Admin area
            if (strcasecmp($path[1], 'admin') == 0) {
                $this->_controller = (isset($path[2]) ? $path[2] : 'dashboard');
                $this->_action = (isset($path[3]) ? $path[3] : null);

                if (isset($path[4])) {
                    if (substr_count($path[4], '?') == 0) {
                        $this->_params[0] = (isset($path[4]) ? $path[4] : null);
                        $this->_params[1] = (isset($path[5]) ? $path[5] : null);
                        $this->_params[2] = (isset($path[6]) ? $path[6] : null);
                    } else {
                        $params = explode('?', $path[4]);
                    }
                }
            } else {
                $this->_controller = (isset($path[1]) ? $path[1] : null);
                $this->_action = (isset($path[2]) ? $path[2] : null);

                if (isset($path[3])) {
                    if (substr_count($path[3], '?') == 0) {
                        $this->_params[0] = (isset($path[3]) ? $path[3] : null);
                        $this->_params[1] = (isset($path[4]) ? $path[4] : null);
                        $this->_params[2] = (isset($path[5]) ? $path[5] : null);
                    } else {
                        $params = explode('?', $path[3]);
                    }
                }
            }
        } else if (count($path) == 2) {
            if (substr_count($path[1], '?') == 0) {
                $this->_controller = (isset($path[1]) ? $path[1] : null);
                $this->_action = (isset($path[2]) ? $path[2] : null);

                $this->_params[0] = (isset($path[3]) ? $path[3] : null);
                $this->_params[1] = (isset($path[4]) ? $path[4] : null);
                $this->_params[2] = (isset($path[5]) ? $path[5] : null);
            } else {
                $path = explode('?', $path[1]);
                $this->_controller = (isset($path[0]) ? $path[0] : null);
            }
        }

        if ($this->_controller) {
            $this->_controller = $this->_convertToStudlyCaps($this->_controller);
        }

        if ($this->_action) {
            $this->_action = $this->_convertToCamelCase($this->_action);
        }
    }
      
    /**
     * Dispatch
     *
     * @return void
     */
    public function dispatch() : void
    {
        if ($this->_controller) {
            if (!file_exists(CONTROLLERS . $this->_controller . '.php')) {
                throw new Exception("Controller '" . $this->_controller . "' not found!", 1);
            }

            $controller = new $this->_controller();

            if ($this->_action) {
                if (!method_exists($controller, $this->_action)) {
                    throw new Exception("Method '" . $this->_action . "' not found!", 1);
                }
                    
                if (isset($this->_params[2])) {
                    $controller->{$this->_action}($this->_params[0], $this->_params[1], $this->_params[2]);
                } elseif (isset($this->_params[1])) {
                    $controller->{$this->_action}($this->_params[0], $this->_params[1]);
                } elseif (isset($this->_params[0])) {
                    $controller->{$this->_action}($this->_params[0]);
                } else {
                    $controller->{$this->_action}();
                }
            } else {
                $controller->index();
            }
        } else {
            $controller = new Home();
            $controller->index();
        }
    }

    /**
     * _convertToStudlyCaps
     *
     * Removes hyphens and convert first letter
     * to upper case
     *
     * e.g. use-terms => UseTerms
     *
     * @param string $string 
     *
     * @return string
     */
    private function _convertToStudlyCaps(String $string) : String
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }

    /**
     * _convertToCamelCase
     *
     * Convert first letter to lower case.
     * Useful for methos trataments.
     *
     * e.g. add-new => addNew
     *
     * @param string $string 
     *
     * @return string
     */
    private function _convertToCamelCase(String $string) : String
    {
        return lcfirst($this->_convertToStudlyCaps($string));
    }

    /**
     * SetDefault
     *
     * @return void
     */
    private function _setDefault() : void
    {
        $this->_controller = 'home';
    }
}
