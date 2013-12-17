<?php
/**
 * CK101Utility.php
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
 * CK101Utility
 *
 * @category PHP
 * @package  /class/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  MIT Licence
 * @version  Release: <0.0.1>
 * @link     https://github.com/fukuball/iloveck101
 */
class CK101Utility
{

   /**
    * Static method copy_directory
    *
    * @param string $source
    * @param string $destination
    * @param array  $options
    *
    * @return bool  $status
    */
   public static function copy_directory($source, $destination, $options=array())
   {

      $status = false;

      $defaults = array(
         'mode'=>'default'
      );

      $options = array_merge($defaults, $options);

      if (is_dir($source)) {
       
        @mkdir($destination, 0755, true);

        $directory = dir($source);

         while ( FALSE !== ($readdirectory = $directory->read()) ) {

            if ($readdirectory == '.' || $readdirectory == '..') {
               
               continue;
            
            }

            $pathdir = $source . '/' . $readdirectory;

            if ( is_dir($pathdir) ) {

               self::copy_directory($pathdir, $destination.'/'.$readdirectory, $options);
               
               if ($options['mode']=='debug') {
                  echo $pathdir."\n";
                  echo $destination.'/'.$readdirectory."\n";
               }

               continue;

            }

            $status = copy($pathdir, $destination.'/'.$readdirectory);

            if ($options['mode']=='debug') {
               echo $pathdir."\n";
               echo $destination.'/'.$readdirectory."\n";
            }
         
         }

         $directory->close();
      
      } else {
         
         $status = copy($source, $destination);

         if ($options['mode']=='debug') {
            echo $source."\n";
            echo $destination."\n";
         }
      
      }

      return $status;

   }// end function copy_directory

   /**
    * Static method delete_directory
    *
    * @param string $directory
    * @param array  $options
    *
    * @return void
    */
   public static function delete_directory($directory, $options=array())
   {

      $defaults = array(
         'mode'=>'default'
      );

      $options = array_merge($defaults, $options);
   
      if (is_dir($directory)) {

         if (substr($directory, strlen($directory)-1, 1) != '/') {
            
            $directory .= '/';
         
         }

         $files = glob($directory . '*', GLOB_MARK);

         foreach ($files as $file) {
         
            if (is_dir($file)) {
            
               self::delete_directory($file, $options);
         
            } else {
               
               if (file_exists($file)) {
                  unlink($file);
               }

               if ($options['mode']=='debug') {
                  echo $file."\n";
               }
         
            }
       
         }

         if (file_exists($directory)) {
            rmdir($directory);
         }

         if ($options['mode']=='debug') {
            echo $directory."\n";
         }

      } else {

         if (file_exists($directory)) {
            unlink($directory);
         }
         
         if ($options['mode']=='debug') {
            echo $directory."\n";  
         }
      
      }
   
   }// end function delete_directory

}// end of class CK101Utility
?>