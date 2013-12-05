<?php
/**
 * ck101_install.php
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

require_once dirname(__FILE__)."/src/class/Utility.php";

$ck101_cmd_path = '/usr/local/bin/iloveck101';
$source_cmd_path = '/Library/Fuku-PHP/iloveck101/iloveck101.php';

$source_folder = dirname(__FILE__).'/src';
$destination_folder  = '/Library/Fuku-PHP/iloveck101';

echo "Install iloveck101 from $source_folder to $destination_folder ...\n";

if (file_exists($ck101_cmd_path)) {
   unlink($ck101_cmd_path);
}

$copy_options = array('mode'=>'debug');

if (Utility::copy_directory($source_folder, $destination_folder, $copy_options)) {

   symlink($source_cmd_path, $ck101_cmd_path);
   chmod($source_cmd_path, 0755);
   chmod($ck101_cmd_path, 0755);

   echo "Install success ...\n";

} else {

   echo "Install fail ...\n";	

}
?>