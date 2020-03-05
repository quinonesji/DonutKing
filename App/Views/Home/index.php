<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
<h1>Welcome</h1>
<p>Hello, <?php echo htmlspecialchars($name); ?>!</p>

<?php
//  if($_SERVER['REQUEST_METHOD'] === 'POST') {
//      echo "Hello, " . htmlspecialchars($_POST['name']);
//  }
?>
    <ul>
        <?php foreach($colours as $colour): ?>
        <li><?php echo htmlspecialchars($colour); ?></li>
        <?php endforeach; ?>
    </ul>
    <!-- <form method="post">
        <div>
            <label for="name">Your name</label>
            <input id="name" name="name" autofocus />
        </div>

        <div>
            <button type="submit">Submit</button>
        </div>
    </form> -->
</body>
</html>