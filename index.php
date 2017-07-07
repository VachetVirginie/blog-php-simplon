<?php
$array = scandir('post');
$files = [];
foreach ($array as $file) {
    if ($file === '.') {
        continue;
    }
    if ($file === '..') {
        continue;
    }
    $files[] = $file;
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>My Awesome Blog</title>
</head>
<body class="container">
    <h1 class="text-center" >My Awesome Blog</h1>
    <nav><a href="create.html">New Post</a></nav>
    <?php foreach ($files as $file) { ?>
    <article>
        <h2><?php echo basename($file, '.txt'); ?></h2>
        <p><?php echo file_get_contents('post/' . $file); ?></p>
        <form action="delete-post.php" method="POST">
            <input type="hidden" name="filename" value="<?php echo $file; ?>">
            <input type="submit" value="delete">
        </form>
    </article>
    <?php } ?>
</body>
</html>