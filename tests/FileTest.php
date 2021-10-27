<?php

use PHPUnit\Framework\TestCase;
use \Neotis\Filesystem\File;

class FileTest extends TestCase
{
    private File $file;

    public function __construct(string $name)
    {
        $this->file = new File();
        parent::__construct($name);
    }

    public function testResponseOfFileExist()
    {
        $sampleExistFile = __DIR__ . DIRECTORY_SEPARATOR . 'FileTest.php';
        $sampleNotExistFile = __DIR__ . DIRECTORY_SEPARATOR . 'FileTest1.php';
        $test = $this->file->exist($sampleExistFile);
        $this->assertTrue($test);
        $test = $this->file->exist($sampleNotExistFile);
        $this->assertFalse($test);
    }

    public function testResponseOfFileMissing()
    {
        $sampleExistFile = __DIR__ . DIRECTORY_SEPARATOR . 'FileTest.php';
        $sampleNotExistFile = __DIR__ . DIRECTORY_SEPARATOR . 'FileTest1.php';
        $test = $this->file->missing($sampleExistFile);
        $this->assertFalse($test);
        $test = $this->file->missing($sampleNotExistFile);
        $this->assertTrue($test);
    }
}