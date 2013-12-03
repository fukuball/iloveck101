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

$dest_cmd_path = '/usr/local/bin/iloveck101';

echo "Uninstall iloveck101 from $dest_cmd_path ...\n";

if (file_exists($dest_cmd_path)) {
	unlink($dest_cmd_path);
	echo "Uninstall success ...\n";
}
?>