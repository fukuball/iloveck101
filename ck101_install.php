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

$dest_cmd_path = '/usr/local/bin/iloveck101';
$source_path = dirname(__FILE__).'/iloveck101.php';

echo "Install iloveck101 from $source_path to $dest_cmd_path ...\n";

if (copy($source_path, $dest_cmd_path)) {
    chmod($dest_cmd_path, 0755);
    echo "Install success ...\n";
} else {
    echo "Install fail ...\n";	
}
?>