<script type="x-template" id="registration_template">
    <form method="post" class="login" action="app/lib/register.php" id="registration_form">
        <h1>Register</h1>
        <span class="form__input">
            <input type="text" placeholder="username" name="username" id="username" required minlength="6" maxlength="10"/>
            <span></span>
        </span>
        <span class="form__input">
            <input type="password" placeholder="password" name="password" id="password" required  minlength="6" maxlength="10"/>
            <span></span>
        </span>
        <input type="submit" name="submit" id="submit" value="Register"/>
    </form>
</script>
