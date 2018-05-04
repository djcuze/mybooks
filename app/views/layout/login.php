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
    <form method="post" class="login">
        <h1>Login</h1>
        <?php if (isset($_SESSION['notice'])) { ?>
            <div class="notice">
                <p class="<?= $_SESSION['css'] ?>">
                    <?= $_SESSION['notice'] ?>
                </p>
            </div>
        <?php } ?>
        <input type="text" placeholder="username" name="username" id="username" class="form__input"/>
        <input type="password" placeholder="password" name="password" id="password" class="form__input"/>
        <input type="submit" name="submit" id="submit"/>

        <p>Or
            <router-link to="/registration">register </router-link>
            an account</p>
    </form>
</main>
</body>
</html>
