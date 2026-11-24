<?php
// is_admin.php - Helper: true if the logged-in user has role "admin" in users.json.
require_once 'user_storage.php';

function is_admin() {
    $users = getUsersSafe();
    return (($users[$_SESSION['Username'] ?? '']['role'] ?? '') === 'admin');
}