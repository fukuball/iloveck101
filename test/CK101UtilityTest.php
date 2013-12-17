<?php
class CK101UtilityTest extends PHPUnit_Framework_TestCase
{

    public function testCopyDirectory()
    {

        $source_folder       = dirname(__FILE__).'/test-data/test-copy-directory';
        $destination_folder  = dirname(__FILE__).'/test-data/copyed-directory';

        CK101Utility::copy_directory($source_folder, $destination_folder);

        $copy_directory_exist = file_exists($destination_folder);
        $copy_file1_exist = file_exists($destination_folder.'/images1.png');
        $copy_file2_exist = file_exists($destination_folder.'/images2.png');

        CK101Utility::delete_directory($destination_folder);

        $this->assertEquals(true, $copy_directory_exist);
        $this->assertEquals(true, $copy_file1_exist);
        $this->assertEquals(true, $copy_file2_exist);

    }

    public function testDeleteDirectory()
    {
        
        $source_folder       = dirname(__FILE__).'/test-data/test-copy-directory';
        $destination_folder  = dirname(__FILE__).'/test-data/copyed-directory';

        CK101Utility::copy_directory($source_folder, $destination_folder);
        CK101Utility::delete_directory($destination_folder);

        $copy_directory_exist = file_exists($destination_folder);
        $copy_file1_exist = file_exists($destination_folder.'/images1.png');
        $copy_file2_exist = file_exists($destination_folder.'/images2.png');

        $this->assertEquals(false, $copy_directory_exist);
        $this->assertEquals(false, $copy_file1_exist);
        $this->assertEquals(false, $copy_file2_exist);
    }
}
?>