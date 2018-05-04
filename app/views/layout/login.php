<script type="x-template" id="login_template">
    <?php if (!isset($_SESSION['loggedIn'])) { ?>
        <form method="post" class="login">
            <h1>Login</h1>
            <input type="text" placeholder="username" name="username" id="username" class="form__input"/>
            <input type="password" placeholder="password" name="password" id="password" class="form__input"/>
            <input type="submit" name="submit" id="submit"/>

            <p>Or
                <router-link to="/registration">register</router-link>
                an account
            </p>
        </form>
    <?php } else { ?>
        <div>
            <router-link to="/" class="button">Return to site</router-link>
        </div>
    <?php } ?>
</script>
