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
 * Class View
 *
 * An View Base for view files.
 *
 * @category Class
 * @package  App
 * @author   Felipe Rodrigues <fessrodrigues@outlook.com>
 * @license  MIT 
 * @version  Release: v0.1.0-alpha.0
 * @link     http://example.domain
 */
class View
{
    /**
     * Render
     *
     * @param string $view 
     * @param bool   $renderWithoutTemplate Optional
     *
     * @return void
     */
    public function render(string $view, $renderWithoutTemplate = false) : void
    {
        include TEMPLATES . '_top' . '.php';

        if ($renderWithoutTemplate == true) {
            include VIEWS . $view . '.php';
        } else {
            // include TEMPLATES . '_header' . '.php';
            include VIEWS . $view . '.php';
            // include TEMPLATES . '_footer' . '.php';
        }

        include TEMPLATES . '_bottom' . '.php';
    }
}
