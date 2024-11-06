<?php

namespace models;

use core\Model;

class User extends Model
{
    const ROLE_CUSTOMER = "cust";
    const ROLE_MANAGER = "manager";
    const ROLE_DRIVER = "driver";
    const ROLE_ADMIN = "admin";
    const ROLE_STOCKMANGER = "stock";

    public ?int $userId;
    public ?string $email;
    public ?string $role;
    protected ?string $password;
    public ?string $name;
    public ?string $phoneNumber;
    public ?string $address;
    public ?string $profilePic;

    function set_password($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    function verify_password($password)
    {
        return password_verify($password, $this->password);
    }
}
