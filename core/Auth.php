<?php

namespace core;

use models\User;

class Auth
{
    static function login(User $user)
    {
        assert($user->userId && $user->role);
        $_SESSION['userId'] = $user->userId;
        $_SESSION['role'] = $user->role;
    }
    static function logout()
    {
        unset($_SESSION['userId']);
        unset($_SESSION['role']);
    }
    static function check_role($roles)
{
    // Check if the user is logged in
    if (!isset($_SESSION['userId'])) {
        http_response_code(401);
        die("<h1 style='color:red'>Access denied. Please log in to view this page.</h1>");
    }

    // Ensure $roles is an array, even if a single role is passed
    if (!is_array($roles)) {
        $roles = [$roles];
    }

    // Check if the user's role is in the allowed roles array
    if (!isset($_SESSION['role']) || !in_array($_SESSION['role'], $roles)) {
        http_response_code(403); // 403 Forbidden since the user is logged in but lacks permission
        die("<h1 style='color:red'>Access denied. You do not have permission to view this page.</h1>");
    }
}
    static function get_user($projection = '*'): User
    {
        assert(isset($_SESSION['userId']));
        $user = User::find_by_id($_SESSION['userId'], $projection);
        assert($user);
        return $user;
    }
}
