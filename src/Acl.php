<?php
/**
 * php7-acl - Acl.php
 * Initial version by: Jefferson Cechinel
 * Initial version created on: 8/5/16 21:53
 */

declare(strict_types = 1);

namespace JC\Acl;

use JC\Acl\Interfaces\UserAcl;
use JC\Acl\Entities\Role;
use JC\Acl\Entities\Resource;

/**
 * Class Acl
 * @package JC\Acl
 */
class Acl
{
    /**
     * @var array|Role
     */
    protected $roles;
    /**
     * @var
     */
    protected $user;
    /**
     * @var array
     */
    protected $resources;
    /**
     * @var
     */
    protected $admin;

    /**
     * Acl constructor.
     * @param array $roles
     * @param array $resources
     */
    public function __construct(array $roles, array $resources)
    {
        foreach ($roles as $role) {
            if (!$role instanceof Role) {
                throw new \InvalidArgumentException('Invalid Role');
            }
        }
        $this->roles = $roles;

        foreach ($resources as $resource) {
            if (!$resource instanceof Resource) {
                throw new \InvalidArgumentException('Invalid Resource');
            }
        }
        $this->resources = $resources;
    }

    /**
     * @param UserAcl $user
     * @return Acl
     */
    public function setUser(UserAcl $user) : Acl
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @param $flag
     * @return $this
     */
    public function setAdmin($flag)
    {
        $this->admin = $flag;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * @param int $role
     * @return bool
     */
    public function hasRole(int $role) : bool
    {
        foreach ($this->roles as $r) {
            if ($r->getRoleId() === $role) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param int $role
     * @param string $permission
     * @return bool
     */
    public function hasPermission(int $role, string $permission) : bool
    {
        foreach ($this->roles as $r) {
            if ($r->getRoleId() === $role) {
                foreach ($r->getPermissions() as $p) {
                    if ($p->getName() === $permission) {
                        return true;
                    }
                }
            }
        }

        return false;
    }

    /**
     * @param string $permission
     * @param UserAcl|null $user
     * @return bool
     */
    public function can(string $permission, UserAcl $user = null) : bool
    {
        if ($this->getAdmin() == 1) {
            return true;
        }

        if ($user) {
            $this->setUser($user);
            $role = $this->user->getRole();
            return $this->hasPermission($role['id_role'], $permission);
        }

        if ($this->user) {
            $role = $this->user->getRole();
            return $this->hasPermission($role['id_role'], $permission);
        }

        return false;
    }

    /**
     * @param string $permission
     * @param UserAcl|null $user
     * @return bool
     */
    public function cannot(string $permission, UserAcl $user = null) : bool
    {
        return !$this->can($permission, $user);
    }

    /**
     * @param $resource
     * @param UserAcl|null $user
     * @return bool
     */
    public function isOwner($resource, UserAcl $user = null) : bool
    {
        if ($user) {
            $this->setUser($user);
        }

        foreach ($this->resources as $r) {
            if (is_a($resource, $r->getName())) {
                if ($user) {
                    return $resource->{$r->getOwnerField()} () === $user->getId();
                }
                return $resource->{$r->getOwnerField()} () === $this->user->getId();
            }
        }

        return false;
    }
}