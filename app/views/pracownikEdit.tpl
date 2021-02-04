{extends file="main.tpl"}

{block name=edycja}

<div class="bottom-margin">
    <h2>Specyfikacja książki</h2>
    <form action="{$conf->action_root}zapiszPracownik" method="post" class="row uniform 100%">
        <fieldset>
            <div class="6u 12u">
                <label for="nazwisko">Nazwisko</label>
                <input id="nazwisko" type="text" placeholder="NAZWISKO" name="nazwisko" value="{$form->nazwisko}">
            </div>
            <div class="6u 12u">
                <label for="imie">Imię</label>
                <input id="imie" type="text" placeholder="IMIĘ" name="imie" value="{$form->imie}">
            </div>
            <div class="6u 12u">
                <label for="login">LOGIN</label>
                <input id="login" type="text" placeholder="LOGIN" name="login" value="{$form->login}">
            </div>
            <div class="6u 12u">
                <label for="pass">Hasło</label>
                <input id="pass" type="password" placeholder="HASŁO" name="pass" value="{$form->pass}">
            </div>
            <div class="actions">
          	<input type="submit" class="special small" value="Zapisz"/>
		<a href="{$conf->action_root}listaPracownik" class="button small">Powrót</a>
            </div>
	</fieldset>
        <input  type="hidden" name="id_pracownika" value="{$form->id_pracownika}">
    </form>	
</div>

{/block}
