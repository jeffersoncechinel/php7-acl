<?php
/**
 * php7-acl - PermissionTest.php
 * Initial version by: Jefferson Cechinel (jefferson@homeyou.com)
 * Initial version created on: 8/6/16 02:58
 */

namespace JC\Acl\Tests;

use JC\Acl\Entities\Resource;

class ResourceTest extends \PHPUnit_Framework_TestCase
{
    public function testResourceName()
    {
        $resource = new Resource();
        $resource->setName('Jeff');

        $this->assertEquals('Jeff', $resource->getName());
    }

    public function testResourceOwnerField()
    {
        $resource = new Resource();
        $resource->setName('Jeff');

        $this->assertEquals('Jeff', $resource->getName());
    }
}