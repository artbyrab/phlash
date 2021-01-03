<?php

use PHPUnit\Framework\TestCase;
use artbyrab\phlash\Phlash;

/**
 * Phlash Test
 *
 * To run this test class only:
 *  - Navigate to: artbyrab/phlash
 *  - Type: vendor/bin/phpunit --filter PhlashTest tests/PhlashTest.php
 *
 * @author artbyrab
 */
class PhlashTest extends TestCase
{
    /**
     * Set up
     *
     * Performed before every test.
     */
    protected function setUp()
    {
    }

    /**
     * Tear down
     *
     * Performed after every test.
     */
    protected function tearDown()
    {
        Phlash::clear();
    }

    /**
     * Test the add function
     */
    public function testAdd()
    {
        Phlash::add("info", "Please log in to continue");

        $flashMessages = Phlash::get();

        $this->assertNotEmpty($flashMessages);
        $this->assertEquals(count($flashMessages), 1);
        $this->assertEquals($flashMessages[0]->id, 0);
        $this->assertEquals($flashMessages[0]->type, "info");
        $this->assertEquals($flashMessages[0]->message, "Please log in to continue");

        Phlash::clear();
    }

    /**
     * Test the add function with multiple messages
     */
    public function testAddWithMultipleMessages()
    {
        Phlash::add("info", "Please log in to continue");
        Phlash::add("error", "There was a problem processing your request");

        $flashMessages = Phlash::get();

        $this->assertNotEmpty($flashMessages);
        $this->assertEquals(count($flashMessages), 2);
        $this->assertEquals($flashMessages[0]->id, 0);
        $this->assertEquals($flashMessages[0]->type, "info");
        $this->assertEquals($flashMessages[0]->message, "Please log in to continue");
        $this->assertEquals($flashMessages[1]->id, 1);
        $this->assertEquals($flashMessages[1]->type, "error");
        $this->assertEquals($flashMessages[1]->message, "There was a problem processing your request");

        Phlash::clear();
    }

    /**
     * Test the get function
     */
    public function testGet()
    {
        $this->testAdd();
    }

    /**
     * Test the clear function
     */
    public function testClear()
    {
        Phlash::add("info", "Please log in to continue");

        Phlash::clear();

        $flashMessages = Phlash::get();

        $this->assertFalse($flashMessages);
    }
}
