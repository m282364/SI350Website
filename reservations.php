<?php
$name  = htmlspecialchars($_GET['name'] ?? '');
$date  = htmlspecialchars($_GET['date'] ?? '');
$time  = htmlspecialchars($_GET['time'] ?? '');
$party = htmlspecialchars($_GET['party'] ?? '');

if ($name && $date && $time && $party) {
    $line = "$name | $date | $time | $party guests\n";
    file_put_contents(__DIR__ . '/data/reservations.txt', $line, FILE_APPEND);
    echo "Thank you, $name! Your table for $party on $date at $time is reserved.";
} else {
    echo "Please fill out all fields.";
}
?>