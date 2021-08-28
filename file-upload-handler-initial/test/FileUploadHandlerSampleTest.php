<?php

use PHPUnit\Framework\TestCase;

final class FileUploadHandlerSampleTest extends TestCase
{
    private static $answer_file_path = __DIR__ . '/../FileUploadHandler.php';

    private function setUpFiles($files)
    {
        foreach ($files as $fieldName => [$name, $content]) {
            file_put_contents(__DIR__.'/'.$name, $content);
            $_FILES[$fieldName] = [
                'name' => $name,
                'type' => 'text/plain',
                'tmp_name' => __DIR__.'/'.$name,
                'error' => UPLOAD_ERR_OK,
                'size' => filesize(__DIR__.'/'.$name)
            ];
        }
    }

    private static function rrmdir($dir): void
    {
        if (!is_dir($dir)) {
            return;
        }
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object == '.' || $object == '..') {
                continue;
            }
            if (is_dir($dir.'/'.$object) && !is_link($dir.'/'.$object)) {
                rrmdir($dir.'/'.$object);
            } else {
                unlink($dir.'/'.$object);
            }
        }
        rmdir($dir);
    }

    public static function setUpBeforeClass(): void
    {
        require self::$answer_file_path;
    }

    protected function setUp(): void
    {
        $_FILES = [];
    }

    public function testGetName()
    {
        $files = [
            'test' => ['test.txt', 'Hi!']
        ];
        $this->setUpFiles($files);
        foreach ($_FILES as $fieldName => $file) {
            $fileUploadHandler = new FileUploadHandler($fieldName);
            $this->assertSame($file['name'], $fileUploadHandler->getName());
        }
    }

    public function testGetNameFileNotExists()
    {
        $fileUploadHandler = new FileUploadHandler('not_exists');
        $this->assertNull($fileUploadHandler->getName());
    }

    public static function tearDownAfterClass(): void
    {
        if (file_exists(__DIR__.'/test.txt')) {
            unlink(__DIR__.'/test.txt');
        }
        self::rrmdir(__DIR__.'/../files');
    }
}
