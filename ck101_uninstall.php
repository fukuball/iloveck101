<?php
/**
 * ck101_uninstall.php
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

require_once dirname(__FILE__)."/src/class/CK101Utility.php";

$ck101_cmd_path = '/usr/local/bin/iloveck101';
$lib_folder  = '/Library/Fuku-PHP/iloveck101';

echo "Uninstall iloveck101 from $lib_folder ...\n";

if (file_exists($ck101_cmd_path)) {
   unlink($ck101_cmd_path);
}

$delete_options = array('mode'=>'debug');

CK101Utility::delete_directory($lib_folder, $delete_options);

echo "Uninstall success ...\n";
?>