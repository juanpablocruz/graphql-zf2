<?php
namespace Graphql\Entity;

use GraphQL\Utils\Utils;

class List
{
    public $id;
    public $name;
    public $lastName;

    public function __construct($data)
    {
        Utils::assign($this, $data);
    }
}
