{extends file="main.tpl"}


{block name=top}
{if count($conf->roles)>0}
<form action="{$conf->action_url}listaPracownik" method="post">
    <b><legend style="margin: 1em;">Wyszukiwanie pracowników</legend></b>
    <div class="row uniform 50%">
	<div class="6u 12u">
            <input type="text" name="nazwisko" value="{$searchForm->nazwisko}" placeholder=" Wpisz nazwisko" /><br />
        </div>
        <div class="12u">
            <ul class="actions">
		<li><input type="submit" value="Szukaj" class="special small" /></li>
                &nbsp;
                <li><a href="{$conf->action_url}dodajPracownik" class="button small">Dodaj nowego Pracownika</a></li> 
            </ul>
        </div>
    </div>
    
</form>	
</div>
{/if}
{/block}


{block name=content}
{if count($conf->roles)>0}
<div id="p" name="p" class="table-wrapper">
    <table class="alt">
        <thead>
            <tr>
                <th>ID Pracownika</th>
                <th>Nazwisko Pracownika</th>
                <th>Imię Pracownika</th>
                <th>Opcje</th>
            </tr>   
        </thead>

        <tbody>
        {foreach $pracownik as $p}
        {strip}
            <tr>
                <td>{$p["ID_pracownika"]}</td>
                <td>{$p["nazwisko"]}</td>
                <td>{$p["imie"]}</td>
                <td>
{*CHCIAŁABYM, ŻEBY TO BYŁO WIDOCZNE DLA ZALOGOWANEGO UŻYTKOWNIKA TYLKO PRZY JEGO NAZWISKU*}
                    <ul class="actions small">
                        <li><a href="{$conf->action_url}edytujPracownik?id={$p['ID_pracownika']}" class="button special small">Edytuj</a></li>
                        &nbsp;
                        <li><a href="{$conf->action_url}usunPracownik?id={$p['ID_pracownika']}" class="button small">Usuń</a></li>
                    </ul>
{**}               
                </td>
            </tr>
        {/strip}
        {/foreach}
        </tbody>           
    </table>
</div>       
{/if}
{/block}