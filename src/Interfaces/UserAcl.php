<?php
/**
 * php7-acl - UserAcl.php
 * Initial version by: Jefferson Cechinel
 * Initial version created on: 8/6/16 23:02
 */

namespace JC\Acl\Interfaces;

/**
 * Interface UserAcl
 * @package JC\Acl\Interfaces
 */
interface UserAcl
{
    /**
     * @return string
     */
    public function getRole() : array;

    /**
     * @return int
     */
    public function getId() : int;
}