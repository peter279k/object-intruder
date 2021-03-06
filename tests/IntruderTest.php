<?php

namespace duncan3dc\ObjectIntruderTests;

use duncan3dc\ObjectIntruder\Intruder;
use PHPUnit\Framework\TestCase;

class IntruderTest extends TestCase
{
    private $class;
    private $intruder;

    public function setUp()
    {
        $this->class = new AnonymousClass;
        $this->intruder = new Intruder($this->class);
    }


    public function testConstructorOnInvalidObject()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Only objects can be intruded");
        new Intruder('invalid_object');
    }


    public function testGetPublicProperty()
    {
        $this->assertSame("R2-D2", $this->intruder->publicProperty);
    }


    public function testGetProtectedProperty()
    {
        $this->assertSame("C-3PO", $this->intruder->protectedProperty);
    }


    public function testGetPrivateProperty()
    {
        $this->assertSame("BB-8", $this->intruder->privateProperty);
    }


    public function testSetPublicProperty()
    {
        $this->intruder->publicProperty = "a new hope";
        $this->assertSame("a new hope", $this->class->publicProperty);
    }


    public function testSetProtectedProperty()
    {
        $this->intruder->protectedProperty = "the empire strikes back";
        $this->assertSame("the empire strikes back", $this->intruder->protectedProperty);
    }


    public function testSetPrivateProperty()
    {
        $this->intruder->privateProperty = "return of the jedi";
        $this->assertSame("return of the jedi", $this->intruder->privateProperty);
    }


    public function testCallPublicMethod()
    {
        $this->assertSame("episode", $this->intruder->publicMethod());
    }


    public function testCallProtectedMethod()
    {
        $this->assertSame("episode: rogue", $this->intruder->protectedMethod("rogue"));
    }


    public function testCallPrivateMethod()
    {
        $this->assertSame("episode: rogue - one", $this->intruder->privateMethod("rogue", "one"));
    }


    public function testCallMethodWithReferences()
    {
        $stuff = "start";
        $result = $this->intruder->_call("referenceMethod", $stuff);
        $this->assertSame("done", $result);
        $this->assertSame("modified", $stuff);
    }


    public function testToString()
    {
        $this->assertSame("star wars", (string) $this->intruder);
    }
}
