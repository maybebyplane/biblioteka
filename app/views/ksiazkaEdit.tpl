{extends file="main.tpl"}

{block name=edycja}

<div class="bottom-margin">
    <h2>Specyfikacja książki</h2>
    <form action="{$conf->action_root}zapiszKsiazka" method="post" class="row uniform 100%">
        <fieldset>
            <div class="6u 12u">
                <label for="kategoria">Kategoria</label>
                <input id="kategoria" type="text" placeholder=" KATEGORIA" name="kategoria" value=" {$form->kategoria}">
            </div>
            <div class="6u 12u">
                <label for="tytul">Tytuł</label>
                <input id="tytul" type="text" placeholder=" TYTUŁ" name="tytul" value=" {$form->tytul}">
            </div>
            <div class="6u 12u">
                <label for="nazwisko_autora">Nazwisko Autora</label>
                <input id="nazwisko_autora" type="text" placeholder=" NAZWISKO AUTORA" name="nazwisko_autora" value=" {$form->nazwisko_autora}">
            </div>
            <div class="6u 12u">
                <label for="imie_autora">Imię Autora</label>
                <input id="imie_autora" type="text" placeholder=" IMIĘ AUTORA" name="imie_autora" value=" {$form->imie_autora}">
            </div>
            <div class="6u 12u">
                <label for="czy_dostepna">Czy dostępna [T/N]</label>
                <input id="czy_dostepna" type="text" name="czy_dostepna" value=" {$form->czy_dostepna}">
            </div>
            <div class="actions">
          	<input type="submit" class="special small" value="Zapisz"/>
		<a href="{$conf->action_root}listaKsiazka" class="button small">Powrót</a>
            </div>
	</fieldset>
        <input  type="hidden" name="id_ksiazki" value="{$form->id_ksiazki}">
    </form>	
</div>

{/block}
