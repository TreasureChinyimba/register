<?php
$usersData = file("registered_users.txt", FILE_IGNORE_NEW_LINES);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registered Users</title>
</head>
<body>

<h2>Registered Users</h2>

<table border="1">
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Message</th>
    <th>Avatar</th>
    <th>Video</th>
  </tr>
  
  <?php foreach ($usersData as $userData): ?>
    <?php list($fullName, $email, $message, $avatarName, $videoName) = explode("|", $userData); ?>
    <tr>
      <td><?php echo $fullName; ?></td>
      <td><?php echo $email; ?></td>
      <td><?php echo $message; ?></td>
      <td><img src="uploads/<?php echo $avatarName; ?>" width="100"></td>
      <td><video src="uploads/<?php echo $videoName; ?>" controls width="200"></td>
    </tr>
  <?php endforeach; ?>
</table>

</body>
</html>
