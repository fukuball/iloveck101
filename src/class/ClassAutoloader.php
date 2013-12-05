<?php
/**
 * ClassAutoloader.php
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /class/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  MIT Licence
 * @version  Release: <0.0.1>
 * @link     https://github.com/fukuball/iloveck101
 */

/**
 * ClassAutoloader
 *
 * @category PHP
 * @package  /class/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  MIT Licence
 * @version  Release: <0.0.1>
 * @link     https://github.com/fukuball/iloveck101
 */

class ClassAutoloader
{
   
   public function __construct()
   {
   
      spl_autoload_register(array($this, 'loader'));
   
   }
   
   private function loader($className)
   {
   
      //echo 'Trying to load ', $className, ' via ', __METHOD__, "()\n";
      require_once dirname(__FILE__).'/'.$className . '.php';
   
   }

}// en of class ClassAutoloader

$autoloader = new ClassAutoloader();
?>