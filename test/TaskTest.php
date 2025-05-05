<?php

use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    public function testTrueIsTrue()
    {
        $this->assertTrue(true);
    }

    // Check if the index page loads with the expected content
    public function testIndexPageLoads()
    {
        // Simulate a GET request to the root of the app
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['REQUEST_URI'] = '/';

        // Capture the output of index.php (correct path)
        ob_start();
        require __DIR__ . '/../public/index.php';  // Ensure this path is correct
        $output = ob_get_clean();

        // Check if specific content from the HTML is present
        $this->assertStringContainsString('📝 Task Manager - FlightPHP', $output);
        $this->assertStringContainsString('This is your lightweight task manager powered by FlightPHP.', $output);
        $this->assertStringContainsString('GET /tasks', $output); // Check if API instruction is there
        $this->assertStringContainsString('POST /tasks', $output); // Check if API instruction is there
    }
}
