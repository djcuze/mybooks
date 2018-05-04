<header class="header">
    <ul class="navigation">
        <router-link to="/">Home</router-link>
    </ul>
    <?php if (!isset($_SESSION['loggedIn'])) { ?>
        <router-link to="/registration">Register</router-link>
        <router-link to="/login">Login</router-link>
    <?php } else { ?>
        <router-link to="/new">New Book</router-link>
        <a href="app/lib/logout.php">Logout</a>
    <?php } ?>
</header>