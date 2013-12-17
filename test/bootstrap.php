<?php

class ClassAutoloader
{
   
   public function __construct()
   {
   
      spl_autoload_register(array($this, 'loader'));
   
   }
   
   private function loader($className)
   {
   
      //echo 'Trying to load ', $className, ' via ', __METHOD__, "()\n";
      require_once dirname(dirname(__FILE__)).'/src/class/'.$className . '.php';
   
   }

}// en of class ClassAutoloader

$autoloader = new ClassAutoloader();
?>