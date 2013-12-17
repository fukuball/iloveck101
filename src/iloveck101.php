#!/usr/bin/php
<?php
/**
 * iloveck101.php
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  MIT Licence
 * @version  Release: <0.0.1>
 * @link     https://github.com/fukuball/iloveck101
 */

// autoload
require_once dirname(__FILE__)."/class/ClassAutoloader.php";

if (empty($_SERVER["argv"][1])) {
   
   echo "Please provide URL ck101\n";
   exit;
}

ILoveCK101::getThread($_SERVER["argv"][1]);
?>