<?php
class ILoveCK101Test extends PHPUnit_Framework_TestCase
{

    public function testRunOnCommandLine()
    {
        $this->assertEquals('true', 'true');
    }

    public function testGetThread()
    {
        $this->assertEquals('true', 'true');
    }

    public function testRunCover()
    {
        ILoveCK101::runCover();
        $this->assertEquals('true', 'true');
    }

}
?>