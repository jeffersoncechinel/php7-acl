<?php
/**
 * php7-acl - Role.php
 * Initial version by: Jefferson Cechinel
 * Initial version created on: 8/6/16 20:59
 */

declare(strict_types = 1);

namespace JC\Acl\Entities;

/**
 * Class Role
 * @package JC\Acl\Entities
 */
class Role
{
    /**
     * @var string
     */
    protected $roleId;
    /**
     * @var array
     */
    protected $permissions;

    /**
     * Role constructor.
     * @param int|null $roleId
     */
    public function __construct(int $roleId = null)
    {
        $this->roleId = $roleId;
        $this->permissions = [];
    }

    /**
     * @return int
     */
    public function getRoleId(): int
    {
        return $this->roleId;
    }

    /**
     * @param int $roleId
     * @return Role
     */
    public function setRoleId(int $roleId): Role
    {
        $this->roleId = $roleId;
        return $this;
    }

    /**
     * @return array
     */
    public function getPermissions(): array
    {
        return $this->permissions;
    }

    /**
     * @param Permission $permission
     * @return Role
     */
    public function addPermission(Permission $permission): Role
    {
        $this->permissions[] = $permission;
        return $this;
    }
}