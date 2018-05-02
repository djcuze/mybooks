<?php require_once 'config.php'; ?>
<!doctype html>
<html lang='en'>
<head profile='https://www.w3.org/2005/10/profile'>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Books</title>
    <script src='app/assets/vendor/vue.js' defer></script>
    <script src='app/assets/vendor/vue-router.js' defer></script>
    <script src='app/assets/vendor/jquery-3.3.1.min.js'></script>
    <script src='app/assets/vendor/axios.js' defer></script>
    <script src='app/assets/app.js' defer></script>
    <link rel="stylesheet" href="app/assets/reset.css">
    <link rel="stylesheet" href="public/style.css">
</head>
<body>
<main id="app">
    <?php include_once 'app/views/layout/header.php' ?>
    <router-view class="content"></router-view>
</main>
</body
</html>
