<?php
/**
 * php7-acl - PermissionTest.php
 * Initial version by: Jefferson Cechinel (jefferson@homeyou.com)
 * Initial version created on: 8/6/16 02:58
 */

namespace JC\Acl\Tests;

use JC\Acl\Entities\Permission;

class PermissionTest extends \PHPUnit_Framework_TestCase
{
    public function testPermissionName()
    {
        $permission = new Permission();
        $permission->setName('Jeff');

        $this->assertEquals('Jeff', $permission->getName());
    }
}