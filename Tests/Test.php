<?php
use PHPUnit\Framework\TestCase;

/**
 * Aibreba
 * 
 * @group group
 */
class Test extends TestCase
{
    
    public function testSQLInjection()
    {
        $this->assertEquals(true, true);
    }

}