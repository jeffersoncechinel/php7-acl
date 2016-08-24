<?php
/**
 * php7-acl - Permission.php
 * Initial version by: Jefferson Cechinel
 * Initial version created on: 8/6/16 20:52
 */

declare(strict_types = 1);

namespace JC\Acl\Entities;

/**
 * Class Permission
 * @package JC\Acl\Entities
 */
class Permission
{
    /**
     * @var string
     */
    protected $name;

    /**
     * Permission constructor.
     * @param string|null $name
     */
    public function __construct(string $name = null)
    {
        $this->name = $name;
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
     * @return Permission
     */
    public function setName(string $name): Permission
    {
        $this->name = $name;
        return $this;
    }
}