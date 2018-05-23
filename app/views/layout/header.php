<header class="header">
    <ul class="navigation">
        <router-link to="/">Home</router-link>
    </ul>
    <?php if (isset($_SESSION['loggedIn'])) { ?>
        <!--  If the user is logged in show the Logout Button    -->
        <a href="app/lib/logout.php">Logout</a>
        <?php if ($_SESSION['admin'] === true) { ?>
            <!--  If the user is an admin show New Book and Register links      -->
            <router-link to="/new">New Book</router-link>
            <router-link to="/registration">Register</router-link>
        <?php } ?>
    <?php } else { ?>
        <router-link to="/login">Login</router-link>
    <?php } ?>
</header>