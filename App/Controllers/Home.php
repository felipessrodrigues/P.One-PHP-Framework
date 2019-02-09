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
namespace App\Controllers;

defined('ROOT') or
    die('This script is not directly accesible.');

/**
 * Class Home
 *
 * An controller for home page.
 *
 * @category Class
 * @package  App
 * @author   Felipe Rodrigues <fessrodrigues@outlook.com>
 * @license  MIT 
 * @version  Release: v0.1.0-alpha.0
 * @link     http://example.domain
 */
class Home extends Controller
{
    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Index
     *
     * @return void
     */
    public function index()
    {
        // Some comment here
        try{
            // some code here
        } catch (Exception $e) {
            // some code here
        }

        // Renderizing
        $this->view->render('home');
    }
}