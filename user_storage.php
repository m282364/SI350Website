<?php
define('USERS_FILE', __DIR__ . '/data/users.json');

function getUsersSafe(): array {
    if (!file_exists(USERS_FILE)) {
        return [];
    }
    $fp = fopen(USERS_FILE, 'r');
    $users = [];
    if ($fp && flock($fp, LOCK_SH)) {
        $content = stream_get_contents($fp);
        $users = json_decode($content, true) ?: [];
        flock($fp, LOCK_UN);
    }
    if ($fp) {
        fclose($fp);
    }
    return $users;
}

function updateUsersSafe(callable $callback): bool {
    if (!is_dir(__DIR__ . '/data')) {
        mkdir(__DIR__ . '/data', 0755, true);
    }
    if (!file_exists(USERS_FILE)) {
        file_put_contents(USERS_FILE, json_encode(new stdClass()));
    }

    $fp = fopen(USERS_FILE, 'c+');
    if (!$fp) {
        return false;
    }

    if (flock($fp, LOCK_EX)) {
        $content = stream_get_contents($fp);
        $users = json_decode($content, true) ?: [];

        $shouldSave = $callback($users);

        if ($shouldSave) {
            ftruncate($fp, 0);
            rewind($fp);
            fwrite($fp, json_encode($users, JSON_PRETTY_PRINT));
            fflush($fp);
        }
        flock($fp, LOCK_UN);
    }

    fclose($fp);
    return true;
}
?>
