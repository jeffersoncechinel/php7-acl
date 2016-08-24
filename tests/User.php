<?php

namespace JC\Acl\Tests;

use JC\Acl\Interfaces\UserAcl;

class User implements UserAcl
{
    protected $id;

    public function getRole() : string
    {
        return 'supervisor';
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }
}