<?php
/**
 * php7-acl - PermissionTest.php
 * Initial version by: Jefferson Cechinel (jefferson@homeyou.com)
 * Initial version created on: 8/6/16 02:58
 */

namespace JC\Acl\Tests;

use JC\Acl\Entities\Permission;
use JC\Acl\Entities\Role;

class RoleTest extends \PHPUnit_Framework_TestCase
{
    public function testRoleName()
    {
        $role = new Role();
        $role->setName('Jeff');

        $this->assertEquals('Jeff', $role->getName());
    }

    public function testRolePermissions()
    {
        $role = new Role('supervisor');
        $role->setName('Jeff');

        $permission = new Permission();
        $permission->setName('view');

        $permission2 = new Permission();
        $permission2->setName('read');

        $role->addPermission($permission);
        $role->addPermission($permission2);

        //$result = new \ArrayObject([$permission, $permission2]);
        $result = [$permission, $permission2];

        $this->assertEquals($result, $role->getPermissions());
    }
}