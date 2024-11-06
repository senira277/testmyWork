<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - Saman Caters</title>
    <link rel="stylesheet" href="/static/css/styles.css">
    <link rel="stylesheet" href="/static/css/navbar.css">
    <script src="/static/js/script.js"></script>
</head>

<body>
    <?php include 'header.php' ?>

    <div style="text-align:center;">
        <?php if (isset($args['error'])) : ?>
        <div style="color:red;margin-top:2rem;"><?= $args['error'] ?></div>
        <?php endif; ?>
        <?php if (isset($args['msg'])) : ?>
        <div style="color:green;margin-top:2rem;"><?= $args['msg'] ?></div>
        <?php endif; ?>
    </div>

    <?= $body ?>
    <?php include 'footer.php' ?>
</body>

</html>