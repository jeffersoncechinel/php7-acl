<?php

namespace JC\Acl\Tests;

use JC\Acl\Acl;
use JC\Acl\Entities\Permission;
use JC\Acl\Entities\Role;
use JC\Acl\Entities\Resource;

class AclTest extends \PHPUnit_Framework_TestCase
{
    public function testAclIsOwner()
    {
        $permission = new Permission();
        $permission->setName('view');

        $role = new Role('supervisor');
        $role->addPermission($permission);
        $roles[] = $role;

        $user = new User();
        $user->setId(1);

        $resource = new Resource(Book::class, 'getUserId');
        $resources[] = $resource;

        $book = new Book();
        $book->setId(1)->setName('Livro 1')->setUserId(1);

        $acl = new Acl($roles, $resources);
        $this->assertEquals(1, $acl->isOwner($book, $user));

        $book->setId(1)->setName('Livro 1')->setUserId(2);
        $this->assertEquals(null, $acl->isOwner($book, $user));
    }

    public function testAclCan()
    {
        $permission = new Permission();
        $permission->setName('view');

        $role = new Role('supervisor');
        $role->addPermission($permission);
        $roles[] = $role;

        $user = new User();
        $user->setId(1);

        $resource = new Resource(Book::class, 'getUserId');
        $resources[] = $resource;

        $acl = new Acl($roles, $resources);
        $acl->setUser($user);
        $this->assertEquals(1, $acl->can('view'));

        $acl = new Acl($roles, $resources);
        $this->assertEquals(1, $acl->can('view', $user));

        $this->assertEquals(1, $acl->can('view'));
        $this->assertEquals(null, $acl->can('read'));
    }
}