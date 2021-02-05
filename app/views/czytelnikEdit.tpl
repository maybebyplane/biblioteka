{extends file="main.tpl"}

{block name=edycja}

<div class="bottom-margin">
    <h2>Edytuj/Dodaj Czytelnika</h2>
    <form action="{$conf->action_root}zapiszCzytelnik" method="post" class="row uniform 100%">
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
                <label for="pesel">PESEL</label>
                <input id="pesel" type="text" maxlenth="11" placeholder="PESEL" name="pesel" value="{$form->pesel}">
            </div>
            <div class="actions">
          	<input type="submit" class="special small" value="Zapisz"/>
		<a href="{$conf->action_root}listaCzytelnik" class="button small">Powrót</a>
            </div>
	</fieldset>
        <input  type="hidden" name="id_czytelnika" value="{$form->id_czytelnika}">
    </form>	
</div>

{/block}
