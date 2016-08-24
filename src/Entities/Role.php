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
    protected $name;
    /**
     * @var array
     */
    protected $permissions;

    /**
     * Role constructor.
     * @param string|null $name
     */
    public function __construct(string $name = null)
    {
        $this->name = $name;
        $this->permissions = [];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Role
     */
    public function setName(string $name): Role
    {
        $this->name = $name;
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