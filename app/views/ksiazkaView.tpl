{extends file="main.tpl"}

{block name=top}
    
<h2>Wyszukiwanie książek</h2>
<form action="{$conf->action_url}listaKsiazka" method="post">
    <div class="row uniform 50%">
        {*<div class="4u 12u">
            <input type="chckbox" id="t_tytul" name="zaznaczenie" checked>
            <label for="t_tytul">Tytuł</label>
	</div>
	<div class="4u 12u">
            <input type="checkbox" id="n_nazwisko_autora" name="zaznaczenie">
            <label for="n_nazwisko_autora">Nazwisko Autora</label>
	</div>*}
	<div class="6u 12u">
            <input type="text" name="tytul" value="{$searchForm->tytul}" placeholder=" Podaj tytuł książki" /><br />
        </div>
        <div class="12u">
            <ul class="actions">
		<li><input type="submit" value="Szukaj" class="special small" /></li>
                &nbsp;
                {if count($conf->roles)>0}
                <li><a href="{$conf->action_url}dodajKsiazka" class="button small">Dodaj książkę do zasobów</a></li>
                {/if}
            </ul>
        </div>
    </div>
</form>	
</div>

{/block}


{block name=content}
    
<div id="k" name='k' class="table-wrapper">
    <table class="alt">
        <thead>
            <tr>
                {if count($conf->roles)>0}
                    <th>ID</th>
                {/if}
                <th>Tytuł</th>
                <th>Nazwisko Autora</th>
                <th>Imię Autora</th>
                <th>Kategoria</th>
                <th>Dostepna</th>
                {if count($conf->roles)>0}
                    <th>Opcje</th>
                {/if}
            </tr>   
        </thead>

        <tbody>
            {foreach $ksiazka as $k}
                {strip}
                    <tr>
                        {if count($conf->roles)>0}
                            <td>{$k["ID_ksiazki"]}</td>
                        {/if}
                        <td>{$k["tytul"]}</td>
                        <td>{$k["nazwisko_autora"]}</td>
                        <td>{$k["imie_autora"]}</td>
                        <td>{$k["kategoria"]}</td>
                        <td>{$k["czy_dostepna"]}</td>
                        {if count($conf->roles)>0}
                            <td>
                                <ul class="actions small">
                                    <li><a href="{$conf->action_url}edytujKsiazka?id_ksiazki={$k["ID_ksiazki"]}" class="button special small">Edytuj</a></li>
                                    &nbsp;
                                    <li><a href="{$conf->action_url}usunKsiazka?id_ksiazki={$k["ID_ksiazki"]}" class="button small">Usuń</a></li>	
                                    &nbsp;
                                    {if $k["czy_dostepna"] == 'T'}
                                        <li><a href="{$conf->action_url}listaCzytelnik?id_ksiazki={$k["ID_ksiazki"]}" class="button alt small">Wypożycz</a></li>			
                                    {/if}
                                </ul>
                            </td>
                        {/if}
                    </tr>
                {/strip}
            {/foreach}
        </tbody>           
    </table>
</div>
            
{/block}