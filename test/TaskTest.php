<?php

use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    public function testTrueIsTrue()
    {
        $this->assertTrue(true);
    }

    public function testIndexRoute()
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['REQUEST_URI'] = '/';

        ob_start();
        require __DIR__ . '/../public/index.php';
        $output = ob_get_clean();

        $this->assertStringContainsString('Task', $output);
    }
}
