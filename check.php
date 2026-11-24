<?php
require_once 'user_storage.php';

echo "Looking for: " . htmlspecialchars(USERS_FILE) . "<br>";
echo "File exists: " . (file_exists(USERS_FILE) ? 'yes' : 'NO') . "<br>";

$raw = @file_get_contents(USERS_FILE);
json_decode($raw);
echo "JSON valid: " . (json_last_error() === JSON_ERROR_NONE ? 'yes' : 'NO - ' . json_last_error_msg()) . "<br>";

$users = getUsersSafe();
echo "Usernames found: " . htmlspecialchars(implode(', ', array_keys($users))) . "<br>";

if (isset($users['admin'])) {
    $ok = password_verify('admin', $users['admin']['password'] ?? '');
    echo "Password 'admin' matches: " . ($ok ? 'yes' : 'NO') . "<br>";
    echo "Role: " . htmlspecialchars($users['admin']['role'] ?? '(none)') . "<br>";
} else {
    echo "There is no user named exactly 'admin'.<br>";
}