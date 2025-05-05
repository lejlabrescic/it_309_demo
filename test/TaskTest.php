<?php

use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    public function testTrueIsTrue()
    {
        $this->assertTrue(true);
    }

    public function testIndexPageLoads()
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['REQUEST_URI'] = '/';

        ob_start();
        require __DIR__ . '/../public/views/index.php';
        $output = ob_get_clean();

        // Check if specific content from the HTML is present
        $this->assertStringContainsString('📝 Task Manager - FlightPHP', $output);
        $this->assertStringContainsString('This is your lightweight task manager powered by FlightPHP.', $output);
        $this->assertStringContainsString('GET /tasks', $output); // Check if API instruction is there
        $this->assertStringContainsString('POST /tasks', $output); // Check if API instruction is there
    }
}
