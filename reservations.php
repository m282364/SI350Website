<?php
session_start();
require_once 'user_storage.php';

define('RESERVATIONS_FILE', __DIR__ . '/data/reservations.json');

$name  = trim($_GET['name'] ?? '');
$date  = trim($_GET['date'] ?? '');
$time  = trim($_GET['time'] ?? '');
$party = intval($_GET['party'] ?? 0);

if ($name === '' || $date === '' || $time === '' || $party <= 0) {
    echo "Please fill out all fields.";
    exit;
}

$username = (isset($_SESSION['LoggedIn']) && $_SESSION['LoggedIn'] === true && !empty($_SESSION['Username']))
    ? $_SESSION['Username']
    : 'guest';


if (!file_exists(RESERVATIONS_FILE)) {
    file_put_contents(RESERVATIONS_FILE, json_encode([]));
}

$fp = fopen(RESERVATIONS_FILE, 'c+');
$saved = false;

if ($fp && flock($fp, LOCK_EX)) {
    $content = stream_get_contents($fp);
    $reservations = json_decode($content, true) ?: [];

    $reservations[] = [
        'id'         => uniqid('res_'),
        'username'   => $username,
        'guest_name' => $name,
        'date'       => $date,
        'time'       => $time,
        'party_size' => $party,
        'created_at' => date('Y-m-d H:i:s')
    ];

    ftruncate($fp, 0);
    rewind($fp);
    fwrite($fp, json_encode($reservations, JSON_PRETTY_PRINT));
    fflush($fp);
    flock($fp, LOCK_UN);
    $saved = true;
}

if ($fp) {
    fclose($fp);
}

if (!$saved) {
    echo "Error saving reservation. Please try again.";
    exit;
}
$pointsMessage = "";
if ($username !== 'guest') {
    $pointsEarned = 25;
    updateUsersSafe(function (&$users) use ($username, $pointsEarned) {
        if (!isset($users[$username])) {
            return false;
        }
        $users[$username]['points'] += $pointsEarned;
        return true;
    });
    $pointsMessage = " You earned <strong>$pointsEarned loyalty points</strong>!";
}


$safeName = htmlspecialchars($name);
$safeDate = htmlspecialchars($date);
$safeTime = htmlspecialchars($time);
echo "Thank you, $safeName! Your table for $party on $safeDate at $safeTime is reserved.$pointsMessage";
?>
