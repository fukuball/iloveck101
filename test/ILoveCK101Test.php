<?php
class ILoveCK101Test extends PHPUnit_Framework_TestCase
{

    public function testGetThread()
    {

        // test invalid url
        $process_status = ILoveCK101::getThread("");
        $this->assertEquals(false, $process_status);

        ILoveCK101::getThread("http://ck101.com/thread-2877280-1-1.html");

        $base_folder = $_SERVER['HOME'].'/Pictures/iloveck101';
        $base_folder_exist = file_exists($base_folder);
        $this->assertEquals(true, $base_folder_exist);

        $dirs = array_filter(glob($base_folder.'/*'), 'is_dir');
        $thread_folder_exist = file_exists($dirs[0]);
        $this->assertEquals(true, $thread_folder_exist);

        $files = array_filter(glob($dirs[0].'/*'), 'is_file');
        $thread_file_exist = file_exists($files[0]);
        $this->assertEquals(true, $thread_file_exist);

    }

}
?>