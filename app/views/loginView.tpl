{extends file="main.tpl"}

{block name=logowanie}
<h2>Logowanie do systemu</h2>
<form action="{$conf->action_url}login" method="post" class="row uniform">
    <div class="container">
        <fieldset class="row uniform 100%">
            
            <div class="12u">
                Login: <br /><input id="id_login" type="text" name="login" placeholder=" Login" value="{$form->login}" /><br />
            </div>
            <div class="12u">
                Hasło: <br /><input id="id_pass" type="password" name="pass" placeholder=" Hasło"/><br />
            </div>
            <div class="12u">
                <ul class="actions">
                    <li><input type="submit" value="Zaloguj" class="special" style="padding-bottom: 1.5em;"/></li>
                </ul>
            </div>
        </fieldset>
    </div>
</form>
{/block}
