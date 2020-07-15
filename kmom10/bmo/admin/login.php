
    <h1>Logga in</h1>

    <form method="post" action="?page=login-process">
        <fieldset class="login_box">
            <label>Skriv dina inloggnings detaljer nedan, ledtråd: "doe" & "doe"</label>
            <p>
                <label for="username">Användarnamn:</label>
                <input type="text" name="username" id="username">
                <label for="password">Lösenord:</label>
                <input type="password" name="password" id="password">
            </p>
            <p>
                <input type="submit" value="Logga in">
                <input type="reset" value="Nollställ">
            </p>
        </fieldset>
    </form>

    <div class="<?=messageCheck("login_error", "error")?>">
        <p>Fel lösenord eller användarnamn!</p>
    </div>
    <?=$_SESSION["login_error"] = null?>
