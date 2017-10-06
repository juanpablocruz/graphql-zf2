<?php
namespace Graphql\Entity;

use GraphQL\Utils\Utils;

class User
{
    public $id;

    public $email;

    public $firstName;

    public $lastName;

    public function __construct($data)
    {
        Utils::assign($this, $data);
    }
}
