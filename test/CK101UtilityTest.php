<?php
class CK101UtilityTest extends PHPUnit_Framework_TestCase
{

    public function testCopyDirectory()
    {

        $source_folder       = dirname(__FILE__).'/test-data/test-parent-directory';
        $destination_folder  = dirname(__FILE__).'/test-data/copyed-directory';

        $copy_options = array('mode'=>'debug');
        CK101Utility::copy_directory($source_folder, $destination_folder, $copy_options);

        $copy_parent_folder_exist = file_exists($destination_folder);
        $copy_file1_exist         = file_exists($destination_folder.'/images1.png');
        $copy_sub_folder_exist    = file_exists($destination_folder.'/test-sub-directory');
        $copy_file2_exist         = file_exists($destination_folder.'/test-sub-directory/images2.png');

        $delete_options = array('mode'=>'debug');
        CK101Utility::delete_directory($destination_folder, $delete_options);

        $this->assertEquals(true, $copy_parent_folder_exist);
        $this->assertEquals(true, $copy_file1_exist);
        $this->assertEquals(true, $copy_sub_folder_exist);
        $this->assertEquals(true, $copy_file2_exist);

        // source is file
        $source_folder       = dirname(__FILE__).'/test-data/test-parent-directory/images1.png';
        $destination_folder  = dirname(__FILE__).'/test-data/copyed-directory';

        $copy_options = array('mode'=>'debug');
        CK101Utility::copy_directory($source_folder, $destination_folder, $copy_options);

        $copy_file_exist = file_exists($destination_folder);

        $delete_options = array('mode'=>'debug');
        CK101Utility::delete_directory($destination_folder, $delete_options);

        $this->assertEquals(true, $copy_file_exist);

    }

    public function testDeleteDirectory()
    {
        
        $source_folder       = dirname(__FILE__).'/test-data/test-parent-directory';
        $destination_folder  = dirname(__FILE__).'/test-data/copyed-directory';

        $copy_options = array('mode'=>'debug');
        CK101Utility::copy_directory($source_folder, $destination_folder, $copy_options);
        $delete_options = array('mode'=>'debug');
        CK101Utility::delete_directory($destination_folder, $delete_options);

        $copy_parent_folder_exist = file_exists($destination_folder);
        $copy_file1_exist         = file_exists($destination_folder.'/images1.png');
        $copy_sub_folder_exist    = file_exists($destination_folder.'/test-sub-directory');
        $copy_file2_exist         = file_exists($destination_folder.'/test-sub-directory/images2.png');

        $this->assertEquals(false, $copy_parent_folder_exist);
        $this->assertEquals(false, $copy_file1_exist);
        $this->assertEquals(false, $copy_sub_folder_exist);
        $this->assertEquals(false, $copy_file2_exist);

        // source is file
        $source_folder       = dirname(__FILE__).'/test-data/test-parent-directory/images1.png';
        $destination_folder  = dirname(__FILE__).'/test-data/copyed-directory';

        $copy_options = array('mode'=>'debug');
        CK101Utility::copy_directory($source_folder, $destination_folder, $copy_options);
        $delete_options = array('mode'=>'debug');
        CK101Utility::delete_directory($destination_folder, $delete_options);

        $copy_file_exist = file_exists($destination_folder);

        $this->assertEquals(false, $copy_file_exist);

    }
}
?>