<?php
// admin.php - Admin only: list users, change their points, disable / re-enable accounts.
session_start();
require_once 'user_storage.php';

$users = getUsersSafe();
$me = $_SESSION['Username'] ?? '';

// Only admins are allowed in. The role comes from users.json, not from the browser.
if (($users[$me]['role'] ?? '') !== 'admin') {
    exit('Admins only.');
}

$message = '';

// A button was clicked.
if (isset($_POST['username'], $_POST['action'])) {
    $who = $_POST['username'];
    $action = $_POST['action'];

    if ($action === 'points') {
        // Points must be a whole number from 0 to 100000.
        $points = filter_var($_POST['points'] ?? '', FILTER_VALIDATE_INT,
                             ['options' => ['min_range' => 0, 'max_range' => 100000]]);
        if ($points === false) {
            $message = 'Points must be a whole number from 0 to 100000.';
        } else {
            updateUsersSafe(function (&$users) use ($who, $points) {
                if (!isset($users[$who])) {
                    return false;
                }
                $users[$who]['points'] = $points;
                return true;
            });
            $message = 'Updated points for ' . $who . '.';
        }
    } elseif (($action === 'disable' || $action === 'enable') && $who !== $me) {
        updateUsersSafe(function (&$users) use ($who, $action) {
            if (!isset($users[$who])) {
                return false;
            }
            $users[$who]['disabled'] = ($action === 'disable');
            return true;
        });
        $message = 'Updated account for ' . $who . '.';
    }

    $users = getUsersSafe();   // reload so the table shows the new values
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h1>Admin: Accounts and Points</h1>
  <p><a href="index.php">Home</a></p>

  <?php if ($message !== ''): ?>
    <p><strong><?php echo htmlspecialchars($message); ?></strong></p>
  <?php endif; ?>

  <table>
    <tr><th>Username</th><th>Points</th><th>Status</th><th>Account</th></tr>
    <?php foreach ($users as $name => $u): ?>
      <tr>
        <td><?php echo htmlspecialchars($name); ?></td>

        <td>
          <form method="post">
            <input type="hidden" name="username" value="<?php echo htmlspecialchars($name); ?>">
            <label>Points
              <input type="number" name="points" min="0" max="100000"
                     value="<?php echo (int)($u['points'] ?? 0); ?>" required>
            </label>
            <button name="action" value="points">Save</button>
          </form>
        </td>

        <td><?php echo empty($u['disabled']) ? 'Active' : 'Disabled'; ?></td>

        <td>
          <form method="post">
            <input type="hidden" name="username" value="<?php echo htmlspecialchars($name); ?>">
            <?php if (empty($u['disabled'])): ?>
              <button name="action" value="disable">Disable</button>
            <?php else: ?>
              <button name="action" value="enable">Re-enable</button>
            <?php endif; ?>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>