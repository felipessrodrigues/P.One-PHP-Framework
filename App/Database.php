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
 * Class Database
 *
 * A database connection.
 *
 * @category Class
 * @package  App
 * @author   Felipe Rodrigues <fessrodrigues@outlook.com>
 * @license  MIT 
 * @version  Release: v0.1.0-alpha.0
 * @link     http://example.domain
 */
class Database
{
    /**
     * _instance
     *
     * @var object
     */
    private static $_instance = null;

    /**
     * Constructor
     * 
     * @return void
     */
    private function __construct()
    {
        
    }

    /**
     * __clone
     *
     * @return void
     */
    public function __clone() 
    {

    }

    /**
     * Connect
     *
     * @return PDO
     */
    public static function connect() : PDO
    {        
        if (!isset(self::$_instance)) {
            try {
                self::$_instance = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASS);
                self::$_instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                self::$_instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Database error: " . $e->getMessage();
            }
        }

        return self::$_instance;
    }
}