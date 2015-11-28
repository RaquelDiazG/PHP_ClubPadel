<?php

namespace AppBundle\Entity;

class CourtTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Court
     */
    protected $court;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->court = new Court();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * Implement testConstructor
     * 
     * @covers AppBundle\Entity\Court::__construct
     * @covers AppBundle\Entity\Court::getId
     * @covers AppBundle\Entity\Court::getActive
     */
    public function testConstructor() {
        $this->court = new Court();
        $this->assertEmpty($this->court->getId());
        $this->assertTrue($this->court->getActive());
        $this->court = new Court(false);
        $this->assertEmpty($this->court->getId());
        $this->assertFalse($this->court->getActive());
    }

    /**
     * @covers AppBundle\Entity\Court::getId
     * Implement testGetId().
     */
    public function testGetId() {
        $this->assertEmpty($this->court->getId());
    }

    /**
     * @covers AppBundle\Entity\Court::setActive
     * @covers AppBundle\Entity\Court::getActive
     * Implement testActive().
     */
    public function testActive() {
        $this->court->setActive(TRUE);
        $this->assertTrue($this->court->getActive());
        $this->court->setActive(FALSE);
        $this->assertFalse($this->court->getActive());
    }

}
