<script type="x-template" id="registration_template">
    <?php if ($_SESSION['admin'] === true) { ?>
        <form method="post" class="login" action="app/lib/register.php" id="registration_form">
            <h1>Register</h1>
            <span class="form__input">
            <input type="text" placeholder="username" name="username" id="username" required minlength="6"
                   maxlength="10"/>
            <span></span>
        </span>
            <span class="form__input">
            <input type="password" placeholder="password" name="password" id="password" required minlength="6"
                   maxlength="10"/>
            <span></span>
        </span>
            <span class="form__input">
                <p style="font-size: .75rem;">Admin? (move the slider to the right for yes)</p>
            <input type="range" min="0" max="1" name="access_level" id="access_level" required minlength="6"
                   maxlength="10"/>
            <span></span>
        </span>
            <input type="submit" name="submit" id="submit" value="Register"/>
        </form>
    <?php } else { ?>
        <h1>Access Denied</h1>
    <?php } ?>
</script>